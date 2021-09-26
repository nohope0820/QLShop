<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AccountServices;

class DestroyController extends Controller
{
    protected $accountServices;

    public function __construct(AccountServices $accountServices)
    {
        $this->accountServices = $accountServices;
    }

    public function destroy($id)
    {
        $this->accountServices->destroy($id);
        return redirect(url('admin/account'));
    }
}
