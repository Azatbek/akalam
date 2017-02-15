<div class="wrapper row2">
  <div class="hoc container clear">
    @foreach($news as $item)
    <!-- ################################################################################################ -->
     @if ($loop->first)
        <article class="one_third first">
     @else
        <article class="one_third">
     @endif
          <h6 class="heading font-x1">{{$item->title}}</h6>
          <a href="#"><img src="{{$item->poster}}" alt=""></a>
          <p class="btmspace-30">{!! $item->anons !!} [&hellip;]</p>
          <footer class="btmspace-15"><a href="#">{{trans(('default.read_more'))}} &raquo;</a></footer>
        </article>
    @endforeach
    <!-- ################################################################################################ -->
  </div>
</div>
