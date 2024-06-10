<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    public function index()
    {
       $products = $this->productService->getAllProducts();
        return view('product.index')->with(['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $specialties = Specialty::all();
        return view('product.create')->with(['categories' => $categories, 'specialties' => $specialties]);
    }

    public function store(Request $request)
    {
        $data ['name'] = $request->name;
        $data ['category_id'] = $request->category_id;
        $data ['specialty_id'] = $request->specialty_id;

        $product = $this->productService->createProduct($data);

        return redirect()->route('products.index')
            ->withSuccess('New product is added successfully.');
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);

       if(!$product) {
            return redirect()->route('products.index')
                ->with('error', 'Product not found!!');
       }
        return view('product.show')->with(['product' => $product]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $specialties=Specialty::all();
        $product = Product::findOrFail($id);

        return view('product.edit')->with(
            [
            'product' => $product,
            'categories' => $categories,
            'specialties'=> $specialties
            ]
    );
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'category_id' => 'required',
            'specialty_id'=> 'required'
        ]);

        // $product = Product::findOrFail($id);

        // $product->update($data);

        $product = $this->productService->updateProduct($data, $id);

        return redirect()->route('products.index')
        ->withSuccess('updated successfully.');
    }

    public function destroy($id)
    {
        // $product = Product::findOrFail($id);

        // $product->delete();

        $product = $this->productService->deleteProduct($id);

        return redirect()->route('products.index')
            ->withSuccess('deleted successfully.');
    }
}

