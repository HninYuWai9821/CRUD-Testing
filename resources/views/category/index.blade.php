@extends('layouts.layout');

@section('content')

<h1>Product Category List Page</h1>

<div class="card">
    <div class="card-header">List</div>
    <div class="card-body">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>Add New Category</a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Name</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $category->categoryName }}</td>
                    <td>
                        <form action="{{route('categories.destroy', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('categories.show',  $category->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Show</a>

                            <a href="{{ route('categories.edit',  $category->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>Edit</a>

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i>Delete</button>
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

        {{ $categories->links() }}
    </div>
</div>

@endsection

