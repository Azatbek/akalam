<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h2 class="heading">Morbi rhoncus quam eget</h2>
      <p>Massa eleifend aliquet cras eu elit eget ipsum vehicula rutrum</p>
    </div>
    <ul class="nospace group services">
      @foreach($categories as $key=>$cat)
        @if($loop->first)
          <li class="one_third first">
        @else
          <li class="one_third">
        @endif
            <article><a href="#"><i class="fa fa-leaf"></i></a>
              <h6 class="heading">@if(app()->getLocale()=='ru') {{$cat->name}} @else {{$cat->name_kk}} @endif</h6>
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
