<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {

        return Inertia::render('SuperAdmin/Users/Index', [
            'users' => User::paginate()
        ]);    
        
        //  // get all users
        //  $users = User::all();
        //  // return the view with the users
        //  return Inertia::render('Users/Index', compact('users'));
    }
    
    public function create()
    {
        // $this->authorize('manage users');
     
        return Inertia::render('SuperAdmin/Users/Create');
        
    }

    
    public function store(Request $request){

        // $this->authorize('manage users');
        dd($this->authorize('manage users'));
        // create a new user with the validated data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role = (int)$request->role;
        $user->save();
        // redirect to the index


        return redirect()->route('superadmin.users.index'); 
   
    }

    public function show(User $user)
    {
        // return Inertia::render('Admin/Users/Show', [
        //     'user' => $user
        // ]);
    }


    public function edit($id)
    {

        $user = User::find($id);
        return Inertia::render('SuperAdmin/Users/Edit', [
            'user' => $user
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $this->authorize('manage users');
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            // 'role' => 'required'
        ]);


        $user = User::find($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role = $request->role;
        $user->save();
        sleep(1);
        // redirect to the index
        return redirect()->route('superadmin.users.index')->with('message', 'User Updated Successfully');

    }

    
    public function destroy($id){
    
        // $this->authorize('manage users');
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
         
    }
    
}





