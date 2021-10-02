<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    //

    public function index()
    {
        $users = Admin::all();
//        dd($users);
        return view('admin.Author.author', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
//        dd($roles);
        return view('admin.Author.add', compact('roles'));
    }

    public function store(Request $request)
    {
//        dd($request->role_id);
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->attach($request->role_id);
        return redirect('/author');

    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = Admin::find($id);
        $rolesOfUser = $user->roles;
//        dd($rolesOfUser);
        return view('admin.Author.edit', compact('roles', 'user', 'rolesOfUser'));
    }

    public function update(Request $request, $id)
    {
        $user = Admin::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();
        $user->roles()->sync($request->role_id);
        return redirect('/author');

    }
}
