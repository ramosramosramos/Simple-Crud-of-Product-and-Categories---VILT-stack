<?php

namespace App;

use App\Models\Category;

trait CategoryTrait
{
    public function getCategories()
    {
        return Category::select(['name'])->get();
    }
    public function getCategory_ID_WhereName($name)
    {
        return Category::query()
            ->select(['id'])->where('name', 'like', '%' . $name . '%')->first();
    }
    public function getCategory_Name_WhereID($id)
    {
        return Category::query()
            ->select(['name'])->where('id', '=', $id)->first();
    }
}
