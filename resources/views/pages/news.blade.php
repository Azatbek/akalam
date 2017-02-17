@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
      <div class="pull-right">{{$news->created_at}}</div>
      <h1>{{$news->title}}</h1>
      <img class="imgr borderedbox inspace-5" src="{{asset($news->poster)}}" alt="">
      <div>{!!$news->description!!}</div>
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
