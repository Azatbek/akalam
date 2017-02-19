<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="/{{app()->getLocale()}}">Akalam</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="/">{{trans('default.home.main')}}</a></li>
        <li><a href="#">{{trans('default.home.about')}}</a></li>
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
        <li><a href="#">{{trans('default.home.rules')}}</a></li>
        <li><a href="/{{app()->getLocale()}}/news">{{trans('default.home.news')}}</a></li>
        <li><a href="/{{app()->getLocale()}}/lyrics">{{trans('default.home.lyrics')}}</a></li>
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
