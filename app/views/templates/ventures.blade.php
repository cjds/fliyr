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
     {{#if creator}}
        <div class='row'>
            <a href="#" class='venture-edit-button'>
                <img src="<%URL::asset('img/fliyr_editIcon.png')%>" style='width:14px;height:auto'/>
            </a>
        </div>
        {{/if}}
    
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
        		<ul class='taglist'>
        		{{#each tags}}
        			<li>#{{tag_name}}</li>
        		{{/each}}
        		</ul>
            </div>
        {{/each}}

        
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
        <form id='ventureform'>
            <span class='title' >
                <input type='text' name='venture' placeholder='VentureName'/>
            </span>
            <p>
                <textarea rows="4" cols="35" name="description" placeholder="Enter a description"></textarea>
            </p>
            <div class='positionlist'>
            </div>
            <p class='addposition'>
                <a href="#">Create Position (3 Remaining)</a>
            </p>
        </form>
    </div>

    <div class='addpositionbox' style="display:none">
        <form id='positionform'>
            <span class='title' >
                <input type='text' name='position' placeholder='PositionName'/>
            </span>
            <p>
                <textarea rows="4" cols="35" name='description' placeholder="Enter a description"></textarea>
            </p>
            <p> 
                <input type='text' placeholder='#' name='taginput' class='taginput'/>
            </p>
        </form>
    </div>
    
<div class='small-12 columns submitdiv'>
        <input class='right  tiny button finishbtn light-green-button' value='Post Fliyr' type='submit' />
</div>
</div>

</script>

<script id="send-message-template" type="text/x-handlebars-template">
<div class='large-3 columns'>
<span>{{user_name}}</span>
<hr>
<span>{{venture_name}} - {{position_name}}</span><br>

<input type='hidden' name='position-id' value={{position_id}} /><br>
<input type='hidden' name='receiver-id' value={{user_id}} /><br>
<textarea name='message'></textarea><br>
<button class='submit-message' >Submit</button>
</div>
<a class='close-reveal-modal'>&#215;</a>
</script>

<script id="position-partial" type="text/x-handlebars-template">
  <div class="position row flip" data-position-id={{position_id}} style='display:none'>
    
            <div class='row'  style='text-align:center'>
               <a href="#" class='position-back-btn'><  {{position_name}}</a>
            </div>
            <div class='row'>
    		{{position_description}}
    		</div>
            <div class='row'>
                <ul class='taglist'>
                {{#each tags}}
                    <li>{{tag_name}}</li>
                {{/each}}
                </ul>
            </div>
    	<div class='row'>
    	<button class='position-message-btn'>Message</button>
        </div>
  </div>
</script>