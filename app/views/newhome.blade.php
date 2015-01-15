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
			<a href="#">Create Venture</a>
			<span>+</span>
		</div>
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
			$('.message').show();
		});		

		$('.message .closebtn').click(function(e){
			$(this).parent().parent().hide();
			$(this).parent().parent().find('textarea').val('');
		});


	})
	$(document).foundation();

	</script>
@stop

<style type="text/css">
	div.message{
		z-index:100;
		position:absolute;
		bottom:0;
		right:0;
		border: 1px solid #888;
		display: none;
	}
	button.sendbtn{
		padding: 3px;
		margin: 3px;
	}
	span.closebtn{

	}
	span.closebtn:hover{
		cursor: pointer;
	}
</style>

    <div class='message' style="">
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