<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    protected $accountServices;

    public function __construct(AccountServices $accountServices)
    {
        $this->accountServices = $accountServices;
    }

    public function edit($id)
    {
        $record = $this->accountServices->showInformation($id);
        return view('layouts.Admin.Account.FormUpdate', ["record"=>$record]);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $params['password'] = Hash::make($params['password']);
        $this->accountServices->update($params, $id);
        return redirect(url('admin/account'));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'bail|required|min:10|max:100',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name', 'email', 'password', 'role']);
    }
}
