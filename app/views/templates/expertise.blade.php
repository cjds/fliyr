
<script id="expertise-template" type="text/x-handlebars-template">
<div class='row' data-equalizer>
          {{#each expertise}}
        <div class='columns large-3 medium-5  small-12  venturebox' data-equalizer-watch>
                    <span class='title' >{{user_name}}</span>
                    <a href='#'><img src="<% URL::asset('img/email.svg')%>" style='width:20px;height:auto;margin-right:10px' class='right'/></a>
            <p>
                {{description}}
            </p>
            <span>Expertise</span>
            <p>
            {{#each tags}}
                            <a href="#">{{tag_name}}</a>
            {{/each}}
            </p>
            
        </div>
        {{/each}}
    </div>
</script>


<script id="my-expertise-template" type="text/x-handlebars-template">
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
        <form id='replyform' data-receiver-id={{receiver}} data-message-type={{message_type}} data-table-id={{table_id}} data-reference-id={{reference_message_id}}>
            <textarea name='replytext'></textarea>
            <button class='replybutton'>Reply</button>
        </form>
    </div>
    {{/data}}
    
</script>