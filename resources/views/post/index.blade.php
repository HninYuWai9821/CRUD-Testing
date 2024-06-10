@extends('layouts.layout')

@section('content')

    <h1>Index</h1>

    <div class="card">
        <div class="card-header">List</div>
        <div class="card-body">
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New POST</a>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Age</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->age }}</td>
                        <td>
                            <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('posts.show',  $post->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Show</a>

                                <a href="{{ route('posts.edit',  $post->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

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

            {{ $posts->links() }}
        </div>
    </div>


@endsection
