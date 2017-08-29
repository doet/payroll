<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Helpers\upah_helpers;

use App\menuadmin;

use DB;
use Auth;

class PayrollCrudController extends Controller
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
        $sdate = $request->input('start');
        $edate = $request->input('end');
$sdate='16 Dec 2016';
$edate='15 Jan 2017';

    // Menentukan Jumlah Query //
        switch ($datatb) {
            case 'upah':   // Variabel Master
                if ($request->input('id_u')){
                    if ($request->input('id_u')==null) $value = NULL; else $value = $request->input('id_u');

                        $cari = 'payroll_id';
                        $cari2 = '=';

                } else {
                    $cari = 'payroll_id';
                    $cari2 = '!=';
                    $value = 'i';
                }

                $sidx = $request->input('sidx', 'payroll_id');
                $count = DB::table('syn_m_karyawan')->where($cari,$cari2,$value)->count();
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


    // Mengambil Nilai Query //
        switch ($datatb) {
            case 'upah':   // Vaariabel Master
                $query = DB::table('syn_m_karyawan')->where($cari,$cari2,$value)
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
                case 'upah':   // Variabel Master
                    $tjpokok = 3078057;
                    $tjprestasi= 0;
                    $um=10000;
                    $tp=7000;
                    $shift=5000;
                    $lembur=$tjpokok/173*1;

                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        $row->payroll_id,
                        $row->nama_karyawan,
                        upah_helpers::RekapAbsen($row->payroll_id,'',$sdate,$edate)['hk'],
                        upah_helpers::upah($row->payroll_id,'upahpokok',$start),
                        $tjprestasi,
                        //upah_helpers::RekapAbsen($row->payroll_id,'lembur',0,0)['mk'],
                        $lembur


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
            case 'isidatagaji':
                $tmp=array();
                $jenis=array();

                $grouptunjangan = DB::table('syn_tunjangan')
                  ->where('berlaku','<=',strtotime($request->input('setdate')))
                  ->orderBy('berlaku','desc')
                  ->get();
                foreach ($grouptunjangan as $row ) {
                  array_push($jenis,$row->jenis);
                }
                $jenistunjangan = array_unique($jenis);

                // $jenistunjangan=array(
                //     'otkomunikasi','otkontribusi','otrelokasi','cktransport','ckmakan','khk','ckshift','lembur','ilembur','itonase','ilapangan',
                //     'bpjstk','bpjskes','manulife','fixintentive','iuranpensiun','carallowance','driverallowance','spbcs',
                //
                //     'upahpokok','upahharian','tkontribusi','tprestasi','makan','transport','trelokasi','tjabatan','tkomunikasi','finsentif','skill','shift','insentif');

                foreach ($jenistunjangan as $key ) {
                  $tunjangan = DB::table('syn_tunjangan')
                    ->where('payroll_id',$id)
                    ->where('jenis',$key)
                    ->where('berlaku','<=',strtotime($request->input('setdate')))
                    ->orderBy('berlaku','desc')
                    ->first();
                  array_push($tmp,$tunjangan);
                }

                return $tmp;
            break;

            case 'att':

                /// baca sekalian save k database ///

                $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
                //$reader = ReaderFactory::create(Type::CSV); // for CSV files
                //$reader = ReaderFactory::create(Type::ODS); // for ODS files

                $reader->open("D:/xampp/htdocs/bcs/public/att/att.xlsx");

                $arrytmp=$tmp=$header=$isinya=array();
                $tgl=array('Payroll ID','Nama','jenis');
                $l=$cek=0;
                foreach ($reader->getSheetIterator() as $sheet) {
                    foreach ($sheet->getRowIterator() as $row) {
                         if ($l==0){
                            for( $i=0 ; $i < count($row) ; $i++ ){
                                if ($i<=2){
                                    array_push($header, $row[$i]);
                                } else {
                                    array_push($header, $row[$i]);

                                    foreach ($row[$i] as $key => $value) {
                                        $arrytmp[$key] = $value;
                                    }
                                    $extgl = explode(' ',$arrytmp['date']);
                                    $extgl2 = explode('-',$extgl[0]);
                                    array_push($tgl, $extgl2[2]);
                                }
                            }
                        }else{
                            $isinya[$l]=array();
                            for( $i=0 ; $i < count($row) ; $i++ ){
                                array_push($isinya[$l], $row[$i]);

                                if ($i>=3){
                                     $datanya=array(
                                        'payroll_id'=>$row[0],
                                        'jenis'     =>$row[2],
                                        'nilai'     =>$row[$i],
                                        'tgl'       =>$tgl[$i],
                                        'updated_at'=>date("Y-m-d H:i:s")
                                    );
                                    //if($row[$i])DB::table('syn_att')->insert($datanya);
                                }
                            }
                        }
                        $l++;
                    }
                }

                $tmp['header']=$tgl;
                $tmp['isinya']=$isinya;
                return $tmp;
            break;
        }
    }

    public function save(Request $request){
        $datatb = $request->input('datatb', '');
        $cari = $request->input('cari', '0');
        $oper = $request->input('oper');
        $id = $request->input('id');

        switch ($datatb) {
            case 'datagaji':            
                $setdate=strtotime($request->input('setdate'));
                foreach($request->get('dgaji') as $key=>$value){
                    $datanya=array(
                        'payroll_id' => $request->input('payroll_id'),
                        'jenis' => str_replace("'","", $key),
                        'value' => str_replace(",","", $value),
                        'berlaku' => $setdate,
                        'updated_at' =>date("Y-m-d H:i:s")
                    );
                    $tunjangan = DB::table('syn_tunjangan')
                        ->where('payroll_id',$request->input('payroll_id'))
                        ->where('berlaku','<=',$setdate)
                        ->where('jenis',str_replace("'","", $key))
                        ->orderBy('berlaku','desc')
                        //->where('berlaku',strtotime($request->input('setdate')))
                        ->first();
                    if (!$tunjangan){
                        DB::table('syn_tunjangan')->insert($datanya);
                    } else {
                        if ($tunjangan->berlaku == $setdate AND $tunjangan->value != $value) {
                            DB::table('syn_tunjangan')->where('id', $tunjangan->id)->update($datanya);
                        } else if ($tunjangan->berlaku != $setdate AND $tunjangan->value != $value) {
                            DB::table('syn_tunjangan')->insert($datanya);
                        }
                    }
                }

                foreach($request->get('dpotong') as $key=>$value){
                    $datanya=array(
                        'payroll_id' => $request->input('payroll_id'),
                        'jenis' => str_replace("'","", $key),
                        'value' => str_replace(",","", $value),
                        'berlaku' => $setdate,
                        'updated_at' =>date("Y-m-d H:i:s")
                    );
                    $potong = DB::table('syn_potongan')
                        ->where('payroll_id',$request->input('payroll_id'))
                        ->where('berlaku','<=',$setdate)
                        ->where('jenis',str_replace("'","", $key))
                        ->orderBy('berlaku','desc')
                        //->where('berlaku',strtotime($request->input('setdate')))
                        ->first();
                    if (!$potong){
                        DB::table('syn_potongan')->insert($datanya);
                    } else {
                        if ($potong->berlaku == $setdate AND $potong->value != $value) {
                            DB::table('syn_potongan')->where('id', $potong->id)->update($datanya);
                        } else if ($potong->berlaku != $setdate AND $potong->value != $value) {
                            DB::table('syn_potongan')->insert($datanya);
                        }
                    }
                }

                $response = array(
                    'status' => 'success',
                    //'msg' => date('y m d',$setdate),
                    'msg' =>'save',
                );
                return $response;
            break;
            case 'uploadfile':

                if(isset($_FILES)){
                    $ret = array();
                    $path= public_path().'\\att\\';
                    if (!is_dir($path)) mkdir($path);

                    print_r($_FILES['file']);

                    $name = explode('.', $_FILES['file']['name']);
                    if ($name[1]=='xlsx' || $name[1]=='xls'){
                        $fileName = $name[0].'-'.strtotime(date('d-m-Y')).'.'.$name[1];
                    }

//                    $fileName   = $_FILES['file']['name'];
                    $file       = $path.$fileName;


                    //simpan file ukuran sebenernya
                    $realImagesName     = $_FILES["file"]["tmp_name"];
                    move_uploaded_file($realImagesName, $file);

                }
            break;
        }
    }

}
