
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fliyr</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?php echo asset('img/icon.ico');?>">

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
		.ss-q-short{
			font-family: 'Oswald',sans-serif;
		   color:#888; 
		}
		.styled-select select {
		   background: transparent;
		   width: 285px;
		   font-family: 'Oswald',sans-serif;
		   color:#888; 
		   line-height: 1;
		   border: 1px solid #aaa;
		   height: 30px;
		   -webkit-appearance: none;
   		}

		.styled-select {
   				width: 300px;
   				height: 34px;
   				overflow: hidden;
   				margin-top: 7px;
   				margin-bottom: 0px
   			}
   

	</style>
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
        	var person = prompt("Please Enter The Password", "");
        	if(person!="Hummingbird"){
				$('.magic').text("Sorry! You're not authorized. Wait a week for the prelaunch");
        	}
        	$('.magic').css("display",'block');
            // bind 'myForm' and provide a simple callback function 
            $('#ss-form').submit(function(e){
            	e.preventDefault();
            	$('#ss-form').ajaxSubmit();
                	//success: function(){
                	//	 alert("This form has been submitted");
                	//}
            	//});
            }); 
        }); 
    </script> 
</head>
<body>
	<div class="magic" style="">
	<div class="">
		<div class="column large-2" >
			<a href="<?php echo url('/');?>" style="">{{HTML::image('img/logo2.png', 'Fliyr',array('style'=>'width:123px;height:77px;margin:auto;margin-top:15px;display:block'));}}</a>
			
			<p style="text-transform:uppercase;color:#969696;margin:auto;display:block;width:95px;font-weight:300"> Georgia Tech</p>
		
		<div class="large-12 columns">
		<hr style='margin-left:-30px'>
		</div>
	
	<div class="large-12 columns">
	<a href="<?php echo url('/earlyaccess');?>" style="color:#58b946;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">Early Access</a>
	<a href="<?php echo url('/aboutus');?>" style="color:#888;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">Our Service</a>
	</div>
	</div>
	</div>
	<div class="large-10 columns">
	<div class="row" style="margin-top:56px">
		<div style="text-transform:uppercase;color:#58b946;">
		ABOUT US!{{HTML::image('img/icon.png', 'Fliyr',array('style'=>'display:inline-block;width:40px;margin-left:20px;height:auto'));}}
		</div>
	</div>
	
	</div>
	</div>
	</div>
</body>
</html>
