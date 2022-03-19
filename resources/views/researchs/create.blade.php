@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Effettua una ricerca'])
            @can('researchs-create')
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
               <h3 class="mb-0">Effettua una ricerca</h3>
               <p class="text-sm mb-0">
                  Ricerca puntuale denominazione impresa: si ottiene la lista delle imprese presenti
                  nel Registro Imprese corrispondenti ai parametri. 
                  E' una ricerca anagrafica sulle denominazioni attuali, insegne e acronimi. 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            
               {{ Form::open(['route' => 'researchs.store']) }}
               <input type="hidden" id="user_id"   name="user_id"   value="{{Auth::user()->id}}">
               <input type="hidden" id="wallet_id" name="wallet_id" value="{{Auth::user()->wallet->id}}">
               <input type="hidden" id="cost"      name="cost"      value="{{Auth::user()->wallet->cost_research}}">
               <input type="hidden" id="price"     name="price"     value="{{Auth::user()->wallet->price_research}}">

               <div class="card-body">
                  <p class="d-block">Disponibilità: <b>€ {{Auth::user()->budget}}</b> </p>
                  @if(Auth::user()->budget < Auth::user()->wallet->price_research || Auth::user()->wallet->budget_remaining < Auth::user()->wallet->cost_research)
                  <div class="row col-12 p-0 m-0">
                     <p>Non è possibile effettuare nessuna ricerca.</p>
                     <p>Controllare se si ha budget sufficiente o contattare il proprio amministratore di sistema</p>
                  </div>
                  @else
                  <div class="row">
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('input') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="input">Denominazione </label>
                           <input class="form-control{{ $errors->has('input') ? ' is-invalid' : '' }}" id="input" placeholder="Denominazione" type="text" name="input" value="" required autofocus>
                           @if ($errors->has('input'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('input') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div> 
                  </div>
                  <button type="submit" class="btn btn-slack btn-icon">
                     <span class="btn-inner--icon"><i class="fa fa-check green"></i></span>
                     <span class="btn-inner--text">Effettua ricerca</span>
                  </button>
                  @endif
                  @can('research-mylist')
                  <a type="button" href="{{route('researchs.index')}}" class="btn btn-danger btn-icon">
                     <span class="btn-inner--icon"><i class="fa fa-check red"></i></span>
                     <span class="btn-inner--text">Annulla</span>
                  </a>
                  @endcan
                   
               </div>
            </div>
            
         {{ Form::close() }}
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
<link href="{{ config('app.asset_url')}}/css/select2.min.css" rel="stylesheet" />
<script src="{{ config('app.asset_url')}}/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#permissions').select2();
});
</script>
@endsection