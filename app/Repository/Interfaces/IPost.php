<?php
namespace App\Repository\Interfaces;

use Illuminate\Http\Request;

interface IPost extends IBaseRepository {

    public function postsOfCurrentUser($id);
    public function getMostRecentPosts($no);
}

?>