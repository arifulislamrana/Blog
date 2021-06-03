<?php
namespace App\ViewModels;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ServiceInterfaces\ICategoryService;

class CategoryModel
{
    private $categoryService;
    private $all;
    private $activeCategories;
    private $deactiveCategories;


    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->load();
    }

    public function load()
    {
        $this->all = $this->categoryService->getAllCategories();
        $this->activeCategories = $this->categoryService->getActiveCategories();
        $this->deactiveCategories = $this->categoryService->getDeactiveCategories();
    }

    public function create(Request $request)
    {
        $name = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Category name is required',
        ]);

        return $this->categoryService->createCategory($name);
    }

    public function findById($id)
    {
        return $this->categoryService->findCategory($id);
    }


}


?>