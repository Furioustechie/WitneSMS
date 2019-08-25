

  <section class="content-header">
      <h1>
        <?=$this->lang->line('menu_add_dist');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$this->lang->line('menu_add_dist');?></li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
  <?php echo form_open();?>
  <div class="box box-default">
        <div class="box-header with-border bg-info">
          <?php if($this->session->flashdata('distadd')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('distadd'); ?></strong></div>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
             <div class="col-md-6">
              <div class="form-group">
                <label><?=$this->lang->line('dist_name_en');?> <span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="dist_name_en" required placeholder="<?=$this->lang->line('dist_name_en');?>" type="text" value="<?=set_value('dist_name_en');?>">
              </div>
             </div>

            <div class="col-md-6">
              <div class="form-group">
                <label><?=$this->lang->line('dist_name_bn');?><span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="dist_name_bn"  placeholder="<?=$this->lang->line('dist_name_bn');?>" type="text" value="<?=set_value('dist_name_bn');?>">
              </div>
            </div>

           
            
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" value="Add District" class="btn btn-success btn-flat">
        </div>
      </div>
    <?php echo form_close();?>
    </section>

