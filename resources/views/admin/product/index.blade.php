@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products 
    <a href="/admin/product/create" class="btn btn-primary btn-sm">Add product</a>
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
                <th>Price</th>
                <th>Description</th>
                <th>Size</th>
                <th>Metal</th>
                <th>Stone</th>
                <th>Availability</th>
                <th>Recommended</th>
    			<th>Category</th>
                <th></th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($products as $product)
    		<tr>
                
    			<td>{{$loop->iteration}}</td>
    			<td><img src="{{$product->img}}" alt="{{$product->name}}" style="width: 70px"></td>
    			<td>{{$product->name}}</td>
    			<td>{{$product->slug}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->size}}</td>
                <td>{{$product->metal}}</td>
                <td>{{$product->stone}}</td>
                <td>{{$product->availability}}</td>
                <td>{{$product->recommended}}</td>
                <td>{{$product->category ? $product->category->name : 'Not category'}}</td>                
    			<td>
                    <a href="/admin/product/{{$product->id}}/edit" class="btn btn-warning"> <i class="fa fa-edit "></i></a>
                    <form action="/admin/product/{{$product->id}}" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>         
                </td>

    		</tr>
    		@endforeach
    	</tbody>
    </table>
@stop
