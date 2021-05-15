@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
   <div class="container-fluid">
       <div class="header-body">
          <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Creazione Utente'])
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
               <h3 class="mb-0">{{ isset($user) ? 'Modifica' : 'Creazione' }} utente</h3>
               <p class="text-sm mb-0">
                  {{ isset($user) ? 'Modifica' : 'Crea' }} un utente 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            @if(isset($user))
               {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) }}
            @else
               {{ Form::open(['route' => 'users.store']) }}
            @endif
           
               <!-- Card body -->
               <div class="card-body">
                  <!-- Form groups used in grid -->
                  <div class="row">
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="name">Nome </label>
                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nome" type="text" name="name" value="{{$user->name ?? ''}}" required autofocus>
                           @if ($errors->has('name'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="email">Email </label>
                           <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" @if(isset($user)) readonly @endif id="email" placeholder="Email" type="email" name="email" value="{{$user->email ?? ''}}" required >
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('roles') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="roles">Ruolo </label>
                           <select id="roles" class="form-control" name="roles" value="{{ old('roles') }}" required > 
                              @foreach($roles as $role)
                                <option value="{{$role}}" @if(isset($user) && $user->getRoleNames()->first() == $role) selected @endif> {{$role}} </option>
                              @endforeach
                           </select>
                           @if ($errors->has('roles'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('roles') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="password"> {{ isset($user) ? 'Nuova' : '' }} Password </label>
                           <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password" type="password" name="password"   >
                           @if ($errors->has('password'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                           @if(isset($user))
                           <small>Inserendo una nuova password verrà sostituita la vecchia </small>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('confirm-password') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="confirm-password">{{ isset($user) ? 'Conferma nuova' : '' }} Password </label>
                           <input class="form-control{{ $errors->has('confirm-password') ? ' is-invalid' : '' }}" id="confirm-password" placeholder="Conferma password" type="password" name="confirm-password"  >
                           @if ($errors->has('confirm-password'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('confirm-password') }}</strong>
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