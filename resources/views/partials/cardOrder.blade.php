<div class="cardorder step_{{$step}} py-4 my-4">
   <div class="col-12 m-0 row">
      <div class="col-4 boximg">
      </div>
      <div class="col-8">
         <div class="col-12 p-0">
            @if(isset($documents) && $step == 1)
            <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }} mb-3">
               <label class="form-control-label" for="document">Documento </label>
               <select id="document" onchange="changeDoc()" class="form-control" name="document"  required > 
                  <option value=""> Seleziona documento </option>
                  @foreach($documents as $document)
                    <option data-piva="{{$document['is_piva'] ?? 0}}" data-cfiscale="{{$document['is_cfiscale'] ?? 0}}" data-price="{{$document['price']}}" data-cost="{{$document['cost']}}" data-description="{{$document['description']}}" value="{{$document['id']}}"> 
                     {{$document['name']}}: € {{$document['price']}} </option>
                  @endforeach
               </select>
               @if ($errors->has('document'))
               <span class="invalid-feedback" style="display: block;" role="alert">
               <strong>{{ $errors->first('document') }}</strong>
               </span>
               @endif
            </div>
            <p id="descriptionDoc"></p>
            @elseif($step == 2)

            <div class="form-group{{ $errors->has('text') ? ' has-danger' : '' }} mb-3">
               <label class="form-control-label" for="text">Codice fiscale o Partita Iva </label>
               <input value="{{$_GET['input'] ?? ''}}" onkeyup="this.value = this.value.toUpperCase().replace(/ /g, '');" class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}" id="text" placeholder="Inserire testo" type="text" name="text"  required  >
               @if ($errors->has('text'))
               <span class="invalid-feedback" style="display: block;" role="alert">
                  <strong>{{ $errors->first('text') }}</strong>
               </span>
               @endif
               <small id="smallhelp">Inserire una stringa di 11 o 16 caratteri</small>
               @if(!isset($_GET['input']) || empty($_GET['input']))
               <small class="d-block font-weight-bold">Inserendo il dato "autonomamente", senza nessun controllo nell'anagrafica di infocamera, il documento sarà generato con il dato inserito.</small>
               <hr class="w-100 my-1 ">
               <div class="col-12 p-0 m-0">
                 <p>Non sei sicuro del codice fiscale o partita iva inserito? Effettua una "ricerca Per denominazione" 
                    al costo di € <b>{{Auth::user()->wallet->price_research}}</b>
                 </p>
                 <div class="col-12 p-0">
                  <a class="w-100 btn btn-info col-4" type="button" href="{{route('researchs.create')}}">
                    Effettua ricerca 
                  </a>  
                 </div>
               </div>
               @endif
            </div>
            @else
            <div class="col-12 p-0 m-0">
               <p class="mb-0">La ringraziamo per l'ordine effettuato</p> 
               <p>Entro poche ore riceverà una email con il contenuto da lei richiesto </p>
            </div>
            @endif
        </div>
      </div>
      <hr class="w-100 my-3">
      <div class="modfooter col-12 p-0 m-0 row">
          @if($step == 3)
          <div class="col-3 offset-6">
              <a class="w-100 btn btn-danger" type="button" href="{{route('orders.create')}}">
                Crea nuovo ordine  
              </a>  
          </div>
          <div class="col-3">
              <a type="button" class="w-100 btn btn-success"  href="{{route('orders.index')}}">
                Visualizza ordini
              </a>   
          </div>    
          @else
          <div class="col-3 offset-6">
            @if($step != 1)
              <button class="w-100 btn btn-danger" type="button" onclick="prevStep()" id="previous">
                <i class="fas fa-arrow-left"></i> Indietro  
              </button>  
            @endif
          </div>
          <div class="col-3">
              <button type="button" class="w-100 btn btn-success" id="next" onclick="nextStep()">
                <i class="fas fa-arrow-right"></i> 
                @if($step == 1) Avanti @else Conferma ordine @endif
              </button>   
          </div>    
          @endif
      </div>
   </div>
</div>