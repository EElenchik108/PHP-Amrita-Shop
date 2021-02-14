@extends('mainlayouts.main')
@section('content')

<div class="containerAbout">    
    <h3 class="h3Main">SEARCH</h3>
    <hr align="center" class="hr">
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
            <a href="/product/{{$product->slug}}">
                <img src="{{$product->img}}" class="img-fluid rounded-top" alt="{{$product->name}}">
				<p>{{$product->name}}</p>
				<p>$ {{$product->price}}</p>
			</a>	  
		</div>
		@endforeach
        @else
            <p>No products matching your search</p>   
        @endif   
    </div> 
    
    	
</div>
	
@endsection