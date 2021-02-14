@extends('adminlte::page')

@section('title', 'Add article')

@section('content_header')
    <h1>Add article</h1>
@stop

@section('content')

@include('admin._massages')

    <form action="/admin/article" method="POST" enctype="multipart/form-data">
        
        @include('admin.article._form')

    </form>
@stop
