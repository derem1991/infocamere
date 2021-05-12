<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->get();

        $breadcrumb[0]['route']='users.index';
        $breadcrumb[0]['title']='Utenti';

        return view('users.index',compact('users','breadcrumb'));
    }
    public function myProfile()
    {
        $user = Auth::user();
 
        return view('users.myProfile',compact('user'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumb[0]['route']='users.index';
        $breadcrumb[0]['title']='Utenti';
        $breadcrumb[1]['title']='Creazione utente';

        $roles = Role::pluck('name','name')->all();
        
        return view('users.createOrUpdate',compact('roles','breadcrumb'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return view('users.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $breadcrumb[0]['route']='users.index';
        $breadcrumb[0]['title']='Utenti';
        $breadcrumb[1]['title']='Modifica utente';

        $user = User::find($id);
         
        $roles = Role::pluck('name','name')->all();
     
        return view('users.createOrUpdate',compact('user','roles','breadcrumb'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|',
            'roles' => 'required_without_all:userProfile',  
            'password' => 'same:confirm-password',
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
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}