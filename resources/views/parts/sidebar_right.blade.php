<div class="sidebar one_quarter">
  <!-- ################################################################################################ -->
  <h4>Категории</h4>
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
    <article>
      <h6>Lorem ipsum dolor</h6>
      <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed.</p>
      <ul>
        <li><a href="#">Lorem ipsum dolor sit</a></li>
        <li>Etiam vel sapien et</li>
        <li><a href="#">Etiam vel sapien et</a></li>
      </ul>
      <p>Nuncsed sed conseque a at quismodo tris mauristibus sed habiturpiscinia sed. Condimentumsantincidunt dui mattis magna intesque purus orci augue lor nibh.</p>
      <p class="more"><a href="#">Continue Reading &raquo;</a></p>
    </article>
  </div>
  <!-- ################################################################################################ -->
</div>
