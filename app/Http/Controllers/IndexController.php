<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;

class IndexController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $news = News::all()->where('status_id', 3);

        return view('front.news.index', compact('news'));
    }
    
    public function home(){
        return redirect('/');
    }
    
}
