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

class MasterParameterController extends Controller
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
    public function mparameter(){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','mparameter')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);
        return view('backend.mparameter', compact('multilevel','aktif_menu'));
    }

    public function libur(){
        $multilevel = menuadmin::get_data();
        $index      = menuadmin::where('part','libur')->first();
        $aktif_menu = menuadmin::aktif_menu($index['id']);
        return view('backend.mlibur', compact('multilevel','aktif_menu'));
    }

    public function test(){


        $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
        //$reader = ReaderFactory::create(Type::CSV); // for CSV files
        //$reader = ReaderFactory::create(Type::ODS); // for ODS files

        $reader->open("D:/xampp/htdocs/bcs/public/att/att.xlsx");


        $l=$cek=0;
        $tgl=array(0,0,0);
        $result['shift']=$result['lembur']=$result['lembur off']=array();

        echo '<table border="1">';
        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $row) {
                // do stuff with the row

                if ($l==0){
                    for( $i=3 ; $i < count($row) ; $i++ ){
                        //echo $row[$i].'';
                        array_push($tgl, $row[$i]);
                    }
                }else{
                    for( $i=3 ; $i < count($row) ; $i++ ){
                        $kar = DB::table('syn_m_karyawan')->where('payroll_id',$row[0])->first();

                        $cek = DB::table('syn_att')->where('payroll_id',$kar->payroll_id)
                            ->where('jenis',$row[2])
                            ->where('tgl',$tgl[$i])
                            ->first();

                        //echo $row[0].'-';
                        //echo $row[2].' = '.$tgl[$i].' => '.$row[$i];

                        //echo '<br>';

                        $datanya=array(
                            'payroll_id' =>$kar->payroll_id,
                            'jenis' =>$row[2],
                            'nilai' =>$row[$i],
                            'tgl'=> $tgl[$i],
                            'updated_at' =>date("Y-m-d H:i:s")
                        );
                        //if (!$cek)DB::table('syn_att')->insert($datanya);

                        if ($row[2] =='shift'){
                            array_push($result['shift'], $row[$i]);
                        } elseif ($row[2] =='lembur') {
                            array_push($result['lembur'], $row[$i]);
                        } elseif ($row[2] =='lembur off') {
                            array_push($result['lembur off'], $row[$i]);
                        }
                    }
                }

                if ($l==0){
                    echo '<tr>';
                        echo '<th align="center">Payrol</th>';
                        echo '<th align="center">Nama</th>';
                        echo '<th align="center">Ket</th>';
                    for( $i=3 ; $i < count($row) ; $i++ ){
                        echo '<th align="center">'.$row[$i]['date'].'</th>';
                    }
                        echo '<th align="center">D</th>';
                        echo '<th align="center">A</th>';
                        echo '<th align="center">N</th>';
                        echo '<th align="center">HK</th>';
                    echo '</tr>';
                }

                if ($l!=0){
                    echo '<tr>';
                        echo '<td align="center">'.$row[0].'</td>';
                        echo '<td align="center">'.$row[1].'</td>';
                        echo '<td align="center">'.$row[2].'</td>';
                    for( $i=3 ; $i < count($row) ; $i++ ){
                         echo '<td align="center">'.$row[$i].'</td>';
                    }
                        $rowcount=array_count_values($row);
                        if ($row[2]=='shift'){
                            echo '<td align="center">'.array_count_values($result['shift'])['D'].'</td>';
                            echo '<td align="center">'.array_count_values($result['shift'])['A'].'</td>';
                            echo '<td align="center">'.array_count_values($result['shift'])['N'].'</td>';
                            echo '<td align="center">'.(array_count_values($result['shift'])['D']+array_count_values($result['shift'])['A']+array_count_values($result['shift'])['N']).'</td>';
                        }
                        if ($row[2]=='lembur'){
                            echo '<td align="center">-</td>';
                            echo '<td align="center">-</td>';
                            echo '<td align="center">-</td>';
                            echo '<td align="center">-</td>';
                        }
                        if ($row[2]=='lembur off'){
                            echo '<td align="center">-</td>';
                            echo '<td align="center">-</td>';
                            echo '<td align="center">-</td>';
                            echo '<td align="center">-</td>';
                        }
                    echo '</tr>';
                }

                $l++;
                //echo '<br>';
            }
        }
        echo '</tabel>';
        $reader->close();
        $countvalue = array_count_values($result['shift'])['D'];
        $valsum = array_sum($result['lembur']);
        //echo $countvalue;
        //echo $valsum;
    }
}
