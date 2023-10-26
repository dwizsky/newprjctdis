<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Jenishukumen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JenishukumanController extends Controller
{
    //
    public function index()
    {
        return view('jenishukuman.jenishukuman', [
            "title" => "Tambah Jenis Hukuman",
            "data" => Jenishukumen::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
{
        $request->validate([
            "JenisHukuman" => "required",
            "description" => "nullable",
        ]);


        Jenishukumen::create($request->all());


        return redirect()->route('jenishukuman.index')->with('success','Jenis Hukuman Berhasil Ditambahkan.');
}

public function edit(Jenishukumen $jenishukuman): View
    {
        return view('jenishukuman.edit', compact('jenishukuman'))->with(["title" => "Edit Jenis Hukuman"]);
    }

public function update(Request $request, Jenishukumen $jenishukuman):RedirectResponse
    {
        $request->validate([
            "JenisHukuman" => "required",
            "description" => "required",
        ]);


        $jenishukuman->update($request->all());
        return redirect()->route('jenishukuman.index')->with('updated','Jenis Hukuman Berhasil Diubah.');
    }

}
