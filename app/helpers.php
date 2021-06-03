<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

if (! function_exists('getActiveCategories')) {
    
    function getActiveCategories() {

        return Category::where(['status' => 'active'])->get();
    }
}

if (! function_exists('getTopFiveActiveCategories')) {
    
    function getTopFiveActiveCategories() {

        return Category::where(['status' => 'active'])->take(5)->get();
    }
}

if (! function_exists('countNoOfPostOfCategory')) {
    
    function countNoOfPostOfCategory($id) {

        $posts = Post::where(['category_id' => $id])->get();
        
        return count($posts);
    }
}

if (! function_exists('getUserName')) {
    
    function getUserName() {

        $user = Auth::user();
        
        return $user->name;
    }
}



?>