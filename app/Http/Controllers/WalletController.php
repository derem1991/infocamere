<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\DocumentHasWallet;
use DB;
use Auth;
class WalletController extends Controller
{
 
    function __construct()
    {
        $this->middleware('permission:wallet-mylist', ['only' => ['index']]);
        $this->middleware('permission:wallet-create', ['only' => ['create','store']]);
        $this->middleware('permission:wallet-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:wallet-delete', ['only' => ['destroy']]);
    }
 
    public function index(Request $request)
    {
       if(Auth::user()->can('wallet-list')) // tutti i wallet
         $wallets =  Wallet::orderBy('id','DESC')->get();
       else // wallet a cui si fa riferimento
        return  redirect()->route('wallets.edit',Auth::user()->wallet_id);

        return view('wallets.index',compact('wallets'));
    }
 
    public function create()
    {
      return view('wallets.createOrUpdate');
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
            'budget' => 'required|numeric|min:0|not_in:0',
        ]);

        $data = $request->all();

        $data['budget_remaining'] = isset($data['budget']) ? $data['budget'] : 0;

        Wallet::create($data);
        
        return redirect()->route('wallets.index')->with('success','Created successfully');
    }
 
    public function edit($id)
    {
        if(!Auth::user()->can('wallet-list') && Auth::user()->wallet_id != $id) // se non puo vedere tutti i wallet
         abort(404);  

        $wallet = Wallet::find($id);
        $documents = DocumentHasWallet::where('wallet_id',$id)->get();
        return view('wallets.createOrUpdate',compact('wallet','documents'));
    }
   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required',
            'budget' => 'required|numeric|min:0|not_in:0',
        ]);
        $input = $request->all();

        
        $update = Wallet::find($id);

        if(isset($input['budget']))
        {
         $diff = (float)$input['budget'] - $update->budget;
         $input['budget_remaining'] =  $update->budget_remaining + $diff;
        }

        $update->update($input);
    
        return redirect()->route('wallets.index')->with('success','Item updated successfully');
    }
 
    public function destroy($id)
    {
        Wallet::find($id)->delete();
        return redirect()->route('wallets.index')->with('success','Item deleted successfully');
    }
}