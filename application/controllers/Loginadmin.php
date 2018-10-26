<?php
class Loginadmin extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('m_padmin');
    }
    function index(){
        $this->load->view('admin/login');
    }
    function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('username',TRUE)));
        $password=strip_tags(str_replace("'", "", $this->input->post('password',TRUE)));
        $cadmin=$this->m_padmin->cekadminlogin($username,$password);
        if($cadmin->num_rows() > 0){
            $xcadmin=$cadmin->row_array();
            $newdata = array(
                'userid'   => $xcadmin['user_id'],
                'username'  => $xcadmin['user_username'],
                'role'      => $xcadmin['user_role'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($newdata);
            redirect('padmin'); 
        }else{
            redirect('loginadmin/gagallogin'); 
        }
    }


    function gagallogin(){
        $url=base_url('loginadmin');
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Username Atau Password Salah</div>');
        redirect($url);
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('loginadmin');
        redirect($url);
    }
}