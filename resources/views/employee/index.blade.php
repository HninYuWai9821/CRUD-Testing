@extends('layouts.layout')

@section('content')
<h1 class="text-center mb-5 mt-5">Employee List</h1>


<div class="col-10 m-auto card">
    <div class="card-body">
        <a href="{{route('employees.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="bi bi-plus-circle"></i> Add New Employee</a>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th class="col-2" scope="col">Name</th>
                <th class="col-3" scope="col">Email</th>
                <th class="col-3" scope="col">Type</th>

            </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->employee_types->type}}</td>
                    <td class="col-3">
                        <form action="{{route('employees.destroy', $employee->id)}}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{route('employees.show', $employee->id)}}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Show</a>

                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

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

        {{ $employees->links() }}
    </div>
</div>
@endsection
