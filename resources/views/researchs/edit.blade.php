@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6 customheader">
   <span class="mask bg-gradient-default opacity-8"></span>
   <div class="container-fluid">
      <div class="header-body">
         <div class="row align-items-center py-4">
            @include('layouts.headers.navigation',['title'=>'Dettaglio Ricerche'])
            @can('research-create')
            <div class="col-lg-6 col-5 text-right">
               <a href="{{route('researchs.create')}}" class="btn btn-sm btn-neutral">Nuova ricerca</a>
            </div>
            @endcan
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
               <h3 class="mb-0">Ricerca - <b>{{$research['input']}}</b></h3>
               <p class="text-sm mb-0">
                 Vedi i dettagli della ricerca effettuata.
               </p>
            </div>
            <div class="table-responsive py-4">
               <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
             
                  <div class="row">
                     <div class="col-sm-12">

                        @if(isset($results['ListaImpreseRI']['Impresa']))
                        <table class="table table-flush dataTable" id="datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                           <thead class="thead-light">
                              <tr>
                                <th scope="col" class="sort" data-sort="Denominazione">Denominazione</th>
                                <th scope="col" class="sort" data-sort="Cciaa">NRea/Cciaa</th>
                                <th scope="col" class="sort" data-sort="Nrea">NRea</th>
                                <th scope="col" class="sort" data-sort="Sede">Sede</th>
                                <th scope="col" class="sort" data-sort="CF/PIVA">CF/PIVA</th>
                                <th scope="col" class="sort" data-sort="Nat. Giuridica">Nat. Giuridica</th>
                                <th scope="col" class="sort" data-sort="Stato attività">Stato attività</th>
                                <th scope="col" class="sort" data-sort="Stato attività Reg">Stato attività Reg</th>
                                <th scope="col" class="sort" data-sort="Attività dichiarata">Attività dichiarata</th>
                                <th scope="col" class="sort" data-sort="PEC">PEC</th>
                                <th scope="col" class="sort" data-sort="ATECO">ATECO</th>

                              </tr>
                            </thead>
                           <tbody>
                                 @if(isset($results['ListaImpreseRI']['Impresa']['AnagraficaImpresa'])) 
                                    @php $reqs['ListaImpreseRI']['Impresa'][0] = $results['ListaImpreseRI']['Impresa'] @endphp
                                 @else
                                    @php $reqs = $results @endphp
                                 @endif

                                 <!-- se ce solo un impresa non ce array quindi lo mettiamo dentro -->
                                 @foreach($reqs['ListaImpreseRI']['Impresa'] as $result)
                                 <tr role="row" class="odd">
                                    <td class="">{{$result['AnagraficaImpresa']['Denominazione'] ?? ''}}
                                       @if(isset($result['AnagraficaImpresa']['CodFisc']) && !empty($result['AnagraficaImpresa']['CodFisc']))
                                         @php $input = $result['AnagraficaImpresa']['CodFisc'] @endphp
                                       @elseif(isset($result['AnagraficaImpresa']['PIva']) && !empty($result['AnagraficaImpresa']['PIva']))
                                         @php $input = $result['AnagraficaImpresa']['PIva'] @endphp
                                       @endif
                                       @can('order-create')
                                          @if(isset($input))
                                             <a href="{{route('orders.create',['input'=>$input])}}" class="badge badge-success" >Crea ordine</a>
                                          @endif
                                       @endcan
                                    </td>
                                    <td>{{ $result['AnagraficaImpresa']['DescCciaa']  ?? ''}} ({{ $result['AnagraficaImpresa']['Cciaa']  ?? ''}})</td> 
                                    <td class="">{{$result['AnagraficaImpresa']['NRea'] ?? ''}}</td>
                                    
                                    <td class="">
                                       {{$result['AnagraficaImpresa']['IndirizzoSede']['DescComSede'] ?? ''}} 
                                       ({{$result['AnagraficaImpresa']['IndirizzoSede']['SglPrvSede'] ?? ''}}),
                                       {{$result['AnagraficaImpresa']['IndirizzoSede']['DescToponSede'] ?? ''}}
                                       {{$result['AnagraficaImpresa']['IndirizzoSede']['ViaSede'] ?? ''}}
                                       {{$result['AnagraficaImpresa']['IndirizzoSede']['NCivicoSede'] ?? ''}},
                                       {{$result['AnagraficaImpresa']['IndirizzoSede']['CapSede'] ?? ''}}
                                    </td>
                                    <td class="">{{$result['AnagraficaImpresa']['CodFisc'] ?? 'N.D.'}} / {{$result['AnagraficaImpresa']['PIva'] ?? 'N.D.'}}</td>
                                    <td>{{ $result['AnagraficaImpresa']['DescNatGiu']  ?? ''}} ({{ $result['AnagraficaImpresa']['NatGiu']  ?? ''}})</td> 
                                    <td class="">{{$result['AnagraficaImpresa']['DescStatoAttivita'] ?? ''}}</td>
                                    <td class="">{{$result['AnagraficaImpresa']['DescStatoAttivitaReg'] ?? ''}}</td>
                                    <td class="">{{$result['AnagraficaImpresa']['AttivitaDichiarata'] ?? ''}}</td>
                                    <td class="">{{$result['AnagraficaImpresa']['IndirizzoPostaCertificata'] ?? ''}}</td>
                                    <td class="">
                                       {{$result['AnagraficaImpresa']['ClassificazioneAteco']['DescCodifica'] ?? ''}},
                                       {{$result['AnagraficaImpresa']['ClassificazioneAteco']['DescAttivita'] ?? ''}} 
                                    </td>

                                 </tr> 
                                 @endforeach
                            </tbody>
                        </table>
                        @else
                          <p class="col-12  m-0">Non è stato trovato nessun risultato per questa ricerca </p>
                        @endif
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
<script async>
   $(document).ready( function () {
      $('#datatable-basic').DataTable({
         "language": {
            "paginate": {
               "previous": "<",
               "next": ">"
            }
         } ,
       
    });
   } );
</script>
 
 
@endsection