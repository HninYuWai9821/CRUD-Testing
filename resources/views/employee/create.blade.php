@extends('layouts.layout');

@section('content')

    <h1 class="text-center mb-5">Add Employee Page</h1>

    <div class="card-body">
        <form action="{{route('employees.store')}}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                <div class="col-md-4">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="mb-5 mt-5 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                <div class="col-md-4">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
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

            <div class="mb-2 row">
                <input type="submit" class="col-md-2 offset-md-5 btn btn-primary" value="Add New Employee">
            </div>

        </form>
    </div>

@endsection
