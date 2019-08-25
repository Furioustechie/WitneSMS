

  <section class="content-header">
      <h1>
        <?=$this->lang->line('menu_add_court');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$this->lang->line('menu_add_court');?></li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content col-md-6">
  <?php echo form_open();?>
  <div class="box box-default">
        <div class="box-header with-border bg-info">
          <?php if($this->session->flashdata('courttadd')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('courttadd'); ?></strong></div>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
             <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('dist_name');?> <span style="color:red">*</span></label>
                <select name="dist_id" id="" class="form-control">
                  <?php foreach ($districts as $dist):?>
                  <option value="<?=$dist->dist_id;?>"><?=$dist->dist_name_en.'-'.$dist->dist_name_bn;?></option>
                  <?php endforeach;?>
                </select>
              </div>
             </div>

             <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('court_name_en');?> <span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="court_name_en" required placeholder="<?=$this->lang->line('court_name_en');?>" type="text" value="<?=set_value('court_name_en');?>">
              </div>
             </div>

            <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('court_name_bn');?><span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="court_name_bn" required placeholder="<?=$this->lang->line('court_name_en');?>" type="text" value="<?=set_value('court_name_bn');?>">
              </div>
            </div>

           
            
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" value="Add Court" class="btn btn-success btn-flat">
        </div>
      </div>
    <?php echo form_close();?>
    </section>

