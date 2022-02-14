@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
      <div class="header-body">
         <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Documenti'])
            @can('user-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('documents.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
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
               <h3 class="mb-0">Documenti</h3>
               <p class="text-sm mb-0">
                 Vedi i documenti, aggiungi un documento ad esso o elimina un documento.
                 <br>
                 <b>Attivo</b>:Ogni documento aggiunto va abilitato dal superadmin per l'implementazione tecnica.<br>
                 <b>Partita iva</b>:Permette di poter ricercare questo documento per partita iva <br>
                 <b>Codice fiscale</b>:Permette di poter ricercare questo documento per codice fiscale<br>
                 <b>Associazione wallet</b>:Il wallet con relativo costo e prezzo di vendita, può essere associato al documento dalla sua pagina di "edit"<br>
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
                                <th scope="col" class="sort" data-sort="Active">Attivo</th>
                                <th scope="col" class="sort" data-sort="Descrizione">Descrizione</th>
                                <th scope="col" class="sort" data-sort="Partita iva">Partita iva</th>
                                <th scope="col" class="sort" data-sort="Codice fiscale">Codice fiscale</th>
                                @can('document-list')
                                <th scope="col" class="sort" data-sort="Codice fiscale">Wallet</th>
                                @endcan
                                <th scope="col" >Azioni</th>
                              </tr>
                            </thead>
                           <tbody>
                              @if(isset($documents) && !empty($documents))
                                 @foreach($documents as $document)
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $document->id}}</td>
                                    <td>{{ $document->name}}</td>
                                    <td>
                                       <i class="{{ $document->active ? 'fa fa-check green' : 'fas fa-exclamation-triangle red'}}"></i>
                                    </td>
                                    <td>{{ $document->description}}</td>
                                    <td>
                                       <i class="{{ $document->is_piva ? 'fa fa-check green' : 'fas fa-exclamation-triangle red'}}"></i>
                                    </td>
                                    <td>
                                       <i class="{{ $document->is_cfiscale ? 'fa fa-check green' : 'fas fa-exclamation-triangle red'}}"></i>
                                    </td>
                                    @can('document-list')
                                    <td>{{ $document->wallet->name ?? ''}}</td>
                                    @endcan
                                    <td class="text-right">
                                       <div class="dropdown">
                                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                         </a>
                                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                           @can('document-edit')
                                           <a class="dropdown-item" href="{{route('documents.edit', ['document' =>$document->id])}}">Modifica</a>
                                           @endcan
                                           @can('document-delete')
                                           <form action="{{ route('documents.destroy' ,$document->id)}}" method="POST">
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
 
@endsection