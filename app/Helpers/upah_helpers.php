<?php

namespace App\Helpers;

use DB;

class upah_helpers {
    public static function att($id,$jenis,$waktu) {  
        $query = DB::table('tb_att')
            ->where('payroll_id',$id)
            ->where('jenis',$jenis)
            ->where('tgl',$waktu)
            ->first();
        if ($query)$nilai = $query->nilai; else $nilai = '';
        return  $nilai ;
    }

    public static function att2($id,$jenis,$waktu) {  
        $query = DB::table('tb_att_lembur')
            ->where('payroll_id',$id)
            ->where('jenis',$jenis)
            ->where('tgl',$waktu)
            ->first();
        if ($query)$nilai = $query->nilai; else $nilai = '';
        return  $nilai ;
    }

    public static function mkn($id,$waktu) {  
        if (self::att($id,'lembur',$waktu)>=4)$nilai='ya'; else $nilai = '';
        return  $nilai ;
    }
    public static function mkn2($id,$waktu) {  
        if (self::att2($id,'lembur',$waktu)>=4)$nilai='ya'; else $nilai = '';
        return  $nilai ;
    }
    public static function trns($id,$waktu) {
        $filter = array('O/D','O/A','O/N');

        if (self::att($id,'lembur off',$waktu)>=2){
            if (in_array(self::att($id,'shift',$waktu),$filter)) $nilai='ya'; else $nilai = '';
        } else $nilai = '';

        return  $nilai ;
    }
    public static function hit($id,$waktu) {
        $lembur = self::att($id,'lembur',$waktu);
        $shift = self::att($id,'shift',$waktu);
        if ($lembur){
            if ($shift=='A/N'){
                if ($lembur<8) $nilai = 1; else $nilai = 2;            
            } else if ($shift=='N/D'){
                if ($lembur<16) $nilai = 1; else if ($lembur=16) $nilai = 2;
            } else if ($shift=='D/A'){
                if ($lembur=16) $nilai = 2; else if ($lembur>=8) $nilai = 1;
            } else if ($shift=='O/D'){
                if ($lembur=24) $nilai = 2; else if ($lembur>=16 AND $lembur<24) $nilai = 1;
            } else if ($shift=='O/A'){
                if ($lembur>=8 AND $lembur<16) $nilai = 1; else if ($lembur>=16) $nilai = 2;
            } else if ($shift=='O/N'){
                if ($lembur>=8 AND $lembur<24) $nilai = 1; else if ($lembur=24) $nilai = 2;
            } else $nilai=0;
        }else $nilai = 0;
        return  $nilai ;
    }
    public static function hit2($id,$waktu) {
        $lembur = self::att2($id,'lembur',$waktu);
        $shift = self::att($id,'shift',$waktu);
        if ($lembur){
            if ($shift=='A/N'){
                if ($lembur<8) $nilai = 1; else if ($lembur>=8) $nilai = 2;            
            } else if ($shift=='N/D'){
                if ($lembur<16) $nilai = 1; else if ($lembur=16) $nilai = 2;
            } else if ($shift=='D/A'){
                if ($lembur=16) $nilai = 2; else if ($lembur>=8) $nilai = 1;
            } else if ($shift=='O/D'){
                if ($lembur=24) $nilai = 2; else if ($lembur>=16 AND $lembur<24) $nilai = 1;
            } else if ($shift=='O/A'){
                if ($lembur>=8 AND $lembur<16) $nilai = 1; else if ($lembur>=16) $nilai = 2;
            } else if ($shift=='O/N'){
                if ($lembur>=8 AND $lembur<24) $nilai = 1; else if ($lembur=24) $nilai = 2;
            } else $nilai=0;
        }else $nilai = 0;
        return  $nilai ;
    }

