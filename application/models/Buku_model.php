<?php

class Buku_model extends CI_Model {

    private $table = 'buku';

    public function get_all($keyword = null)
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori_id');
    
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->group_end();
        }
    
        return $this->db->get()->result();
    }

    public function get_limit($limit, $start, $keyword = null)
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori_id');
    
        if ($keyword) {
            $this->db->group_start();
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->group_end();
        }
    
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}