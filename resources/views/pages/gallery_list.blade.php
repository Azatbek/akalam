@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
    @foreach($galleries as $item)
    <div class="item">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                @if($item->images->first())
                  <img class="img-responsive" src="{{asset($item->images->first()->image)}}" alt=""> 
                @endif
                </div>
                <div class="col-md-9">
                    <a href="{{url('/'.app()->getLocale().'/gallery/'.$item->id)}}"><h3 style="margin-top:0px;">{{$item->name}}</h3></a>
                    <p>{{strip_tags($item->description)}}</p>
                    <footer>
                      <div class="pull-right">{{trans('news.news_page.published')}}: {{$item->created_at}}</div>
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
  </main>
</div>
@endsection
