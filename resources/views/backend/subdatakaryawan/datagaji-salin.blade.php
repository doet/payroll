    <div class=" profile-user-info-striped col-xs-4">
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
    </div>
    <div class=" profile-user-info-striped col-xs-4">
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
    <div class=" profile-user-info-striped col-xs-4">
        <div class="profile-info-row">
            <div class="profile-info-name"> Set Tanggal </div>
            <div class="profile-info-value">
                <span class="editable" id="setdate"><?php echo date('d F Y')?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> &nbsp; </div>
            <div class="profile-info-value">                                    
                <span>&nbsp;</span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> &nbsp; </div>
            <div class="profile-info-value">
                <span>&nbsp;</span>
            </div>
        </div>                                              
    </div>
    <div>&nbsp;</div>

    <form id="form-gaji" method="get">
    <input type="hidden" id='_token' name="_token" value='<?php echo csrf_token();?>' />    
    <input type="hidden" id='datatb' name="datatb" value="datagaji" />
    <input type="hidden" id='payroll_id' name="payroll_id" value="<?php echo $data['payroll_id'] ?>" />
    <input name="setdate" value="" type="hidden"/>

    <div class="form-group col-xs-4">
        <div class="col-xs-12">
            <label class="control-label col-sm-4 no-padding-right">T. Komunikasi :</label>
            <div class="col-sm-8">
                <label>
                    <input id="ck_tkomunikasi" name="ck_tkomunikasi" data='tkomunikasi' class="ace enableselect" type="checkbox">
                    <span class="lbl"> </span>
                </label>
                <select id="tkomunikasi" name="dgaji['tkomunikasi']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
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
                    <input id="ck_tkontribusi" name="ck_tkontribusi" data="tkontribusi" class="ace enableselect" type="checkbox">
                    <span class="lbl"> </span>
                </label>
                <select id="tkontribusi" name="dgaji['tkontribusi']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                    <option value="daily">Daily</option>
                    <option value="monthly">Monthly</option>
                </select> 
            </div>
        </div>
        <div class="col-xs-12">
            <label class="control-label col-sm-4 no-padding-right">T. Relokasi :</label>
            <div class="col-sm-8">
                <label>
                    <input id="ck_trelokasi" name="ck_trelokasi" data="trelokasi" class="ace enableselect" type="checkbox">
                    <span class="lbl"> </span>
                </label>
                <select id="trelokasi" name="dgaji['trelokasi']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
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
                    <input id="ck_transport" name="ck_transport" data="transport" class="ace enableselect" type="checkbox">
                    <span class="lbl"> </span>
                </label>
                <select id="transport" name="dgaji['transport']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
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
                        <input id="ck_makan" name="ck_makan" data="makan" class="ace enableselect" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="makan" name="dgaji['makan']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
                        <option value="daily">Daily</option>
                        <option value="monthly">Monthly</option>
                    </select> 
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-4 no-padding-right">KHK :</label>
                <div class="col-sm-8">
                    <label>
                        <input id="ck_khk" name="ck_khk" data="khk" class="ace enableselect" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="khk" name="dgaji['khk']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
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
                        <input id="ck_shift" name="ck_shift" data="shift" class="ace enableselect" type="checkbox">
                        <span class="lbl"> </span>
                    </label>
                    <select id="shift" name="dgaji['shift']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
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
                        <input data="lembur" class="ace enableselect" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_lembur" name="ck_lembur" type="hidden" value="">
                    </label>
                    <select id="lembur" name="dgaji['lembur']" class="chosen-select form-control col-sm-3" style="float: right;max-width:112px;" data-placeholder="Pilih ...">
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
                        <input data="ilembur" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_ilembur" name="dgaji['ilembur']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">I. Tonase :</label>
                <div class="col-sm-4">
                    <label>
                        <input data="itonase" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_itonase" name="dgaji['itonase']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">I. Lapangan :</label>
                <div class="col-sm-4">
                    <label>
                        <input data="ilapangan" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_ilapangan" name="dgaji['ilapangan']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">BPJS TK :</label>
                <div class="col-sm-4">
                    <label>
                        <input data="bpjstk" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_bpjstk" name="dgaji['bpjstk']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-8 no-padding-right">BPJS Kes :</label>
                <div class="col-sm-4">
                    <label>
                        <input data="bpjskes" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_bpjskes" name="dgaji['bpjskes']" type="hidden" value="">
                    </label>                
                </div>
            </div>
        </div>

        <div class="form-group col-xs-3">
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Manulife :</label>
                <div class="col-sm-2">
                    <label>
                        <input data="manulife" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_manulife" name="dgaji['manulife']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Fix Intentive :</label>
                <div class="col-sm-2">
                    <label>
                        <input data="fixintentive" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_fixintentive" name="dgaji['fixintentive']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">iuran Pensiun :</label>
                <div class="col-sm-2">
                    <label>
                        <input data="iuranpensiun" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_iuranpensiun" name="dgaji['iuranpensiun']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Car Allowance :</label>
                <div class="col-sm-2">
                    <label>
                        <input data="carallowance" class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_carallowance" name="dgaji['carallowance']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Driver Allowance :</label>
                <div class="col-sm-2">
                    <label>
                        <input data='driverallowance' class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_driverallowance" name="dgaji['driverallowance']" type="hidden" value="">
                    </label>                
                </div>
            </div>
            <div class="col-xs-12">
                <label class="control-label col-sm-10 no-padding-right">Sp BCS :</label>
                <div class="col-sm-2">
                    <label>
                        <input data='spbcs' class="ace" type="checkbox">
                        <span class="lbl"> </span>
                        <input id="ck_spbcs" name="dgaji['spbcs']" class="ace" type='hidden' value="">
                    </label>                
                </div>
            </div>
        </div>

