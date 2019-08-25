<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');   
    }
        
	

    public function user()
    {
        $send['msg']="Sign in to start your session";
        if($this->input->post()){
            $this->load->library('bcrypt');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('court_id', 'Court Name', 'trim|required');
            $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if($this->form_validation->run()){
                    // Password does not match stored password.
                
                //$ip = $_SERVER['REMOTE_ADDR']; //getting the IP Address
                $ip=$this->input->post('user_name');
                $t=time(); //Storing time in variable
                $diff = (time()-120); // Here 600 mean 10 minutes 10*60


                $chk=$this->Mdb->getDataRow('user',array('court_id'=>$this->input->post('court_id'),'user_name'=>$this->input->post('user_name')));
                if(empty($chk)){
                    $this->session->set_flashdata('loginerror', 'Check Username and Password');
                    redirect('login/user');
                }else{
                    if ($this->bcrypt->check_password($this->input->post('password'), $chk->password))
                    {
                        $this->session->set_userdata('user',$chk);
                        
                        $count = $this->db->query("SELECT COUNT(*) as tot FROM tbl_loginlimit WHERE ipAddress = '$ip' 
                                  AND timeDiff > $diff")->result();

                        if(($count[0]->tot) > 3)
                        {
                           $this->session->set_flashdata('loginerror', 'Your account is temporary locked. Try again later.');
                           redirect('login/user');
                        }
                        $this->Mdb->delete('tbl_loginlimit',array('ipAddress'=>$ip));
                        redirect('user');
                    }
                        
                    else{
                        
                        $this->Mdb->insert('tbl_loginlimit',array('ipAddress'=>$ip,'timeDiff'=>$t));
                        $count = $this->db->query("SELECT COUNT(*) as tot FROM tbl_loginlimit WHERE ipAddress = '$ip' 
                                  AND timeDiff > $diff")->result();
                        //echo $count;
                        if(($count[0]->tot) > 3)
                        {
                           $this->session->set_flashdata('loginerror', 'Your account is temporary locked. Try again later.');
                           redirect('login/user');
                        }
                        // 
                        $this->session->set_flashdata('loginerror', 'Check Username and Password.');
                        redirect('login/user');
                            
                      // redirect('login/user');
                    }
                }
            }

            
        }
        $send['districts']=$this->Mdb->getData('district',array('dist_status'=>1));
        $this->load->view('login/user_login',$send);
        
    }
    public function getCourt($id=NULL)
    {
        
        $chk=$this->Mdb->getData('court',array('dist_id'=>$id));
        echo "<select class='form-control' name='court_id' data-live-search='true' required >";
        //echo "<select class='form-control selectpicker' name='court_id' required data-live-search='true' >";
        echo "<option value=''>--Select Court--</option>";
        foreach ($chk as $ch) {
            echo "<option value='".$ch->court_id."'>";
            echo $ch->court_name_en;
            echo "</option>";
        }
        echo "</select>";
        
    }
}