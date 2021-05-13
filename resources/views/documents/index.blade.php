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
             <div class="col-12 p-0 p-4 m-0 prow">
               <div class="card col-md-6 col-12" style="border:1px solid black;">
                  <div class="card-header">
                      <h5 class="h3 mb-0">visura ordinara impresa (INPUT: RSSRRT66P24H501H ) </h5>
                  </div>
                  <div class="card-body p-0">
                      <div class="list-group list-group-flush">
                          <div class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                              <div class="d-block w-100 justify-content-between">
                                    <h5 class="mb-1 d-block">visura ordinara impresa ( risultato XML)</h5>
                                    <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinaria.xml" target="_blank"> 
                                       <small> Scarica XML</small> 
                                    </a>
                              </div>
                              <div class="mt-4 d-flex w-100 align-items-center">
                                 <h5 class="mb-1">1 Chiamata effettuata</h5>
                              </div>
                              <h4 class="mt-0 mb-1"><span class="text-info">●</span> /rest/registroimprese/output/impresa/documento/codicefiscale/xml</h4>
                              <p class="text-sm mb-0">In questo modo con una sola chiamata si scarica l'xml relativo alla visura ordinaria ed eventualmente si può creare un pdf custom sul xml ottenuto</p>
                          </div>
                      </div>
                      <div class="list-group list-group-flush">
                        <div   class="list-group-item list-group-item-action flex-column align-items-start py-4 px-4">
                            <div class="d-block w-100 justify-content-between">
                                  <h5 class="mb-1 d-block">visura ordinara impresa ( risultato PDF)</h5>
                                  <a class="d-block" href="{{ config('app.asset_url')}}/document/visuraordinaria.pdf" target="_blank"> 
                                     <small> Scarica PDF</small> 
                                  </a>
                            </div>
                            <div class="mt-4 d-flex w-100 align-items-center">
                               <h5 class="mb-1">2 Chiamate effettuate</h5>
                            </div>
                            <h4 class="mt-0 mb-1"><span class="text-info">●</span> /rest/registroimprese/output/impresa/documento/codicefiscale/pdf (richiesta in differita)</h4>
                            <h4 class="mt-0 mb-1"><span class="text-info">●</span>/rest/storage/download (download pdf)</h4>
                             <p class="text-sm mb-0">In questo modo si ottiene il pdf creato direttamente dal portale</p>
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
 
@endsection