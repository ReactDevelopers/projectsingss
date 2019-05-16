<!-- master.blade.php -->

<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#000000" />
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>Welcome To August Media Portal</title>

    <link rel="shortcut icon" href="{{{ asset('favicon.png') }}}">
    <!--StyleSheet Links-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" id="camera-css" href="{{asset('css/camera.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/prettyPhoto.css')}}" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
     
    <!--Javascript Links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
    
	<script type="text/javascript" src="{{asset('js/jquery.mobile.customized.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.easing.1.3.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/camera.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/myscript.js')}}"></script>
    <script src="{{asset('js/sorting.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.isotope.js')}}" type="text/javascript"></script>
    
    <script src="{{asset('js/jquery.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}" type="text/javascript" charset="utf-8"></script>
    
    <!--Fonts-->
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700" rel="stylesheet" type="text/css">
	
        

    </head>

    <body>
        
    
        @include('templates.nav')
        @include('templates.banner')
        @yield('content')
		
           
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    
    @yield('scripts')

	
	<script>
			$(document).ready(function(){
			$(".bhide").click(function(){
				$(".hideObj").slideDown();
				$(this).hide(); //.attr()
				return false;
			});
			/*
			$(".bhide2").click(function(){
				$(".container.hideObj2").slideDown();
				$(this).hide(); // .attr()
				return false;
			});
			*/	
			$('.heart').mouseover(function(){
					$(this).find('i').removeClass('fa-heart-o').addClass('fa-heart');
				}).mouseout(function(){
					$(this).find('i').removeClass('fa-heart').addClass('fa-heart-o');
				});
				
				function sdf_FTS(_number,_decimal,_separator)
				{
				var decimal=(typeof(_decimal)!='undefined')?_decimal:2;
				var separator=(typeof(_separator)!='undefined')?_separator:'';
				var r=parseFloat(_number)
				var exp10=Math.pow(10,decimal);
				r=Math.round(r*exp10)/exp10;
				rr=Number(r).toFixed(decimal).toString().split('.');
				b=rr[0].replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1"+separator);
				r=(rr[1]?b+'.'+rr[1]:b);

				return r;
}
				
			setTimeout(function(){
					$('#counter').text('0');
					$('#counter1').text('0');
					$('#counter2').text('0');
					setInterval(function(){
						
						var curval=parseInt($('#counter').text());
						var curval1=parseInt($('#counter1').text().replace(' ',''));
						var curval2=parseInt($('#counter2').text());
						if(curval<=707){
							$('#counter').text(curval+1);
						}
						if(curval1<=12280){
							$('#counter1').text(sdf_FTS((curval1+20),0,' '));
						}
						if(curval2<=245){
							$('#counter2').text(curval2+1);
						}
					}, 2);
					
				}, 500);
			});
	</script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#menu').slicknav();
		
	});
	</script>
	
	<script type="text/javascript">
    $(document).ready(function(){
       
        var $menu = $("#menuF");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });
	});
    //jQuery
	</script>
	<script>
		/*menu*/
		function calculateScroll() {
			var contentTop      =   [];
			var contentBottom   =   [];
			var winTop      =   $(window).scrollTop();
			var rangeTop    =   200;
			var rangeBottom =   500;
			$('.navmenu').find('a').each(function(){
				contentTop.push( $( $(this).attr('href') ).offset().top );
				contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
			})
			$.each( contentTop, function(i){
				if ( winTop > contentTop[i] - rangeTop && winTop < contentBottom[i] - rangeBottom ){
					$('.navmenu li')
					.removeClass('active')
					.eq(i).addClass('active');				
				}
			})
		};
		
		$(document).ready(function(){
			calculateScroll();
			$(window).scroll(function(event) {
				calculateScroll();
			});
			$('.navmenu ul li a').click(function() {  
				$('html, body').animate({scrollTop: $(this.hash).offset().top - 80}, 800);
				return false;
			});
		});		
	</script>

<!--Pretty Photo--Main Script-->
      <script type="text/javascript" charset="utf-8">
	  $(document).ready(function(){
		  $("a[rel^='prettyPhoto']").prettyPhoto();
	  });
	  </script>
</body>

</html>