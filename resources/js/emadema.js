 
$( document ).ready(function() 
{
  
	$('#modalerp').on('show.bs.modal', function(e) 
	{   
	  var modal = $(this);
	  var button = $(e.relatedTarget);
	  var title = button.data('title');
	  var action = button.data('action');
	  modal.find('.modal-title').text(title);
	  switch(action) 
	  {
		case 'order':
			$.ajax({
				url :button.data('users'),
				type : 'GET',
				dataType:'json',
				success : function(users) {  
					$.ajax({
						url :button.data('companies'),
						type : 'GET',
						dataType:'json',
						success : function(companies) {  
							 $.post( '/modals/order', { "users":users,"action": action,"companies": companies} ).done(function( data ) {
								modal.find('.modal-body').html(data);
							});
						},
						error : function(request,error) {
							$.post( '/modals/order', { "action": action} ).done(function( data ) {
								modal.find('.modal-body').html(data);
							});
						}
					});
				},
				error : function(request,error) {
				 
				}
			});		 
	    break;
		case 'share':
			var source_type = button.data('source_type');
			var source_id = button.data('source_id');
			$.ajax({
				url :'/ajax/modal/share',
				type : 'GET',
				dataType:'json',
				data:{source_type:source_type,source_id:source_id},
				success : function(param) {  
					$.post( '/modals/share', {"source_type":source_type,"param":param,"source_id":source_id} ).done(function( data ) {
						modal.find('.modal-body').html(data);	
					});  
				},
				error : function(request,error) {
					$.post( '/modals/task', { "source_type":source_type,"source_id":source_id} ).done(function( data ) {
						modal.find('.modal-body').html(data);	
					}); 
				}
			});	
	    break;
		case 'firstNote':
			var starting = button.data('starting');
			var invoice  = button.data('invoice');
			$.ajax({
				url :'/ajax/modal/firstNote',
				type : 'GET',
				dataType:'json',
				data:{invoice:invoice},
				success : function(param) {  
					$.post( '/modals/firstNote', {"param":param,"starting":starting} ).done(function( data ) {
						modal.find('.modal-body').html(data);	
					});  
				},
				error : function(request,error) {
					$.post( '/modals/firstNote', {"param":param,"starting":starting} ).done(function( data ) {
						modal.find('.modal-body').html(data);	
					}); 
				}
			});	
	 
	    break;
		case 'task':
			var project = button.data('project');
			var parent = button.data('parent');
			var id = button.data('source_id');
			$.ajax({
				url :'/ajax/modal/task',
				type : 'GET',
				dataType:'json',
				data:{id:id,project:project},
				success : function(param) {  
					$.post( '/modals/task', {"project":project,"param":param,"parent":parent} ).done(function( data ) {
						modal.find('.modal-body').html(data);	
					});  
				},
				error : function(request,error) {
					$.post( '/modals/task', { "project":project,"parent":parent} ).done(function( data ) {
						modal.find('.modal-body').html(data);	
					}); 
				}
			});		
 
	    break;
		case 'project':
			var type = button.data('type');
			if(type == 'show') //mostra progetti per offerta
			{	  
				$.ajax({
					url :button.data('project')+"/"+button.data('offer_id'),
					type : 'GET',
					dataType:'json',
					success : function(projects) {  
						$.post('/modals/projectsOffer',{"projects":projects} ).done(function(data) {
							modal.find('.modal-body').html(data);
						}); 
					},
					error : function(request,error) {
						$.post('/modals/projectsOffer',{} ).done(function(data) {
							modal.find('.modal-body').html(data);
						});
					}
				});		 
			}
			else
			{
				var order_id  = button.data('order_id');
				var status_id = button.data('status_id');
				var offer_id  = button.data('offer_id');
				$.ajax({
					url :button.data('orders'),
					type : 'GET',
					dataType:'json',
					success : function(orders) {  
						$.ajax({
							url :button.data('users'),
							type : 'GET',
							dataType:'json',
							success : function(users) {  
								$.post('/modals/project',{"offer_id": offer_id,"orders":orders,"status_id": status_id,"order_id": order_id,"users":users} ).done(function(data) {
									modal.find('.modal-body').html(data);
								}); 
							},
							error : function(request,error) {
								$.post('/modals/project',{"offer_id": offer_id,"orders":orders,"order_id": order_id,"status_id": status_id} ).done(function(data) {
									modal.find('.modal-body').html(data);
								});
							}
						});		  
						 
					},
					error : function(request,error) {
						$.post('/modals/project',{"offer_id": offer_id,"orders":orders,"status_id": status_id,"order_id": order_id} ).done(function(data) {
							modal.find('.modal-body').html(data);
						});
					}
				});		 
			}		 
	    break;
		case 'offer':
			var status_id = button.data('status_id');
			var source_id = button.data('source_id');
			var company_id = button.data('company_id');
			var source_type = button.data('source_type');
			var laststep = button.data('laststep');
			var offer_id = button.data('offer_id');
 			$.post( '/modals/offer/'+offer_id, {"laststep": laststep,"offer_id": offer_id, "action": action,"source_type":source_type,"source_id":source_id,"status_id":status_id,"company_id":company_id} ).done(function( data ) {
				modal.find('.modal-body').html(data);
			});
	    break;
		case 'lead':
			$.ajax({
				url :button.data('users'),
				type : 'GET',
				dataType:'json',
				success : function(users) {  
					$.ajax({
						url :button.data('company'),
						type : 'GET',
						dataType:'json',
						success : function(usersCompany) {  
						  $.ajax({
							url :button.data('lead'),
							type : 'GET',
							dataType:'json',
							success : function(lead) {  
								 $.post( '/modals/lead', { "action": action,"lead": lead,"users":users,"usersCompany":usersCompany} ).done(function( data ) {
									modal.find('.modal-body').html(data);
								});
							},
							error : function(request,error) {
							 
							}
						  });
						},
						error : function(request,error) {
						 
						}
					});
				},
				error : function(request,error) {
				 
				}
			});				    
	    break;
		case 'comment':
			var source_id = button.data('source_id');
			var source_type = button.data('source_type');
			$.post( '/modals/comment', { "action": action,"source_type":source_type,"source_id": source_id} ).done(function( data ) {
				modal.find('.modal-body').html(data);
			});		 
	    break;
		case 'media':
			var source_id   = button.data('source_id');
			var source_type = button.data('source_type');
			var source      = button.data('source');
			if(source == 'User')
			{
				var internal = button.data('internal');
			    $.ajax({
					url :'/ajax/documentsUser',
					type : 'GET',
					dataType:'json',
					success : function(fields) {  
						$.post( '/modals/media', {"internal": internal,"fields": fields,"action": action,"source_type":source_type,"source_id": source_id} ).done(function( data ) {
							modal.find('.modal-body').html(data);
						});		 
					},
					error : function(request,error) {
						$.post( '/modals/media', {"action": action,"source_type":source_type,"source_id": source_id} ).done(function( data ) {
							modal.find('.modal-body').html(data);
						});		 
					}
				});
			}
		 
			$.post( '/modals/media', {"action": action,"source_type":source_type,"source_id": source_id} ).done(function( data ) {
				modal.find('.modal-body').html(data);
			});		 
	    break;
	  }	
	 
		
		 
   });


});
 
