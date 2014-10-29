
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fliyr</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://fliyr.com/img/icon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<script src="http://fliyr.com/js/foundation.min.js"></script>

	<script src="http://fliyr.com/js/jquery.form.min.js"></script>

	<link media="all" type="text/css" rel="stylesheet" href="http://fliyr.com/css/foundation.css">



	<style type="text/css">
	input{
		height: 30px;
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
		   height: 30px;
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
            function validateEmail(email) { 
            	console.log(email);
    			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@gatech.edu/;
    			return re.test(email);
				} 
        }); 
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
	<a href="http://fliyr.com/earlyaccess" style="color:#888;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">Early Access</a>
	<a href="http://fliyr.com/aboutus" style="color:#58b946;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">About Us</a>
	</div>
	</div>

	<div class="large-4 large-offset-0 small-12 columns">
	<div class="row" style="margin-top:56px">
		<div style="text-transform:uppercase;color:#58b946;font-size:1.2rem">
		About Us<img src="http://fliyr.com/img/icon.png" style="display:inline-block;width:40px;margin-left:20px;height:auto" alt="Fliyr">
		</div>
	</div>
	<div class='row'>
		<p>
		Fliyr: Start up your team!

Our goal is to create a free service that will connect future Georgia Tech entrepreneurs to other students on campus who possess the necessary skills to develop their startup ideas.

Our story
There is no denying that Georgia Tech has an incredible entrepreneurial culture.  Here, students are imagining the solutions to some of the world’s toughest problems and dreaming of creating real value in wildly innovative ways. (Did you know Elmer’s Glue was dreamed up here?)  Many of these dreams, however, die shortly after conception. Why? Because the greatest obstacle when creating a startup often lies in finding a talented enough team to develop it.

When we first identified this reality, we knew that there must still be a way to channel the campus’ talent. When our school contains the Business majors intelligent enough to develop the idea for a finance app and the Computer Science majors savvy enough to code it, we recognized that there must be a way to unite these two forces. It became clear that the untapped talent within our student body was the most valuable resource. 

This was the startup to our startup.  We realized that if we could solve the problem of finding an adequate team, we could solve the problem of dying startup ideas. Through many weeks of networking (if only we had Fliyr!) we established our own team and began working to develop this student-to-student connector service. During the process we determined it crucial to provide this resource at no cost and without any advertising. Thus, Fliyr is a team builder that truly caters to any level of collegiate entrepreneurship. 

What’s up with the name fliyr?
Fliyr   \ˈflī(-ə)r\  (Pronounced as flier or flyer)

When facing the difficulty of finding the right startup team, one of the only ways to search for on-campus talent is by creating and posting a paper flier (or flyer). How completely inefficient!

This is unacceptable with the technology we have today. Our service, Fliyr, is the evolution of this method. It captures the fundamental notion of “spreading the word” in an advanced and modern way.
		</p>
	</div>
	</div>
	<div class="columns">
	</div>
</body>
</html>
