<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Member_model extends CI_Model 
{
    private $table = "tb_harga";
    public function select()
    {
        $this->db->select();
        $this->db->from('tb_harga');
        $data = $this->db->get()->result();
        return $data;
    }
    public function simpan_member()
    {
        $data = array(
            'harga' => $this->input->post('harga'),
            'level' => $this->input->post('level'),
            'keterangan' => $this->input->post('keterangan'),
            'id_harga'=> ''
        );
        return $this->db->insert('tb_harga', $data);
    }
    public function show_data()
    {
        $id = $this->input->get('id');
        $query =$this->db->from($this->table)->where('id_harga',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update()
    {
        $data = array(
            "level" => $this->input->post('level'),
            "keterangan" => $this->input->post('keterangan'),
            "harga" => $this->input->post('harga')
        );
        
        $this->db->where('id_harga', $this->input->post('id_harga'));
        return $this->db->update($this->table,$data);
    }
    public function delete($id)
    {
        $this->db->where('id_harga', $id);
        return $this->db->delete($this->table);
    }
    public function simpan_transaksi()
    {
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'id_harga' => $this->input->post('id_harga'),
            'status_bayar' => 'belum',
            'tanggal_bayar' => date("Y/m/d")
        );
        return $this->db->insert('tb_transaksi', $data);
    }
    public function show_transaksi()
    {
        $this->db->select();
        $this->db->from('tb_transaksi');
        $this->db->join('data_user', 'data_user.id_user = tb_transaksi.id_user');
        $this->db->join('tb_harga','tb_harga.id_harga = tb_transaksi.id_harga');
        $data = $this->db->get()->result();
        return $data;
    }
    public function show_billing($id)
    {
        $this->db->select();
        $this->db->from('tb_transaksi');
        $this->db->join('data_user', 'data_user.id_user = tb_transaksi.id_user');
        $this->db->join('tb_harga','tb_harga.id_harga = tb_transaksi.id_harga');
        $this->db->where('id_transaksi',$id);
        $data = $this->db->get()->result();
        return $data;
    }
}


/* End of file Harga_model.php and path \application\models\Harga_model.php */
