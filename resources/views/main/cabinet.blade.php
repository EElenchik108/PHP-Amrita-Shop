@extends('mainlayouts.main')

@section('content')
<div class="divMain2">
	<img src="\images\5.png" alt="MainImage" class="img1">	
</div>

<h3 class="h3Main">My cabinet</h3>
<hr align="center" class="hr">

<div class="containerL">
	<div class="menuShop">
		<div id="containerCategory">			
            <a href="/cabinet"{!!Request::is('cabinet')  ? 'class="activeLinkCat"' : '1 '!!} ><div class="transition">Selected products</div></a>
            <a href="/cabinet/bought"{!!Request::is('category/bought')  ? 'class="activeLinkCat"' : '1 '!!} ><div class="transition">Purchased goods</div></a>					
		</div>
	</div>
	<div class="containerLikes">
		@if($likes->count()>0)
			@foreach ($likes as $like)
			<div class="prodLikes">				
				
				<div class="like">
					@guest 
						<button  title="Add to favorites" type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg-liks"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
					@else
					<div title="Remove from favorites" class="butnotLike2
					@if(count($likes->where('product_id', $like->product->id)->where('user_id', Auth::user()->id))>0)
						show
					@else
						hide
					@endif
					">
					
						<form action="" class="dell-like">
							@csrf
							<input type="hidden" name="product_id" value="{{$like->product->id}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
							</button>
						</form>						
					</div>					
	
					<div title="Add to favorites" class="butLike
					@if(count($likes->where('product_id', $like->product->id)->where('user_id', Auth::user()->id))>0)
						hide
					@endif
					">
						<form action="" class="add-to-like">
							@csrf
							<input type="hidden" name="product_id"value="{{$like->product->id}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<button  class="butLikes"><i class="fa fa-heart-o" aria-hidden="true"></i>
							</button>
						</form>						
					</div>
					<div title="Remove from favorites" class="butnotLike">
						<form action="" class="dell-like">
							@csrf
							<input type="hidden" name="product_id" value="{{$like->product->id}}">
							<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
							<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
							</button>
						</form>						
					</div>				
					@endguest
				</div>

				<div class="prodLike pLike">
					<a href="/product/{{$like->product->slug}}" class="prodL">
						<img src="{{$like->product->img}}" alt="">
						<h5 class="">{{$like->product->name}}</h5>						
						<p class="price orderP">$ {{$like->product->price}}</p>
						<p class="orderP"><span>Size: </span> {{$like->product->size}}</p>
						<p class="orderP"><span>Metal: </span> {{$like->product->metal}}</p>
						<p class="orderP"><span>Stone: </span> {{$like->product->stone}}</p>
						<p class="orderP"><span>Availability: </span> 
						{{$like->product->availability === 0 ? 'To order' : 'In stock'}}
						</p>
					</a>
				</div>				
			</div>
			@endforeach
		@else
			<p>No products with data</p>   
		@endif
	</div>
</div>

{{-- <div class="paginationProduct">
	<div>{{$like->products->links()}}</div>																
</div> --}}
	
  

@endsection