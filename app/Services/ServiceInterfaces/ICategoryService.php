<?php
namespace App\Services\ServiceInterfaces;


interface ICategoryService 
{

    public function getAllCategories();

    public function getActiveCategories();

    public function getDeactiveCategories();

    public function createCategory($name);

    public function findCategory($id);

    public function deleteCategoryByName($name);
}

?>