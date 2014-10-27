<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
		p { background-color:white; filter:alpha(opacity=60); opacity:.6; }

	</style>

	    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
        	var person = prompt("Please Enter The Password", "");
        	if(person!="Hummingbird92614"){
				$('.magic').text("Sorry! You're not authorized. Wait a week for the prelaunch");
        	}
        	$('.magic').css("display",'block');
        });
        </script>
     
</head>
<body>
<div class="column large-12 magic" style="display:none">
	<div class="column large-4 large-offset-4" >
			{{HTML::image('img/logo2.png', 'Fliyr',array('style'=>'width:200px;height:auto;margin-top:50px;margin-left:auto;margin-right: auto;display:block;'));}}
		<div class='row'>
			<div class="column large-12" style="font-size:1.1em;text-align:center">
				Uniting the expertise and inspiration of <br>the community to launch successful ideas
			</div>
			<div class="column large-12" style="font-size:1.1em">
			<!--<a href="#" class="button tiny right black" style="background:#58b946;margin-right:13px;" >EARLY ACCESS</a></div>-->
			<a href="<?php echo url('/earlyaccess');?>" class="button tiny right black" style="background:#58b946;margin-top:10px;margin-right:50px;text-transform:uppercase">georgia tech sign up</a>	
				<a href="<?php echo url('/aboutus');?>" class="button tiny right black" style="margin-top:10px;margin-right:10px;text-transform:uppercase">learn more</a>	

			</div>
		</div>
	</div>
</div>
</body>
</html>
