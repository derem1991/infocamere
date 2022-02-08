@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
      <div class="header-body">
         <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>isset($wallet) ? 'Modifica wallet' : 'Creazione wallet'])
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
               <h3 class="mb-0">{{ isset($wallet) ? 'Modifica' : 'Creazione' }} wallet</h3>
               <p class="text-sm mb-0">
                  {{ isset($wallet) ? 'Modifica' : 'Crea' }} un wallet 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            @if(isset($wallet))
            {{ Form::model($wallet, ['route' => ['wallets.update', $wallet->id], 'method' => 'PUT']) }}
            @else
            {{ Form::open(['route' => 'wallets.store']) }}
            @endif
            <div class="card-body">
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                        <label class="form-control-label" for="name">Nome </label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nome" type="text" name="name" value="{{$wallet->name ?? ''}}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }} mb-3">
                        <label class="form-control-label" for="budget">Budget </label>
                        <input class="form-control{{ $errors->has('budget') ? ' is-invalid' : '' }}" step="0.01" id="budget" placeholder="Budget" type="number" name="budget" value="{{$wallet->budget ?? ''}}" required>
                        @if ($errors->has('budget'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('budget') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }} mb-3">
                        <label class="form-control-label" for="description">Descrizione </label>
                        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="Descrizione" type="text" name="description" value="{{$wallet->description ?? ''}}">
                        @if ($errors->has('description'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
               </div>
               <hr class="w-100 my-2">
               <div class="row mb-4">
                  <div class="col">
                     <div class="card">
                        <div class="card-header">
                           <div class="col-12 p-0 m-0 row">
                              <div class="col-6 p-0 ">
                               <h3 class="mb-0">Documenti</h3>
                              </div>
                              <div class="col-6 p-0 text-right">
                                 <button type="button" class="btn btn-sm btn-neutral"
                                 data-toggle="modal"
                                 data-target="#modalcamere"
                                 data-title="pippo"
                                 data-action="document">Associa nuovo documento</button>
                              </div>
                           </div>                          
                           <p class="text-sm mb-0">Vedi i documenti associati al wallet, aggiungili o eliminali</p>
                        </div>
                        <div class="table-responsive py-4">
                           <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                              <div class="row">
                                 <div class="col-sm-12">
                                    <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                       <thead class="thead-light">
                                          <tr>
                                             <th scope="col" class="sort" data-sort="Id">Id</th>
                                             <th scope="col" class="sort" data-sort="Document">Documento</th>
                                             <th scope="col" class="sort" data-sort="Active">Prezzo Attivo</th>
                                             <th scope="col" class="sort" data-sort="cost">Costo</th>
                                             <th scope="col" class="sort" data-sort="price">Prezzo di vendita</th>
                                             <th scope="col" >Azioni</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @if(isset($documents) && !empty($documents))
                                          @foreach($documents as $document)
                                          <tr role="row" class="odd">
                                             <td class="sorting_1">{{ $wallet->id ?? ''}}</td>
                                             <td>{{ $document->document->name ?? ''}}</td>
                                             <td>
                                                <i class="{{ $document->active ? 'fa fa-check' : 'fas fa-exclamation-triangle'}}"></i>
                                             </td>
                                             <td>{{ $document->cost ?? ''}}</td>
                                             <td>{{ $document->price ?? ''}}</td>
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
               <button type="submit" class="btn btn-slack btn-icon">
               <span class="btn-inner--icon"><i class="fa fa-check"></i></span>
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