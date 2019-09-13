<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth{
    var $CI = NULL;
     private  $dbCS;
   
    function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->database();  
        
        $this->dbCS =& get_instance();
        $this->dbCS->load->database('default','TRUE');  
        
    }
    
    //untuk validasi login
    function do_login($username,$password){
//        echo "disni";
//        exit();
        
        // cek di database, ada ga?
        //$this->CI->load->database('demo', TRUE);
        $sql = "SELECT 
                a.*
        	FROM 
                template_web.t_user a
        	WHERE 
                a.user_id = ? and a.password=?
            ";
        
        //echo $sql;

      
        $result = $this->dbCS->db->query($sql, array($username,$password));
       // echo $result;
       // return $result;
        
        
//        echo $this->dbCS->db->last_query();
//        
//       print_r($result);
     //  echo $result->num_rows();
       // exit();
        
        if($result->num_rows() == 0){
            // jika username dan password tsb tidak ada
            
            //echo"sdsd1";
           // exit();
            
            return false;
        } 
        else {
            // jika ada, maka ambil informasi dari database
            $userdata = $result->row();
            
            
           // return $userdata;
            
           // print_r($userdata);
           // echo "sdsd";
          // exit();
            
            $this->CI->load->model('m_user');
            //$rsEmployee = $this->CI->m_user->getEmployee($userdata->user_id);
            
            
           // echo $userdata->user_group;
            //exit();
            //$sidebar = $this->CI->m_user->completeMenuList($userdata->group_id);
            $sidebar = $this->CI->m_user->getListMenu(0, $userdata->user_group);
            
            
          //  print_r($sidebar);
            
           // exit();
            //if(empty($userdata->vendor_name)) { $userdata->vendor_name = $userdata->user_id; }
            //print_r($sidebars); exit();
            // TO GET ACCESS CRUD FOR CURRENT USER
            //$tempRs = $this->CI->m_user->grpMenuList($userdata->group_id);
            //ini_set("date.timezone","Asia/Jakarta");
            //$this->CI->db->query("INSERT INTO db_log.t_application_log (user_id, application_id, ip_address, host_name, mac_address, login_time, logout_time) VALUES (?, ?, ?, ?, ?, ?, ?);",
            //array($userdata->user_id, "138", $this->CI->input->ip_address(), "123", "123", date("Y-m-d H:i:s"), date("Y-m-d H:i:s") ) );
            
            
            //$theRealTsr=$userdata->user_id;
            
           // echo $theRealTsr;
            
          //  exit();
	    if(!empty($userdata->user_id)){
	    //$userdata->tsr_id
//	    $st=$userdata->employee_id;
//	      $sql2 = "		select
//	    				GROUP_CONCAT(DISTINCT(xx.tsr_id) SEPARATOR ',') as tsr_id
//	    				from tsr_sales.t_tsr_sales_data xx where xx.employee_id=$st
//	    		";
//    
//	    	$result2 = $this->dbCS->db->query($sql2, array($username, $password));
//	    	if($result->num_rows() > 0){
//	    	
//	    	  $userdata2 = $result2->row();
//	    	  $theRealTsr=$userdata2->tsr_id;
//	    	}
//	    
//	    }
                   
                
               // echo"sdsd";
                
               // exit();
            
            $session_data = array(
                'user_id'               => $userdata->user_id,
//              'full_name'             => $userdata->full_name,
                "user_group"             => $userdata->user_group,
//           	'agent_account_number'	=> "",
//            	'vendor_id'             => "",
//            	'station_id'      	=> "",
//              'station_desc'          => "",
//                'employee_id'           => $userdata->employee_id,
//            	'group_id'              => "",
            	'sidebar'               => $sidebar,
//                'access_menus'          => "",
//                'tsr_id'                => $theRealTsr,
//                'sales_id'          	=> $userdata->sales_id,
//                'user_level_id'         => $userdata->user_level_id,
//                'xxx'               => date('H:i:s')
                    
            );
            
         // buat session
            
        // print_r($session_data)
         $this->CI->session->set_userdata($session_data);
         
         
        
         
       
         return true;
        }
    }
    }
   // untuk mengecek apakah user sudah login/belum
    function is_logged_in($arr = array()) {
        if($this->CI->session->userdata('user_id') == ''){
            return false;
        }		      
        return true;
   }
   
   // untuk validasi di setiap halaman yang mengharuskan authentikasi
   function restrict(){
       if($this->is_logged_in() == false){
           redirect('welcome', 'refresh');
       }
   }

   function do_logout($rrr){
       
                            ini_set("date.timezone","Asia/Jakarta");
                            $x=date('Y-m-d');
                            $user=$rrr;
                            $array = array(
                                "logout_time" => date('H:i:s')
                            );
                                   
                            
                           // exit();
                          // $this->dbCS->db->where("user_id='$user' and date='$x'");
                           //$rsx2 = $this->dbCS->db->update('tsr_sales.t_tsr_working_hour', $array);
                           
                            $this->CI->session->sess_destroy();
   }
   
}
