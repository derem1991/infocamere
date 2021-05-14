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
                        Visura ordinaria
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
                        Visura storica
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
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Visura storica delle modifiche </h5>
                                    <small class="d-block"> (INPUT: 03514840101 ) </small>
                                    <small  class="d-block">l'input puo essere solo CF o PIVA di 11 0 16 caratteri </small>
                                 </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item   flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">La Visura storica delle modifiche può essere recuperata dal pdf o dall'xml delle rispettive visure storiche. Da verificare se si può recuperare solo questo blocco</h5>
                                          </div>
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
                           1 - richiesta visura ordinaria o storica, nel formato voluto, impostando rispettivamente il tipo documento
                           <b>FATTU</b> o <b>FSTOR </b> <br>
                           N.B. FATTU O FSTOR sembra non piu  chiamabili dalle API (chiamate rispettive visure)<br>
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
                                             <h5 class="mb-1 d-block">1) preso numero REA visura ordinaria impresa ( risultato XML) </h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/codicefiscale/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariasocietacapitali.xml" target="_blank"> 
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
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
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
                                             <h5 class="mb-1 d-block">1) preso numero REA visura ordinaria impresa ( risultato PDF)</h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinariasocietacapitali.pdf" target="_blank"> 
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
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
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
                                             <h5 class="mb-1 d-block">1) preso numero REA visura storica impresa ( risultato XML) </h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/codicefiscale/xml </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricasocietacapitali.xml" target="_blank"> 
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
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
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
                                             <h5 class="mb-1 d-block">1) preso numero REA visura storica impresa ( risultato PDF)</h5>
                                             <small class="d-block"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf </small>
                                             <small class="d-block"> /rest/storage/download (download pdf) </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/visurastoricasocietacapitali.pdf" target="_blank"> 
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
                                          <h4 class="mt-0 mb-1"> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
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