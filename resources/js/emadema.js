$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$( document ).ready(function() 
{
	$('#modalcamere').on('hidden.bs.modal', function () {
		$('#modalcamere .modal-body').html('');
    });
	$('#modalcamere').on('show.bs.modal', function(e) 
	{   
	  var modal = $(this);
	  var button = $(e.relatedTarget);
	  var title = button.data('title');
	  var action = button.data('action');
	  modal.find('.modal-title').text(title);
	  switch(action) 
	  {
		case 'document':
			var wallet = button.data('wallet');
			$.ajax({
				url :'/ajax/modal/document',
				type : 'GET',
				dataType:'json',
				data:{id:button.data('id'),wallet:wallet},
				success : function(param) {  
					$.post('/modals/document', {param:param,wallet:wallet} ).done(function( data ) {
						modal.find('.modal-body').html(data);
					});
				},
				error : function(request,error) {
					$.post('/modals/document', {wallet:wallet} ).done(function( data ) {
						modal.find('.modal-body').html(data);
					});
				}
			});	
		 		 
	    break;
	  }	 
   }); 

});
 
