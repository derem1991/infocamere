@extends('layouts.app')
@section('content')
@include('layouts.headers.navigation',['title'=>'Utenti','breadcrumb'=> $breadcrumb ?? null,'routeCreate' => 'users.create'])
<div class="container-fluid mt--6">
   <div class="row">
      <div class="col">
         <div class="card">
            <!-- Card header -->
            <div class="card-header">
               <h3 class="mb-0">Creazione utente</h3>
               <p class="text-sm mb-0">
                  Crea un utente 
               </p>
            </div>
         </div>
         <div class="card mb-4">
            <form role="form" method="POST" action="{{ route('users.store') }}">
               @csrf
               <!-- Card body -->
               <div class="card-body">
                  <!-- Form groups used in grid -->
                  <div class="row">
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="name">Nome </label>
                           <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" placeholder="Nome" type="text" name="name" value="{{ old('$user->name') }}" required autofocus>
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
                           <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required >
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="email">Ruolo </label>
                           <select id="roles" class="form-control" name="roles" value="{{ old('roles') }}" required > 
                              @foreach($roles as $role)
                                <option value="{{$role}}" > {{$role}} </option>
                              @endforeach
                           </select>
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="password">Password </label>
                           <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password" type="password" name="password" value="{{ old('password') }}" required >
                           @if ($errors->has('password'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group{{ $errors->has('confirm-password') ? ' has-danger' : '' }} mb-3">
                           <label class="form-control-label" for="confirm-password">Password </label>
                           <input class="form-control{{ $errors->has('confirm-password') ? ' is-invalid' : '' }}" id="confirm-password" placeholder="Conferma password" type="password" name="confirm-password" value="{{ old('confirm-password') }}" required >
                           @if ($errors->has('confirm-password'))
                           <span class="invalid-feedback" style="display: block;" role="alert">
                           <strong>{{ $errors->first('confirm-password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit">Salva</button>
         </form>
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
 
@endsection