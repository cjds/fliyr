@extends('layouts.master')


@section('content')
<div class='row'>
<div class='row' data-equalizer>
	<div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox' data-equalizer-watch>
				<span class='title' ><input type='text' placeholder='VentureName'/></span>
				<a href='#'><img src="<% URL::asset('img/email.svg')%>" style='width:20px;height:auto;margin-right:10px' class='right'/></a>
		<p>
			<textarea rows="7" cols="35" placeholder="Enter a description"></textarea>
		</p>
		<span>Expertise</span>
		<p> <input type='text' placeholder='#' class='tag'/></p>
		
	</div>
</div>
<div class='row'>
	<div class='submitdiv columns large-3-5 large-offset-half medium-5  small-12  panel '><input class='right  tiny black button' value='DONE' type='submit' /></div>
</div>
</div>
<br />
<div class='row'>
<div class='row' >
	
	<div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox addventurebox' data-equalizer-watch>
		<form id='ventureform'>
			<span class='title' >
				<input type='text' name='venture' placeholder='VentureName'/>
			</span>
			<p>
				<textarea rows="4" cols="35" name="description" placeholder="Enter a description"></textarea>
			</p>
			<p> 
				<input type='text' placeholder='#' name='tags' class='tag'/>
			</p>
			<div class='positionlist'>
			</div>
			<p class='addposition'>
				<a href="#">Add Position (3 Remaining)</a>
			</p>
		</form>
	</div>

	<div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox addpositionbox' style="display:none">
		<form id='positionform'>
			<span class='title' >
				<input type='text' name='position' placeholder='PositionName'/>
			</span>
			<p>
				<textarea rows="4" cols="35" name='description' placeholder="Enter a description"></textarea>
			</p>
			<p> 
				<input type='text' placeholder='#' name='tags' class='tag'/>
			</p>
		</form>
	</div>
	<div class="column" ></div>
</div>
<div class='row'>
	<div class='submitdiv columns large-3-5 large-offset-half medium-5  small-12  panel '>
		<input class='right  tiny finishbtn black button' value='DONE' type='submit' />
		<input class='right  tiny cancelbtn red button' value='CANCEL' type='submit' />
	</div>
</div>
</div>



<script> 
// wait for the DOM to be loaded 
$(document).ready(function() { 
	var positions=[];
	var venture={};
	var venturestate=true;
	$('.addposition a').click(function(e){
		e.preventDefault();
		$('.addpositionbox').show();
		$('.addventurebox').hide();
		$('.finishbtn').attr('value','ADD POSITION');
		venturestate=false;
	});

	$('#ventureform').on('click','.cancelbtn',function(e){
			e.preventDefault();
		    positions.splice($(this).attr('data-id'), 1);
		    $('.positionlist').html('');
		    for (var i = 0; i < positions.length; i++) {
		    	$('.positionlist').append('<span class="title">'+positions[i].name+' <a href="#" data-id='+positions.length+' class="cancelbtn">Cancel</a></span><br><p>'+positions[i].tags+'</p>');
		    };
			$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )');
	});

	$('.finishbtn').click(function(e){
		
		if(venturestate){
			$.ajax({
				url: "ajax/add-venture",
				type: "POST",
				data: { 
				  	user_id:<% $user_id %>,
				  	name: $('#ventureform input[name=venture]').val(),
					tags:$('#ventureform input[name=tag]').val(),
					description:$('#ventureform textarea[name=description]').val();
					positions:positions
				},
				success: function(data, textStatus) {
				        if (data.redirect) {
				            // data.redirect contains the string URL to redirect to
				            window.location.href = data.redirect;
				        }
					}				  
				});
		}
		else{
			$('.finishbtn').attr('value','DONE');
			$('.addpositionbox').hide();
			$('.addventurebox').show();		    
			var position = {
			    name:$('#positionform input[name=position]').val(),
			    description:$('#positionform textarea[name=description]').val(),
			    tags:$('#positionform input[name=tags]').val()
			};
			$('.positionlist').append('<span class="title">'+position.name+' <a href="#" data-id='+positions.length+' class="cancelbtn">Cancel</a></span><br><p>'+position.tags+'</p>');			
			positions.push(position);
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');
			$('#positionform input[name=tags]').val('');
			$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )');
			venturestate=true;
		}
		
		
	});

	$('.cancelbtn').click(function(e){

		if(venturestate){

		}
		else{
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');
			$('#positionform input[name=tags]').val('');
			$('.finishbtn').attr('value','DONE');
			$('.addpositionbox').hide();
			$('.addventurebox').show();				
		}
	})


});
</script>
@stop