    public static function RekapAbsen($id,$jenis,$start,$end) {
        $responce['lembur']=$contlembur=$responce['hit']=$responce['mkn']=$responce['trns']=

        $responce['D']=$responce['A']=$responce['N']=$responce['D/A']=$responce['A/N']=$responce['N/D']=$responce['IJ']=$responce['SK']=$responce['CT']=$responce['AL']=

        $responce['lemburoff2']=$responce['hit2']=$responce['mkn2']=0;

        for($i=strtotime($start); $i<=strtotime($end); $i=$i+(24*60*60)) {

            $responce['lemburoff2']=$responce['lemburoff2']+self::att2($id,'lembur off',$i);
            if(self::hit2($id,$i))$responce['hit2']=$responce['hit2']+self::hit2($id,$i);
            if(self::mkn2($id,$i))$responce['mkn2']++;


            if (self::att($id,'shift',$i)=='D') $responce['D']++;
            if (self::att($id,'shift',$i)=='A') $responce['A']++;
            if (self::att($id,'shift',$i)=='N') $responce['N']++;
            if (self::att($id,'shift',$i)=='D/A') $responce['D/A']++;
            if (self::att($id,'shift',$i)=='A/N') $responce['A/N']++;
            if (self::att($id,'shift',$i)=='N/D') $responce['N/D']++;

            if (self::att($id,'shift',$i)=='IJ') $responce['IJ']++;
            if (self::att($id,'shift',$i)=='SK') $responce['SK']++;
            if (self::att($id,'shift',$i)=='CT') $responce['CT']++;

            if (self::att($id,'shift',$i)=='AL') $responce['AL']++;

            if (self::att($id,'lembur',$i)){
                $responce['lembur']=$responce['lembur']+self::att($id,'lembur',$i);
                $contlembur++;
            }            
            
            if(self::hit($id,$i))$responce['hit']=$responce['hit']+self::hit($id,$i);
            if(self::mkn($id,$i))$responce['mkn']++;
            if(self::trns($id,$i))$responce['trns']++;
        } 
        $responce['hit']=$responce['hit']+$responce['hit2'];

        $responce['hk'] = $responce['D']+$responce['A']+$responce['N']+$responce['D/A']+$responce['A/N']+$responce['N/D'];

        if($responce['hk'] <= 22)$responce['khk']=0;else $responce['khk']=$responce['hk']-22;

        $responce['lembur']=$responce['lembur']*2-0.5*$contlembur+$responce['lemburoff2'];
        $responce['shift']=$responce['A']+$responce['N']+$responce['hit'];

        $responce['mkn']=$responce['mkn']+$responce['mkn2'];

        return  $responce;
    }

    public static function upah($id,$jenis,$start) {        
        $query = DB::table('tb_tunjangan')
            ->where('payroll_id',$id)
            ->where('jenis',$jenis)
            ->first();
        if ($query)$responce=$query->value; else $responce=0;
        return  $responce ;
    }
    
    public static function potong($id,$jenis,$start) {        
        $query = DB::table('tb_potongan')
            ->where('payroll_id',$id)
            ->where('jenis',$jenis)
            ->first();
        if ($query)$responce=$query->value; else $responce=0;
        return  $responce ;
    }
    
    public static function slip($id,$start,$end) {
        $responce['makan'] = self::RekapAbsen($id,'',$start,$end)['mkn']*self::upah($id,'makan',$start);
        $responce['transport'] = self::upah($id,'transport',$start)*(self::RekapAbsen($id,'',$start,$end)['hk']+self::RekapAbsen($id,'',$start,$end)['trns']);
        
        $responce['shift'] = self::RekapAbsen($id,'',$start,$end)['shift']*self::upah($id,'shift',$start);
        $responce['lembur'] = self::upah($id,'upahpokok',$start)/173*self::RekapAbsen($id,'',$start,$end)['lembur'];
        $responce['khk'] = '0';
        $responce['lain'] = '0';
        $responce['skill'] = self::upah($id,'skill',$start);
        $responce['intensif'] = self::upah($id,'insentif',$start)+self::upah($id,'finsentif',$start);

        $responce['bruto'] = 
            self::upah($id,'upahpokok',$start)
            +$responce['makan']+$responce['transport']+$responce['shift']+$responce['lembur']+$responce['khk']+$responce['lain']+$responce['skill']+$responce['intensif'];


        $responce['zis'] = 0;
        $responce['pph21'] = 0;
        $responce['astek'] = self::potong($id,'astek',$start);
        $responce['bon'] = 0;
        $responce['spbcs'] = 0;
        $responce['absen'] = 0;
        $responce['koprasi'] = 0;
        $responce['bpr'] = 0;
        $responce['pinjaman'] = 0;
        $responce['potongan'] =  $responce['zis']+$responce['pph21']+$responce['astek']+$responce['bon']+$responce['spbcs']+$responce['absen']+$responce['koprasi']+$responce['bpr']+$responce['pinjaman'];

        $responce['total'] = $responce['bruto']-$responce['potongan'];

        return $responce;
    }

    public static function rekamupah($id,$jenis,$waktu) {
        $tunjangan[$waktu] = DB::table('tb_tunjangan')->where('payroll_id',$id)
            ->where('jenis',$jenis)
            ->where('berlaku','<=',$waktu)
            ->orderBy('berlaku','desc')
            ->first();

        return  $tunjangan;
    }
    public static function potongan($id_u,$jenis,$waktu) {
        $nilai= potongan::where('jenis',$jenis)
            ->where('id_u',$id_u)
        //    ->where('berlaku','!=','')
            ->first();

        return $nilai['nilai'];
    }
    
