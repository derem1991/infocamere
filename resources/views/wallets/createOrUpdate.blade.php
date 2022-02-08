@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Creazione wallet'])
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
           
               <!-- Card body -->
               <div class="card-body">
                  <!-- Form groups used in grid -->
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
 
@endsection

 