<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

	private $userid = 1;
	
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('tagModel');
    }
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
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function add()
	{
		$tag = $this->input->post('name');
		$this->tagModel->add($this->userid, $tag);
		echo json_encode(array('retcode' => 1));
	}
}
