<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\StoreCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        // dd($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $category->img = '/uploads/' . $fName;
        }
        $category->save();
        return redirect('/admin/category')->with('success', 'Category "' . $category->name . '" added!');
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
        $category = Category::findOrFail($id);
        // dd($category->name);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(StoreCategory $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $category->img = '/uploads/' . $fName;
        }
        $category->save();
        return redirect('/admin/category')->with('success', 'Category "' . $category->name . '" edited!');
        // return back()->with('success', 'Category "' . $category->name . '" edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return back();
    }
    
}
