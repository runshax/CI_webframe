<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct() {
        parent::__construct(); 
        $this->load->model('m_user');        
              
        
    }
	
	
	
	public function index()
	{
		$this->load->view('login');
		
		
	}
        
        
        public function loginapps(){
        
        $this->load->library('Form_validation');
        $this->form_validation->set_rules('usrname', 'usrname', 'trim|required');
        $this->form_validation->set_rules('usrpass', 'usrpass', 'trim|required');
      	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
        
                
                $username   = $this->input->post('usrname');
                $password   = $this->input->post('usrpass');
                
        
                
            if ($this->form_validation->run() == FALSE){
                redirect('welcome', 'refresh');
            }
            else{

             
                 $success  = $this->auth->do_login($username,$password);
                    
             
                if($success){
                    redirect('MainHome', 'refresh');
                }
                else{
                    $uri = base_url() . "welcome";
                    echo "<script language=\"javascript\"> 
                    alert('[ ERROR ] USERNAME ATAU PASSWORD SALAH !!'); 
                    window.location.href = '" . $uri . "' ; 
                    </script>";
                    //echo "<script language=\"javascript\"> var base_url = 'http://' + location.hostname;alert('[ ERROR ] USERNAME ATAU PASSWORD SALAH !!');</script>";
                    redirect('welcome', 'refresh');
                }
            }
        }
    
	
        public function logoutapps(){
            if($this->auth->is_logged_in() == true){
               $rrr= $this->session->userdata('user_id');
                $this->auth->do_logout($rrr);
            }
            redirect('welcome', 'refresh');
        }
	
}
