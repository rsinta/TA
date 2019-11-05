<?php
class Dashboard extends CI_Controller{
    
    
    function index(){
        if(isset($_SESSION['userdata']))
        {
        $this->template->load('template','v_dashboard');
        }
        else
        {
         $this->load->view('form_login');
        }
    }
}