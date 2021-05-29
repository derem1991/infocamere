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
               <h3 class="mb-0">Blocchi</h3>
               <p class="text-sm mb-0">
                  Lista di esempio di chiamate con relativi documenti
               </p>
            </div>
            <div id="accordion">
               <div class="card">
                  <div class="card-header  oddcard" id="headingFive">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                       Capitale e strumenti finanziari  (blocco CAP)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseFive" class="collapse oddcard  " aria-labelledby="headingFive" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Capitale e strumenti finanziari  (blocco CAP)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Capitale e strumenti finanziari   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Capitale e strumenti finanziari (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=CAP </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/strumentifinanziari.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Capitale e strumenti finanziari (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=CAP</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/strumentifinanziari.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header   " id="headingSix">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                           Informazioni patrimoniali (blocco IPA)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseSix" class="collapse    " aria-labelledby="headingSix" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Informazioni patrimoniali  (blocco IPA)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Informazioni patrimoniali  (blocco IPA)   </h5>
                                    <small class="d-block">(INPUT: 03514840101 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Informazioni patrimoniali (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=IPA </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/informazionipatrimoniali.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Informazioni patrimoniali (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=IPA</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/informazionipatrimoniali.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header  oddcard" id="headingSeven">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                       Amministratori (blocco AMM)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseSeven" class="collapse oddcard  " aria-labelledby="headingSeven" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Amministratori  (blocco AMM)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Amministratori   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Amministratori(risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=AMM </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/amministratori.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Amministratori (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=AMM</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/amministratori.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header " id="headingEight">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                           Sindaci, membri organi di controllo (blocco SIN)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseEight" class="collapse " aria-labelledby="headingEight" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Sindaci, membri organi di controllo  (blocco SIN)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Sindaci, membri organi di controllo   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Sindaci, membri organi di controllo(risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=SIN </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/sindaci.xml" target="_blank">
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Sindaci, membri organi di controllo (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=SIN</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/sindaci.xml" target="_blank"> 
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header oddcard" id="headingNine">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                           Titolari di altre cariche o qualifiche (blocco APE)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseNine" class="collapse oddcard" aria-labelledby="headingNine" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Titolari di altre cariche o qualifiche (blocco APE)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Titolari di altre cariche o qualifiche (blocco APE)   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Titolari di altre cariche o qualifiche (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=APE </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/titolaridialtrecariche.xml" target="_blank">
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Titolari di altre cariche o qualifiche (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=APE</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/titolaridialtrecariche.xml" target="_blank"> 
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header   " id="headingTen">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                           Soci e titolari di diritti su quote o azioni (blocco SOC)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseTen" class="collapse    " aria-labelledby="headingTen" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4"> Soci e titolari di diritti su quote o azioni (blocco SOC)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0"> Soci e titolari di diritti su quote o azioni (blocco SOC)   </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block"> Soci e titolari di diritti su quote o azioni (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=SOC </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/soci.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block"> Soci e titolari di diritti su quote o azioni (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=SOC</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/soci.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header oddcard" id="headingEleven">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                           Trasferimenti d'azienda, fusioni, scissioni, subentri (blocco TFS)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseEleven" class="collapse   oddcard " aria-labelledby="headingEleven" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4"> Trasferimenti d'azienda, fusioni, scissioni, subentri (blocco TFS)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">  Trasferimenti d'azienda, fusioni, scissioni, subentri (blocco TFS) </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">  Trasferimenti d'azienda, fusioni, scissioni, subentri (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=TFS </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/subentri.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">  Trasferimenti d'azienda, fusioni, scissioni, subentri (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=TFS</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/subentri.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header  " id="headingTwelve">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve">
                           Attività, albi, ruoli e licenze (blocco ALB)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">  Attività, albi, ruoli e licenze (blocco ALB)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">  Attività, albi, ruoli e licenze (blocco ALB) </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block"> Attività, albi, ruoli e licenz  (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=TFS </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/albi.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">  Attività, albi, ruoli e licenze (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=TFS</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/albi.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header oddcard" id="headingTredici">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTredici" aria-expanded="true" aria-controls="collapseTredici">
                           Società o enti controllanti (blocco CON)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseTredici" class="collapse oddcard" aria-labelledby="headingTredici" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Società o enti controllanti (blocco CON)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Società o enti controllanti (blocco CON)</h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Società o enti controllanti (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=SIN </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/enticontrollanti.xml" target="_blank">
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Società o enti controllanti  (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=SIN</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/enticontrollanti.xml" target="_blank"> 
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header  " id="headingQuattordici">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseQuattordici" aria-expanded="true" aria-controls="collapseQuattordici">
                           Pratiche in istruttoria (blocco PRA)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseQuattordici" class="collapse" aria-labelledby="headingQuattordici" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4"> Pratiche in istruttoria (blocco PRA)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">   Pratiche in istruttoria (blocco PRA) </h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">  Pratiche in istruttoria   (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=TFS </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/praticheistruttoria.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">  Pratiche in istruttoria   (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=TFS</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/praticheistruttoria.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header oddcard" id="headingquind">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapsequind" aria-expanded="true" aria-controls="collapsequind">
                           Storia dei trasferimenti di quote - solo per SRL  (blocco QUO)
                        </button>
                     </h5>
                  </div>
                  <div id="collapsequind" class="collapse oddcard" aria-labelledby="headingquind" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">Storia dei trasferimenti di quote - solo per SRL  (blocco QUO)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">Storia dei trasferimenti di quote - solo per SRL  (blocco QUO)</h5>
                                    <small class="d-block">(INPUT: 03257950364 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">Storia dei trasferimenti di quote - solo per SRL (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=QUO </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/trasferimentiquote.xml" target="_blank">
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">Storia dei trasferimenti di quote - solo per SRL (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=QUO</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/trasferimentiquote.xml" target="_blank"> 
                                                <small> Scarica XML - O RISULTATI OTTENUTI</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
                  <div class="card-header  " id="headingSED">
                     <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSED" aria-expanded="true" aria-controls="collapseSED">
                           informazioni da patti sociali (blocco PAT)
                        </button>
                     </h5>
                  </div>
                  <div id="collapseSED" class="collapse" aria-labelledby="headingSED" data-parent="#accordion">
                     <div class="card-body">
                        <h3 class="d-block px-4 pt-4">  informazioni da patti sociali (blocco PAT)</h3>
                        <div class="col-12  p-2 m-0 row">
                           <div class=" col-12 my-2"  >
                              <div class="card col-12"style="border:1px solid black;" >
                                 <div class="card-header">
                                    <h5 class="h3 mb-0">    informazioni da patti sociali (blocco PAT) </h5>
                                    <small class="d-block">(INPUT: 03514840101 ) </small>
                               </div>
                                 <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                       <div class="list-group-item  flex-column align-items-start p-4">
                                          <div class="d-block w-100 justify-content-between">
                                             <h5 class="mb-1 d-block">informazioni da patti sociali  (risultato XML)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/xml?blocco=TFS </small>
                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/informazionipattisociali.xml" target="_blank">
                                                <small> Scarica XML</small> 
                                             </a>
                                             <h5 class="mb-1 d-block">informazioni da patti sociali  (risultato pdf)</h5>
                                             <small class="d-block">/rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?blocco=TFS</small>

                                             <a class="d-block" href="{{ config('app.asset_url')}}/document/informazionipattisociali.pdf" target="_blank"> 
                                                <small> Scarica pdf</small> 
                                              </a>
                                          </div>
                                          <div class="mt-4 d-flex w-100 align-items-center">
                                             <h5 class="mb-1">1 Chiamata effettuata</h5>
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
