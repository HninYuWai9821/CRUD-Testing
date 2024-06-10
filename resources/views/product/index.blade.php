@extends('layouts.layout')

@section('content')

    <h1>Index</h1>

    <div class="card">
        <div class="card-header">List</div>
        <div class="card-body">
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Specialty</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category?->categoryName }}</td>
                        <td>{{ $product->specialty?->name}}</td>
                        <td>
                            <form action="{{route('products.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('products.show',  $product->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Show</a>

                                <a href="{{ route('products.edit',  $product->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>


{{-- @endsection --}}
