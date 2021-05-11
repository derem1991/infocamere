@extends('layouts.app')
@section('content')
@include('layouts.headers.navigation',['title'=>'Ruoli','breadcrumb'=> $breadcrumb ?? null,'routeCreate' => 'roles.create'])
<div class="container-fluid mt--6">
   <div class="row">
      <div class="col">
         <div class="card">
            <!-- Card header -->
            <div class="card-header">
               <h3 class="mb-0">Ruoli</h3>
               <p class="text-sm mb-0">
                 Vedi gli utenti, aggiungi un ruolo ad esso o elimina un utente
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
                                <th scope="col" class="sort" data-sort="Nome">Nome</th>
                                <th scope="col" class="sort" data-sort="Ruolo">Permessi</th>
                                <th scope="col" class="sort" data-sort="Data creazione">Numero utenti </th>
                                <th scope="col" >Azioni</th>
                              </tr>
                            </thead>
                           <tbody>
                              @if(isset($roles) && !empty($roles))
                                 @foreach($roles as $role)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $role->id ?? ''}}</td>
                                    <td>{{ $role->name ?? ''}}</td>
                                    <td>
                                       @if(isset($role->permissions) && !empty($role->permissions))
                                           @foreach($role->permissions as $permission)
                                              <span class="badge badge-default" style="background-color:#212529;color:#fff;">{{$permission->name ?? ''}}</span>
                                           @endforeach
                                       @endif
                                    </td>
                                    <td>{{count($role->users).' utenti' ?? '0 utenti'}}</td>
                                     <td class="text-right">
                                       <div class="dropdown">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#">Modifica</a>
                                            <a class="dropdown-item" href="#">Cancella</a>
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
      
    });
   } );
</script>
<style>

</style>
@endsection