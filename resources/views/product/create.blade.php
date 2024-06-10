@extends('layouts.layout')

@section('content')

    <h1 style="text-align: center">Create Product Page</h1>

    <div class="card-body">
        <form action="{{route('products.store')}}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Category</label>
                <div class="col-md-6">

                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option value={{$category->id}}>{{$category->categoryName}}</option>
                        @endforeach

                      </select>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>


            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Category</label>
                <div class="col-md-6">

                    <select name="specialty_id" class="form-select" aria-label="Default select example">
                        <option selected>Select Specialty</option>
                        @foreach ($specialties as $specialty)
                            <option value={{$specialty->id}}>{{$specialty->name}}</option>
                        @endforeach

                      </select>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="mb-3 row">
                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
            </div>

        </form>
    </div>
