@extends('front.template')

@section('content')

@if(!count($news))
No news to display
@endif

@foreach($news as $newsArticle)
<div class="box">
    <div class="col-lg-12">
        <hr>
        <h2 class="text-center">{{ $newsArticle->title }}
            <br>
            <small>{{ $newsArticle->createdBy->name }} Created at: {!! $newsArticle->created_at . ($newsArticle->created_at != $newsArticle->updated_at ? ' <br>Updated at: ' . $newsArticle->updated_at : '') !!}</small>
        </h2>
        <hr>
        <div class="col-lg-12 text-center">
            {!! (strlen(strip_tags($newsArticle->content)) > 250) ? substr(strip_tags($newsArticle->content), 0, 246).'...' : strip_tags($newsArticle->content) !!}
            <hr>
        </div>
        <div class="col-lg-12 text-center">
            {!! link_to('news/' . $newsArticle->id, 'Read more', ['class' => 'btn btn-default btn-lg']) !!}
            <hr>
        </div>
    </div>
</div>
@endforeach

@stop

