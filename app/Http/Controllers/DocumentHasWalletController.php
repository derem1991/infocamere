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
            'name'   => 'required',
        ]);

        $data = $request->all();
        Document::create($data);

        return redirect()->route('documents.index')->with('success','Item Created successfully');
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
      DocumentHasWallet::find($id)->delete();
      return back()->with('success','Item deleted successfully');
    }
 
}