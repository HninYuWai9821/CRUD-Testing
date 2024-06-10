@extends('layouts.layout')


@section('content')

    <h1>
        {{$product->id}}

        {{$product->name}}

        {{ $product->category?->categoryName }}

        {{ $product->specialty?->id}}

        {{ $product->specialty?->name}}

</h1>
