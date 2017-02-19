<div class="sidebar one_quarter">
  <!-- ################################################################################################ -->
  <h4>{{trans('default.sidebar.categories')}}</h4>
  @if(Route::currentRouteName() == 'AudioRoute')
  <nav class="sdb_holder">
      <ul>
        @foreach($categories as $cat)
          <li><a href="{{url('/'.app()->getLocale().'/audiobooks/'.$cat['id'])}}">@if(app()->getLocale()=='ru') {{$cat['name']}} @else {{$cat['name_kk']}} @endif</a>
            @if(isset($cat['childs']))
            <ul>
              @foreach($cat['childs'] as $child)
                <li><a href="{{url('/'.app()->getLocale().'/audiobooks/'.$child['id'])}}">@if(app()->getLocale()=='ru') {{$child['name']}} @else {{$child['name_kk']}} @endif</a></li>
              @endforeach
            </ul>
            @endif
          </li>
        @endforeach
      </ul>
    </nav>
  @else 
    <nav class="sdb_holder">
      <ul>
        @foreach($categories as $cat)
          <li><a href="{{url('/'.app()->getLocale().'/category/'.$cat['id'])}}">@if(app()->getLocale()=='ru') {{$cat['name']}} @else {{$cat['name_kk']}} @endif</a>
            @if(isset($cat['childs']))
            <ul>
              @foreach($cat['childs'] as $child)
                <li><a href="{{url('/'.app()->getLocale().'/category/'.$child['id'])}}">@if(app()->getLocale()=='ru') {{$child['name']}} @else {{$child['name_kk']}} @endif</a></li>
              @endforeach
            </ul>
            @endif
          </li>
        @endforeach
      </ul>
    </nav>
    <div class="sdb_holder">
      <h4>{{trans('default.sidebar.best_lyrics')}}</h4>
      <ul>
        @foreach($lyrics as $item)
        <li><a href="{{url('/'.app()->getLocale().'/lyrics/'.$item->id)}}">{{$item->title}}</a></li>
        @endforeach
      </ul>
    </div>
     <div class="sdb_holder">
      <h4>{{trans('default.sidebar.last_lyrics')}}</h4>
      <ul>
        @foreach($last_lyrics as $item)
        <li><a href="{{url('/'.app()->getLocale().'/lyrics/'.$item->id)}}">{{$item->title}}</a></li>
        @endforeach
      </ul>
    </div>
  @endif
  <!-- ################################################################################################ -->
</div>
