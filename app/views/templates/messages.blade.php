
<script id="inbox-template" type="text/x-handlebars-template">
	<h1>Inbox</h1>

    <div class='large-9 small-12' >
    <table role="grid" class='messagetable large-12'>
    {{#each thread}}
     
        <tr data-sender-id={{sender_id}} data-receiver-id={{receiver_id}} data-message-id={{message_id}}  class='messagethread'>
        <td class='large-2 columns hide-for-small' >{{user_name}}</td>
        <td class='large-9 columns hide-for-small'>{{message}}</td>
        <td class='large-1 columns hide-for-small'>{{formatDate created_at "short"}} </a></td>
        <td class='large-12 columns show-for-small'>
        <span>{{user_name}}</span><span class='right'>{{user_name}}</span>

        </td>
        </tr>
    {{/each}}
    </table>
    </div>

    <hr>
</script>


<script id="thread-template" type="text/x-handlebars-template">

    <div class='row'>
        <a href="inbox" class='button light-green-button return-to-inbox' style='margin-top:30px;margin-left:13px;'>Return To Inbox</a>
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
    <td class='large-2 columns datetext  hide-for-small' style='text-align:center'>{{formatDate created_at "short"}} 1973</td>
    <td class='large-2 columns nametext hide-for-small' style='text-align:left;'>{{user_name}}</td>
    <td class='large-8 columns messagetext hide-for-small'>{{message}}</td>
    <td class='columns show-for-small-only' style='color:#7d7d7d'>
        <span style='font-weight:500'>{{user_name}}</span><span style='font-size:12px;font-weight:300' class='right'>{{formatDate created_at "short"}} 1973</span><br />
        <p style='font-size:12px;font-weight:300'>{{message}}</p>

        </td>

    </tr>
    </div>
        {{/each}}
    
    {{#data}}
    
    <tr >
        <td colspan=3>
        <form id='replyform' class='small-12  medium-12 medium-offset-0' style='padding-left:20px;' data-receiver-id={{receiver}} data-message-type={{message_type}} data-table-id={{table_id}} data-reference-id={{reference_message_id}}>
            <textarea rows='4' name='replytext'></textarea>
            <button class='replybutton light-green-button right'>Reply</button>
        </form>
        <td>
    </tr>
    </table>
    {{/data}}
    
</script>