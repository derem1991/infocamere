@extends('layouts.app')
@section('content')
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{ config('app.asset_url')}}/img/profile-cover.jpg); background-size: cover; background-position: center top;">
   <!-- Mask -->
   <span class="mask bg-gradient-default opacity-8"></span>
   <!-- Header container -->
   <div class="container-fluid d-flex align-items-center">
      <div class="row">
         <div class="col-12">
            <h1 class="display-2 text-white">Ciao {{$user->name ?? ''}}</h1>
            <p class="text-white mt-0 mb-5">Questa è la pagina del tuo profilo. Da qui puoi vedere il numero delle tue richieste, cambiare i dati personali e tanto altro</p>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid mt--7">
   <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
         <div class="card card-profile shadow">
            <div class="row justify-content-center">
               <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                     <a href="#">
                     <img src="{{ config('app.asset_url')}}/img/profile.png" class="rounded-circle">
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
               <div class="d-flex justify-content-between">
                  @can('order-create')
                  <a href="{{route('orders.create')}}" class="btn btn-sm btn-info mr-4">Nuova richiesta</a>
                  @endcan
                  <a href="#" class="btn btn-sm btn-default float-right">Attivo</a>
               </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
               <div class="row">
                  <div class="col">
                     <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                        <div>
                           <span class="heading">0</span>
                           <span class="description">Richieste</span>
                        </div>
                        <div>
                           <span class="heading">1 </span>
                           <span class="description">Richiesta in attesa</span>
                        </div>
                        <div>
                           <span class="heading">€ {{$user->budget ?? ''}}</span>
                           <span class="description">Disponibilità</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="text-center">
                  <h3>
                    {{$user->name ?? ''}}
                  </h3>
                  <div class="h5 font-weight-300">
                    {{$user->email ?? ''}}
                  </div>
                  <div class="h5 mt-4">
                     {{$user->wallet->name ?? ''}}
                  </div>
                
                  <hr class="my-4">
                  <p>Lorem ipsum .</p>
                </div>
            </div>
         </div>
      </div>
      <div class="col-xl-8 order-xl-1">
         <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
               <div class="row align-items-center">
                  <h3 class="mb-0">Modifica profilo</h3>
               </div>
            </div>
            <div class="card-body">
                {{ Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) }}
                  <h6 class="heading-small text-muted mb-4">Informazioni</h6>
                  <div class="pl-lg-4">
                     <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} focused mb-3">
                        <label class="form-control-label" for="name">Nome </label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-control-alternative" id="name" placeholder="Nome" type="text" name="name" value="{{$user->name ?? ''}}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                     </div>
                     <input type="hidden" value="1" name="userProfile" />
                     <div class="form-group focused">
                        <label class="form-control-label" for="input-email">Email</label>
                        <input type="email" name="email" readonly id="input-email" value="{{$user->email ?? ''}}" class="form-control form-control-alternative" placeholder="Email" value="admin@argon.com" required="">
                     </div>
                  </div>
               <hr class="my-4">
                  <h6 class="heading-small text-muted mb-0">Password</h6>
                  <small class="d-block mb-4">Se non viene inserita nessuna password verrà salvata l'ultima inserita</small>
                  <div class="pl-lg-4">
                     <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} mb-3">
                        <label class="form-control-label" for="password"> {{ isset($user) ? 'Nuova' : '' }} Password </label>
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-alternative" id="password" placeholder="Password" type="password" name="password"   >
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                     </div>
                     <div class="form-group{{ $errors->has('confirm-password') ? ' has-danger' : '' }} mb-3">
                        <label class="form-control-label" for="confirm-password">{{ isset($user) ? 'Conferma nuova' : '' }} Password </label>
                        <input class="form-control{{ $errors->has('confirm-password') ? ' is-invalid' : '' }} form-control-alternative" id="confirm-password" placeholder="Conferma password" type="password" name="confirm-password"  >
                        @if ($errors->has('confirm-password'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $errors->first('confirm-password') }}</strong>
                        </span>
                        @endif
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">Aggiorna profilo</button>
                     </div>
                  </div>
                {{ Form::close() }}
            </div>
         </div>
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')
@endsection