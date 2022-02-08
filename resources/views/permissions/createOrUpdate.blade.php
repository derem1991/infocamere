@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Creazione Permessi'])
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
               <h3 class="mb-0">{{ isset($permission) ? 'Modifica' : 'Creazione' }} permesso</h3>
               <p class="text-sm mb-0">
                  {{ isset($permission) ? 'Modifica' : 'Crea' }} un permesso 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            @if(isset($permission))
               {{ Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method' => 'PUT']) }}
            @else
               {{ Form::open(['route' => 'permissions.store']) }}
            @endif
           
               <!-- Card body -->
               <div class="card-body">
                  <!-- Form groups used in grid -->
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="name">Nome </label>
                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nome" type="text" name="name" value="{{$permission->name ?? ''}}" required autofocus>
                           @if ($errors->has('name'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="description">Descrizione </label>
                           <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="Descrizione" type="text" name="description" value="{{$permission->description ?? ''}}" autofocus>
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

 