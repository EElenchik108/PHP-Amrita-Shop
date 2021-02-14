@extends('adminlte::page')

@section('title', 'Add category')

@section('content_header')
    <h1>Edit category "{{$category->name}}"</h1>
@stop

@section('content')

	@include('admin._massages')

    <form action="/admin/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.category._form')

    </form>
@stop
