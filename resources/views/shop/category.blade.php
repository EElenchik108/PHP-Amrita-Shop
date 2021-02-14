@extends('mainlayouts.main')

@section('content')
<div class="divMain2">
	<img src="\images\5.png" alt="MainImage" class="img1">	
</div>

<h3 class="h3Main">{{$categoryFirst->name}}</h3>
<hr align="center" class="hr">

<div class="filters">
	<form action="/category/{{$categoryFirst->slug}}" method="GET"  name="myForm2">
		<div>
			Sort by price:
			<input type="number" name="min" placeholder="from" min="1" value="{{\Request::input('min')}}">		
			<input type="number" name="max" placeholder="up to" min="1" value="{{\Request::input('max')}}">
			<button class="buttonPrice">OK</button>
		</div>
		<div>
			Sort by:
		<select  name="sortSelect" onchange="document.forms['myForm2'].submit()" class="filtersSelect">				
			<option value="" selected>Сhoose sort</option>
			<option value="recommended">Recommended</option>
			<option value="availability">In stock</option>
			<option value="cheaper">Price: Low to Hight</</option>
			<option value="expensive">Price: Hight to Low</option>
			<option value="new">Date: New to Old</option>
			<option value="old">Date: Old to New</option>
		</select>
		</div>		
	</form>	
</div>

<div class="containerShop i-b shopProd">
	<div class="menuShop">
		<div id="containerCategory">					
			@foreach ($categories as $cat)
			{{-- {{dump(Request::is('category/'.$category->slug))}} --}}
			<a href="/category/{{$cat->slug}}"{!!Request::is('category/'.$cat->slug)  ? 'class="activeLinkCat"' : '1 '!!} ><div class="transition">{{$cat->name}}  .{{$cat->products->count()}} .</div></a>
			@endforeach			
		</div>
	</div>
	<div class="containerProduct productShop">
		@if($products->count()>0)
			@foreach ($products as $product)
			<div class="productA">				
				<div class="insert">
					@if($product->recommended)
						<div class="recommended">Recommended</div>
					@endif
					@if($product->availability)
						<div class="availability">In stock</div>
					@endif
				</div>
				<div class="like">
					@guest 
						<button  title="Add to favorites" type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg-liks"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
					@else
					<div title="Remove from favorites" class="butnotLike2
					@if(count($likes->where('product_id', $product->id)->where('user_id', Auth::user()->id))>0)
						show
					@else
						hide
					@endif
					">
					
						<form action="" class="dell-like">
							@csrf
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
							</button>
						</form>						
					</div>					
	
					<div title="Add to favorites" class="butLike
					@if(count($likes->where('product_id', $product->id)->where('user_id', Auth::user()->id))>0)
						hide
					@endif
					">
						<form action="" class="add-to-like">
							@csrf
							<input type="hidden" name="product_id"value="{{$product->id}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<button  class="butLikes"><i class="fa fa-heart-o" aria-hidden="true"></i>
							</button>
						</form>						
					</div>
					<div title="Remove from favorites" class="butnotLike">
						<form action="" class="dell-like">
							@csrf
							<input type="hidden" name="product_id" value="{{$product->id}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
							</button>
						</form>						
					</div>				
					@endguest
				</div>
				<a href="/product/{{$product->slug}}">
					{{-- <div class=""> --}}
						@if($product->images->count()>0)
							<img src="{{$product->img}}" class="img-fluid rounded-top" alt="{{$product->name}}" onmouseover="this.src='{{count($product->images)>0 ? $product->images[0]->img : $product->img}}'" 
							onmouseout="this.src='{{$product->img}}'">
						@else
							<img src="{{$product->img}}" class="img-fluid rounded-top" alt="{{$product->name}}">
						@endif
					{{-- </div> --}}
					<p>{{$product->name}}</p>
					<p>$ {{$product->price}}</p>
				</a>	  
			</div>
			@endforeach
		@else
            <p>No products with data</p>   
        @endif
	</div>
</div>

<div class="paginationProduct">
	<div>{{$products->links()}}</div>																
</div>
	
  

@endsection