    public static function xupah($id_u,$jenis,$waktu) {       
        $nilai= upah::where('jenis',$jenis)
            ->where('id_u',$id_u)
        //    ->where('berlaku','!=','')
            ->first();

        return $nilai['nilai'];
    }

    public static function rupahx($id_u,$start,$end) {       
        
        $responce['pokok']      = self::upah($id_u,0,0);
        $responce['honor']      = self::upah($id_u,1,0);
        $responce['perumahan']  = self::upah($id_u,2,0);
        $responce['jabatan']    = self::upah($id_u,3,0);
        $responce['pandu']      = self::upah($id_u,4,0);
        $responce['profesi']    = self::upah($id_u,5,0);
        $responce['beban']      = self::upah($id_u,6,0);
        $responce['um']         = self::upah($id_u,7,0)*self::rabsen($id_u,$start,$end)['hkerja'];
        $responce['tp']         = self::upah($id_u,8,0)*self::rabsen($id_u,$start,$end)['hkerja'];
        $responce['lembur']     = self::upah($id_u,9,0);
        $responce['cuti']       = self::upah($id_u,10,0);        
        $responce['kbl']        = self::upah($id_u,11,0);
        $responce['kendaraan']  = self::upah($id_u,12,0);
        $responce['bbm']        = self::upah($id_u,13,0);
        $responce['pkendaraan'] = self::upah($id_u,14,0);

        $responce['st'] = $responce['pokok']+$responce['honor']+
            $responce['perumahan']+$responce['jabatan']+$responce['pandu']+
            $responce['profesi']+$responce['beban']+$responce['um']+
            $responce['tp']+$responce['lembur']+$responce['cuti']+
            $responce['kbl']+$responce['kendaraan']+
            $responce['bbm']+$responce['pkendaraan']+self::htshift($id_u,$start,$end)['tshift'];

        return $responce;
    }
    public static function rpotongan($id_u,$start,$end) {

        $responce['bjb']        = self::potongan($id_u,3,0);
        $responce['kendaraan']  = self::potongan($id_u,0,0);
        $responce['absen']      = self::potongan($id_u,2,0); 
        $responce['pph21']      = self::potongan($id_u,1,0); 
        $responce['lbl']        = self::potongan($id_u,4,0);

        $responce['sp'] = $responce['bjb']+$responce['kendaraan']+$responce['absen']+$responce['pph21']+$responce['lbl']+
        self::baziz($id_u)['total']+self::tkoperasi($id_u,'')['total']+
        self::dplk($id_u)['karyawan']+self::bpjsker($id_u)['karyawan']+
        self::bpjskes($id_u)['karyawan'];

        if (self::rupah($id_u,$start,$end)['st']>$responce['sp'] ) $responce['terima'] = self::rupah($id_u,$start,$end)['st']-$responce['sp']; else $responce['terima'] =0;
        return $responce;
    }

   
    
    
    public static function koperasi($id_u,$jenis,$waktu) {
        $nilai= koperasi::where('jenis',$jenis)
            ->where('id_u',$id_u)
        //    ->where('berlaku','!=','')
            ->first();

        return $nilai['nilai'];
    }
    public static function pkoperasi($id_u,$waktu) {    
        $waktu=date('d F Y');

        $koperasi=pkoperasi::where('id_u',$id_u)
            ->orderBy('tglapp', 'desc')
            ->first();
        if ($koperasi){
            $responce['selisih']=AppHelpers::selisihhbt(date('d F Y',$koperasi['tglapp']),$waktu,'month');
                       
            $responce['stenor']=$koperasi['tenor']-$responce['selisih'];
            if ($responce['stenor']<0)$responce['stenor']=0;

            $responce['angsur']=$koperasi['jmlplus']/$koperasi['tenor'];
            $responce['sangsur']=$responce['angsur']*$responce['stenor'];
        } else {
            $responce['angsur']=0;
        }
    
        return  $responce;
    }
    public static function tkoperasi($id_u,$waktu) {    
        $waktu=date('d F Y');
            
        $responce['pokok']      = self::koperasi($id_u,0,0);
        $responce['wajib']      = self::koperasi($id_u,1,0);
        $responce['sukarela']   = self::koperasi($id_u,2,0);
        $responce['mppa']       = self::koperasi($id_u,3,0);
        $responce['el']         = self::koperasi($id_u,4,0);
        $responce['angsur']     = self::pkoperasi($id_u,'')['angsur'];

        $responce['total'] = $responce['pokok']+$responce['wajib']+$responce['sukarela']+$responce['mppa']+$responce['el']+$responce['angsur'];
    
        return  $responce;
    }
    
