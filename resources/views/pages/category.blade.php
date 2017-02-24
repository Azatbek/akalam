@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <h2>@if(app()->getLocale()=='ru') {{$category->name}} @else {{$category->name_kk}} @endif</h2>
    <div class="content three_quarter first">
    @if($category->lyrics->count() > 0)
    @foreach($category->lyrics as $lyric)
    <div style="margin-bottom: 45px;">
      <div class="pull-right">{{trans('news.news_page.views')}}: {{$lyric->hits}} | {{trans('news.news_page.published')}}: {{$lyric->created_at}}</div>
      <h3><a href="{{url('/'.app()->getLocale().'/lyrics/'.$lyric->id)}}">{{$lyric->title}}</a></h3>
      <div>{{str_limit(strip_tags($lyric->content), 250)}}</div>
      <span class="small pull-right"><a class="btn btn-sm btn-default" href="{{url('/'.app()->getLocale().'/lyrics/'.$lyric->id)}}">{{trans('default.read_more')}}</a></span>
    </div>
    <hr class="style3">
    <br/>
    @endforeach
    @else
    <div style="margin-bottom: 45px;">
      <h4>404 :)</h4>
    </div>
    @endif
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
