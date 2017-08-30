<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use DB;
use Auth;

class SubDataKaryawanController extends Controller
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
    public function datapegawai($e){
        // $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
        //     ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
        //
        //
        //
        //
        //     ->leftJoin('syn_m_grades','syn_m_grade.grades_code','syn_m_karyawans.grade')
        //     ->leftJoin('syn_m_levels','syn_m_level.levels_code','syn_m_karyawans.level')
        //     ->first();
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
          ->leftJoin('syn_m_lokasis','syn_m_lokasis.loc_code','syn_m_karyawans.lokasi')
          ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
          ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
          ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
          ->first();

        return view('backend.subdatakaryawan.datapegawai',compact('data'));
    }
    public function datagaji($e){
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
          ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
          ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
          ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
          ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
          ->first();
        return view('backend.subdatakaryawan.datagaji',compact('data'));
    }
    public function datakeluarga($e){
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
            ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
            ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
            ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
            ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
            ->first();
        $keluarga = DB::table('syn_m_keluargas')->where('syn_m_keluargas.no_kk',$data->no_kk)
            ->leftJoin('syn_m_relases','syn_m_relases.code','syn_m_keluargas.hubungan')
            ->get();

        return view('backend.subdatakaryawan.datakeluarga',compact('data','keluarga'));
    }
    public function datatraining($e){
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
            ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
            ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
            ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
            ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
            ->first();
        $training = DB::table('syn_trans_training_details')->where('syn_trans_training_details.payroll_id',$data->payroll_id)
            ->leftJoin('syn_trans_training_headers','syn_trans_training_headers.id','syn_trans_training_details.id_training')
            ->get();

        return view('backend.subdatakaryawan.datatraining',compact('data','training'));
    }
    public function rekampembinaan($e){
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
            ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
            ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
            ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
            ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
            ->first();
        $bina = DB::table('sys_trans_warnings')->where('sys_trans_warnings.payroll_id',$data->payroll_id)
            ->get();

        return view('backend.subdatakaryawan.rekampembinaan',compact('data','bina'));
    }
    public function rekamgaji($e){
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
            ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
            ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
            ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
            ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
            ->first();
        $bina = DB::table('sys_trans_warnings')->where('sys_trans_warnings.payroll_id',$data->payroll_id)
            ->get();

        return view('backend.subdatakaryawan.rekamgaji',compact('data','bina'));
    }
    public function rekamperubahan($e){
        $data = DB::table('syn_m_karyawans')->where('syn_m_karyawans.id',$e)
            ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
            ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
            ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
            ->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_karyawans.dir_id')
            ->first();
        $keluarga = DB::table('syn_m_keluargas')->where('syn_m_keluargas.no_kk',$data->no_kk)
            ->leftJoin('syn_m_relases','syn_m_relases.code','syn_m_keluargas.hubungan')
            ->get();


        return view('backend.subdatakaryawan.rekamperubahan',compact('data','keluarga'));
    }
}
