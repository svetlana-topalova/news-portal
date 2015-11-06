<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $news = News::all()->where('status_id', 3);

        return view('front.news.index', compact('news'));
    }

    public function home() {
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $news = News::find($id);
        if ($news->status_id != 3) {
            return redirect('/');
        }

        return view('front.news.show', compact('news'));
    }

}
