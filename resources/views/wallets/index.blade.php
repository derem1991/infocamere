@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Wallets'])
            @can('wallet-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('wallets.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
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
               <h3 class="mb-0">Wallet</h3>
               <p class="text-sm mb-0">Vedi i wallet, aggiungilo o eliminalo</p>
            </div>
            <div class="table-responsive py-4">
               <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
             
                  <div class="row">
                     <div class="col-sm-12">
                        <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                           <thead class="thead-light">
                              <tr>
                                <th scope="col" class="sort" data-sort="Id">Id</th>
                                <th scope="col" class="sort" data-sort="Nome">Nome</th>
                                <th scope="col" class="sort" data-sort="Descrizione">Descrizione</th>
                                <th scope="col" class="sort" data-sort="budget">Budget</th>
                                <th scope="col" class="sort" data-sort="budget">Budget Rimasto</th>
                                <th scope="col" >Azioni</th>
                              </tr>
                            </thead>
                           <tbody>
                              @if(isset($wallets) && !empty($wallets))
                                 @foreach($wallets as $wallet)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $wallet->id ?? ''}}</td>
                                    <td>{{ $wallet->name ?? ''}}</td>
                                    <td>{{ $wallet->description ?? ''}}</td>
                                    <td>€ {{ $wallet->budget ?? ''}}</td>
                                    <td>€ {{ $wallet->budget_remaining ?? ''}}</td>
                                     <td class="text-right">
                                       <div class="dropdown">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @can('wallet-edit')
                                            <a class="dropdown-item" href="{{route('wallets.edit', ['wallet' =>$wallet->id])}}">Modifica</a>
                                            @endcan
                                            @can('wallet-delete')
                                            <form action="{{ route('wallets.destroy' ,$wallet->id)}}" method="POST">
                                             @csrf
                                             <button type="submit" class="dropdown-item" >Cancella</button>
                                             @method("DELETE")
                                            </form>
                                            @endcan
                                          </div>  
                                       </div>
                                     </td>
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
         }  
    });
   } );
</script>
 
@endsection