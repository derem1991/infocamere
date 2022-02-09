<div class="col-12 p-0 m-0">
    @if(isset($_POST['param']['documents']) && !empty($_POST['param']['documents']))
        @if(isset($_POST['param']['item']['id']))
        {{ Form::model($_POST['param']['item'], ['route' => ['documentsHasWallet.update',$_POST['param']['item']['id']], 'method' => 'PUT']) }}
        @else
        {{ Form::open(['route' => 'documentsHasWallet.store']) }}
        @endif
     
        <input type="hidden" name="wallet_id" value="{{$_POST['wallet']}}" >
        <div class="col-12 p-0 m-0 row">
            <div class="col-12 p-0">
                <div class="form-group{{ $errors->has('document_id') ? ' has-danger' : '' }} mb-3">
                   <label class="form-control-label" for="document_id">Documento </label>
                   <select id="document_id" class="form-control" name="document_id"  required > 
                      @foreach($_POST['param']['documents'] as $document)
                        <option @if(isset($_POST['param']['item']['document_id']) && $_POST['param']['item']['document_id'] == $document['id']) selected @endif
                        value="{{$document['id']}}"> {{$document['name']}} </option>
                      @endforeach
                   </select>
                   @if ($errors->has('document_id'))
                   <span class="invalid-feedback" style="display: block;" role="alert">
                   <strong>{{ $errors->first('document_id') }}</strong>
                   </span>
                   @endif
                </div>
            </div>
            <div class="col-12 p-0 mb-4">
            <div class="custom-control custom-control-alternative custom-checkbox">
                <input @if(isset($_POST['param']['item']['active']) && $_POST['param']['item']['active']) checked @endif class="custom-control-input" value="1" name="active" id="active" type="checkbox">
                <label class="custom-control-label" for="active">
                <span>Attivo</span>
                </label>
            </div>
            <small class="d-block">Attivare questo prezzo di vendita</small>
            <small class="d-block"><b>N.B. E' importante che sia attivo anche il documento per poterlo utilizzare nelle richieste</b></small>
            </div>
            <div class="col-12 col-md-6 p-0 pr-md-4">
                <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }} mb-3">
                <label class="form-control-label" for="cost">Costo 
                </label>
                <input value="{{$_POST['param']['item']['cost'] ?? 0}}" class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" min="0" step="0.01" id="cost" placeholder="Costo" type="number" name="cost"  required>
                @if ($errors->has('cost'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('cost') }}</strong>
                </span>
                @endif
                    <small>Specificare il costo della chiamata</small>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0">
                <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }} mb-3">
                <label class="form-control-label" for="price">Prezzo di vendita 
                </label>
                <input value="{{$_POST['param']['item']['price'] ?? 0}}" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" min="0" step="0.01" id="price" placeholder="Prezzo di vendita" type="number" name="price"  required>
                @if ($errors->has('price'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
                    <small>Specificare il prezzo di vendita</small>
                </div>
            </div>
        </div>
        <hr class="w-100 my-3">
        <div class="modfooter col-12 p-0 m-0 row">
            <div class="col-3 offset-6">
                <button aria-label="Close" type="button" data-dismiss="modal" class="w-100 btn btn-danger">
                    <i class="fa fa-window-close"></i>  Chiudi  
                </button>  
            </div>
            <div class="col-3">
                <button type="submit" class="w-100 btn btn-success">
                    <i class="fa fa-check white"></i> Salva
                </button>   
            </div>    
        </div>
        {{Form::close()}}
    @else
    <p>Non è presente nessun documento. Creane uno prima di poter aggiungerlo ad un wallet </p>
    @endif
</div>