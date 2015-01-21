//**************************************************************LIBRAR
//**************************************************************LIBRA

	var DateFormats = {
       short: "DD MMMM - YYYY",
       long: "dddd DD.MM.YYYY HH:mm"	
	};

	var created_venture=false;

	function menuHandler(e){
   		if($(this).html()=='My Ventures'){
    		e.preventDefault();
    		window.history.pushState("", "My Ventures", "myventures");
    		routingUpdate();
   		}
   		else if($(this).html()=='Message Inbox'){
   			e.preventDefault();
    		window.history.pushState("", "My Inbox", "inbox");
    		routingUpdate();	
   		}
   		else if($(this).html()=='Ventures'){
   			e.preventDefault();
    		window.history.pushState("", "Ventures", "ventures");
    		routingUpdate();	
   		}
   		else if($(this).html()=='Expertise'){
   			e.preventDefault();
    		window.history.pushState("", "Expertise", "expertise");
    		routingUpdate();	
   		}

   		else if($(this).html()=='My Expertise'){
   			e.preventDefault();
    		window.history.pushState("", "My Expertise", "myexpertise");
    		routingUpdate();	
   		}
    }

	function routingFunction(){
		var currentURL=window.location.href;
		var routingArray=currentURL.split('/');
		var routingString=routingArray[routingArray.length-1];
		while(routingString[routingString.length-1]=='#')
			routingString=routingString.substring(0,routingString.length,-1)
		return routingString;
	}

	function routingUpdate(){
		currentURL=routingFunction();
		if(currentURL=='ventures'){
			$.ajax({
				url: 'ajax/get-ventures',
				type: "GET",
				data: { 
				},
				success: function(result, textStatus) {
					data=JSON.parse(result);
					ventures=data;
					var Source = $("#venture-Template").html();
					Handlebars.registerPartial("position", $("#position-partial").html());
			        var Template = Handlebars.compile(Source);
			        var HTML = Template({ ventures : ventures });
			        $('#content').html(HTML);
			        $('.expertiselink').addClass('grey-sidebar');
			        $('.expertiselink').removeClass('green-sidebar');
			        $('.venturelink').removeClass('grey-sidebar');
			        $('.venturelink').addClass('green-sidebar');
					$('.venturebox').height($('.venturebox').width());
				}			
			 	
			 });

		}
		else if(currentURL=='expertise'){
			$.ajax({
				url: 'ajax/get-expertise',
				type: "GET",
				data: { 
				},
				success: function(result, textStatus) {
					data=JSON.parse(result);
					var Source = $("#expertise-template").html();
			        var Template = Handlebars.compile(Source);
			        var HTML = Template({ expertise : data });
			        $('#content').html(HTML);
			        $('.expertiselink').addClass('green-sidebar');
			        $('.expertiselink').removeClass('grey-sidebar');
			        $('.venturelink').removeClass('green-sidebar');
			        $('.venturelink').addClass('grey-sidebar');
			        $('.venturebox').height($('.venturebox').outerWidth());
				}
			 });

		}
		else if(currentURL=='myventures'){
			$.ajax({
				url: 'ajax/get-my-ventures',
				type: "GET",
				data: { 
				},
				success: function(result, textStatus) {
					data=JSON.parse(result);
					ventures=data;
					var Source = $("#venture-Template").html();
					Handlebars.registerPartial("position", $("#position-partial").html());
			        var Template = Handlebars.compile(Source);
			        var HTML = Template({ ventures : ventures });
			        $('#content').html(HTML);
				}
			 });
		}
		else if(currentURL=='inbox'){
			$.ajax({
				url: 'ajax/get-inbox',
				type: "GET",
				data: { 

				},
				success: function(result, textStatus) {
					data=JSON.parse(result);
					console.log(data);
					var Source = $("#inbox-template").html();
			        var Template = Handlebars.compile(Source);
			        Handlebars.registerHelper("formatDate", function(datetime, format) {
					  if (moment) {
					    var f = DateFormats[format];
					    return moment(datetime).format(f);
					  }
					  else {
					    return datetime;
					  }
					});
			        var HTML = Template({ thread : data });
			        $('#content').html(HTML);
				}
			});
		}
		else if(currentURL=='myexpertise'){

				$.ajax({
						url: "ajax/get-my-expertise",
			  			type: "GET",
			  			
		  			})
				 .done(function(msg){
				  			var tags="";
				  			var data=JSON.parse(msg);
				  			console.log(data);
				  			console.log(data.user_name);
							var Source = $("#my-expertise-template").html();
					        var Template = Handlebars.compile(Source);
					        var HTML = Template({user_name:data.user_name,user_id:data.user_id});
					        $('#content').html(HTML);
				  			$('.taginput').tagit();
				  			for(var i=0;i<data.tags.length;i++){
				  				$('.venturebox input[name=taginput]').tagit('createTag', data.tags[i]['tag_name']);
				  			}
				  			$('.venturebox textarea[name=description]').val(data.description);
				  			//$('.venturebox textarea[name=taginput]').val(tags);
		  			})
				 .fail(function(msg){
				 			$('.notenteredtext').show();
				 	});
			
		}
		else if(currentURL.substring(0,6)=="thread"){
			var urlSplit=currentURL.split('#');
			$.ajax({
				url: 'ajax/get-message-thread',
				type: "GET",
				data: { 
					message_id:urlSplit[1],
				},
				success: function(result, textStatus) {
					var data=JSON.parse(result);
					var Source = $("#thread-template").html();
			        var Template = Handlebars.compile(Source);
					Handlebars.registerHelper("formatDate", function(datetime, format) {
					  if (moment) {
					    var f = DateFormats[format];
					    return moment(datetime).format(f);
					  }
					  else {
					    return datetime;
					  }
					});
			        var HTML = Template(data);
			        $('#content').html(HTML);
				}
			});
		}
	}

