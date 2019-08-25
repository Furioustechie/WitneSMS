<script type="text/javascript">
    function test()
    {
      var dist_id =document.getElementById("dist_id").value;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
            document.getElementById("show").innerHTML=xmlhttp.responseText;
            }
          } 
        xmlhttp.open("GET","<?=site_url();?>login/getCourt/"+dist_id,true); 
        xmlhttp.send();
    }
</script>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WitneSMS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/bootstrap-select.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dashboard/css/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Witne</b>SMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    
            <?php if($this->session->flashdata('loginerror')): ?>
              <p class="text-danger text-center"><strong><?php echo $this->session->flashdata('loginerror'); ?></strong></p>
            <?php endif; ?>
            <?php echo validation_errors('<p class="text-danger text-center"><strong>', '</strong></p>');?>
    

    <?php echo form_open('login/user');?>
      <div class="form-group has-feedback">
        <select name="dist_id" class="form-control selectpicker" required data-live-search="true" onChange="test();" id="dist_id">
          <option value="">--District Name--</option>
          <?php foreach ($districts as $dist):?>
          <option value="<?=$dist->dist_id;?>"><?=$dist->dist_name_en.' - '.$dist->dist_name_bn;?></option>
          <?php endforeach;?>
        </select>
      </div>

      <div class="form-group has-feedback">
        <div id="show"></div>
      </div>
       <div class="form-group has-feedback">
        <input type="text" name="user_name" class="form-control" placeholder="User Name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close();?>

   
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url();?>assets/dashboard/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url();?>assets/dashboard/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/dashboard/js/bootstrap-select.js"></script>
<!-- iCheck -->

</body>
</html>
