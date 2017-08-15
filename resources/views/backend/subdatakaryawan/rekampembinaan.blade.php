    <div class=" profile-user-info-striped col-xs-4">
        <div class="profile-info-row">
            <div class="profile-info-name"> Payroll ID </div>
            <div class="profile-info-value">
                <span><?php echo $data->payroll_id ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Nama </div>
            <div class="profile-info-value">
                <span><?php echo $data->nama_karyawan ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Title </div>
            <div class="profile-info-value">                                    
                <span><?php echo $data->title ?></span>
            </div>
        </div>
    </div>
    <div class=" profile-user-info-striped col-xs-8">
        <div class="profile-info-row">
            <div class="profile-info-name"> Departement </div>
            <div class="profile-info-value">
                <span><?php echo $data->dept_name ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Cost Of Sales </div>
            <div class="profile-info-value">                                    
                <span><?php echo $data->title ?></span>
            </div>
        </div>
        <div class="profile-info-row">
            <div class="profile-info-name"> Eligibility </div>
            <div class="profile-info-value">
                <span><?php echo $data->dept_name ?></span>
            </div>
        </div>                                              
    </div>
    
    <div>&nbsp;</div>

<!--            -->
    <div class="row">
        <div class="col-xs-12">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center" rowspan="2">No</th>
                        <th class="center" rowspan="2">Tanggal</th>
                        <th class="center" rowspan="2">Jenis Pembinaan</th>                        
                        <th class="center" colspan="2">Schorshing</th>
                        <th class="center" colspan="2">Tanggal Berlaku Pembinaan</th>
                        <th class="center" rowspan="2">Uraian Pelanggaran</th>
                        <th class="center" rowspan="2">Scan</th>
                    </tr>
                    <tr>
                        <th class="center">Mulai</th>
                        <th class="center">Akhir</th>                                            
                        <th class="center">Mulai</th>
                        <th class="center">Akhir</th>                        
                    </tr>
                    
                </thead>

                <tbody>
            <?php 
                $no=1;
                foreach ($bina as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no ?></td>                        
                        <td><?php echo $row->date ?></td>  
                        <td><?php echo $row->action_type ?></td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td><?php echo $row->remarks ?></td>
                        <td>doc</td>
                    </tr>                    
            <?php 
                    $no++;
                }
                //echo '<pre>';
                //print_r($keluarga);
                //echo '</pre>';
                //if ($bina==[]) { 
            ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            <?php //} ?>    
                </tbody>
            </table>
            
        </div><!-- /.span -->
    </div><!-- /.row -->

    <div>&nbsp;</div>

<script type="text/javascript">
            jQuery(function($) {
                
            })
        </script>