<!DOCTYPE html>
<html>
	<head>
		<title>Akalam</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" media="all">
	</head>
	<body id="top">
		<div class="bgded overlay" style="background-image:url('images/backgrounds/01.png');">
			@include('parts.header')
		</div>
			@yield('content')
		<div class="wrapper row4 bgded overlay" style="background-image:url('images/backgrounds/03.png');">
			@include('parts.footer')
		</div>
		<div class="wrapper row5">
		<div id="copyright" class="hoc clear">
		    <!-- ################################################################################################ -->
		    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">Domain Name</a></p>
		    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
		    <!-- ################################################################################################ -->
		  </div>
		</div>

		<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		  $('.btn-send').click(function(){
		    $.ajax({
		      url: "{{'/'.app()->getLocale().'/lyrics/store'}}",
		      type: "post",
		      data: {'title':$('input[name=title]').val(), '_token': $('input[name=_token]').val(), 'lang':$('input[name=lang]').val(),
		            'content':$('input[name=content]').val(), 'category_id': $('input[name=category_id]').val(), 'author':$('input[name=author]').val()
		      },
		      success: function(data){
		        alert(data);
		      }
		    });
		  });
		});
		</script>
		<script src="js/jquery.backtotop.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.flexslider-min.js"></script>
	</body>
</html>
