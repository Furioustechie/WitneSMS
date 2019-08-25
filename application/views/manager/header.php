<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WitneSMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap-select.css">
  <!-- Font Awesome --> 
   <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/dataTables.bootstrap.min.css"> 
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap-datepicker.min.css" />
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap-timepicker.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap3-wysihtml5.min.css">
  

  <script src="<?=base_url();?>assets/dashboard/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->




  


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?=site_url('manager/dashboard');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Witne</b>SMS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>assets/dashboard/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?='Admin'//$sess=$this->session->userdata('man')[0]['name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url();?>assets/dashboard/img/user.png" class="img-circle" alt="User Image">

                <p>
                  ydf
                  <small>ydry</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('manager/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>assets/dashboard/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="POST" class="sidebar-form">
        
          <select name="langs" id="langs" onChange="hello();" class="form-control">
            <option value="english" <?=$this->session->userdata('site_lang') == 'english' ? ' selected="selected"' : '';?>>English</option>
            <option value="bangla" <?=$this->session->userdata('site_lang') == 'bangla' ? ' selected="selected"' : '';?>>বাংলা</option>
          </select>

          <script type="text/javascript">
            function hello()
            {
              var langs =document.getElementById("langs").value;
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function()
                  {
                  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                    location.reload(); 
                    }
                  } 
                xmlhttp.open("GET","<?=site_url();?>manager/langswitch/"+langs,true); 
                xmlhttp.send();
            }
        </script>
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li><a href="<?=site_url('manager');?>">
            <i class="fa fa-dashboard"></i> <span><?=$this->lang->line('menu_dashboard');?></span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span><?=$this->lang->line('menu_management');?></span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('manager/add-district');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('menu_add_dist');?></a></li>
            <li><a href="<?=site_url('manager/view-district');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('menu_view_dist');?></a></li>
            <li><a href="<?=site_url('manager/add-court');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('menu_add_court');?></a></li>
            <li><a href="<?=site_url('manager/view-court');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('menu_view_court');?></a></li>
            <li><a href="<?=site_url('manager/add-user');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('add_user');?></a></li>
            <li><a href="<?=site_url('manager/view-user');?>"><i class="fa fa-circle-o"></i> <?=$this->lang->line('view_user');?></a></li>
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">