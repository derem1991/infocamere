<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Wallet;
use Auth;
class DocumentController extends Controller
{
     
    function __construct()
    {
      $this->middleware('permission:document-mylist', ['only' => ['index']]);
      $this->middleware('permission:document-create', ['only' => ['create','store']]);
      $this->middleware('permission:document-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:document-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
      if(Auth::user()->can('document-list')) // possibilita vedere tutti gli utenti
      $documents = Document::orderBy('id','DESC')->get();
     else // utenti stesso wallet
      $documents = Document::where('wallet_id',Auth::user()->wallet_id)->orderBy('id','DESC')->get();
 
      return view('documents.index',compact('documents'));
    }

    public function create()
    {
      if(Auth::user()->can('document-list')) // possibilita wallet proprio
        $wallets = Wallet::all();
      else // solo proprio wallet
        $wallets = Wallet::where('id',Auth::user()->wallet_id)->get();

      return view('documents.createOrUpdate',compact('wallets'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
        ]);

        $data = $request->all();
        Document::create($data);

        return redirect()->route('documents.index')->with('success','Item Created successfully');
    }
 
    public function edit($id)
    {
        $document = Document::find($id);

        if(Auth::user()->can('document-list')) // tutti wallet
          $wallets = Wallet::all();
        else // document stesso wallet
        {
          if($document->wallet_id != Auth::user()->wallet_id)
            abort(404); // non puoi vedere documenti altri wallet
          else
            $wallets = Wallet::where('id',Auth::user()->wallet_id)->get();
        }

        return view('documents.createOrUpdate',compact('document','wallets'));
    }
   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required',
        ]);

        $input = $request->all();
        $input['is_piva']      = isset($input['is_piva']) ? 1 : 0;
        $input['is_cfiscale'] = isset($input['is_cfiscale']) ? 1 : 0;
        $input['active']      = isset($input['active']) ? 1 : 0;
    
        $update = Document::find($id);
        $update->update($input);
    
        return redirect()->route('documents.index')->with('success','Item updated successfully');
    }
 
    public function destroy($id)
    {
      Document::find($id)->delete();
      return redirect()->route('documents.index')->with('success','Item deleted successfully');
    }

    public function documenti()
    {
      return view('documenti');
    }

    public function blocchi()
    {
      return view('blocchi');
    }
}