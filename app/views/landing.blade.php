<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title>Fliyr - Build your venture team</title>
	<meta name="description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
	
	<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Fliyr - Build your venture team">
<meta itemprop="description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
<meta itemprop="image" content="<?php echo asset('img/facebook3.jpg');?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@fliyr">
<meta name="twitter:title" content="Fliyr - Build your venture team">
<meta name="twitter:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
<meta name="twitter:creator" content="@fliyr">
<meta name="twitter:image:src" content="<?php echo asset('img/logo2.png');?>">

<meta property="og:title" content="Fliyr - Build your venture team" />
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
	<%HTML::script('/js/jquery.form.min.js') %>
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

		

		@media only screen and (max-width:63em){
			.venturetext{
				font-size:1.6rem;
			}
		}

		@media only screen and (min-width:63em) and (max-width: 86em){
			.venturetext{
				font-size:1.8rem;
			}
		}
		@media only screen and (min-width:85em){
				.venturetext{
				font-size:2rem;
			}



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
			height: 40px;
			width:280px;
			font-size: 20px;
			display: block;
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
	</style>
	    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 

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
				        	 window.location.href = result.redirect;
				        }
				        else{
				        	$('#signuperrortext').html(result.message);
				        }
					}				  
				});
			});

			$('.changebutton').click(function(e){
				e.preventDefault();
				$('#loginform').toggle();
				$('#signupform').toggle();
			})			
        });
        </script> 	
     
</head>
<body>

<div class="column large-4 large-offset-4 medium-6 medium-offset-3 small-12 " style="display:block;z-index:1;background-color:rgba(255,255,255,0.8);border:1px solid #ccc;margin-top:8%;">
	<div class="row" >
			<%HTML::image('img/logo2.png', 'Fliyr',array('style'=>'width:auto;height:120px;;margin-left:auto;margin-top:10px;margin-right: auto;display:block;'));%>
	</div>
	
		<div class='row'>
				<p class='venturetext' style="background-color:rgba(255,255,255,0.65);text-align:center">Build your venture team</p>
			</div>
		<form id="loginform">
			<span class='errortext' id='loginerrortext'></span>
		<div class='row' style='margin:auto'>	
				<input type='text' class='biginput' name="email" placeholder="E-Mail"/>
		</div>
		<div class='row' style='margin:auto'>	
				<input type='password' class='biginput' name="password" placeholder="Password"/>
		</div>
		<div class='row' style='margin:auto;text-align:center'>	
				<input type='submit' value="LOGIN" class=' button small-centered small green' style=/>	
		</div>
		<div class='row' style="margin:auto;text-align:center">
			<p>Haven't got an account? <a href="#" class='changebutton' >Sign Up</a></p>
		</div>
			</form>
				<form id='signupform' style="display:none">
				<span class='errortext' id='signuperrortext'></span>
				<div class='row'>
					<input type='text' class='biginput' name='name' placeholder="First Name"/>
				</div>
				<div class='row'>
					<input type='text' class='biginput' name='lastname' placeholder="Last Name"/>
				</div>				
				<div class='row'>
				<input type='text' class='biginput' name='email' placeholder="E-Mail"/>
				</div>
				<div class='row'>
				<input type='password' class='biginput' name='password' placeholder="Password"/>
				</div>
				<div class='row'>
				<input type='password' class='biginput' name='confirmpassword' placeholder="Confirm Password"/>
				</div>
				<div class='row' style='text-align:center'>
				<input type='submit' value="Sign Up" class='button small green'  />
				</div>
				<div class='row' style="margin:auto;text-align:center">
				<p>Already have an account? <a href="#" class='changebutton' >Log In</a></p>
			</div>
				</form>
		</div>
</div>
		
	</div>
</div>



</div>
</body>
</html>
