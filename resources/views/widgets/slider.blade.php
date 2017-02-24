<div id="pageintro" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="flexslider basicslider">
      <ul class="slides clear">
      @foreach($press as $item)
      @if($item->poster)
        <li style="height:480px;margin-right: 0px;float: left;display: block;background-image: url({{$item->poster}});background-position: center;background-repeat: no-repeat;background-size: 100%;">
          <article style="z-index: 2;font-size: 12px;">
            <p>{!! $item->anons !!}</p>
            <span style="font-size:26px;">{{$item->title}}</span>
            <footer>
              <ul class="nospace inline pushright" style="margin-top: 20px;">
                <li><a class="btn" href="{{url('/'.app()->getLocale().'/news',$item->id)}}">Перейти</a></li>
              </ul>
            </footer>
          </article>
        </li>
        @endif
      @endforeach
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
