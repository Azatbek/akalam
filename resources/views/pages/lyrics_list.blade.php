@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
  
    <div class="content three_quarter first" >
    @foreach($lyrics as $lyric)
    <div style="margin-bottom: 90px;">
      <div class="pull-right">{{trans('news.news_page.views')}}: {{$lyric->hits}} | {{trans('news.news_page.published')}}: {{$lyric->created_at}}</div>
      <h1><a href="{{url('/'.app()->getLocale().'/lyrics/'.$lyric->id)}}">{{$lyric->title}}</a></h1>
      <div>{!!$lyric->content!!}</div>
      <span class="small pull-right">@if($lyric->lang == 1) Публикация на русском @else Қазақ тілінде жазылған @endif</span>
    </div>
    @endforeach
    </div>
  
    @include('parts.sidebar_right')
    <div class="clear"></div>
    
  </main>
</div>
@endsection