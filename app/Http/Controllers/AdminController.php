<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class AdminController extends Controller
{
    public function indexUser()
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::where('role', '!=' , 1)->paginate()
        ]);
    }

    public function createUser()
    {
        return Inertia::render('Admin/Users/Create');
    }

    public function storeUser(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role = $request->role;
        $user->save();
        // redirect to the index
        return redirect()->route('admin.users.index')->with('success', 'User created successfully.'); 
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        
        $user = User::find($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->status = $request->status;
        $user->role = $request->role;
        $user->save();
        // redirect to the index
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.'); 
    }

    public  function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.'); 
    }


}
