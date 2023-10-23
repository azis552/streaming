<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

    }
    public function login()
    {
        $data['title'] = "LOGIN";
        $this->load->view('login/template/header', $data);
        $this->load->view('login/login');
        $this->load->view('login/template/footer');
    }
    public function register()
    {
        $data['title'] = "Register";
        $this->load->view('login/template/header', $data);
        $this->load->view('login/register');
        $this->load->view('login/template/footer');
    }
    public function forgot_password()
    {
        $data['title'] = "Forgot Password";
        $this->load->view('login/template/header', $data);
        $this->load->view('login/forgot_password');
        $this->load->view('login/template/footer');
    }
    public function dashboard()
    {
        $data['title'] = "Dashboard Admin";
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer');
    }
    public function data_film()
    {
        $data['title'] = "Dashboard Admin";
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_film');
        $this->load->view('admin/template/footer');
    }
    public function tambah_film()
    {
        $data['title'] = "Dashboard Admin";
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/tambah_film');
        $this->load->view('admin/template/footer');
    }
    public function simpan_film()
    {
        $file_name = $_FILES['foto']['name'];
        $file_type = $_FILES['foto']['type'];
        $file_size = $_FILES['foto']['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = uniqid().'.'.$file_ext;
        $config['upload_path']   = '././assets/gambar_film/'; // folder tempat file
        $config['allowed_types'] = 'gif|jpg|png'; // tipe file
        $config['max_size']      = 1000; //ukuran file mb
        $config['max_width']     = 10240; // ukuran lebar
        $config['max_height']    = 7680; // ukuran tinggi
        $config['overwrite']     = TRUE;

        $config['file_name']     = $new_file_name;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            var_dump($data);
        }
    }
}

/* End of file Admin.php and path /application/controllers/Admin.php */
