<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        {!! Html::style('/css/bootstrap.min.css') !!}
        {!! Html::style('/font-awesome/4.5.0/css/font-awesome.min.css') !!}

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        {!! Html::style('/css/fonts.googleapis.com.css') !!}

        <!-- ace styles -->
        {!! Html::style('/css/ace.min.css') !!}

        <!--[if lte IE 9]>
            {!! Html::style('/css/ace-part2.min.css') !!}
        <![endif]-->
        {!! Html::style('/css/ace-skins.min.css') !!}
        {!! Html::style('/css/ace-rtl.min.css') !!}

        <!--[if lte IE 9]>
          {!! Html::style('/css/ace-ie.min.css') !!}
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        {!! HTML::script('/js/ace-extra.min.js') !!}

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        {!! HTML::script('/js/html5shiv.min.js') !!}
        {!! HTML::script('/js/respond.min.js') !!}
        <![endif]-->
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Ace Admin
                        </small>
                    </a>

                    <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
                        <span class="sr-only">Toggle user menu</span>

                        <img src="{{url('images/avatars/user.jpg')}}" alt="Jason's Photo" />
                    </button>

                    <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                        <span class="sr-only">Toggle sidebar</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="transparent dropdown-modal">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                            </a>

                            <div class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a data-toggle="tab" href="#navbar-tasks">
                                                Tasks
                                                <span class="badge badge-danger">4</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a data-toggle="tab" href="#navbar-messages">
                                                Messages
                                                <span class="badge badge-danger">5</span>
                                            </a>
                                        </li>
                                    </ul><!-- .nav-tabs -->

                                    <div class="tab-content">
                                        <div id="navbar-tasks" class="tab-pane in active">
                                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu">
                                                <li class="dropdown-content">
                                                    <ul class="dropdown-menu dropdown-navbar">
                                                        <li>
                                                            <a href="#">
                                                                <div class="clearfix">
                                                                    <span class="pull-left">Software Update</span>
                                                                    <span class="pull-right">65%</span>
                                                                </div>

                                                                <div class="progress progress-mini">
                                                                    <div style="width:65%" class="progress-bar"></div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <div class="clearfix">
                                                                    <span class="pull-left">Hardware Upgrade</span>
                                                                    <span class="pull-right">35%</span>
                                                                </div>

                                                                <div class="progress progress-mini">
                                                                    <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <div class="clearfix">
                                                                    <span class="pull-left">Unit Testing</span>
                                                                    <span class="pull-right">15%</span>
                                                                </div>

                                                                <div class="progress progress-mini">
                                                                    <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <div class="clearfix">
                                                                    <span class="pull-left">Bug Fixes</span>
                                                                    <span class="pull-right">90%</span>
                                                                </div>

                                                                <div class="progress progress-mini progress-striped active">
                                                                    <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="dropdown-footer">
                                                    <a href="#">
                                                        See tasks with details
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.tab-pane -->

                                        <div id="navbar-messages" class="tab-pane">
                                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu">
                                                <li class="dropdown-content">
                                                    <ul class="dropdown-menu dropdown-navbar">
                                                        <li>
                                                            <a href="#">
                                                                <img src="{{url('images/avatars/avatar.png')}}" class="msg-photo" alt="Alex's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Alex:</span>
                                                                        Ciao sociis natoque penatibus et auctor ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>a moment ago</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="{{url('images/avatars/avatar3.png')}}" class="msg-photo" alt="Susan's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Susan:</span>
                                                                        Vestibulum id ligula porta felis euismod ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>20 minutes ago</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="{{url('images/avatars/avatar4.png')}}" class="msg-photo" alt="Bob's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Bob:</span>
                                                                        Nullam quis risus eget urna mollis ornare ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>3:15 pm</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="{{url('images/avatars/avatar2.png')}}" class="msg-photo" alt="Kate's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Kate:</span>
                                                                        Ciao sociis natoque eget urna mollis ornare ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>1:33 pm</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#">
                                                                <img src="{{url('images/avatars/avatar5.png')}}" class="msg-photo" alt="Fred's Avatar" />
                                                                <span class="msg-body">
                                                                    <span class="msg-title">
                                                                        <span class="blue">Fred:</span>
                                                                        Vestibulum id penatibus et auctor  ...
                                                                    </span>

                                                                    <span class="msg-time">
                                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                                        <span>10:09 am</span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="dropdown-footer">
                                                    <a href="inbox">
                                                        See all messages
                                                        <i class="ace-icon fa fa-arrow-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- /.tabbable -->
                            </div><!-- /.dropdown-menu -->
                        </li>

                        <li class="light-blue dropdown-modal user-min">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="{{url('images/avatars/user.jpg')}}" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    Jason
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="profile">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Overview
            &nbsp;
                                <i class="ace-icon fa fa-angle-down bigger-110"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-light-blue dropdown-caret">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-eye bigger-110 blue"></i>
                                        Monthly Visitors
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-user bigger-110 blue"></i>
                                        Active Users
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog bigger-110 blue"></i>
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-envelope"></i>
                                Messages
                                <span class="badge badge-warning">5</span>
                            </a>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-left form-search" role="search">
                        <div class="form-group">
                            <input type="text" placeholder="search" />
                        </div>

                        <button type="button" class="btn btn-mini btn-info2">
                            <i class="ace-icon fa fa-search icon-only bigger-110"></i>
                        </button>
                    </form>
                </nav>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                            <i class="ace-icon fa fa-signal"></i>
                        </button>

                        <button class="btn btn-info">
                            <i class="ace-icon fa fa-pencil"></i>
                        </button>

                        <button class="btn btn-warning">
                            <i class="ace-icon fa fa-users"></i>
                        </button>

                        <button class="btn btn-danger">
                            <i class="ace-icon fa fa-cogs"></i>
                        </button>
                    </div>

                    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-info"></span>

                        <span class="btn btn-warning"></span>

                        <span class="btn btn-danger"></span>
                    </div>
                </div><!-- /.sidebar-shortcuts -->

                <ul class="nav nav-list">
                    <li class="hover">
                        <a href="{{url('')}}">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="active open hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                UI &amp; Elements
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="active open hover">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    Layouts
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    <li class="active hover">
                                        <a href="top-menu">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Top Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="two-menu-1">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Two Menus 1
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="two-menu-2">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Two Menus 2
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="mobile-menu-1html">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Default Mobile Menu
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="mobile-menu-2">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Mobile Menu 2
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="mobile-menu-3">
                                            <i class="menu-icon fa fa-caret-right"></i>
                                            Mobile Menu 3
                                        </a>

                                        <b class="arrow"></b>
                                    </li>
                                </ul>
                            </li>

                            <li class="hover">
                                <a href="typography">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Typography
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="elements">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Elements
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="buttons">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Buttons &amp; Icons
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="content-slider">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Content Sliders
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="treeview">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Treeview
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="jquery-ui">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    jQuery UI
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="nestable-list">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Nestable Lists
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="#" class="dropdown-toggle">
                                    <i class="menu-icon fa fa-caret-right"></i>

                                    Three Level Menu
                                    <b class="arrow fa fa-angle-down"></b>
                                </a>

                                <b class="arrow"></b>

                                <ul class="submenu">
                                    <li class="hover">
                                        <a href="#">
                                            <i class="menu-icon fa fa-leaf green"></i>
                                            Item #1
                                        </a>

                                        <b class="arrow"></b>
                                    </li>

                                    <li class="hover">
                                        <a href="#" class="dropdown-toggle">
                                            <i class="menu-icon fa fa-pencil orange"></i>

                                            4th level
                                            <b class="arrow fa fa-angle-down"></b>
                                        </a>

                                        <b class="arrow"></b>

                                        <ul class="submenu">
                                            <li class="hover">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-plus purple"></i>
                                                    Add Product
                                                </a>

                                                <b class="arrow"></b>
                                            </li>

                                            <li class="hover">
                                                <a href="#">
                                                    <i class="menu-icon fa fa-eye pink"></i>
                                                    View Products
                                                </a>

                                                <b class="arrow"></b>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Tables </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="hover">
                                <a href="tables">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Simple &amp; Dynamic
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="jqgrid">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    jqGrid plugin
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-pencil-square-o"></i>
                            <span class="menu-text"> Forms </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="hover">
                                <a href="form-elements">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Form Elements
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="form-elements-2">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Form Elements 2
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="form-wizard">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Wizard &amp; Validation
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="wysiwyg">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Wysiwyg &amp; Markdown
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="dropzone">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Dropzone File Upload
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="hover">
                        <a href="widgets">
                            <i class="menu-icon fa fa-list-alt"></i>
                            <span class="menu-text"> Widgets </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="hover">
                        <a href="calendar">
                            <i class="menu-icon fa fa-calendar"></i>

                            <span class="menu-text">
                                Calendar

                                <span class="badge badge-transparent tooltip-error" title="2 Important Events">
                                    <i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
                                </span>
                            </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="hover">
                        <a href="gallery">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text"> Gallery </span>
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-tag"></i>
                            <span class="menu-text"> More Pages </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="hover">
                                <a href="profile">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    User Profile
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="inbox">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Inbox
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="pricing">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Pricing Tables
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="invoice">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Invoice
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="timeline">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Timeline
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="search">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Search Results
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="email">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Email Templates
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="login">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Login &amp; Register
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>

                    <li class="hover">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-file-o"></i>

                            <span class="menu-text">
                                Other Pages

                                <span class="badge badge-primary">5</span>
                            </span>

                            <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                            <li class="hover">
                                <a href="faq">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    FAQ
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="error-404">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Error 404
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="error-500">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Error 500
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="grid">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Grid
                                </a>

                                <b class="arrow"></b>
                            </li>

                            <li class="hover">
                                <a href="blank">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    Blank Page
                                </a>

                                <b class="arrow"></b>
                            </li>
                        </ul>
                    </li>
                </ul><!-- /.nav-list -->
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">                        

                        <div class="page-header">
                            <h1>
                                Top Menu Style
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    top menu &amp; navigation
                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="alert alert-info visible-sm visible-xs">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>
                                    Please note that
                                    <span class="blue bolder">top menu style</span>
                                    is visible only in devices larger than
                                    <span class="blue bolder">991px</span>
                                    which you can change using CSS builder tool.
                                </div>

                                <div class="well well-sm visible-sm visible-xs">
                                    Top menu can become any of the 3 mobile view menu styles:
                                    <em>default</em>
