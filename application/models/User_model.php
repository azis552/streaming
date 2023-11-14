<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User_model extends CI_Model 
{
    private $table = "data_user";
    
    public function select()
    {
        $this->db->select();
        $this->db->from($this->table);
        $data = $this->db->get()->result();
        return $data;
    }                        
    public function store()
    {
        $password = md5($this->input->post('password'));
        $data = array (
            'nama_lengkap' => $this->input->post('fullname'),
            'username' => $this->input->post('username'),
            'password' => $password
        );
        
        return $this->db->insert($this->table, $data);
    }    
    public function login_cek($username, $password)
    {
        $this->db->select('username'); // pilih kolom
        $this->db->from('data_user'); // pilih table
        $this->db->where('username', $username); // syarat username
        $this->db->where('password',md5($password)); // syarat password md5
        $db = $this->db->get()->num_rows(); // menampilkan jumlah baris data
        return $db;
    }                
}


/* End of file User_model.php and path /application/models/User_model.php */
