<script id="venture-Template" type="text/x-handlebars-template">

<div class='row'>
    <div class='columns'>
    <button class='light-green-button create-venture-button' style='margin-top:30px;margin-left:12px'>Create Venture</button>
    </div>
</div>
    <div class='create-venture-div large-4 columns small-12 medium-6'>

    </div>
	{{#each ventures}}

    <div class='large-4 columns small-12 medium-6'  style='padding-left:12px;padding-right:12px;padding-bottom:24px;'>

    <div class='venturebox' data-venture-id={{venture_id}}>
     
    <div class='venturedetails'>
        <div class='row title' style='text-align:center'>
    	{{venture_name}}
        </div>
    	<div class='row card-description'>
            {{venture_description}}
        </div>
        <div class='row positiontitle' style='text-align:center'>
            Positions Needed
        </div>
    	{{#each positions}}
            <div class='row position-title'>
        		<a href="#" class='position-link' data-position-id={{position_id}}>{{position_name}} > </a>
            </div>
            <div class='row'>
        		<ul class='taglist' style='margin-bottom:2px'>
        		{{#each tags}}
        			<li>#{{tag_name}}</li>
        		{{/each}}
        		</ul>
            </div>
        {{/each}}
        
    {{#if creator}}
        <div class='small-12 columns editdiv'>
            <a href="#" class='venture-edit-button'>
                <img src="<%URL::asset('img/fliyr_editIcon.png')%>" style='width:14px;height:auto'/>
            </a>
        </div>
        {{/if}}
            
    </div>	
    
    {{#each positions}}
    		    {{> position}}
    	{{/each}}
    </div>

    </div>

    {{/each}}
    <div class='column' />
</script>

<script id="create-venture-template" type="text/x-handlebars-template">
    
   <div class='columns  small-12  venturebox ' data-equalizer-watch>
    <div class='addventurebox' >
        <form id='ventureform' data-venture-id='{{venture_id}}'>
            <span class='title' >
                <input type='text' name='venture' placeholder='VentureName' value='{{venture_name}}' maxlength="30"/>
            </span>
            <p>
                <textarea rows="4" cols="35" name="description" placeholder="Enter a description" maxlength="160">{{venture_description}}</textarea>
            </p>

            <div class='positionlist'>
                {{#each positions}}
                <div class='position-edit-item'>
                    <div class='row position-title'>
                        <span href="#" class='position-edit-button'>{{position_name}} > </span>
                    </div>
                    <a href="#" data-id='{{@index}}' class="position-cancel-btn"><img src="../img/fliyr_Icon_Cancel.png" style="width:12px;height:auto"/></a>
                    <ul class='taglist'>{{#each tag}}
                                <li>#{{tag_name}}</li>
                        {{/each}}
                    </ul>
                </div>
                {{/each}}
            </div>
            <p class='addposition'>
                <a href="#">Create Position (3 Remaining)</a>
            </p>
        </form>
    </div>

    <div class='addpositionbox' style="display:none">
        <form id='positionform'>
            <span class='title' >
                <input type='text' name='position' placeholder='Position Name' maxlength="30"/>
            </span>
            <p>
                <textarea rows="4" cols="35" name='description' placeholder="Who are you looking for? (max 400 characters)" maxlength="400"></textarea>
            </p>
            <p> 
                <input type='text' placeholder='#' name='taginput' class='taginput'/>
            </p>
        </form>
    </div>
    
<div class='small-12 columns submitdiv'>
        <a href="#" class='finishbtn'>
            <img src="../img/fliyr_Icon_Check.png" style="width:16px;height:auto"/>
        </a>
        <a href="#" class='cancelbtn'>
            <img src="../img/fliyr_Icon_Cancel.png" style="width:16px;height:auto"/>
        </a>
</div>
</div>

</script>

<script id="send-message-template" type="text/x-handlebars-template">
<div class='row'>
<div class='row' style='margin-top:-17px;'>
<span>To: {{user_name}}</span>
</div>
<div class='row' style='margin-top:6px;'>
<span>{{venture_name}} - {{position_name}}</span>
</div>

<input type='hidden' name='position-id' value={{position_id}} />
<input type='hidden' name='receiver-id' value={{user_id}} />
<div class='row' style='margin-top:6px;'>
<textarea name='message' rows=4></textarea>
</div>
<div class='row' style='margin-top:6px;'>
<button class='right submit-message light-green-button' style='margin-bottom:0px' >Send</button>
</div>
<a class='close-reveal-modal'><img src="../img/fliyr_Icon_Cancel.png" style="width:19px;height:auto;margin-top:3px;margin-right:-6px"/></a>
</div>
</script>

<script id="position-partial" type="text/x-handlebars-template">
  <div class="position row flip" data-position-id={{position_id}} style='display:none;height:100%'>
    
            <div class='row'  style='text-align:center'>
               <a href="#" class='position-back-btn'><  {{position_name}}</a>
            </div>
            <div class='row' style='font-size:12px;font-style:italic;color:#7d7d7d'>
    		{{position_description}}
    		</div>
            <div class='row'>
                <ul class='taglist2'>
                {{#each tags}}
                    <li>#{{tag_name}}</li>
                {{/each}}
                </ul>
            </div>
    	<div class='row position-message-div'>
    	{{#if creator}}
        <div class='small-12 columns editdiv'>
            <a href="#" class='venture-edit-button'>
                <img src="<%URL::asset('img/fliyr_editIcon.png')%>" style='width:14px;height:auto'/>
            </a>
        </div>
    	{{else}}
    		<button class='light-green-button position-message-btn'>Message</button>
    	{{/if}}
        </div>
  </div>
</script>