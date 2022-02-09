<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;
class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:user-mylist', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if(Auth::user()->can('user-list')) // possibilita vedere tutti gli utenti
         $users = User::orderBy('id','DESC')->get();
        else // utenti stesso wallet
         $users = User::where('wallet_id',Auth::user()->wallet_id)->orderBy('id','DESC')->get();

        return view('users.index',compact('users'));
    }

    public function myProfile()
    {
        $user = Auth::user();
        return view('users.myProfile',compact('user'));
    }
 
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        if(Auth::user()->can('user-list')) // possibilita wallet proprio
            $wallets = Wallet::all();
        else // utenti stesso wallet
            $wallets = Wallet::where('id',Auth::user()->wallet_id)->get();

        return view('users.createOrUpdate',compact('roles','wallets'));
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|same:confirm-password',
            'roles'     => 'required',
            'budget'    => '|numeric|min:0'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }
 
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
 
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();

        if(Auth::user()->can('user-list')) // tutti wallet
            $wallets = Wallet::all();
        else // utenti stesso wallet
        {
          if($user->wallet_id != Auth::user()->wallet_id)
           abort(404);
          else
           $wallets = Wallet::where('id',Auth::user()->wallet_id)->get();
        }
             
        return view('users.createOrUpdate',compact('user','roles','wallets'));
    }
 
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|',
            'roles'    => 'required_without_all:userProfile',  
            'password' => 'same:confirm-password',
            'budget'   => '|numeric|min:0',
        ]);
    
        $input = $request->all();
         
        if(!empty($input['password']))
          $input['password'] = Hash::make($input['password']);
        else
          $input = Arr::except($input,array('password'));    
        
    
        $user = User::find($id);
        $user->update($input);

        if(!isset($input['userProfile'])) 
        {
          DB::table('model_has_roles')->where('model_id',$id)->delete();
          $user->assignRole($request->input('roles'));
          $route = 'users.index';
        }
        else // quando il cliente modifica i dati dal suo profilo personale
         $route = 'users.myProfile';
    
        return redirect()->route($route)->with('success','User updated successfully');
    }
 
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}