<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
     
class DocumentController extends Controller
{
     
    function __construct()
    {
        
    }

    public function index(Request $request)
    {
       return view('documents.index');
    }
     
}