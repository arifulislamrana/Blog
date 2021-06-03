<?php

namespace App\Repository\Repositories;

use App\Models\Comment;
use App\Repository\Interfaces\IComment;

class CommentRepository extends BaseRepository implements IComment {
    
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
}

?>