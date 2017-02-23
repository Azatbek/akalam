@extends('app')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content three_quarter first">
		<div class="col-md-12 col-sm-12">
			<h3>{{$audio->title}}</h3>
			@if($audio->readers) <p>{{trans('default.audio.read_by')}}: {{$audio->readers}}</p> @endif
			<audio controls>
				<source src="/{{$audio->file}}" type="audio/mpeg">
			</audio>

			<footer class="btmspace-15 pull-right">
				<p>{{trans('news.news_page.views')}}: {{$audio->hits}}
				<a class="btn btn-sm btn-default" href="{{url('/'.app()->getLocale().'/audiobooks/'.$audio->category_id.'/'.$audio->id.'#comments')}}">{{trans(('default.audio.goto_comments'))}} </a>
				</p>
			</footer>

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
		</div>
    </div>
    @include('parts.sidebar_right')
    <div class="clear"></div>
  </main>
</div>
@endsection
