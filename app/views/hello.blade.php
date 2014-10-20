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
	<div class="magic" style="display:none;">
	<div>
		<div class="column large-1">
			{{HTML::image('img/logo.png', 'Flyur',array());}}
		
		</div>
		<div class="column large-3">
		</div>
		<div class="column large-8">
		<h2 style="padding:0;margin-top:20px;margin-bottom:0;vertical-align:bottom;">Expertise + Ideas</h2>
		</div>
	</div>
	<hr>
	<div class="" >
		<div class="column large-5 large-offset-4">
		<h3>We help you build venture teams.</h3>
		<p style="text-align:justify">
		 Whether you are a software developer looking for a graphic designer, or an accounting major looking for someone with the skills to build your awesome app idea we can connect you with the people you need
		invitation
		</p>

		<form action="https://docs.google.com/forms/d/1HXw--_sb8ybUlZ2Ucqo_L_Jm1Nh75oe4c4Yj2Sz9Dqo/formResponse" method="POST" id="ss-form" target="_self" onsubmit=""><ol role="list" class="ss-question-list" style="padding-left: 0">
<input type="text" name="entry.1104918926" value="" class="ss-q-short" id="entry_1104918926" dir="auto" aria-label="First Name  " aria-required="true" placeholder="first name" required="" title="">
<input type="text" name="entry.193253756" value="" class="ss-q-short" id="entry_193253756" dir="auto" aria-label="Last Name  " aria-required="true" required="" title="" placeholder="last name">
<br>
<input type="email" name="entry.868751442" value="" class="ss-q-short" id="entry_868751442" dir="auto" aria-label="GT E-mail address  Hey you have to enter a Georgia Tech E-mail ID" aria-required="true" required="" title="Hey you have to enter a Georgia Tech E-mail ID" placeholder="GT Email ID">
<br>
<select name="entry.421333035" placeholder="please select your major">
<option>--please select your major--</option>
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
<br>
<select name="entry.959435776" >
<option>--please select expected year of graduation--</option>
<option>2014</option>
<option>2015</option>
<option>2016</option>
<option>2017</option>
<option>2018</option>
<option>2019</option>
<option>2020</option>
</select>
<br>
Tell us what skills you have in your field of expertise<br>
<input type="text" name="entry.1118930444" value="" id="entry_1118930444" dir="auto" aria-label="Tell us what skills you have in your field of expertise  " title=""><br>
<input type="text" name="entry.1528480759" value="" id="entry_1528480759" dir="auto" aria-label="Tell us what skills you have in your field of expertise 2  " title=""><br>
<input type="text" name="entry.1687596841" value="" id="entry_1687596841" dir="auto" aria-label="Tell us what skills you have in your field of expertise 3  " title=""><br>
<br>Do you have a startup idea of your own?
<input type="checkbox" name="entry.1832462633" value="Yes" id="group_1832462633_1" role="checkbox">Yes
<input type="hidden" name="draftResponse" value="[,,&quot;-9084912540050282737&quot;]">
<input type="hidden" name="pageHistory" value="0">


<input type="hidden" name="fbzx" value="-9084912540050282737">
<input type="submit" name="submit" value="Submit" id="ss-submit" class="jfk-button jfk-button-action ">
</form>
	</div>
	</div>
	</div>
</body>
</html>
