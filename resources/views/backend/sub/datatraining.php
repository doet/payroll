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
    <div class=" profile-user-info-striped col-xs-8">
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
    
    <div>&nbsp;</div>

<!--            -->
    <div class="row">
        <div class="col-xs-12">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="center" rowspan="2">No</th>
                        <th class="center" rowspan="2"> </th>
                        <th class="center" rowspan="2">Jenis</th>
                        <th class="center" rowspan="2">Penyelenggara</th>
                        <th class="center" rowspan="2">Nama Training</th>
                        <th class="center" colspan="2">Tanggal Training</th>
                        <th class="center" rowspan="2">Status</th>
                    </tr>
                    <tr>
                        <th class="center">Mulai</th>
                        <th class="center">Akhir</th>                        
                    </tr>
                    
                </thead>

                <tbody>
            <?php 
                $no=1;
                foreach ($training as $row) { 
            ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                    <i class="ace-icon fa fa-angle-double-down"></i>
                                    <span class="sr-only">Details</span>
                                </a>
                            </div>
                        </td>                        
                        <td><?php echo $row->jenis_training; ?></td>
                        <td><?php echo $row->trainer; ?></td>
                        <td><?php echo $row->nama_training; ?></td>
                        <td><?php echo $row->tanggal_mulai; ?></td>
                        <td><?php echo $row->tanggal_akhir; ?></td>
                        <td><?php echo $row->status; ?></td>
                    </tr>
                    <tr class="detail-row">
                        <td colspan="9">
                            <div class="table-detail">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <div class="space visible-xs"></div>

                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">Nilai Pre Test </div>

                                                <div class="profile-info-value">
                                                    <span>&nbsp;</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name">Nilai Post Test </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $row->skor_evaluasi; ?></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Hasil Training </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $row->skor_evaluasi_efektifitas; ?></span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Keterangan </div>

                                                <div class="profile-info-value">
                                                    <span>&nbsp;</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Scan Sertificate </div>

                                                <div class="profile-info-value">
                                                    <span><?php echo $row->attachment; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php 
                    $no++;
                }
                //echo '<pre>';
                //print_r($keluarga);
                //echo '</pre>';
                if ($training==[]) { 
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
            <?php } ?>    
                </tbody>
            </table>
            
        </div><!-- /.span -->
    </div><!-- /.row -->

    <div>&nbsp;</div>

<script type="text/javascript">
            jQuery(function($) {
                //And for the first simple table, which doesn't have TableTools or dataTables
                //select/deselect all rows according to table header checkbox
                var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
                    var th_checked = this.checked;//checkbox inside "TH" table header
                    
                    $(this).closest('table').find('tbody > tr').each(function(){
                        var row = this;
                        if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });
                
                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
                    var $row = $(this).closest('tr');
                    if($row.is('.detail-row ')) return;
                    if(this.checked) $row.addClass(active_class);
                    else $row.removeClass(active_class);
                });
            
                
                /***************/
                $('.show-details-btn').on('click', function(e) {
                    e.preventDefault();
                    $(this).closest('tr').next().toggleClass('open');
                    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                });
                /***************/
                
                
                
                
                
                /**
                //add horizontal scrollbars to a simple table
                $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
                  {
                    horizontal: true,
                    styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                    size: 2000,
                    mouseWheelLock: true
                  }
                ).css('padding-top', '12px');
                */
            
            
            })
        </script>