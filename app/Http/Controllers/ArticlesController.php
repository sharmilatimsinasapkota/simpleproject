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
    
}
