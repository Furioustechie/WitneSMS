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
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/toggle.css">
  

  <script src="<?=base_url();?>assets/dashboard/js/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/dashboard/chart.js/Chart.js"></script>
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
    <a href="<?=site_url('user/dashboard');?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>S</span>
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
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url();?>assets/dashboard/img/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('user')->user_name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?=site_url('user/logout');?>" class="btn btn-success btn-flat">Sign out</a>
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
                xmlhttp.open("GET","<?=site_url();?>user/langswitch/"+langs,true); 
                xmlhttp.send();
            }
        </script>
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li><a href="<?=site_url('user');?>">
            <i class="fa fa-envelope"></i> <span><?=$this->lang->line('send_sms');?></span>
          </a>
        </li>
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">