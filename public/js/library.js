History.Adapter.bind(window, 'statechange', function() {
	console.log("SD");
  routingUpdate();
});


//**************************************************************LIBRAR
//**************************************************************LIBRA

	var DateFormats = {
       short: "DD MMM YYYY",
       long: "dddd DD.MM.YYYY HH:mm"	
	};

	var created_venture=false;

	function menuHandler(e){
		
   		if($(this).html()=='My Ventures'){
    		e.preventDefault();
    		History.pushState(null, "My Ventures", "myventures");
   		}
   		else if($(this).html()=='Message Inbox'){
   			e.preventDefault();
    		History.pushState(null, "My Inbox", "inbox");
   		}
   		else if($(this).html()=='Ventures'){
   			e.preventDefault();
    		History.pushState(null, "Ventures", "ventures");
   		}
   		else if($(this).html()=='Expertise'){
   			e.preventDefault();
    		History.pushState(null, "Expertise", "expertise");
   		}

   		else if($(this).html()=='My Expertise'){
   			e.preventDefault();
    		History.pushState(null,"My Expertise", "myexpertise");
   		}
   		else if($(this).html()=='About'){
			e.preventDefault();
    		History.pushState(null,"About", "about");   			
   		}
   		else if($(this).html().trim().toLowerCase()=='sign out'){
   			window.location.href="signout";
   		}
    }

    function ajaxCallHandler(url,type,data,successfunction){
    	$.ajax({
				url: url,
				type: type,
				data: data,
				success: function(result, textStatus) {
					data=result;

					if(data.response=='fail'){
			        	 window.location.href = data.redirect;
					}	
					successfunction(result,textStatus);
				},
				fail:function(){
				}			
			 	
			 });
    }

	function routingFunction(){
		var currentURL=window.location.href;
		var routingArray=currentURL.split('/');
		var routingString=routingArray[routingArray.length-1];
		while(routingString[routingString.length-1]=='#')
			routingString=routingString.substring(0,routingString.length,-1)
		return routingString;
	}

	function checkForSideBar(url){
        
        $('.venturelink').removeClass('green-sidebar');		
    	
		$('.expertiselink').removeClass('green-sidebar');
		$('.venturelink').addClass('grey-sidebar');
		$('.expertiselink').addClass('grey-sidebar');
		if(currentURL=='ventures'){
				        $('.expertiselink').addClass('grey-sidebar');
	        $('.expertiselink').removeClass('green-sidebar');
	        $('.venturelink').removeClass('grey-sidebar');
	        $('.venturelink').addClass('green-sidebar');
		}
		else if(currentURL=='expertise'){
			$('.expertiselink').addClass('green-sidebar');
			        $('.expertiselink').removeClass('grey-sidebar');
			        $('.venturelink').removeClass('green-sidebar');
			        $('.venturelink').addClass('grey-sidebar');

		}		
	}
	function routingUpdate(){
		
		currentURL=routingFunction();
		if(currentURL=='ventures'){
			var success=function(result, textStatus) {
					data=JSON.parse(result);
					ventures=data;
					var Source = $("#venture-Template").html();
					Handlebars.registerPartial("position", $("#position-partial").html());
			        var Template = Handlebars.compile(Source);
			        var HTML = Template({ ventures : ventures });
			        $('#content').html(HTML);

					$('.venturebox').height($('.venturebox').width());
				};
			ajaxCallHandler('ajax/get-ventures',"GET",{},success);
			}
		else if(currentURL=='expertise'){
			var success= function(result, textStatus) {
					data=JSON.parse(result);
					var Source = $("#expertise-template").html();
			        var Template = Handlebars.compile(Source);
			        var HTML = Template({ expertise : data });
			        $('#content').html(HTML);
			        
			        $('.venturebox').height($('.venturebox').width());
				};
			ajaxCallHandler('ajax/get-expertise',"GET",{},success);

		}
		else if(currentURL=='myventures'){
			var success= function(result, textStatus) {
				ventures=JSON.parse(result);
				var Source = $("#venture-Template").html();
				Handlebars.registerPartial("position", $("#position-partial").html());
		        var Template = Handlebars.compile(Source);
		        var HTML = Template({ ventures : ventures });
		        $('#content').html(HTML);
	        	$('.venturebox').height($('.venturebox').width());
			};
			ajaxCallHandler('ajax/get-my-ventures',"GET",{},success);
		}
		else if(currentURL=='inbox'){
			console.log("SD");
				var success= function(result, textStatus) {
					data=JSON.parse(result);;
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
				};
			ajaxCallHandler('ajax/get-inbox',"GET",{},success);
		}
		else if(currentURL=='myexpertise'){

				$.ajax({
						url: "ajax/get-my-expertise",
			  			type: "GET",
			  			
		  			})
				 .done(function(msg){
				  			var tags="";
				  			var data=JSON.parse(msg);	
							if(data.response=='fail'){
					        	 window.location.href = data.redirect;
							}	
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
		else if(currentURL=='signupsuccesss'){
			var Source = $("#signupsuccesss-template").html();
	        var Template = Handlebars.compile(Source);
	        var HTML = Template({});
	        $('#content').html(HTML);

		}
		else if(currentURL=='about'){
			var Source = $("#aboutus-template").html();
	        var Template = Handlebars.compile(Source);
	        var HTML = Template({});
	        $('#content').html(HTML);
	        $(document).foundation('accordion', 'reflow');

		}
		else if(currentURL=='confirmed'){
			var Source = $("#confirmuser-template").html();
	        var Template = Handlebars.compile(Source);
	        var HTML = Template({});
	        $('#content').html(HTML);
		}
		else if(currentURL.substring(0,6)=="thread"){

			var urlSplit=currentURL.split('-');
			if(urlSplit.count!=1){
				var success= function(result, textStatus) {
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
			        checkForNotifications();
				};
				ajaxCallHandler('ajax/get-message-thread',"GET",{message_id:urlSplit[1]},success);
			}
		}
		checkForNotifications();
		checkForSideBar(currentURL);
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
    $('.not-click').click(function(e){
    	e.preventDefault();
    
	});

//*************************************************************NOTIFICATIONS

	function checkForNotifications(){
		$.ajax({
				url: 'ajax/get-notifications',
				type: 'get',
				data: {},
				success: function(result, textStatus) {
					console.log(result);
					data=result;

					if(data.response=='fail'){
			        	 window.location.href = data.redirect;
					}	
					if(data!=0){
						$('.notification-menu-item').html('<div href="#" class="notification"><span>'+data+'</span></div>')
					}
					else
						$('.notification-menu-item').html('')
				},
				fail:function(){
					
				}			
			 	
		 });
	}

	$('body').on('click','.notification',function(e){
		e.preventDefault();
    	History.pushState(null, "My Inbox", "inbox");

	});



//**************************************************************INBOX
//**************************************************************INBOX
//**************************************************************INBOX
//**************************************************************INBOX
//**************************************************************INBOX
$('#content').on('click','.messagethread',function(e){
	e.preventDefault();
	var message_id=$(this).attr('data-message-id');
	History.pushState(null, "Thread", "thread-"+message_id);
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

function tagit(div){
	$.ajax({
	 		url:'ajax/get-tags',
	 		type:"GET"
	 		}).done(function(msg){
				$(div).tagit({
					"preprocessTag":function(val) {
			  			if (!val) { return ''; }
			  			if(val.charAt(0)=='#')
			  				return val;
			  			return '#'+val;

					},
					"availableTags":JSON.parse(msg),
					maxTags:10
				});
		});
}


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
				position=data;
				var Source = $("#send-expertise-message-template").html();
		        var Template = Handlebars.compile(Source);
		        var HTML = Template(position);
		        $('#dialog').html(HTML);
		        $('#dialog').addClass('tiny');
		        $('#dialog').foundation('reveal','open');
			}	
		 });
 });

 $('#dialog').on('click','.submit-expertise-message',function(){
 	console.log('sd');
 		var user_id=$(this).parent().parent().attr('data-user-id');
 		 $.ajax({
			url: 'ajax/post-experience-message',
			type: "POST",
			data: { 
				subject:$(this).parent().parent().find('input[name=subject]').val(),
				message : $(this).parent().parent().find('textarea[name=message]').val(),
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
	  			History.pushState("", "My Expertise", "expertise");
   	
	  		});
  		});

//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES
//**************************************************************VENTURES




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
		        $('#dialog').addClass('tiny');
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
		tagit('.taginput');

        //$('#dialog').html(HTML);
        //$('#dialog').addClass("small");
        //$('#dialog').foundation('reveal','open');        
        
		
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
 		var position_id=$(this).parent().parent().attr('data-position-id');
 		 $.ajax({
			url: 'ajax/post-position-message',
			type: "POST",
			data: { 
				position_id:$(this).parent().parent().find('input[name=position-id]').val(),
				message : $(this).parent().parent().find('textarea[name=message]').val(),
				receiver_id:$(this).parent().parent().find('input[name=receiver-id]').val()
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
	        		tagit('.taginput');
			        if((4-positions.length)>0)
						$('.addposition a').html('Add Position ('+(4-positions.length)+' remaining )')
					else
						$('.addposition a').html('');
					$('html, body').animate({scrollTop: '0px'}, 0);

				}				  
			});
	        
	        tagit('.taginput');
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
		$('.addposition a').html('Add Position ('+(4-positions.length)+' remaining )');
	});

	$('#content').on('click','.finishbtn',function(e){
		e.preventDefault();
		if(venturestate){
			var name=$('#ventureform input[name=venture]').val();
			var description=$('#ventureform textarea[name=description]').val();
			var venture_id=$('#ventureform').attr('data-venture-id');
			if(name.length==0){
				alert("You can't have an empty name");
			}
			else if(description.length==0){
				alert("You can't have an empty description");
			}
			else if(positions.length==0){
				alert("You must have at least one position");
			}
			else{
				$.ajax({
					url: "ajax/add-venture",
					type: "POST",
					data: {  // to be changed later
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
		}
		else{
			if($('#positionform input[name=position]').val().length==0){
				alert("You can't have an empty name");
			}
			else if($('#positionform textarea[name=description]').val().length==0){
				alert("You can't have an empty description");
			}
			else if($('#positionform input[name=taginput]').val().length==0){
				alert("You must have at least one tag");
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
				if(4-positions.length>0){
					$('.addposition a').html('Add Position ('+(4-positions.length)+' remaining )');
				}
				else{
					$('.addposition a').html('');	
				}
				venturestate=true;

			}
		}
		
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