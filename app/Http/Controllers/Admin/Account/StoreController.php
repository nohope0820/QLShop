<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\AccountServices;

class StoreController extends Controller
{
    protected $accountServices;

    public function __construct(AccountServices $accountServices)
    {
        $this->accountServices = $accountServices;
    }

    public function create()
    {
        return view('layouts.Admin.Account.FormCreate');
    }

    public function store(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $params['password'] = Hash::make($params['password']);
        $this->accountServices->store($params);
        return redirect(url('admin/account'));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'bail|required|min:10|max:100',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name', 'email', 'password', 'role']);
    }
}
