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
		margin-left:4.15% !important;
	}

	.large-3-5{
		width:29.1667% !important;
	}
</style>

@section('content')
    <div class='row' data-equalizer>
        	@foreach ($experience as $expert)

    	<div class='columns large-3-5 large-offset-half medium-5  small-12  panel venturebox' data-equalizer-watch>
					<span class='title' ><%expert['</span>
					<a href='#'><img src="<% URL::asset('img/email.svg')%>" style='width:20px;height:auto;margin-right:10px' class='right'/></a>
			<p>
				<%$expert['description']%>
			</p>
			<span>Expertise</span>
			<p>
			@foreach ($expert['tags'] as $tag)
							<a href="#">#<%$tag['tag_name']%></a>
			@endforeach
			</p>
			
    	</div>
    	@ENDFOREACH
    </div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.user-menu').hover(function(){
			$('.user-menu-items').toggle();
		});

	})
	$(document).foundation();

	</script>
@stop

