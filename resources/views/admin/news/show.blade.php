@extends('admin.template')

@section('body')
    <div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
                                <a class="btn" href={{ URL::previous() }}>Back</a>
				<hr>
                                <h2 class="text-center">{{ $news->title }}
				<br>
				<small>{{ $news->createdBy->name }} Created at: {!! $news->created_at . ($news->created_at != $news->updated_at ? ' <br>Updated at: ' . $news->updated_at : '') !!}</small>
				</h2>
				<hr>
				{!! $news->content !!}
				<hr>
			</div>
		</div>
	</div>
@endsection