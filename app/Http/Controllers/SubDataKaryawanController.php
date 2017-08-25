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
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')
            ->leftJoin('syn_m_lokasi','syn_m_lokasi.loc_code','syn_m_karyawan.lokasi')
            ->leftJoin('syn_m_grade','syn_m_grade.grade_code','syn_m_karyawan.grade')
            ->leftJoin('syn_m_level','syn_m_level.level_code','syn_m_karyawan.level')            
            ->first();
        return view('backend.subdatakaryawan.datapegawai',compact('data')); 
    }
    public function datagaji($e){
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')
            ->first();
        

        return view('backend.subdatakaryawan.datagaji',compact('data')); 
    }
    public function datakeluarga($e){
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')
            ->first();
        $keluarga = DB::table('syn_m_keluarga')->where('syn_m_keluarga.no_kk',$data->no_kk)
            ->leftJoin('syn_m_relasi','syn_m_relasi.code','syn_m_keluarga.hubungan')            
            ->get();

        return view('backend.subdatakaryawan.datakeluarga',compact('data','keluarga')); 
    }
    public function datatraining($e){
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')            
            ->first();
        $training = DB::table('syn_trans_training_detail')->where('syn_trans_training_detail.payroll_id',$data->payroll_id)
            ->leftJoin('syn_trans_training_header','syn_trans_training_header.id','syn_trans_training_detail.id_training')
            ->get();

        return view('backend.subdatakaryawan.datatraining',compact('data','training')); 
    }
    public function rekampembinaan($e){
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')            
            ->first();
        $bina = DB::table('sys_trans_warning')->where('sys_trans_warning.payroll_id',$data->payroll_id)           
            ->get();

        return view('backend.subdatakaryawan.rekampembinaan',compact('data','bina')); 
    }
    public function rekamgaji($e){        
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')            
            ->first();
        $bina = DB::table('sys_trans_warning')->where('sys_trans_warning.payroll_id',$data->payroll_id)           
            ->get();

        return view('backend.subdatakaryawan.rekamgaji',compact('data','bina')); 
    }
    public function rekamperubahan($e){
        $data = DB::table('syn_m_karyawan')->where('syn_m_karyawan.id',$e)
            ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
            ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
            ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
            ->leftJoin('syn_m_directorat','syn_m_directorat.dir_code','syn_m_karyawan.dir_id')            
            ->first();
        $keluarga = DB::table('syn_m_keluarga')->where('syn_m_keluarga.no_kk',$data->no_kk)
            ->leftJoin('syn_m_relasi','syn_m_relasi.code','syn_m_keluarga.hubungan')            
            ->get();


        return view('backend.subdatakaryawan.rekamperubahan',compact('data','keluarga'));
    }
}
