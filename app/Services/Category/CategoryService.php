<?php

namespace App\Services\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function storeCategory($data)
    {
        try{

            DB::beginTransaction();

            $category = Category::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollback();
        }
        return $category;
    }

    public function showCategory($id)
    {
        $category = Category::find($id);

        return $category;
    }

    public function editCategory($id)
    {
        $category = Category::find($id);

        return $category;
    }

    public function updateCategory($data, $id)
    {
        try{
            DB::beginTransaction();

            $category = Category::findOrFail($id);

            $category->update($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $category;
    }

}
