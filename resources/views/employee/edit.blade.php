@extends('layouts.layout');

@section('content')

<h1 style="text-align: center">Edit Employee Page</h1>

<div class="card-body">

    <form action="{{ route('employees.update', $employee->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name : </label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $employee->name }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Employee Type</label>
            <div class="col-md-4">
                <select name="type_id" class="form-select" aria-label="Default select example">
                    <option selected>Open employee type</option>
                    @foreach ($employeeTypes as $employeeType)
                        <option value={{$employeeType->id}}>{{$employeeType->type}}</option>
                    @endforeach
                  </select>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Email</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$employee->email }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>


        <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Product">
        </div>

    </form>
</div>
