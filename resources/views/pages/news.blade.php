@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
      <div class="pull-right">{{trans('news.news_page.views')}}: {{$newsitem->hits}} | {{trans('news.news_page.published')}}: {{$newsitem->created_at}}</div>
      <h1>{{$newsitem->title}}</h1>
      @if($newsitem->poster) <img class="imgr borderedbox inspace-5" src="{{asset($newsitem->poster)}}" alt=""> @endif
      <div>{!!$newsitem->description!!}</div>
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
