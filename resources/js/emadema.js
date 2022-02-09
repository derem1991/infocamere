$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$( document ).ready(function() 
{
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
			$.post('/modals/document', {} ).done(function( data ) {
				modal.find('.modal-body').html(data);
			});		 
	    break;
	  }	 
   }); 

});
 
