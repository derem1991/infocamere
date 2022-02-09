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
               {{ Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'PUT']) }}
            @else
               {{ Form::open(['route' => 'orders.store']) }}
            @endif
               <div class="card-body">
                 
                  
                  <button type="submit" class="btn btn-slack btn-icon">
                     <span class="btn-inner--icon"><i class="fa fa-check green"></i></span>
                     <span class="btn-inner--text">Salva</span>
                  </button>
               </div>
            </div>
            
         {{ Form::close() }}
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
 
@endsection