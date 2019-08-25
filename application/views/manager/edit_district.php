<section class="content-header">
      <h1>
        District
        <small>Update District</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-gears"></i> Home</a></li>
        <li class="active">Update District</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
  <?php echo form_open();?>
  <div class="box box-default">
        <div class="box-header with-border bg-info">
          <?php if($this->session->flashdata('editdist')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('editdist'); ?></strong></div>
          <?php endif; ?>
          <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            
             <div class="col-md-6">
              <div class="form-group">
                <label>District Name in English <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="dist_name_en" required="" id="inputEmail3" value="<?=$data->dist_name_en;?>">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>District Name in Bangla <span style="color:red">*</span></label>
                <input type="text" class="form-control" name="dist_name_bn" required="" id="inputEmail3" value="<?=$data->dist_name_bn;?>">
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" value="Edit District" class="btn btn-success btn-flat">
        </div>
      </div>
    <?php echo form_close();?>
    </section>

