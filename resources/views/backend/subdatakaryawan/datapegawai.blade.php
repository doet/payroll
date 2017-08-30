<div style="height: 700px;">
<form class="form-horizontal form-aktif" id="form-1" method="get">

    <div class="form-group col-xs-2 center">
        <div >
            <span class="profile-picture">
                <img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php
                    if ($data->jenis_kelamin=='MALE') echo url('images/avatars/profile-pic-l.jpg'); elseif ($data->jenis_kelamin=='FEMALE') echo url('images/avatars/profile-pic-p.jpg');
                    ?>" />
            </span>
        </div>
    </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Nama </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->nama_karyawan ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Tgl. Lahir </div>
                                <div class="profile-info-value">
                                    <span> <?php echo $data->tempat_lahir .', '. date('d-m-Y',$data->tgl_lahir) ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Jenis Kelamin </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->jenis_kelamin ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Agama </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->agama ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Gol.Darah </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->gol_darah ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Marital Status </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->marital_status ?></span>
                                </div>
                            </div>
                            <div>&nbsp;</div>
                        </div>
                        <div class=" profile-user-info-striped col-xs-5">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> No KK </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->no_kk ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> No KTP </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->no_ktp ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Ibu Kandung </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->nama_ibu_kandung ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Alamat </div>
                                <div class="profile-info-value" style="height: 65px">
                                    <span><?php echo '' ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Telephone </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->telp1 ?></span>
                                </div>
                            </div>
                            <div>&nbsp;</div>
                        </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Date. in-out </div>
                                <div class="profile-info-value">
                                    <span><?php echo date('d-m-Y',$data->tgl_masuk) .' s.d. '. date('d-m-Y',$data->tgl_keluar) ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Finish Contract </div>
                                <div class="profile-info-value">
                                    <span><?php echo date('d-m-Y',$data->tgl_finish_contract) ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Grade </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->grade ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Level </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->level ?></span>
                                </div>
                            </div>
                        </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Lokasi Kerja </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->loc_name ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Title </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->title ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Departement </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->dept_name ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Divisi </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->div_name ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Directorat </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->dir_name ?></span>
                                </div>
                            </div>
                        </div>

                        <div class=" profile-user-info-striped col-xs-4">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Payroll ID </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->payroll_id ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Bank </div>
                                <div class="profile-info-value">
                                    <span><?php echo "( ".$data->nama_bank." )". $data->no_account_bank ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> No NPWP </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->no_npwp ?></span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Divisi </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->div_name ?></span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> ID Driver </div>
                                <div class="profile-info-value">
                                    <span><?php echo $data->id_driver ?></span>
                                </div>
                            </div>
                        </div>
</form>     </div>

<script type="text/javascript">
            // *** editable avatar *** //
            try {//ie8 throws some harmless exceptions, so let's catch'em

                //first let's add a fake appendChild method for Image element for browsers that have a problem with this
                //because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
                try {
                    document.createElement('IMG').appendChild(document.createElement('B'));
                } catch(e) {
                    Image.prototype.appendChild = function(el){}
                }

                var last_gritter
                $('#avatar').editable({
                    type: 'image',
                    name: 'avatar',
                    value: null,
                    //onblur: 'ignore',  //don't reset or hide editable onblur?!
                    image: {
                        //specify ace file input plugin's options here
                        btn_choose: 'Change Avatar',
                        droppable: true,
                        maxSize: 110000,//~100Kb

                        //and a few extra ones here
                        name: 'avatar',//put the field name here as well, will be used inside the custom plugin
                        on_error : function(error_type) {//on_error function will be called when the selected file has a problem
                            if(last_gritter) $.gritter.remove(last_gritter);
                            if(error_type == 1) {//file format error
                                last_gritter = $.gritter.add({
                                    title: 'File is not an image!',
                                    text: 'Please choose a jpg|gif|png image!',
                                    class_name: 'gritter-error gritter-center'
                                });
                            } else if(error_type == 2) {//file size rror
                                last_gritter = $.gritter.add({
                                    title: 'File too big!',
                                    text: 'Image size should not exceed 100Kb!',
                                    class_name: 'gritter-error gritter-center'
                                });
                            }
                            else {//other error
                            }
                        },
                        on_success : function() {
                            $.gritter.removeAll();
                        }
                    },
                    url: function(params) {
                        // ***UPDATE AVATAR HERE*** //
                        //for a working upload example you can replace the contents of this function with
                        //examples/profile-avatar-update.js

                        var deferred = new $.Deferred

                        var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                        if(!value || value.length == 0) {
                            deferred.resolve();
                            return deferred.promise();
                        }


                        //dummy upload
                        setTimeout(function(){
                            if("FileReader" in window) {
                                //for browsers that have a thumbnail of selected image
                                var thumb = $('#avatar').next().find('img').data('thumb');
                                if(thumb) $('#avatar').get(0).src = thumb;
                            }

                            deferred.resolve({'status':'OK'});

                            if(last_gritter) $.gritter.remove(last_gritter);
                            last_gritter = $.gritter.add({
                                title: 'Avatar Updated!',
                                text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                                class_name: 'gritter-info gritter-center'
                            });

                         } , parseInt(Math.random() * 800 + 800))

                        return deferred.promise();

                        // ***END OF UPDATE AVATAR HERE*** //
                    },

                    success: function(response, newValue) {
                    }
                })
            }catch(e) {}

            /**
            //let's display edit mode by default?
            var blank_image = true;//somehow you determine if image is initially blank or not, or you just want to display file input at first
            if(blank_image) {
                $('#avatar').editable('show').on('hidden', function(e, reason) {
                    if(reason == 'onblur') {
                        $('#avatar').editable('show');
                        return;
                    }
                    $('#avatar').off('hidden');
                })
            }
            */
</script>
