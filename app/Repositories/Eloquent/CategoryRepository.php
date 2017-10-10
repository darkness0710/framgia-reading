<?php
namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends Repository implements CategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function model()
    {
        return Category::class;
    }

    public function getAllCategory($select = ['*'])
    {
        $categories = Category::select($select)->get();

        return $categories;
    }

    public function countCategory($select = ['*'])
    {
        $count = Category::select($select)->count();

        return $count;
    }
}
