<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h2 class="heading">{{trans('default.category.title')}}</h2>
      <p>{{trans('default.category.description')}}</p>
    </div>
    <div class="row">
    @if(isset($categories->lyrics))
      @foreach($categories as $key=>$cat)
      <div class="col-md-4 col-lg-4 col-sm-12 services">
              <article><a href="#"><i class="fa fa-leaf"></i></a>
                <h4 class="heading" style="font-size:18px;">@if(app()->getLocale()=='ru'){{ucfirst(strtolower(trim($cat[0]->name)))}} @else{{ucfirst(strtolower($cat[0]->name_kk))}} @endif</h4>
                <ul>
                  @foreach ($cat[0]->lyrics as $child)
                    <li><a href="{{url('/'.app()->getLocale().'/lyrics/'.$child->id)}}">{{ucfirst(strtolower($child->title))}}</a></li>
                  @endforeach
                </ul>
              </article>
      </div>
      @endforeach
      @endif
      </div>
    <!-- ################################################################################################ -->
  </section>
</div>
