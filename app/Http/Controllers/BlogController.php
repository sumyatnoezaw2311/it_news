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

    public function detail($id){
        $article = Article::find($id);
        return view('blog.detail',compact("article"));
    }

    public function BaseOnCategory($id){
        $articles =Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where('category_id',$id)->with(['user','category'])->latest("id")->paginate(5);
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
