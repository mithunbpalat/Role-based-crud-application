
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    
}

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Check whether the admin is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function render_template($view, $data = array())
    {
        $this->load->view('templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer', $data);
    }

}
