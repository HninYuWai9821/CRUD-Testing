@extends('layouts.layout');

@section('content')

    <h1>Edit Page</h1>

<div class="card-body">
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="mb-3 row">
            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $post->name }}">
                {{-- @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif --}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="name" name="description" value="{{ $post->description }}">
                {{-- @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif --}}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="age" class="col-md-4 col-form-label text-md-end text-start">Age</label>
            <div class="col-md-6">
                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ $post->age }}">
                {{-- @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif --}}
            </div>
        </div>

        <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
        </div>

    </form>
</div>
