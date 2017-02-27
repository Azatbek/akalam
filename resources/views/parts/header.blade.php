<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <a href="/{{app()->getLocale()}}"><img src="{{asset('images/logo.png')}}"/></a>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="/">{{trans('default.home.main')}}</a></li>
        <li class="drop"><a href="{{url('/'.app()->getLocale().'/page/about')}}">{{trans('default.home.about')}}</a>
          <ul>
            <li><a href="/{{app()->getLocale()}}/gallery">{{trans('default.home.aboutus')}}</a></li>
            <li><a href="/{{app()->getLocale()}}/gallery">{{trans('default.home.gallery')}}</a></li>
            <li><a href="/{{app()->getLocale()}}/videoblog">{{trans('default.home.video')}}</a></li>
          </ul>
        </li>
        <!-- <li><a class="drop" href="#">Dropdown</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
            <li><a href="#">Level 2</a></li>
          </ul>
        </li> -->
        <li><a href="{{url('/'.app()->getLocale().'/page/statement')}}">{{trans('default.home.rules')}}</a></li>
        <li><a href="/{{app()->getLocale()}}/news">{{trans('default.home.news')}}</a></li>
        <li class="drop"><a href="/{{app()->getLocale()}}/lyrics">{{trans('default.home.lyrics')}}</a>
          <ul>
            <li><a href="/{{app()->getLocale()}}/categories">Архив</a></li>
          </ul>
        </li>
        <li><a href="/{{app()->getLocale()}}/audiobooks">{{trans('default.home.audio')}}</a></li>
        <li><a class="drop" href="#">{{trans('default.home.lang')}}</a>
          <ul>
            <li><a href="/{{app()->getLocale()}}/language/kk">{{trans('default.home.langs.kk')}}</a></li>
            <li><a href="/{{app()->getLocale()}}/language/ru">{{trans('default.home.langs.ru')}}</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
