@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
      <div class="pull-right">{{trans('news.news_page.views')}}: {{$lyrics->hits}} | {{trans('news.news_page.published')}}: {{$lyrics->created_at}}</div>
      <h1>{{$lyrics->title}}</h1>
      <div>{!!$lyrics->content!!}</div>
      <span class="small pull-right">@if($lyrics->lang == 1) Публикация на русском @else Қазақ тілінде жазылған @endif</span>
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
