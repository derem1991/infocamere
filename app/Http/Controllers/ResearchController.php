<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Research;
use Response;
use Auth;
use Storage;
use App\Http\Traits\InfoCamereTrait as Infocamere;
use App\Models\Wallet;
use App\Models\User;

class ResearchController extends Controller
{
     
    function __construct()
    {
      $this->middleware('permission:research-mylist', ['only' => ['index']]);
      $this->middleware('permission:research-create', ['only' => ['create','store']]);
      $this->middleware('permission:research-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:research-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
      $researchs = Research::getResearchByPermission();
      return view('researchs.index',compact('researchs'));
    }

    public function create()
    {
      return view('researchs.create');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'input'       => 'required',
      ]);

      $data = $request->all();
      $xml = Infocamere::getResearch($data['input']);
      $data['xml'] = $xml;
      $research = Research::create($data);

      if(!empty($research))
      {
        $wallet = Wallet::find($data['wallet_id']);
        $wallet->budget_remaining = $wallet->budget_remaining - (float)$data['cost'];
        $wallet->save();
 
        $user = User::find($data['user_id']);
        $user->budget = $user->budget - (float)$data['price'];
        $user->save();
      }
      else
       return redirect()->route('researchs.index');

      return redirect()->route('researchs.edit',$research['id']);
    }
 
    public function edit($id)
    {
        $research = Research::findOrFail($id);

        $xml = simplexml_load_string($research['xml'], "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $results = json_decode($json,TRUE);

        return view('researchs.edit',compact('research','results'));
    }
   
     
    public function destroy($id)
    {
   
    }
 
}