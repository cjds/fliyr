@extends('layouts.master')


@section('content')
<div id ='content'>
</div>
<div id ='dialog' class='reveal-modal'>
</div>
<script type="text/javascript">

 $(document).ready(function() { 
	routingUpdate();

	function routingFunction(){
		var currentURL=window.location.href;
		var routingArray=currentURL.split('/');
		var routingString=routingArray[routingArray.length-1];
		while(routingString[routingString.length-1]=='#')
			routingString=routingString.substring(0,routingString.length,-1)
		return routingString;
	}

	function routingUpdate(){
		currentURL=routingFunction();
		if(currentURL=='ventures'){
			$.ajax({
				url: 'ajax/get-ventures',
				type: "GET",
				data: { 
				},
				success: function(result, textStatus) {
					data=JSON.parse(result);
					ventures=data;
					var Source = $("#venture-Template").html();
					Handlebars.registerPartial("position", $("#position-partial").html());
			        var Template = Handlebars.compile(Source);
			        var HTML = Template({ ventures : ventures });
			        $('#content').html(HTML);
				}			
			 	
			 });

		}
		else if(currentURL=='expertise'){

		}
	}

});
</script>

@stop

@include('templates.ventures ')