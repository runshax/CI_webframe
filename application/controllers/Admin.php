<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
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

        if ($this->auth->is_logged_in(array(1, 2, 3)) != TRUE) {
            redirect('welcome', 'refresh');
        }
    }

    public function index() {


        //$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo current_url();
        //print_r($this->uri->segment(1));
        // exit();

        $data['act'] = "";
        $data['PageName'] = "Admin";

        //$this->template->load('template','main/home',$data);
        $this->template->load('template', 'administrator/userAccess', $data);
    }

    public function user_access() {
        // redirect('welcome', 'refresh');

        $data['act'] = "";
        $data['PageName'] = "Admin";

        // $this->template->load('template','calls/v_acq_ver3',$data);
        $this->template->load('template', 'administrator/userAccess', $data);
    }

    public function user_group() {
        $data['act'] = "";
        $data['PageName'] = "Admin2";
        // echo"sdsdsds";
        //exit();

        $this->template->load('template', 'administrator/userGroup', $data);
    }

    public function getJsonUserAccess() {
        $json = $this->m_user->getJsonUserAccess();
        echo $json;
    }

}
