<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index',[
            "title"=>"Data Pengguna",
            "data"=>User::all()
        ]);
    }

    public function create():View
    {
        return view('user.tambah')->with(["title" => "Tambah Data Users"]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"email:dns",
            "password"=>"required"
        ]);
            $password=Hash::make($request->password);
            $request->merge([
                "password"=>$password
            ]);

            User::create($request->all());

            return redirect()->route('pengguna.index')->with('success','Data User Berhasil Ditambahkan');
    }

    public function edit(User $pengguna):View
    {
        return view('user.edit',compact('pengguna'))->with(["title" => "Ubah Data User"]);
    }

    public function update(Request $request, User $pengguna):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"email:dns",
            "password"=>"required"
        ]);
            $password=Hash::make($request->password);
            $request->merge([
                "password"=>$password
            ]);

        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')
                        ->with('updated','Data User Berhasil Diubah');
    }
}
