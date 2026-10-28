<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Admin_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Group_Model');
    }

    public function index(){
        $data['title'] = 'Group';
        $this->render_template('group/index', $data);
    }
}