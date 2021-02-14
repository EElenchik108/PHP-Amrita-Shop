@extends('adminlte::page')

@section('title', 'Edit article')

@section('content_header')
    <h1>Edit article: "{{$article->name}}"</h1>
@stop

@section('content')

@include('admin._massages')

    <form action="/admin/article/{{$article->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.article._form')
    </form>
@stop
