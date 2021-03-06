<?php

namespace App\Http\Traits;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use DateTime;
use Response;
use Config;
use File;
use App\Models\Order;
use DB;
use Storage;
use ZipArchive;

trait InfoCamereTrait {

  private function client($ext = 'xml')
  {
    return new Client(
      [
        'auth'        => Config("emadema.api.auth"),
        'headers'     => ['username'=>'KJJJ003','password'=>'Febbraio.22','Accept' => 'application/'.$ext.';version=1','Content-type' => 'application/'.$ext.';charset=UTF-8'],
        'http_errors' => false,
        'verify'      => false,
      ]
    );
  }

  public function getOrders()
  {
    $orders = Order::select('orders.*','d.method')
                    ->join('statuses as s','orders.status_id','s.id')
                    ->join('documents as d','orders.document_id','d.id')
                    ->whereNotNull('d.method') // per sicurezza il metodo deve essere impostato
                    ->where('s.slug','pending')->get(); //ordini in stato pending
    if($orders->isNotEmpty())
    {
      foreach($orders as $order)
      {
        $method = $order->method;
        if(str_contains($method,"(")) //se contiene un parametro all'interno prendiamo solo il metodo
          $method = substr($method, 0, strpos($method, "("));
      
        $this->{$method}($order);
        sleep(2); // diamo uno sleep per sicurezza tra una chiamata e l'altra
      }
    }
    return $orders;
  }

