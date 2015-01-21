
<script id="expertise-template" type="text/x-handlebars-template">
<div class='row' style='margin-top:20px'>
          {{#each expertise}}
        <div class='columns large-4 medium-6  small-12 expertisetitle' data-user-id='{{user_id}}' style='padding-left:12px;padding-right:12px;padding-bottom:24px;'>
            <div class='venturebox expertisebox'>
                <div class='row title'>{{user_name}}</div>
                <div class='row card-description'>
                    {{description}}
                </div>
                <div class='row positiontitle' style='text-align:center'>
                    Expertise
                </div>
                <ul class='taglist'>
                    {{#each tags}}
                        <li>#{{tag_name}}</li>
                    {{/each}}
                </ul>
                <button class='light-green-button expert-message-btn'>Message</button>
            </div>

        </div>
    {{/each}}
    <div class='column' />
</div>

</script>

<script id="my-expertise-template" type="text/x-handlebars-template">
    <div class='row notenteredtext' style="display:none"> 
    Hi, please update your own experience before you can see the rest of the site
    </div>
    <div class='row'>
            <div class='columns large-4 medium-6  small-12  venturebox' data-equalizer-watch>
            <form id='experienceform' user-id={{user_id}}>
                <div class='title' >{{user_name}}</div>
                <p>
                    <textarea rows="4" cols="35" name='description' placeholder="Please describe yourself"></textarea>
                </p>
                <span>Expertise</span>
                <p> 
                    <input type='text' placeholder='#' class='taginput' name='taginput' cols="35" rows="3" /> 
                </p>
            <div class='submitdiv row'>
                    <a href="#" class='expertise-button-submit'>
                        <img src="../img/fliyr_Icon_Check.png" style="width:16px;height:auto"/>
                    </a>
            </div>
            </form>
        </div>
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