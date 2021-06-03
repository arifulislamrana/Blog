<?php

namespace App\Repository\Repositories;


use App\Models\Category;
use App\Models\Post;
use App\Repository\Interfaces\ICategory;

class CategoryRepository extends BaseRepository implements ICategory {
    
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    public function deleteCategoryByName($name)
    {
        $this->model->where(['name' => $name])->delete();
    }

    public function editCategoryByName($id)
    {
        $category = $this->find($id);

    }

    public function activeCategory()
    {
        return $this->model->where(['status' => 'active'])->get();
    }

    public function deactiveCategory()
    {
        return $this->model->where(['status' => 'deactive'])->get();
    }

    public function categoryContainingPosts($category)
    {
        return count($category->posts()->get());
    }
}

?>