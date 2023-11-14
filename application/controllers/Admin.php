<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Admin_model");
        $this->load->model("Member_model");
        $this->load->model("User_model");
        $this->load->library('session');
    }

    public function index()
    {

    }
    public function login()
    {
        $data['title'] = "Login";
        $this->load->view('login/template/header',$data);
        $this->load->view('login/login');
        $this->load->view('login/template/header');
    }
    public function register()
    {
        $data['title'] = "Register";
        $this->load->view('login/template/header',$data);
        $this->load->view('login/register');
        $this->load->view('login/template/header');
    }
    public function forgot_password()
    {
        $data['title'] = "Forgot Password";
        $this->load->view('login/template/header',$data);
        $this->load->view('login/forgot_password');
        $this->load->view('login/template/header');
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
        $data['film'] = $this->Admin_model->select();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_film',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah_film()
    {
        $data['title'] = "Tambah Film";
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
    $config['upload_path']     = '././assets/gambar_film/'; //folder tempat file
	$config['allowed_types']   = 'gif|jpg|jpeg|png'; //tipe file
	$config['max_size']        = 1000; //ukuran file mb
	$config['max_width']       = 10240; //ukuran lebar
	$config['max_height']      = 7680; //ukuran tinggi
    $config['overwrite']       = TRUE;
    
    $config['file_name']       = $new_file_name;
    
	$this->load->library('upload', $config);
    
	if ( ! $this->upload->do_upload('foto')){
		$error = array('error' => $this->upload->display_errors());
		var_dump($error);
	}else{
		$data = array('upload_data' => $this->upload->data());
		$simpan = $this->Admin_model->simpan_film($new_file_name);

        if($simpan){
            $this->session->set_flashdata('message', 'sukses simpan');
            redirect('admin/data_film');
        }else{
            $this->session->set_flashdata('message', 'gagal simpan');
            redirect('admin/data_film');
        }
	}
    }
    public function detail_film()
    {
        $id = $_GET['id'];
        $data['title'] = "Detail Data Film";
        $data['film'] = $this->Admin_model->detail_film($id);
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/detail_film',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_film()
    {
        $data['title'] = "Update Film";
        $data['film'] = $this->Admin_model->show_data();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/update_film',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_data()
    {
        if($_FILES ['foto']['size'] !=0){
        $file_name = $_FILES['foto']['name'];
        $file_type = $_FILES['foto']['type'];
        $file_size = $_FILES['foto']['size'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = uniqid().'.'.$file_ext;
        $config['upload_path']     = '././assets/gambar_film/'; //folder tempat file
	    $config['allowed_types']   = 'gif|jpg|jpeg|png'; //tipe file
	    $config['max_size']        = 1000; //ukuran file mb
	    $config['max_width']       = 10240; //ukuran lebar
	    $config['max_height']      = 7680; //ukuran tinggi
        $config['overwrite']       = TRUE;
    
        $config['file_name']       = $new_file_name;
    
        $this->load->library('upload', $config);
    
	if ( ! $this->upload->do_upload('foto')){
		$error = array('error' => $this->upload->display_errors());
		var_dump($error);
	}else{
		$data = array('upload_data' => $this->upload->data());
        var_dump($data);
		$update = $this->Admin_model->update(1,$new_file_name);
        if($update){
            $this->session->set_flashdata('message', 'berhasil update');
            redirect('admin/data_film');
            }else{
            $this->session->set_flashdata('message', 'gagal update');
            redirect('admin/data_film');
            }
	}
        }else{
            $update = $this->Admin_model->update(2);
            if($update){
                $this->session->set_flashdata('message', 'berhasil update');
                redirect('admin/data_film');
                }else{
                $this->session->set_flashdata('message', 'gagal update');
                redirect('admin/data_film');
                }
        }
    }
        public function delete_film()
    {
        $data = $this->Admin_model;
        $delete = $data->delete($this->input->get('id'));
        if($delete){
            $this->session->set_flashdata('message', 'berhasil delete');
            redirect('Admin/data_film');
        }else{
            $this->session->set_flashdata('message', 'gagal delete');
            redirect('Admin/data_film');
        }
    }
    public function data_harga()
    {
        $data['title'] = "Data Harga";
        $data['member']= $this->Member_model->select();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_harga',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah_member()
    {
        $data['title'] = "Tambah Member";
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/tambah_member');
        $this->load->view('admin/template/footer');
    }
    public function simpan_member()
    {
        $simpan_member = $this->Member_model;
        $hasil = $simpan_member->simpan_member();
        if($hasil){
        redirect('admin/data_harga');
        }else{
        redirect('admin/tambah_member');
        }
    }
    public function update_member()
    {
        $data['title'] = "Update Member";
        $data['member'] = $this->Member_model->show_data();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/update_member',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_data_member()
    {
        $data = $this->Member_model;
        $update = $data->update();

        if($update){
            //$this->session->set_flashdata('message', 'berhasil update');
            redirect('admin/data_harga');
            }else{
            //$this->session->set_flashdata('message', 'gagal update');
            redirect('admin/data_harga');
            }
        }
        public function delete_member()
        {
            $data = $this->Member_model;
            $delete = $data->delete($this->input->get('id'));
            if($delete){
                //$this->session->set_flashdata('message', 'berhasil delete');
                redirect('Admin/data_harga');
            }else{
                //$this->session->set_flashdata('message', 'gagal delete');
                redirect('Admin/data_harga');
            }
    }
    public function data_transaksi()
    {
        $data['title'] = "Data Member";
        $data['transaksi']= $this->Member_model->show_transaksi();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/data_transaksi',$data);
        $this->load->view('admin/template/footer');
    }
    public function tambah_transaksi()
    {
        $data['title'] = "Tambah Transaksi";
        $data['harga']= $this->Member_model->select();
        $data['user']= $this->User_model->select();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/tambah_transaksi', $data);
        $this->load->view('admin/template/footer');
    }
    public function simpan_transaksi()
    {
        
        $simpan_transaksi = $this->Member_model;
        $hasil = $simpan_transaksi->simpan_transaksi();
        if($hasil){
        redirect('admin/data_transaksi');
        }else{
        redirect('admin/tambah_transaksi');
        }
    }
    public function update_transaksi()
    {
        $data['title'] = "Update transaksi";
        $data['transaksi'] = $this->Member_model->show_data();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/update_transaksi',$data);
        $this->load->view('admin/template/footer');
    }
    public function update_data_transaksi()
    {
        $data = $this->Member_model;
        $update = $data->update();

        if($update){
            //$this->session->set_flashdata('message', 'berhasil update');
            redirect('admin/data_transaksi');
            }else{
            //$this->session->set_flashdata('message', 'gagal update');
            redirect('admin/data_transaksi');
            }
        }
        public function delete_transaksi()
        {
            $data = $this->Member_model;
            $delete = $data->delete($this->input->get('id'));
            if($delete){
                //$this->session->set_flashdata('message', 'berhasil delete');
                redirect('Admin/data_transaksi');
            }else{
                //$this->session->set_flashdata('message', 'gagal delete');
                redirect('Admin/data_transaksi');
            }
    }
    public function update_bayar()
    {
        $data = $this->Admin_model;
        $update = $data->update_bayar();
        if($update){
            //$this->session->set_flashdata('message', 'berhasil update');
            redirect('admin/data_transaksi');
            }else{
            //$this->session->set_flashdata('message', 'gagal update');
            redirect('admin/data_transaksi');
            }
    }
       
}
/* End of file Admin.php and path \application\controllers\Admin.php */