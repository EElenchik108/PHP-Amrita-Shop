{{-- <div class="contContent">
<p>Thank you for your order!</p>
<p>Your order will be processed as soon as possible.</p>
<hr>
    <h1 class="h3Main">New order #{{ $order->id }}</h1>
    User {{ $order->user->name }} <br>
    TotalSum: {{ $order->total_sum }}
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Img</th>
                <th>Name</th>
                <th>Price</th>                
                <th>Size</th>
                <th>Metal</th>
                <th>Stone</th>
                <th>Availability</th>
                <th>Qty</th>
                <th>Summa</th>			
            </tr>
        </thead>
        <tbody>
        @foreach(session('cart') as $product)
            <tr>
                <td><img src="{{env('APP_URL')}}/{{$product['img']}}" alt="" style="width: 70px"></td>
                <td>{{$product['name']}}</td>
                <td>{{$product['price']}}</td>
                <td>{{$product['size']}}</td>
                <td>{{$product['metal']}}</td>
                <td>{{$product['stone']}}</td>
                <td>{{$product['availability']==1 ? 'In stock' : 'Under the order'}}</td>                
                <td>{{$product['qty']}}</td>
                <td>{{$product['price'] * $product['qty']}}</td>			
            </tr>
            @endforeach
        </tbody>	
    </table>
 </div> --}}

<div class="contContent">
    <p>Thank you for your order!</p>
    <p>Your order will be processed as soon as possible.</p>
    <hr>
    <h1 class="h3Main">New order #{{ $order->id }}</h1>
    User {{ $order->user->name }} <br>
    TotalSum: {{ $order->total_sum }}
    <hr>
    @foreach(session('cart') as $product)
        <div class="infoProduct">						
            <h2 class="productP">{{$product['name']}}</h2>		
            <p class="price">$ {{$product['price']}}</p>    
            <p class=""><span>Size: </span> {{$product['size']}}</p>
            <p class=""><span>Metal: </span> {{$product['metal']}}</p>
            <p class=""><span>Stone: </span> {{$product['stone']}}</p>
            <p class="mb-4"><span>Availability: </span> 
                {{$product['availability']==1 ? 'In stock' : 'Under the order'}}
            </p>
            <p class=""><span>Quantity: </span> {{$product['qty']}}</p>   
            <p class=""><span>Total price: </span> {{$product['price'] * $product['qty']}}</p>	
        </div>
    <hr>
    @endforeach
</div>