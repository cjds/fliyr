@extends('layouts.master')


@section('content')

<div class='row' data-equalizer>
@foreach ($ventures as $venture)
    	<div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox' data-equalizer-watch>
    		<div class='venture' style="display:block">
				<span class='title' ><%$venture['venture_name']%></span>

				<p>
					<%$venture['venture_description']%>
				</p>
				<span class='positiontext'>Open Positions</span>
				<br />
				@foreach ($venture['positions'] as $position)
					<span class='semititle' data-id='<%$position['position_id']%>'><%$position['position_name']%></span>
					<p class='taglist croppedtext'> 

						@foreach ($position['tags'] as $tag)
							<a href="#">#<%$tag['tag_name']%></a>
						@endforeach
					</p>
				@endforeach
			</div>
			@foreach ($venture['positions'] as $position)
			<div class='position' style="display:none" data-id='<%$position['position_id']%>'>
				<span class='title' ><%$position['position_name']%></span>
				<p>
					<%$position['position_description']%>
				</p>
				<p class='taglist'> 
					@foreach ($position['tags'] as $tag)
							<a href="#">#<%$tag['tag_name']%></a>
						@endforeach
				</p>
				<button class=' button blue tiny backbtn'>Back</button>
				<button class='button blue tiny messagebtn' >Mesage</button>				
			</div>
			@endforeach
    	</div>
    	@endforeach

   <div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox ' data-equalizer-watch>
	<div class='addventurebox' >
		<form id='ventureform'>
			<span class='title' >
				<input type='text' name='venture' placeholder='VentureName'/>
			</span>
			<p>
				<textarea rows="4" cols="35" name="description" placeholder="Enter a description"></textarea>
			</p>
			<p> 
				<input type='text' placeholder='#' name='taginput' class='taginput' autocomplete="on"/>
			</p>
			<div class='positionlist'>
			</div>
			<p class='addposition'>
				<a href="#">Add Position (3 Remaining)</a>
			</p>
		</form>
	</div>

	<div class='addpositionbox' style="display:none">
		<form id='positionform'>
			<span class='title' >
				<input type='text' name='position' placeholder='PositionName'/>
			</span>
			<p>
				<textarea rows="4" cols="35" name='description' placeholder="Enter a description"></textarea>
			</p>
			<p> 
				<input type='text' placeholder='#' name='taginput' class='taginput'/>
			</p>
		</form>
	</div>
	
<div class='row'>
	<div class='submitdiv columns small-12'>
		<input class='right  tiny finishbtn black button' value='DONE' type='submit' />
		<input class='right  tiny cancelbtn red button' value='CANCEL' type='submit' />
	</div>
</div>
</div>
<div class="column" ></div>


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
		console.log($('#ventureform .taginput').val());
		if(venturestate){
			$.ajax({
				url: "ajax/add-venture",
				type: "POST",
				data: { 
				  	user_id:<% $user_id %>,
				  	name: $('#ventureform input[name=venture]').val(),
					tags:$('#ventureform input[name=taginput]').val(),
					description:$('#ventureform textarea[name=description]').val(),
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
			    tags:$('#positionform input[name=taginput]').val() 
			};
			$('.positionlist').append('<span class="title">'+position.name+' <a href="#" data-id='+positions.length+' class="cancelbtn">Cancel</a></span><br><p>'+position.tags+'</p>');			
			positions.push(position);
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');			
			$('#positionform input[name=taginput]').tagit('removeAll');
			$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )')
		}
		venturestate=true;
		
	});

	$('.taginput').tagit({
		"preprocessTag":function(val) {
  			if (!val) { return ''; }
  			return '#'+val;
		},
		"allowSpaces":true,
		"availableTags": ["c++", "java", "php", "javascript", "ruby", "python", "c"],


	});

	$('.cancelbtn').click(function(e){

		if(venturestate){

		}
		else{
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');
			$('#positionform input[name=taginput]').tagit('removeAll');
			$('.finishbtn').attr('value','DONE');
			$('.addpositionbox').hide();
			$('.addventurebox').show();				
		}
	})


});
</script>
@stop
