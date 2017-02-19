<!DOCTYPE html>
<html>
	<head>
		<title>Akalam</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" media="all">
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body id="top">
		<div class="bgded overlay" style="background-image:url('/images/backgrounds/04.png');">
			@include('parts.header')
		</div>
			@yield('content')
		<div class="wrapper row4 bgded overlay" style="background-image:url('/images/backgrounds/04.png');">
			@include('parts.footer')
		</div>
		<div class="wrapper row5">
		<div id="copyright" class="hoc clear">
		    <!-- ################################################################################################ -->
		    <p class="fl_left">Copyright &copy; {{date('Y')}} - <a href="/">akalam.kz</a></p>
		    <p class="fl_right"><a target="_blank" href="http://vk.com/thewebkitchen/" title="Разработка сайтов любой сложности"> {{trans('default.home.developed_by')}}</a></p>
		    <!-- ################################################################################################ -->
		  </div>
		</div>

		<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

		<script src="/js/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		  $('.btn-send').click(function(){
		  	var form = document.forms.namedItem("sendForm"); 
            var formdata = new FormData(form);
            console.log(formdata);
		    $.ajax({
		       url: "{{'/'.app()->getLocale().'/lyrics/store'}}",
		       async: true,
	           type: "POST",
	           contentType: false, // high importance!
	           data: formdata, // high importance!
	           processData: false, // high importance!
		      success: function(data){
		        alert(1);
		      }
		    });
		  });
		});
		</script>
		<script src="/js/jquery.backtotop.js"></script>
		<script src="/js/jquery.mobilemenu.js"></script>
		<script src="/js/jquery.flexslider-min.js"></script>
	</body>
</html>
