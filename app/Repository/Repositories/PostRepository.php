<?php

namespace App\Repository\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Repository\Interfaces\IPost;

class PostRepository extends BaseRepository implements IPost {

    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    public function postsOfCurrentUser($id)
    {
        return $this->model->where(['user_id' => $id])->get();
    }

    public function getMostRecentPosts($no)
    {
        return $this->model->orderBy('id', 'desc')->take($no)->get();
    }


}

?>