@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
          <header class="heading">{{app()->getLocale()=='ru' ? $gallery->name : $gallery->name_kk}}</header>
           <figcaption style="margin-top: 20px;">{{strip_tags(app()->getLocale()=='ru' ? $gallery->description : $gallery->description_kk)}}</figcaption>
          <ul class="nospace clear" style="margin-top: 20px;">
          @if(count($gallery->images)>0)
          @foreach($gallery->images as $key=>$images)
            <li class="one_third @if($key%3==0) first @endif"><a class="grouped_elements" rel="gallery" href="/{{$images->image}}"><img src="{{url()->to('/').'/gallery/'.$images->image}}" alt=""></a></li>
          @endforeach
          @endif
          </ul>
         
        </figure>
      </div>
    </div>
    <div class="clear"></div>
  </main>
</div>
@endsection