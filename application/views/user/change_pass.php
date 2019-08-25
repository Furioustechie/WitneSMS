

  <section class="content-header">
      <h1>
        <?=$this->lang->line('change_password');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$this->lang->line('change_password');?></li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content col-md-6">
  <?php echo form_open();?>
  <div class="box box-default">
        <div class="box-header with-border bg-info">
          <?php if($this->session->flashdata('chpass')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('chpass'); ?></strong></div>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
             
            <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('court_name');?> <span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" disabled value="<?=$court->court_name_en.' - '.$court->court_name_bn;?>" type="text" >
              </div>
             </div>

             <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('user_name');?> <span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="court_name_en" disabled value="<?=$this->session->userdata('user')->user_name;?>" type="text" value="<?=set_value('court_name_en');?>">
              </div>
             </div>

            <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('password');?><span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="password" required placeholder="<?=$this->lang->line('password');?>" type="password">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('confirm_password');?><span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="cpassword" required placeholder="<?=$this->lang->line('confirm_password');?>" type="password">
              </div>
            </div>

           
            
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" value="<?=$this->lang->line('submit');?>" class="btn btn-success btn-flat">
        </div>
      </div>
    <?php echo form_close();?>
    </section>

