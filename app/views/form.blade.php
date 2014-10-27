
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
            // bind 'myForm' and provide a simple callback function 
            $('#ss-form').submit(function(e){
            	e.preventDefault();
            	$('#ss-form').ajaxSubmit();
            	$('#five').fadeIn(800);
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
	<a href="<?php echo url('/aboutus');?>" style="color:#888;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">About Us</a>
	</div>
	</div>
	</div>
	<div class="large-10 columns">
	<div class="row" style="margin-top:56px">
		<div style="text-transform:uppercase;color:#58b946;">
		Sign up for early access!{{HTML::image('img/icon.png', 'Fliyr',array('style'=>'display:inline-block;width:40px;margin-left:20px;height:auto'));}}
		</div>
	</div>
	<div class="row">	
		<form action="https://docs.google.com/forms/d/1HXw--_sb8ybUlZ2Ucqo_L_Jm1Nh75oe4c4Yj2Sz9Dqo/formResponse" method="POST" id="ss-form" target="_self" onsubmit=""><ol role="list" class="ss-question-list" style="padding-left: 0">
			</ol>

		<input type="text" name="entry.1104918926" value="" class="ss-q-short" id="entry_1104918926" dir="auto" aria-label="First Name  " aria-required="true" placeholder="first name" required="" title="" style="margin-bottom:7px;width:150px">
		<input type="text" name="entry.193253756" value="" class="ss-q-short" id="entry_193253756" dir="auto" aria-label="Last Name  " aria-required="true" required="" title="" placeholder="last name" style="margin-left:7px;width:190px">
<br>
<input type="email" name="entry.868751442" value="" class="ss-q-short" id="entry_868751442" dir="auto" aria-label="GT E-mail address  Hey you have to enter a Georgia Tech E-mail address" aria-required="true" required="" title="Hey you have to enter a Georgia Tech E-mail ID" placeholder="GT email address" style="width:170px">
<div class='styled-select'>
<select name="entry.421333035"  id="group_421333035_1" placeholder="please select your major">
<option>-- please select your major --</option>
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
<option>Physics
<option>Psychology
<option>Public Policy
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
<p style="color:#999;margin-top:21px">Tell us what skills you have in your field of expertise</p>
<input type="text" name="entry.1118930444" value="" id="entry_1118930444" dir="auto" aria-label="Tell us what skills you have in your field of expertise  " title="" style="margin-top:7px"><br>
<input type="text" name="entry.1528480759" value="" id="entry_1528480759" dir="auto" aria-label="Tell us what skills you have in your field of expertise 2  " title="" style="margin-top:7px"><br>
<input type="text" name="entry.1687596841" value="" id="entry_1687596841" dir="auto" aria-label="Tell us what skills you have in your field of expertise 3  " title="" style="margin-top:7px"><br>

<p  style="color:#999;margin-top:21px">Is there anything else you could contribute to a startup?</p>
<textarea style='width:350px;height:60px;margin-top:7px' name="entry.1201534306" class="ss-q-long" id="entry_1201534306"></textarea> 
<br>
<p  style="color:#999;margin-top:21px;display:inline-block">Do you have a startup idea of your own?</p>
<div class='styled-select' style="width:50px;display:inline-block;margin-bottom:-15px">
<select name="entry.1832462633" value="Yes" id="group_1832462633_1" role="checkbox" style="width:50px;height:20px">
<option>--</option>
<option>Yes</option>
<option>No</option>
<option>Only in the Shower</option>
</select>
</div>
<br>
<p  style="color:#999;margin-top:14px;display:inline-block">How did you hear about us?</p>
<input style='margin-top:7px' name="entry.959435776" class="ss-q-long" id="entry_1201534306"/> 

<input type="hidden" name="draftResponse" value="[,,&quot;-9084912540050282737&quot;]">
<input type="hidden" name="pageHistory" value="0">


<input type="hidden" name="fbzx" value="-9084912540050282737"><br>	
<input type="submit" name="submit" value="SUBMIT" id="ss-submit" style="margin-top:21px;background:#58b946" class="jfk-button jfk-button-action button tiny ">
</form>
	</div>
	</div>
	</div>

<div id="five" style="display:none;background:#fff;width:100%;height:100%;background:rgba(0,0,0,0.3);z-index:1;position:absolute;color:#fff;font-size:40px;">
<div style="color:#888;background:#fff;width:40%;height:40%;position:absolute;top:30%;left:30%;font-size:20px;padding:10px;margin:auto">
<p style="display:none;text-align:center;margin-top:21px">Thanks. Awesome dude. We'll contact you as soon as it is ready</p>
<br>
<a href="<?php echo url('/');?>" class="button" style="text-transform:uppercase;display:block;margin:auto;width:300px;margin-top:21px">Go Home, Bitch!</a>
</div>
</body>
</html>
