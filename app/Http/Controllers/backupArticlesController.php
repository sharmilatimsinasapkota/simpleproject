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


    //controller technique
    /*/////////////////////////////////////////*/

    public function show(Article $article){
        return view ('articles.show',['article'=>$article]);
    }

    /*public function show($articleId){
        //dd($articleId);
        $article=Article::find($articleId);
        return view ('articles.show',['article'=>$article]);
    }
*/
/*///////////////////////////////////////////////*/



    public function create(){
        return view('articles.create');
    }

    /**************************** */
    //remove duplicatiion from this to 
    /*
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
    }*/

    //this
    public function store()
    {
        Article::create(request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]));
        return redirect('/articles');
    }
/***************************************************** */

 
    //controller technique
    /*
    public function edit($articleId){
        //dd($articleId);
        $article=Article::find($articleId);
        return view ('articles.edit',['article'=>$article]);
    }
*/
    public function edit(Article $article){
        return view ('articles.edit',['article'=>$article]);
    }





    public function update(Article $article){
        //dd($articleId);
        $article->update(request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]));
        return  redirect('/articles/'.$article->id);
    }


/*
    public function update($id){
        //dd($articleId);
        $article=Article::find($id);
        $article->title=request('title');
        $article->excerpt=request('excerpt');
        $article->body=request('body');
        $article->save();
        return  redirect('/articles/'.$article->id);
    }
    */

}
