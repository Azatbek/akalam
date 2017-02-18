<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h2 class="heading">{{trans('default.category.title')}}</h2>
      <p>{{trans('default.category.description')}}</p>
    </div>
    <ul class="nospace group services">
      @foreach($categories as $key=>$cat)
        @if($loop->first)
          <li class="one_third first">
        @else
          <li class="one_third">
        @endif
            <article><a href="#"><i class="fa fa-leaf"></i></a>
              <h4 class="heading">@if(app()->getLocale()=='ru') {{$cat->name}} @else {{$cat->name_kk}} @endif</h4>
              <ul>
                @foreach ($cat->lyrics as $child)
                  <li>{{$child->title}}</li>
                @endforeach
              </ul>
            </article>
          </li>
      @endforeach
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
