
<script id="expertise-template" type="text/x-handlebars-template">
<div class='row' style='margin-top:20px'>
          {{#each expertise}}
        <div class='columns large-4 medium-5  small-12 expertisetitle' >
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
            </div>
        </div>
    {{/each}}
    <div class='column' />
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