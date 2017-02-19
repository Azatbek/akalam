@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
		@foreach($audios as $audio)
		<div class="col-md-6 col-sm-12">
			<h3>{{$audio->title}}</h3>
			@if($audio->readers) <p>{{trans('default.audio.read_by')}}: {{$audio->readers}}</p> @endif
			<audio controls>
				<source src="/{{$audio->file}}" type="audio/mpeg">
			</audio>

			<footer class="btmspace-15">
				<p>{{trans('news.news_page.views')}}: {{$audio->hits}}</p>
				<div style="float:left;">
				<a class="btn btn-sm btn-default" href="{{url('/'.app()->getLocale().'/audiobooks/'.$audio->category_id.'/'.$audio->id)}}">{{trans(('default.audio.goto'))}}</a>
				<a class="btn btn-sm btn-default" href="{{url('/'.app()->getLocale().'/audiobooks/'.$audio->category_id.'/'.$audio->id.'#comments')}}">{{trans(('default.audio.goto_comments'))}} </a>
				</div>
			</footer>
		</div>
		@endforeach
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
