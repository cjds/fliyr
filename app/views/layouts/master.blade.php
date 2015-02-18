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
	<link href='http://fonts.googleapis.com/css?family=Roboto:500,300,300italic,400,100' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="<?php echo asset('img/icon.ico');?>">

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script type='text/javascript' src="<%URL::asset('js/handlebars.js')%>" ></script>
    <script type='text/javascript' src="<%URL::asset('js/moment.js')%>" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/history.js/1.8/bundled-uncompressed/html4+html5/dojo.history.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<script src="<% URL::asset('js/tag-it.js')%>"></script>

	<script src="<% URL::asset('js/foundation.min.js')%>"></script>

	<script src="<% URL::asset('js/jquery.form.min.js')%>"></script>

<link media="all" type="text/css" rel="stylesheet" href="<%URL::asset('css/foundation.css')%>">
	    <link href="<% URL::asset('css/jquery.tagit.css')%>" rel="stylesheet" type="text/css">
    <link href="<% URL::asset('css/tagit.ui-zendesk.css')%>" rel="stylesheet" type="text/css">

	<style type="text/css">
	.logo-img{
		height:30px;margin-top:6px;margin-left:79px;width:auto;
	}

	@media only screen and (max-width: 40em) {
		.logo-img{
			margin-left: 0px;
			margin-top:-5px;
			display:inline-block;
		}

		.logo-img2{
			display:inline-block !important
		}

		.name-person{
			border:1px solid #7d7d7d;
		}
	}


	@media only screen and (min-width: 40em){
			.body{
				 margin-left:16.67%
			}
	}


	input{
		height: 30px;
	}
	.venturebox{
		overflow-x:hidden;
		border: 1px solid #7d7d7d;
	}
	.black{
		background: #333;
	}
	.black:hover{
		background: #666;
	}
	.submitdiv a{
		margin: 5px;
	}

	.red{
 		background-color:#c22 !important;
	}


	.red:hover{
 		background-color:#a00 !important;
	}	


	.light-green-button{
		padding: 3px;
		font-size: 12px;
		padding-right: 7px;
		padding-left: 7px;
		background:rgba(255,255,255,0);
		border:1px #2AD6AE solid;
		color:#2AD6AE;
		text-transform:uppercase;

	}

	.light-green-button-used{
		background-color: #2AD6AF; 
    	color: #FFFFFF; 
    	cursor:not-allowed;
	}

	.rotating-circle-used{
		    -webkit-animation-name: rotate; 
    -webkit-animation-duration: 0.6s; 
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;

    -moz-animation-name: rotate; 
    -moz-animation-duration: 0.6s; 
    -moz-animation-iteration-count: infinite;
    -moz-animation-timing-function: linear;
    cursor:not-allowed;

	}
		.green{
			background:#2AD6AF;
		}

		.green:hover{
			background:#2AD6AF;
		}

		.grey-sidebar:active{
			color:#7d7d7d;
		}
		.grey-sidebar{
			color:#7d7d7d;
			font-family: 'Roboto','Helvetica',sans-serif;
			font-weight:300;
			font-size: 12px;
			margin-left:auto;
			margin-right:auto;
			margin-top:2px;
			display:block;
			width:95px;
			text-transform:uppercase;
			text-align: center;
		}

		.green-sidebar{
			color:#2AD6AE;
			font-weight:500;
			font-family: 'Roboto','Helvetica',sans-serif;
			font-size: 12px;
			margin-left:auto;
			margin-right:auto;
			margin-top:2px;
			display:block;
			width:95px;
			text-transform:uppercase;
			text-align: center;
		}

		.venturebox{
			padding-left: 24px;
			padding-top: 10px;
			padding-right: 24px;
			padding-bottom:10px;
			min-height: 280px;
			overflow: hidden;
			-webkit-transition: all 0.5s; /* For Safari 3.1 to 6.0 */
			-mozilla-transition: all 0.5s;
    		transition: all 0.5s;
    		transform-style: preserve-3d;
		}

		.venturebox .title{
			font-weight: 400;
			font-size: 16px;
			text-align: center;
			margin-bottom: 6px;
			color:#7d7d7d;
		}

		.card-description{
			font-style: italic;
			font-weight: 300;
			font-size: 12px;
			line-height: 15px;
			color:#7d7d7d;
		}

		.position-title a{
			color:#2AD6AF;
			font-weight: 400;
			font-size: 12px;	
		}

		.taglist{
			font-size: 12px;
			font-weight: 300;
			color:#7d7d7d;
			margin-bottom:0px;
			list-style: none;
			overflow-x: auto;  
			overflow-y:hidden;
			height:14px;
		}

		.taglist2{
			font-size: 12px;
			font-weight: 300;
			color:#7d7d7d;
			margin-bottom:0px;
			list-style: none;
			height:14px;
		}


		.taglist li,.taglist2 li{
			margin-right:2px;
			display: inline-block;
			white-space: nowrap; // stop the wrapping in the first place
		}
				

		.venturebox .positiontitle,.expertisetitle .positiontitle{
			font-weight: 400;
			font-size: 14px;
			text-align: center;
			margin-top: 6px;
			color:#7d7d7d;

		}

		.flip{
		transform: rotateY(180deg);
		}


		.venturebox .row{
			margin-left: 0em;
			margin-right: 0em;
		}


		.left-menu a{
			margin-top: 8px;

		}

		.addposition a{
			font-size: 12px;
			font-weight: 400;
			color: #2AD6AF;
		}

		.submitdiv{
			position: absolute;
			bottom: 12px;
			right: 12px;
			float: right;
			padding: 0px;
		}

		.submitdiv a{
			float: right;

		}

		.editdiv{
			position: absolute;
			bottom: 42px;
			right: 32px;
			padding: 0px;
		}

		.editdiv a{
			float: right;
		}

		.create-venture-div .venturebox{
			padding: 5px;
			padding-left: 20px;
			padding-right: 20px;
			padding-top: 16px;
		}

		.venturebox input[name=venture],.venturebox input[name=position]{
			font-weight: 400;
			color:#888;
			font-size: 16px;
			text-align: center;
			height: 22px;
			margin-bottom: 6px;
			padding:0px;
		}

		.venturebox textarea,.venturebox textarea{
			font-weight: 300;
			font-style: italic;
			font-size: 12px;
			margin-bottom: 3px;
		}

		.venturebox p{
			margin-bottom: 6px;
		}

		.position-edit-item{
			margin: 2px;
		}

		.position-edit-item hr{
			margin: 2px;
		}

		.position-edit-item ul{
			margin-bottom: 0px;
		}

		.position-edit-button {
			color:#2AD6AE;	
			font-size:12px;

		}

		.position-edit-item .position-title,.position-edit-item .position-title img{
			display: inline-block;
		}

		.messagetable tr td{
			border-bottom:1px solid #ddd;
			overflow-x:hidden; 
		}

		.messagetable tr:hover{
			background: #f7f7f7;
			cursor: pointer;
		}

		.circle:before {
		    content: ' \25CF';
		    font-size: 10;
		    color:#dc0066;
		}

		.notification{
			width:15px !important;
			font-size:10px !important;
			color:#fff !important;
			margin-top:1px;
			line-height:15px !important;
			vertical-align: middle;
			text-align:center;
			background:#dc0066 !important;
			margin-top:10px;

		}



		.notification:hover{
			cursor: pointer;
		}

		.aboutus{
			
		}

		.aboutus dd{
			font-size: 14px;
			font-weight: 300;
			font-style: normal;
			line-height: 16px;
			margin-bottom: 12px !important;
		}

		.aboutus dt{
			margin-bottom: 4px;
			font-weight: 500;

			color: #7d7d7d;
			font-size: 14px;
		}

		.messagetitle h2{
			font-size: 16px;
			font-weight: 400;
			display:block;
			color: #7d7d7d;
		}

		.threadtable{
			border: none;

		}

		.threadtable .datetext{
			color:#7d7d7d;
			font-size: 11px;
			font-style: italic;
			font-weight: 300;
			vertical-align: top;			
		}

		.threadtable .nametext{
			color: #7d7d7d;
			font-size: 14px;
			font-weight: 500;
			vertical-align: top;
			
		}

		.threadtable .messagetext{
			color: #7d7d7d;
			font-size: 13px;
		}

		.position-message-div{
			/*position: absolute;
			bottom: -6px;
			right: -6px;*/
		}

		.inboxdiv  h1{
			font-size:12px;
			color:#7d7d7d;
			text-transform:uppercase;
			font-weight:300;
			padding-bottom:15px;
		}

		.inboxdiv .messagetable td{
			padding:7px;
		}

		.inboxdiv .datetext{
			font-style:italic;
			font-size:12px;
			font-weight:300;
			color:#7d7d7d;
		}

		.inboxdiv .usertext {
			font-size:14px;
			font-weight:500;
			color:#7d7d7d;
		}
		

		.titletext .subjecttext{
			font-size:14px;
			font-weight:500;
			color:#7d7d7d;
		}

		.titletext .messagetext{
			font-size:14px;
			font-weight:400;
			color:#7d7d7d;
		}		

		.messagetable{
			border:none;
		}

		.return-to-inbox{
			font-weight:300;
			text-transform:uppercase;
			color:#2AD6AE;	
		}

		.socialdiv{
			text-align:center;
			margin:auto;
			margin-top:20px;
		}

		.socialmediaicons{
			width:20px;height:auto;display:inline-block;margin:auto;margin-top:14px;
			position:absolute;bottom:70px;
			left:0px;
		}

		.socialmediaicons:hover{
			cursor:pointer;
		}

		.facebook{
			margin-left:32%;
		}

		.twitter{
			margin-left:50%;
		}

		.instagram{
			margin-left:68%;
		}

		.reveal-modal-bg {
background-color: transparent;}


