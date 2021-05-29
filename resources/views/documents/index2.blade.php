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
