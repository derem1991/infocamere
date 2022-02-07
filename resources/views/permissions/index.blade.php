@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Permessi'])
            @can('permission-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('permissions.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
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
               <h3 class="mb-0">Permessi</h3>
               <p class="text-sm mb-0">
                 Vedi i permessi, aggiungilo o eliminalo
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
                                <th scope="col" class="sort" data-sort="Nome">Descrizione</th>
                                <th scope="col" class="sort" data-sort="Ruolo">Ruoli associati</th>
                                <th scope="col" class="sort" data-sort="Data creazione">Numero utenti </th>
                                <th scope="col" >Azioni</th>
                              </tr>
                            </thead>
                           <tbody>
                              @if(isset($permissions) && !empty($permissions))
                                 @foreach($permissions as $permission)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $permission->id ?? ''}}</td>
                                    <td>{{ $permission->name ?? ''}}</td>
                                    <td>{{ $permission->description ?? ''}}</td>
                                    <td>
                                        @if(isset($permission->roles) && !empty($permission->roles))
                                          @foreach($permission->roles as $role)
                                           <span class="badge badge-default" >{{$role->name ?? ''}} </span>
                                          @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($permission->roles) && !empty($permission->roles))
                                            @foreach($permission->roles as $role)
                                            {{count($role->users)." utenti" ?? '0 utenti'}} 
                                            @endforeach
                                        @endif
                                    </td>
                                     <td class="text-right">
                                       <div class="dropdown">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @can('permission-edit')
                                            <a class="dropdown-item" href="{{route('permissions.edit', ['permission' =>$permission->id])}}">Modifica</a>
                                            @endcan
                                            @can('permission-delete')
                                            <form action="{{ route('permissions.destroy' ,$permission->id)}}" method="POST">
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