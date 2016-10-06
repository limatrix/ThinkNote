<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	private $userid = 1;
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('tagModel');
        //$this->load->model('articleModel');
    }
	
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function create()
	{
		//$articleid = $this->articleModel->add($this->userid);
		$this->load->view('article', array('flag' => 'create'));
	}

	public function edit() {

	}
}
