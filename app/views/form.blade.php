
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>fliyr - Early Access</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://fliyr.com/img/icon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<script src="http://fliyr.com/js/foundation.min.js"></script>

	<script src="http://fliyr.com/js/jquery.form.min.js"></script>

	<link media="all" type="text/css" rel="stylesheet" href="http://fliyr.com/css/foundation.css">



	<style type="text/css">
	input{
		height: 27px;
	}
		::-webkit-input-placeholder{  
   			font-family: 'Oswald', sans-serif;
   			 padding-top: -3px;
		}
		:-moz-placeholder{
			font-family: 'Oswald', sans-serif;
			font-size: 1.2em;
		} 

		::-moz-placeholder{
			font-family: 'Oswald', sans-serif;
			font-size: 1.2em;
		} 

		:-ms-input-placeholder{
			font-family: 'Oswald', sans-serif;
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
		   color:#aaa; 
		   line-height: 1.6;
		   border: 1px solid #aaa;
		   height: 27px;
		   -webkit-appearance: none;
   		}

   		.styled-select select optgroup{
   			font-weight: 300;
   		}

		.styled-select {
   				width: 300px;
   				height: 34px;
   				overflow: hidden;
   				margin-top: 7px;
   				margin-bottom: 0px
   			}

		.green{
			background:#58b946;
		}

		.green:hover{
			background:#58d946;
		}   

				@media only screen and (max-width:69em){
			 .menu{position:relative}
		}
		@media only screen and (min-width:68em){
			.menu{position:fixed}
		}
	</style>
<script>
		$(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#ss-form').submit(function(e){
            	e.preventDefault();
            	console.log(validateEmail($('#entry_868751442').val()));
            	if(validateEmail($('#entry_868751442').val())){
            		$('#ss-form').ajaxSubmit();
					$('#five').fadeIn(800);
				}
				else{
					$('#error').fadeIn(300);
				}
                	//success: function(){
                	//	 alert("This form has been submitted");
                	//}
            	//});
            }); 

            $('.magic').blur(function() {
  				alert( "Handler for .blur() called." );
			});
            function validateEmail(email) { 
            	console.log(email);
    			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@gatech.edu/;
    			return re.test(email);
				} 
        }); 
    </script> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41260149-2', 'auto');
  ga('send', 'pageview');

</script>    
</head>
<body>
	<div class="magic" style="">
		<div class="column large-2 small-12" >
			<a href="http://fliyr.com" style=""><img src="http://fliyr.com/img/logo2.png" style="width:123px;height:77px;margin:auto;margin-top:15px;display:block" alt="Fliyr"></a>
			
			<p style="text-transform:uppercase;color:#969696;margin:auto;display:block;width:95px;font-weight:300"> Georgia Tech</p>
		
		<div class="large-12 columns">
		<hr style='margin-left:-30px'>
		</div>
	
	<div class="large-12 columns">
	<a href="http://fliyr.com/earlyaccess" style="color:#58b946;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">Early Access</a>
	<a href="http://fliyr.com/aboutus" style="color:#888;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">About Us</a>
	</div>
	</div>

	<div class="large-4 large-offset-2 small-12 columns body">
	<div class="row" style="margin-top:56px">
		<div style="text-transform:uppercase;color:#58b946;font-size:1.2rem">
		Sign up for early access!<img src="http://fliyr.com/img/icon.png" style="display:inline-block;width:40px;margin-left:20px;height:auto" alt="Fliyr">
		</div>
	</div>
	<div class="row">	
		<form action="https://docs.google.com/forms/d/1HXw--_sb8ybUlZ2Ucqo_L_Jm1Nh75oe4c4Yj2Sz9Dqo/formResponse" method="POST" id="ss-form" target="_self" onsubmit=""><ol role="list" class="ss-question-list" style="padding-left: 0">
			</ol>
		
		<input type="text" name="entry.1104918926" value="" class="ss-q-short" id="entry_1104918926" dir="auto" aria-label="First Name  " aria-required="true" placeholder="first" required="" title="" style="margin-bottom:7px;width:190px"><br>
		<input type="text" name="entry.193253756" value="" class="ss-q-short" id="entry_193253756" dir="auto" aria-label="Last Name  " aria-required="true" required="" title="" placeholder="last" style="width:190px">
