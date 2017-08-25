<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

USE App\Helpers\upah_helpers;

use DB;
use Auth;

class DataKaryawanCrudController extends Controller
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
    public function jqgrid(Request $request){

        $datatb = $request->input('datatb', '');
        //$cari = $request->input('cari', '0');

        $page = $request->input('page', '1');
        $limit = $request->input('rows', '10');
        $sord = $request->input('sord', 'asc');
        $saring ='';

        if ($request->input('lokasi')){
            if ($request->input('lokasi')==null) $value = NULL; else $value = $request->input('lokasi');
                $cari = 'lokasi';
                $cari2 = '=';
        } else {
            $cari = 'lokasi';
            $cari2 = '!=';
            $value = 'i';
        }

        // if ( $request->input('_search') == 'true') {
        //   $saring=json_decode($request->input('filters'));
        //     print_r($saring->rules[0]->field);
        //
        //     if ($saring->rules[0]->field == 'lokasi') $field = 'syn_m_lokasi.loc_name';
        //     //{"groupOp":"AND","rules":[{"field":"lokasi","op":"cn","data":"groupOp"}]}
        //   //}
        // }
        //   $cari = 'lokasi';
        //   $cari2 = 'LIKE';
        //   $value = '%002%';



    // Menentukan Jumlah Query //
        switch ($datatb) {
            case 'pegawai':   // Variabel Master
                $sidx = $request->input('sidx', 'payroll_id');
                $count = DB::table('syn_m_karyawan')
//                  ->where($cari,$cari2,$value)
                  // ->where(function ($qy) use ($request) {
                  //
                  // //  if ($saring != '') $qy->where($saring->rules[0]->field, '=', 's');
                  //   if ($request->input('lokasi'))$qy->where('lokasi', '=', $request->input('lokasi'));
                  //
                  //
                  // })
                  ->count();
            break;
        }

    // Membagi Query //
        if( $count > 0 ) {
            $total_pages = ceil($count/$limit);    //calculating total number of pages
        } else {
            $total_pages = 0;
        }

        if ($page > $total_pages) $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        $start = ($start<0)?0:$start;  // make sure that $start is not a negative value

        $responce['page'] = $page;
        $responce['total'] = $total_pages;
        $responce['records'] = $count;

        // $saring=json_decode($request->input('filters'));
        // if ($request->input('_search') == 'true') {
        //   for( $i=0 ; $i < count($saring->rules) ; $i++ ){
        //     $responce['CON']=$saring->rules[$i]->data;
        //
        // }

    // Mengambil Nilai Query //
        switch ($datatb) {
            case 'pegawai':   // Vaariabel Master
                $query = DB::table('syn_m_karyawan')
//                  ->where($cari,$cari2,$value)
                  ->where(function ($qy) use ($request) {

                  //  if ($request->input('lokasi'))$qy->where('lokasi', '=', $request->input('lokasi'));
                    if ($request->input('_search') == 'true') {
                      $saring=json_decode($request->input('filters'));
                      for( $i=0 ; $i < count($saring->rules) ; $i++ ){
                        
                        if ($saring->rules[$i]->field == 'lokasi') {
                          $field = 'syn_m_lokasi.loc_name';
                        } else if ($saring->rules[$i]->field == 'dept_name') {
                          $field = 'syn_m_dept.dept_name';
                        } else if ($saring->rules[$i]->field == 'dept_name') {
                          $field = 'syn_m_division.div_name';
                        } else if ($saring->rules[$i]->field == 'title_name') {
                          $field = 'syn_m_title.title';
                        } else {
                          $field = $saring->rules[$i]->field;
                        }

                        if ($saring != '') $qy->where($field, 'Like', $saring->rules[$i]->data.'%');
                      }
                    }
                  })

                    ->leftJoin('syn_m_dept','syn_m_dept.dept_code','syn_m_karyawan.dept_id')
                    ->leftJoin('syn_m_division','syn_m_division.div_code','syn_m_karyawan.div_id')
                    ->leftJoin('syn_m_title','syn_m_title.title_code','syn_m_karyawan.title')
                    ->leftJoin('syn_m_lokasi','syn_m_lokasi.loc_code','syn_m_karyawan.lokasi')
                    ->orderBy('tgl_keluar', 'asc')
                    ->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get(array('syn_m_karyawan.*','syn_m_dept.dept_name','syn_m_division.div_name','syn_m_title.title as title_name','syn_m_lokasi.loc_name') );

            break;
        }

        $i=0;
        foreach($query as $row) {
            switch ($datatb) {
                case 'pegawai':   // Variabel Master

                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->payroll_id,
                        $row->nama_karyawan,
                        $row->dept_name,
                        $row->div_name,
                        $row->title_name,
                        $row->loc_name,
                        $row->tgl_keluar,
                    );
                    $i++;
                break;
            }
        }
        return  Response()->json($responce);
    }

    public function json(Request $request){
        $datatb = $request->input('datatb','');
        $oper = $request->input('oper','');
        $id = $request->input('id','');
        $cari = $request->input('cari','');

        switch ($datatb) {
            case 'rekamgaji':

                $tmp=array();
                $jenis=['upahpokok','upahharian'];
                $setdate=strtotime($request->input('setdate'));
                foreach($jenis as $row){
                    for ($i=1; $i <= date('m',$setdate);$i++){
                        $timestamp = strtotime('1-'.$i.'-'.date('Y',$setdate));

                        $hasil=upah_helpers::rekamupah($id,$row,$timestamp);
                       // $hasil = $row;
                        array_push($tmp,$hasil);
                    }
                }

                return $tmp;
            break;
        }
    }
}
