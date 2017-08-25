<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\menuadmin;

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

use DB;
use Auth;
use File;

class AttCrudController extends Controller
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

                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        $row->payroll_id,
                        $row->nama_karyawan,

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
            //$tree_data_2=array();
            case 'file':
/*                $tree_data_2['status']="OK" ;

                $query = DB::table('tb_file')->where('parent_id',$id)->get();
                $i=0;
                foreach($query as $row) {


                    if ($id == 0) {
                        $tree_data_2['data'][$i]['text'] =  $row->label;
                        $tree_data_2['data'][$i]['icon-class'] = "red";
                        $tree_data_2['data'][$i]['type'] = 'folder';
                        $tree_data_2['data'][$i]['additionalParameters']['id'] = $row->id;
                        $tree_data_2['data'][$i]['additionalParameters']['children'] = true;
                    }else{
                        $tree_data_2['data'][$i]['text'] =  '<i class="ace-icon fa fa-file-excel-o blue"></i>'.$row->label;
                        $tree_data_2['data'][$i]['type'] = 'item';
                    }
                    $i++;
                } */

                $tree_data_2['status']="OK" ;

                $query = DB::table('tb_file')->where('parent_id',$id)->get();
                $i=0;

                if ($id == 0) {
                    $tree_data_2['data'][0]['text'] = 'att Normal';
                    $tree_data_2['data'][0]['icon-class'] = "red";
                    $tree_data_2['data'][0]['type'] = 'folder';
                    $tree_data_2['data'][0]['additionalParameters']['id'] = 1;
                    $tree_data_2['data'][0]['additionalParameters']['children'] = true;

                    $tree_data_2['data'][1]['text'] = 'att Lembur';
                    $tree_data_2['data'][1]['icon-class'] = "red";
                    $tree_data_2['data'][1]['type'] = 'folder';
                    $tree_data_2['data'][1]['additionalParameters']['id'] = 2;
                    $tree_data_2['data'][1]['additionalParameters']['children'] = true;
                }else{

                    // Buka Folder
                    $folder = "./att/"; //Sesuaikan Folder nya
                    if(!($buka_folder = opendir($folder))) die ("eRorr... Tidak bisa membuka Folder");

                    $file_array = array();
                    $filterfile=0;
                    while($baca_folder = readdir($buka_folder)){

                        if($id == 1)$filterfile = strpos($baca_folder,"normal"); else $filterfile = strpos($baca_folder,"lembur");

                        if ($filterfile) $file_array[] = $baca_folder;
                    }

                    $jumlah_array = count($file_array);
                    for($i=0; $i<$jumlah_array; $i++){
                        $nama_file = $file_array;
                        //echo "$nama_file[$i-2] (". round(filesize($nama_file[$i])/1024,1) . "kb)<br/>";
                        $tree_data_2['data'][$i]['text'] =  '<i class="ace-icon fa fa-file-excel-o blue"></i>'.$nama_file[$i];
                        $tree_data_2['data'][$i]['fname'] =  $nama_file[$i];
                        $tree_data_2['data'][$i]['type'] = 'item';
                    }

                    closedir($buka_folder);

                }

                return $tree_data_2;
            break;

            case 'att':

                $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
                //$reader = ReaderFactory::create(Type::CSV); // for CSV files
                //$reader = ReaderFactory::create(Type::ODS); // for ODS files
                if ($request->input('fname'))$fname = $request->input('fname'); else $fname = 'default/att_normal.xlsx';
                $reader->open(public_path().'\att\/'.$fname);

                $arrytmp=$tmp=$header=$isinya=array();
                $tgl=array('ID','Nama','Jenis');
                $tgllibur=array(0,0,0);
                $priode=array(0,0,0);
                $l=0;
                $tmp['nfile']=$request->input('fname');
                foreach ($reader->getSheetIterator() as $sheet) {
                    foreach ($sheet->getRowIterator() as $row) {
                        if ($l==0){
                            for( $i=0 ; $i < count($row) ; $i++ ){
                                if ($i<=2){
                                    array_push($header, $row[$i]);
                                } else {
                                    array_push($header, $row[$i]);

                                    if (!$row[$i])return $tmp;

                                    foreach ($row[$i] as $key => $value) {
                                        $arrytmp[$key] = $value;
                                    }
                                    $extgl = explode(' ',$arrytmp['date']);
                                    $extgl2 = explode('-',$extgl[0]);

                                    array_push($priode,strtotime($extgl[0]));

                                    $cek1=DB::table('tb_libur')->where('tgllibur',strtotime($extgl[0]))->first();
                                    $ceklibur=1;

                                    if ($cek1){
                                        $tglatt = "<font color='red'>".$extgl2[2]."</font>";
                                    } else {
                                        $tglatt = $extgl2[2];
                                        $ceklibur=0;
                                    }
                                    array_push($tgllibur, $ceklibur);
                                    array_push($tgl, $tglatt);
                                }
                            }
                        }else{
                            $isinya[$l]=array();
                            for( $i=0 ; $i < count($row) ; $i++ ){

                                if ($tgllibur[$i]==1)$is = "<font color='red'>".$row[$i]."</font>"; else $is = $row[$i];
                                array_push($isinya[$l], $is);


                                if ($i>=3){
                                     $datanya=array(
                                        'payroll_id'=>$row[0],
                                        'jenis'     =>$row[2],
                                        'nilai'     =>$row[$i],
                                        'tgl'       =>$tgl[$i],
                                        'updated_at'=>date("Y-m-d H:i:s")
                                    );
                                    //if($row[$i])DB::table('tb_att')->insert($datanya);
                                }
                                if ($request->input('fname'))$tmp['priode'] = date('d M Y',$priode[3]) .' - '. date('d M Y',$priode[$i]); else $tmp['priode'] = '';
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
          case 'uploadfile':

            if(isset($_FILES)){
              $ret = array();
              $path= public_path().'\att\/';

              if (!is_dir($path)) File::makeDirectory($path);
              //print_r($_FILES['file']);
              $fs = $request->file('file');
              $fn = $fs->getClientOriginalName();


              print_r($path);

              $name = explode('.', $fs->getClientOriginalName());
              if ($name[1]=='xlsx' || $name[1]=='xls'){
                  $fileName = $name[0].'-'.strtotime(date('d-m-Y')).'.'.$name[1];
              }

              // $fileName   = $_FILES['file']['name'];
              // $file       = $path.$fileName;

              //simpan file ukuran sebenernya
            //  $realImagesName     = $_FILES["file"]["tmp_name"];
            //  move_uploaded_file($realImagesName, $file);

              $request->file('file')->move("att/", $fileName);
            }
          break;

            case 'delfile':
                $fileName = $request->input('fname');
                $path= public_path().'\att\/';

                $file       = $path.$fileName;

                unlink($file);
            break;
            case 'savetodb':
                /// baca sekalian save k database ///

                $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
                //$reader = ReaderFactory::create(Type::CSV); // for CSV files
                //$reader = ReaderFactory::create(Type::ODS); // for ODS files
                if ($request->input('fname'))$fname = $request->input('fname'); else return;
                $reader->open(public_path().'\att\/'.$fname);

                $tmp=$isinya=array();
                $tgl=array('ID','Nama','Jenis');
                $arrytmp=$header=$tgllibur=$priode=array(0,0,0);
                $l=0;
                $tmp['nfile']=$request->input('fname');
                foreach ($reader->getSheetIterator() as $sheet) {
                    foreach ($sheet->getRowIterator() as $row) {
                        if ($l==0){
                            for( $i=0 ; $i < count($row) ; $i++ ){
                                if ($i<=2){

                                } else {

                                    if (!$row[$i])return $tmp;

                                    foreach ($row[$i] as $key => $value) {
                                        $arrytmp[$key] = $value;
                                    }
                                    $extgl = explode(' ',$arrytmp['date']);
                                    array_push($tgl, $extgl[0]);
                                }
                            }
                        }else{
                            $isinya[$l]=array();
                            for( $i=0 ; $i < count($row) ; $i++ ){

                                if ($i>=3){
                                     $datanya=array(
                                        'payroll_id'=>$row[0],
                                        'jenis'     =>$row[2],
                                        'nilai'     =>$row[$i],
                                        'tgl'       =>strtotime($tgl[$i]),
                                        'updated_at'=>date("Y-m-d H:i:s")
                                    );


                                    if (strpos($fname, 'normal') == true){
                                        $cek = DB::table('tb_att')
                                            ->where('payroll_id',$row[0])
                                            ->where('jenis',$row[2])
                                            ->where('tgl',strtotime($tgl[$i]))
                                            ->first();

                                        if(!$cek) {
                                            if($row[$i])DB::table('tb_att')->insert($datanya);
                                        } else if ($cek->nilai != $row[$i]) {
                                            DB::table('tb_att')->where('id',$cek->id)->update($datanya);
                                        }
                                    } else if (strpos($fname, 'lembur') == true){
                                        $cek = DB::table('tb_att_lembur')
                                            ->where('payroll_id',$row[0])
                                            ->where('jenis',$row[2])
                                            ->where('tgl',strtotime($tgl[$i]))
                                            ->first();

                                        if(!$cek) {
                                            if($row[$i])DB::table('tb_att_lembur')->insert($datanya);
                                        } else if ($cek->nilai != $row[$i]) {
                                            DB::table('tb_att_lembur')->where('id',$cek->id)->update($datanya);
                                        }
                                    }
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

}
