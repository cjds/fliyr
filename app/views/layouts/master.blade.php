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
	<link href='http://fonts.googleapis.com/css?family=Roboto:500,300,300italic,400' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://fliyr.com/img/icon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>


    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script type='text/javascript' src="<%URL::asset('js/handlebars.js')%>" ></script>
    <script type='text/javascript' src="<%URL::asset('js/moment.js')%>" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/history.js/1.8/bundled-uncompressed/html4+html5/dojo.history.js"></script>

	<script src="<% URL::asset('js/tag-it.js')%>"></script>

	<script src="<% URL::asset('js/foundation.min.js')%>"></script>

	<script src="<% URL::asset('js/jquery.form.min.js')%>"></script>

<link media="all" type="text/css" rel="stylesheet" href="<%URL::asset('css/foundation.css')%>">
	    <link href="<% URL::asset('css/jquery.tagit.css')%>" rel="stylesheet" type="text/css">
    <link href="<% URL::asset('css/tagit.ui-zendesk.css')%>" rel="stylesheet" type="text/css">

	<style type="text/css">



	.logo-img{
		height:30px;margin-top:6px;margin-left:75px;width:auto;
	}

	@media only screen and (max-width: 40em) {
		.logo-img{
			margin-left: 0px;
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
		padding: 5px;
		font-size: 12px;
		padding-right: 15px;
		padding-left: 15px;

	}
		.green{
			background:#2AD6AF;
		}

		.green:hover{
			background:#4AF6CE;
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
			padding-top: 16px;
			padding-right: 24px;
			min-height: 280px;
			overflow: hidden;
			-webkit-transition: all 0.5s; /* For Safari 3.1 to 6.0 */
			-mozilla-transition: all 0.5s;
    		transition: all 0.5s;
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

		.taglist{
			list-style: none;

		}

		.taglist li{
				display: inline-block;
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
	</style>
</head>
<body>



<div class=" sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
    <ul class="title-area">
	    <li class="name">
	      <h1>
	      	<a href="<% URL::to('/')%>">
	      		<img src="<%URL::asset('img/fliyr_logo.png')%>" class='logo-img' style="" />
	      	</a>
	      </h1>
	     </li>
	     <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
     </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    
    <ul class="right">

      <li class="has-dropdown">
        <a href="#">
			@if (isset($user_name))
							<% $user_name %>
						@else
							Not logged In?
						@endif
			
        </a>
        <ul class="dropdown">
						@if (isset($user_name))
							<li><a href="<% URL::to('myexpertise')%>">My Expertise</a></li>
							<li><a href="<% URL::to('myventures')%>">My Ventures</a></li> 
							<li><a href="<% URL::to('inbox')%>">Message Inbox</a></li>
							<li><a href="<% URL::to('signout')%>">Sign out</a></li>
						@else
							<li><a href="<% URL::to('/')%>">Log In</a></li>
							<li><a href="<% URL::to('/')%>">Sign Up</a></li> 
						@endif
        </ul>
      </li>
      <li class='show-for-small'><a href="<% URL::to('ventures') %>" >Ventures</a></li>
	  <li class='show-for-small'><a href="<% URL::to('expertise') %>" >Expertise</a></li>
		<li class='show-for-small'><a href="<% URL::to('about-us') %>">About </a></li>
		<li class='show-for-small'><a href="<% URL::to('about-us') %>">Contact </a></li>
      <li>
      <a href="#">Georgia Tech</a></li>
    </ul>
    </section>
  </nav>
</div>


@section('sidebar')
	<div class="column large-2 small-12 menu" >
			<a href="<% URL::to('/') %>" style="">
				<img src="<%URL::asset('img/fliyr_logo2.png')%>" style="width:55px;height:auto;margin:auto;margin-top:15px;display:block;margin-bottom:10px" alt="fliyr">
			</a>		
	
	
	<div class="large-12 columns left-menu hide-for-small">
	<a href="<% URL::to('ventures') %>" class="venturelink grey-sidebar">Ventures</a>
	<a href="<% URL::to('expertise') %>" class="expertiselink green-sidebar">Expertise</a>
	<hr style='padding-left:20px;padding-right:20px;'>
	<a href="<% URL::to('about-us') %>" class=" grey-sidebar">About </a>
	
	</div>
	</div>        
     @show

	<div class="large-10 small-12 columns body" >
	
			<div class='row'>
            	@yield('content')
            </div>
    </div>

</body>
	<script src="<% URL::asset('js/library.js')%>"></script>    
<script type="text/javascript">
	$(document).foundation();
</script>

</html>