.position-edit-button:hover{
	cursor:pointer;
}
.top-bar-section li:not(.has-form) a:not(.button){
	line-height:2.3125rem;
	margin-top:-1px;
}

.notificaition-mobile{
	right:50px !important;
	position:absolute !important;
	top:6px !important;
}

.side-menu-notification .notification{
	display: inline-block;
	margin-top: -2px;
	margin-left: 5px;
}

.flip-container {
	perspective: 1000;
}
	/* flip the pane when hovered */
.flip-container.hover .flipper {
		transform: rotateY(180deg);
	}

.flip-container, .front, .back {
	width: 320px;
	height: 480px;
}

/* flip speed goes here */
.flipper {
	transition: 0.6s;
	transform-style: preserve-3d;
	position: relative;
}

/* hide back of pane during swap */
.front, .back {
	backface-visibility: hidden;

	position: absolute;
	top: 0;
	left: 0;
}

/* front pane, placed above back */
.front {
	z-index: 2;
	/* for firefox 31 */
	transform: rotateY(0deg);
}

/* back, initially hidden pane */
.back {
	transform: rotateY(180deg);
}


	</style>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41260149-2', 'auto');
  ga('send', 'pageview');

</script>    
<body>



<div class="sticky">
  <nav class="top-bar sticky" data-topbar role="navigation" data-options=>
    <ul class="title-area">
	    <li class="name">
	      <h1>
	      	<a href="<% URL::to('/')%>">
	      		<img src="<%URL::asset('img/fliyr_logo.png')%>" class='logo-img' style="display:inline-block;" />
	      		<img src="<%URL::asset('img/fliyr_logo2.png')%>" class='logo-img2 show-for-small-only' style="width:50px;margin-top:7px;height:auto;margin-bottom:10px;margin-left:7px" alt="fliyr" >
	      	</a>
	      </h1>
	     </li>
	     <li class="toggle-topbar notification-menu-item notificaition-mobile"></li>
	     <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>

     </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    
    <ul class="right">
      <li class="name-person <?php if (isset($user_name))echo 'has-dropdown'; else echo 'override-not-click';?>">
        <a href="<?php if (!isset($user_name)){echo URL::to('/');} else echo '#'?>">
			@if (isset($user_name))
							<% $user_name %>
			@else
				Log In
			@endif
			
        </a>
        @if (isset($user_name))
        <ul class="dropdown">
						
							<li><a href="<% URL::to('myexpertise')%>">My Expertise</a></li>
							<li><a href="<% URL::to('myventures')%>">My Ventures</a></li> 
							<li><a href="<% URL::to('inbox')%>">Inbox</a></li>
							<li><a href="<% URL::to('signout')%>">Sign out</a></li>
						
						
        </ul>
        @endif
      </li>

    <!--<li class="notification-menu-item hide-for-small">
    </li>-->
      <li class='show-for-small' style='border:1px solid #7d7d7d;margin-top:-1px'><a href="<% URL::to('ventures') %>" >Ventures</a></li>
	  <li class='show-for-small' style='border:1px solid #7d7d7d;margin-top:-1px'><a href="<% URL::to('expertise') %>" >People</a></li>
		<li class='show-for-small' style='border:1px solid #7d7d7d;margin-top:-1px'><a href="<% URL::to('about-us') %>">About</a></li>
      <li>
      <a href="#" class='special'>Georgia Tech</a></li>
    </ul>
    </section>
  </nav>
