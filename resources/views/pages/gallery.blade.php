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
          <header class="heading">{{$gallery->name}}</header>
          <ul class="nospace clear" style="margin-top: 20px;">
          @if(count($gallery->images)>0)
          @foreach($gallery->images as $key=>$images)
            <li class="one_third @if($key%3==0) first @endif"><a href="#"><img src="{{url()->to('/').'/gallery/'.$images->image}}" alt=""></a></li>
          @endforeach
          @endif
          </ul>
          <figcaption>{{strip_tags($gallery->description)}}</figcaption>
        </figure>
      </div>
    </div>
    <div class="clear"></div>
  </main>
</div>
@endsection