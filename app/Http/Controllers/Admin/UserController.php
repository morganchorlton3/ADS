<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('address')->get();

        return view('admin.index')->with('users', User::paginate(5));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'))->with('error', 'You can\'t edit yourself');
        }
        $currentUser = Auth::user();
        $user = User::find($id);
        if($currentUser == $user){
            return back()->with('error', 'You can\'t edit yourself');
        }
        //user
        $user = User::find($id);
        //Roles
        $roles = Role::all();
        
        return view('admin.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request);
        $user->roles()->sync($request->role);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $currentUser = Auth::user();
        if($currentUser == $user){
            return back();
        }
        else{
            $user->roles()->detach();
            $user->delete();
            return back()->with('success', 'User Deleted');
        }
    }
}
