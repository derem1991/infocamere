<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Document;
use App\Models\Status;
use App\Models\User;
use App\Models\Wallet;
use Response;
use Auth;
use Storage;
class OrderController extends Controller
{
     
    function __construct()
    {
      $this->middleware('permission:order-mylist', ['only' => ['index']]);
      $this->middleware('permission:order-create', ['only' => ['create','store']]);
      $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
      $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
      $orders = Order::getOrderByPermission();
      return view('orders.index',compact('orders'));
    }

    public function create()
    {
      $documents = Document::getDispoByUser();
      $defaultStatus = Status::where('slug','pending')->value('id');
      if(empty($defaultStatus)) //se non ce lo stato pending mandiamo in 404 per sicurezza - ci deve sempre essere
       abort(404);

      return view('orders.create',compact('documents','defaultStatus'));
    }

    public function download($output)
    {
      $path = storage_path().'/'.'app'.'/'.$output.".zip";
      if (file_exists($path)) 
          return Response::download($path);

      return;
    }

    public function store(Request $request)
    {
      $this->validate($request, [
          'document_id' => 'required',
          'input'       => 'required',
          'user_id'     => 'required',
          'price'       => 'required',
          'cost'        => 'required',
          'status_id'   => 'required',
          'wallet_id'   => 'required',
      ]);

      $data = $request->all();
      $order = Order::create($data);
      if(!empty($order))
      {
        $wallet = Wallet::find($data['wallet_id']);
        $wallet->budget_remaining = $wallet->budget_remaining - (float)$data['cost'];
        $wallet->save();
 
        $user = User::find($data['user_id']);
        $user->budget = $user->budget - (float)$data['price'];
        $user->save();
 
      }
      return Response::json($data);
    }
 
    public function edit($id)
    {
        $document = Document::find($id);
        return view('documents.createOrUpdate',compact('document'));
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