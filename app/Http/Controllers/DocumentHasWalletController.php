<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DocumentHasWallet;

class DocumentHasWalletController extends Controller
{
     
    function __construct()
    {
     
    }
   
    public function store(Request $request)
    {
        $this->validate($request, [
            'document_id'   => 'required',
            'wallet_id'     => 'required',
            'cost'          => 'required|numeric|min:0|not_in:0',
            'price'         => 'required|numeric|min:0|not_in:0',
        ]);

        $data = $request->all();
        //solo 1 associazione documento wallet(almeno per ora)
        DocumentHasWallet::where('document_id',$data['document_id'])->where('wallet_id',$data['wallet_id'])->delete(); 

        DocumentHasWallet::create($data);
        return back()->with('success','Item Created successfully');
    }
   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'document_id'   => 'required',
          'wallet_id'     => 'required',
          'cost'          => 'required|numeric|min:0|not_in:0',
          'price'         => 'required|numeric|min:0|not_in:0',
        ]);

        $input = $request->all();
    
        $update = DocumentHasWallet::find($id);
        $input['active'] = isset($input['active']) ? 1 : 0;
        $update->update($input);
    
        return back()->with('success','Item updated successfully');
    }
 
    public function destroy($id)
    {
      DocumentHasWallet::find($id)->delete();
      return back()->with('success','Item deleted successfully');
    }
 
}