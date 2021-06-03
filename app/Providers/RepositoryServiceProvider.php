<?php

namespace App\Providers;

use App\Repository\Interfaces\ITag;
use App\Repository\Interfaces\IPost;
use App\Repository\Interfaces\IUser;
use App\Repository\Interfaces\IComment;
use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\ICategory;
use App\Repository\Interfaces\IBaseRepository;
use App\Repository\Repositories\TagRepository;
use App\Repository\Repositories\BaseRepository;
use App\Repository\Repositories\PostRepository;
use App\Repository\Repositories\UserRepository;
use App\Repository\Repositories\CommentRepository;
use App\Repository\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\PostService;
use App\Services\ServiceInterfaces\ICategoryService;
use App\Services\ServiceInterfaces\ICommentService;
use App\Services\ServiceInterfaces\IPostService;
use App\Services\ServiceInterfaces\ITagService;
use App\Services\ServiceInterfaces\IUserService;
use App\Services\TagService;
use App\Services\UserService;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(ICategory::class, CategoryRepository::class);
        $this->app->bind(IComment::class, CommentRepository::class);
        $this->app->bind(IPost::class, PostRepository::class);
        $this->app->bind(ITag::class, TagRepository::class);
        $this->app->bind(IUser::class, UserRepository::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(ICommentService::class, CommentService::class);
        $this->app->bind(IPostService::class, PostService::class);
        $this->app->bind(ITagService::class, TagService::class);
        $this->app->bind(IUserService::class, UserService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
