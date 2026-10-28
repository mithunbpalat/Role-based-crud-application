<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_Model');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        // var_dump($_POST);exit;
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth');
            return;
        }

        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password');

        $user = $this->Auth_Model->getUser($email);
        

        if ($user && password_verify($password, $user->pwd)) {
            $this->session->set_userdata([
                'user_id'    => $user->id,
                'user_email' => $user->eml,
                'user_name' => $user->usrnme,
                'logged_in'  => TRUE
            ]);
            redirect('dashboard');

        } else {
            $this->session->set_flashdata('error','Invalid email or password.');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
    
}