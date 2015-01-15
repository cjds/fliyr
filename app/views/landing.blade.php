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
			.black,.green{
				margin-right: 0px;
				float: right;
			}
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

		.green{
			background:#58b947;
		}

		.green:hover{
			background:#58d946;
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
        	//var person = prompt("Please Enter The Password", "");
        	if(false){//person!=""){//Hummingbird92614
				$('.magic').text("Sorry! You're not authorized. Wait a week for the prelaunch");
        	}
        	$('.magic').css("display",'block');
        	var images=[
        	'<?php echo asset('img/b1.JPG')?>','<?php echo asset('img/b2.JPG')?>','<?php echo asset('img/b3.JPG')?>','<?php echo asset('img/b4.JPG')?>','<?php echo asset('img/b5.JPG')?>',]
        	var count=0;
        	var change_background = function() {
        				
  					
  					$(".magic2").stop();	
  					$(".magic2").animate({'opacity':0},500,function(){
  							$( ".magic2" ).attr('src',images[count]);			
	  							$( ".magic2" ).css('opacity',1.0);
  							$( ".magic1" ).attr('src',images[(count+1>images.length-1?0:count+1)]);				
  							
  						});
  					
  					
  					if(count<images.length-1)count++;
  					else count=0;
  					
  					
  					//$('body').slow({backgroundColor:'#fff'},2000);

			};

			var interval = 4000  ; // where X is your every X minutes

			setInterval(change_background, interval);

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

					}
				});
					
			});

			$("#signupform").submit(function(e){
				e.preventDefault();
				var email=$(this).find('input[name=email]').val();
				var password=$(this).find('input[name=password]').val();
				var confirmpassword=$(this).find('input[name=confirmpassword]').val();
				var name=$(this).find('input[name=name]').val();
				var request = $.ajax({
				  url: "ajax/sign-up",
				  type: "POST",
				  data: { user_name:name, user_email:email,user_password:password, user_confirmpassword:confirmpassword  },
				  success: function(data, textStatus) {
				        if (data.redirect) {
				            // data.redirect contains the string URL to redirect to
				            window.location.href = data.redirect;
				        }
					}				  
				});
			});
			
        });
        </script> 	
     
</head>
<body>
<div class="column large-12 " style="display:block;width:100%;height:100%;z-index:-1;position:absolute;overflow:hidden;;margin:0;padding:0">
<img class="magic1" src="<?php echo asset('img/b2.JPG')?>" style="min-width:908px;width:100%;overflow:hidden;z-index:0;top:0;left:0;position:absolute"/>
<img class="magic2" src="<?php echo asset('img/b1.JPG')?>" style="min-width:908px;width:100%;overflow:hidden;z-index:1;top:0;left:0;position:absolute"/>

</div>
<div class="column large-12 " style="display:block;z-index:1;background-color:rgba(255,255,255,0.6);margin-top:80px;margin-bottom:30px">
	<div class="small-12 medium-4 medium-offset-2 column large-2 large-offset-3" >
			<%HTML::image('img/logo2.png', 'Fliyr',array('style'=>'width:auto;height:120px;margin-top:75px;margin-left:auto;margin-right: auto;display:block;'));%>
	</div>
	<div class="column small-12 medium-8 medium-offset-2 large-3 large-offset-0" >
		<div class='row'>
				<p class='venturetext' style="background-color:rgba(255,255,255,0.65);margin-top:120px;text-align:center">Build your venture team</p>
			</div>
			<div class="row" style="font-size:1.1em">
			<!--<a href="#" class="button tiny right black" style="background:#58b946;margin-right:13px;" >EARLY ACCESS</a></div>-->
			<a href="<?php echo url('/sign-up');?>" class="button tiny green right" style=";text-transform:uppercase;">ga tech sign up</a>	
				<a href="<?php echo url('/about-us');?>" class="button tiny black two right" style="text-transform:uppercase;">learn more</a>	
			</div>

		</div>
	
	<div class="column"></div>

	<div class='row' style=''>
		<div class='large-3 small-12 medium-4 medium-offset-2 large-offset-3 columns'>
			<form id="loginform">
				<span>Login</span><br />
				<input type='text' name="email" placeholder="E-Mail"/>
				<br>
				<input type='password' name="password" placeholder="Password"/>
				<input type='submit' value="Login" class='button small green' style="float:left" />				
			</form>
		</div>
		<div class='large-6 small-12 medium-6 columns'>
				<form id='signupform'>
				<span>Signup</span><br />
				<input type='text' name='name' placeholder="First Name, Last Name"/>
				<br>
				<input type='text' name='email' placeholder="E-Mail"/>
				<br>
				<input type='password' name='password' placeholder="Password"/>
				<br>
				<input type='password' name='confirmpassword' placeholder="Confirm Password"/>
				<br>
				<input type='submit' value="Sign Up" class='button small green' style="float:left" />
				</form>
		</div>
	</div>
</div>



</div>
</body>
</html>
