<?php

namespace App\Services\Product;

use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Psy\Exception\FatalErrorException;

class ProductService
{

    public function getAllProducts()
    {
        return Product::with('category','specialty')->paginate(5);
    }
    public function createProduct($data)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($data);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        };

        return $product;
    }

    public function getProductById($id)
    {
        $product = Product::find($id);
        if(!$product) {
            throw new FatalErrorException('Item not found', 404);
        }
        return $product;
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        return $product;
    }

    public function updateProduct($data, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $product->update($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        };

        return $product;
    }

    public function deleteProduct($id)
    {
        try{
            DB::beginTransaction();

            $product = Product::find($id);

            $product->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();

        };

        return $product;
    }
}
