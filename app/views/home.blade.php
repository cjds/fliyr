<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fliyr</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	{{HTML::script('/js/foundation.min.js') }}
	{{HTML::script('/js/jquery.form.min.js') }}
	{{ HTML::style('css/foundation.css'); }}

	<style type="text/css">
		::-webkit-input-placeholder{  
   			font-family: 'Roboto', sans-serif;
   			 padding-top: -3px;
		}
		:-moz-placeholder{
			font-family: 'Roboto', sans-serif;
			font-size: 1.2em;
		} 

		::-moz-placeholder{
			font-family: 'Roboto', sans-serif;
			font-size: 1.2em;
		} 

		:-ms-input-placeholder{
			font-family: 'Roboto', sans-serif;
			font-size: 1.2em;
		}

		select{
			width: 250px;
		}

		body{
			background: url(img/fliyr_LandPage_Background.jpg) no-repeat;
			background-size: cover;
		}

	</style>
     
</head>
<body>
<div class="column large-4 large-offset-4">
			{{HTML::image('img/logo.png', 'Flyur',array());}}
</div>
<div class="column large-4 large-offset-4" style='font-size:30px'>
	<div class='row'>
		<div class="column large-12">
			Utilising the expertise and inspiration of the community to launch successfful ideas
		</div>
			<a href="#" class="button tiny">learn more</a>	
		</div>
	
</div>
<div class="column large-4">

			{{HTML::image('img/logo.png', 'Flyur',array());}}
		
	
</div>
</body>
</html>
