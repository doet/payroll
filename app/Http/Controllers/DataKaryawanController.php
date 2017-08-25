<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\menuadmin;

use DB;
use Auth;

class DataKaryawanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function mkaryawan(){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','mkaryawan')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);

        $lokasi = DB::table('syn_m_lokasi')->get();

        return view('backend.mkaryawan', compact('multilevel','aktif_menu','index','lokasi'));

    }

    public function detail($e){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','mkaryawan')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);
        return view('backend.subdatakaryawan.detail', compact('multilevel','aktif_menu','index','e'));
    }
}
