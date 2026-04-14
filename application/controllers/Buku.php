<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Kategori_model');
    }
    public function index()
    {
        $this->load->library('pagination');
    
        $keyword = $this->input->get('keyword');
    
        // HITUNG TOTAL DATA
        $this->db->from('buku');
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
        }
        $total_rows = $this->db->count_all_results();
    
        // CONFIG
        $config['base_url'] = site_url('buku/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 5;
    
        $this->pagination->initialize($config);
    
        $start = $this->uri->segment(3);
    
        $data['buku'] = $this->Buku_model->get_limit($config['per_page'], $start, $keyword);
    
        $data['pagination'] = $this->pagination->create_links();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->get_all();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }

    // ======================
    // SIMPAN
    // ======================
    public function simpan()
    {
        $data = [
            'kode_buku'   => $this->input->post('kode_buku'),
            'judul'       => $this->input->post('judul'),
            'penulis'     => $this->input->post('penulis'),
            'penerbit'    => $this->input->post('penerbit'),
            'tahun'       => $this->input->post('tahun'),
            'kategori_id' => $this->input->post('kategori_id'),
            'stok'        => $this->input->post('stok'),
            'lokasi_rak'  => $this->input->post('lokasi_rak')
        ];
    
        $this->Buku_model->insert($data);
        redirect('buku');
    }
    public function hapus($id)
    {
        $this->Buku_model->delete($id);
        $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        redirect('buku');
    }  
    public function edit($id)
    {
        $data['buku'] = $this->Buku_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();
    
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id = $this->input->post('id');
    
        $data = [
            'kode_buku'   => $this->input->post('kode_buku'),
            'judul'       => $this->input->post('judul'),
            'penulis'     => $this->input->post('penulis'),
            'penerbit'    => $this->input->post('penerbit'),
            'tahun'       => $this->input->post('tahun'),
            'kategori_id' => $this->input->post('kategori_id'),
            'stok'        => $this->input->post('stok'),
            'lokasi_rak'  => $this->input->post('lokasi_rak')
        ];
    
        $this->Buku_model->update($id, $data);
        $this->session->set_flashdata('success','Data Berhasil Diupdate');
        redirect('buku');
    }
}
