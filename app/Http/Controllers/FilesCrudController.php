<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\menuadmin;
use App\Models\syn_karyawans;

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

use DB;
use Auth;
use File;

class FilesCrudController extends Controller
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
            // view Tree file's
            case 'files':
              $tree_data_2['status']="OK" ;

              if ($id == 0) {

                $tree_data_2['data'][1]['text'] = 'Benefit';
                $tree_data_2['data'][1]['icon-class'] = "red";
                $tree_data_2['data'][1]['type'] = 'folder';
                $tree_data_2['data'][1]['additionalParameters']['id'] = 1;
                $tree_data_2['data'][1]['additionalParameters']['children'] = true;

                $tree_data_2['data'][2]['text'] = 'Potongan';
                $tree_data_2['data'][2]['icon-class'] = "red";
                $tree_data_2['data'][2]['type'] = 'folder';
                $tree_data_2['data'][2]['additionalParameters']['id'] = 2;
                $tree_data_2['data'][2]['additionalParameters']['children'] = true;
              }else{
                //Buka Folder
                $folder = "./files/"; //Sesuaikan Folder nya

                if(!($buka_folder = opendir($folder))) die ("eRorr... Tidak bisa membuka Folder");

                $file_array = array();
                $filterfile=0;

                while($baca_folder = readdir($buka_folder)){
                  if ($id == 1) {
                    $filterfile = strpos($baca_folder,"benefit");
                  } else if ($id == 2){
                    $filterfile = strpos($baca_folder,"potongan");
                  }
                  if ($filterfile) $file_array[] = $baca_folder;
                  $jumlah_array = count($file_array);

                  for($i=0; $i<$jumlah_array; $i++){
                    $nama_file = $file_array;
                    //echo "$nama_file[$i-2] (". round(filesize($nama_file[$i])/1024,1) . "kb)<br/>";
                    $tree_data_2['data'][$i]['text'] =  '<i class="ace-icon fa fa-file-excel-o blue"></i>'.$nama_file[$i];
                    $tree_data_2['data'][$i]['fname'] =  $nama_file[$i];
                    $tree_data_2['data'][$i]['type'] = 'item';
                  }
                }
              }

              return $tree_data_2;
            break;

            case 'benefit':
              $tmp=array();
              $tmp['nfile']=$request->input('fname');

                // // Membuat file
                // $writer = WriterFactory::create(Type::XLSX); // for XLSX files
                // //$writer = WriterFactory::create(Type::CSV); // for CSV files
                // //$writer = WriterFactory::create(Type::ODS); // for ODS files
                //
                // $writer->openToFile(public_path().'\benefit\tabel_benefit-cbl.xlsx'); // write data to a file or to a PHP stream
                // //$writer->openToBrowser($fileName); // stream data directly to the browser
                //
                // $writer->addRow(['b','c']); // add a row at a time
                // $writer->addRow(['1','2']); // add a row at a time
                // //$writer->addRows($multipleRows); // add multiple rows at a time
                //
                // $writer->close();



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
          case 'uploadfiles':

            if(isset($_FILES)){
              $ret = array();
              $path= public_path().'\files\\';

              //membuat folder jika folder tidak ada
              if (!is_dir($path)) File::makeDirectory($path);

              $fs = $request->file('file');

              $name = explode('.', $fs->getClientOriginalName());
              if ($name[1]=='xlsx' || $name[1]=='xls'){
                  $fileName = $name[0].'-'.date('Ymd').'.'.$name[1];
              }

              // $fileName   = $_FILES['file']['name'];
              // $file       = $path.$fileName;

              //simpan file ukuran sebenernya
            //  $realImagesName     = $_FILES["file"]["tmp_name"];
            //  move_uploaded_file($realImagesName, $file);

              $request->file('file')->move("files/", $fileName);
              print_r($fileName);
            }
          break;

            case 'delfile':
                $fileName = $request->input('fname');
                $path = public_path().'\files\\';

                $file = $path.$fileName;

                unlink($file);
            break;
            case 'savetodb':
                /// baca sekalian save k database ///

                $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
                //$reader = ReaderFactory::create(Type::CSV); // for CSV files
                //$reader = ReaderFactory::create(Type::ODS); // for ODS files
                if ($request->input('fname'))$fname = $request->input('fname'); else return;
                $reader->open(public_path().'\files\\'.$fname);

                $arrytmp=$tmp=$header=$isinya=array();
                $l=0;

                foreach ($reader->getSheetIterator() as $sheet) {
                  foreach ($sheet->getRowIterator() as $row) {
                    if (strpos($fname,"benefit") != false || strpos($fname,"potongan") != false){
                      if ($l==0){
                        for( $i=0 ; $i < count($row) ; $i++ ){
                          if ($row[$i]!="")array_push($header, $row[$i]);
                        }
                      }else{
                        for( $i=0 ; $i < count($header) ; $i++ ){
                          array_push($isinya,$row[$i]);
                          //input data tidak termasuk dari field NO, id payroll, Nama
                          $tanggalberlaku = strtotime(date("Y-m-d")) ;

                          // if ($row[1] != "") $fillfield = $row[1]."\r\n"; else $fillfield = (NULL);
                          $fillfield = trim($row[1]);

                          if ($i > 2) {
                            $datanya=array(
                              'payroll_id'  =>  $fillfield,
                              'jenis'       =>  $header[$i],
                              'value'       =>  $row[$i],
                              'berlaku'     =>  $tanggalberlaku,
                              'updated_at'  =>  date("Y-m-d H:i:s")
                            );

                            // cek jika data sudah ada
                            if (strpos($fname,"benefit") != false) $table='tb_tunjangans'; else $table='syn_potongan';

                            $cek = DB::table($table)
                              ->where('payroll_id',$fillfield)
                              ->where('jenis',$header[$i])
                              ->where('berlaku', '<=' ,$tanggalberlaku)
                              ->orderBy('berlaku', 'desc')
                              ->first();

                            if(!$cek) {
                              //input data jika data belum tersedia
                              try {
                                DB::table($table)->insert($datanya);
                              } catch (\Exception $ex){
                                //ambil value diantara kata reference dan on
                                dd($ex->getMessage());
                              }
                            } else {
                              //update data yang sudah tersedia

                              if ($cek->berlaku < $tanggalberlaku){
                                if ($cek->value != $row[$i]){
                                  DB::table($table)->insert($datanya);
                                }
                              } else {
                                DB::table($table)->where('id',$cek->id)->update($datanya);
                              }
                            }
                          }
                        }
                      }

                    } else if (strpos($fname,"karyawan") != false) {
                      if ($l==0){
                        for( $i=0 ; $i < count($row) ; $i++ ){
                          if ($row[$i]!="") array_push($header, trim($row[$i]));
                        }
                      }else{
                        if ($row[0]!=''){
                          for( $i=0 ; $i < count($header) ; $i++ ){
                            $fillfield = trim($row[1]);

                            if ($row[$i]=="") {
                              $fillvalue=(NULL);
                            } else {
                              if (explode('_',$header[$i])[0] == 'tgl') {
                                if (is_array($row[$i])){
                                  foreach ($row[$i] as $key => $value) {
                                    $arrytmp[$key] = $value;
                                  }

                                  $fillvalue=strtotime($arrytmp['date']);
                                }else{
                                  $fillvalue=(NULL);
                                }
                                // array_push($isinya,$row[$i]);
                              }else {
                                $fillvalue=$row[$i];
                              }
                            }

                            //
                            if ($i >= 1 ) {
                              $datanya=array(
                                'payroll_id'    => $fillfield,
                                $header[$i]     => $fillvalue,
                                'updated_at'    => date("Y-m-d H:i:s")
                              );
                              $cek = DB::table('syn_karyawans')
                                ->where('payroll_id',$fillfield)
                                ->first();

                              $cn = DB::getSchemaBuilder()->getColumnListing('syn_karyawans');
                              if (in_array($header[$i],$cn)){
                                if(!$cek) {
                                  DB::table('syn_karyawans')->insert($datanya);
                                } else {
                                  DB::table('syn_karyawans')->where('id',$cek->id)->update($datanya);
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                    $l++;
                  }
                }

                $tmp['header']=$header;
                $tmp['isinya']=$isinya;
                return $tmp;
            break;
        }
    }

}
