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



	<script src="<% URL::asset('js/foundation.min.js')%>"></script>
	<script src="<% URL::asset('js/foundation/foundation.equalizer.js')%>"></script>

	<script src="<% URL::asset('js/jquery.form.min.js')%>"></script>

	<link media="all" type="text/css" rel="stylesheet" href="http://fliyr.com/css/foundation.css">


	<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-resource.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.7/angular-route.min.js"></script>

	<script type="text/javascript" src="<% URL::asset('js/main.js') %>"></script>

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

<div ng-app="Fliyr" >
	<div ng-controller="ApplicationController">
	<div class="column large-2 small-12 menu" >
			<a href="<% URL::to('/') %>" style=""><img src="http://fliyr.com/img/logo2.png" style="width:123px;height:77px;margin:auto;margin-top:15px;display:block" alt="fliyr"></a>
			
			<p style="font-family:Oswald;text-transform:uppercase;color:#969696;margin:auto;display:block;width:95px;font-weight:300;font-size:1rem"> Georgia Tech</p>
		
		<div class="large-12 columns">
		<hr style='margin-left:-30px'>
		</div>
	
	<div class="large-12 columns ">
	<a href="http://fliyr.com/sign-up" class="grey-sidebar">Ventures</a>
	<a href="http://fliyr.com/about-us" class="green-sidebar">Expertise </a>
	<a href="http://fliyr.com/about-us" class="grey-sidebar">Messages </a>
	<a href="http://fliyr.com/about-us" class="grey-sidebar">Our Service </a>
	</div>
	</div>

	<div class="large-8 large-offset-2 small-12 columns body" >
		<div  ng-if="currentUser" >
			<div class='row'>
				<span class="user-menu right" ng-mouseover="menushow=true" ng-mouseleave="menushow=false">{{ currentUser.user_name}}</span>
			</div>
			<div clas='row' ng-show="menushow" ng-mouseover="menushow=true" ng-mouseleave="menushow=false">
				<ul class="user-menu-items right" >
					<li>Expertise Profile</li>
					<li>Ventures</li> 
					<li>routSettings</li>
					<li>Sign out</li>
				</ul>
			</div>
		</div>
		<!--user not signed in-->
		<div  ng-if="!currentUser" >
			<div class='row'>
				<form name="loginForm" class='right' ng-submit="login(credentials)" ng-controller="LoginController" novalidate>
				  <label for="username">E-mail:</label>
				  <input type="text" id="useremail"  ng-model="credentials.user_email">
				  <label for="password">Password:</label>
				  <input type="password" id="password"   ng-model="credentials.password">
				  <button type="submit" class='tiny'>Login</button>
				  <button type="submit" class='tiny'>Signup</button>
				</form>
			</div>
			<div clas='row'>
				<ul class="user-menu-items right" style="display:none">
					<li>Expertise Profile</li>
					<li>Ventures</li> 
					<li>Settings</li>
					<li>Sign out</li>
				</ul>
			</div>
		</div>
		<button class="small" ng-click="createVentureDialog()">Create Venture</button>
		<div ng-controller="MainController">

			<ul ng-repeat="venture in ventures">
				<venture details="venture"></venture>
			</ul>
		</div>

		<div class="columns"></div>
	</div>


<modal-dialog show='modalShown' width='750px' height='60%'>
  <p>Lets create a new Venture<p>
</modal-dialog>
</div>
</div>
</body>
</html>
