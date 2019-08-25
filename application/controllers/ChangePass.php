<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePass extends CI_Controller {

	 public function __construct() 
        {
            parent::__construct();
            date_default_timezone_set('Asia/Dhaka'); 
			//$this->session->unset_userdata('site_lang');
			$this->lang->load('user',$this->session->userdata('site_lang'));
        }

	public function change_password()
	{
        if($this->input->post()){
            $this->load->library('bcrypt');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|callback_is_password_strong');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

            if($this->form_validation->run()){
                $var = $this->input->post();
                $pass=$this->bcrypt->hash_password($this->input->post('password'));
                $this->Mdb->update('user',array('password'=>$pass,'user_status'=>1,'auth'=>''),array('user_id'=>$this->session->userdata('user')->user_id));
                $this->session->set_flashdata('chpass', 'Password Changed Successfully!');
                $users=$this->Mdb->getDataRow('user',array('user_id'=>$this->session->userdata('user')->user_id));
                $this->session->set_userdata('user',$users);
            }
        }
        $send['court']=$this->Mdb->getDataRow('court',array('court_id'=>$this->session->userdata('user')->court_id));
        $this->load->view('user/header');
		$this->load->view('user/change_pass',$send);
		$this->load->view('user/footer'); 
	}

    public function is_password_strong($password)
    {
       if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
         return TRUE;
       }
       $this->form_validation->set_message('is_password_strong', 'The {field} field should be Complex');
       return FALSE;
    }

	
	
}
