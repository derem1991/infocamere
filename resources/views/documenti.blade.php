@extends('layouts.app')
@section('content') 
<div class="header bg-primary pb-6">
   <div class="container-fluid">
      <div class="header-body">
         <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Documenti','breadcrumb'=> $breadcrumb ?? null])
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
               <h3 class="mb-0">Documenti</h3>
               <p class="text-sm mb-0">
                  Lista di esempio di chiamate con relativi documenti
               </p>
            </div>
            <div id="accordion">
               <div class="card">
                  <div class="card-header oddcard" id="headingOne">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Visura ordinaria  <b style="color:green;">Implementato nell'ordine</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseOne" class="collapse   oddcard" aria-labelledby="headingOne" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Visura ordinaria </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il primo metodo si scarica l'xml relativo alla visura ordinaria ed eventualmente si può creare un pdf custom sul xml ottenuto</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il secondo metodo si ottiene il pdf creato direttamente dal portale</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Le stesse visure possono essere scaricate nel formato PDF o XML conoscendo Numero rea e CCIAA ( chiamata: /rest/registroimprese/output/impresa/visura/storica/nrea/pdf | /rest/registroimprese/output/impresa/visura/storica/nrea/xml)</p>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">visura ordinaria impresa   </h5>
                                    <small class="d-block">(INPUT: RSSRRT66P24H501H ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura ordinaria impresa ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariaimpresaindividuale.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura ordinaria impresa ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariaimpresaindividuale.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12" style="border:1px solid black;">
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">visura ordinaria societa capitali   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura ordinaria societa capitali ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariasocietacapitali.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">  /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura ordinaria societa capitali ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariasocietacapitali.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"><span class="text-info">●</span>/rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">visura ordinaria società di persone  </h5>
                                    <small class="d-block"> (INPUT: 03514840101 ) </small>
                                    <small  class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura ordinaria società di persone ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariasocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">  /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura ordinaria società di persone ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariasocietapersone.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">  /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header" id="headingTwo">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Visura storica  <b style="color:green;">Implementato nell'ordine</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                     <div class="card-body">
                        <hr class="w-100 my-2">
                        <h3 class="d-block px-4 pt-4">Visura storica </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il primo metodo si scarica l'xml relativo alla visura storica ed eventualmente si può creare un pdf custom sul xml ottenuto</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il secondo metodo si ottiene il pdf creato direttamente dal portale</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Le stesse visure possono essere scaricate nel formato PDF o XML conoscendo Numero rea e CCIAA ( chiamata: /rest/registroimprese/output/impresa/visura/storica/nrea/pdf | /rest/registroimprese/output/impresa/visura/storica/nrea/xml)</p>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">visura storica impresa   </h5>
                                    <small class="d-block">(INPUT: RSSRRT66P24H501H ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura storica impresa ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricaimpresaindividuale.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura storica impresa ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricaimpresaindividuale.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12" style="border:1px solid black;">
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">visura storica societa capitali   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura storica societa capitali ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricasocietacapitali.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">  /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura storica societa capitali ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricasocietacapitali.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"><span class="text-info">●</span>/rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">visura storica società di persone  </h5>
                                    <small class="d-block"> (INPUT: 03514840101 ) </small>
                                    <small  class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura storica società di persone ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricasocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">  /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">visura storica società di persone ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricasocietapersone.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">  /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
					  
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="card">
                  <div class="card-header  " id="headingEight">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                        Partecipazioni <b style="color:green;">Implementato nell'ordine</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseEight" class="collapse " aria-labelledby="headingEight" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Partecipazione attuale e storica (PAR e PAS)</h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il primo metodo si scarica l'xml relativo alla partecipazione ed eventualmente si può creare un pdf custom sul xml ottenuto</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il secondo metodo si ottiene il pdf creato direttamente dal portale</p>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Partecipazione attuale PAR </h5>
                                    <small class="d-block">(INPUT: 02624130601 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Partecipazione attuale PAR ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/partecipazioni.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/assettiproprietari/partecipazioni/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Partecipazione attuale PAR (risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/partecipazioni.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/assettiproprietari/partecipazioni/codicefiscale/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Partecipazione storica PAS</h5>
                                    <small class="d-block"> (INPUT: 02624130601 ) </small>
                                    <small  class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Partecipazione storica PAS ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/partecipazionistoriche.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/assettiproprietari/partecipazioni/storica/codicefiscale/xml </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Partecipazione storica PAS ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/partecipazionistoriche.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/assettiproprietari/partecipazioni/storica/codicefiscale/pdf  (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>


               <div class="card">
                  <div class="card-header oddcard" id="headingThree">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Fascicolo attuale e storico
                        </button>
                     </h5>
                  </div>
                  <div id="collapseThree" class="collapse oddcard" aria-labelledby="headingThree" data-parent="#accordion">
                     <div class="card-body">
                        <hr class="w-100 my-2">
                        <h3 class="d-block px-4 pt-4">Fascicolo attuale e storico </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">
                           DA MANUALE INFOCAMERE: Per comporre il fascicolo, attuale o storico, occorre fare 3 richieste distinte: <br>
                           1 - richiesta fascicolo ordinario o storico, nel formato voluto, impostando rispettivamente il tipo documento
                           <b>FATTU</b> o <b>FSTOR </b> <br>
                           <b>N.B.Si puo richiedere tramite nrea.. se non presente bisogna effettuare una chiamata in piu per avere il dato</b><br> 
                           2 – richiesta di statuto con il servizio <b>output/statuto/documento/nrea</b>, specificando cciaa-nrea della
                           posizione e l‟identificativo ottenuto in risposta alla richiesta 1  <br>
                           3 – per le società di capitale, richiesta di bilancio con uno a scelta dei servizi disponibili,
                           <b>output/bilancio/documento/nrea </b>o <b>output/bilancio/documento/nrea/xbrl/xml </b>o
                           <b>output/bilancio/documento/nrea/xbrl/xml/csv</b> o <b>output/bilanci/unico/nrea</b>, specificando cciaa-nrea della
                           posizione e l‟identificativo ottenuto in risposta alla richiesta 1
                        </p> 
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-12 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fascicolo attuale  </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 1 </h4>
                                             <h5 class="mb-1 d-block">1) preso numero REA fascicolo attuale  ( risultato XML) </h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicoloattuale.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">3) richiesta di bilancio  ( risultato PDF) </h5>
                                             <small class="d-block">  output/bilancio/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 5 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/xml</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 2 </h4>
                                             <h5 class="mb-1 d-block">1) preso numero REA fascicolo attuale   ( risultato PDF)</h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicoloattuale.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 6 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/pdf</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-12 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fascicolo storico  </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 1 </h4>
                                             <h5 class="mb-1 d-block">1) preso numero REA fascicolo storico  ( risultato XML) </h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicolostorico.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">3) richiesta di bilancio  ( risultato PDF) </h5>
                                             <small class="d-block">  output/bilancio/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 5 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/xml </h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 2 </h4>
                                             <h5 class="mb-1 d-block">1) preso numero REA fascicolo storico ( risultato PDF)</h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicolostorico.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 6 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> 
               <div class="card">
                  <div class="card-header  " id="headingThreesss">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThreesss" aria-expanded="false" aria-controls="collapseThreesss">
                        Fascicolo attuale e storico societa di capitali
                        </button>
                     </h5>
                  </div>
                  <div id="collapseThreesss" class="collapse  " aria-labelledby="headingThreesss" data-parent="#accordion">
                     <div class="card-body">
                        <hr class="w-100 my-2">
                        <h3 class="d-block px-4 pt-4">Fascicolo attuale e storico societa di capitali </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">
                           DA MANUALE INFOCAMERE: Per comporre il fascicolo, attuale o storico, occorre fare 3 richieste distinte: <br>
                           1 - richiesta fascicolo ordinario o storico, nel formato voluto, impostando rispettivamente il tipo documento
                           <b>FATTU</b> o <b>FSTOR </b> <br>
                           <b>N.B.Si puo richiedere tramite nrea.. se non presente bisogna effettuare una chiamata in piu per avere il dato</b><br> 
                           2 – richiesta di statuto con il servizio <b>output/statuto/documento/nrea</b>, specificando cciaa-nrea della
                           posizione e l‟identificativo ottenuto in risposta alla richiesta 1  <br>
                           3 – per le società di capitale, richiesta di bilancio con uno a scelta dei servizi disponibili,
                           <b>output/bilancio/documento/nrea </b>o <b>output/bilancio/documento/nrea/xbrl/xml </b>o
                           <b>output/bilancio/documento/nrea/xbrl/xml/csv</b> o <b>output/bilanci/unico/nrea</b>, specificando cciaa-nrea della
                           posizione e l‟identificativo ottenuto in risposta alla richiesta 1
                        </p> 
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-12 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fascicolo attuale  societa di capitali</h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 1 </h4>
                                             <h5 class="mb-1 d-block">1)  fascicolo attuale  ( risultato XML) </h5>
                                             <small class="d-block"> se non abbiamo dati nrea bisogna fare prima una ricerca anagrafica per avere il dato </small>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicoloattuale.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">3) richiesta di bilancio  ( risultato PDF) </h5>
                                             <small class="d-block">  output/bilancio/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 5 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/xml</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 2 </h4>
                                             <h5 class="mb-1 d-block">1)  fascicolo attuale  ( risultato PDF) </h5>
                                             <small class="d-block"> se non abbiamo dati nrea bisogna fare prima una ricerca anagrafica per avere il dato </small>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicoloattuale.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 6 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/pdf</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-12 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fascicolo storico  societa di capitali</h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 1 </h4>
                                             <h5 class="mb-1 d-block">1)   fascicolo storico  ( risultato XML) </h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicolostorico.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">3) richiesta di bilancio  ( risultato PDF) </h5>
                                             <small class="d-block">  output/bilancio/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 5 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/xml </h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 2 </h4>
                                             <h5 class="mb-1 d-block">1) fascicolo storico ( risultato PDF)</h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicolostorico.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutoordinaria.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <p class="d-block mb-0">3 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                             <small>Documento 2 - Scarica PDF</small> 
                                             </a>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                             <small> Documento 3 - Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 6 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> 
               <div class="card">
                  <div class="card-header oddcard" id="headingFoursssss">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFoursssss" aria-expanded="false" aria-controls="collapseFoursssss">
                        Fascicolo attuale e storico societa di persone
                        </button>
                     </h5>
                  </div>
                  <div id="collapseFoursssss" class="collapse oddcard" aria-labelledby="headingFoursssss" data-parent="#accordion">
                     <div class="card-body">
                        <hr class="w-100 my-2">
                        <h3 class="d-block px-4 pt-4">Fascicolo attuale e storico societa di cappersoneitali </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">
                           DA MANUALE INFOCAMERE: Per comporre il fascicolo, attuale o storico, occorre fare 3 richieste distinte: <br>
                           1 - richiesta fascicolo ordinario o storico, nel formato voluto, impostando rispettivamente il tipo documento
                           <b>FATTU</b> o <b>FSTOR </b> <br>
                           <b>N.B.Si puo richiedere tramite nrea.. se non presente bisogna effettuare una chiamata in piu per avere il dato</b><br> 
                           2 – richiesta di statuto con il servizio <b>output/statuto/documento/nrea</b>, specificando cciaa-nrea della
                           posizione e l‟identificativo ottenuto in risposta alla richiesta 1  <br>
                           3 – per le società di capitale, richiesta di bilancio con uno a scelta dei servizi disponibili,
                           <b>output/bilancio/documento/nrea </b>o <b>output/bilancio/documento/nrea/xbrl/xml </b>o
                           <b>output/bilancio/documento/nrea/xbrl/xml/csv</b> o <b>output/bilanci/unico/nrea</b>, specificando cciaa-nrea della
                           posizione e l‟identificativo ottenuto in risposta alla richiesta 1
                        </p> 
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-12 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fascicolo attuale  societa di persone</h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 1 </h4>
                                             <h5 class="mb-1 d-block">1)  fascicolo attuale  ( risultato XML) </h5>
                                             <small class="d-block"> se non abbiamo dati nrea bisogna fare prima una ricerca anagrafica per avere il dato </small>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicoloattualesocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato PDF) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutosocietapersone.xml" target="_blank"> 
                                                <small> Scarica XML - 0 RISULTATI</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">3) richiesta di bilancio  ( risultato PDF) </h5>
                                             <small class="d-block">  output/bilancio/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <p class="d-block mb-0">0 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/bilancisocietapersone.xml" target="_blank"> 
                                             <small>RISPOSTA XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 5 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/xml</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 2 </h4>
                                             <h5 class="mb-1 d-block">1)  fascicolo attuale  ( risultato PDF) </h5>
                                             <small class="d-block"> se non abbiamo dati nrea bisogna fare prima una ricerca anagrafica per avere il dato </small>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicoloattualesocietapersone.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato XML) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutosocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML - 0 RISULTATI</small> 
                                             </a>
                                             <p class="d-block mb-0">0 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/bilancisocietapersone.xml" target="_blank"> 
                                             <small>RISPOSTA XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 6 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/pdf</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-12 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fascicolo storico  societa di persone</h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 1 </h4>
                                             <h5 class="mb-1 d-block">1)  fascicolo storico  ( risultato XML) </h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicolostoricosocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato XML) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutosocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML - 0 RISULTATI</small> 
                                             </a>
                                             <p class="d-block mb-0">0 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/bilancisocietapersone.xml" target="_blank"> 
                                             <small>RISPOSTA XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 5 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/xml </h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h4>METODO 2 </h4>
                                             <h5 class="mb-1 d-block">1) fascicolo storico ( risultato PDF)</h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/nrea/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/fascicolostoricosocietapersone.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">2) richiesta di statuto attraverso nrea ( risultato XML) </h5>
                                             <small class="d-block"> output/statuto/documento/nrea </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/statutosocietapersone.xml" target="_blank"> 
                                             <small> Scarica XML - 0 RISULTATI</small> 
                                             </a>
                                             <p class="d-block mb-0">0 documenti ottenuti </p>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/bilancisocietapersone.xml" target="_blank"> 
                                             <small>RISPOSTA XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">Riepologo 6 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/nrea/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                          <h4 class="mt-0 mb-1"> output/statuto/documento/nrea</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                          <h4 class="mt-0 mb-1"> output/bilancio/documento/nrea </h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)  </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> 
               <div class="card">
                  <div class="card-header  " id="headingFour">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        Bilanci
                        </button>
                     </h5>
                  </div>
                  <div id="collapseFour" class="collapse    " aria-labelledby="headingFour" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4"> Bilanci </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con i bilanci si possono scaricare 4 tipi di documenti: lista bilanci, lista sezioni bilancio , documenti del bilancio e documenti del bilancio unico,ovviamente si potrebbero unire per avere documentazioni dettagliate</p>
                          <div class="col-12  p-2 m-0 row">
                           <div class="col-md-4 col-12 my-2">
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">lista bilanci</h5>
                                    <small class="d-block"> (INPUT: 03257950364 ) </small>
                                    <small  class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Lista dei bilanci ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/listabilanci.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/bilanci/ricerca/codicefiscale</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2">
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">lista sezioni bilancio</h5>
                                    <small class="d-block"> (INPUT: kdocfisico 396108052 relativo ad un bilancio ) </small>
                                    <small class="d-block"> La ricerca può essere fatta anche per numero rea prendendo se non specificato l'anno l'ultimo bilancio disponibile</small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">lista sezioni bilancio ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/listasezionibilancio.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/bilanci/sezioni/ricerca/chiave</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12" style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">documenti bilanci</h5>
                                    <small class="d-block"> (INPUT: kdocfisico 396108052 relativo ad un bilancio )  </small>
                                    <small  class="d-block">la stessa ricerca può essere fatta per nrea prendendo sempre l'ultimo bilancio disponibile</small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">

                                           <h4 class="h4 mb-0">documenti bilanci</h4>
                                          <a class="d-inline" href="{{ config('app.asset_url')}}/document/richiestadibilancio1.pdf" target="_blank"> 
                                             <small> Documento 1 - Scarica PDF</small> 
                                         </a>
                                         <a class="d-inline" href="{{ config('app.asset_url')}}/document/richiestadibilancio2.pdf" target="_blank"> 
                                          <small> Documento 2 - Scarica PDF</small> 
                                          </a>
                                          <a class="d-inline" href="{{ config('app.asset_url')}}/document/richiestadibilancio3.pdf" target="_blank"> 
                                                <small> Documento 3 - Scarica PDF</small> 
                                          </a>
                                         <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">/rest/registroimprese/bilanci/documento/chiave</h4>
                                          <h4 class="mt-0 mb-1">/rest/storage/download (download pdf)</h4>
 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">documenti   bilancio unico</h5>
                                    <small class="d-block"> (INPUT: kdocfisico 396108052 relativo ad un bilancio ) </small>
                                    <small class="d-block">Si ottiene il bilancio corrispondente alla chiave richiesta, in formato documento con copertina analogo all'output Telemaco e, se disponibili e richiesti con i relativi parametri, puo essere richiesto anche attraverso codice fiscale specificando anno di emissione del bilancio(se non specificato si prende l'ultimo anno disponibile)</small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">documenti   bilancio unico ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/bilanciounico.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/bilanci/documento/unico/chiavedocfis</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)      </h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>


                        </div>
                     </div>
                  </div>
               </div>
                
               <div class="card">
                  <div class="card-header oddcard" id="headingFive">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                        Protesti
                        </button>
                     </h5>
                  </div>
                  <div id="collapseFive" class="collapse   oddcard" aria-labelledby="headingFive" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Protesti </h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il primo metodo si scarica l'xml relativo al protesto ed eventualmente si può creare un pdf custom sul xml ottenuto</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il secondo metodo si ottiene il pdf creato direttamente dal portale</p>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Protesti   </h5>
                                    <small class="d-block">(INPUT: BNCRCC68E23G838A ) </small>
                                    <small class="d-block">se non si ha un identificativo preciso si può ricercare anche per denominativo ( il campo da ottenere è kanagrafica) </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Anagrafica(risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/anagraficadenominazione.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">visura effetti attraverso kanagrafica 131791711 (RISULTATO XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraeffettiprotesti.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroprotesti/protesti/ricerca/nazionale</h4>
                                          <h4 class="mt-0 mb-1"> /rest/registroprotesti/protesti/visura/effetto/anagrafica/xml</h4>

                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Anagrafica(risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/anagraficadenominazione.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">visura effetti attraverso kanagrafica 131791711 (RISULTATO PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraeffettiprotesti.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">3 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroprotesti/protesti/ricerca/nazionale</h4>
                                          <h4 class="mt-0 mb-1"> /rest/registroprotesti/protesti/visura/effetto/anagrafica/pdf (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                         
                            
                        </div>
                     </div>
                  </div>
               </div> 


               <div class="card">
                  <div class="card-header  " id="headingSix">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                        Anagrafica sedi <b style="color:green;">Implementato nell'ordine</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseSix" class="collapse " aria-labelledby="headingSix" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Anagrafica sedi </h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Anagrafica sedi   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                                    <small class="d-block">se non si ha un identificativo preciso si può ricercare anche per denominativo   </small>
                                    <small class="d-block">La chiamata da effettuare è una, tranne ovviamente se non si ricerca per denominazione, dove bisogna fare una chiamata in piu.<br>
                                    Una volta trovato il CF o PIVA, si puo richiedere l'anagrafica completa dell'azienda o solo delle sedi portando allo stesso risultato.</small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Anagrafica sedi (risultato XML)</h5>
                                             <small class="d-block">rest/registroimprese/imprese/ricerca/codicefiscale?codiceFiscale=03257950364 </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/anagraficaimpresa.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Anagrafica sedi completa(risultato XML)</h5>
                                             <small class="d-block">rest/registroimprese/imprese/ricerca/codicefiscale?codiceFiscale=03257950364&fSoloSedi=S  </small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/anagraficasedi.xml" target="_blank"> 
                                                <small> Scarica XML</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">rest/registroimprese/imprese/ricerca/codicefiscale?codiceFiscale=03257950364</h4>
                                       </div>
                                    </div>
                                     
                                 </div>
                              </div>
                           </div>
                         
                            
                        </div>
                     </div>
                  </div>
               </div> 
 
               <div class="card">
                  <div class="card-header  oddcard" id="headingSeven">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                           Fallimenti e procedure concorsuali
                        </button>
                     </h5>
                  </div>
                  <div id="collapseSeven" class="collapse oddcard" aria-labelledby="headingSeven" data-parent="#accordion">
                     <div class="card-body">
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card pt-0 col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Fallimenti e procedure concorsuali  </h5>
                                    <small class="d-block">(INPUT: 01807670847 ) </small>
                                    <small class="d-block">si può anche effettuare la ricerca per NREA </small>
                                    <small class="d-block">Restituisce il blocco PCO - Scioglimento, Procedure Concorsuali e Cancellazione - per le imprese presenti nel R.I. indipendentemente dalla classe di natura giuridica. L'informazione non è disponibile per le posizioni di fonte Registro Ditte</small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Fallimenti e procedure concorsuali (risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/procedure.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">/rest/registroimprese/procedureincorso/blocco/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                     
                                 </div>
                              </div>
                           </div>
                         
                            
                        </div>
                     </div>
                  </div>
               </div>

 

               <div class="card">
                  <div class="card-header oddcard " id="headingNine">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                        Cariche attuali o cessate e profilo completo  <b style="color:green;">Implementato nell'ordine</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseNine" class="collapse oddcard" aria-labelledby="headingNine" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Cariche attuali o cessate  profilo completo</h3>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il primo metodo si scarica l'xml relativo alle cariche ed eventualmente si può creare un pdf custom sul xml ottenuto</p>
                        <p class="d-block text-sm px-4 pb-0 mb-0 ">Con il secondo metodo si ottiene il pdf creato direttamente dal portale</p>
                        <div class="col-12  p-2 m-0 row">
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Cariche attuali </h5>
                                    <small class="d-block">(INPUT: BNCRCC68E23G838A ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Cariche attuali ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/caricheattuali.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">rest/registroimprese/persone/scheda/codicefiscale/xml?codiceFiscale=BNCRCC68E23G838A&statoCarica=A </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Non è possibile scaricare le cariche attuali attraverso il pdf</h5>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Cariche cessate </h5>
                                    <small class="d-block">(INPUT: BNCRCC68E23G838A ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Cariche cessate ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/carichecessate.xml" target="_blank"> 
                                                <small> Scarica XML</small> 
                                             </a>
                                             <small>Il codice fiscale inserito non ha cariche cessate</small> 
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">rest/registroimprese/persone/scheda/codicefiscale/xml?codiceFiscale=BNCRCC68E23G838A&statoCarica=C </h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Non è possibile scaricare le cariche cessate attraverso il pdf</h5>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Cariche cessate e attuali</h5>
                                    <small class="d-block"> (INPUT: BNCRCC68E23G838A ) </small>
                                    <small  class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Cariche( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/cariche.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">/rest/registroimprese/persone/scheda/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div   class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Cariche ( risultato PDF)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/cariche.pdf" target="_blank"> 
                                             <small> Scarica PDF</small> 
                                             </a>
                                             <small>Il codice fiscale inserito non ha cariche cessate</small> 
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamate effettuate</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/persone/scheda/codicefiscale/pdf  (richiesta in differita)</h4>
                                          <h4 class="mt-0 mb-1"> /rest/storage/download (download pdf)</h4>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4 col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Profilo completo</h5>
                                    <small class="d-block">(INPUT: BNCRCC68E23G838A ) </small>
                                    <small class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Profilo completo ( risultato XML)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/schedapersona.xml" target="_blank"> 
                                             <small> Scarica XML</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">/rest/registroimprese/persone/scheda/codicefiscale/xml</h4>
                                       </div>
                                    </div>
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Profilo completo ( risultato pdf)</h5>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/schedapersona.pdf" target="_blank"> 
                                             <small> Scarica pdf</small> 
                                             </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">2 Chiamata effettuata</h5>
                                          </div>
                                          <h4 class="mt-0 mb-1">/rest/registroimprese/persone/scheda/codicefiscale/pdf</h4>
                                          <h4 class="mt-0 mb-1">/rest/storage/download</h4>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>




                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header " id="headingTen">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                        Visure Artigiani <b style="color:green;">Si prendono dalle visure ordinarie o storiche</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseTen" class="collapse" aria-labelledby="headingNine" data-parent="#accordion">
                     <div class="card-body">
                        Risposta AREA TECNICA INFOCAMERE:  <i>"è un output richiedibile dalle sole utenze abilitate ad effettuare pratiche; contiene un output formattato come un output testuale ed ha un contenuto informativo minore e graficamente "antico" rispetto alla visura ordinaria;" </i>                         
                        <br><b>Quindi probabilmente bisogna utilizzare le visure ordinarie classiche e nessuna visura specifica per gli artigiani</b>
                     </div>
		            </div>
	            </div>
               <div class="card">
                  <div class="card-header oddcard" id="headingEleven">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                        Contratto di rete  <b style="color:red;">NON DISPONIBILE</b>
                        </button>
                     </h5>
                  </div>
                  <div id="collapseEleven" class="collapse oddcard" aria-labelledby="headingNine" data-parent="#accordion">
                     <div class="card-body">
			<div class="alert-danger col-12">
				Restituisce errore con il codice fiscale <DescrizioneErrore><![CDATA[INDISPONIBILITA' TEMPORANEA]]></DescrizioneErrore>-
				Potreste fornirci un esempio di PIVA e chiamata. Grazie.
			</div>
		     </div>

		  </div>
	       </div>


            </div>
         </div>
      </div>
   </div>
   @include('layouts.footers.auth')
</div>
@endsection
@section('scriptjs')

<style>
 .oddcard 
  {
    background-color:rgba(0,0,0,.1)!important;
  }
   
</style>
@endsection
