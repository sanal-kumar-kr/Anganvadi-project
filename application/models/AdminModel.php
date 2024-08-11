<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model {
    function __construct() 
	{
    	parent::__construct();
		$db = $this->db;
	}
    public function welcome(){
        $this->db->select('uid,email,contact, aganvadi_number, teacher_name');
        $this->db->from('user');
        $this->db->where("user_type",2);
        $query=$this->db->get();
        return $query->result();
    }
    public function login($aid, $pwd){
        $this->db->from('user');
        $this->db->where('aganvadi_number',$aid);
        $this->db->where("password",$pwd);
        $this->db->where("user_type",1);
        $query=$this->db->get();
        return $query->result();
    }
    public function getRowItems(){
        $this->db->from('tbl_row_items');
        $query=$this->db->get();
        return $query->result();
    }
    public function getFoodItems(){
        $this->db->from('tbl_food_items');
        $query=$this->db->get();
        return $query->result();
    }

    public function getWeekDays(){
        $this->db->from('tbl_days');
        $this->db->order_by("did", "asc");
        $query=$this->db->get();
        return $query->result();
    }
    public function itemInsert($data) {
        $this->db->insert('tbl_row_items', $data);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function foodItemInsert($data) {
        $this->db->insert('tbl_food_items', $data);
        if($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function getIngredients($fid){
        $this->db->from('tbl_ingredients');
        $this->db->where('food_item',$fid);
        $query=$this->db->get();
        return $query->result();
    }
}
?>