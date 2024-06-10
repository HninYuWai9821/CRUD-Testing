@extends('layouts.layout')

@section('content')


<h1 class="text-center text-primary">Employee Type List</h1>


<div class="col-10 m-auto card">
    <div class="card-body">
        <a href="{{route('employeeTypes.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="bi bi-plus-circle"></i> Add New Employee Type</a>
        <table class="table table-striped table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employeeTypes as $employeeType)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$employeeType->type}}</td>
                    <td>{{$employeeType->salary}}</td>
                    <td class="col-3">
                        <form action="{{route('employeeTypes.destroy', $employeeType->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('employeeTypes.show', $employeeType->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Show</a>

                            <a href="{{route('employeeTypes.edit', $employeeType->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i>Edit</a>

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <td colspan="6">
                        <span class="text-danger">
                            <strong>No Type Found!</strong>
                        </span>
                </td>
            @endforelse
            </tbody>
          </table>
        {{ $employeeTypes->links() }}
    </div>
</div>





@endsection
