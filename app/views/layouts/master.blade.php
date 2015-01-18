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
    <script type='text/javascript' src="<%URL::asset('js/handlebars.js')%>" ></script>

	<script src="<% URL::asset('js/tag-it.js')%>"></script>

	<script src="<% URL::asset('js/foundation.min.js')%>"></script>

	<script src="<% URL::asset('js/jquery.form.min.js')%>"></script>

<link media="all" type="text/css" rel="stylesheet" href="<%URL::asset('css/foundation.css')%>">
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

	</style>
</head>
<body>



<div class=" sticky">
  <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on">
    
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
    </ul>
    </section>
  </nav>
</div>


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
            	@yield('content')
            </div>
    </div>

</body>
	<script src="<% URL::asset('js/library.js')%>"></script>    
<script type="text/javascript">
	$(document).foundation();
</script>

</html>

