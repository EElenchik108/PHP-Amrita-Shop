@extends('mainlayouts.main')
@section('content')
	
	
	<div class="">
		<div class="productCard i-b">			
				<div class="imagesProduct">	
					<div class="bigImage">						
								
						<a href="{{$product->img}}" data-lightbox="roadtrip"><img src="{{$product->img}}"  alt="{{$product->name}}" class="img-fluid"  id="big"></a>	
					</div>
					<div class="smallImage">
						@foreach ($images as $img)

						{{-- <div><img src="{{$img->img}}" alt="{{$product->name}}" class="smallImg"  data-src-big="{{$img->img}}" ></div> --}}
						
						<div><a href="{{$img->img}}" data-lightbox="roadtrip"><img src="{{$img->img}}" alt="{{$product->name}}" class="smallImg"  data-src-big="{{$img->img}}" ></a></div>
						@endforeach							
					</div>			
				</div>
				<div class="infoProduct">
					<div class="like">
						@guest 
							<button title="Add to favorites" type="button" class="" data-toggle="modal" data-target=".bd-example-modal-lg-liks"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
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
		
						<div   title="Add to favorites" class="butLike
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
						<div class="butnotLike"  title="Remove from favorites">
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
						<h2 class="productP">{{$product->name}}</h2>						
                        <p class="price">$ {{$product->price}}</p>
						<p><span>Category: </span> {{$product->category ? $product->category->name : 'No category'}}</p>
                        <p class=""><span>Size: </span> {{$product->size}}</p>
                        <p class=""><span>Metal: </span> {{$product->metal}}</p>
                        <p class=""><span>Stone: </span> {{$product->stone}}</p>
                        <p class="mb-4"><span>Availability: </span> 
                        {{$product->availability === 0 ? 'To order' : 'In stock'}}
                        </p>							
						<p>{{$product->description}}</p>
						<div class="form">
							<form action="" class="add-to-cart">
								@csrf
								<input type="number" name="qty" value="1" min="1">
								<input type="hidden" name="product_id" value="{{$product->id}}">
								<button class="">ADD TO CARD</button>	
							</form>
						</div>									
				</div>				
		</div>

		<div class="reviews">
			<h3>Add Review</h3>
			@guest				
				<p>
					<a class="log" href="{{ route('login') }}">{{ __('Login') }}</a> or
					@if (Route::has('register')) 
						<a class="log" href="{{ route('register') }}">{{ __('Register') }}</a>
					@endif
				</p>
			@else	
			<form action="/product/{{$product->slug}}" method="POST">
				@csrf
				<div class="form-group">
					<textarea name="comment" id="" cols="20" rows="3" class="form-control"></textarea>
				</div>
				<input type="hidden" name="product" value="{{$product->id}}">
				<input type="hidden" name="user" value="{{Auth::user()->id}}">
				<button class="addRaview">SEND</button>			
			</form>
			@endguest
		</div>
		
		
		<div class="reviews">		
			<h3>Reviews - {{$reviewsProduct->count() ?? 'Not reveiw' }}</h3>
			<hr>			
				@if($reviewsProduct->count()>0) 
				@foreach($reviewsProduct as $review)
				<div class="review">	
					<p>{{$review->review}}</p>
					<div class="revInfo">
						<p class="revLeft">{{$review->user->name}}</p>
						<p class="revRight">{{$review->created_at}}</p>					
					</div>	
				</div>
												
				@endforeach
				@endif			
		</div>
	</div>
	
	<div class="ifoProd">
		<div>
			<h4 class="productP">ABOUT US</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo fuga mollitia adipisci beatae exercitationem rerum aperiam maxime at quod, animi voluptatum sapiente provident ipsa facilis in inventore, ut, quaerat harum!</p>
		</div>
		<div>
			<h4 class="productP">MADE TO ORDER</h4>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos itaque in harum deserunt unde culpa.</p>
		</div>
		<div>
			<h4 class="productP">MATERIALS</h4>
			<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum voluptate porro consequatur aspernatur facilis quaerat vitae harum numquam aperiam? Quis placeat soluta fugit laboriosam doloribus.</p>
		</div>
	</div>

	<h3 class="h3Main">RELATED ITEMS</h3>
	<hr align="center">

	@if(isset($relatedProducts))
	<div class="related containerProduct">
		@foreach ($relatedProducts as $relatedProduct)
		<div class="productA">
			<div class="insert">
				@if($relatedProduct->recommended)
				<div class="recommended">Recommended</div>
				@endif
				@if($relatedProduct->availability)
				<div class="availability">In stock</div>
				@endif
			</div>
			<a href="/product/{{$relatedProduct->slug}}">				
				<img src="{{$relatedProduct->img}}" class="img-fluid rounded-top" alt="{{$relatedProduct->name}}">			
				<p>{{$relatedProduct->name}}</p>						
				<p>$ {{$relatedProduct->price}}</p>
			</a>	  
		</div>	
		@endforeach
	</div>
	@else
	<div class="related containerProduct">
		@foreach ($relatedProductsAll as $relatedProductAll)
		<div class="productA">
			<div class="insert">
				@if($relatedProductAll->recommended)
				<div class="recommended">Recommended</div>
				@endif
				@if($relatedProductAll->availability)
				<div class="availability">In stock</div>
				@endif
			</div>
			<a href="/product/{{$relatedProductAll->slug}}">				
				<img src="{{$relatedProductAll->img}}" class="img-fluid rounded-top" alt="{{$relatedProductAll->name}}">			
				<p>{{$relatedProductAll->name}}</p>						
				<p>$ {{$relatedProductAll->price}}</p>
			</a>	  
		</div>	
		@endforeach
	</div>
	@endif

	<div class="ifoProd">
		<div>
			<h4 class="productP">WE FIT</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo fuga mollitia adipisci beatae exercitationem rerum aperiam maxime at quod, animi voluptatum sapiente provident ipsa facilis in inventore, ut, quaerat harum!</p>
		</div>
		<div>
			<h4 class="productP">EXCHANGES</h4>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos itaque in harum deserunt unde culpa.</p>
		</div>
		<div>
			<h4 class="productP">SUPPORT</h4>
			<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum voluptate porro consequatur aspernatur facilis quaerat vitae harum numquam aperiam? Quis placeat soluta fugit laboriosam doloribus.</p>
		</div>
	</div>

	<div class="divMain2">
		<img src="\images\6.webp" alt="MainImage" class="img1">	
	</div>
	



	
@endsection

