<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;

class ProductAPIController extends Controller
{
    protected $productService;

    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    public function getAllProducts()
    {
        $products = $this->productService->getAllProducts();

        return response()->json([
            $products
        ]);
    }

    public function createProduct(Request $request)
    {
        $data ['name'] = $request->name;
        $data ['category_id'] = $request->category_id;
        $data ['specialty_id'] = $request->specialty_id;

        $product = $this->productService->createProduct($data);

        return response()->json([
            $product
        ])->setStatusCode(201);
    }


    public function showProduct($id)
    {
        $product = $this->productService->getProductById($id);

        return response()->json([
            'product' => $product, 200
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $data ['name'] = $request->name;
        $data ['category_id'] = $request->category_id;
        $data ['specialty_id'] = $request->specialty_id;

        $product = $this->productService->updateProduct($data, $id);

        return response()->json(['message' => 'Product updated successfully', 'product' => $product], 200);
    }

    public function deleteProduct($id)
    {
        $product = $this->productService->deleteProduct($id);

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

}
