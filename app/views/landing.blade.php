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

	<!--Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Nunito:700' rel='stylesheet' type='text/css'>
	<!--Icon-->
	<link rel="shortcut icon" href="<?php echo asset('img/icon.ico');?>">
	<!--CSS-->
	<%HTML::script('/js/foundation.min.js') %>
	<% HTML::style('css/foundation.css'); %>
	<% HTML::style('css/main.css'); %>

    <script> 
    // wait for the DOM to be loaded 
    $(document).ready(function() { 

        var random=Math.floor((Math.random() * 11) );
        var array=['“The best way to predict the future is to create it.”- Peter Drucker', '“As long as you’re going to be thinking anyway, think big.”- Donald Trump','“To win without risk is to triumph without glory.”- Corneille','"Failure is an option here. If things are not failing, you are not innovating enough." Elon Musk','"It\'s fine to celebrate success, but it is more important to heed the lessons of failure." Bill Gates','"We led with our conviction rather than rational, because rational said it was impossible." Daniel Ek, Spotify','"The most difficult thing is the decision to act, the rest is merely tenacity." Amelia Earhart','"The best time to plant a tree was 20 years ago. The second best time is now." Chinese proverb','"Build your own dreams, or someone else will hire you to build theirs." Farrah Gray','"You can\'t use up creativity. The more you use, the more you have." Maya Angelou','"The question isn\'t who is going to let me; it\'s who is going to stop me." Ayn Rand'];
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

		$('.formbox').css('min-height',$('.formbox').width());
		$('.changebutton').click(function(e){
			e.preventDefault();

			$('.formbox').toggleClass('flip');
			if($('#loginform').is(':visible')){
				$('#loginform').delay(200).hide(0);
				$('#signupform').delay(200).show(0);
			}
			else if($('#signupform').is(':visible')){
				$('#signupform').delay(200).hide(0);
				$('#loginform').delay(200).show(0);
			}
		})
    });
    </script> 	   
</head>
<body>
	<div id="signupmodal" class="reveal-modal small" data-reveal>
			<p>Welcome to Fliyr! Please check your e-mail to confirm your registration.</p>
	</div>

<div class=" otherdiv" style='margin-top:4%;height:100px;padding:0px;margin:0'>

	<div class="large-6 medium-6 columns hide-for-small" style='padding:0px;margin-top:14.5%'>
			<%HTML::image('img/fliyr_landing4.jpg', 'Fliyr',array('style'=>'margin-left:auto;margin-top:-30px;float:right;margin-right:50px;display:block;width:65%'));%><br />	
	</div>
	
	<div class='large-3 medium-5 small-12 columns loginboxdiv' style='padding:25px;margin-top:7%'>		
			<%HTML::image('img/fliyr_logo.png', 'Fliyr',array('style'=>'margin-left:auto;margin-top:-30px;margin-right:10px;width:50px','class'=>'show-for-small-only logo-img'));%>
			<%HTML::image('img/fliyr_logo2.png', 'Fliyr',array('style'=>'margin-left:auto;margin-top:-30px;margin-right:2px;width:50px','class'=>'show-for-small-only logo-img2'));%>
			<br />
	<div class='small-12 columns formbox' style='border:1px solid #7d7d7d;padding:25px'>		
		<form id="loginform">
			<p class='errortext' id='loginerrortext' style='color:#7d7d7d;font-size:12px;font-style:italic;line-height:16px;margin-top:3px'>
				"Winners never quit and quitters never win." -Vince Lombardi
			</p>
			<div class='row' style='margin:auto;'>	
					<input type='text' class='biginput' name="email" placeholder="E-Mail"/>
			</div>
			<div class='row' style='margin:auto;height:75px'>	
					<input type='password' class='biginput' name="password" placeholder="Password"/>
			</div>
			<div class='row' style='margin:auto;text-align:center'>	
					<input type='submit' value="Sign In" class=' button small-centered light-green-button' style=/>	
			</div>

			<div class='row' style="margin:auto;text-align:center">
				<p>or <a href="#" class='changebutton'  style='font-weight:400'>sign up</a></p>
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
			<p style="margin-bottom:1rem">or <a href="#" class='changebutton' >sign in</a></p>
			</div>
		</form>

	</div>
	<div class='small-12 columns' style='text-align:center;margin-top:10px'><a href='about' style='font-size:14px;font-weight:300;color:#7d7d7d !important'>learn more</a></div>
	</div>
	<div class='column'/>
</div>
</body>
</html>
