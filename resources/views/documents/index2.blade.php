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
                  <div class="card-header oddcard" id="headingThree">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Fascicolo attuale e storico societa di capitali
                        </button>
                     </h5>
                  </div>
                  <div id="collapseThree" class="collapse oddcard" aria-labelledby="headingThree" data-parent="#accordion">
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
                  <div class="card-header" id="headingFour">
                     <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Fascicolo attuale e storico societa di persone
                        </button>
                     </h5>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
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
