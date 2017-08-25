<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\menuadmin;


use DB;
use Auth;

class AttController extends Controller
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

    public function uloadxls(){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','uloadxls')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);
        return view('backend.att.uploadxls', compact('multilevel','aktif_menu'));
    }

}
