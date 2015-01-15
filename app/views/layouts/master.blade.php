<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fliyr</title>
	<meta name="description" content="Learn more about Fliyr. Connecting the ideas + experties within the community to launch
	successful startups.">

		<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="Fliyr">
	<meta itemprop="description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
	<meta itemprop="image" content="<?php echo asset('img/facebook3.jpg');?>">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@fliyr">
	<meta name="twitter:title" content="Fliyr">
	<meta name="twitter:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas.">
	<meta name="twitter:creator" content="@fliyr">
	<meta name="twitter:image:src" content="<?php echo asset('img/logo2.png');?>">

	<meta property="og:title" content="Fliyr" />
	<meta property="og:type" content="website" / >
	<meta property="og:url" content="http://www.fliyr.com-us" />
	<meta property="og:image" content="<?php echo asset('img/facebook3.jpg');?>" />
	<meta property="og:description" content="Fliyr is a free service that connects GT entrepreneurs with the skilled students and on-campus resources to develop their startup ideas." />
	<meta property="og:site_name" content="Fliyr" />
		
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Roboto:700,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://fliyr.com/img/icon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>


	<script src="<% URL::asset('js/tag-it.js')%>"></script>

	<script src="<% URL::asset('js/foundation.min.js')%>"></script>
	<script src="<% URL::asset('js/foundation/foundation.equalizer.js')%>"></script>

	<script src="<% URL::asset('js/jquery.form.min.js')%>"></script>

	<link media="all" type="text/css" rel="stylesheet" href="http://fliyr.com/css/foundation.css">
	    <link href="<% URL::asset('css/jquery.tagit.css')%>" rel="stylesheet" type="text/css">
    <link href="<% URL::asset('css/tagit.ui-zendesk.css')%>" rel="stylesheet" type="text/css">


	<style type="text/css">
	input{
		height: 30px;
	}
	.venturebox{
		overflow-x:hidden;
		border: 1px solid #999;
	}
	.title{
		color:#58b947;
	}

	.title input{
		color:#58b947;
		font-family: 'Oswald',Helvetica,sans-serif;
		border: none ;
		padding:0px;
		border-bottom:1px solid #58b947;
	}

	ul.taglist{
		color:#222;
			border-width:0px;
	}

	input.tag {
		color:#bbb;
		font-family: 'Oswald',Helvetica,sans-serif;
		border: none ;
		border-bottom:1px solid #bbb;	
	}

	.title input::-webkit-input-placeholder {
   		color: #58b947;
	}
	.title input::-moz-placeholder {  /* Firefox 19+ */
   		color: #58b947;  
	}
	.title input:-ms-input-placeholder {  
   		color: #58b947;  
	}

	.venturebox p{
		font-size: 0.8em;
		color:#555;
		text-align: justify;
	}

	.venturebox p textarea{
		font-family: 'Oswald',Helvetica,sans-serif;
		resize:none;
	}

	.large-offset-half{
		margin-left:4.15% !important;
	}

	.large-3-5{
		width:29.1667% !important;
	}

	.submitdiv{
		background-color:#58b947; 

	}
	.black{
		background: #333;
	}
	.black:hover{
		background: #666;
	}
	.submitdiv input{
		margin: 5px;
	}

	.red{
 		background-color:#c22 !important;
	}


	.red:hover{
 		background-color:#a00 !important;
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

		.grey-sidebar{
			color:#888;
			font-weight:300;
			margin-left:auto;
			margin-right:auto;
			margin-top:2px;
			display:block;
			width:95px;
			text-transform:uppercase
		}

		.green-sidebar{
			color:#58b946;
			font-weight:300;
			margin-left:auto;
			margin-right:auto;
			margin-top:2px;
			display:block;
			width:95px;
			text-transform:uppercase
		}

		.ng-modal-overlay {
  /* A dark translucent div that covers the whole screen */
  position:absolute;
  z-index:9999;
  top:0;
  left:0;
  width:100%;
  height:100%;
  background-color:#000000;
  opacity: 0.8;
}
.ng-modal-dialog {
  /* A centered div above the overlay with a box shadow. */
  z-index:10000;
  position: absolute;
  width: 50%; /* Default */

  /* Center the dialog */
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);

  background-color: #fff;
  box-shadow: 4px 4px 80px #000;
}
.ng-modal-dialog-content {
  padding:10px;
  text-align: left;
}
.ng-modal-close {
  position: absolute;
  top: 3px;
  right: 5px;
  padding: 5px;
  cursor: pointer;
  font-size: 120%;
  display: inline-block;
  font-weight: bold;
  font-family: 'arial', 'sans-serif';
}


	.arrow-down {
		width: 0; 
		height: 0; 
		border-left: 7px solid transparent;
		border-right: 7px solid transparent;
		border-top: 12px solid #58b946;
		display: inline-block;
		margin-top: 7px;
		margin-left: 3px;
	}

	.user-menu:hover{
		cursor: pointer;
	}

	.user-menu-items ul{
		list-style: none;
		font-size: 0.8em;
		margin: 0px;
	}
	.user-menu-items ul li a{
		color: #58b946;
	}
	.user-menu-items ul li :hover{
		color: #78d966;
	}	
	.user-menu-items{
		display:none;
		z-index:2;
		position:absolute;
		padding: 6px;
		width: 150px;
		margin-left: 20px;
		border: 1px solid #555;
		border-radius: 8px;
		background-color:#fff;
	}
	</style>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.user-menu').hover(function(){
			$('.user-menu-items').toggle();
		});
	})
	</script>
</head>
<body>
@section('sidebar')
<div class="column large-2 small-12 menu" >
			<a href="<% URL::to('/') %>" style=""><img src="http://fliyr.com/img/logo2.png" style="width:123px;height:77px;margin:auto;margin-top:15px;display:block" alt="fliyr"></a>
			
			<p style="font-family:Oswald;text-transform:uppercase;color:#969696;margin:auto;display:block;width:95px;font-weight:300;font-size:1rem"> Georgia Tech</p>
		
		<div class="large-12 columns">
		<hr style='margin-left:-30px'>
		</div>
	
	
	<div class="large-12 columns ">
	<a href="<% URL::to('ventures') %>" class="grey-sidebar">Ventures</a>
	<a href="<% URL::to('expertise') %>" class="green-sidebar">Expertise </a>
	<a href="<% URL::to('about-us') %>" class="grey-sidebar">Our Service </a>
	</div>
	</div>        
     @show

	<div class="large-8 large-offset-2 small-12 columns body" >
			<div class='row'>
				<div class='right user-menu'>
				<div class='column' style="width:200px;margin-top:30px;margin-bottom:30px">
					<div class="arrow-down right"></div><span class='right'><?php print_r($user_name)?></span>
					<br>
					<div class='user-menu-items right' style="">
					<ul>
						<li><a href="<% URL::to('myexpertise')%>">My Expertise</a></li>
						<li><a href="<% URL::to('myventures')%>"><li>My Ventures</a></li> 
						<li><a href="<% URL::to('inbox')%>">Message Inbox</a></li>
						<li><a href="<% URL::to('signout')%>">Sign out</a></li>
					</ul>
					</div>
				</div>
				</div>
				
			</div>
			<div class='row'>
            	@yield('content')
            </div>
    </div>

</body>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.user-menu').mouseover(function(){
			$('.user-menu-items').show();
		});
		$('.user-menu').mouseout(function(){
			$('.user-menu-items').hide();
		});
	})
	</script>
</html>
