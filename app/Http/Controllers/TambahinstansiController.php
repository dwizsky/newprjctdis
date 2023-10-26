<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Tambahinstansi;
use Illuminate\Http\RedirectResponse;

class TambahinstansiController extends Controller
{
    //
    public function index()
    {
        return view('tambahinstansi.tambahinstansi', [
            "title" => "Tambah Instansi",
            "data" => Tambahinstansi::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
{
        $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);


        Tambahinstansi::create($request->all());


        return redirect()->route('tambahinstansi.index')->with('success','Instansi Berhasil Ditambahkan.');
}

public function edit(Tambahinstansi $tambahinstansi): View
    {
        return view('tambahinstansi.edit', compact('tambahinstansi'))->with(["title" => "Edit Instansi"]);
    }

public function update(Request $request, Tambahinstansi $tambahinstansi):RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);


        $tambahinstansi->update($request->all());
        return redirect()->route('tambahinstansi.index')->with('updated','Instansi Berhasil Diubah.');
    }
}
