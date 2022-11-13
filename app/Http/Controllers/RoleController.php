<?php
    
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Models\User;
use Auth;
    
class RoleController extends Controller
{
  

    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();
        return view('roles.create',compact('users'));
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
            'name' => 'required|unique:roles,name'
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
        
        if($request->users){
            $role_r = Role::where('id', '=', $role)->first();
            foreach ($request->users as $user_id => $user_value) {    
                $user = User::where('id',$user_value)->first();
                $user->assignRole($role_r); //Assigning role to user
            }            
        }
            
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
    
        return view('roles.show',compact('role'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::orderBy('id', 'DESC')->where('id', '<>', Auth::user()->id)->get();
        $role = Role::find($id);
        
    
        return view('roles.edit',compact('role','users'));
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
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        
        if($request->users){
            $role_r = Role::where('id', '=', $role)->first();
            foreach ($request->users as $user_id => $user_value) {    
                $user = User::where('id',$user_value)->first();
                $user->assignRole($role_r); //Assigning role to user
            }            
        }
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}