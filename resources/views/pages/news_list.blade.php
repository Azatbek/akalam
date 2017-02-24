@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
    @foreach($news as $item)
    <div class="item">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                @if($item->poster)
                  <img class="img-responsive" src="{{asset($item->poster)}}" alt=""> 
                @endif
                </div>
                <div class="col-md-9">
                    <a href="{{url('/'.app()->getLocale().'/news/'.$item->id)}}"><h3 style="margin-top:0px;">{{$item->title}}</h3></a>
                    <p>{{strip_tags($item->anons)}}</p>
                    <footer>
                      <div class="pull-right">{{trans('news.news_page.views')}}: {{$item->hits}} | {{trans('news.news_page.published')}}: {{$item->created_at}}</div>
                    </footer>
                </div>
            </div>
        </div>            
    </div>
    <hr class="style3">
    <br/>
    @endforeach
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
    {!!$news->links()!!}
  </main>
</div>
@endsection
