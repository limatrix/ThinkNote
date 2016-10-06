<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TagModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function add($userid, $keyword) {
    	$this->db->insert('keywords', array('userid' => $userid, 'keyword' => $keyword));
    }
}