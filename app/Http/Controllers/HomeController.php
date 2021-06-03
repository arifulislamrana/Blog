<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Repository\Interfaces\ICategory;
use Illuminate\Http\Request;
use App\Repository\Interfaces\IPost;
use App\Repository\Interfaces\ITag;

class HomeController extends Controller
{
    private $postRepository;
    private $categoryRepository;
    private $tagRepository;

    public function __construct(IPost $postRepository, ICategory $categoryRepository, ITag $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }
    public function home()
    {
        $mostRecentPosts = $this->postRepository->getMostRecentPosts(3);

        foreach ($mostRecentPosts as $post) {

            $temp = explode('.', $post->body)[0];
            $temp .= '</'.explode('>', explode('<', $temp)[1])[0].'>';
            $post->body = $temp;
            
        }

        return view('welcome', [
            'mostRecentPosts' => $mostRecentPosts,
        ]);
    }
    public function categoryBlog(Request $request)
    {
        
       $posts =  $this->categoryRepository->find($request->id)->posts()->get();
       $categoryName  =  $this->categoryRepository->find($request->id)->name;

       foreach ($posts as $post) {

           $temp = explode('.', $post->body)[0];
           $temp .= '.....</'.explode('>', explode('<', $temp)[1])[0].'>';
           $post->body = $temp;
           
       }

        return view('category_blogs', ['posts' => $posts, 'categoryName' => $categoryName]);
    }

    public function blogDetails(Request $request)
    {
        $post = $this->postRepository->find($request->id);

        return view('single_blog', ['post' => $post]);
    }


    public function postComment(Request $request)
    {
        $post = $this->postRepository->find($request->postId);

        $comment = new Comment();
        $comment->body = $request->comment;

        $comment->post()->associate($post);

        $comment->save();

        return redirect()->back();


    }

    public function findPostsByTag($id)
    {
        $tag = $this->tagRepository->find($id);

        $posts = $tag->posts;

        foreach ($posts as $post) {

            $temp = explode('.', $post->body)[0];
            $temp .= '.....</'.explode('>', explode('<', $temp)[1])[0].'>';
            $post->body = $temp;
            
        }

        return view('taggedPosts', ['posts' => $posts, 'tagName' => $tag->name]);
    }
}
