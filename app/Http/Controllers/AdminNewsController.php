<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\NewsRequest;
use App\Http\Controllers\Controller;
use App\Models\News,
    App\User;
use Input;
use Redirect;
use Zofe\Rapyd\DataGrid\DataGrid;
use \Illuminate\Support\Facades\Auth;
use App\Helpers\AdminNewsGrid;

class AdminNewsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('editor', ['only' => ['anyCreate', 'anyEdit', 'anyFinish']]);
        $this->middleware('admin', ['only' => ['anyApprove']]);
    }

    public function getList() {
        $filter;
        $grid;
        if (Auth::user()->isAdmin()) {
            AdminNewsGrid::gridForAdmins($filter, $grid);
        } else {
            AdminNewsGrid::gridForEditors($filter, $grid);
        }

        return view('admin.news.index', compact('filter', 'grid'));
    }

    public function anyCreate() {
        $form = \DataEdit::source(new News());
        $form->label('Create News');
        $form->link(url('admin-news/list'), "News", "TR")->back();
        $form->add('title', 'Title', 'text')->rule('required|min:5');

        $form->add('content', 'Content', 'redactor');
        $form->add('created_by', '', 'hidden')->insertValue(Auth::user()->id);
        $form->add('status', '', 'hidden')->insertValue(1);
        $form->saved(function() use ($form) {
                    $form->message("Successfully saved");
                });
        return view('admin.news.create', compact('form'));
    }

    public function anyEdit($id) {
        if (\Input::get('do_delete') == 1)
            return "not the first";

        $edit = \DataEdit::source(News::find($id));
        $edit->label('Edit News');
        $edit->link(url('admin-news/list'), "News", "TR")->back();
        $edit->add('title', 'Title', 'text')->rule('required|min:5');

        $edit->add('content', 'Content', 'redactor');

        return $edit->view('admin.news.edit', compact('edit'));
    }

    public function anyFinish($id) {
        $news = News::find($id);
        if ($news->status->id == 1) {
            $edit = \DataEdit::source($news);
            $edit->label('Finish News: ' . $news->title);
            $edit->link(url('admin-news/list'), "News", "TR")->back();
            $edit->add('status_id', '', 'hidden')->insertValue(2);

            return $edit->view('admin.news.edit', compact('edit'));
        } else {
            return redirect('/');
        }
    }

    public function anyApprove($id) {
        $news = News::find($id);
        if ($news->status->id == 2) {
            $edit = \DataEdit::source($news);
            $edit->label('Approve News: ' . $news->title);
            $edit->link(url('admin-news/list'), "News", "TR")->back();
            $edit->add('status_id', '', 'hidden')->insertValue(3);
            $edit->add('approved_by', '', 'hidden')->insertValue(Auth::user()->id);

            return $edit->view('admin.news.edit', compact('edit'));
        } else {
            return redirect('/');
        }
    }

    public function anyView($id) {
        $news = News::find($id);
        return view('admin.news.show', compact('news'));
    }

}
