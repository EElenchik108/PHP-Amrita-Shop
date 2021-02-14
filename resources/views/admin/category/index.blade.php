@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories
    <a href="/admin/category/create" class="btn btn-primary btn-sm">Add category</a></h1>   
    
@stop

@section('content')

@include('admin._massages')
   
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Slug</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><img src="{{$category->img}}" alt="{{$category->name}}" style="width: 100px"></td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>
                <a href="/admin/category/{{$category->id}}/edit" class="btn btn-warning"> <i class="fa fa-edit"></i></a>
                <form action="/admin/category/{{$category->id}}" method="POST">
                    @csrf                    
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>         
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop