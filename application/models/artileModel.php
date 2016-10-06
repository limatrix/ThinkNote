<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function add($userid) {
    	$this->db->insert('article', array('userid' => $userid));
    	return $this->db->insert_id();
    }
}