</div>


@section('sidebar')
	<div class="column large-2 medium-2 small-12 menu hide-for-small " style='position:fixed;height:100%' >
			<a href="<% URL::to('/') %>" style="">
				<img src="<%URL::asset('img/fliyr_logo2.png')%>" style="width:55px;height:auto;margin:auto;margin-top:15px;display:block;margin-bottom:10px" alt="fliyr">
			</a>		
	
	
	<div class="large-12 columns left-menu hide-for-small">
		<div class='row'>
			<a href="<% URL::to('ventures') %>" class="venturelink grey-sidebar">Ventures</a>
			<a href="<% URL::to('expertise') %>" class="expertiselink green-sidebar">People</a>
			<hr style='padding-left:20px;padding-right:20px;'>
			<a href="<% URL::to('myexpertise') %>" class="myexpertiselink grey-sidebar">My Expertise</a>
			<a href="<% URL::to('myventures')%>" class="myventurelink grey-sidebar">My Ventures</a>
			<a href="<% URL::to('inbox')%>"  class="messageinboxlink grey-sidebar">Inbox <span class='notification-menu-item side-menu-notification'></span></a>
			<hr style='padding-left:20px;padding-right:20px;'>
			<a href="<% URL::to('about-us') %>" class="aboutlink grey-sidebar">About</a>
		</div>
	</div>
		<a href="https://facebook.com/fliyr" target="_blank"><img src=<%URL::asset('img/fliyr_icons_facebook.png')%> class='socialmediaicons facebook' /></a>
		<a href="https://twitter.com/fliyr" target="_blank"><img src=<%URL::asset('img/fliyr_icons_twitter.png')%> class='socialmediaicons twitter' /></a>
		<a href="http://instagram.com/fliyr" target="_blank"><img src=<%URL::asset('img/fliyr_icons_instagram.png')%> class='socialmediaicons instagram' /></a>

	</div>        
     @show

	<div class="large-10 medium-10 medium-offset-2 small-12 columns body" >
	
			<div class='row'>
            	@yield('content')
            </div>
    </div>

<style>
.notification-bar{
	position:fixed;
	top:0;
	background-color:#ddd;
	color:#7d7d7d;
	min-height:26px;
	width:60%;
	margin-left:20%;
	text-align:center;
	box-shadow:0px 0px 7px 3px #aaa;
	display: none;
}

.notification-bar a{
	text-decoration: underline;
	font-weight: 500;
}
</style>
<div class='notification-bar'>
</div>
</body>
	<script src="<% URL::asset('js/library.js')%>"></script>    
<script type="text/javascript">
	$(document).foundation();
</script>

</html>

