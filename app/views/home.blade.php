<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>Fliyr</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Nunito:700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?php echo asset('img/icon.ico');?>">
	{{HTML::script('/js/foundation.min.js') }}
	{{HTML::script('/js/jquery.form.min.js') }}
	{{ HTML::style('css/foundation.css'); }}

	<style type="text/css">
		::-webkit-input-placeholder{  
   			font-family: 'Nunito', sans-serif;
   			 padding-top: -3px;
		}
		:-moz-placeholder{
			font-family: 'Nunito', sans-serif;
			font-size: 1.2em;
		} 

		::-moz-placeholder{
			font-family: 'Nunito', sans-serif;
			font-size: 1.2em;
		} 

		:-ms-input-placeholder{
			font-family: 'Nunito', sans-serif;
			font-size: 1.2em;
		}

		select{
			width: 250px;
		}

		body{
			background: url(img/fliyr_LandPage_Background.jpg) no-repeat;
			background-size: cover;
		}

		.black{
			background:#000;
		}

		.black:hover{
			background:#333;
		}
		
		@media only screen and (min-width:63em){
			.two{
				margin-right: 10px;
			
			}
		}
		@media only screen and (min-width:63em){
			.black{
				margin-right: 50px;
				float: right;
			}

			.two{
				margin-right: 10px;
				float: right;
			}
		}
	</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41260149-2', 'auto');
  ga('send', 'pageview');

</script>
	    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
        	var person = prompt("Please Enter The Password", "");
        	if(person!=""){//Hummingbird92614
				$('.magic').text("Sorry! You're not authorized. Wait a week for the prelaunch");
        	}
        	$('.magic').css("display",'block');
        });
        </script>
     
</head>
<body>
<div class="column large-12 magic" style="display:none">
	<div class="small-12 medium-12 column large-4 large-offset-4" >
			{{HTML::image('img/logo2.png', 'Fliyr',array('style'=>'width:50%;height:auto;margin-top:50px;margin-left:auto;margin-right: auto;display:block;'));}}
		<div class='row'>
			<div class="column small-12 medium-8 medium-offset-2 large-9 large-offset-2" >
				<p style="text-align:center">Uniting the expertise and inspiration of
				the community to launch successful ideas</p>
			</div>
			<div class="column large-12" style="font-size:1.1em">
			<!--<a href="#" class="button tiny right black" style="background:#58b946;margin-right:13px;" >EARLY ACCESS</a></div>-->
			<a href="<?php echo url('/earlyaccess');?>" class="button tiny black small-push-2 medium-push-4 large-push-0" style="background:#58b946;text-transform:uppercase;">georgia tech sign up</a>	
				<a href="<?php echo url('/aboutus');?>" class="button tiny black two small-push-4 medium-push-4 large-push-0" style="text-transform:uppercase;">learn more</a>	

			</div>
		</div>
	</div>
</div>
</body>
</html>
