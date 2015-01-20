
<script id="expertise-template" type="text/x-handlebars-template">
<div class='row' style='margin-top:20px'>
          {{#each expertise}}
        <div class='columns large-4 medium-5  small-12 expertisetitle' data-user-id='{{user_id}}' >
            <div class='venturebox'>
                <div class='row title'>{{user_name}}</div>
                <div class='row'>
                    {{description}}
                </div>
                <div class='row positiontitle'>
                    Expertise
                </div>
                <div class='row'>
                    {{#each tags}}
                        <a href="#">{{tag_name}}</a>
                    {{/each}}
                </div>
                <button class='expert-message-btn'>Message</button>
            </div>

        </div>
    {{/each}}
    <div class='column' />
</div>

</script>


<script id="send-expertise-message-template" type="text/x-handlebars-template">
<div class='row' data-user-id={{user_id}}>
<span>{{user_name}}</span>
<hr>
<div class='row'>
<input type='text' name='subject' placeholder='Subject'/>
</div>
<input type='hidden' name='user-id' value={{user_id}} />
<textarea name='message' placeholder='Message'></textarea><br>
<button class='submit-expertise-message'>Submit</button>
</div>
<a class='close-reveal-modal'>&#215;</a>
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