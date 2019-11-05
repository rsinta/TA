<?php
class user extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_user');
    }
    
    function lupapassword()
    {
        $email=$this->input->post('email');
        $hasil = $this->model_user->getUser($email)->row();
        echo json_encode($hasil);
    }

    function reset()
    {
        $e=$this->input->post('email');
        $p=$this->input->post('pertanyaan');
        $j=$this->input->post('jawaban');
        $hasil = $this->model_user->getUserCek($e,$p,$j)->num_rows();
        echo $hasil;

    }

    function resetpass()
    {
        $e=$this->input->post('email');
        $p=$this->input->post('passbaru');

        $this->model_user->resetpasswordbaru($e,$p);
        echo 1;

    }


}
?>