
<script id="expertise-template" type="text/x-handlebars-template">
<div class='row' style="min-height:72px">
    <div class='columns'>
    
    </div>
</div>

          {{#each expertise}}
        <div class='columns large-4 medium-6  small-12 expertisetitle' data-user-id='{{user_id}}' style='padding-left:12px;padding-right:12px;padding-bottom:24px;min-height:300px'>
            <div class='venturebox expertisebox' style="100%">
                <div class='row title'>{{user_name}}</div>
                <div class='row card-description'>
                    {{description}}
                </div>
                <div class='row positiontitle' style='text-align:center'>
                    Expertise
                </div>
                <ul class='taglist2'>
                    {{#each tags}}
                        <li>#{{tag_name}}</li>
                    {{/each}}
                </ul>
                 {{#if creator}}
		        <div class='small-12 columns editdiv'>
		            <a href="myexpertise" class='edit-button'>
		                <img src="<%URL::asset('img/fliyr_editIcon.png')%>" style='width:14px;height:auto'/>

		            </a>
		        </div>
		        {{else}}
		            <button class='light-green-button expert-message-btn' style='position:absolute; right:30px;bottom:20px;;'>Message</button>
		        {{/if}}

            </div>


        </div>
    {{/each}}
    <div class='column' />

</script>

<script id="my-expertise-template" type="text/x-handlebars-template">
    <div class='row notenteredtext' style="display:none;margin-bottom:20px"> 
    Hi. Welcome to Fliyr. This expertise card is your profile on this site and it's how other people will find you. Please fill it out
    </div>
    <div class='row'>
            <div class='columns large-4 medium-6  small-12  venturebox' data-equalizer-watch>
            <form id='experienceform' user-id={{user_id}}>
                <div class='title' >{{user_name}}</div>
                <p>
                    <textarea rows="4" cols="35" name='description' placeholder="Please tell the Fliyr community about yourself &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (max 400 characters)" maxLength=400></textarea>
                </p>
                <div class='row positiontitle'>
                Expertise
                </div>
                <p style='margin-top:5px'> 
                    <input type='text' placeholder='#' class='taginput' name='taginput' cols="35" rows="3" /> 
                </p>
            <div class='submitdiv row'>
                    <a href="#" class='expertise-button-submit'>
                        <img src="../img/fliyr_Icon_Check.png" style="width:16px;height:auto"/>
                    </a>
            </div>
            </form>
        </div>
        <div class='columns large-4 medium-6  small-12 expertisetitle' style='padding-left:12px;padding-right:12px;padding-bottom:24px;min-height:300px'>
            <div class='venturebox expertisebox' style="100%">
                <div class='row title'>George</div>
                <div class='row card-description'>
                    Hi I&rsquo;m George Burdell, a junior in the Computer Science Dept. I'm good at programming, specialize in websites and am very interested in startups
                </div>
                <div class='row positiontitle' style='text-align:center'>
                    Expertise
                </div>
                <ul class='taglist2'>
                        <li>#programming</li>
                        <li>#websitedesign</li>
                        <li>#html5</li>
                        <li>#frontendprogramming</li>
                        <li>#inventor</li>
                        <li>#buzzing</li>
                </ul>
                    <button class='light-green-button' style='position:absolute; right:30px;bottom:20px;;'>Example</button>
            </div>


        </div>
        <div class='column' />
    </div>

</script>


<script id="send-expertise-message-template" type="text/x-handlebars-template">
{{#if messagable}}
<div class='row' data-user-id={{user_id}} >
<div class='row' style='margin-top:-16px;'>
<span class='usertext'>To: {{user_name}}</span>
</div>
<div class='row'  style='margin-top:6px;'>
<input type='text' name='subject' placeholder='Subject'/>
</div>

<input type='hidden' name='user-id' value={{user_id}} />
<div class='row'>
<textarea name='message' rows=4 placeholder='Message'></textarea>
</div>
<div class='row'>
<button class='submit-expertise-message light-green-button right' style='margin-bottom:0px'>Send</button>
</div>
{{else}}
<div class='row'>
 You cannot message until you have created a venture
</div>

{{/if}}
<a class='close-reveal-modal' ><img src="../img/fliyr_Icon_Cancel.png" style="width:19px;height:auto;margin-top:3px;margin-right:-6px"/></a>

</script>

<style>
span.tooltip{
	background:#000;
	z-index:99;

}
</style>