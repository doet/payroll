@extends('backend.app_backend')

@section('css')
    {!! Html::style('/css/jquery-ui.min.css') !!}
    {!! Html::style('/css/bootstrap-datepicker3.min.css') !!}
    {!! Html::style('/css/ui.jqgrid.min.css') !!}
@endsection

@section('breadcrumb')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{url('')}}">Home</a>
            </li>
          
            @foreach(array_reverse($aktif_menu) as $row)
            <li>
                {!!$row['nama']!!}
            </li>
            @endforeach
        </ul><!-- /.breadcrumb -->
        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>
@endsection


@section('content')

    <div class="row">
        <div class="col-xs-12">

            <div class="btn-group">
                <button id="ambil" data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle" style="display: none;">
                    Perbaharui
                </button>
            </div>

            <!-- PAGE CONTENT BEGINS -->
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="tabbable">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a data-toggle="tab" onclick="load('derectorat','#isi')">
                                    <i class="green ace-icon fa fa-home bigger-120"></i>
                                    Derectorat
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" onclick="load('divisi','#isi')">
                                    Divisi
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" onclick="load('departement','#isi')">
                                    Departement
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" onclick="load('costofsales','#isi')">
                                    Costofsales
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" onclick="load('title','#isi')">
                                    Title
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" onclick="load('grade','#isi')">
                                    Grade
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" onclick="load('level','#isi')">
                                    level
                                </a>
                            </li>
                            
                        </ul>

                        <div class="tab-content">
                            <div id="isi" class="tab-pane fade in active">

                            </div>                            
                        </div>
                    </div>
                </div><!-- /.col -->
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('js')
    {!! Html::script('/js/alpa-app.js') !!}
    {!! HTML::script('/js/bootstrap-datepicker.min.js') !!}
    {!! HTML::script('/js/jquery.jqGrid.min.js') !!}
    {!! HTML::script('/js/grid.locale-en.js') !!}
    <script type="text/javascript">
        var site ="{{url('')}}";
        jQuery(function($) {
            load("derectorat","#isi");

            $('#ambil').click(function() {
//              var request = $("#absenform").serialize();
                var postData = {datatb:'syn_parameter',_token:'<?php echo csrf_token();?>'};
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/CrudParameter/') }}",
                    data: postData,
                    beforeSend:function(){
                        $("#ambil").prop('disabled', true);
                        var newHTML = '<i class="ace-icon fa fa-spinner fa-spin "></i>Loading...';
                        document.getElementById('ambil').innerHTML = newHTML;
                        
                    },
                    success: function(msg) {
                        $("#ambil").prop('disabled', false);                   
                        var newHTML = 'Perbaharui';
                        document.getElementById('ambil').innerHTML = newHTML;
                        if(msg.status == 'success'){
                            alert (msg.msg);
                           
                        } else {                            
                            alert (msg.msg);
                           
                        }
                    }
                })
            });
        })
        </script>
@endsection