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


  <section class="content-header">
      <h1>
        <?=$this->lang->line('add_user');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$this->lang->line('add_user');?></li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content col-md-6">
  <?php echo form_open();?>
  <div class="box box-default">
        <div class="box-header with-border bg-info">
            <?php if($this->session->flashdata('useradd')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('useradd'); ?></strong></div>
            <?php endif; ?>
            <?php if($this->session->flashdata('initpass')): ?>
              <div class="alert alert-success"><a class="close">x</a><strong><?php echo $this->session->flashdata('initpass'); ?></strong></div>
            <?php endif; ?>
            
            <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
             <div class="col-md-12">

              <div class="form-group">
                <label><?=$this->lang->line('dist_name');?> <span style="color:red">*</span></label>
                <select name="dist_id" class="form-control selectpicker" required data-live-search="true" onChange="test();" id="dist_id">
                  <option value="">--District Name--</option>
                  <?php foreach ($districts as $dist):?>
                  <option value="<?=$dist->dist_id;?>"><?=$dist->dist_name_en.' - '.$dist->dist_name_bn;?></option>
                  <?php endforeach;?>
                </select>
              </div>
             </div>



             <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('court_name');?> <span style="color:red">*</span></label>
                <div id="show"></div>
              </div>
             </div>

             <div class="col-md-12">
              <div class="form-group">
                <label><?=$this->lang->line('user_name');?> <span style="color:red">*</span></label>
                <input class="form-control" id="inputEmail3" name="user_name" required placeholder="<?=$this->lang->line('user_name');?>" type="text" value="<?=set_value('user_name');?>">
              </div>
             </div>

            
            
            
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input type="submit" value="<?=$this->lang->line('add_user');?>" class="btn btn-success btn-flat">
        </div>
      </div>
    <?php echo form_close();?>
    </section>

