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
trait InfoCamereTrait {

  private function client()
  {
    return new Client(
      [
        'auth'        => Config("emadema.api.auth"),
        'headers'     => ['Accept' => 'application/xml;version=1','Content-type' => 'application/xml;charset=UTF-8'],
        'http_errors' => true,
        'verify'      => false
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
        $this->{$order->method}($order->input);
        sleep(2); // diamo uno sleep per sicurezza tra una chiamata e l'altra
      }
    }
    return $orders;
  }

  public function getVisOrd($input)
  {
  
   // https://aiws.infocamere.it/docs/rest/registroimprese/output/impresa/documento/codicefiscale/pdf?codiceFiscale=RSSRRT66P24H501H&documento=VATTU
    $client = $this->client();
    $baseUrl = Config("emadema.api.baseUrl");
    $json = $client->request('GET','https://aiws.infocamere.it/docs/rest/registroimprese/output/impresa/documento/codicefiscale/pdf?codiceFiscale=RSSRRT66P24H501H&documento=VATTU');
    $response = $json->getBody()->getContents();
    dd($response);
  }
  
}

 