<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class AccountRepository extends Repository
{
    protected $user;
    // protected $friend;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function store($params)
    {
        $this->user->create($params);
    }

    public function update($params, $id)
    {
        return $this->user->where('id', '=', $id)
                          ->update(['name' => $params['name'],
                             'email' => $params['email'],
                             'password' => $params['password'],
                             'role' => $params['role']
                             ]);
    }

    public function destroy($id)
    {
        return $this->user->where('id', '=', $id)
                          ->delete();
    }

    public function listAccount()
    {
        return $this->user->join('role', 'users.role', '=', 'role.id')
                          ->select('users.id', 'name', 'email', 'role_name')->paginate(10);
    }

    public function showInformation($id)
    {
        return $this->user->where('id', '=', $id)
                          ->select('id', 'name', 'email')->get();
    }
}
