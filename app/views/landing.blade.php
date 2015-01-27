<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>Fliyr - Find your venture team</title>
	<meta name="description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
	
	<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Fliyr - Find your venture team">
<meta itemprop="description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
<meta itemprop="image" content="<?php echo asset('img/facebook3.jpg');?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@fliyr">
<meta name="twitter:title" content="Fliyr - Find your venture team">
<meta name="twitter:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
<meta name="twitter:creator" content="@fliyr">
<meta name="twitter:image:src" content="<?php echo asset('img/logo2.png');?>">

<meta property="og:title" content="Fliyr - Find your venture team" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.fliyr.com/" />
<meta property="og:image" content="<?php echo asset('img/facebook3.jpg');?>" />
<meta property="og:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas." />
<meta property="og:site_name" content="Fliyr" />


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<% URL::asset('js/jquery.form.min.js')%>"></script>



<link href='http://fonts.googleapis.com/css?family=Nunito:700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="<?php echo asset('img/icon.ico');?>">
	<%HTML::script('/js/foundation.min.js') %>
	<% HTML::style('css/foundation.css'); %>

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

		
		.venturetext{
			font-size:18px;
			text-transform:lowercase;
			font-weight:300;
		}



		.black{
			background: #333;
		}
		.black:hover{
			background: #666;
		}

		.green,.black{
			
			margin: auto;
			display: inline-block;
			margin-bottom: 10px
		}

		.green{
			background:#58b947;
		}

		.green:hover{
			background:#58d946;
		}

		.biginput{
			line-height: 1.5em;
			height: 30px !important;
			width:98% !important;
			font-size: 20px;
			display: inline-block !important;
			border: 1px solid #888;
			font-family: 'Oswald','Helvetica',Arial,sans-serif;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			padding: 5px;
			border-radius: 5px;
			margin: auto;
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.short{
			width:48%!important;
		}

		.biginput::-webkit-input-placeholder {
   			text-align: center;
   			font-family: 'Oswald','Helvetica',Arial,sans-serif;
		}

		.biginput:-moz-placeholder { /* Firefox 18- */
   			text-align: center;  
   			font-family: 'Oswald','Helvetica',Arial,sans-serif;
		}

		.biginput::-moz-placeholder {  /* Firefox 19+ */
   			text-align: center;  
   			font-family: 'Oswald','Helvetica',Arial,sans-serif;
		}

		.biginput:-ms-input-placeholder {  
   			text-align: center; 
   			font-family: 'Oswald','Helvetica',Arial,sans-serif;
		}


	.light-green-button{
		padding: 5px;
		font-size: 12px;
		padding-right: 8px;
		padding-left: 8px;
		background:#fff;
		border:1px #2AD6AE solid;
		color:#2AD6AE;
		text-transform:uppercase;

	}

	.otherdiv{
		margin-top:20%;
	}
	.flip{
		transform: rotateY(180deg);
		}

	.formbox{
			-webkit-transition: all 0.5s; /* For Safari 3.1 to 6.0 */
			-mozilla-transition: all 0.5s;
    		transition: all 0.5s;
		}
	</style>
	    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 

	        var random=Math.floor((Math.random() * 100) + 1);
	        var array=[];
	        $('#loginerrortext').html(array[random]);

			$("#loginform").submit(function(e){
				e.preventDefault();
				var email=$(this).find('input[name=email]').val();
				var password=$(this).find('input[name=password]').val();
				var request = $.ajax({
				  url: "ajax/login",
				  type: "POST",
				  data: { user_email:email,password:password },
				  success: function(data, textStatus) {
				  		result=JSON.parse(data);
				        if (result.result=='ok') {
				            // data.redirect contains the string URL to redirect to
				            window.location.href = "ventures";
				        }
				        else{
				        	$('#loginerrortext').html(result.message);
				        }
					}
				});
					
			});

			$("#signupform").submit(function(e){
				e.preventDefault();
				var email=$(this).find('input[name=email]').val();
				var password=$(this).find('input[name=password]').val();
				var confirmpassword=$(this).find('input[name=confirmpassword]').val();
				var name=$(this).find('input[name=name]').val()+';'+$(this).find('input[name=lastname]').val();
				var request = $.ajax({
				  url: "ajax/sign-up",
				  type: "POST",
				  data: { user_name:name, user_email:email,user_password:password, user_confirmpassword:confirmpassword  },
				  success: function(data, textStatus) {
				  		result=JSON.parse(data);
				        if (result.result=='ok'){
				        	 $('#signupmodal').foundation('reveal', 'open');
				        	 $('.otherdiv').html('');
				        	 $('body').click(function(){
				            	window.location.href = "/";
				        	 });
				        }
				        else{
				        	$('#signuperrortext').html(result.message);

				        }
					}				  
				});
			});

			$('.formbox').height($('.formbox').width());
			$('.changebutton').click(function(e){
				e.preventDefault();

				$('.formbox').toggleClass('flip');
				if($('#loginform').is(':visible')){
					$('#loginform').hide(500);
					$('#signupform').show(500);
				}
				else if($('#signupform').is(':visible')){
					$('#signupform').hide(500);
					$('#loginform').show(500);
				}
			})
        });
        </script> 	
     
