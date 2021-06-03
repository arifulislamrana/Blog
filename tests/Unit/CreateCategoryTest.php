<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Repository\Interfaces\ICategory;
use App\Services\CategoryService;
use PHPUnit\Framework\TestCase;

class CreateCategoryTest extends TestCase
{
    private $categoryRepositoryStub;

    public static function setUpBeforeClass(): void
    {
        
    }

    protected function setUp(): void
    {
        $this->categoryRepositoryStub = $this->createStub(ICategory::class);
    }

    protected function tearDown(): void
    {

    }

    public static function tearDownAfterClass(): void
    {
        
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_createCategory_ifCattegoryCreated()
    {
        $model = new Category();
        $name = 'name';

        $this->categoryRepositoryStub->expects($this->any())
                     ->method('create')
                     ->will($this->returnValue($model));

        $categoryService = new CategoryService($this->categoryRepositoryStub);

        $this->assertInstanceOf(Category::class, $categoryService->createCategory($name));
    }
}
