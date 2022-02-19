@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Creazione Ordine'])
            @can('order-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('orders.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
            </div>
            @endcan
           </div> 
       </div>
   </div>
</div>
 
<div class="container-fluid mt--6">
   <div class="row">
      <div class="col">
         <div class="card">
            <!-- Card header -->
            <div class="card-header">
               <h3 class="mb-0">{{ isset($order) ? 'Modifica' : 'Creazione' }} ordine</h3>
               <p class="text-sm mb-0">
                  {{ isset($order) ? 'Modifica' : 'Crea' }} un ordine 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            
            @if(isset($order))
               {{ Form::model($order, ['id'=>'ordersForm','route' => ['orders.update', $order->id], 'method' => 'PUT']) }}
            @else
               {{ Form::open(['id'=>'ordersForm','route' => 'orders.store']) }}
            @endif
               <input type="hidden" id="step" value="1">
               <input type="hidden" id="document_id" name="document_id" value="">
               <input type="hidden" id="input" name="input" value="">
               <input type="hidden" id="wallet_id" name="wallet_id" value="{{Auth::user()->wallet_id}}">
               <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
               <input type="hidden" id="price" name="price" value="0">
               <input type="hidden" id="cost" name="cost" value="0">
               <input type="hidden" id="status_id" name="status_id" value="{{$defaultStatus}}">
               <div class="card-body">
                  <b>Disponibilita: € {{Auth::user()->budget}} </b>
                  <p id="recap"></p>
                  @if($documents->isNotEmpty())
                  <div id="stepbox" class="col-12 p-0 m-0">
                     @include('partials.cardOrder',['step'=>1])
                  </div>                 
                  @else
                     <p>Non è possibile effettuare nessun ordine.</p>
                     <p>Controllare se si ha budget sufficiente o contattare il proprio amministratore di sistema</p>
                  @endif
               </div>
            </div>
            
         {{ Form::close() }}
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
<script>

function prevStep() {
 
   let step = $("#step").val();
   $("#step").val(parseInt(step)-1);
   $("#document_id").val(""); 
   $("#recap").text("");
   $("#price").val(0); 
   $("#cost").val(0); 
   $.ajax({
		url :'/ajax/loadStepOrder',
		type : 'GET',
		dataType:'json',
		data:{step:$("#step").val()},
		success : function(response) 
      { 
			$("#stepbox").html("");
         $(response).appendTo("#stepbox");
		} 
	});	
};

function nextStep() 
{
   let step = $("#step").val();
   let newStep = parseInt(step)+1;
   if(step == 1) // scelta documento
   {
      if($("#document").val() == '')
      {
         alert("Scegliere un documento per andare avanti!");
         return false;
      }
   }
   else if(step == 2)
   {
      if($("#text").val() == '')
      {
         alert("Inserire partiva iva o codice fiscale per poter proseguire!");
         return false;
      }
      $("#input").val($("#text").val());
   }
   $("#step").val(newStep);
   $.ajax({
		url :'/ajax/loadStepOrder',
		type : 'GET',
		dataType:'json',
		data:{step:$("#step").val()},
		success : function(response) 
      { 
         $("#stepbox").html("");
         if(newStep == 3)
         {
            $.ajax({
               url :"{{route('orders.store')}}",
               type : 'POST',
               dataType:'json',
               data:$("#ordersForm input").serialize(),
               success : function() 
               { 
                  $("#stepbox").html("");
                  if(newStep == 3)
                  {
                    $(response).appendTo("#stepbox");
                  }
                  else
                  {
                  $(response).appendTo("#stepbox");
                  }
               } 
            });
         }
         else
         {
           $(response).appendTo("#stepbox");
         }
		} 
	});
}
function changeDoc()
{
   let doc = $('#document').val();
   if(doc !="")
   {
      let description = $('#document option:selected').attr('data-description');
      let price       = $('#document option:selected').attr('data-price');
      let cost        = $('#document option:selected').attr('data-cost');
      $("#descriptionDoc").text(description);
      $("#document_id").val(doc);
      $("#price").val(price);
      $("#cost").val(cost);
      $("#recap").text($('#document option:selected').text());
   }  
   else
   {
      $("#recap").text("");
      $("#descriptionDoc").text("");
   }
}

</script>
@endsection