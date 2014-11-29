

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>About us - Fliyr</title>
	<meta name="description" content="Learn more about Fliyr. Connecting the ideas + experties within the community to launch
	successful startups.">

		<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="About us - Fliyr">
<meta itemprop="description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
<meta itemprop="image" content="<?php echo asset('img/facebook3.jpg');?>">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@fliyr">
<meta name="twitter:title" content="About us - Fliyr">
<meta name="twitter:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
<meta name="twitter:creator" content="@fliyr">
<meta name="twitter:image:src" content="<?php echo asset('img/logo2.png');?>">

<meta property="og:title" content="About us - Fliyr" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.fliyr.com/about-us" />
<meta property="og:image" content="<?php echo asset('img/facebook3.jpg');?>" />
<meta property="og:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas." />
<meta property="og:site_name" content="Fliyr" />
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://fliyr.com/img/icon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<script src="http://fliyr.com/js/foundation.min.js"></script>

	<script src="http://fliyr.com/js/jquery.form.min.js"></script>

	<link media="all" type="text/css" rel="stylesheet" href="http://fliyr.com/css/foundation.css">



	<style type="text/css">
	input{
		height: 30px;
	}

		.green{
			background:#58b947;
		}

		.green:hover{
			background:#58d946;
		}
		select{
			width: 250px;
		}
		.ss-q-short{
			font-family: 'Oswald',sans-serif;
		   color:#888; 
		}
		.accordion > dt,dd{
			font-family:'Roboto',sans-serif;
			font-weight: 300;
			font-size: 0.95em;
			margin-bottom: 26px;
			color:#888;
		}

		dt a{
			color:#888;
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
            function validateEmail(email) { 
            	console.log(email);
    			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@gatech.edu/;
    			return re.test(email);
				} 

			function getParameterByName(name) {
			    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
			    var results = regex.exec(location.search);

			    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}
			$('.accordion > dd').hide();
			var no = getParameterByName('question');
			if(no!=null){

    			$('.accordion > dt').eq(no-1).next().slideDown();
				$('.accordion > dt').eq(no-1).animate({'margin-bottom':'5px'});
			}
	
    		
    		
  			$('.accordion > dt > a').click(function() {
    			$('.accordion > dd').hide();
    			$('.accordion > dt').animate({'margin-bottom':'26px'});
    			$(this).parent().next().slideDown();	
    			$(this).parent().animate({'margin-bottom':'5px'});
    			return false;
  			});
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
	<div class="column large-2 small-12 menu" >
			<a href="http://fliyr.com" style=""><img src="http://fliyr.com/img/logo2.png" style="width:123px;height:77px;margin:auto;margin-top:15px;display:block" alt="fliyr"></a>
			
			<p style="font-family:Oswald;text-transform:uppercase;color:#969696;margin:auto;display:block;width:95px;font-weight:300;font-size:1rem"> Georgia Tech</p>
		
		<div class="large-12 columns">
		<hr style='margin-left:-30px'>
		</div>
	
	<div class="large-12 columns ">
	<a href="http://fliyr.com/sign-up" style="color:#888;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">Early Access</a>
	<a href="http://fliyr.com/about-us" style="color:#58b946;font-weight:300;margin-left:auto;margin-right:auto;margin-top:2px;display:block;width:95px;text-transform:uppercase">About </a>
	</div>
	</div>

	<div class="large-8 large-offset-2 small-12 columns body" >
	<div class="row" style="margin-top:56px;margin-bottom:10px">
		<div style="text-transform:uppercase;color:#58b946;font-size:1.2rem">
		Build Your Venture team!<img src="http://fliyr.com/img/icon.png" style="display:inline-block;width:40px;margin-left:20px;margin-top:0px;height:auto" alt="fliyr">
		</div>
	</div>
	

<dl class="accordion">

<dt><a href="#"><b>What is Fliyr?</b></a></dt>
<dd>Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.</dd>

<dt><a href="#"><b>What am I signing up for?</b></a></dt>

<dd>Signing up for Fliyr fully brings you into Georgia Tech’s entrepreneurial community. Right now, we are building a database of both future entrepreneurs and talented individuals with specific expertise.  

<br><br>Moving forward, Fliyr will feature an online bulletin board promoting Georgia Tech startups, job/co-founder postings, and the current resources and competitions the GT community provides.  Members will be able to view and contact the current startups being developed at Tech as well as reach out to other students that have the specialties needed to take their venture to next level.</dd>

<dt><a href=""><b>How do I sign up if I don't have an invite?</b></a></dt>

<dd>Well, the fastest way to get an invite is to ask a friend who’s already on Fliyr, or you could reach out to any of our affiliated entrepreneurial organizations on campus.</p>

<dt><a href="#"><b>How did you come up with the name Fliyr?</b></a></dt>

<dd>When facing the difficulty of finding the right startup team, one of the only ways to search for on-campus talent is to create and post a paper flier (or flyer). This approach is completely inefficient with the technology that we have today. Our service is the evolution of this method.</dd>

<dt><a href="#"><b>Who is behind Fliyr?</b></b></a></dt>
<dd>
	Will Smith, Strategy, <i>Industrial Engineering Major</i><br>
Mark Haddad, Creative, <i>Business Administration Major</i><br>
Carl Saldanha, Technical, <i>Human Computer Interaction Major</i><br>
Chase Roberts, Business, <i>Business Administration Major</i>
</dd>
<dt><a href="#"><b>Not found the answer you want?</b></a></dt>
<dd>Feel free to contact our team at <a href="mailto:info@fliyr.com">info@fliyr.com</a>.</dd>
<br>
<a href="<?php echo url('/sign-up');?>" class="button tiny green " style=";text-transform:uppercase;">ga tech sign up</a>	

	</div>
	</div>
	<div class="columns">
	</div>


</body>
</html>