<br>
<div id="error" style="margin-top:7px;color:red;font-size:0.7em;display:none;">Please enter a Georgia Tech email</div>
<input type="email" name="entry.868751442" value="" class="ss-q-short" id="entry_868751442" dir="auto" aria-label="GT E-mail address  Hey you have to enter a Georgia Tech E-mail address" aria-required="true" required="" title="Hey you have to enter a Georgia Tech E-mail ID" placeholder="GT email address" style="margin-top:7px;width:190px">
<div class='styled-select'>
<select name="entry.421333035"  id="group_421333035_1" placeholder="please select your major">
<option>-- select your major --</option>
<option>Aerospace Engineering</option>
<option>Applied Languages and Intercultural Studies</option>
<option>Applied Mathematics</option>
<option>Applied Physics</option>
<option>Architecture</option>
<option>Biochemistry</option>
<option>Biology</option>
<option>Biomedical Engineering</option></option>
<option>Business Administration</option>
<option>Chemical and Biomolecular Engineering</option>
<option>Chemistry</option>
<option>Civil Engineering</option>
<option>Computational Media</option>
<option>Computer Engineering</option>
<option>Computer Science</option>
<option>Discrete Mathematics</option>
<option>Earth and Atmospheric Sciences</option>
<option>Economics</option>
<option>Economics and International Affairs</option>
<option>Electrical Engineering</option>
<option>Environmental Engineering</option>
<option>Global Economics and Modern Languages</option>
<option>History, Technology, and Society</option>
<option>Human Computer Engineering</option>
<option>Industrial Design</option>
<option>Industrial Engineering</option>
<option>International Affairs</option>
<option>International Affairs and Modern Language</option>
<option>Literature, Media, and Communication</option>
<option>Materials Science and Engineering</option>
<option>Mechanical Engineering</option>
<option>Nuclear and Radiological Engineering</option>
<option>Physics</option>
<option>Psychology</option>
<option>Public Policy</option>
</select>
</div>

<div class='styled-select'>
<select name="entry.834109887" class="" id="group_959435776_1"  >
<option>-- expected year of graduation --</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>
<br>
</div>
<p style="color:#888;margin-top:21px">Tell us what skills you have in your field of expertise</p>
<div class='styled-select'>
<select type="text" name="entry.1118930444" value="" id="entry_1118930444" dir="auto" aria-label="Tell us what skills you have in your field of expertise  " title="" style="">
<optgroup>
<option>-- select a skill --</option>
<option>Technical</option>
<option>-- Front End Development</option>
<option>-- Back End Development</option>
<option>-- Application Development</option>
<option>-- iOS Development</option>
<option>-- Android Development</option>
<option>-- Database Design</option>
<option>-- Coding</option>
<option>-- Information Architecture</option>
<option>-- Data Mining</option>
<option>-- Security</option>
<option>-- S.E.O.</option>
<option>-- Hardware Design</option>
<option>-- Product Engineer</option>
<option>Creative</option>
<option>-- Graphic Design</option>
<option>-- Photographer</option>
<option>-- UX/UI</option>
<option>-- General Design</option>
<option>-- Industral Design</option>
<option>-- Website Design</option>
<option>-- Branding</option>
<option>-- Ideation</option>
<option>-- Content Management</option>
<option>-- Copywriting</option>
<option>-- Technical Writing</option>
<option>-- Video Editing</option>
<option>-- Advertising</option>
<option>-- Product Design</option>

<option>Business</option>
<option>-- Networking</option>
<option>-- General Marketing</option>
<option>-- Social Media Marketing</option>
<option>-- Accounting</option>
<option>-- Legal</option>
<option>-- Communication</option>
<option>-- Leadership</option>
<option>-- Negotiation</option>
<option>-- Business Development</option>
<option>-- Project Management</option>
<option>-- Fundraising</option>
<option>-- Content Management</option>
<option>-- Financial Management</option>
<option>-- Multilingual</option>
<option>-- Presenting</option>
<option>-- Operations</option>
<option>-- Customer Service</option>
</optgroup>
</select>
</div>

