@extends('layouts.layout')

@section('content')

    <h1 style="text-align: center">Create Page</h1>

    <div class="card-body">
        <form action="{{route('posts.store')}}" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                    {{-- @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif --}}
                </div>
            </div>

            <div class="mb-3 row">
                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add POST">
            </div>

        </form>
    </div>
