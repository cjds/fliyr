
<script id="inbox-template" type="text/x-handlebars-template">
    <div class='row inboxdiv'>
    <div clas='row inboxtext'>
	<h1>My Inbox</h1>
    </div>
    <div class='row'>
    <div class='large-9 small-12 columns' >
    <table role="grid" class='messagetable large-12'>
    {{#each thread}}
     
        <tr data-sender-id={{sender_id}} data-receiver-id={{receiver_id}} data-message-id={{message_id}}  class='messagethread'>
        <td class='large-2 columns hide-for-small datetext'>{{formatDate created_at "short"}} </a></td>        
        <td class='large-1 columns hide-for-small usertext' >{{user_name}}</td>
        <td class='large-9 columns hide-for-small titletext' ><span class='subjecttext'>{{subject}}</span><span class='messagetext'>-{{message}}</span></td>
        <td class='small-12 columns show-for-small-only'>
        <span>{{user_name}}</span><span class='right'>{{user_name}}</span>
        <p>{{message}}</p>
        </td>
        </tr>
    {{/each}}

    </table>
    </div>
    </div>
    </div>
</script>


<script id="thread-template" type="text/x-handlebars-template">

    <div class='row' style='margin-bottom:20px'>
        <a href="inbox" class='button light-green-button return-to-inbox' >Return To Inbox</a>
    </div>
    {{#data}}
    <div class='row messagetitle' style='margin-left:13px;'>
        <h2>{{message}}</h2>
    </div>
    {{/data}}
    <div class='row'>
    <table role="grid" class="threadtable large-11 ">
	{{#each thread}}
	<tr>
    <td class='large-2 columns datetext  hide-for-small' style='text-align:center'>{{formatDate created_at "short"}}</td>
    <td class='large-1 columns nametext hide-for-small' style='text-align:left;'>{{user_name}}</td>
    <td class='large-9 columns messagetext hide-for-small'>{{message}}</td>
    <td class='columns show-for-small-only' style='color:#7d7d7d'>
        <span style='font-weight:500'>{{user_name}}</span><span style='font-size:12px;font-weight:300' class='right'>{{formatDate created_at "short"}} </span><br />
        <p style='font-size:12px;font-weight:300'>{{message}}</p>

        </td>

    </tr>
    </div>
        {{/each}}
    
    {{#data}}
    
    <tr style='background:#fff'>
        <td class='hide-for-small'></td>
        <td class='hide-for-small'></td>
        <td>
        <div class='row'>
        <form id='replyform' class='small-12 medium-12 medium-offset-0' data-receiver-id={{receiver}} data-message-type={{message_type}} data-table-id={{table_id}} data-reference-id={{reference_message_id}}>
            <textarea rows='4' name='replytext'></textarea>
            <button class='replybutton light-green-button right'>Reply</button>
        </div>
        </form>
        <td>
    </tr>
    </table>
    {{/data}}
    
</script>