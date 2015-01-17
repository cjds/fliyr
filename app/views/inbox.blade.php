
<html>
    <head>
        <title>Handlebars Demo</title>
       </Head>
    <body>
    <div id='inbox'>
    </div>
    </body>
</html>
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type='text/javascript' src="<%URL::asset('js/handlebars.js')%>" ></script>
	<%HTML::script('/js/foundation.min.js') %>

<script>
var ventures=null;
 $(document).ready(function() { 
		 $.ajax({
			url: 'ajax/get-inbox',
			type: "GET",
			data: { 

			},
			success: function(result, textStatus) {
				data=JSON.parse(result);
				console.log(data);
				var Source = $("#inbox-template").html();
		        var Template = Handlebars.compile(Source);
		        

		        var HTML = Template({ thread : data });
		        $('#inbox').html(HTML);
			}
		});


});
</script>

<script id="inbox-template" type="text/x-handlebars-template">
	<h1>Inbox</h1>
	{{#each thread}}
	Thread:
    <div class='large-3 small-12' data-sender-id={{sender_id}} data-sender-id={{receiver_id}} >
    {{subject}} : {{message}}
    </div>
    	
    {{/each}}
</script>


