<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Utils;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(5);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category"=> "required|exists:categories,id",
            "title"=> "required|min:5|max:200",
            "description"=>"required|min:10",
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->user_id = Auth::user()->id;
        $article->description = $request->description;
        $article->save();
        return redirect()->route('article.index')->with('articleAddedStatus',"New article has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "category"=> "required|exists:categories,id",
            "title"=> "required|min:5|max:200",
            "description"=>"required|min:10",
        ]);

        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->description = $request->description;
        $article->update();
        return redirect()->route('article.index')->with('articleUpdatedStatus',"Your article has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index',['page'=>request()->page])->with('articleDeletedStatus','Your article has been deleted.');
    }
}
