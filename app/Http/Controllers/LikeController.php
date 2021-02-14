<?php

namespace App\Http\Controllers;
use App\Like;
use App\Product;
use App\User;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function add(Request $request)
    {      
        $like = new Like();
        $like->product_id = $request->product_id;
        $like->user_id = $request->user_id;
        $like->save();
    
        // $likeProduct = Like::firstWhere('user_id', $request->user_id)->where('product_id', $request->product_id);
        // if($likeProduct->count()==0){
        //     $like = new Like();
        //     $like->product_id = $request->product_id;
        //     $like->user_id = $request->user_id;
        //     $like->save();
        // }        
        return $request->all();
    }
    public function dell(Request $request)
    {
        $likeProduct = Like::firstWhere('user_id', $request->user_id)->where('product_id', $request->product_id)->delete();
        return $request->all();
    }
}
