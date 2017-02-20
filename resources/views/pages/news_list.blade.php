@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
    @foreach($news as $item)
    <div>
      <div class="pull-right">{{trans('news.news_page.views')}}: {{$item->hits}} | {{trans('news.news_page.published')}}: {{$item->created_at}}</div>
      <a href="{{url('/'.app()->getLocale().'/news/'.$item->id)}}"><h1>{{$item->title}}</h1></a>
      @if($item->poster) <img class="imgr borderedbox inspace-5" src="{{asset($item->poster)}}" alt=""> @endif
      <div>{!!$item->anons!!}</div>
    </div>
    @endforeach
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
    {!!$news->links()!!}
  </main>
</div>
@endsection
