@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
      <div class="header-body">
         <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Ordini'])
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
               <h3 class="mb-0">Ordini</h3>
               <p class="text-sm mb-0">
                 Vedi gli ordini, aggiungi un ordine ad esso.
               </p>
            </div>
            <div class="table-responsive py-4">
               <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
             
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                           <thead class="thead-light">
                              <tr>
                                <th scope="col" class="sort" data-sort="Id">Id</th>
                                <th scope="col" class="sort" data-sort="Input">Input</th>
                                <th scope="col" class="sort" data-sort="Documento">Documento</th>
                                <th scope="col" class="sort" data-sort="Utente">Utente</th>
                                @can('order-row')
                                <th scope="col" class="sort" data-sort="Costo">Costo</th>
                                @endcan
                                <th scope="col" class="sort" data-sort="Costo">Prezzo</th>
                                @can('order-list')
                                <th scope="col" class="sort" data-sort="Wallet">Wallet</th>
                                @endcan
                                <th scope="col" class="sort" data-sort="Creazione">Creazione</th>

                                <th scope="col" class="sort" data-sort="Stato">Stato</th>
                                @if(0)
                                <th scope="col" class=>Azioni</th>
                                @endif
                              </tr>
                            </thead>
                           <tbody>
                               
                              @if(isset($orders) && !empty($orders))
                                 @foreach($orders as $order)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $order->id}}</td>
                                    <td>{{ $order->input}}</td>
                                    <td>{{ $order->document->name}}</td>
                                    <td>{{$order->user->name}}</td>
                                    @can('order-row')
                                    <td>€ {{$order->cost}}</td>
                                    @endcan
                                    <td>€ {{$order->price}}</td>
                                    @can('order-list')
                                    <td>{{$order->wallet->name}}</td>
                                    @endcan
                                    <td>{{$order->created_at}}</td>
                                    <td class="d-flex boxstatus stat_{{$order->status->slug}}">
                                       <div class="circle" style="background:{{$order->status->background}};"></div> 
                                       <span class="pl-2 font-weight-bold" style="color:{{$order->status->color}};">{{$order->status->name}}</span>
                                       @if(!empty($order->xml))
                                       <a title="Apri xml" target="_blank" class="pl-3" href="{{route('orders.xml',$order->id)}}"> 
                                             <i class="fas fa-file-archive"></i>
                                       </a>
                                       @elseif(!empty($order->file_output)  && Storage::has($order->file_output.".zip"))
                                          <a title="Scarica archivio" class="pl-3" href="{{route('orders.download',$order->file_output)}}"> 
                                             <i class="fas fa-file-archive"></i>
                                          </a>
                                       @endif
                                    </td>
                                    @if(0)
                                    <td class="text-right">
                                       <div class="dropdown d-none">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                           @can('order-edit')
                                           <a class="dropdown-item" href="{{route('orders.edit', ['order' =>$order->id])}}">Modifica</a>
                                           @endcan
                                         </div>
                                       </div>
                                     </td>
                                     @endif
                                 </tr> 
                                 @endforeach
                              @endif
                            </tbody>
                        </table>
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
        
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
<script async>
   $(document).ready( function () {
      $('#datatable-basic').DataTable({
         "language": {
            "paginate": {
               "previous": "<",
               "next": ">"
            }
         } ,
         "order": [[ 0, "desc" ]]
    });
   } );
</script>
 
<style>

 
.offline{
    background:red;
}
  
</style>
@endsection