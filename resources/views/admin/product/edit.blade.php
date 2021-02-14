@extends('adminlte::page')

@section('title', 'Edit product')

@section('content_header')
    <h1>Edit product: "{{$product->name}}"</h1>
@stop

@section('content')

@include('admin._massages')

    <form action="/admin/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.product._form')

    </form>
@stop


