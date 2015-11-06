<?php

namespace App\Helpers;

use Zofe\Rapyd\DataGrid\DataGrid;
use \Illuminate\Support\Facades\Auth;
use App\Models\News;


class AdminNewsGrid {

    public static function gridForEditors(&$filter, &$grid) {
        $filter = \DataFilter::source(News::with('createdBy', 'approvedBy', 'status'));
        $filter->add('title', 'Title', 'text');
        $filter->add('content', 'Content', 'text');
        $filter->add('createdBy.name', 'created_by', 'text');
        $filter->add('approvedBy.name', 'approved_by', 'text');
        $filter->add('updated_at', 'Last update date', 'daterange')->format('m/d/Y', 'en');
        $filter->add('created_at', 'Create date', 'daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->attributes(array("class" => "table table-striped"));
        $grid->add('title', 'Title', true);
        $grid->add('updated_at|strtotime|date[m/d/Y]', 'Last update date', true);
        $grid->add('created_at|strtotime|date[m/d/Y]', 'Create date', true);
        $grid->add('content|strip_tags|substr[0,20]', 'Content');
        $grid->add('createdBy.name', 'created_by');
        $grid->add('approvedBy.name', 'approved_by');
        $grid->add('status.title', 'Status');

        $grid->add('status_id', 'Action')->cell(function( $value, $row) {
                    $action = '<a class="btn" href="' . url('admin-news/view') . "/" . $row->id . '"><i class="glyphicon glyphicon-eye-open"></i></a>';
                    if ($value == 2) {
                        return $action;
                    }
                    return '<a title="Modify" href="' . url('admin-news/edit') . '/' . $row->id . 'modify=' . $row->id . '"><span class="glyphicon glyphicon-edit"> </span></a>' .
                            '<a title="Delete" class="text-danger" href="' . url('admin-news/edit') . '/' . $row->id . '?delete=' . $row->id . '"><span class="glyphicon glyphicon-trash"> </span></a>';
                });
        $grid->add('status.id', 'Finish')->cell(function( $value, $row) {
                    if ($value == 2) {
                        return '';
                    }
                    return '<a class="btn btn-success btn-responsive" href="' . url('admin-news/finish') . "/" . $row->id . '"><i class="glyphicon glyphicon-ok"></i> Finish</a>';
                });

        $grid->link(url('admin-news/create'), "Add New", "TR");
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);
    }

    public static function gridForAdmins(&$filter, &$grid) {
        $filter = \DataFilter::source(News::with('createdBy', 'approvedBy', 'status')); //->where('status_id', '<>', 1)
        $filter->add('title', 'Title', 'text');
        $filter->add('content', 'Content', 'text');
        $filter->add('createdBy.name', 'created_by', 'text');
        $filter->add('approvedBy.name', 'approved_by', 'text');
        $filter->add('updated_at', 'Last update date', 'daterange')->format('m/d/Y', 'en');
        $filter->add('created_at', 'Create date', 'daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->attributes(array("class" => "table table-striped"));
        $grid->add('title', 'Title', true);
        $grid->add('updated_at|strtotime|date[m/d/Y]', 'Last update date', true);
        $grid->add('created_at|strtotime|date[m/d/Y]', 'Create date', true);
        $grid->add('content|strip_tags|substr[0,20]', 'Content');
        $grid->add('createdBy.name', 'created_by');
        $grid->add('approvedBy.name', 'approved_by');
        $grid->add('status.title', 'Status');
        $grid->add('view', 'View')->cell(function( $value, $row) {
                    return '<a class="btn btn-responsive" href="' . url('admin-news/view') . "/" . $row->id . '"><i class="glyphicon glyphicon-eye-open"></i></a>';
                });

        $grid->add('status.id', 'Approve')->cell(function( $value, $row) {
                    if ($value == 2) {
                        return '<a class="btn btn-success btn-responsive" href="' . url('admin-news/approve') . "/" . $row->id . '"><i class="glyphicon glyphicon-ok"></i> Approve</a>';
                    }
                    return '';
                });
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);
    }
}

?>