<div class='styled-select'>
<select type="text" name="entry.1528480759" value="" id="entry_1528480759" dir="auto" aria-label="Tell us what skills you have in your field of expertise 2  " title="" >
<option>-- select a skill --</option>
<option>Technical</option>
<option>-- Front End Development</option>
<option>-- Back End Development</option>
<option>-- Application Development</option>
<option>-- iOS Development</option>
<option>-- Android Development</option>
<option>-- Database Design</option>
<option>-- Coding</option>
<option>-- Information Architecture</option>
<option>-- Data Mining</option>
<option>-- Security</option>
<option>-- S.E.O.</option>
<option>Creative</option>
<option>-- Graphic Design</option>
<option>-- Photographer</option>
<option>-- UX/UI</option>
<option>-- General Design</option>
<option>-- Industral Design</option>
<option>-- Website Design</option>
<option>-- Branding</option>
<option>-- Ideation</option>
<option>-- Content Management</option>
<option>-- Copywriting</option>
<option>-- Technical Writing</option>
<option>-- Video Editing</option>
<option>-- Advertising</option>
<option>Business</option>
<option>-- Networking</option>
<option>-- Communication</option>
<option>-- Leadership</option>
<option>-- General Marketing</option>
<option>-- Social Media Marketing</option>
<option>-- Accounting</option>
<option>-- Legal</option>
<option>-- Communication</option>
<option>-- Leadership</option>
<option>-- Negotiation</option>
<option>-- Business Development</option>
<option>-- Project Management</option>
<option>-- Fundraising</option>
<option>-- Content Management</option>
<option>-- Financial Management</option>
<option>-- Multilingual</option>
<option>-- Presenting</option>
<option>-- Operations</option>
<option>-- Customer Service</option>
</select>
</div>
<div class='styled-select'>
<select type="text" name="entry.1687596841" value="" id="entry_1687596841" dir="auto" aria-label="Tell us what skills you have in your field of expertise 3  " title="" >
<option>-- select a skill --</option>
<option>Technical</option>
<option>-- Front End Development</option>
<option>-- Back End Development</option>
<option>-- Application Development</option>
<option>-- iOS Development</option>
<option>-- Android Development</option>
<option>-- Database Design</option>
<option>-- Coding</option>
<option>-- Information Architecture</option>
<option>-- Data Mining</option>
<option>-- Security</option>
<option>-- S.E.O.</option>
<option>Creative</option>
<option>-- Graphic Design</option>
<option>-- Photographer</option>
<option>-- UX/UI</option>
<option>-- General Design</option>
<option>-- Industral Design</option>
<option>-- Website Design</option>
<option>-- Branding</option>
<option>-- Ideation</option>
<option>-- Content Management</option>
<option>-- Copywriting</option>
<option>-- Technical Writing</option>
<option>-- Video Editing</option>
<option>-- Advertising</option>
<option>Business</option>
<option>-- Networking</option>
<option>-- Communication</option>
<option>-- Leadership</option>
<option>-- General Marketing</option>
<option>-- Social Media Marketing</option>
<option>-- Accounting</option>
<option>-- Legal</option>
<option>-- Communication</option>
<option>-- Leadership</option>
<option>-- Negotiation</option>
<option>-- Business Development</option>
<option>-- Project Management</option>
<option>-- Fundraising</option>
<option>-- Content Management</option>
<option>-- Financial Management</option>
<option>-- Multilingual</option>
<option>-- Presenting</option>
<option>-- Operations</option>
<option>-- Customer Service</option>
</select>
</div>
<p  style="color:#888;margin-top:21px">Is there anything else you could contribute to a startup?</p>
<textarea style='width:330px;height:60px;margin-top:7px' name="entry.1201534306" class="ss-q-long" id="entry_1201534306"></textarea> 
<br>
<p  style="color:#888;margin-top:21px;display:inline-block">Do you have a startup idea of your own?</p>
<div class='styled-select' style="width:50px;display:inline-block;margin-bottom:-15px">
<select name="entry.1832462633" value="Yes" id="group_1832462633_1" role="checkbox" style="width:50px;height:20px">
<option>--</option>
<option>Yes</option>
<option>No</option>

</select>
</div>
<!--
<br>
<p  style="color:#888;margin-top:14px;display:inline-block">How did you hear about us?</p>
<input style='margin-top:7px' name="entry.959435776" class="ss-q-long" id="entry_1201534306"/> 
-->
<input type="hidden" name="draftResponse" value="[,,&quot;-9084912540050282737&quot;]">
<input type="hidden" name="pageHistory" value="0">


<input type="hidden" name="fbzx" value="-9084912540050282737"><br>	
<input type="submit" name="submit" value="SUBMIT" id="ss-submit" style="margin-top:21px;background:#58b946;padding-bottom:1.7rem" class="button tiny ">
</form>
	</div>

	</div>
	<div class="column">
	</div>

<div id="five" style="display:none;background:#fff;width:100%;height:100%;background:rgba(0,0,0,0.3);z-index:1;position:absolute;color:#fff;font-size:40px;">
<div class="large-4 large-offset-4 medium-offset-3 medium-6 small-12 small-offset-0" style="color:#888;background:#fff;height:40%;position:absolute;top:30%;font-size:20px;padding:10px;margin:auto">
<p style="font-size:1.2em;text-align:center;margin-top:21px;resize:none">Thank You. We will contact you as soon as the launch is ready</p>
<br>
<a href="http://fliyr.com" class="button green" style="text-transform:uppercase;display:block;margin:auto;width:80%;">Return To Home</a>
</div>
</div>
</body>
</html>
