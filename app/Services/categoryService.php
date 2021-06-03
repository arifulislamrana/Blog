<?php
namespace App\Services;

use App\Repository\Interfaces\ICategory;
use App\Services\ServiceInterfaces\ICategoryService;

class CategoryService implements ICategoryService
{

    private $categoryRepository;

    public function __construct(ICategory $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function getActiveCategories()
    {
        return $this->categoryRepository->activeCategory();
    }

    public function getDeactiveCategories()
    {
        return $this->categoryRepository->deactiveCategory();
    }

    public function createCategory($name)
    {
        return $this->categoryRepository->create($name);
    }

    public function findCategory($id)
    {
        return $this->categoryRepository->find($id);
    }

    public function deleteCategoryByName($name)
    {
        return $this->categoryRepository->deleteCategoryByName($name);
    }


    
}


?>