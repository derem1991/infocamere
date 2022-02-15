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
    if(!empty($orders))
    {
      foreach($orders as $order)
      {
        $this->{$order->method}($order);
        sleep(2); // diamo uno sleep per sicurezza tra una chiamata e l'altra
      }
    }
    return $orders;
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
    $xml = simplexml_load_string($json->getBody()->getContents(), "SimpleXMLElement", LIBXML_NOCDATA);
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    if(isset($array['Testata']['Riepilogo']['FileOutput']))
      Order::find($order->id)->update(['file_output'=>$array['Testata']['Riepilogo']['FileOutput']]);
    
    return $order;
  }

  public function download($lotto,$order)
  { 
    $order = Order::find($order->id);
    $media =  $order->getMedia('output');
    if($media->isEmpty())
    {
      $client = $this->client('zip');
      $baseUrl = Config("emadema.api.baseUrl");
      $json = $client->get($baseUrl.'rest/storage/download?nomeLotto='.$lotto);
      if(!empty($json->getBody()->getContents()))
        $order->addMediaFromStream($json->getBody()->getContents())->usingFileName($lotto.".zip")->toMediaCollection('output');
    }
    else
    {
      $order->status_id = 2;
      $order->save();
    }
    return $lotto;
  
  }
}

 