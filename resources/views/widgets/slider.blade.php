<div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="flexslider basicslider">
      <ul class="slides clear">
      @foreach($press as $item)
        <li style=";margin-right: 0px;float: left;display: block;background-image: url({{$item->poster}});background-position: center;background-repeat: no-repeat;background-size: 100%;">
          <article style="z-index: 2;">
            <p>{!! $item->anons !!}</p>
            <h2 class="heading">{{$item->title}}</h2>
            <footer>
              <ul class="nospace inline pushright">
                <li><a class="btn" href="{{url('/'.app()->getLocale().'/news',$item->id)}}">Перейти</a></li>
              </ul>
            </footer>
          </article>
        </li>
      @endforeach
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>