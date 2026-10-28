<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function index(){
        $data['title'] = 'Dashboard';

        // Replace these sample values with database queries.
        $data['total_users'] = 125;
        $data['total_orders'] = 85;
        $data['total_revenue'] = 45250.00;
        $data['pending_orders'] = 12;
        $data['recent_users'] = [];

        $this->render_template('dashboard/dashboard', $data);
    }
}