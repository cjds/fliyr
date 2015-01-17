

<html>
    <head>
        <title>Handlebars Demo</title>
       </Head>
    <body>
    <div id='venture'>
    </div>
    <div id='message'>
    </div>
    </body>
</html>
<script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
var ventures=null;
 $(document).ready(function() { 
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
        $('#venture').html(HTML);
	}			
 	
 });

 $('#venture').on('click','.position-link',function(){
 		$(".position[data-position-id="+$(this).attr('data-position-id')+"]").show();
 		$(this).parent().hide();
 });


$('#venture').on('click','.position-message-btn',function(e){
		console.log("SD");
 		var position_id=$(this).parent().attr('data-position-id');
 		 $.ajax({
			url: 'ajax/get-position-data',
			type: "GET",
			data: { 
				position_id:position_id
			},
			success: function(result, textStatus) {
				data=JSON.parse(result);

				position=data;
				var Source = $("#message-template").html();
		        var Template = Handlebars.compile(Source);
		        var HTML = Template(position);
		        console.log(HTML);
		        $('#message').html(HTML);
			}	
		 });
 });

 $('#venture').on('click','.position-back-btn',function(){
 		$(".position[data-position-id="+$(this).attr('data-position-id')+"]").show();
 		$(this).parent().hide();
 });


 $('#message').on('click','.submit-message',function(){
 		var position_id=$(this).parent().attr('data-position-id');
 		 $.ajax({
			url: 'ajax/post-position-message',
			type: "POST",
			data: { 
				position_id:$(this).parent().find('input[name=position-id]').val(),
				message : $(this).parent().find('textarea[name=message]').val(),
				receiver_id:$(this).parent().find('input[name=receiver-id]').val()
			},
			success: function(result, textStatus) {
				data=JSON.parse(result);

				position=data;
				var Source = $("#message-template").html();
		        var Template = Handlebars.compile(Source);
		        var HTML = Template({ position : position });
		        console.log(HTML);
		        $('#message').html(HTML);
			}	
		 });
 });

});
</script>

<script id="venture-Template" type="text/x-handlebars-template">
	{{#each ventures}}
    <div class='large-3 small-12' data-venture-id={{venture_id}}>
    	NAME:{{venture_name}}<br />
    	DESC: {{venture_description}}<br />
    	    	<h2>Positions</h2>
    	{{#each positions}}
    		<a href="#" class='position-link' data-position-id={{position_id}}>{{position_name}}</a>
    		<ul style='display:inline-block'>
    		{{#each tags}}
    			<li>{{tag_name}}</li>
    		{{/each}}
    		</ul>
    	{{/each}}
    	
    </div>
    {{#each positions}}
    		    {{> position}}
    	{{/each}}
    {{/each}}
</script>


<script id="message-template" type="text/x-handlebars-template">
<div class='large-3 columns'>
<span>{{user_name}}</span>
<hr>
<span>{{venture_name}} - {{position_name}}</span><br>

<input type='hidden' name='position-id' value={{position_id}} /><br>
<input type='hidden' name='receiver-id' value={{user_id}} /><br>
<textarea name='message'></textarea><br>
<button class='submit-message' >Submit</button>
</div>
</script>

<script id="position-partial" type="text/x-handlebars-template">
  <div class="position" data-position-id={{position_id}} style='display:none'>
    <h2>{{position_name}}</h2>
    		{{position_name}}<br/>
    		{{position_description}}
    		<ul>
    		{{#each tags}}
    			<li>{{tag_name}}</li>
    		{{/each}}
    		</ul>
    	<a href="#" class='position-back-btn'>Back</a>
    	<a href="#" class='position-message-btn'>Message</a>
  </div>
</script>