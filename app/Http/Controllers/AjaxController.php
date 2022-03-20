<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentHasWallet;
use Response;
class AjaxController extends Controller
{
     
  function __construct()
  {
     
  }

  public function modal($model,Request $request) // parametri per l'edit delle varie modali visto che sono tutte in ajax
  {
    $param= [];
    $input = $request->all();  
    
    switch ($model) 
    {
      case 'document':
       $param['item'] = isset($input['id']) ? DocumentHasWallet::find($input['id']) : null;
       $param['documents'] = isset($param['item']['document_id']) ? Document::where('id',$param['item']['document_id'])->get() : Document::where('wallet_id',$input['wallet'])->get();  
      break;
    }
    return $param;
  }

  public function loadStepOrder(Request $request)
  {
    $data  = $request->all();
    $step  = isset($data['step']) ? $data['step'] : 1;
    $input = isset($data['input']) ? $data['input'] : '';
    $documents = Document::getDispoByUser();
    $render = view('partials.cardOrder',compact('step','documents','input'))->render();

    return Response::json($render);
  }
}