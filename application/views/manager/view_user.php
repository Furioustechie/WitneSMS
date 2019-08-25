<section class="content-header">
  <h1>
    <?=$this->lang->line('user_name');?>
    <small><?=$this->lang->line('user_name');?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-gears"></i> Home</a></li>
    <li class="active"><?=$this->lang->line('user_name');?></li>
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
              <?php if($this->session->flashdata('chngpass')): ?>
                <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('chngpass'); ?></strong></div>
              <?php endif; ?>
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr>
                          <th><?=$this->lang->line('serial');?></th>
                          <th><?=$this->lang->line('user_name');?></th>
                          <th><?=$this->lang->line('dist_name');?></th>
                          <th><?=$this->lang->line('court_name');?></th>
                          <th><?=$this->lang->line('status');?></th>
                          <th><?=$this->lang->line('reset_passs');?></th>
                        </tr>
                      </thead>
                        <?php $i=1; foreach($users as $usr){?>
                        <tr>
                          <td><?=$i++;?></td>
                          <td><?=$usr->user_name ;?></td>
                          <td><?=$usr->dist_name_en.' '.$usr->dist_name_bn ;?></td>
                          <td><?=$usr->court_name_en.' '.$usr->court_name_bn ;?></td>
                          <td><?php if($usr->user_status == 1){echo "Active";}else{echo "Inactive. Initial Pass is <strong>".$usr->auth."</strong>";}?></td>
                          <td>
                            <a href="<?=site_url('manager/reset_pass/'.$usr->user_hash_id);?>" onclick="return confirm('Are you sure?');">Reset Password</a>
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
