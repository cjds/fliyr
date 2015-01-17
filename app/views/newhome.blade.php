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
		text-align: left;
	}

	.large-offset-half{
		margin-left:4.15% !important;
	}

	.large-3-5{
		width:29.1667% !important;
	}

	.venturebox .positiontext{
		font-size: 0.7em;
	}

	.semititle{
		font-size: 0.9em;
		color: #58b947;
	}
	.semititle:hover{
		text-decoration: underline;
		cursor: pointer;
	}
	.croppedtext{
		white-space: nowrap;
		overflow: hidden;
	}

	.createventure{
		border: 1px solid #999;
		padding: 0.2em ; 
		width:130px;
		margin-bottom: 30px;

	}

	.createventure:hover{
		cursor: pointer;

	}
	.createventure span{
		font-size: 4em;
		line-height: 0.4em;
		color:#58b947;
		font-weight: 300;
		float: right;
		margin-top: -10px;

	}

	.createventure a{
		color:#888;
		font: 'Arial',sans-serif;

	}

</style>

@section('content')
    <div class='row'>
    	<div class='createventure large-offset-half'>
			<a href="#" data-reveal-id="create-venture-modal">Create Venture</a>
			<span>+</span>
		</div>
    </div>

	<div id="create-venture-modal" class="small reveal-modal " data-reveal >
		<div class='columns small-12  panel venturebox addventurebox' style='margin:auto;'data-equalizer-watch>
			<form id='ventureform'>
				<span class='title' >
					<input type='text' name='venture' placeholder='VentureName'  style="width:95%"/>
				</span>
				<p>
					<textarea rows="4" cols="35" name="description" placeholder="Enter a description" style="width:95%"></textarea>
				</p>
				<p> 
					<input type='text' placeholder='#' name='taginput' class='taginput' style="width:95%"/>
				</p>
				<div class='positionlist'>
				</div>
				<p class='addposition'>
					<a href="#">Add Position (3 Remaining)</a>
				</p>
			</form>
		</div>

		<div class='columns  small-12  panel venturebox addpositionbox' style="display:none">
			<form id='positionform'>
				<span class='title' >
					<input type='text' name='position' placeholder='PositionName' style="width:95%"/>
				</span>
				<p>
					<textarea rows="4" cols="35" name='description' placeholder="Enter a description" style="width:95%"></textarea>
				</p>
				<p> 
					<input type='text' placeholder='#' name='taginput' class='taginput' style="width:95%"/>
				</p>
			</form>
		</div>
		<div class='row'>
			<div class='submitdiv columns small-12'>
				<input class='right  tiny finishbtn black button' value='DONE' type='submit' />
				<input class='right  tiny cancelbtn red button' value='CANCEL' type='submit' />
			</div>
		</div>
		<div class="column" ></div>
	<a class="close-reveal-modal">&#215;</a>
	</div>

<div id='send-message-modal' class="reveal-modal" data-reveal>

    <div class='message' style="">
    	<div class='large-6 small-12 columns'>
    		Blah blaH!
    	</div>
    	<div class='large-6 small-12 columns'>
    		<div class='row'>
	    		<span>To: Will</span>
	    		<span class='right closebtn'>X</span>
	    	</div>
	    	<div class='row'>
	    		<span>Regarding: The IT Director</span>
	    	</div>
	    	<div class='row'>
	    		<textarea cols='50' rows='8'></textarea>
	    	</div>
	    	<div class='row'>
	    		<button class='sendbtn right tiny'>Send</button>
	    	</div>
	    </div>
    </div>
    <a class="close-reveal-modal">&#215;</a>
 </div>

    <div class='row' data-equalizer>
    	<?php $count=0;?>
    	@foreach ($ventures as $key => $venture)
    	<?php $count++;?>
    	<div class='columns large-3 large-offset-1 medium-5  small-12  panel venturebox' data-equalizer-watch>
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
					<ul class='tagit ui-widget ui-widget-content ui-corner-all taglist'>
						@foreach ($position['tags'] as $tag)
							<li class='tagit-choice  ui-widget-content ui-state-default ui-corner-all'>
								<span class='tagit-label'>#<%$tag['tag_name']%></span>
							</li>
						@endforeach
					</ul>
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

    	<?php if($count%3==0):?>
    		</div>
    		<div class='row' data-equalizer>
    	<?php endif;?>
    	@endforeach
    	</div>
    	<div class='columns'>
    	</div>
    </div>


<script type="text/javascript">
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.user-menu').hover(function(){
			$('.user-menu-items').toggle();
		});

		$('.venturebox .semititle').click(function(e){
			var dataid=$(this).attr('data-id');
			$(this).parent().parent().find('.position[data-id='+dataid+']').show();
			$(this).parent().hide();
		});

		$('.venturebox .position .backbtn').click(function(e){
			$(this).parent().parent().find('.venture').show();
			$(this).parent().hide();
		});

		$('.venturebox .position .messagebtn').click(function(e){
			$('#send-message-modal').foundation('reveal', 'open');
		});		

	})
	$(document).foundation();

	</script>

	
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
						if(data=='ok'){
							$('#create-venture-modal').foundation('reveal','close')
						}
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
		}
	});

	$('.cancelbtn').click(function(e){
		e.preventDefault();

		if(venturestate){
			$('#create-venture-modal').foundation('reveal','close');
		}
		else{
			console.log('sd');
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

  

  <div  id='venturehidden' class='columns large-3 large-offset-1 medium-5  small-12  panel venturebox' style="display:none">
    		<div class='venture' style="display:block">
				<span class='title' ><%$venture['venture_name']%></span>
				<p>
					<%$venture['venture_description']%>
				</p>
				<span class='positiontext'>Open Positions</span>
				<br />
					<span class='semititle' data-id='<%$position['position_id']%>'><%$position['position_name']%></span>
					<p class='taglist croppedtext'> 
					<ul class='tagit ui-widget ui-widget-content ui-corner-all taglist'>
						@foreach ($position['tags'] as $tag)
							<li class='tagit-choice  ui-widget-content ui-state-default ui-corner-all'>
								<span class='tagit-label'>#<%$tag['tag_name']%></span>
							</li>
						@endforeach
					</ul>
					</p>
			</div>
   </div>


	<div id='positionhidden' class='position' style="display:none" data-id=''>
		<span class='title' ></span>
		<p>
		</p>
		<p class='taglist'> </p>
		<button class=' button blue tiny backbtn'>Back</button>
		<button class='button blue tiny messagebtn' >Mesage</button>				
	</div>