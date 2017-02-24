@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
      <h2>{{$newsitem->title}}</h2>
      <div class="pull-right" style="margin-bottom:10px;">{{trans('news.news_page.views')}}: {{$newsitem->hits}} | {{trans('news.news_page.published')}}: {{$newsitem->created_at}}</div>

      @if($newsitem->poster) <img class="img-responsive " src="{{asset($newsitem->poster)}}" alt=""> @endif
      <p>{!!$newsitem->description!!}</p>
      <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
      <script src="//yastatic.net/share2/share.js"></script>
    <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
      <footer>
        <div class="comments" id="comments">
          <div id="disqus_thread"></div>
          <script>

          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = '//altyn-kalam.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
          })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


  			</div>
      </footer>
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