  public function getBlock($order)
  {
    if(!empty($order['file_output']))
    {
      $this->download($order['file_output'],$order); // passiamo direttamente al download del file
      return;
    }
    $param = preg_replace("/(.*)'(.*)'(.*)/s", '\2',$order->method); // prendiamo il parametro da passare nella chiamata
    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->get($baseUrl.'rest/registroimprese/output/impresa/blocchi/codicefiscale/pdf?codiceFiscale='.$order->input.'&blocco='.$param);
    try 
    {
      $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json,TRUE);
      if(isset($array['Testata']['Riepilogo']['FileOutput']))
        Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);

    }catch(\Exception $e) { }
   
    
    return $order;
  }

  public function getCariche($order)
  {
    $param = preg_replace("/(.*)'(.*)'(.*)/s", '\2',$order->method); // prendiamo il parametro da passare nella chiamata
    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    if($param == 'AC') // profilo completo scarichiamo pdf
    {
      if(!empty($order['file_output']))
      {
        $this->download($order['file_output'],$order); // passiamo direttamente al download del file
        return;
      }
      $json = $client->get($baseUrl.'rest/registroimprese/persone/scheda/codicefiscale/pdf?codiceFiscale='.$order->input);
      try 
      {
        $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        if(isset($array['Testata']['Riepilogo']['FileOutput']))
          Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);
  
      }catch(\Exception $e) { }  
    }
    else
    {
    
      $json = $client->get($baseUrl.'rest/registroimprese/persone/scheda/codicefiscale/xml?codiceFiscale='.$order->input.'&statoCarica='.$param);
      try {
        $xml = $json->getBody()->getContents();
        if(isset($xml) && !empty($xml))
        { 
          //risultato finale xml
          Order::find($order->id)->update(['xml'=>$xml]);
          $order->status_id = 2;
          $order->save();
        }
      }
      catch(\Exception $e) { }
    }
    
    return $order;
  }


  public function getPasAtt($order)
  {
    if(!empty($order['file_output']))
    {
      $this->download($order['file_output'],$order); // passiamo direttamente al download del file
      return;
    }     

    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->get($baseUrl.'rest/registroimprese/assettiproprietari/partecipazioni/codicefiscale/pdf?codiceFiscale='.$order->input);
    try {
      $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json,TRUE);
      if(isset($array['Testata']['Riepilogo']['FileOutput']))
        Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);

    }catch(\Exception $e) { }
   
    
    return $order;
  }
 
  public function getPasSto($order)
  {
    if(!empty($order['file_output']))
    {
      $this->download($order['file_output'],$order); // passiamo direttamente al download del file
      return;
    }     

    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->get($baseUrl.'rest/registroimprese/assettiproprietari/partecipazioni/storica/codicefiscale/pdf?codiceFiscale='.$order->input);
    try {
      $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json,TRUE);
      if(isset($array['Testata']['Riepilogo']['FileOutput']))
        Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);

    }catch(\Exception $e) { }
   
    
    return $order;
  }
  public function getProcedure($order)
  {
    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");  
    $json = $client->get($baseUrl.'rest/registroimprese/procedureincorso/blocco/codicefiscale/xml?codiceFiscale='.$order->input);
    try {
      $xml = $json->getBody()->getContents();
      if(isset($xml) && !empty($xml))
      { 
        //risultato finale xml
        Order::find($order->id)->update(['xml'=>$xml]);
        $order->status_id = 2;
        $order->save();
      }
    }
    catch(\Exception $e) { }
   
    return $order;
  }

  public function getResearch($input)
  {
    $xml = ''; 
    $client = InfoCamereTrait::client('xml');
    $baseUrl = Config("emadema.api.baseUrl");  
    try {
      $json = $client->get($baseUrl.'rest/registroimprese/imprese/ricerca/denominazione?denominazione='.$input);
      $xml = $json->getBody()->getContents();
    }
    catch(\Exception $e) { }
   
    return $xml;
  }

  public function getSedi($order)
  {
    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->get($baseUrl.'rest/registroimprese/imprese/ricerca/codicefiscale?codiceFiscale='.$order->input.'&fSoloSedi=S');
    try {
      $xml = $json->getBody()->getContents();
      if(isset($xml) && !empty($xml))
      { 
        //risultato finale xml
        Order::find($order->id)->update(['xml'=>$xml]);
        $order->status_id = 2;
        $order->save();
      }
    }
    catch(\Exception $e) { }
   
    return $order;
  }

  public function getVisOrd($order)
  {
    if(!empty($order['file_output']))
    {
      $this->download($order['file_output'],$order); // passiamo direttamente al download del file
      return;
    }

    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->get($baseUrl.'rest/registroimprese/output/impresa/documento/codicefiscale/pdf?codiceFiscale='.$order->input.'&documento=VATTU');
    try {
      $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json,TRUE);
      if(isset($array['Testata']['Riepilogo']['FileOutput']))
        Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);

    }catch(\Exception $e) { }
   
    
    return $order;
  }

  public function getVisSto($order)
  {
    if(!empty($order['file_output']))
    {
      $this->download($order['file_output'],$order); // passiamo direttamente al download del file
      return;
    }

    $client = $this->client('xml');
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->get($baseUrl.'rest/registroimprese/output/impresa/documento/codicefiscale/pdf?codiceFiscale='.$order->input.'&documento=VSTOR');
    try {
      $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
      $json = json_encode($xml);
      $array = json_decode($json,TRUE);
      if(isset($array['Testata']['Riepilogo']['FileOutput']))
        Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);

    }catch(\Exception $e) { }
   
    
    return $order;
  }

  public function download($lotto,$order)
  {  
    $order = Order::find($order->id);
    if(!Storage::has($lotto.".zip"))
    {
      $client = $this->client('zip');
      $baseUrl = Config("emadema.api.baseUrl");
      $json = $client->get($baseUrl.'rest/storage/download?nomeLotto='.$lotto);
      $body = $json->getBody()->getContents();
      if(!empty($body))
      {
        Storage::put($lotto.".zip",$body);
        if(Storage::has($lotto.".zip"))
        {
          $order->status_id = 2;
          $order->save();
        }
      }
    }
    else
    {
       $order->status_id = 2;
       $order->save();
    }
    return $lotto;
  
  }
}

 