@extends('layouts.layout');

@section('content')

<h1 style="text-align: center">Creat Category Page</h1>

<div class="card-body">
    <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Categories Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('categoryName') is-invalid @enderror" id="categoryName" name="categoryName" value="{{ old('categoryName') }}">
                @if ($errors->has('categoryName'))
                    <span class="text-danger">{{ $errors->first('categoryName') }}</span>
                @endif
            </div>
        </div>

        <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Category">
        </div>

    </form>
</div>




@endsection
