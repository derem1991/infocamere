<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\DocumentHasWallet;
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
       $param['documents'] = isset($param['item']['document_id']) ? Document::where('id',$param['item']['document_id'])->get() : Document::all();  
      break;
    }
    return $param;
  }
}