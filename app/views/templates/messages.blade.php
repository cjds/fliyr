
<script id="inbox-template" type="text/x-handlebars-template">
	<h1>Inbox</h1>

    <div class='large-9 small-12' >
    <table role="grid" class='messagetable large-12'>
    {{#each thread}}
     
        <tr data-sender-id={{sender_id}} data-receiver-id={{receiver_id}} data-message-id={{message_id}}  class='messagethread'>
        <td class='large-2 columns'>{{user_name}}</td>
        <td class='large-9 columns'>{{#if count}}<b>{{/if}}{{subject}}{{#if count}}</b>{{/if}} - <a href="#">{{message}}</a></td>
        <td class='large-1 columns'>{{formatDate created_at "short"}} </a></td>
        </tr>
    {{/each}}
    </table>
    </div>

    <hr>
</script>


<script id="thread-template" type="text/x-handlebars-template">
	<h2>Message</h2>
	{{#each thread}}
	<div class='row'>
    {{user_name}}
    </div>
    <div class='large-6 small-12' data-sender-id={{sender_id}} data-receiver-id={{receiver_id}} >
    <div class='row'>
    	<i>{{message}}</i>-{{formatDate created_at "short"}} 
    </div>
    </div>
    <hr>
    {{/each}}
    {{#data}}
    
    <div class='row' >
        <form id='replyform' data-receiver-id={{receiver}} data-message-type={{message_type}} data-table-id={{table_id}} data-reference-id={{reference_message_id}}>
            <textarea name='replytext'></textarea>
            <button class='replybutton'>Reply</button>
        </form>
    </div>
    {{/data}}
    
</script>