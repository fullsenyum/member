<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
    return view('users.index')->with('user',$user);
    }

    public function create(){
    return view('users.create');
    }

    public function store(Request $request){
        $request->validate([
            'nik' => ['required', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'foto' => ['required','max:10000','mimes:jpeg,png,jpg,gif'],
        ]);

        $user = new User();
        $user->nik = $request->nik;
        $user->name = $request->name;
        $user->nohp = $request->nohp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->jk = $request->jk;
        $user->tglahir = $request->tglahir;
        $user->foto = $request->file('foto')->hashName();
        $user->save();
        $request->foto->store('public');
        return redirect(route('users.index'));

    }

    public function edit($id){
        $user = User::find($id);
        if (empty($user)) {
            return redirect(route('users.index'));
        }
        return view('users.edit')->with(['users'=>$user]);
    }

    public function update($id,Request $request){
        $user = User::find($id);
        if (empty($user)) {
            return redirect(route('users.index'));
        }
        $request->validate([
            'nik' => ['required', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:255'],
            'foto' => ['required','max:10000','mimes:jpeg,png,jpg,gif']
        ]);

        if($request->password!=""){
            $user->nik = $request->nik;
            $user->name = $request->name;
            $user->nohp = $request->nohp;
            $user->email = $request->email;
            $user->jk = $request->jk;
            $user->tglahir = $request->tglahir;
            $user->foto = $request->file('foto')->hashName();
            $user->save();
        }else{
            $user->nik = $request->nik;
            $user->name = $request->name;
            $user->nohp = $request->nohp;
            $user->email = $request->email;
            $user->jk = $request->jk;
            $user->tglahir = $request->tglahir;
            $user->foto = $request->file('foto')->hashName();
            $user->save();
        }
        $request->foto->store('public');
        return redirect(route('users.index'));

    }

    public function destroy($id){
        $user = User::find($id);
        if (empty($user)) {
            return redirect(route('users.index'));
        }
        $user->delete($id);
        return redirect(route('users.index'));
    }

    public function listjson(){
        $user = User::all()->toJson();
        return view('users.listjson')->with(['listuser'=>$user]);
    }

    public function profile(){
        $user = User::where('id',Auth::user()->id);
        return view('users.profile')->with(['user'=>$user]);
    }
}
