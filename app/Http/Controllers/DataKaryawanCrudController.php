<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

USE App\Helpers\upah_helpers;
USE App\Helpers\syncdb_helpers;

USE App\Models\syn_karyawans;

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
                $count = DB::table('syn_m_karyawans')
                  ->where(function ($qy) use ($request) {

                  //  if ($request->input('lokasi'))$qy->where('lokasi', '=', $request->input('lokasi'));
                    if ($request->input('_search') == 'true') {
                      $saring=json_decode($request->input('filters'));
                      for( $i=0 ; $i < count($saring->rules) ; $i++ ){

                        if ($saring->rules[$i]->field == 'lokasi') {
                          $field = 'syn_m_lokasis.loc_name';
                        } else if ($saring->rules[$i]->field == 'dept_name') {
                          $field = 'syn_m_depts.dept_name';
                        } else if ($saring->rules[$i]->field == 'div_name') {
                          $field = 'syn_m_divisions.div_name';
                        } else if ($saring->rules[$i]->field == 'title_name') {
                          $field = 'syn_m_titles.title';
                        } else if ($saring->rules[$i]->field == 'payroll') {
                          $field = 'syn_karyawans.payroll_id';
                        } else {
                          $field = $saring->rules[$i]->field;
                        }

                        if ($saring != '') $qy->where($field, 'Like', $saring->rules[$i]->data.'%');
                      }
                    }
                  })

                  ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
                  ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
                  ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
                  ->leftJoin('syn_m_lokasis','syn_m_lokasis.loc_code','syn_m_karyawans.lokasi')

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
                $query = DB::table('syn_m_karyawans')
                  ->where(function ($qy) use ($request) {

                  //  if ($request->input('lokasi'))$qy->where('lokasi', '=', $request->input('lokasi'));
                    if ($request->input('_search') == 'true') {
                      $saring=json_decode($request->input('filters'));
                      for( $i=0 ; $i < count($saring->rules) ; $i++ ){

                        if ($saring->rules[$i]->field == 'lokasi') {
                          $field = 'syn_m_lokasis.loc_name';
                        } else if ($saring->rules[$i]->field == 'dept_name') {
                          $field = 'syn_m_depts.dept_name';
                        } else if ($saring->rules[$i]->field == 'div_name') {
                          $field = 'syn_m_divisions.div_name';
                        } else if ($saring->rules[$i]->field == 'title_name') {
                          $field = 'syn_m_titles.title';
                        } else if ($saring->rules[$i]->field == 'payroll') {
                          $field = 'syn_karyawans.payroll_id';
                        } else {
                          $field = $saring->rules[$i]->field;
                        }

                        if ($saring != '') $qy->where($field, 'Like', $saring->rules[$i]->data.'%');
                      }
                    }
                  })

                  ->leftJoin('syn_m_depts','syn_m_depts.dept_code','syn_m_karyawans.dept_id')
                  ->leftJoin('syn_m_divisions','syn_m_divisions.div_code','syn_m_karyawans.div_id')
                  ->leftJoin('syn_m_titles','syn_m_titles.title_code','syn_m_karyawans.title')
                  ->leftJoin('syn_m_lokasis','syn_m_lokasis.loc_code','syn_m_karyawans.lokasi')
                  ->orderBy('tgl_keluar', 'asc')
                  ->orderBy($sidx, $sord)
                  ->skip($start)->take($limit)

                  ->get(array(
                    'syn_m_karyawans.*',
                    'syn_m_depts.dept_name',
                    'syn_m_divisions.div_name',
                    'syn_m_titles.title',
                    'syn_m_lokasis.loc_name'
                  ));
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
                        $row->title,
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
    public function save(Request $request){
      $datatb = $request->input('datatb','');
      switch ($datatb) {
        case 'tb_karyawans';
          // $syn_titles['removeitems']  = array('created_at','updated_at','id');
          // $syn_titles['where']        = array('title_code');
          // $msg = syncdb_helpers::sync('syn_m_title','syn_m_titles',$syn_titles);

          // $syn_m_directorats['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_directorats['where']        = array('dir_code');
          // $msg = syncdb_helpers::sync('syn_m_directorat','syn_m_directorats',$syn_m_directorats);

          // $syn_m_divisions['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_divisions['where']        = array('div_code');
          // $msg = syncdb_helpers::sync('syn_m_division','syn_m_divisions',$syn_m_divisions);

          // $syn_m_depts['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_depts['where']        = array('dept_code');
          // $msg = syncdb_helpers::sync('syn_m_dept','syn_m_depts',$syn_m_depts);

          // $syn_m_grades['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_grades['where']        = array('grade_code');
          // $msg = syncdb_helpers::sync('syn_m_grade','syn_m_grades',$syn_m_grades);

          // $syn_m_levels['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_levels['where']        = array('level_code');
          // $msg = syncdb_helpers::sync('syn_m_level','syn_m_levels',$syn_m_levels);

          // $syn_m_cost_sales['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_cost_sales['where']        = array('cost_sales_code');
          // $msg = syncdb_helpers::sync('syn_m_cost_sales','syn_m_cost_sales',$syn_m_cost_sales);

          // $syn_m_lokasis['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_lokasis['where']        = array('loc_code');
          // $msg = syncdb_helpers::sync('syn_m_lokasi','syn_m_lokasis',$syn_m_lokasis);

          // $syn_karyawans['removeitems']  = array('created_at','updated_at','id');
          // $syn_karyawans['where']        = array('payroll_id');
          // $syn_karyawans['tanggal']      = array(
          //   'tgl_lahir','tgl_masuk','tgl_keluar','tgl_finish_contract','id_customer_expiredate',
          //   'no_ktp_expiredate','no_sim_a_expiredate','no_sim_b1_expiredate','no_sim_b2_umum_expiredate',
          //   'no_sim_c_expiredate','married_date','npwp_effectivedate','agreement_expire');
          // $msg = syncdb_helpers::sync('syn_m_karyawan','syn_m_karyawans',$syn_karyawans);

          // $syn_m_relases['removeitems']  = array('created_at','updated_at','id');
          // $syn_m_relases['where']        = array('code');
          // $msg = syncdb_helpers::sync('syn_m_relasi','syn_m_relases',$syn_m_relases);

          // $syn_karyawans['removeitems']  = array('created_at','updated_at','id');
          // $syn_karyawans['where']        = array('id');
          // $syn_karyawans['tanggal']      = array('tgl_lahir');
          // $msg = syncdb_helpers::sync('syn_m_keluarga','syn_m_keluargas',$syn_karyawans);

          // $syn_trans_training_headers['removeitems']  = array('created_at','updated_at');
          // $syn_trans_training_headers['where']        = array('id');
          // $syn_trans_training_headers['tanggal']      = array('tanggal_mulai','tanggal_akhir','tanggal_rencana');
          // $msg = syncdb_helpers::sync('syn_trans_training_header','syn_trans_training_headers',$syn_trans_training_headers);

          // $syn_trans_training_details['removeitems']  = array('created_at','updated_at','id');
          // $syn_trans_training_details['where']        = array('id');
          // $syn_trans_training_details['tanggal']      = array('tanggal_mulai','tanggal_akhir');
          // $msg = syncdb_helpers::sync('syn_trans_training_detail','syn_trans_training_details',$syn_trans_training_details);

          $sys_trans_warnings['removeitems']  = array('created_at','updated_at','id');
          $sys_trans_warnings['where']        = array('id');
          $sys_trans_warnings['tanggal']      = array('date','date_incident','due_date');
          $msg = syncdb_helpers::sync('sys_trans_warning','sys_trans_warnings',$sys_trans_warnings);



          // $syn_pkk1s['removeitems']  = array('created_at','updated_at','id');
          // $syn_pkk1s['where']        = array(array('no_kk'=>'','no_kk'=>'null'),'payroll_id');
          // $msg = syncdb_helpers::sync('syn_m_karyawan','syn_pkk1s',$syn_pkk1s);
          //
          // $syn_pkk2s['removeitems']  = array('created_at','updated_at','id','hubungan');
          // $syn_pkk2s['where']        = array(array('hubungan'=>'K'),'payroll_id');
          // $syn_pkk2s['exinput']      = array('hubungan'=>'K');
          // $syn_pkk2s['tanggal']      = array('tgl_lahir');
          // $syn_pkk2s['replace']      = array('nama'=>'nama_karyawan');
          // $msg = syncdb_helpers::sync('syn_m_karyawan','syn_pkk2s',$syn_pkk2s);
          //
          // $syn_pkk2s['removeitems']  = array('created_at','updated_at','id');
          // $syn_pkk2s['where']        = array('no_kk');
          // $syn_pkk2s['tanggal']      = array('tgl_lahir');
          // $syn_pkk2s['replace']      = array('pendidikan_terakhir'=>'pendidikan');
          // $msg = syncdb_helpers::sync('syn_m_keluarga','syn_pkk2s',$syn_pkk2s);


          // $syn_syc='syn_m_karyawan';
          // $db2 = DB::connection('mysql2')->table($syn_syc)->get();
          //
          // $i=1;
          // foreach($db2 as $key => $value){
          //   $cek = syn_karyawans::where('payroll_id',$db2[$key]->payroll_id)->first();
          //
          //
          //
          //   if (!$cek){
          //     $dkaryawan = array(
          //       'payroll_id'                => $db2[$key]->payroll_id,
          //
          //       'tgl_masuk'                 => strtotime($db2[$key]->tgl_masuk),
          //       'reason_in'                 => $db2[$key]->reason_in,
          //
          //       'tgl_keluar'                => strtotime($db2[$key]->tgl_keluar),
          //       'reason_out'                => $db2[$key]->reason_out,
          //
          //       'telp1'                     => $db2[$key]->telp1,
          //       'telp2'                     => $db2[$key]->telp2,
          //
          //       'no_npwp'                   => $db2[$key]->no_npwp,
          //       'npwp_effectivedate'        => strtotime($db2[$key]->npwp_effectivedate),
          //       'alamat_npwp'               => $db2[$key]->alamat_npwp,
          //
          //       // 'npp_bpjs_ketenagakerjaan'  => $db2[$key]->npp_bpjs_ketenagakerjaan,
          //       // 'waktu_bpjs_ketenagakerjaan'=> $db2[$key]->bulan_bpjs_ketenagakerjaan,
          //
          //       'nama_ibu_kandung'          => $db2[$key]->nama_ibu_kandung,
          //       'nama_bank'                 => $db2[$key]->nama_bank,
          //       'no_account_bank'           => $db2[$key]->no_account_bank,
          //       // 'va_bank_kesehatan'         => $db2[$key]->va_bank_kesehatan,
          //       // 'bulan_bpjs_kesehatan'      => $db2[$key]->bulan_bpjs_kesehatan,
          //       // 'kode_faskes'               => $db2[$key]->kode_faskes,
          //       // 'nama_faskes'               => $db2[$key]->nama_faskes,
          //       // 'kode_faskes_dokter_gigi'   => $db2[$key]->kode_faskes_dokter_gigi,
          //       // 'nama_faskes_dokter_gigi'   => $db2[$key]->nama_faskes_dokter_gigi,
          //       'pendidikan_terakhir'       => $db2[$key]->pendidikan_terakhir,
          //       'jurusan'                   => $db2[$key]->jurusan,
          //       'nama_sekolah_terakhir'     => $db2[$key]->nama_sekolah_terakhir,
          //       'tahun_lulus'               => $db2[$key]->tahun_lulus,
          //       'foto'                      => $db2[$key]->foto,
          //       'keterangan'                => $db2[$key]->keterangan,
          //       'aktif'                     => $db2[$key]->aktif,
          //       'active_period'             => $db2[$key]->active_period,
          //       'email'                     => $db2[$key]->email,
          //       'agreement_expire'          => strtotime($db2[$key]->agreement_expire),
          //       'updated_at'                => date("Y-m-d H:i:s")
          //     );
          //     syn_karyawans::insert($dkaryawan);
          //     $msg = $i.' input baru';
          //     $i++;
          //   } else {
          //     $msg = 'update';
          //   }
          //
          // }
          return $msg;
        break;
      }
    }
}
