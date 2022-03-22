<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class BlogController extends Controller
{
    public function index(){
        $articles =Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(5);

        return view('welcome',compact('articles'));
    }

    public function detail($slug){
        $article = Article::where('slug',$slug)->first();
        if(empty($article)){
            return abort(404);
        }
        return view('blog.detail',compact("article"));
    }

    public function BaseOnCategory($slug){
        $articles =Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where('category_slug',$slug)->with(['user','category'])->latest("id")->paginate(5);
        return view('welcome',compact('articles'));
    }
    public function BaseOnUser($id){
        $articles =Article::where('user_id',$id)->when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(5);
        return view('welcome',compact('articles'));
    }
    public function BaseOnDateTime($dateTime){
        $articles =Article::where('date',$dateTime)->when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(5);
        return view('welcome',compact('articles'));
    }

}
