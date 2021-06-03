<?php
namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface IUser extends IBaseRepository {
    public function findUserByEmail($email);
    
    public function getUser();
    public function guests();
    public function admins();
}

?>