<?php
class Mdb extends CI_Model 
{
    public function __construct(){
        parent::__construct();$this->load->database();
    }
    
    public function getData($tbl,$whr=array()){
        $sql = $this->db->get_where($tbl,$whr);
        $result=$sql->result();
        $sql->free_result();
        return $result;
    }

    public function getDataa($tbl,$whr=array()){
        $sql = $this->db->get_where($tbl,$whr);
        $result=$sql->result_array();
        $sql->free_result();
        return $result;
    }

    public function getDataRow($tbl,$whr=array()){
        $sql = $this->db->get_where($tbl,$whr);
        $result=$sql->row();
        $sql->free_result();
        return $result;
    }

    public function getDataArr($tbl,$whr=array()){
        return $this->db->get_where($tbl,$whr)->result_array();
    }



    public function insert($tbl,$data=array()){
        return $this->db->insert($tbl,$data);        
    }   
    public function delete($tbl,$con=array()){
        return $this->db->delete($tbl,$con);    
    }
    public function update($tbl,$set,$con){
        return $this->db->update($tbl,$set,$con);
    }
    
    
    public function getDataDesc($tbl,$whr=array(),$id){
        $this->db->order_by($id, "desc"); 
        return $this->db->get_where($tbl,$whr)->result();
    }
    public function getDataAsc($tbl,$whr=array(),$id){
        $this->db->order_by($id, "asc"); 
        return $this->db->get_where($tbl,$whr)->result();
    }
	
	 public function getDataOrderBy($tbl,$whr=array(),$id){
        $this->db->order_by($id, "asc"); 
        return $this->db->get_where($tbl,$whr)->result_array();
    }
    
    public function getDataDescLimit($tbl,$whr=array(),$id,$limit){
        $this->db->order_by($id, "desc"); 
        $this->db->limit($limit,0);
        return $this->db->get_where($tbl,$whr)->result();
    }

    public function getDataAscLimit($tbl,$whr=array(),$id,$limit){
        $this->db->order_by($id, "asc"); 
        $this->db->limit($limit,0);
        return $this->db->get_where($tbl,$whr)->result_array();
    }
    
    public function row_count($table,$data=array()) 
    	{
            $this->db->where($data);
            $this->db->from($table);
            $count = $this->db->count_all_results();
    	    return $count;
    	}

    public function idtoname($id=NULL){
        return $this->db->query("SELECT * from admin_user WHERE id='".$id."'")->result_array();
    }

    public function idtocnameen_str($id=NULL){
        $a= $this->db->query("SELECT * from court WHERE court_id='".$id."'")->result_array();
        return $a[0]['court_name_en'];
    }
     public function idtocnamebn_str($id=NULL){
        $a= $this->db->query("SELECT * from court WHERE court_id='".$id."'")->result_array();
        return $a[0]['court_name_bn'];
    }

    

    public function getUser()
    {
        
        $this->db->select('user.user_name,user.user_hash_id,user.user_status,user.auth,court.court_name_bn,court_name_en,district.dist_name_en,district.dist_name_bn');
        $this->db->from('user');
        $this->db->join('court','user.court_id = court.court_id');
        $this->db->join('district','court.dist_id = district.dist_id');
        //$this->db->where('students.std_id', $id);
        //$this->db->group_by('assign_teacher.class_id');
        //$this->db->order_by('assign_teacher.section_id','ASC');
        return $this->db->get()->result();
    }

	public function getJoin($tbl,$jtbl,$match,$whr=array())
    {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->join($jtbl,$match);
        $this->db->where($whr);
        return $this->db->get()->result();
    }


    function pluralize( $count, $text )
        {
            return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
        }
    
    function get_timeago( $ptime )
        {
            $estimate_time = time() - $ptime;

            if( $estimate_time < 1 )
            {
                return 'less than 1 second ago';
            }

            $condition = array(
                        12 * 30 * 24 * 60 * 60  =>  'year',
                        30 * 24 * 60 * 60       =>  'month',
                        24 * 60 * 60            =>  'day',
                        60 * 60                 =>  'hour',
                        60                      =>  'minute',
                        1                       =>  'second'
            );

            foreach( $condition as $secs => $str )
            {
                $d = $estimate_time / $secs;

                if( $d >= 1 )
                {
                    $r = round( $d );
                    return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
                }
            }
        }


        public function getDays($month,$year)
        {
            $list=array();
            
            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, $month, $d, $year);          
                if (date('m', $time)==$month)       
                    $list[]=date('D', $time);
            }
            return $list;

        }

       
        public function getCountry($country_id)
        {
            $t=$this->getData('apps_countries',array('country_id'=>$country_id));
            return $t[0]->country_name;
        }

        

        function fetch_data($limit, $start)
         {

          $this->db->select("*");
          $this->db->from("log");
          $this->db->order_by("log_id", "DESC");
          $this->db->limit($limit, $start);
          $query = $this->db->get();
          return $query;
         }


    

}
