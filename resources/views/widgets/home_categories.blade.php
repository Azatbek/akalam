<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h2 class="heading">Алтын қалам {{date('Y')}}</h2>
      <p>{{trans('default.category.description')}}</p>
    </div>
    <div class="row">
      @foreach($categories as $key=>$cat)
      @if(isset($cat[0]))
      <div class="col-md-4 col-lg-4 col-sm-12 services">
              <article><a href=""><i class="fa fa-leaf"></i></a>
                <a href="{{url('/'.app()->getLocale().'/category/'.$cat[0]->id)}}"
                <h4 class="heading" style="font-size:18px;">@if(app()->getLocale()=='ru'){{trim($cat[0]->name)}} @else{{$cat[0]->name_kk}} @endif</h4></a>
                <ul>
                  @foreach ($cat[0]->lyrics as $child)
                      <li><a href="{{url('/'.app()->getLocale().'/lyrics/'.$child->id)}}">{{$child->title}}</a></li>
                  @endforeach
                </ul>
              </article>
      </div>
      @endif
      @endforeach
      </div>
    <!-- ################################################################################################ -->
  </section>
</div>
