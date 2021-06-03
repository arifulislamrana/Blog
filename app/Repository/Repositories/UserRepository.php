<?php

namespace App\Repository\Repositories;


use App\Models\User;
use App\Repository\Interfaces\IUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements IUser {
    
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findUserByEmail($email)
    {
        return $this->model->where(['email' => $email])->first();
    }

    public function guests()
    {
        $users = $this->model->where(['role' => 'guest']);

        return $users;
    }

    public function admins()
    {
        return $this->model->where(['role' => 'admin']);
    }

    public function getUser()
    {
        return Auth::user();
    }
}

?>