@extends('layouts.master')

<style type="text/css">
	.venturebox{
		border: 1px solid #999;
	}
	.title{
		color:#58b947;
	}

	.venturebox p{
		font-size: 0.8em;
		color:#555;
		text-align: justify;
	}

	.large-offset-half{
		margin-left:4.15% ;
	}

	.large-3-5{
		width:29.1667%;
}
</style>

@section('content')

<div class='row'>
		<div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox' data-equalizer-watch>
		<form id='experienceform'>
			<span class='title' ><% $user_name %></span>
			<p>
				<textarea rows="5" cols="35" name='description' placeholder="Please describe yourself"></textarea>
			</p>
			<span>Expertise</span>
			<p> 
				<input type='text' placeholder='#' class='taginput' name='taginput' cols="35" rows="3" /> 
			</p>
		<div class='submitdiv row'>
			<input class='right  tiny black button' value='DONE' type='submit' />
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.user-menu').hover(function(){
			$('.user-menu-items').toggle();
		});

		var user_id=<% $user_id %>;
		$('.taginput').tagit({
		"preprocessTag":function(val) {
  			if (!val) { return ''; }
  			return '#'+val;
		}
		});

		$.ajax({
			url: "<% URL::to('ajax/get-my-experience')%>",
  			type: "GET",
  			data: { user_id :user_id }
  		}).done(function(msg){
  			var data=jQuery.parseJSON(msg);
  			var tags="";
  			console.log(data.tags)
  			$('.venturebox textarea[name=description]').val(data.description);
  			for(var i=0;i<data.tags.length;i++){
  				console.log(data.tags[i]);
  				tags+='#'+data.tags[i].tag_name+',';
  			}
  			tags=tags.slice(0,-1);
  			$('.venturebox textarea[name=taginput]').val(tags);
  		});

  		$('#experienceform').submit(function(e){
  			e.preventDefault();
  			var description=$('.venturebox textarea[name=description]').val();
  			var tags=$('.venturebox textarea[name=taginput]').val();
	  		$.ajax({
				url: "<% URL::to('ajax/add-experience')%>",
	  			type: "POST",
	  			data: { user_id : user_id,user_description:description,experience_tags:tags}
	  		}).done(function(msg){
	  			alert('Awesome! Updated');
	  		});
  		});

	});
	$(document).foundation();

	</script>
@stop

