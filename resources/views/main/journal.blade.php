@extends('mainlayouts.main')
@section('content')

<div class="containerJournal">    
    <h3 class="h3Main">.AMRITA.JOURNAL</h3>
    <hr align="center">    
    
    <div class="containerArticle">
        @foreach($articles as $article)
        <div class="article">
            <a href="">
                <img src="{{$article->img}}" alt="">	
                <h5 class="artName">{{$article->name}}</h5>
            </a>
                <div class="artInfo">
                    <p class="artAuthor">{{$article->author}}</p>
                    <p class="">{{$article->created_at}}</p>					
                </div>
            <p>{{$article->description}}</p>
            <a href="" class="readMore">Read more ></a>                        
        </div>                                        
        @endforeach   
       
    </div>	
</div>
	
@endsection