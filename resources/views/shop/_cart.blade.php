@if( session('cart') )

<table class="table">
	<thead>
		<tr>
			<th>Img</th>
			<th>Name</th>
			<th>Price</th>
			<th>Availability</th>
			<th>Qty</th>
			<th>Summa</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	@foreach(session('cart') as $product)
		<tr>
			<td><img src="{{$product['img']}}" alt="" style="width: 70px"></td>
			<td>{{$product['name']}}</td>
			<td>{{$product['price']}}</td>
			<td>{{$product['availability']==1 ? 'In stock' : 'On order'}}</td>
			<td>{{$product['qty']}}</td>
			<td>{{$product['price'] * $product['qty']}}</td>
			<td>
				<form action="" class="product-delete">
					@csrf
					<input type="hidden" name="product_id" value="{{$product['id']}}">
					<button class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
            <tr>
                <td colspan="5" class="text-right">Total Sum</td>
                <td colspan="2">{{session('totalSum')}}</td>
            </tr>
        </tfoot>
</table>
<input type="hidden" class="cart-count-product" value="{{array_sum(array_column( session('cart'), 'qty'))}}">
@else
	My cart is empty
@endif

