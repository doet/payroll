<?php

namespace App\Helpers;
use App\Models\tb_karyawans;
use DB;

class syncdb_helpers {
  public static function sync($source,$target,$option) {
    $cn   = DB::getSchemaBuilder()->getColumnListing($target);
    $db2  = DB::connection('mysql2')->table($source)->get();

    if (array_key_exists('removeitems',$option))  $cn = self::removearray($cn,$option['removeitems']);
    if (array_key_exists('replace',$option))      $cn = self::replacearray($cn,$option['replace']);
    //dd($cn);
    //if (in_array($header[$i],$cn)){}
    //$option['replace'] ;
    $i=0;
    foreach ($db2 as $key => $value) {
      $cek =  DB::table($target)
        ->where(function ($qy) use ($option,$db2,$key,$cn) {
          if (array_key_exists('where',$option)) {
            foreach ($option['where'] as $item) {

              if(is_array($item)){
                foreach ($item as $row => $val) {
                  $qy->where($row, $val);
                }
              } else {
                $qy->where($item, $db2[$key]->$item);
              }
            }
          }
        })
        ->first();

      foreach ($cn as $colum) {
        if (empty($db2[$key]->$colum))$db2[$key]->$colum=null;
        if (array_key_exists('tanggal',$option)) {
          if (in_array($colum, $option['tanggal'])) {
            $datanya[$colum] = strtotime($db2[$key]->$colum);
          }else {
            $datanya[$colum] = $db2[$key]->$colum;
          }
        } else {
          $datanya[$colum] = $db2[$key]->$colum;
        }
        if (array_key_exists('replace',$option)) $datanya = self::re_replacearray($datanya,$option['replace']);
      }
      $status =0 ;

      if (array_key_exists('exinput',$option)){
        foreach ($option['exinput'] as $key => $value) {
          $datanya[$key] = $value;
        }
      }

      if (!$cek) {

        try {
          DB::table($target)->insert($datanya);
        } catch (\Illuminate\Database\QueryException $ex) {
          if ($ex->errorInfo[1] == 1062) {
              $status = 'duplicate data : '.$ex->errorInfo[2];
          } else if ($ex->errorInfo[1] == 1452) {
            self::error_1452($target,$ex->errorInfo,$datanya);
            $status = '1';
          } else {
            $status = 'other :'. $ex->errorInfo[2];
            return $status;
          }
        }
      }
    }
    $responce = $status;
    return $responce;
  }

  public static function error_1452($target,$array,$input){
    $sindex = strpos($array[2],'FOREIGN KEY')+14;
    $eindex = strpos($array[2],"`",$sindex);
    $inx = substr($array[2], $sindex,$eindex-$sindex);
    $input[$inx] = null;

    try {
      DB::table($target)->insert($input);
    } catch (\Illuminate\Database\QueryException $ex) {
      if ($ex->errorInfo[1] == 1452) self::error_1452($target,$ex->errorInfo,$input);
    }
  }

  public static function removearray($array,$items){
    foreach ($items as $item) {
      $index = array_search($item, $array);
    	if ( $index !== false ) {
    		unset( $array[$index] );
    	}
    }
  	return $array;
  }
  public static function replacearray($array,$items){
    foreach ($items as $key => $item) {
      $index = array_search($key, $array);
      if ( $index !== false ) {
        $array[$index]=$item;
      }
    }
    return $array;
  }
  public static function re_replacearray($array,$items){
    foreach ($items as $key => $item) {
      if (array_key_exists($item,$array)){
        $array[$key] = $array[$item];
        unset($array[$item]);
      }
    }
    return $array;
  }
}