//**************************************************************TOP BAR
//**************************************************************TOP BAR
//**************************************************************TOP BAR
//**************************************************************TOP BAR
//**************************************************************TOP BAR
//**************************************************************TOP BAR

    $(document).foundation('topbar',{ sticky_class : 'sticky', is_hover: true});
    $('.top-bar ul li a').click(menuHandler);
    $('.left-menu a').click(menuHandler);


//**************************************************************INBOX
//**************************************************************INBOX
//**************************************************************INBOX
//**************************************************************INBOX
//**************************************************************INBOX
$('#content').on('click','.messagethread',function(e){
	e.preventDefault();
	var message_id=$(this).parent().parent().attr('data-message-id');
	window.history.pushState("", "Inbox", "thread#"+message_id);
    routingUpdate();
});
//messagethread

//**************************************************************MESSAGE THREAD
$('#content').on('click','.replybutton',function(e){
	e.preventDefault();
	 $.ajax({
			url: 'ajax/post-reply',
			type: "POST",
			data: { 
				'receiver_id':$(this).parent().attr('data-receiver-id'),
				'message_type':$(this).parent().attr('data-message-type'),
				'message':$(this).parent().find('textarea[name=replytext]').val(),
				'table_id':$(this).parent().attr('data-table-id'),
				'reference_message_id':$(this).parent().attr('data-reference-id')
			},
			success: function(result, textStatus) {

				routingUpdate();
			}	
	});
});


//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE


 $('#content').on('click','.expert-message-btn',function(){
 		var user_id=$(this).parent().parent().attr('data-user-id');
 		 $.ajax({
			url: 'ajax/get-user-data',
			type: "GET",
			data: { 
				user_id:user_id
			},
			success: function(result, textStatus) {
				data=JSON.parse(result);
				console.log(data);
				position=data;
				var Source = $("#send-expertise-message-template").html();
		        var Template = Handlebars.compile(Source);
		        var HTML = Template(position);
		        $('#dialog').html(HTML);
		        $('#dialog').foundation('reveal','open');
			}	
		 });
 });

 $('#dialog').on('click','.submit-expertise-message',function(){
 	console.log('sd');
 		var user_id=$(this).parent().attr('data-user-id');
 		 $.ajax({
			url: 'ajax/post-experience-message',
			type: "POST",
			data: { 
				subject:$(this).parent().find('input[name=subject]').val(),
				message : $(this).parent().find('textarea[name=message]').val(),
				user_id:user_id
			},
			success: function(result, textStatus) {
		        $('#dialog').foundation('reveal','close');
			}	
		 });
 });

