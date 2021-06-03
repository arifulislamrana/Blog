<?php
namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;

interface ICategory extends IBaseRepository {
    public function deleteCategoryByName($name);
    public function editCategoryByName($id);
    public function activeCategory();
    public function deactiveCategory();
    public function categoryContainingPosts($category);
}

?>