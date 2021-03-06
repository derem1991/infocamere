@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Creazione Documento'])
            @can('document-create')
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
               <h3 class="mb-0">{{ isset($document) ? 'Modifica' : 'Creazione' }} documento</h3>
               <p class="text-sm mb-0">
                  {{ isset($document) ? 'Modifica' : 'Crea' }} un documento 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            @if(isset($document))
               {{ Form::model($document, ['route' => ['documents.update', $document->id], 'method' => 'PUT']) }}
            @else
               {{ Form::open(['route' => 'documents.store']) }}
            @endif
               <div class="card-body">
                  <div class="row">
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="name">Nome</label>
                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nome" type="text" name="name" value="{{$document->name ?? ''}}" required autofocus>
                           @if ($errors->has('name'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-5">
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="description">Descrizione</label>
                           <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="Descrizione" type="text" name="description" value="{{$document->description ?? ''}}">
                           @if ($errors->has('description'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('description') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-3">
                        <div class="form-group{{ $errors->has('wallet_id') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="wallet_id">Wallet </label>
                           <select id="wallet_id" class="form-control" name="wallet_id"  required > 
                              @foreach($wallets as $wallet)
                                <option @if(isset($document) && $document->wallet_id == $wallet->id) selected @endif
                                value="{{$wallet->id}}"> {{$wallet->name}} </option>
                              @endforeach
                           </select>
                           @if ($errors->has('document_id'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('document_id') }}</strong>
                           </span>
                           @endif
                        </div>
                    </div>
                  </div>
                  <hr class="w-100 my-2">
                  <h2 class="d-block">Opzioni Developer</h2>
                  <div class="row mb-4">
                     @can('document-developer')
                     <div class="col-12 p-0 m-0 row">
                        <div class="col-12 col-md-4">
                           <div class="custom-control custom-control-alternative custom-checkbox">
                              <input @if(isset($document) && $document->active) checked @endif class="custom-control-input" value="1" name="active" id="active" type="checkbox">
                              <label class="custom-control-label" for="active">
                                 <span>Attivo</span>
                              </label>
                           </div>
                           <small>Ogni documento aggiunto va abilitato dal reparto tecnico.</small>
                        </div>
                        <div class="col-12 col-md-8">
                           <div class="form-group{{ $errors->has('method') ? ' has-danger' : '' }} mb-0">
                              <label class="form-control-label" for="method">Metodo</label>
                              <input class="form-control{{ $errors->has('method') ? ' is-invalid' : '' }}" id="method" placeholder="Metodo" type="text" name="method" value="{{$document->method ?? ''}}">
                              @if ($errors->has('method'))
                              <span class="invalid-feedback" style="display: block;" role="alert">
                              <strong>{{ $errors->first('method') }}</strong>
                              </span>
                              @endif
                           </div>
                           <small>Metodo che viene chiamato dalle api</small>
                        </div>
                     </div>
                     @else
                     <div class="col-12 col-md-4">
                        <div class="form-group mb-0">
                           <label class="form-control-label mb-0" for="active">
                              <i class="{{isset($document) && $document->active ? 'fa fa-check green' : 'fas fa-exclamation-triangle red'}}"></i>
                              Attivo
                           </label>
                           <input class="form-control" id="active" type="hidden" name="active" value="{{$document->active ?? 0}}">
                        </div>
                        <small>Ogni documento aggiunto va abilitato dal reparto tecnico.</small>
                     </div>
                     @endcan
                     <hr class="w-100">
                     <h2 class="d-block col-12">Opzioni</h2>
                     <div class="col-12 p-0 m-0 row">
                        <div class="col-12 col-md-6">
                           <div class="custom-control custom-control-alternative custom-checkbox">
                              <input @if(isset($document) && $document->is_piva) checked @endif class="custom-control-input" value="1" name="is_piva" id="is_piva" type="checkbox">
                              <label class="custom-control-label" for="is_piva">
                                 <span>Input partita iva</span>
                              </label>
                           </div>
                           <small>Permette di poter ricercare questo documento per partita iva</small>
                        </div>
                        <div class="col-12 col-md-6">
                           <div class="custom-control custom-control-alternative custom-checkbox">
                              <input @if(isset($document) && $document->is_cfiscale) checked @endif class="custom-control-input" value="1" name="is_cfiscale" id="is_cfiscale" type="checkbox">
                              <label class="custom-control-label" for="is_cfiscale">
                                 <span>Input Codice fiscale</span>
                              </label>
                           </div>
                           <small>Permette di poter ricercare questo documento per codice fiscale</small>
                        </div>
                     </div>
                  </div>
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