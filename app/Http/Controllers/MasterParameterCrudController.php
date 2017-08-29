<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Jakarta');

use App\Http\Requests;
use Illuminate\Http\Request;

use App\menuadmin;

use DB;
use Auth;

class MasterParameterCrudController extends Controller
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
        $cari = $request->input('cari', '0');

        $page = $request->input('page', '1');
        $limit = $request->input('rows', '10');
        $sord = $request->input('sord', 'asc');

    // Menentukan Jumlah Query //
        switch ($datatb) {
            case 'derectorat':   // Variabel Master
                $sidx = $request->input('sidx', 'dir_code');
                $count = DB::table('syn_m_directorats')->count();
            break;
            case 'divisi':   // Variabel Master
                $sidx = $request->input('sidx', 'div_code');
                $count = DB::table('syn_m_divisions')->count();
            break;
            case 'departement':   // Variabel Master
                $sidx = $request->input('sidx', 'dept_code');
                $count = DB::table('syn_m_depts')->count();
            break;
            case 'costofsales':   // Variabel Master
                $sidx = $request->input('sidx', 'cost_sales_code');
                $count = DB::table('syn_m_cost_sales')->count();
            break;
            case 'title':   // Variabel Master
                $sidx = $request->input('sidx', 'title_code');
                $count = DB::table('syn_m_titles')->count();
            break;
            case 'grade':   // Variabel Master
                $sidx = $request->input('sidx', 'grade_code');
                $count = DB::table('syn_m_grades')->count();
            break;
            case 'level':   // Variabel Master
                $sidx = $request->input('sidx', 'level_code');
                $count = DB::table('syn_m_levels')->count();
            break;
            case 'mlibur':   // Libur dan Cuti Bersama
                $sidx = $request->input('sidx', 'tgllibur');
                $count =  DB::table('tb_libur')->count();
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
            case 'derectorat':   // Vaariabel Master
                $query = DB::table('syn_m_directorats')->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get();
            break;
            case 'divisi':   // Vaariabel Master
                $query = DB::table('syn_m_divisions')->leftJoin('syn_m_directorats','syn_m_directorats.dir_code','syn_m_divisions.dir_code')
                    ->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get(array('syn_m_divisions.*','syn_m_directorats.dir_name'));
            break;
            case 'departement':   // Vaariabel Master
                $query = DB::table('syn_m_depts')->leftJoin('syn_m_divisions','syn_m_divisions.div_code','=','syn_m_depts.div_code')
                    ->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get(array('syn_m_depts.*','syn_m_divisions.div_name'));
            break;
            case 'costofsales':   // Vaariabel Master
                $query = DB::table('syn_m_cost_sales')->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get();
            break;
            case 'title':   // Vaariabel Master
                $query = DB::table('syn_m_titles')->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get();
            break;
            case 'grade':   // Vaariabel Master
                $query = DB::table('syn_m_grades')->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get();
            break;
            case 'level':   // Vaariabel Master
                $query = DB::table('syn_m_levels')->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get();
            break;
            case 'mlibur':  // Libur dan Cuti Bersama
                $query = DB::table('tb_libur')->orderBy($sidx, $sord)
                    ->orderBy($sidx, $sord)
                    ->skip($start)->take($limit)
                    ->get();
            break;
        }

        $i=0;
        foreach($query as $row) {
            switch ($datatb) {
                case 'derectorat':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->dir_code,
                        $row->dir_name,
                        $row->active
                    );
                    $i++;
                break;
                case 'divisi':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->div_code,
                        $row->div_name,
                        $row->dir_name
                    );
                    $i++;
                break;
                case 'departement':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->dept_code,
                        $row->dept_name,
                        $row->div_name
                    );
                    $i++;
                break;
                case 'costofsales':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->cost_sales_code;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->cost_sales_code,
                        $row->cost_sales
                    );
                    $i++;
                break;
                case 'title':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->title_code;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->title_code,
                        $row->title
                    );
                    $i++;
                break;
                case 'grade':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->grade_code;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->grade_code,
                        $row->grade
                    );
                    $i++;
                break;
                case 'level':   // Variabel Master
                    $responce['rows'][$i]['id'] = $row->level_code;
                    $responce['rows'][$i]['cell'] = array(
                        $i+1,
                        $row->level_code,
                        $row->level
                    );
                    $i++;
                break;
                case 'mlibur':  // Libur dan Cuti Bersama
                    $responce['rows'][$i]['id'] = $row->id;
                    $responce['rows'][$i]['cell'] = array(
                        '',
                        date('d F Y', $row->tgllibur),
                        $row->ket
                    );
                    $i++;
                break;
            }
        }
        return  Response()->json($responce);
    }
    public function save(Request $request){
        $datatb = $request->input('datatb', '');
        $cari = $request->input('cari', '0');
        $oper = $request->input('oper');
        $id = $request->input('id');

        switch ($datatb) {
            case 'mlibur':
                $tgl = $request->input('sdate');

                $datanya=array(
                    'tgllibur' =>strtotime($tgl),
                    'ket'=>$request->input('ket',''),
                    'updated_at' =>date("Y-m-d H:i:s")
                );
                if ($oper=='add')   DB::table('tb_libur')->insert($datanya);
                if ($oper=='edit')  DB::table('tb_libur')->where('id', $id)->update($datanya);
                if ($oper=='del')   DB::table('tb_libur')->destroy($id);

                $response = array(
                    'status' => 'berhasil',
                    'msg' => 'berhasil',
                );

                return $response;
            break;
            case 'parameter':
              $datanya=array(
                  'tgllibur' =>strtotime($tgl),
                  'ket'=>$request->input('ket',''),
                  'updated_at' =>date("Y-m-d H:i:s")
              );
              return $response;
            break;

        }
    }
}
