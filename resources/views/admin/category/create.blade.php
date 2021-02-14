@extends('adminlte::page')

@section('title', 'Add category')

@section('content_header')
    <h1>Add category</h1>
@stop

@section('content')

@include('admin._massages')

    <form action="/admin/category" method="POST" enctype="multipart/form-data">
        
        @include('admin.category._form')

    </form>
@stop
