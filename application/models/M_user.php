<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    private $dbConn;
    private $isLive;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->isLive = false;
        if ($this->isLive) {
            $this->dbConn = $this->load->database('default', TRUE); // LIVE
        } else {
            $this->dbConn = $this->load->database('default', TRUE); // DEMO
        }
        $this->dbConn = $this->load->database('default', TRUE); // DEMO
        ini_set("date.timezone", "Asia/Jakarta");
    }

    public function getListMenu($parent_id = 0, $user_group) {
        $user_group = $user_group;
        //(select ss.user_level_id from tsr_sales.t_tsr_user_group_menu ss where ss.menu_id=a.menu_id and (ss.user_level_id=c.user_level_id) limit 1) as checkValHala

        $sql = "select a.*,b.menu_name,b.menu_link,b.parent_menu
                  from template_web.t_user_access a 
                  left join template_web.t_menu b on b.menu_id=a.menu_id
                  where a.user_group=? 
                  and b.parent_menu=? ";


        // echo $sql;
        //$query  = $this->dbRPI->query($sql, array($user_id, $parent_id)); 
        $query = $this->dbConn->query($sql, array($user_group, $parent_id));

        //echo $this->dbConn->last_query();
        // print_r($query->num_rows());
        //  exit();

        $r_menu = array();

        if ($query->num_rows() > 0) {
            $arr = array();
            foreach ($query->result() as $row) {
                //echo $row->menu_name;
                // print_r($row->menu_name);
                //   exit();

                if ($row->menu_name) {
                    $arr["menu_id"] = $row->menu_id;
                    $arr["menu_name"] = $row->menu_name;
                    //$arr["description"]  =  $row->description;
                    $arr["url"] = $row->menu_link == "" ? "#" : $row->menu_link;
                    $arr["top_id"] = $row->parent_menu;
                    $arr["sub"] = $this->getListMenu($row->menu_id, $user_group);
                    $r_menu[] = $arr;
                }
            }
        }
        return $r_menu;
    }

  
    public function getJsonUserAccess() {
       
        $aColumns = array(
              'a.user_id'
            , 'a.name'
            , 'a.user_group'
            , 'a.id_no');

        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $iSortingCols = $this->input->get_post('iSortingCols', true);
        $sSearch = $this->input->get_post('sSearch', true);
        $sEcho = $this->input->get_post('sEcho', true);

        // Paging
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $this->dbConn->limit($this->dbConn->escape_str($iDisplayLength), $this->dbConn->escape_str($iDisplayStart));
        }

        // Ordering
        if (isset($iSortCol_0)) {
            for ($i = 0; $i < intval($iSortingCols); $i++) {
                $iSortCol = $this->input->get_post('iSortCol_' . $i, true);
                $bSortable = $this->input->get_post('bSortable_' . intval($iSortCol), true);
                $sSortDir = $this->input->get_post('sSortDir_' . $i, true);

                if ($bSortable == 'true') {
                    $this->dbConn->order_by($aColumns[intval($this->dbConn->escape_str($iSortCol))], $this->dbConn->escape_str($sSortDir));
                }
            }
        }

        if (isset($sSearch) && !empty($sSearch)) {
            $this->dbConn->group_start();
            for ($i = 0; $i < count($aColumns); $i++) {
                $bSearchable = $this->input->get_post('bSearchable_' . $i, true);
                // Individual column filtering
                if (isset($bSearchable) && $bSearchable == 'true') {
                    $this->dbConn->or_like($aColumns[$i], $this->dbConn->escape_like_str($sSearch));
                }
            }
            $this->dbConn->group_end();
        }
//SELECT a.user_id,a.name,a.user_group,a.id_no
//FROM template_web.t_user a
//ORDER BY a.user_id asc
//LIMIT 10
        // Select Data
        $this->dbConn->select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
        $this->dbConn->from('template_web.t_user a');
        $rResult = $this->dbConn->get();
        //echo $this->dbConn->last_query();
      // exit();
        // Data set length after filtering
        $this->dbConn->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->dbConn->get()->row()->found_rows;
        $iTotal = $this->dbConn->count_all();     // Total data set length
        // Output
        $output = array('sEcho' => intval($sEcho), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iFilteredTotal, 'aaData' => array());
        $no = $iDisplayStart + 1;
        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            foreach ($aRow as $key => $col) {
                if ($key == "id_no") {
                    $col = "<a href='#' onClick=\"editRow('" . $aRow["id_no"] . "');\" class=\"btn btn-warning btn-xs\">Edit</a> &nbsp; &nbsp; <a href='#' onClick=\"delRow('" . $aRow["id_no"] . "');\" class=\"btn btn-danger btn-xs\">Delete</a>";
                }
                $row[] = $col;
            }
            $output['aaData'][] = $row;
        }
        return json_encode($output);
    }

    
    
}
