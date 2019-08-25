<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	 public function __construct() 
        {
            parent::__construct();
            if(($this->session->userdata('user')!=NULL) AND ($this->session->userdata('user')->user_status == 0)) {
            	redirect('ChangePass/change-password','refresh');
            }
            elseif(($this->session->userdata('user')!=NULL) AND ($this->session->userdata('user')->user_status == 1)) {
            }
            else{redirect('login/user');} 
            date_default_timezone_set('Asia/Dhaka'); 
          	//$this->session->set_userdata('site_lang', 'bangla');
			//$this->session->unset_userdata('site_lang');
            $this->load->library('SmsApi');
			$this->lang->load('user',$this->session->userdata('site_lang'));

        }


	public function index()
	{
         
        if($this->input->post()){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required|numeric');
            $this->form_validation->set_rules('witness_name', 'Witness Name', 'trim|required');
             $this->form_validation->set_rules('case_no', 'Case No', 'trim|required');
            $this->form_validation->set_rules('start_date', 'Hearing Date', 'trim|required');
            $this->form_validation->set_rules('time', 'Hearing Time', 'trim|required');
            if($this->form_validation->run()){
            	$date = str_replace('/', '-', $this->input->post('start_date'));
				$date = date("Y-m-d", strtotime($date));
				$time = date("H:i", strtotime($this->input->post('time')));
				$datetime = $date.' '.$time;
				// echo $this->input->post('onoffswitch');
    //             exit;
				if($this->input->post('onoffswitch')=='on'){
                    if (!preg_match('/[^A-Za-z0-9]/', $this->input->post('witness_name'))) // '/[^a-z\d]/i' should also work.
                    {
                      $this->session->set_flashdata('err', 'Witness name should be in English');
                      redirect(current_url());
                    }
            		$cname=$this->Mdb->idtocnameen_str($this->session->userdata('user')->court_id);
            		$text=$this->input->post('witness_name').", You are requested to be a witness by ".$cname." (case ".$this->input->post('case_no')."). Report to the witness cell on ".$this->input->post('start_date')." at ".$this->input->post('time');
            	}else{
            		$cname=$this->Mdb->idtocnamebn_str($this->session->userdata('user')->court_id);
            		$text=$this->input->post('witness_name').", আপনাকে মামলার (নং ".$this->en2bn($this->input->post('case_no')).") সাক্ষীর জন্য ".$this->en2bn($this->input->post('start_date'))." তারিখে ".$this->en2bn($this->input->post('time'))." সময়  ".$cname." কোর্টে আসার জন্য অনুরোধ করা হল।";
            	}

                $dbdata=array(
            			'log_hash_id'=>md5(uniqid(rand(), true)),
            			'user_id'=>$this->session->userdata('user')->user_id,
            			'phone_no'=>$this->input->post('phone_no'),
            			'witness_name'=>$this->input->post('witness_name'),
                        'case_no'=>$this->input->post('case_no'),
            			'hearing_time'=>$datetime,
            			'sms'=>$text,
            			'log_status'=>1

            		);

                
                if($this->input->post('schedule_time')!=0){
                   $days_ago = date('Y-m-d', strtotime('-'.$this->input->post('schedule_time').' days', strtotime($datetime)));
                   $dbdata['is_scheduled']=1;
                   $dbdata['schedule_date']=$days_ago;
                   $dbdata['log_status']=0;
                   $dbdata['statuses']='SMS Will be sent in scheduled time';
                   //$dbdata['statuses']=$var['schedule_time']; 
                }else{
                    $this->load->library('SmsApi');
                    $result=$this->smssendApi($this->input->post('phone_no'),$text);
                    $dbdata['statuses']=$result;
                }

                //print_r($smsresult);
            	$this->Mdb->insert('log',$dbdata);
            	$this->session->set_flashdata('send', 'Message Sent Successfully');
            	redirect(current_url());
            }
        }
        $send['logs']=$this->Mdb->getDataDescLimit('log',array('user_id'=>$this->session->userdata('user')->user_id),'created_at',5);
        $send['court']=$this->Mdb->getDataRow('court',array('court_id'=>$this->session->userdata('user')->court_id));
        $this->load->view('user/header',$send);
		$this->load->view('user/send_sms');
		$this->load->view('user/footer'); 
	}

	public function langswitch($id=NULL)
	{
		$this->session->set_userdata('site_lang', $id);
	}

    function en2bn($number)
    {
        $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0"); 
        $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
        $bn_number = str_replace($search_array, $replace_array, $number);

        return $bn_number;
    }

   

	public function logout()
	{
		$this->session->unset_userdata('user');
        $this->session->unset_userdata('site_lang');
		redirect('login/user','refresh');
	}


    public function test()
    {
        $this->load->library('SmsApi');

        echo $this->SmsApi->test();
    }

    

    

    

	
	
	
}
