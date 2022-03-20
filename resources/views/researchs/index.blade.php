@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
      <div class="header-body">
         <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Ricerche'])
            @can('research-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('researchs.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
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
               <h3 class="mb-0">Ricerche</h3>
               <p class="text-sm mb-0">
                 Vedi le ricerche effettuate, aggiungi una ricerca, ed effettua un ordine dopo aver trovato la denominazione giusta.
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
                                <th scope="col" class="sort" data-sort="Denominazione">Denominazione</th>
                                <th scope="col" class="sort" data-sort="Utente">Utente</th>
                                @can('research-row')
                                <th scope="col" class="sort" data-sort="Costo">Costo</th>
                                @endcan
                                <th scope="col" class="sort" data-sort="Prezzo">Prezzo</th>
                                @can('research-list')
                                <th scope="col" class="sort" data-sort="Wallet">Wallet</th>
                                @endcan
                                <th scope="col" class="sort" data-sort="Creazione">Creazione</th>
                                @can('research-edit')
                                <th scope="col" class=>Azioni</th>
                                @endcan
                              </tr>
                            </thead>
                           <tbody>
                               
                              @if(isset($researchs) && !empty($researchs))
                                 @foreach($researchs as $research)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{$research->id}}</td>
                                    <td>{{ $research->input}}</td>
                                    <td>{{$research->user->name}}</td>
                                    @can('research-row')
                                    <td>€ {{$research->cost}}</td>
                                    @endcan
                                    <td>€ {{$research->price}}</td>
                                    @can('research-list')
                                    <td>{{$research->wallet->name}}</td>
                                    @endcan
                                    <td>{{$research->created_at}}</td>
                                    @can('research-edit')
                                    <td>
                                       <a class="font-weight-bold" href="{{route('researchs.edit', ['research' =>$research->id])}}">Dettagli</a>
                                    </td>
                                    @endcan
                                 
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
         "research": [[ 0, "desc" ]]
    });
   } );
</script>
 
<style>

 
.offline{
    background:red;
}
  
</style>
@endsection