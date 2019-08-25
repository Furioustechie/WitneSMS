

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
  <section class="content">
   <div class="row">
    <div class="col-md-6">
    <div class="box box-primary">

            <?php if($this->session->flashdata('send')): ?>
              <div class="alert alert-success"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('send'); ?></strong></div>
            <?php endif; ?>
            <?php if($this->session->flashdata('err')): ?>
              <div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong><?php echo $this->session->flashdata('err'); ?></strong></div>
            <?php endif; ?>
            <?php echo validation_errors('<div class="alert alert-danger"><a class="close" data-dismiss="alert">x</a><strong>', '</strong></div>');?>
        <!-- /.box-header -->
        <br>
        <div class="box-body">
           <?php echo form_open();?>
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
                <input class="form-control witness_name" id="witness_name" name="witness_name" required placeholder="<?=$this->lang->line('wit_name');?>" type="text" value="<?=set_value('witness_name');?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('case_no');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <input class="form-control case_no" id="case_no" name="case_no" required placeholder="<?=$this->lang->line('case_no');?>" type="text" value="<?=set_value('case_no');?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('hearing_date');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
               
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="text" class="form-control pull-right datepicker start_date" name="start_date" id="start_date" required>
                </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('hearing_time');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                  <input type="text" name="time" required id="times" class="form-control timepicker times" value="<?=set_value('time');?>">
                </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('sending_time');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <select name="schedule_time" id="" class="form-control">
                    <option value="0">Send Now</option>
                    <option value="3">3 Days before of Hearing Date</option>
                    <option value="10">10 Days before of Hearing Date</option>
                  </select>
                </div>
                </div>
              </div>

              

              <div class="form-group" id="AddPassport" style="display: none">
                <label for="inputEmail3" class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                <p><strong>এসএমএস (স্বয়ঙ্ক্রিয় মেসেজ)</strong></p>
                  <p><span class='test'></span>, আপনাকে মামলার (নং <span class='test3bn'></span>) সাক্ষীর জন্য <span class='test1bn'></span> তারিখে <span class='test2bn'></span> সময় <?=$court->court_name_bn;?> কোর্টে আসার জন্য অনুরোধ করা হল।</p>
                  
                </div>
              </div>

              <div class="form-group" id="dvPassport">
                <label for="inputEmail3" class="col-sm-4 control-label"></label>
                <div class="col-sm-8">
                 
                <p><strong>SMS Message (Auto generated preview)</strong></p>
                  <p><span class='test'></span>, You are requested to be a witness by <?=$court->court_name_en;?> (case <span class='test3'></span>). Report to the witness cell on <span class='test1'></span> at <span class='test2'></span></p>
                </div>
              </div>

              

              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 control-label"><?=$this->lang->line('language_switch');?> <span style="color:red">*</span></label>
                <div class="col-sm-8">
                <div class="input-group">
                      <div class="onoffswitch">
                          <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox chkPassport" id="myonoffswitch" <?php if($this->session->userdata('site_lang')=='bangla'){echo "";}else{echo "checked";}?>>
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

          <?php echo form_close();?>

          

        </div>
        <!-- /.box-body -->

          
    </div>
      
     
</div>
<div class="col-md-6"></div>
</div>

<?php if($logs){?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-success">
      <table class="table table-striped">
      <tr class="success"><th colspan="3"><?=$this->lang->line('history');?></th></tr>
      <tr>
        <th><?=$this->lang->line('phone_no');?></th>
        <th><?=$this->lang->line('sms');?></th>
        <th><?=$this->lang->line('send_time');?></th>
      </tr>
      <?php foreach ($logs as $l) {?>
      <tr>
        <td><?=$l->phone_no; ?></td>
        <td><?=$l->sms; ?></td>
        <td><?=$l->created_at; ?></td>
      </tr>
      <?php } ?>
      </table>
    </div>
  </div>
</div>
<?php } ?>





</section>

<script>
  
  $(function () {
        $(".chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                $("#AddPassport").hide();
            } else {
                $("#dvPassport").hide();
                $("#AddPassport").show();
            }
        });
    });
</script>



<script>
var onoff = $('.chkPassport').val();
var x=$(".chkPassport").is(":checked");
var finalEnlishToBanglaNumber={'0':'০','1':'১','2':'২','3':'৩','4':'৪','5':'৫','6':'৬','7':'৭','8':'৮','9':'৯'};
 
String.prototype.getDigitBanglaFromEnglish = function() {
    var retStr = this;
    for (var x in finalEnlishToBanglaNumber) {
         retStr = retStr.replace(new RegExp(x, 'g'), finalEnlishToBanglaNumber[x]);
    }
    return retStr;
};
 
var english_number="123456";
 
var bangla_converted_number=english_number.getDigitBanglaFromEnglish();

$( ".witness_name" )
  .keyup(function() {
    var value = $( this ).val();
    $( ".test" ).text( value );

    //var st = $('.witness_name').val();
    var xx=$(".chkPassport").is(":checked");
    //alert(xx);
    
    if((/^[a-zA-Z0-9- ]*$/.test(value) == false) && xx == true) {
      alert('Witness name should be in english.');
     }
     //else if((/^[a-zA-Z0-9- ]*$/.test(value) == true) && xx == false) {
     //   alert('Witness name should be in Bangla.');
     // }



  })
  .keyup();

  $( ".start_date" )
  .mouseout(function() {
    var value = $( this ).val();
    var bndate=value.getDigitBanglaFromEnglish();
    $( ".test1" ).text( value );
    $( ".test1bn" ).text( bndate );
  })
  .mouseout();

  $( ".case_no" )
  .keyup(function() {
    var value = $( this ).val();
    var bncase=value.getDigitBanglaFromEnglish();
    $( ".test3" ).text( value );
    $( ".test3bn" ).text( bncase );
  })
  .keyup();

  $( ".times" )
  .mouseout(function() {
    var value = $( this ).val();
    var bntime=value.getDigitBanglaFromEnglish();
    $( ".test2" ).text( value );
    $( ".test2bn" ).text( bntime );
    
  })
  .mouseout();




 
 
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





 


