
<div >
    <div class=" profile-user-info-striped col-xs-12">
        <div class="profile-info-row">
            <div class="profile-info-name"> Payroll ID </div>
            <div class="profile-info-value">
                <span><?php echo $data['payroll_id'] ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Nama </div>
            <div class="profile-info-value">
                <span><?php echo $data['nama_karyawan'] ?></span>
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
            <div class="profile-info-name"> Cost Of Sales </div>
            <div class="profile-info-value">                                    
                <span><?php echo $data['title'] ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Eligibility </div>
            <div class="profile-info-value">
                <span><?php echo $data['dept_name'] ?></span>
            </div>
        </div>                                              
    </div>
    <div class="col-xs-12">&nbsp;</div>
    <form class="form-horizontal form-aktif" id="form-1" method="get">

        <div class="form-group col-xs-4">
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">T. Komunikasi :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_tkomunikasi" name="ck_tkomunikasi" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="tkomunikasi" name="tkomunikasi" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="gm">GM</option>
                        <option value="mgr">Mgr</option>
                        <option value="spv">Spv</option>
                        <option value="other">Kebijakan</option>
                    </select> 
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">T. Kontribusi :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_tkontribusi" name="ck_tkontribusi" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="kontribusi" name="kontribusi" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select> 
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">T. Relokasi :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_trelokasi" name="ck_trelokasi" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="trelokasi" name="trelokasi" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="relokasi">Tj. Relokasi</option>
                        <option value="mess">Mess</option>
                        <option value="other">Kebijakan</option>
                    </select> 
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">Transport :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_transport" name="ck_transport" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="transport" name="transport" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select> 
                </div>
            </div>
        </div>
        <div class="form-group col-xs-3">
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">Makan :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_makan" name="ck_makan" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="makan" name="makan" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select> 
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">KHK :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_khk" name="ck_khk" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="khk" name="khk" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <option value="type3">Type 3</option>
                    </select> 
                </div>
            </div>

            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">Shift :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_shift" name="ck_shift" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="shift" name="shift" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        <option value="type3">Type 3</option>
                    </select> 
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">Lembur :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_lembur" name="ck_lembur" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="lembur" name="lembur" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="depnaker">Depnaker</option>
                        <option value="hr1">HR1</option>
                        <option value="hr2">HR2</option>
                        <option value="type4">Type 4</option>
                    </select> 
                </div>
            </div>
        </div>
        <div class="form-group col-xs-2">
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">I. Lembur :</label>
                <div class="col-sm-4">
                    <label>
                        <input id="ck_ilembur" name="ck_ilembur" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">I. Tonase :</label>
                <div class="col-sm-4">
                    <label>
                        <input id="ck_itonase" name="ck_itonase" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">I. Lapangan :</label>
                <div class="col-sm-4">
                    <label>
                        <input id="ck_ilapangan" name="ck_ilapangan" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">BPJS TK :</label>
                <div class="col-sm-4">
                    <label>
                        <input id="ck_bpjstk" name="ck_bpjstk" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">BPJS Kes :</label>
                <div class="col-sm-4">
                    <label>
                        <input id="ck_bpjskes" name="ck_bpjskes" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
        </div>
        <div class="form-group col-xs-3">
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Manulife :</label>
                <div class="col-sm-2">
                    <label>
                        <input id="ck_manulife" name="ck_manulife" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Fix Intentive :</label>
                <div class="col-sm-2">
                    <label>
                        <input id="ck_fixintentive" name="ck_fixintentive" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">iuran Pensiun :</label>
                <div class="col-sm-2">
                    <label>
                        <input id="ck_iuranpensiun" name="ck_iuranpensiun" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Car Allowance :</label>
                <div class="col-sm-2">
                    <label>
                        <input id="ck_carallowance" name="ck_carallowance" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Driver Allowance :</label>
                <div class="col-sm-2">
                    <label>
                        <input id="ck_driverallowance" name="ck_driverallowance" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Sp BCS :</label>
                <div class="col-sm-2">
                    <label>
                        <input id="ck_spbcs" name="ck_spbcs" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                    </label>                
                </div>
            </div>
        </div>
        <div class="col-xs-12">- </div>

        <div class="col-xs-12 col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Komponen Gaji</h4>

                    <span class="widget-toolbar">
                        <a href="#" data-action="reload">
                            <i class="ace-icon fa fa-refresh"></i>
                        </a>

                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>

                        <a href="#" data-action="close">
                            <i class="ace-icon fa fa-times"></i>
                        </a>
                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                                        
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Gaji Pokok</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                    
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Upah Harian</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Kontribusi</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Prestasi (old. Benefit)</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Prestasi (T. Prestasi)</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Makan</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Transport</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Relokasi</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Skill</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Jabatan</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Komunikasi</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Lembur</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">KHK</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Incentive Overtime</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Shift</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Incentive Lapangan</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Incentive Tgl 10</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">JK_JKK 1,19%</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">JHT_coy 3.7%</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">JHT_coy 2%</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">BPJS Kes_Coy 4%</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">BPJS Kes_Coy 0,5%</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Manulife</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Hari Raya</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Honorarium (komisaris)</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Severence</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        
           
                        
                            <div>&nbsp;</div>
                        

                    </div>            
                </div>            
            </div><!-- /.span -->            
        </div><!-- /.row -->

        <div class="col-xs-12 col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Komponen Potongan Gaji</h4>

                    <span class="widget-toolbar">
                        <a href="#" data-action="reload">
                            <i class="ace-icon fa fa-refresh"></i>
                        </a>

                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>

                        <a href="#" data-action="close">
                            <i class="ace-icon fa fa-times"></i>
                        </a>
                    </span>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                                        
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Potongan SP. BCS</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                    
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">JHT eey 2%</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">BPJS Kes eey 0,5</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Koprasi</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>

                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Employee Loan</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Excess/Advance Medical</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">BPR Loan</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Absece</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Keterlambatan</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">ZIS</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Lain-Lain</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tax PPh-21</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Tunjangan Hari Raya</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Iuran Pensiun</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Seragam Kerja</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Sepatu Kerja</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Medical Check Up</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        <label for="form-field-select-3" class="control-label col-sm-8 no-padding-right">Bonus Akhir Tahun</label>
                        <div class="col-sm-4">
                            <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
                                <option value="">  </option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                            </select>
                        </div>
                        
           
                        
                            <div>&nbsp;</div>
                        

                    </div>
                </div>            
            </div><!-- /.span -->            
        </div><!-- /.row -->
        <div>&nbsp;</div>
    </form>     
    <div>&nbsp;</div>
    