<!--            -->

        <div class="col-xs-12 col-sm-6" id="div_upah">
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

        <div class="col-xs-12 col-sm-6" id='div_potongan'>
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
        <div class="modal-footer center">
            <button id="save" type="button" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>
            <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>
        </div>
    </form>


<script type="text/javascript">
    jQuery(function($) {              
        var setdate = $('#setdate').html();  
        $('input[name="setdate"]').val(setdate);

        $('.enableselect').on('click', function(elm) { enableselecvalue($(this).attr('data')) });
////////////////////////////////////////////////////////////////////////////////////////////////////////
        $('input[type="checkbox"]').on('change', function() { 
            if(this.checked == true){
                $('#ck_'+$(this).attr('data')).val('on')
            } else {
                $('#ck_'+$(this).attr('data')).val('')
            }
        });
///////////////////////////////////////////////////////////////////////////////////////////////////////
        $('#div_potongan').height($('#div_upah').height());
       
        $('#setdate').editable({
            type: 'adate',
            date: {
                //datepicker plugin options
                    format: 'dd MM yyyy',
                viewformat: 'dd MM yyyy',
                 weekStart: 1
                 
                //,nativeUI: true//if true and browser support input[type=date], native browser control will be used
                //,format: 'yyyy-mm-dd',
                //viewformat: 'yyyy-mm-dd'
            }
        }).on('save', function(e, params) {
            $('input[name="setdate"]').val(params.newValue);
            setdate = params.newValue;
            reload();
        });

        
        reload();
        

        $('#save').click(function() {
            var postData = $("#form-gaji").serialize();
            //var postData = {datatb:'syn_parameter',_token:'<?php echo csrf_token();?>'};
            $.ajax({
                type: 'POST',
                url: "<?php echo url('/CrudKaryawan/'); ?>",
                data: postData,
                beforeSend:function(){/*
                    $("#ambil").prop('disabled', true);
                    var newHTML = '<i class="ace-icon fa fa-spinner fa-spin "></i>Loading...';
                    document.getElementById('ambil').innerHTML = newHTML;
                    */
                },
                success: function(msg) {
                /*    $("#ambil").prop('disabled', false);                   
                    var newHTML = 'Perbaharui';
                    document.getElementById('ambil').innerHTML = newHTML;
                    if(msg.status == 'success'){
                        alert (msg.msg);
                       
                    } else {                            
                        alert (msg.msg);
                       
                    }*/
                    alert(JSON.stringify(msg));  
                }
            })
        });

        function reload(){

            $('.chosen-select').chosen(); 
            $(".chosen-select").val('').trigger("change").prop('disabled', true).trigger("chosen:updated");        
            //$('.enableselect').prop("checked", false);  
            
            $('input[type="checkbox"]').prop("checked", false);
            $('.hide').prop('checked', true); // Checks it

            var postData = {datatb:'isidatagaji',id:'<?php echo $data['payroll_id'];?>',setdate:setdate,_token:'<?php echo csrf_token();?>'};
            $.ajax({
                type: 'POST',
                url: "<?php echo url('/CrudKaryawan/'); ?>",
                data: postData,
                beforeSend:function(){

                },
                success: function(msg) {

                    for (var i = 0, len = msg.length; i < len; i++) {
                        if (msg[i].value==''){
                            $('input[data='+msg[i].jenis).prop("checked", false);
                        } else {

                            $('input[data='+msg[i].jenis).prop("checked", true);

                            if (msg[i].value!='on'){
                                $('#'+msg[i].jenis).val(msg[i].value).trigger("change").prop('disabled', false).trigger("chosen:updated");
                            }
                        }           
                    }
                //alert(JSON.stringify(msg));    
                }
            })
        }

        function enableselecvalue(elment){            
            if($('#'+elment).get(0).hasAttribute('disabled')) {
                $('#'+elment).val('').trigger("change").prop('disabled', false).trigger("chosen:updated"); 
            }
            else {
                $('#'+elment).val('').trigger("change").prop('disabled', true).trigger("chosen:updated");
            }
        }
    })
</script>