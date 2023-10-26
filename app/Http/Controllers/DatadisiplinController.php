<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Datadisiplin;
use App\Models\Jenishukumen;
use Illuminate\Http\Request;
use App\Models\Tambahinstansi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DatadisiplinController extends Controller
{

    //
    public function index()
    {
        // $dadi=Datadisiplin::find(1);
        // $dadi->jenishukumen->id;
        // dd($dadi);
        $datadisiplin=Datadisiplin::all();
        return view('datadisiplin.index',[
            "title"=>"Data Disiplin",
            "data"=>$datadisiplin
        ]);
    }

    public function create():View
    {
        return view('datadisiplin.create')->with([
            "title"=>"Tambah Data Pegawai",
            "data"=>Tambahinstansi::all(),
            "tmbh"=>Jenishukumen::all()
        ]);
    }

    public function store(Request $request):RedirectResponse
    {
        // dd($request);
        $request->validate([
            "name"=>"required",
            "nip"=>"required",
            "pangkat_gol"=>"required",
            "no_keputusan"=>"required",
            "tgl_penjatuhan"=>"required",
            "penandatangan"=>"required",
            "file"=>"required|mimes:pdf",
            "tambahinstansi_id"=>"required",
            "jenishukumen_id"=>"required",
            "user_id"=>"required"
        ]);
        // dd($request);

        $file = $request->file('file');
        $nama_file = 'file' .date('Y').'.'.$request->file('file')->getClientOriginalExtension();
        $file->move('file/',$nama_file);

        Datadisiplin::create($request->all());
        return redirect()->route('datadisiplin.index')->with('success','Data Pegawai Berhasih Ditambahkan');
    }

    public function edit(Datadisiplin $datadisiplin):View
    {
        return view('Datadisiplin.edit',compact('datadisiplin'))->with([
            "title" => "Ubah Data Pegawai",
            "data" => Tambahinstansi::all(),
            "tmbh" => Jenishukumen::all()
        ]);
    }

    public function update(Request $request, Datadisiplin $datadisiplin):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "nip"=>"required",
            "pangkat_gol"=>"required",
            "no_keputusan"=>"required",
            "tgl_penjatuhan"=>"required",
            "penandatangan"=>"required",
            "tambahinstansi_id"=>"required",
            "jenishukuman_id"=>"required"
        ]);

        $datadisiplin->update($request->all());

        return redirect()->route('datadisiplin.index')
                        ->with('updated','Data Pegawai Berhasil Diubah');
    }

    public function show(Datadisiplin $datadisiplin):View
    {
        // $datadisiplin=$datadisiplin;
        return view('datadisiplin.show')->with([
            "title" => "Tampil Data Disiplin",
            "data" =>$datadisiplin
        ]);
    }

    public function destroy($id):RedirectResponse
    {
        Datadisiplin::where('id',$id)->delete();
        return redirect()->route('datadisiplin.index')->with('deleted','Data Berhasil Dihapus');
    }

}
