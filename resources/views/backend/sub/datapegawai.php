<div style="height: 700px;">
<form class="form-horizontal form-aktif" id="form-1" method="get">
    
    <div class="form-group col-xs-3 center">
        <div>
            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php
                    if ($data['jenis_kelamin']=='MALE') echo url('images/avatars/profile-pic-l.jpg'); elseif ($data['jenis_kelamin']=='FEMALE') echo url('images/avatars/profile-pic-p.jpg');
                    ?>" />
            </span>
        </div>
    </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Nama </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['nama_karyawan'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Tgl. Lahir </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['tempat_lahir'] .','. $data['tgl_lahir'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Jenis Kelamin </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['jenis_kelamin'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Agama </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['agama'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Gol.Darah </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['gol_darah'] ?></span>
                                </div>
                            </div> 
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Status </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['marital_status'] ?></span>
                                </div>
                            </div>                            
                        </div>
                        <div class=" profile-user-info-striped col-xs-5">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> No KK </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['no_kk'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> No KTP </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['no_ktp'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Ibu Kandung </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['nama_ibu_kandung'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Alamat </div>
                                <div class="profile-info-value" style="height: 80px">
                                    <span><?php echo $data['alamat_ktp'].' RT.'.$data['rt'].' RW.'.$data['rw'].' - '.$data['kota_ktp'].'. '.$data['kode_pos'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Telephone </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['telp1'] ?></span>
                                </div>
                            </div> 
                            <div>&nbsp;</div>
                                                                           
                        </div>
                        
                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Date. in-out </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['tgl_masuk'] .' s.d. '. $data['tgl_keluar'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Finish Contract </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['tgl_finish_contract'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Grade </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['grade'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Level </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['level'] ?></span>
                                </div>
                            </div>
                        </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Lokasi Kerja </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['loc_name'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Title </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo $data['title'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Departement </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['dept_name'] ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Divisi </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['div_name'] ?></span>
                                </div>
                            </div> 
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Directorat </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['dir_name'] ?></span>
                                </div>
                            </div>
                        </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Payroll ID </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['payroll_id'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Bank </div>
                                <div class="profile-info-value">                                    
                                    <span><?php echo "( ".$data['nama_bank']." )". $data['no_account_bank'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> No NPWP </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['no_npwp'] ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Divisi </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['id_customer'] ?></span>
                                </div>
                            </div> 
                            <div class="profile-info-row">
                                <div class="profile-info-name"> ID Driver </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data['id_driver'] ?></span>
                                </div>
                            </div>                            
                        </div>
</form>     </div>