<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	
	public function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');   
    }
        
	public function cronupdate()
    {
        $abc = $this->db->query("SELECT * FROM log WHERE hearing_time <= (NOW() - INTERVAL 25 DAY)")->result();
        foreach ($abc as $a) {
            $this->Mdb->update('log',array('phone_no'=>'','witness_name'=>'','sms'=>'','statuses'=>''),array('log_id'=>$a->log_id));
        }
    }

   public function scheduledSMS()
   {
        $this->load->library('smsapi');
        $date = date("Y-m-d");
        $chk=$this->db->query("SELECT * FROM log WHERE DATE(schedule_date) = '".$date."' AND is_scheduled = 1 AND log_status = 0")->result();
        foreach ($chk as $c) {
           $send=$this->smsapi->smssendApi($c->phone_no,$c->sms);
           $this->Mdb->update('log',array('is_scheduled'=>0,'log_status'=>1,'schedule_date'=>NULL,'statuses'=>$send),array('log_hash_id'=>$c->log_hash_id)); 
        }
   }

   
}


//   UPDATE log SET phone_no='',sms='' WHERE hearing_time <= (NOW() - INTERVAL 25 DAY);