<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(){
        $articles=Article::latest()->get();
        return view ('articles.index',['articles'=>$articles]);
    }
    public function show($articleId){
        //dd($articleId);
        $article=Article::find($articleId);
        return view ('articles.show',['article'=>$article]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
            ]);
        $article=new Article();
        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->body=request('body');
        $article->save();
        return redirect('/articles');
    }
 
    public function edit($articleId){
        //dd($articleId);
        $article=Article::find($articleId);
        return view ('articles.edit',['article'=>$article]);
    }

    public function update($id){
        //dd($articleId);
        $article=Article::find($id);
        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->body=request('body');
        $article->save();
        return  redirect('/articles/'.$article->id);
    }

}
