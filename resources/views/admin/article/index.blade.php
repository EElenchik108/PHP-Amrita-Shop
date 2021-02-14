@extends('adminlte::page')

@section('title', 'Articles')

@section('content_header')
    <h1>Articles
    <a href="/admin/article/create" class="btn btn-primary btn-sm">Add article</a>
	</h1>
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
                <th>Topic</th>
                <th>Description</th>
                <th>Text</th>
                <th>Author</th>                
                <th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($articles as $article)
    		<tr>
                
    			<td>{{$loop->iteration}}</td>
    			<td><img src="{{$article->img}}" alt="{{$article->name}}" style="width: 70px"></td>
    			<td>{{$article->name}}</td>
    			<td>{{$article->slug}}</td>
                <td>{{$article->topic}}</td>
                <td>{{$article->description}}</td>
                <td>{{$article->text}}</td>
                <td>{{$article->author}}</td>                
    			<td>
                    <a href="/admin/article/{{$article->id}}/edit" class="btn btn-warning btnAdmin"> <i class="fa fa-edit "></i></a>
                    <form action="/admin/article/{{$article->id}}" method="POST">
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
