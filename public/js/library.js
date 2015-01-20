//**************************************************************LIBRAR
//**************************************************************LIBRA

	var DateFormats = {
       short: "DD MMMM - YYYY",
       long: "dddd DD.MM.YYYY HH:mm"	
	};


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
			        var HTML = Template({ thread : data });
			        $('#content').html(HTML);
				}
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
	var message_id=$(this).parent().attr('data-message-id');
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

 $('#content').on('click','.submit-expertise-message',function(){

 		var user_id=$(this).parent().attr('data-user-id');
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
		position=data;
				var Source = $("#create-venture-template").html();
		        var Template = Handlebars.compile(Source);

		        var HTML = Template(position);
		        $('#dialog').html(HTML);
		        $('#dialog').addClass("small");
		        $('#dialog').foundation('reveal','open');        
				$('.taginput').tagit({
					"preprocessTag":function(val) {
			  			if (!val) { return ''; }
			  			return '#'+val;

					}
				});
});



$('#content').on('click','.create-venture-button',function(){
		position=data;
				var Source = $("#create-venture-template").html();
		        var Template = Handlebars.compile(Source);

		        var HTML = Template(position);
		        $('#dialog').html(HTML);
		        $('#dialog').addClass("small");
		        $('#dialog').foundation('reveal','open');        
				$('.taginput').tagit({
					"preprocessTag":function(val) {
			  			if (!val) { return ''; }
			  			return '#'+val;

					}
				});
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
	var venture={};
	var venturestate=true;
	$('#dialog').on('click','.addposition a',function(e){
		e.preventDefault();
		$('.addpositionbox').show();
		$('.addventurebox').hide();
		$('.finishbtn').attr('value','ADD POSITION');
		venturestate=false;
	});

	$('#dialog').on('click','#ventureform .cancelbtn',function(e){
		e.preventDefault();
	    positions.splice($(this).attr('data-id'), 1);
	    $('.positionlist').html('');
	    for (var i = 0; i < positions.length; i++) {
	    	$('.positionlist').append('<span class="title">'+positions[i].name+' <a href="#" data-id='+positions.length+' class="cancelbtn">Cancel</a></span><br><p>'+positions[i].tags+'</p>');
	    };
		$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )');
	});

	$('#dialog').on('click','.finishbtn',function(e){
		console.log($('#ventureform .taginput').val());
		if(venturestate){
			$.ajax({
				url: "ajax/add-venture",
				type: "POST",
				data: { 
				  	user_id:5, // to be changed later
				  	name: $('#ventureform input[name=venture]').val(),
					tags:[],
					description:$('#ventureform textarea[name=description]').val(),
					positions:positions
				},
				success: function(data, textStatus) {
						if(data=='ok'){
							$('#dialog').foundation('reveal','close');
							routingUpdate();
						}
				        if (data.redirect) {
				            
				        }
					}				  
				});
		}
		else{
			$('.finishbtn').attr('value','DONE');
			$('.addpositionbox').hide();
			$('.addventurebox').show();		    
			var position = {
			    name:$('#positionform input[name=position]').val(),
			    description:$('#positionform textarea[name=description]').val(),
			    tags:$('#positionform input[name=taginput]').val() 
			};
			$('.positionlist').append('<span class="title">'+position.name+' <a href="#" data-id='+positions.length+' class="cancelbtn">Cancel</a></span><br><p>'+position.tags+'</p>');			
			positions.push(position);
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');			
			$('#positionform input[name=taginput]').tagit('removeAll');
			$('.addposition a').html('Add Position ('+(3-positions.length)+' remaining )')
		}
		venturestate=true;
		
	});


	$('#dialog').on('click','.cancelbtn',function(e){
		e.preventDefault();

		if(venturestate){
			$('#dialog').foundation('reveal','close');
		}
		else{
			console.log('sd');
			$('#positionform input[name=position]').val('');
			$('#positionform textarea[name=description]').val('');
			$('#positionform input[name=taginput]').tagit('removeAll');
			$('.finishbtn').attr('value','DONE');
			$('.addpositionbox').hide();
			$('.addventurebox').show();				
		}
	})




});