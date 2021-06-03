<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repository\Interfaces\ITag;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Repository\Interfaces\IUser;
use Illuminate\Support\Facades\Auth;
use App\Repository\Interfaces\ICategory;
use App\Repository\Interfaces\IPost;
use App\ViewModels\CategoryModel;

class DashboardController extends Controller
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

    public function index(Request $request)
    {
        $guests = $this->userRepository->guests()->orderBy('id', 'desc')->take(7)->get();

        $posts = $this->postRepository->all();

        $countedPost = array(
            'today' => 0,
            'thisMonth' => 0,
            'thisYear' => 0,
        );
        
        foreach ($posts as $post) 
        {
            if (date_parse($post->created_at)['day'] == date_parse(now())['day']) 
            {
                $countedPost['today']++;
            } 
            if(date_parse($post->created_at)['month'] == date_parse(now())['month']) 
            {
                $countedPost['thisMonth']++;
            }
            if(date_parse($post->created_at)['year'] == date_parse(now())['year']) 
            {
                $countedPost['thisYear']++;
            }
            
        }
        
        return view('admin.dashboard.index',[
            'guests' => $guests,
            'countedPost' => $countedPost,
            'totalPost' => count($posts),
            'registeredFollower' => count($this->userRepository->all()),
        ]);
    }

    
    public function categories()
    {
        $activeCategories = $this->categoryRepository->activeCategory();
        $deactiveCategories = $this->categoryRepository->deactiveCategory();
        $noOfPostsOfActiveCategories = array();
        $noOfPostsOfDeactiveCategories = array();

        foreach ($activeCategories as $category) 
        {
            array_push($noOfPostsOfActiveCategories, $this->categoryRepository->categoryContainingPosts($category));
        }

        foreach ($deactiveCategories as $category) 
        {
            array_push($noOfPostsOfDeactiveCategories, $this->categoryRepository->categoryContainingPosts($category));
        }
        
        //dd($activeCategories);
        return view('admin.dashboard.categories',[

            'activeCategories' => $activeCategories,
            'deactiveCategories' => $deactiveCategories,
            'noOfPostsOfActiveCategories' => $noOfPostsOfActiveCategories,
            'noOfPostsOfDeactiveCategories' => $noOfPostsOfDeactiveCategories,
        ]);
    }

    public function tags()
    {
        $tags = $this->tagRepository->all();
        $tagContaingingPosts = array();

        foreach ($tags as $tag) 
        {
            array_push($tagContaingingPosts, count($tag->posts()->get()));
        }
        //dd($tagContaingingPosts);

            return view('admin.dashboard.tags', [
                'tags' => $tags, 
                'tagContaingingPosts' => $tagContaingingPosts
            ]);
    }


    // public function test()
    // {
    //       $tags = $this->tagRepository->all()->pluck('name')->toArray();

    //       $admins = $this->userRepository->admins()->pluck('name', 'email');

    //       foreach ($admins as $email => $name) {
              
    //           echo $email."  ".$name.'<br>';
    //       }
    //       for ($i=0; $i < count($admins); $i++) { 

    //         echo $admins['email']."  ".$admins['name'].'<br>';
    //       }
    // }

    public function admins()
    {
        $admins = $this->userRepository->admins()->pluck('name', 'email')->toArray();

        return view('admin.dashboard.admins', ['admins' => $admins]);
    }

    public function deleteCategory($name)
    {
        if (Auth::check()) 
        {
            $this->categoryRepository->deleteCategoryByName($name);
            return redirect()->back();
        }
        else {
            return redirect()->back();
        }

    }

    public function activateCategory($id)
    {
        $category = $this->categoryRepository->find($id);
        //dd($category);
        $category->status = 'active';
        $category->update();

        return redirect()->back();
    }

    public function deactivateCategory($id)
    {
        $category = $this->categoryRepository->find($id);
        //dd($category);
        $category->status = 'deactive';
        $category->update();

        return redirect()->back();
    }

    public function deleteTag($name)
    {
        if (Auth::check()) 
        {
            $this->tagRepository->deleteTagByName($name);

            return redirect()->back();
        } 
        else 
        {
            return redirect()->back();
        }
        
    }

    public function createCategory(Request $request)
    {
        $category = resolve('App\ViewModels\CategoryModel');

        $category->create($request);

        return redirect()->back();

    }


    public function createPost()
    {
        $tags = $this->tagRepository->all()->pluck('name', 'id')->toArray();
        $categories = $this->categoryRepository->all()->pluck('name', 'id')->toArray();

        return view('admin.dashboard.create_post', ['tags' => $tags, 'categories' => $categories]);
    }


    public function savePost(Request $request)
    {
        $data = $request->validate([
            'category' => 'required',
            'tag' => 'required',
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'category.required' => 'category is required',
            'tag.required' => 'tag is required',
            'title.required' => 'title is required',
            'body.required' => 'body is required',
            'image.required' => 'image Password is required'
        ]);
        
        $imageName = time().rand(99, 100000000).'.'.$request->image->extension();

        $user = $this->userRepository->getUser();

        $category = $this->categoryRepository->find($request->category);

        
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $imageName;

        $post->category()->associate($category);
        $post->user()->associate($user);
        $post->created_at = now();
        $post->updated_at = now();

        $tags = $this->tagRepository->findTags($request->tag);

        $post->save();

        $post->tags()->attach($tags);

        $request->image->move(public_path('uploads'), $imageName);

        return redirect()->route('posts');
        
    }

    public function posts()
    {
        
        $user = $this->userRepository->find(Auth::id());
        $posts = $user->posts()->get();

       $category = array(
           'name' => array(),
       );

      
        foreach ($posts as $post) 
        {
            array_push($category['name'], $post->category()->get()[0]->name);
            
        }
        
        return view('admin.dashboard.posts',[
            'posts' => $posts,
            'category' => $category,
        ]);
    }


    public function approveAdminRequest(Request $request)
    {
        $user = $this->userRepository->find($request->id);
        $user->role = 'admin';

        $user->update();

        return redirect()->back();
    }

    public function rejectAdminRequest(Request $request)
    {
        $user = $this->userRepository->find($request->id);
        $user->role = 'visitor';

        $user->update();

        return redirect()->back();
    }

    public function deletePost(Request $request)
    {
        $post = $this->postRepository->find($request->id);

        if ($post->user_id == Auth::id()) 
        {
            $this->postRepository->destroy($post->id);

            return redirect()->back();
        }
        else 
        {
            echo "why man why?!!! You are not owner of this post. ";

            return redirect()->back();
        }
        
    }

    public function allPosts()
    {
        $posts = $this->postRepository->all();

       $category = array(
           'name' => array(),
       );

        foreach ($posts as $post) 
        {
            array_push($category['name'], $post->category()->get()[0]->name);
            
        }
        
        return view('admin.dashboard.allPosts',[
            'posts' => $posts,
            'category' => $category,
        ]);
    }

    public function editPost(Request $request)
    {
        $post = $this->postRepository->find($request->id);
        $tags = $this->tagRepository->all()->pluck('name', 'id')->toArray();
        $categories = $this->categoryRepository->all()->pluck('name', 'id')->toArray();

        return view('admin.dashboard.editPost', ['post' => $post, 'tags' => $tags, 'categories' => $categories]);
    }

    public function updatePost(Request $request)
    {
        $post =$this->postRepository->find($request->id);

        if (isset($request->category)) 
        {
            $category = $this->categoryRepository->find($request->category);
            $post->category()->associate($category);

        }
        if (isset($request->tag)) 
        {
            $post->tags()->detach();

            $tags = $this->tagRepository->findTags($request->tag);
            $post->tags()->attach($tags);

        }
        if (isset($request->title)) 
        {
            $post->title = $request->title;

        }
        if (isset($request->body)) 
        {
            $post->body = $request->body;

        }
        if (isset($request->image)) 
        {
            $imageName = time().rand(99, 100000000).'.'.$request->image->extension();
            $post->image = $imageName;
            $request->image->move(public_path('uploads'), $imageName);

        }
        $post->updated_at = now();

        $post->update();

        return redirect()->route('posts');

        
    }

}
