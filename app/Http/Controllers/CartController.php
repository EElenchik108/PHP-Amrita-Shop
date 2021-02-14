<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Product;
use App\Order;
use App\OrderItems;
use Mail;


class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
    	$cart = new CartService();
    	$cart->add($product, $request->qty);
    	return view('shop._cart');
    }
    
    public function clear() {
    	CartService::clear();
    }

    public function remove(Request $request) {
    	CartService::remove($request->product_id);
		return view('shop._cart');
    }

    public function checkout(Request $request) {    	
    	return view('shop.checkout');
	}		

    public function endCheckout() {
    	$order = new Order();
    	$order->user_id = \Auth::user()->id;
    	$order->total_sum = session('totalSum');
    	$order->save();

    	foreach (session('cart') as $product) {
    		$item = new OrderItems();
    		$item->name = $product['name'];
    		$item->img = $product['img'];
			$item->price = $product['price'];

			$item->size = $product['size'];
			$item->metal= $product['metal'];
			$item->stone = $product['stone'];			
			$item->availability = $product['availability'];
			$item->recommended = $product['recommended'];
			
    		$item->qty = $product['qty'];
    		$item->order_id = $order->id;
    		$item->save();
    	}
    	Mail::send('email.order', compact('order'), function($m){
			$m->subject('Order from Amrita website');
			$m->to('EElenchik1@gmail.com');			
    	});

    	CartService::clear();
    	return (redirect('/')->with('success', 'Thank!'));    	
    }

}

 