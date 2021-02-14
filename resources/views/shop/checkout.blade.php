@extends('mainlayouts.main')

@section('content')
	<div class="contCheckout">
        <h1 class="h3Main">Checkout</h1>
        <hr>
        <div class="contContent"> 
            <div class="modal-body"> 
                @include('shop._cart')          
            </div>
                @guest 
                    <p><a href="{{ route('login') }}"  class="btn btn-primary">Login</a>  or  <a href="{{ route('register') }}"  class="btn btn-primary">Register</a></p>
                @else
                <a href="/end-checkout" class="but butCheck">End checkoute</a>
                @endguest
            
        </div>
	</div>
	
@endsection