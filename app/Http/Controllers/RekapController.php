<?php

namespace App\Http\Controllers;

use App\Models\Datadisiplin;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    //
    public function index() {
        $rekap=Datadisiplin::all();
        return view('rekap.rekap',[
            "title"=>"Rekap Data",
            "data"=>$rekap
        ]);
    }
}
