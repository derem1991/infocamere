<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use DB;
    
class WalletController extends Controller
{
 
    function __construct()
    {
        $this->middleware('permission:wallet-list', ['only' => ['index']]);
        $this->middleware('permission:wallet-create', ['only' => ['create','store']]);
        $this->middleware('permission:wallet-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:wallet-delete', ['only' => ['destroy']]);
    }
 
    public function index(Request $request)
    {
        $wallets = Wallet::orderBy('id','DESC')->get();
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
        Wallet::create($data);

        return redirect()->route('wallets.index')->with('success','Created successfully');
    }
 
    public function edit($id)
    {
        $wallet = Wallet::find($id);
        return view('wallets.createOrUpdate',compact('wallet'));
    }
   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required',
            'budget' => 'required|numeric|min:0|not_in:0',
        ]);
        $input = $request->all();
        $update = Wallet::find($id);
        $update->update($input);
    
        return redirect()->route('wallets.index')->with('success','Item updated successfully');
    }
 
    public function destroy($id)
    {
        Wallet::find($id)->delete();
        return redirect()->route('wallets.index')->with('success','Item deleted successfully');
    }
}