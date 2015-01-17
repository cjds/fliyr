//**************************************************************LIBRAR
//**************************************************************LIBRA

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
				}			
			 	
			 });

		}
		else if(currentURL=='expertise'){
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
				}			
			 	
			 });

		}
	}

//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE
//**************************************************************EXPERTISE





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
 		$(this).parent().hide();
 		
 		
 });


$('#content').on('click','.position-message-btn',function(e){
		console.log("SD");
 		var position_id=$(this).parent().attr('data-position-id');
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

 $('#content').on('click','.position-back-btn',function(){
 		$(".position[data-position-id="+$(this).attr('data-position-id')+"]").show();
 		$(this).parent().hide();
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