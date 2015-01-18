
<script id="inbox-template" type="text/x-handlebars-template">
	<h1>Inbox</h1>
	{{#each thread}}

    <div class='large-6 small-12' data-sender-id={{sender_id}} data-receiver-id={{receiver_id}} data-message-id={{message_id}} >
	    <div class='row'>
	    <b>{{subject}}</b>
	    </div>
	    <div class='row'>
    		{{user_name}}
    	</div>
    	<a href="#" class='messagethread'>Thread </a>

    </div>

    <hr>
    	
    {{/each}}
</script>


<script id="thread-template" type="text/x-handlebars-template">
	<h1>Inbox</h1>
	{{#each thread}}
	<div class='row'>
    {{user_name}}
    </div>
    <div class='large-6 small-12' data-sender-id={{sender_id}} data-receiver-id={{receiver_id}} >
    <div class='row'>
    	<i>{{message}}</i>-{{formatDate created_at "short"}} 
    </div>
    
    <hr>
    {{/each}}
    {{#data}}
    
    <div class='row' >
        <form id='replyform' data-receiver-id={{receiver_id}} data-message-type={{message_type}} data-table-id={{table_id}} data-reference-id={{reference_message_id}}>
            <textarea name='replytext'></textarea>
            <button class='replybutton'>Reply</button>
        </form>
    </div>
    {{/data}}
    
</script>