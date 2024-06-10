@extends('layouts.layout')

@section('content')

<div class="card-body bg-dark text-white col-7 mx-auto mt-5 p-2">

    <h1 class="text-center mb-5">Add Employee Type Page</h1>

    <form action="{{ route('employeeTypes.update', $employeeType->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group col-5 mb-3 mx-auto">
            <label for="type" class="mb-1">Enter Type</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="type" value="{{$employeeType->type}}">
        </div>

        <div class="form-group col-5 mx-auto mb-5">
            <label for="salary" class="mb-1">Enter Salary</label>
            <input type="number" class="form-control" id="salary" name="salary" placeholder="Salary" value="{{$employeeType->salary}}">
        </div>

        <div class="mt-2 row">
            <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add">
        </div>
    </form>

</div>


@endsection
