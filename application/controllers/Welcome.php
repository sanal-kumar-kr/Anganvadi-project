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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct() 
	{
    	parent::__construct();
		$this->session;
		$this->load->model('AdminModel');
	}
	public function index()
	{
		$data['data'] = $this->AdminModel->welcome();
		$login_flag = $this->checkLogin();
		$data['login'] = $login_flag;
		if($login_flag) {
			$this->load->view('home', $data);
		}
		else {

			$this->load->view('layout', $data);
		}
	}
	public function adminLogin()
	{
		$aid = $this->input->post('aid');
		$pwd = $this->input->post('password');
		$data = $this->AdminModel->login( $aid, md5($pwd));
		if(count($data) == 1) {
			$user = (array) $data[0];
			$_SESSION['is_login'] = true;
			$_SESSION['ut'] = $user['aganvadi_number'];
		}	
		$login_flag = $this->checkLogin();
		$data['login'] = $login_flag;
		if($login_flag) {
			$data['data'] = $this->AdminModel->welcome();
			$this->load->view('home', $data);
		}
		else {

			$this->load->view('layout', $data);
		}
	}
	public function adminLogout() {
		$this->session->sess_destroy();
		$_SESSION['is_login'] = false;
		$login_flag = $this->checkLogin();
		$data['login'] = $login_flag;
		print($data['login'] );
		$this->load->view('layout', $data);
	}
	public function rowItems() {
		$login_flag = $this->checkLogin();
		$data['login'] = $login_flag;
		if($this->input->post()) {
			$input_arr = array();
			$input_arr['item'] = $this->input->post('title');
			$input_arr['unit'] = $this->input->post('unit');
			$input_arr['locale_title'] = $this->input->post('locale_title');
			$data['data'] = $this->AdminModel->itemInsert($input_arr);
		}
		$data['data'] = $this->AdminModel->getRowItems();
		$this->load->view('rowitems', $data);
	}
	public function foodItems() {
		$login_flag = $this->checkLogin();
		$data['login'] = $login_flag;
		if($this->input->post()) {
			$input_arr = array();
			$input_arr['name'] = $this->input->post('item');
			//$input_arr['stime'] = $this->input->post('stime');
			//$input_arr['days'] = $this->input->post('days');
			print_r($input_arr);
			$data['input'] = $input_arr;
			$data['data'] = $this->AdminModel->FoodItemInsert($input_arr);
		}
		$data['data'] = $this->AdminModel->getFoodItems();
		$this->load->view('fooditems', $data);
	}
	public function getIngredients() {
		if($this->input->post()) {
			$result_arr = array();
			$fid = $this->input->post('i');
			$result_arr['data'] = $this->AdminModel->getIngredients( $fid);
			echo json_encode($result_arr);
		}
	}
	function checkLogin() {
		if(isset($_SESSION['is_login']) && $_SESSION['is_login']) {
			return true;
		}
		else {
			return false;
		}
	}
}
