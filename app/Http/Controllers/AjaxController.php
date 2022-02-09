<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
     
  function __construct()
  {
     
  }

  public function index(Request $request)
  {
    $documents = Document::orderBy('id','DESC')->get();
    return view('documents.index',compact('documents'));
  }
}