<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	 public function __construct() 
        {
            parent::__construct();
            date_default_timezone_set('Asia/Dhaka'); 
			//$this->session->unset_userdata('site_lang');
			$this->lang->load('manager',$this->session->userdata('site_lang'));
        }

	public function index()
	{
        $send['title']='Privacy Policy';
        $this->load->view('manager/header');
		//$this->load->view('manager/add_class');
		$this->load->view('manager/footer'); 
	}

	public function add_district()
	{
		if($this->input->post()){
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('dist_name_en', 'District Name in Bangla', 'trim|required|is_unique[district.dist_name_en]');
        	$this->form_validation->set_rules('dist_name_bn', 'District Name in English', 'trim|required|is_unique[district.dist_name_bn]');
        	if($this->form_validation->run()){
        		$var = $this->input->post();
        		$var['dist_hash_id'] = md5(uniqid(rand(), true));
        		$var['dist_status']=1;
        		$this->Mdb->insert('district',$var);
        		$this->session->set_flashdata('distadd', 'District Added Successfully');
        		redirect(current_url());
        	}
        }
		$this->load->view('manager/header');
		$this->load->view('manager/add_district');
		$this->load->view('manager/footer'); 
	}

	public function view_district()
	{
		$send['districts']=$this->Mdb->getData('district');
		$this->load->view('manager/header');
		$this->load->view('manager/view_district',$send);
		$this->load->view('manager/footer');
	}

	public function edit_district($id)
	{
		if($this->input->post()){
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('dist_name_en', 'District Name in English', 'trim|required');
        	$this->form_validation->set_rules('dist_name_bn', 'District Name in Bangla', 'trim|required');
        	if($this->form_validation->run()){
        		$var = $this->input->post();
        		$this->Mdb->update('district',$var,array('dist_hash_id'=>$id));
        		$this->session->set_flashdata('editdist', 'District Name Updated Successfully');
        		redirect(current_url());
        	}
        }
		$send['data']=$this->Mdb->getDataRow('district',array('dist_hash_id'=>$id));
		$this->load->view('manager/header');
		$this->load->view('manager/edit_district',$send);
		$this->load->view('manager/footer');
	}

	public function add_court()
	{
		if($this->input->post()){
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('dist_id', 'District Name', 'trim|required');
        	$this->form_validation->set_rules('court_name_en', 'Court Name in Bangla', 'trim|required|is_unique[court.court_name_en]');
        	$this->form_validation->set_rules('court_name_bn', 'Court Name in English', 'trim|required|is_unique[court.court_name_bn]');
        	if($this->form_validation->run()){
        		$var = $this->input->post();
        		$var['court_hash_id'] = md5(uniqid(rand(), true));
        		$var['court_status']=1;
        		$this->Mdb->insert('court',$var);
        		$this->session->set_flashdata('courttadd', 'Court Added Successfully');
        		redirect(current_url());
        	}
        }
        $send['districts']=$this->Mdb->getData('district',array('dist_status'=>1));
		$this->load->view('manager/header');
		$this->load->view('manager/add_court',$send);
		$this->load->view('manager/footer'); 
	}

	        

	public function view_court()
	{
		$send['courts']=$this->Mdb->getJoin('court','district','court.dist_id=district.dist_id');
		$this->load->view('manager/header');
		$this->load->view('manager/view_court',$send);
		$this->load->view('manager/footer');
	}

	public function edit_court($id)
	{
		if($this->input->post()){
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('dist_id', 'District Name', 'trim|required');
        	$this->form_validation->set_rules('court_name_en', 'Court Name in English', 'trim|required');
        	$this->form_validation->set_rules('court_name_bn', 'Court Name in Bangla', 'trim|required');
        	if($this->form_validation->run()){
        		$var = $this->input->post();
        		$this->Mdb->update('court',$var,array('court_hash_id'=>$id));
        		$this->session->set_flashdata('editcourt', 'Court Name Updated Successfully');
        		redirect(current_url());
        	}
        }
        $send['districts']=$this->Mdb->getData('district',array('dist_status'=>1));
		$send['data']=$this->Mdb->getJoin('court','district','court.dist_id=district.dist_id',array('court_hash_id'=>$id));
		$this->load->view('manager/header');
		$this->load->view('manager/edit_court',$send);
		$this->load->view('manager/footer');
	}

	public function langswitch($id=NULL)
	{
		$this->session->set_userdata('site_lang', $id);
	}



	public function add_user()
	{
		
        if($this->input->post()){
			$this->load->library('bcrypt');
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('court_id', 'Court Name', 'trim|required');
        	//$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
            $this->form_validation->set_rules('user_name', 'User Name', 'required|callback_check_user|trim');
        	if($this->form_validation->run()){
        		$var = $this->input->post();
                unset($var['dist_id']);
        		$var['user_hash_id'] = md5(uniqid(rand(), true));
        		$var['user_status']=0;
                $var['auth']=rand(100000,999999);
        		$var['password']=$this->bcrypt->hash_password($var['auth']);
        		$this->Mdb->insert('user',$var);
        		$this->session->set_flashdata('useradd', 'User Successfully Added');
                $this->session->set_flashdata('initpass', 'Initial Password is '.$var['auth']);
        		redirect(current_url());
        	}
        }
        $send['districts']=$this->Mdb->getData('district',array('dist_status'=>1));
		$this->load->view('manager/header');
		$this->load->view('manager/add_user',$send);
		$this->load->view('manager/footer'); 
	}

    function check_user() {
        $user_name = $this->input->post('user_name');// get fiest name
        $court_id = $this->input->post('court_id');
        //$chk=$this->Mdb->getData('user',array('user_name'=>$this->input->post('user_name'),'court_id'=>$this->input->post('court_')));
        $this->db->select('user_id');
        $this->db->from('user');
        $this->db->where('user_name', $user_name);
        $this->db->where('court_id', $court_id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if ($num > 0) {
            $this->form_validation->set_message('check_user','already existed!
                      Please check username.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function view_user()
    {
        $send['users']=$this->Mdb->getUser();
        $this->load->view('manager/header');
        $this->load->view('manager/view_user',$send);
        $this->load->view('manager/footer');
    }

    public function reset_pass($id)
    {
        $this->load->library('bcrypt');
        $pass=$this->bcrypt->hash_password('Test@123');
        $this->Mdb->update('user',array('password'=>$pass,'user_status'=>0),array('user_hash_id'=>$id));
        $this->session->set_flashdata('chngpass', 'Password Changed Successfully');
        redirect('manager/view_user','refresh');
    }



	
	
}
