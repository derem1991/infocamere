@extends('layouts.app')
@section('content')
@include('layouts.headers.navigation',['title'=>'Permessi','breadcrumb'=> $breadcrumb ?? null,'routeCreate' => 'permissions.create'])
<div class="container-fluid mt--6">
   <div class="row">
      <div class="col">
         <div class="card">
            <!-- Card header -->
            <div class="card-header">
               <h3 class="mb-0">{{ isset($permission) ? 'Modifica' : 'Creazione' }} permesso</h3>
               <p class="text-sm mb-0">
                  {{ isset($user) ? 'Modifica' : 'Crea' }} un permesso 
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
                     <div class="col-12 col-md-4">
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
                     
                  </div>
               </div>
            </div>
            <button type="submit">Salva</button>
         {{ Form::close() }}
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
 
@endsection