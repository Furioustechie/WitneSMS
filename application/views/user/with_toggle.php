
  <section class="content-header">
      <h1>
        <?=$this->lang->line('sms');?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$this->lang->line('sms');?></li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content col-md-6">
  <?php echo form_open();?>
  <div class="box box-default">
        <div class="box-header with-border bg-info">
          <?php if($this->session->flashdata('send')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('send'); ?></strong></div>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('court_name');?> <span style="color:red">*</label>
                <div class="col-sm-8">
                  <input class="form-control" disabled type="text" value="<?=$court->court_name_en.' '.$court->court_name_bn;?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('phone_no');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon">+88</span>
                  <input class="form-control" id="inputEmail3" name="phone_no" required placeholder="<?=$this->lang->line('phone_no');?>" type="text" value="<?=set_value('phone_no');?>" maxlength='11' minlength='11' onkeypress='validate(event)'>
                </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('wit_name');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <input class="form-control" id="witness_name" name="witness_name" required placeholder="<?=$this->lang->line('wit_name');?>" type="text" value="<?=set_value('witness_name');?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('hearing_date');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
               
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="text" class="form-control pull-right datepicker" name="start_date" id="start_date" required>
                </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('hearing_time');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input type="text" name="time" required id="times" class="form-control timepicker" value="<?=set_value('time');?>">
                </div>
                </div>
              </div>

              <div class="form-group " id="dates">
                <label for="inputEmail3" class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                
                  <p><strong>SMS Message (Auto generated preview)</strong></p>
                  <p>Dear <span id='print_witness_name'></span>, You are requested to be a witness by Court Name, Please remember to show up at court on <span id='print_start_date'></span> at <span id='print_time'></span></p>
               
                
                </div>
              </div>

              <div class="form-group " id="dates1">
                <label for="inputEmail3" class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                
                  
                <p><strong>এসএমএস (সয়ঙ্ক্রিয় মেসেজ)</strong></p>
                  <p>জনাব <span id='print_witness_name'></span>, আপনাকে মামলার সাক্ষীর জন্য <span id='print_start_date'></span> তারিখে <span id='print_time'></span> সময় কোর্টে আসার জন্য অনুরোধ করা হল।</p>
                
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('language_switch');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <div class="input-group">
                      <div class="onoffswitch">
                          <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox always" id="myonoffswitch" >
                          <label class="onoffswitch-label" for="myonoffswitch">
                              <span class="onoffswitch-inner"></span>
                              <span class="onoffswitch-switch"></span>
                          </label>
                      </div>

                </div>
                </div>
              </div>

              


              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                  <p></p>
                  <input type="submit" value="<?=$this->lang->line('send_sms');?>" class="btn btn-success btn-flat">
                </div>
              </div>

              

        </div>
        <!-- /.box-body -->
        
      </div>
    <?php echo form_close();?>




    </section>


    <script>
      var inputBox = document.getElementById('witness_name');
      inputBox.onkeyup = function(){
          document.getElementById('print_witness_name').innerHTML = inputBox.value;
      }

      var inputBox1 = document.getElementById('start_date');
      inputBox1.onchange = function(){
          document.getElementById('print_start_date').innerHTML = inputBox1.value;
      }

      var inputBox2 = document.getElementById('times');
      inputBox2.onchange = function(){
          document.getElementById('print_time').innerHTML = inputBox2.value;
      }




      $(function () {
        $('.always').change(function () {                
           $('#dates').toggle(!this.checked);
        }).change(); //ensure visible state matches initially
      });

      $(function () {
        $('.always').change(function () {                
           $('#dates1').toggle(this.checked);
        }).change(); //ensure visible state matches initially
      });
    </script>

<script>
  
  function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'ajax_more-without-design.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.postList').append(html);
            }
        });
    });
});
</script>