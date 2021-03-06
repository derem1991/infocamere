@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Creazione Ruolo'])
            @can('role-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('roles.create')}}" class="btn btn-sm btn-neutral">Nuovo</a>
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
               <h3 class="mb-0">{{ isset($role) ? 'Modifica' : 'Creazione' }} ruolo</h3>
               <p class="text-sm mb-0">
                  {{ isset($role) ? 'Modifica' : 'Crea' }} un ruolo 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            @if(isset($role))
               {{ Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) }}
            @else
               {{ Form::open(['route' => 'roles.store']) }}
            @endif
           
               <!-- Card body -->
               <div class="card-body">
                  <!-- Form groups used in grid -->
                  <div class="row">
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="name">Nome </label>
                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nome" type="text" name="name" value="{{$role->name ?? ''}}" required autofocus>
                           @if ($errors->has('name'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div> 
                      
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('permissions') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="permissions">Permessi </label>
                           <select multiple="multiple" id="permissions" class="form-control" name="permissions[]"  required > 
                              @foreach($permissions as $permission)
                                <option value="{{$permission->id}}" @if(isset($role) && in_array($permission->id,$role->permissions->pluck("id")->all())) selected @endif> {{$permission->name}} </option>
                              @endforeach
                           </select>
                           @if ($errors->has('permissions'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('permissions') }}</strong>
                           </span>
                           @endif
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
<link href="{{ config('app.asset_url')}}/css/select2.min.css" rel="stylesheet" />
<script src="{{ config('app.asset_url')}}/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#permissions').select2();
});
</script>
@endsection