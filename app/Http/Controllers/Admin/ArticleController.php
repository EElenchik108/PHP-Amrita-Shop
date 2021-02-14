<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\StoreArticle;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'name' => 'required|unique:articles,name|max:128',
            'slug' => 'nullable|unique:articles,slug|max:128',
            'description' => 'nullable',
            'topic' => 'nullable',
            'text' => 'required',
            'author' => 'nullable',
            'img' => 'nullable|mimes:jpeg,bmp,gif,png,jpg', 
        ]);


        $article = new Article();
        $article->name = $request->name;
        $article->slug = $request->slug;
        $article->topic = $request->topic;
        $article->description = $request->description;
        $article->text = $request->text;
        $article->author = $request->author;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $article->img = '/uploads/' . $fName;
        }
        
        $article->save();
        return redirect('/admin/article');
        return redirect('/admin/article')->with('success', 'Article "' . $article->name . '" added!');
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
        $article = Article::findOrFail($id);                  
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:articles,name|max:128',
            'slug' => 'nullable|unique:articles,slug|max:128',
            'description' => 'nullable',
            'topic' => 'nullable',
            'text' => 'required',
            'author' => 'nullable',
            'img' => 'nullable|mimes:jpeg,bmp,gif,png,jpg', 
        ]);

        $article = Article::findOrFail($id);
        $article->name = $request->name;
        $article->slug = $request->slug;
        $article->topic = $request->topic;
        $article->description = $request->description;
        $article->text = $request->text;
        $article->author = $request->author;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $article->img = '/uploads/' . $fName;
        }
        $article->save();
        return redirect('/admin/article')->with('success', 'Article "' . $article->name . '" edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return back();
    }
}
