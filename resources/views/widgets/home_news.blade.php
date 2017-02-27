<div class="wrapper row2">
  <div class="hoc container clear">
  <center><h2 class="heading">{{trans('default.home.news')}}</h2></center>
    @foreach($news as $item)
    <!-- ################################################################################################ -->
     @if ($loop->first)
        <article class="one_third first">
     @else
        <article class="one_third">
     @endif
          <img src="{{url()->to('/').'/newsimg/'.$item->poster}}" alt="">
          <a href="{{url('/'.app()->getLocale().'/news/'.$item->id)}}"><h4 class="heading">{{$item->title}}</h4></a>
          <p class="btmspace-20">{!! strip_tags($item->anons) !!} [&hellip;]</p>
          <footer class="btmspace-15"><a href="{{url('/'.app()->getLocale().'/news/'.$item->id)}}">{{trans(('default.read_more'))}} &raquo;</a></footer>
        </article>
    @endforeach
    <!-- ################################################################################################ -->
  </div>
</div>
