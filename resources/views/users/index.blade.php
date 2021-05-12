@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Utenti','breadcrumb'=> $breadcrumb ?? null])
            @can('user-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('users.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
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
               <h3 class="mb-0">Utenti</h3>
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
                                <th scope="col" class="sort" data-sort="Email">Email</th>
                                <th scope="col" class="sort" data-sort="Ruolo">Ruolo</th>
                                <th scope="col" class="sort" data-sort="Data creazione">Data creazione</th>
                                <th scope="col" >Azioni</th>
                              </tr>
                            </thead>
                           <tbody>
                              @if(isset($users) && !empty($users))
                                 @foreach($users as $user)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $user->id ?? ''}}</td>
                                    <td>{{ $user->name ?? ''}}</td>
                                    <td>{{ $user->email ?? ''}}</td>
                                    <td>
                                       @if(isset($user->roles) && !empty($user->roles))
                                        @foreach($user->roles as $role)
                                          {{$role->name}}
                                        @endforeach
                                       @endif
                                    </td>
                                    <td>{{ $user->created_at ?? ''}}</td>
                                    <td class="text-right">
                                       <div class="dropdown">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                           @can('user-edit')
                                           <a class="dropdown-item" href="{{route('users.edit', ['user' =>$user->id])}}">Modifica</a>
                                           @endcan
                                           @can('user-delete')
                                           <form action="{{ route('users.destroy' ,$user->id)}}" method="POST">
                                             @csrf
                                             <button type="submit" class="dropdown-item"  >Cancella</button>
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
<style>

</style>
@endsection