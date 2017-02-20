@extends('app')
@section('content')
<div class="wrapper row3">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="sectiontitle center">
      <h2 class="heading">{{trans('default.category.title')}}</h2>
      <p>{{trans('default.category.description')}}</p>
    </div>
    <div class="row">
      @foreach($categories as $key=>$cat)
          <div class="col-md-4 col-lg-4 col-sm-12 services">
            <article><i class="fa fa-leaf"></i>
              <a href="{{url('/'.app()->getLocale().'/category/'.$cat['id'])}}"><h6 class="heading">@if(app()->getLocale()=='ru') {{$cat['name']}} @else {{$cat['name_kk']}} @endif</h6></a>
              @if(count($cat['childs'])>0)
              <ul>
                @foreach ($cat['childs'] as $child)
                  <li><a href="{{url('/'.app()->getLocale().'/category/'.$cat['id'])}}">@if(app()->getLocale()=='ru') {{$child['name']}} @else {{$child['name_kk']}} @endif</a></li>
                @endforeach
              </ul>
              @endif
            </article>
          </div>
      @endforeach
    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
@endsection