$('#content').on('click','.expertise-button-submit', function(e){
  			e.preventDefault();

  			var description=$('.venturebox textarea[name=description]').val();
  			var tags=$('.venturebox input[name=taginput]').val();
	  		$.ajax({
				url: 'ajax/add-experience',
	  			type: "POST",
	  			data: { user_id : $(this).parent().parent().attr('user-id'),user_description:description,experience_tags:tags}
	  		}).done(function(msg){
	  			window.history.pushState("", "My Expertise", "expertise");
    			routingUpdate();
   	
	  		});
  		});


//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES


$(document).ready(function(){
 $('#content').on('click','.position-link',function(e){
 		e.preventDefault();
 		$(".position[data-position-id="+$(this).attr('data-position-id')+"]").show();
 		$(this).parent().parent().parent().toggleClass('flip');
 		$(this).parent().parent().hide(500);
 		
 		
 });


$('#content').on('click','.position-message-btn',function(e){
 		var position_id=$(this).parent().parent().attr('data-position-id');
 		 $.ajax({
			url: 'ajax/get-position-data',
			type: "GET",
			data: { 
				position_id:position_id
			},
			success: function(result, textStatus) {
				data=JSON.parse(result);

				position=data;
				var Source = $("#send-message-template").html();
		        var Template = Handlebars.compile(Source);
		        var HTML = Template(position);
		        $('#dialog').html(HTML);
		        $('#dialog').foundation('reveal','open');
			}	
		 });
 });



 $('#content').on('click','.position-back-btn',function(e){
 		e.preventDefault();
 		$(this).parent().parent().hide();
 		$(this).parent().parent().parent().toggleClass('flip');
 		$(this).parent().parent().parent().find('.venturedetails').show(500);
 });

$('#content').on('click','.create-venture-button',function(){
	if(!created_venture){
		position=data;
		var Source = $("#create-venture-template").html();
        var Template = Handlebars.compile(Source);
        created_venture=true;
        var HTML = Template(position);
        $('#content').find('div').eq(2).prepend(HTML);
        $('.create-venture-button').html('Cancel');
        //$('#dialog').html(HTML);
        //$('#dialog').addClass("small");
        //$('#dialog').foundation('reveal','open');        
		$('.taginput').tagit({
			"preprocessTag":function(val) {
	  			if (!val) { return ''; }
	  			if(val.charAt(0)=='#')
	  				return val;
	  			return '#'+val;

			}
		});
	}
	else{
		$('#content').find('div').eq(2).html('');
		created_venture=false;
		$('.create-venture-button').html('Create Venture');
	}
});


$('#dialog').on('click','.close-reveal-modal',function(){	
	$('#dialog').foundation('reveal','close');
});

 $('#dialog').on('click','.submit-message',function(){
 		var position_id=$(this).parent().attr('data-position-id');
 		 $.ajax({
			url: 'ajax/post-position-message',
			type: "POST",
			data: { 
				position_id:$(this).parent().find('input[name=position-id]').val(),
				message : $(this).parent().find('textarea[name=message]').val(),
				receiver_id:$(this).parent().find('input[name=receiver-id]').val()
			},
			success: function(result, textStatus) {
		        $('#dialog').foundation('reveal','close');
			}	
		 });
 });




/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/
/**ADDING A VENTURE******************************************************************************/



	var positions=[];
	var venturestate=true;
	$('#content').on('click','.addposition a',function(e){
		e.preventDefault();
		$('.addpositionbox').show();
		$('.addventurebox').hide();
		venturestate=false;
	});


	$('#content').on('click','.venture-edit-button',function(e){
		e.preventDefault();
		if(!created_venture){
			
	        $.ajax({
				url: "ajax/get-venture-data",
				type: "GET",
				data: { 
				  	venture_id:$(this).parent().parent().parent().attr('data-venture-id')
				},
				success: function(data, textStatus) {
					venture=JSON.parse(data);
					positions=venture.positions;
					venturestate=true;
					console.log(positions);
					for (var i = 0; i < positions.length; i++) {
						var tagarray='';	
						positions[i].tag=positions[i].tags;
						positions[i].name=positions[i].position_name;
						for (var j = 0; j < positions[i].tags.length; j++) {
							tagarray+=positions[i].tags[j].tag_name+',';
						}
					 	if (tagarray.length > 0) {
     						 tagarray = tagarray.substring(0, tagarray.length-1);
    					}
						positions[i].tags=tagarray;
						positions[i].description=positions[i].position_description;
    				}
					var Source = $("#create-venture-template").html();
			        var Template = Handlebars.compile(Source);
			        created_venture=true;
			        var HTML = Template(venture);
			        $('#content').find('div').eq(2).prepend(HTML);
			        $('.create-venture-button').html('Cancel');
	        		$('.taginput').tagit({
						"preprocessTag":function(val) {
							if (!val) { return ''; }
							if(val.charAt(0)=='#')
								return val;
							return '#'+val;

						}
					});
			        if((3-positions.length)>0)
						$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )')
					else
						$('.addposition a').html('');
				}				  
			});
	        
	        $('.taginput').tagit({
				"preprocessTag":function(val) {
		  			if (!val) { return ''; }
		  			if(val.charAt(0)=='#')
		  				return val;
		  			return '#'+val;

				}
			});
		}
		else{
			$('#content').find('div').eq(2).html('');
			created_venture=false;
			position={};
			$('.create-venture-button').html('Create Venture');

		}
	});

	$('#content').on('click','#ventureform .position-cancel-btn',function(e){
		e.preventDefault();
	    positions.splice($(this).attr('data-id'), 1);
	    $('.positionlist').html('');
	    for (var i = 0; i < positions.length; i++) {
	    	var tagarray=positions[i].tags.split(',');
			var taglist='';
			for (index = 0; index < tagarray.length; ++index) {
 			   taglist+="<li>"+tagarray[index]+"</li>";
			}
	    	$('.positionlist').append('<div class="position-edit-item"><div class="row position-title"><a href="#" class="position-edit-button">'+positions[i].name+'</a></div> <a href="#" data-id='+i+' class="position-cancel-btn"><img src="../img/fliyr_Icon_Cancel.png" style="width:12px;height:auto"/></a><ul class="taglist">'+taglist+'</ul></div<');
	    }
		$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )');
	});

	$('#content').on('click','.finishbtn',function(e){
		e.preventDefault();
		if(venturestate){
			$.ajax({
				url: "ajax/add-venture",
				type: "POST",
				data: { 
				  	user_id:5, // to be changed later
				  	name: $('#ventureform input[name=venture]').val(),
					tags:[],
					description:$('#ventureform textarea[name=description]').val(),
					venture_id:$('#ventureform').attr('data-venture-id'),
					positions:positions
				},
				success: function(data, textStatus) {
					if(data=='ok'){
							routingUpdate();
						}
					}				  
				});
		}
		else{
			$('.addpositionbox').hide();
			$('.addventurebox').show();		    
			var position = {
			    name:$('#positionform input[name=position]').val(),
			    description:$('#positionform textarea[name=description]').val(),
			    tags:$('#positionform input[name=taginput]').val() 
			};
			var tagarray=position.tags.split(',');
			var taglist='';
			for (index = 0; index < tagarray.length; ++index) {
 			   taglist+="<li>"+tagarray[index]+"</li>";
						}
			$('.positionlist').append('<div class="position-edit-item"><div class="row position-title"><a href="#" class="position-edit-button">'+position.name+'</a></div><a href="#" data-id='+positions.length+' class="position-cancel-btn"><img src="../img/fliyr_Icon_Cancel.png" style="width:12px;height:auto"/></a>  <ul class="taglist">'+taglist+'</ul></div>');
			positions.push(position);
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');			
			$('#positionform input[name=taginput]').tagit('removeAll');
			if(3-positions.length>0){
				$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )');
			}
			else{
				$('.addposition a').html('');	
			}
		}
		venturestate=true;
		
	});


	$('#content').on('click','.cancelbtn',function(e){
		e.preventDefault();

		if(venturestate){
			$('#content').find('div').eq(2).html('');
			created_venture=false;
			position={};
			$('.create-venture-button').html('Create Venture');

		}
		else{
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');
			$('#positionform input[name=taginput]').tagit('removeAll');
			venturestate=true;
			$('.addpositionbox').hide();
			$('.addventurebox').show();				
		}
	})




});