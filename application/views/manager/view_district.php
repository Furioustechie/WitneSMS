<section class="content-header">
  <h1>
    <?=$this->lang->line('dist_name');?>
    <small><?=$this->lang->line('dist_name');?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-gears"></i> Home</a></li>
    <li class="active"><?=$this->lang->line('dist_name');?></li>
  </ol>
</section>

    <!-- Main content -->
    <section class="content">
      <!-- COLOR PALETTE -->
      <div class="box box-info color-palette-box">
        <div class="box-header with-border">
          
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-sm-4 col-md-12">
              <?php if($this->session->flashdata('deldist')): ?>
                <div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('deldist'); ?></strong></div>
              <?php endif; ?>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr>
                          <th><?=$this->lang->line('serial');?></th>
                          <th><?=$this->lang->line('dist_name_en');?></th>
                          <th><?=$this->lang->line('dist_name_bn');?></th>
                          <th><?=$this->lang->line('status');?></th>
                          <th><?=$this->lang->line('action');?></th>
                        </tr>
                      </thead>
                        <?php $i=1; foreach($districts as $dist){?>
                        <tr>
                          <td><?=$i++;?></td>
                          <td><?=$dist->dist_name_en ;?></td>
                          <td><?=$dist->dist_name_bn ;?></td>
                          <td><span class="label label-success"><?=$dist->dist_status == 1 ? 'Active' : 'Inactive';?></span></td>
                          <td>
                            <a href="<?=site_url('manager/edit-district/'.$dist->dist_hash_id);?>" class="btn-sm btn-flat btn-primary">Edit</a>
                            <a href="<?=site_url('manager/delete_district/'.$dist->dist_hash_id);?>" class="btn-sm btn-flat btn-danger" onclick="return confirm('Are you sure you want to delete?');"><i class="fa fa-trash"></i> Delete</a>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
          
            </div>
                
          </div>
         

        </div>
           
            
      </div>
       
        
    </section> 
