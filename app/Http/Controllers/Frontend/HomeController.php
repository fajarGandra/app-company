<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Caroseul;
use App\Models\Team;
use App\Models\Article;

class HomeController extends Controller
{
    //
    public function index(){
        $caroseul = Caroseul::Active()->orderBy('item_order', 'ASC')->get();
        $teams = Team::get();
        $articles = Article::get();
        return view('frontend.home.index', compact('caroseul', 'teams', 'articles'));
    }
}
