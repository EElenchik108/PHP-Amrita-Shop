<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use App\Category;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categories = Category::all();        
        return view('admin.product.create', compact('categories'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        //dd($request->images);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->metal = $request->metal;
        $product->stone = $request->stone;
        $product->recommended = $request->recommended;
        $product->availability = $request->availability;
        $product->category_id = $request->category;
        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $product->img = '/uploads/' . $fName;
        }
        $product->save();
        $images = $request->file('images');
        // dd($images);
        if(isset($images)){
            foreach($images as $image){            
                $img = new Image();
                $img->product_id = $product->id;
                $fName = $image->getClientOriginalName();
                $image->move( public_path('uploads'), $fName );
                $img->img = '/uploads/' . $fName;
                $img->save();    
            }   
        }
        return redirect('/admin/product')->with('success', ' Product "' . $product->name . '" added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $categories = Category::all();   
        $product= Product::findOrFail($id);
        $imagesProduct = $product->images;
        // dd($imagesProduct);     
        return view('admin.product.edit', compact('product', 'categories', 'imagesProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->metal = $request->metal;
        $product->stone = $request->stone;
        $product->recommended = $request->recommended;
        $product->availability = $request->availability;
        $product->category_id = $request->category;
        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $product->img = '/uploads/' . $fName;
        }
        $product->save();
        $images = $request->file('images');
        // dd($images);
        if($images){
            // Image::findOrFail($id)->delete();
            Image::where('product_id', $id)->delete();
            foreach($images as $image){            
                $img = new Image();
                $img->product_id = $product->id;
                $fName = $image->getClientOriginalName();
                $image->move( public_path('uploads'), $fName );
                $img->img = '/uploads/' . $fName;
                $img->save();    
            }  
        }        
        return (redirect('/admin/product')->with('success', ' Product "' . $product->name . '" edited!'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back();
    }
}






