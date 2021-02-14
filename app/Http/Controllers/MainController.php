<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;
use App\User;
use App\Image;
use App\Journal;
use App\Article;
use App\Like;
use App\OrderItems;
use App\Order;
class MainController extends Controller
{
    public function index() {
        $likes = Like::all();
        $categories = Category::all();                   
        $productsAvailability = Product::where('availability', '=', 1)->paginate(16);
        $productsRecommended = Product::where('recommended', '=', 1)->paginate(16);    
        
        return view('main.index', compact( 'likes', 'productsRecommended', 'productsAvailability', 'categories'));
    }
    public function shop(Request $request) {   

        $categories = Category::all();
        $likes = Like::all();           
             
        $products = Product::where('id', '!=', 0);
        if( $request->min ){
            $products = $products->where('price', '>=', $request->min); 
        }
        if($request->max){
           $products = $products->where('price', '<=', $request->max); 
        }        
        if($request->sortSelect=='recommended'){
            $products =  $products->where('recommended', '=', 1);
        }
        if($request->sortSelect=='availability'){
            $products =  $products->where('availability', '=', 1);
        }
        if($request->sortSelect=='expensive'){
            $products =  $products->orderBy('price', 'DESC');
        }
        if($request->sortSelect=='cheaper'){
            $products =  $products->orderBy('price', 'ASC');
        }
        if($request->sortSelect=='new'){
            $products =  $products->orderBy('created_at', 'DESC');
        }
        if($request->sortSelect=='old'){
            $products =  $products->orderBy('created_at', 'ASC');
        }   

        $products = $products->paginate(24);
        return view('shop.shop', compact('likes', 'products', 'categories'));
    }
    public function contacts()    {                
        $title = 'Contacts'; 
        $categories = Category::all();               
        return view('main.contacts', compact('categories', 'title'));
    }

    public function category(string $slug, Request $request)
    {         
        $categories = Category::all();
        $likes = Like::all(); 
        $productsAvailability = Product::where('availability', '=', 1)->get();
        $productsRecommended = Product::where('recommended', '=', 1)->get();        
        $categoryFirst = Category::firstWhere('slug', $slug);
        $products = Product::where('category_id', $categoryFirst->id);

        if( $request->min ){
            $products = $products->where('price', '>=', $request->min); 
        }
        if($request->max){
           $products = $products->where('price', '<=', $request->max); 
        }        
        if($request->sortSelect=='recommended'){
            $products =  $products->where('recommended', '=', 1);
        }
        if($request->sortSelect=='availability'){
            $products =  $products->where('availability', '=', 1);
        }
        if($request->sortSelect=='expensive'){
            $products =  $products->orderBy('price', 'DESC');
        }
        if($request->sortSelect=='cheaper'){
            $products =  $products->orderBy('price', 'ASC');
        }
        if($request->sortSelect=='new'){
            $products =  $products->orderBy('created_at', 'DESC');
        }
        if($request->sortSelect=='old'){
            $products =  $products->orderBy('created_at', 'ASC');
        }   
        $products = $products->paginate(9);

        return view('shop.category', compact('likes', 'categoryFirst', 'productsAvailability', 'productsRecommended', 'products', 'categories'));
    }
    public function product(string $slug)
    {
        $categories = Category::all();
        $likes = Like::all(); 
        $product = Product::firstWhere('slug', $slug);
        $images = Image::where('product_id', $product->id)->get();
        // dd($images);
        $relatedProductsAll = Product::orderBy('created_at', 'DESC')->paginate(4);
        // dd($relatedProductsAll);
        $reviewsProduct = Review::orderBy('created_at', 'DESC')->where('product_id', $product->id)->get();
        if(isset($product->category->id)){
            $relatedProducts = Product::where('category_id', $product->category->id)->paginate(4);
            return view('shop.product', compact( 'likes', 'product', 'relatedProducts', 'categories', 'reviewsProduct', 'relatedProductsAll', 'images'));
        }
        else {
            return view('shop.product', compact( 'likes', 'product', 'categories', 'reviewsProduct', 'relatedProductsAll', 'images'));
        }        
    }

    public function getReview(Request $request)
    {
        if($request->comment!==null){
            $review = new Review();
            $review->review = $request->comment;
            $review->user_id = $request->user;
            $review->product_id = $request->product;
            $review->save(); 
            return back();    
        }      
        return back();        
    }

    public function about() {
        $categories = Category::all();        
        return view('main.about', compact('categories'));
    }

    public function journal() {
        $categories = Category::all(); 
        $articles = Article::all();       
        return view('main.journal', compact('categories', 'articles'));
    }
    public function search(Request $request) {
        $categories = Category::all();
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%' .$search.'%')->paginate(24);
        // dd($product);
        return view('main.search', compact('categories', 'products'));
    }

    public function cabinet()
    {
        $categories = Category::all();
        $likes = Like::where('user_id', \Auth::user()->id)->get(); 
        $orders = OrderItems::all(); 
        // dd($likes[1]->product->id);
        return view('main.cabinet', compact('categories', 'likes', 'orders'));
    }
    public function bought()
    {

        $categories = Category::all();         
        $orders = Order::where('user_id', \Auth::user()->id)->get();
        // dd($orders[1]->products[0]->name);
        return view('main.bought', compact('categories', 'orders'));
    }
}