,
                                    <em>collapsible</em>
                                    or
                                    <em>minimized</em>.
                                </div>

                                <div class="hidden-sm hidden-xs">
                                    <button type="button" class="sidebar-collapse btn btn-white btn-primary" data-target="#sidebar">
                                        <i class="ace-icon fa fa-angle-double-up" data-icon1="ace-icon fa fa-angle-double-up" data-icon2="ace-icon fa fa-angle-double-down"></i>
                                        Collapse/Expand Menu
                                    </button>
                                </div>

                                <div class="center">
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">Ace</span>
                            Application &copy; 2013-2014
                        </span>

                        &nbsp; &nbsp;
                        <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        {!! HTML::script('/js/jquery-2.1.4.min.js') !!}

        <!-- <![endif]-->

        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='http://localhost/devbar/public/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        {!! HTML::script('/js/bootstrap.min.js') !!}

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        {!! HTML::script('/js/ace-elements.min.js') !!}
        {!! HTML::script('/js/ace.min.js') !!}

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
             var $sidebar = $('.sidebar').eq(0);
             if( !$sidebar.hasClass('h-sidebar') ) return;
            
             $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
                if( event_name !== 'sidebar_fixed' ) return;
            
                var sidebar = $sidebar.get(0);
                var $window = $(window);
            
                //return if sidebar is not fixed or in mobile view mode
                var sidebar_vars = $sidebar.ace_sidebar('vars');
                if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
                    $sidebar.removeClass('lower-highlight');
                    //restore original, default marginTop
                    sidebar.style.marginTop = '';
            
                    $window.off('scroll.ace.top_menu')
                    return;
                }
            
            
                 var done = false;
                 $window.on('scroll.ace.top_menu', function(e) {
            
                    var scroll = $window.scrollTop();
                    scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
                    if (scroll > 17) scroll = 17;
            
            
                    if (scroll > 16) {          
                        if(!done) {
                            $sidebar.addClass('lower-highlight');
                            done = true;
                        }
                    }
                    else {
                        if(done) {
                            $sidebar.removeClass('lower-highlight');
                            done = false;
                        }
                    }
            
                    sidebar.style['marginTop'] = (17-scroll)+'px';
                 }).triggerHandler('scroll.ace.top_menu');
            
             }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
            
             $(window).on('resize.ace.top_menu', function() {
                $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
             });
            
            
            });
        </script>
    </body>
</html>
