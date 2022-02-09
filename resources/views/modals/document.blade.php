<div class="col-12 p-0 m-0">
    @if(isset($wallet))
    {{ Form::model($wallet, ['route' => ['wallets.update', $wallet->id], 'method' => 'PUT']) }}
    @else
    {{ Form::open(['route' => 'wallets.store']) }}
    @endif
    <div class="col-12 p-0 ">
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
    {{ Form::close() }}
</div>