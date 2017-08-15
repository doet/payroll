<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\menuadmin;

use DB;
use Auth;

class SubMasterParameterController extends Controller
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
    public function derectorat()    { return view('backend.subparameter.derectorat');  }
    public function divisi()        { return view('backend.subparameter.divisi');      }
    public function departement()   { return view('backend.subparameter.departement'); }
    public function costofsales()   { return view('backend.subparameter.costofsales'); }
    public function title()         { return view('backend.subparameter.title');       }
    public function grade()         { return view('backend.subparameter.grade');       }
    public function level()         { return view('backend.subparameter.level');       }
}