</div>
<div>&nbsp;</div>
<script type="text/javascript">
    jQuery(function($) {
//        
        $('.chosen-select').chosen(); 
        $(".chosen-select").val('').trigger("change").prop('disabled', true).trigger("chosen:updated");
        $('#ck_kontribusi').on('click', function() {               
            if($('#kontribusi').get(0).hasAttribute('disabled')) {
                $("#kontribusi").val('daily').trigger("change").prop('disabled', false).trigger("chosen:updated");
            }
            else {
                $("#kontribusi").val('').trigger("change").prop('disabled', true).trigger("chosen:updated");
            }
        });        
        $('#ck_makan').on('click', function() {               
            if($('#makan').get(0).hasAttribute('disabled')) {
                $("#makan").val('daily').trigger("change").prop('disabled', false).trigger("chosen:updated");
            }
            else {
                $("#makan").val('').trigger("change").prop('disabled', true).trigger("chosen:updated");
            }
        });
        $('#ck_transport').on('click', function() {               
            if($('#transport').get(0).hasAttribute('disabled')) {
                $("#transport").val('daily').trigger("change").prop('disabled', false).trigger("chosen:updated");
            }
            else {
                $("#transport").val('').trigger("change").prop('disabled', true).trigger("chosen:updated");
            }
        });
    })
</script>