</head>
<body>
	<div id="signupmodal" class="reveal-modal small" data-reveal>
			<p>Welcome to Fliyr! Please check your e-mail to confirm your registration.</p>
	</div>

<div class=" otherdiv" style='margin-top:6%;height:100px;padding:0px;margin:0'>

	<div class="large-7 columns hide-for-small" style='padding:0px'>
					<%HTML::image('img/fliyr_landing1.jpg', 'Fliyr',array('style'=>'width:100%;height:auto;;margin-left:auto;margin-top:10px;margin-right: auto;display:block;'));%><br />
			
	</div>
	
	<div class='large-3 small-12 columns' style='padding:25px;margin-top:11%'>		
	<div class='small-12 columns formbox' style='border:1px solid #7d7d7d;padding:25px'>		
		<form id="loginform">
			<span class='errortext' id='loginerrortext' style='color:#7d7d7d;font-size:12px;font-style:italic'>
				"Winners never quit and quitters never win." -Vince Lombardi
			</span>
			<div class='row' style='margin:auto;'>	
					<input type='text' class='biginput' name="email" placeholder="E-Mail"/>
			</div>
			<div class='row' style='margin:auto;height:80px'>	
					<input type='password' class='biginput' name="password" placeholder="Password"/>
			</div>
			<div class='row' style='margin:auto;text-align:center'>	
					<input type='submit' value="Sign In" class=' button small-centered light-green-button' style=/>	
			</div>

			<div class='row' style="margin:auto;text-align:center">
				<p>or <a href="#" class='changebutton' >Sign Up</a></p>
			</div>
		</form>
		<form id='signupform' class='flip' style="display:none">
			<span class='errortext' id='signuperrortext'></span>
			<div class='row'>
				<input type='text' class='biginput short' name='name' placeholder="First"/>
				<input type='text' class='biginput short' name='lastname' placeholder="Last"/>
			</div>				
			<div class='row'>
			<input type='text' class='biginput' name='email' placeholder="GATech E-Mail"/>
			</div>
			<div class='row'>
			<input type='password' class='biginput' name='password' placeholder="Password"/>
			</div>
			<div class='row'>
			<input type='password' class='biginput' name='confirmpassword' placeholder="Confirm Password"/>
			</div>
			<div class='row' style='text-align:center'>
			<input type='submit' value="Sign Up" class='button light-green-button'  />
			</div>
			<div class='row' style="margin:auto;text-align:center">
			<p>or <a href="#" class='changebutton' >Sign In</a></p>
			</div>
		</form>
	</div>
	</div>
	<div class='column'/>
</div>
</body>
</html>
