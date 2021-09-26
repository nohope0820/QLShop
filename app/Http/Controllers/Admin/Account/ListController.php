<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountServices;

class ListController extends Controller
{
    protected $accountServices;

    public function __construct(AccountServices $accountServices)
    {
        $this->accountServices = $accountServices;
    }

    public function index()
    {
        $data = $this->accountServices->listAccount();
        return view('layouts.Admin.Account.Index')->with('data', $data);
    }
}
