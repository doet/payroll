<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\menuadmin;

use DB;
use Auth;

class PayrollController extends Controller
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
    public function file(){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','file')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);
        return view('backend.att.file', compact('multilevel','aktif_menu'));
    }

    public function rupah(){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','rupah')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);

        $karyawan   = DB::table('syn_m_karyawans')->get();
        return view('backend.payroll.upah', compact('multilevel','aktif_menu','karyawan'));
    }

}
