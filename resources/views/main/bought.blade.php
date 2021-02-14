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
            <a href="/cabinet/bought"{!!Request::is('cabinet/bought')  ? 'class="activeLinkCat"' : '1 '!!} ><div class="transition">Purchased goods</div></a>					
		</div>
	</div>
	<div class="containerLikes">
		@if($orders->count()>0)
			@foreach ($orders as $order)
            @foreach ($order->products as $product)					
                <div class="prodLikes  orderL">	
                    <div class="prodLike">
                    <div class="order"><p>Order: # {{$order->id}}</p><p>Date: {{$order->created_at}}</p> </div>
						<img src="{{$product->img}}" alt="{{$product->name}}" class="">
						<h5 class="">{{$product->name}}</h5>						
						<p class="price orderP">$ {{$product->price}}</p>
						<p class="orderP"><span>Size: </span> {{$product->size}}</p>
						<p class="orderP"><span>Metal: </span> {{$product->metal}}</p>
						<p class="orderP"><span>Stone: </span> {{$product->stone}}</p>                      
                    </div>				
                </div>
            @endforeach			
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