<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Document;
use App\Models\Status;
use Response;
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
      $orders = Order::orderBy('id','DESC')->get();
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

    public function store(Request $request)
    {
      $this->validate($request, [
          'document_id' => 'required',
          'input'       => 'required',
          'user_id'     => 'required',
          'price'       => 'required',
          'status_id'   => 'required',
      ]);

      $data = $request->all();
      Order::create($data);

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