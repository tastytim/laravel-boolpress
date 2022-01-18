<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        // $role = Auth::user()->role;

        // if($role !=='user'){
        //     throw new HttpException(401, 'Permessi non sifficienti');
        // }
        $userList = User::all();
        return view("admin.users.home", compact('userList'));
    }




    public function edit(User $user){
        return view('admin.users.edit', compact("user"));
    }



    public function update(Request $request, User $user){
        $data = $request->all();

        Validator::make($data,[
            "name" => "min:4",
        ])->validate();

        $user->update($data);
        return redirect()->route("admin.users.show", $user->id)->with("msg","Updated successfully" );
    }




    public function show(User $user){

        return view('admin.users.show', compact('user'));
    }



    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }



}
