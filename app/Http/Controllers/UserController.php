<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use __;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */



    public function index(User $model)
    {
        $users = User::with('roles')->where('id', '<>', Auth::user()->id)->get();
        return view('users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'profile_pic' => 'required',
            'nid_number' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'mobile_number' => 'required|unique:users,mobile_number',
            'weather' => 'required',
            'emergency_contact' => 'required',
        ]);

        
        $profile_pic = '';
        if ($request->hasFile('profile_pic')) {

            $path = public_path('users');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $users = $request->file('profile_pic');

            $profile_pic = uniqid() . '_' . trim($users->getClientOriginalName());

            $users->move($path, $profile_pic);

        }

        $user = new User();
        $user->name = __::get($request, 'name');
        $user->email = __::get($request, 'email');
        $user->password = Hash::make($request->password);
        $user->mobile_number = __::get($request, 'mobile_number');
        $user->gender = __::get($request, 'gender');
        $user->nid_number = __::get($request, 'nid_number');
        $user->weather = __::get($request, 'weather');
        $user->emergency_contact = __::get($request, 'emergency_contact');
        $user->status = __::get($request, 'status');
        $user->profile_pic = $profile_pic;

        $user->save();
        $roles = $request['roles']; //Retrieving the roles field

       $roles = $request['roles']; //Retrieving the roles field
               //Checking if a role was selected
       if (isset($roles)) {
           foreach ($roles as $role) {
               $role_r = Role::where('id', '=', $role)->firstOrFail();            
               $user->assignRole($role_r); //Assigning role to user
           }
       }       
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->with('roles')->first();
        $roles = Role::pluck('name','id')->all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'nid_number' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'required|unique:users,mobile_number,'.$id,
            'weather' => 'required',
            'emergency_contact' => 'required',
        ]);


        if ($request->hasFile('profile_pic')) {

            $path = public_path('users');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $profile_pic = $request->file('profile_pic');

            $profile_pic_name = uniqid() . '_' . trim($profile_pic->getClientOriginalName());

            $profile_pic->move($path, $profile_pic_name);
        
        }else{
            $profile_pic_name = $request->input('hidden_profile_pic');
            
        }
        $user = User::find($id);
        $user->name = __::get($request, 'name');
        $user->email = __::get($request, 'email');

        if(__::get($request,'password')){
            $user->password = Hash::make($request->password);
        }
        $user->mobile_number = __::get($request, 'mobile_number');
        $user->gender = __::get($request, 'gender');
        $user->nid_number = __::get($request, 'nid_number');
        $user->profile_pic = $profile_pic_name;
        $user->weather = __::get($request, 'weather');
        $user->emergency_contact = __::get($request, 'emergency_contact');
        $user->status = __::get($request, 'status');
        $user->save();
        $roles = $request['roles']; //Retrieving the roles field
       
       if (isset($roles)) {        
           $user->roles()->sync($roles);          
       }        
       else {
           $user->roles()->detach();
       }
        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }


}
