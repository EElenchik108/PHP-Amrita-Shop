@extends('mainlayouts.main')
@section('content')

<div class="divMain1">
	<img src="\images\1.png" alt="MainImage" class="img1">
	<div>
		<h1>E NEW ERA</h1>
		<p>OF ENGAGEMENT RINGS</p>
		<p class="aShop"><a href="/shop">SHOP</a></p>
	</div>
</div>

<div class="links">
	<div>
		<a href=""><img src="\images\1-1.jpg" alt="ZOE"></a>
		<p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam laborum, praesentium nesciunt cumque natus necessitatibus magnam, eius quasi dolorum quia molestiae nam aliquam ad alias perferendis sint a ipsa, quos similique ut repellat optio eaque. Facere, maxime hic deleniti, accusantium magnam"</p>
	</div>
	<div>
		<a href=""><img src="\images\1-2.jpg" alt="Wallpaper"></a>
		<p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam laborum, praesentium nesciunt cumque natus necessitatibus magnam, eius quasi dolorum quia molestiae nam aliquam ad alias"</p>
	</div>
	<div>
		<a href=""><img src="\images\1-3.jpg" alt="Watch"></a>
		<p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam laborum, praesentium nesciunt cumque natus necessitatibus magnam, eius quasi dolorum q"</p>
	</div>
	<div>
		<a href=""><img src="\images\1-4.jpg" alt="Coll hunting"></a>
		<p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam laborum, praesentium nesciunt cumque natus necessitatibus magnam, eius quasi dolorum quia molestiae nam aliquam ad alias perferendis sint a ipsa, quos similique ut repellat optio eaque. Facere"</p>
	</div>
	
</div>

<h3 class="h3Main">Products in stock</h3>
<hr align="center">

<div class="containerProduct">	
		@foreach ($productsAvailability as $productAvailability)
		<div class="productA">
			<div class="insert">
				@if($productAvailability->recommended)
				<div class="recommended">Recommended</div>
				@endif
				@if($productAvailability->availability)
				<div class="availability">In stock</div>
				@endif
			</div>
			<div class="like">
				@guest 
					<button title="Add to favorites" type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg-liks"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                @else
				<div  title="Remove from favorites" class="butnotLike2
				@if(count($likes->where('product_id', $productAvailability->id)->where('user_id', Auth::user()->id))>0)
					show
				@else
					hide
				@endif
				">
				
					<form action="" class="dell-like">
						@csrf
						<input type="hidden" name="product_id" value="{{$productAvailability->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
						</button>
					</form>						
				</div>					

				<div title="Add to favorites" class="butLike
				@if(count($likes->where('product_id', $productAvailability->id)->where('user_id', Auth::user()->id))>0)
					hide
				@endif
				">
					<form action="" class="add-to-like">
						@csrf
						<input type="hidden" name="product_id"value="{{$productAvailability->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<button  class="butLikes"><i class="fa fa-heart-o" aria-hidden="true"></i>
						</button>
					</form>						
				</div>
				<div  title="Remove from favorites" class="butnotLike">
					<form action="" class="dell-like">
						@csrf
						<input type="hidden" name="product_id" value="{{$productAvailability->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
						</button>
					</form>						
				</div>				
				@endguest
			</div>
			
			<a href="/product/{{$productAvailability->slug}}">				
					<img src="{{$productAvailability->img}}" class="img-fluid rounded-top" alt="{{$productAvailability->name}}" onmouseover="this.src='{{ count($productAvailability->images)>0 ? $productAvailability->images[0]->img : $productAvailability->img }} '" 
					onmouseout="this.src='{{$productAvailability->img}}'" >			
				
				<p>{{$productAvailability->name}}</p>						
				<p>$ {{$productAvailability->price}}</p>
			</a>	  
		</div>	
		@endforeach	    
</div>


<div class="divMain1">
	<img src="\images\2.png" alt="MainImage" class="img1">
	<div>
		<h2>ARCHITECTURE</h2>
		<p>THE LOVE STORY</p>
		<p class="aShop"><a href="/shop">SHOP</a></p>
	</div>
</div>

<h3 class="h3Main">Products recommended</h3>
<hr align="center">

<div class="containerProduct">
	@foreach ($productsRecommended as $productRecommended)
		<div class="productA">
			<div class="like">
				@guest 
					<button title="Add to favorites" type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg-liks"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                @else
				<div title="Remove from favorites" class="butnotLike2
				@if(count($likes->where('product_id', $productRecommended->id)->where('user_id', Auth::user()->id))>0)
					show
				@else
					hide
				@endif
				">				
					<form action="" class="dell-like">
						@csrf
						<input type="hidden" name="product_id" value="{{$productRecommended->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
						</button>
					</form>						
				</div>					

				<div title="Add to favorites" class="butLike
				@if(count($likes->where('product_id', $productRecommended->id)->where('user_id', Auth::user()->id))>0)
					hide
				@endif
				">
					<form action="" class="add-to-like">
						@csrf
						<input type="hidden" name="product_id"value="{{$productRecommended->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<button  class="butLikes"><i class="fa fa-heart-o" aria-hidden="true"></i>
						</button>
					</form>						
				</div>
				<div title="Remove from favorites" class="butnotLike">
					<form action="" class="dell-like">
						@csrf
						<input type="hidden" name="product_id" value="{{$productRecommended->id}}">
						<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
						<button class="butNotLike"><i class="fa fa-heart" aria-hidden="true"></i>
						</button>
					</form>						
				</div>				
				@endguest
			</div>
			<div class="insert">
                @if($productRecommended->recommended)
                <div class="recommended">Recommended</div>
                @endif
                @if($productRecommended->availability)
                <div class="availability">In stock</i></div>
				@endif
			</div>
			<a href="/product/{{$productRecommended->slug}}">
				<div class="">
					<img src="{{$productRecommended->img}}" class="img-fluid rounded-top imagesR" alt="{{$productRecommended->name}}" onmouseover="this.src='{{count($productRecommended->images)>0 ? $productRecommended->images[0]->img : $productRecommended->img}}'" 
					onmouseout="this.src='{{$productRecommended->img}}'">		
				</div>
				<p>{{$productRecommended->name}}</p>
				<p>$ {{$productRecommended->price}}</p>			
			</a>	  
		</div>	
		@endforeach	    
</div>

<div class="divMain2">
	<img src="\images\3.png" alt="MainImage" class="img1">
	<div class="">
		<h2>IN STOCK</h2>
		<p>AND REDY TO SHIP</p>
		<p class="aShop"><a href="">SHOP</a></p>
	</div>
</div>

@endsection

