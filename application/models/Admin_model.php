<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Admin_model extends CI_Model 
{
    private $table='data_film';
    public function select()
    {
        $this->db->select();
        $this->db->from('data_film');
        $data = $this->db->get()->result();
        return $data;
    }                        
    public function simpan_film($nama_foto)
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'genre' => $this->input->post('genre'),
            'link' => $this->input->post('link'),
            'level' => $this->input->post('level'),
            'foto' => $nama_foto,
            'id_film'=> ''
        );

        return $this->db->insert('data_film', $data);
    }
    public function detail_film($id)
    {
        $this->db->select();
        $this->db->from('data_film');
        $this->db->where('Id_film',$id);
        $data = $this->db->get()->result();
        return $data;
    }
    public function show_data()
    {
        $id = $this->input->get('id');
        $query =$this->db->from($this->table)->where('id_film',$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function update($file,$nama_foto = null)
    {
        if($file == 1){
            $data = array(
                "judul" => $this->input->post('judul'),
                "foto" => $nama_foto,
                "genre" => $this->input->post('genre'),
                "link" => $this->input->post('link'),
                "level" => $this->input->post('level')
            );
            
            $this->db->where('id_film', $this->input->post('id_film'));
            return $this->db->update($this->table,$data);
        }else{
            $data = array(
                "judul" => $this->input->post('judul'),
                "genre" => $this->input->post('genre'),
                "link" => $this->input->post('link'),
                "level" => $this->input->post('level')
            );
            
            $this->db->where('id_film', $this->input->post('id_film'));
            return $this->db->update($this->table,$data);
        }
    }
    public function delete($id)
    {
        $this->db->where('id_film', $id);
        return $this->db->delete($this->table);
    }

    public function update_bayar()
    {
        var_dump('coba');die;
        $data = array(
            "level" => $this->input->post('level'),
            "keterangan" => $this->input->post('keterangan'),
            "harga" => $this->input->post('harga')
        );
        
        $this->db->where('id_harga', $this->input->post('id_harga'));
        return $this->db->update($this->table,$data);
    }
}
/* End of file Admin_model.php and path \application\models\Admin_model.php */