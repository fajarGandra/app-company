<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticlesController extends Controller
{
    public function __construct(Article $article, Category $category, Tag $tag)
    {
        $this->article = $article;
        $this->category = $category;
        $this->tag = $tag;
    }
    //
    public function index(){
        $articles = $this->article::orderByViews('desc')->get();
        return view('frontend.article.index', compact("articles"));
    }
    
    public function detail($slug){
        $recent = $this->article::take(5)->get();
        $articles = $this->article::whereSlug($slug)->firstOrFail();
        $category = $this->category::get();
        $tag = $this->tag::get();
        
        $expired = now()->addHours(12);
        //get viewer
        views($articles)
            ->cooldown($expired)
            ->record();

        return view('frontend.article.detail', compact("articles", "category", "tag", "recent"));
    }
}
