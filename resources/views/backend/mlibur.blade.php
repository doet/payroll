@extends('backend.app_backend')

@section('css')
    <!-- page specific plugin styles -->
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

@section('content')                       <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <table id="table"></table>
            <div id="pager"></div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('js')
<!-- page specific plugin scripts -->

    {!! HTML::script('/js/bootstrap-datepicker.min.js') !!}
    {!! HTML::script('/js/jquery.jqGrid.min.js') !!}
    {!! HTML::script('/js/grid.locale-en.js') !!}


    <script type="text/javascript">
        jQuery(function($) {
            var tabel = "#table";
            var pager_tabel = "#pager";
            
            //resize to fit page size
            $(window).on('resize.jqGrid', function () {
                $(tabel).jqGrid( 'setGridWidth', $(".page-content").width() );
            })
            
            //resize on sidebar collapse/expand
            var parent_column = $(tabel).closest('[class*="col-"]');
            $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
                if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
                    //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
                    setTimeout(function() {
                        $(tabel).jqGrid( 'setGridWidth', parent_column.width() );
                    }, 0);
                }
            })
            
            //if your grid is inside another element, for example a tab pane, you should use its parent's width:                
            $(window).on('resize.jqGrid', function () {
                var parent_width = $(tabel).closest('.tab-pane').width();
                $(tabel).jqGrid( 'setGridWidth', parent_width );
            })
            //and also set width when tab pane becomes visible
            $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              if($(e.target).attr('href') == '#mygrid') {
                var parent_width = $(tabel).closest('.tab-pane').width();
                $(tabel).jqGrid( 'setGridWidth', parent_width );
              }
            })
            
            var master = jQuery(tabel).jqGrid({

                caption: "Data Libur Nasional dan Cuti Bersama",
                datatype: "json",            //supported formats XML, JSON or Arrray
                url:"{{url('MasterParameterJqgrid')}}",
                editurl: "{{url('MasterParameterSave')}}",//nothing is saved
                mtype : "post",           
                postData: {datatb:'mlibur', _token:'{{ csrf_token() }}'},
                sortname:'id',
                sortorder: 'desc',
                height: 250,  
                colNames:[' ', 'Tanggal','Keterangan'],
                colModel:[
                    {name:'myac',index:'', width:70, fixed:true, sortable:false, resize:false,
                        formatter:'actions', 
                        formatoptions:{ 
                            keys:true,
                            delbutton: true,//disable delete button
                            
                            delOptions:{recreateForm: true, beforeShowForm:beforeDeleteCallback},
                            //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}                              
                        }
                    },
                    {name:'sdate',index:'sdate',width:90, editable:true, sorttype:"date",unformat: pickDate},
                    {name:'ket',index:'ket', width:90, editable: true}                                              
                ], 
                
                viewrecords : true,
                rowNum:10,
                rowList:[10,20,30],
                pager : pager_tabel,
                altRows: true,
                multiboxonly: true,
        
                loadComplete : function() {
                    var table = this;
                    setTimeout(function(){
                        styleCheckbox(table);
                        
                        updateActionIcons(table);
                        updatePagerIcons(table);
                        enableTooltips(table);
                    }, 0);
                },
                
                serializeRowData:function(postdata,ids) {
                    postdata.datatb = 'nilai';
                    postdata.grup = 'jabatan';
                    postdata._token = '<?php echo csrf_token();?>';                     
                    return postdata;
                }
            });
            $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

            //enable search/filter toolbar
            //jQuery(tabel).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
            //jQuery(tabel).filterToolbar({});
        
        
            //switch element when editing inline
            function aceSwitch( cellvalue, options, cell ) {
                setTimeout(function(){
                    $(cell) .find('input[type=checkbox]')
                        .addClass('ace ace-switch ace-switch-5')
                        .after('<span class="lbl"></span>');
                }, 0);
            }
            //enable datepicker
            function pickDate( cellvalue, options, cell ) {
                setTimeout(function(){
                    $(cell) .find('input[type=text]')
                            .datepicker({format:'dd MM yyyy' , autoclose:true}); 
                }, 0);
            }
        
            //navButtons
            jQuery(tabel).jqGrid('navGrid',pager_tabel,
                {   //navbar options
                
                    edit: true,
                    editicon : 'ace-icon fa fa-pencil blue',
                    add: true,
                    addicon : 'ace-icon fa fa-plus-circle purple',
                    del: true,
                    delicon : 'ace-icon fa fa-trash-o red',
                    search: true,
                    searchicon : 'ace-icon fa fa-search orange',
                    refresh: true,
                    refreshicon : 'ace-icon fa fa-refresh green',
                    view: false,
                    viewicon : 'ace-icon fa fa-search-plus grey',
                    
                },
                {
                    //edit record form
                    closeAfterEdit: true,
                    //width: 700,
                    recreateForm: true,
                    beforeShowForm : function(e) {
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_edit_form(form);
                    },
                    onclickSubmit: function () {                            
                        return { datatb:'nilai', grup:'jabatan', _token:'<?php echo csrf_token();?>'};
                    }
                },
                {
                    //new record form
                    //width: 700,
                    closeAfterAdd: true,
                    recreateForm: true,
                    viewPagerButtons: false,
                    beforeShowForm : function(e) {
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                        .wrapInner('<div class="widget-header" />')
                        style_edit_form(form);
                    },
                    onclickSubmit: function () {                            
                        return { datatb:'nilai', grup:'jabatan', _token:'<?php echo csrf_token();?>'};
                    }
                },
                {
                    //delete record form
                    recreateForm: true,
                    beforeShowForm : function(e) {
                        var form = $(e[0]);
                        if(form.data('styled')) return false;
                        
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_delete_form(form);
                        
                        form.data('styled', true);
                    },
                    onclickSubmit: function () {                            
                        return { datatb:'nilai', grup:'jabatan', _token:'<?php echo csrf_token();?>'};
                    }
                },
                {
                    //search form
                    recreateForm: true,
                    afterShowSearch: function(e){
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                        style_search_form(form);
                    },
                    afterRedraw: function(){
                        style_search_filters($(this));
                    }
                    ,
                    multipleSearch: true,
                    /**
                    multipleGroup:true,
                    showQuery: true
                    */
                },
                {
                    //view record form
                    recreateForm: true,
                    beforeShowForm: function(e){
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                    }
                }
            )
        
            function style_edit_form(form) {
                //enable datepicker on "sdate" field and switches for "stock" field
                form.find('input[name=sdate]').datepicker({format:'dd MM yyyy' , autoclose:true})
                
                form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
                           //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
                          //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');
        
                        
                //update buttons classes
                var buttons = form.next().find('.EditButton .fm-button');
                buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
                buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
                buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
                
                buttons = form.next().find('.navButton a');
                buttons.find('.ui-icon').hide();
                buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
                buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');       
            }
        
            function style_delete_form(form) {
                var buttons = form.next().find('.EditButton .fm-button');
                buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
                buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
                buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
            }
            
            function style_search_filters(form) {
                form.find('.delete-rule').val('X');
                form.find('.add-rule').addClass('btn btn-xs btn-primary');
                form.find('.add-group').addClass('btn btn-xs btn-success');
                form.find('.delete-group').addClass('btn btn-xs btn-danger');
            }
            function style_search_form(form) {
                var dialog = form.closest('.ui-jqdialog');
                var buttons = dialog.find('.EditTable')
                buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
                buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
                buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
            }
            
            function beforeDeleteCallback(e) {
                var form = $(e[0]);
                if(form.data('styled')) return false;
                
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_delete_form(form);
                
                form.data('styled', true);
            }
            
            function beforeEditCallback(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            }
        
        
        
            //it causes some flicker when reloading or navigating grid
            //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
            //or go back to default browser checkbox styles for the grid
            function styleCheckbox(table) {
            /**
                $(table).find('input:checkbox').addClass('ace')
                .wrap('<label />')
                .after('<span class="lbl align-top" />')
        
        
                $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
                .find('input.cbox[type=checkbox]').addClass('ace')
                .wrap('<label />').after('<span class="lbl align-top" />');
            */
            }
            
        
            //unlike navButtons icons, action icons in rows seem to be hard-coded
            //you can change them like this in here if you want
            function updateActionIcons(table) {
                /**
                var replacement = 
                {
                    'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
                    'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
                    'ui-icon-disk' : 'ace-icon fa fa-check green',
                    'ui-icon-cancel' : 'ace-icon fa fa-times red'
                };
                $(table).find('.ui-pg-div span.ui-icon').each(function(){
                    var icon = $(this);
                    var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
                    if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
                })
                */
            }
            
            //replace icons with FontAwesome icons like above
            function updatePagerIcons(table) {
                var replacement = 
                {
                    'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
                    'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
                    'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
                    'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
                };
                $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
                    var icon = $(this);
                    var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
                    
                    if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
                })
            }
        
            function enableTooltips(table) {
                $('.navtable .ui-pg-button').tooltip({container:'body'});
                $(table).find('.ui-pg-div').tooltip({container:'body'});
            }
        
            //var selr = jQuery(tabel).jqGrid('getGridParam','selrow');
        
            $(document).one('ajaxloadstart.page', function(e) {
                $(tabel).jqGrid('GridUnload');
                $('.ui-jqdialog').remove();
            });
        });
    </script>
<!-- inline scripts related to this page -->
  
@endsection
