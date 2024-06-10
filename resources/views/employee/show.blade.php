@extends('layouts.layout')


@section('content')

<h1>Show Employee</h1>

    <h2>ID - {{$employee->id}}</h2>

    <h2>Name - {{$employee->name}}</h2>

    <h2>Email - {{$employee->email}}</h2>

    <h2>Type - {{$employeeType->id}}>{{$employeeType->type}}</h2>