    public static function baziz($id_u) {
        $upah= self::upah($id_u,0,0)+self::upah($id_u,1,0);
        
        $responce['total'] = $upah*(2.5/100);
        return  $responce;
    }
    
    public static function dplk($id_u) {
        $gajipokok= self::upah($id_u,0,0)+self::upah($id_u,1,0);
        $responce['dplk']=$gajipokok*(15/100);
        $responce['perusahaan']=$responce['dplk']*(60/100);
        $responce['karyawan'] = $responce['dplk']*(40/100);
        $responce['total'] = $responce['perusahaan']+$responce['karyawan'];
        return  $responce;
    }
    public static function bpjsker($id_u) {
        $responce['ttunjangan'] = self::upah($id_u,0,0)+self::upah($id_u,1,0)+self::upah($id_u,2,0)+self::upah($id_u,3,0);
        $responce['jkm']        = $responce['ttunjangan']*(0.30/100);
        $responce['jkk']        = $responce['ttunjangan']*(0.89/100);
        $responce['jhtk']       = $responce['ttunjangan']*(2/100);
        $responce['jhtp']       = $responce['ttunjangan']*(3.70/100);
        $responce['jpk']        = $responce['ttunjangan']*(1/100);
        $responce['jpp']        = $responce['ttunjangan']*(2/100);

        $responce['karyawan']=$responce['jhtk']+$responce['jpk'];
        
        $responce['tbpjskk']    = 
            $responce['jkm']+
            $responce['jkk']+
            $responce['jhtk']+
            $responce['jhtp']+
            $responce['jpk']+
            $responce['jpp'];

        return  $responce;
    }
    public static function bpjskes($id_u) {
        $responce['tgaji'] = self::upah($id_u,0,0)+self::upah($id_u,1,0)+self::upah($id_u,2,0);
        $responce['itung'] = $responce['tgaji'];
        if ($responce['tgaji']>=8000000)$responce['itung']=8000000;
        if ($responce['tgaji']<=4000000)$responce['kls']=2;else $responce['kls']=1;

        $responce['perusahaan'] = ($responce['itung']/100)*4;
        $responce['karyawan'] = ($responce['itung']/100)*1;
        $responce['tiuran'] = ($responce['itung']/100)*5;

        return  $responce;
    }
    
    //Rawat Jalan
    public static function sisaRj($id_u,$tgl) {
        $platform = mrawatjalan::where('id_u', '=', $id_u)
            ->where('platform', 'like', date('y',$tgl).'/%')
            ->first();
        $query2 = mrawatjalan2::where('id_u', '=', $id_u)      
            ->where('tgldoc', '<', $tgl)
            ->where('no', 'like', date('y',$tgl).'/%')
            ->get();
        $total=0;
        foreach($query2 as $row2) {
            $total=($row2->debit+$total);
        }
        
        $responce['platform'] = AppHelpers::extractNilai($platform['platform'])['n1'];
        $responce['total'] = AppHelpers::extractNilai($platform['platform'])['n1']-$total;
        
        return  $responce;
    }

    //cuti
    public static function sisaCuti($id_u,$tgl) {
        $jatah = fasilitas::where('id_u', '=', $id_u)
            ->where('cutitahun', 'like', date('y',$tgl).'/%')
            ->first();
        $query2 = cuti::where('tb_cuti.id_u', '=', $id_u)      
            ->join('tbl_datapegawai','tb_cuti.id_u', '=', 'tbl_datapegawai.id')
            ->where('tb_cuti.sdate', '<=', $tgl)
            ->where('tb_cuti.no', 'like', date('y',$tgl).'/%')
            ->get();

        $total=0;
        foreach($query2 as $row) {
            if ($row->wkerja == 0){
                $jmlct = AppHelpers::hitungcuti(date('d-m-Y', $row->sdate),date('d-m-Y', $row->edate),'-');
            } else if($row->wkerja == 1){                     
                $jmlct = AppHelpers::hitungcutishift(date('d-m-Y', $row->sdate),date('d-m-Y', $row->edate),'-',Auth::id());
            }
            $total = $jmlct+$total;
        }        
        
        $responce['jatah'] = AppHelpers::extractNilai($jatah['cutitahun'])['n1'];
        $responce['pakai'] = $jmlct;
        $responce['total'] = AppHelpers::extractNilai($jatah['cutitahun'])['n1']-$total;
        
        return  $responce;
    }

}