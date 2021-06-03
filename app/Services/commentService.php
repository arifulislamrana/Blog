<?php
namespace App\Services;

use App\Repository\Interfaces\ITag;
use App\Repository\Interfaces\IPost;
use App\Repository\Interfaces\IUser;
use App\Repository\Interfaces\ICategory;
use App\Services\ServiceInterfaces\ICommentService;

class CommentService implements ICommentService
{

    private $userRepository;
    private $tagRepository;
    private $categoryRepository;
    private $postRepository;

    public function __construct(IUser $userRepository,
             ITag $tagRepository, ICategory $categoryRepository, IPost $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->tagRepository = $tagRepository;
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }
}


?>