<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fliyr</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	{{HTML::script('/js/foundation.min.js') }}
	{{HTML::script('/js/jquery.form.min.js') }}
{{ HTML::style('css/foundation.css'); }}
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            
            	$('#ss-form').ajaxForm(function() { 
                	alert("This form has been submitted"); 
            	}); 
            
        }); 
    </script> 
</head>
<body>
	<div class="row">
	<div class="column large-6 large-offset-3">

		{{HTML::image('img/logo.png', 'Flyur',array());}}

		<h1>Expertise + Ideas</h1>
		<h3>We help you build venture teams.</h3>
		<p>
		 Whether you are a software developer looking for a graphic designer, or an accounting major looking for someone with the skills to build your awesome app idea we can connect you with the people you need
		invitation
		</p>

		<form action="https://docs.google.com/forms/d/1HXw--_sb8ybUlZ2Ucqo_L_Jm1Nh75oe4c4Yj2Sz9Dqo/formResponse" method="POST" id="ss-form" target="_self" onsubmit=""><ol role="list" class="ss-question-list" style="padding-left: 0">
<input type="text" name="entry.1104918926" value="" class="ss-q-short" id="entry_1104918926" dir="auto" aria-label="First Name  " aria-required="true" placeholder="First Name" required="" title="">
<br>
<input type="text" name="entry.193253756" value="" class="ss-q-short" id="entry_193253756" dir="auto" aria-label="Last Name  " aria-required="true" required="" title="" placeholder="Last Name">
<br>
<input type="email" name="entry.868751442" value="" class="ss-q-short" id="entry_868751442" dir="auto" aria-label="GT E-mail address  Hey you have to enter a Georgia Tech E-mail ID" aria-required="true" required="" title="Hey you have to enter a Georgia Tech E-mail ID" placeholder="GT Email ID">
<br>
<select name="entry.421333035" placeholder="please select your major">
<option>Computer Science</option>
<option>Finance</option>
<option>Magic</option>
</select>
<br>
<select name="entry.959435776" >
<option>1st Year</option>
<option>2nd Year</option>
<option>3rd Year</option>
</select>
<br>
Tell us what skills you have in your field of expertise
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
</body>
</html>
