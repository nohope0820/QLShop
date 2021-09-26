<?php

namespace App\Services;

use App\Repositories\AccountRepository;

class AccountServices
{
    protected $AccountRepository;

    public function __construct(AccountRepository $accountRepository)
    {
        return $this->AccountRepository = $accountRepository;
    }

    public function listAccount()
    {
        return $this->AccountRepository->listAccount();
    }

    public function store(array $params)
    {
        return $this->AccountRepository->store($params);
    }

    public function update(array $params, $id)
    {
        return $this->AccountRepository->update($params, $id);
    }

    public function destroy($id)
    {
        return $this->AccountRepository->destroy($id);
    }

    public function showInformation($id)
    {
        return $this->AccountRepository->showInformation($id);
    }
}
