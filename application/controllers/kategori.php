<?php

class Kategori extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kategori_model');
  }
  public function index()
  {
    $data['kategori'] = $this->kategori_model->get_all();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('kategori/index', $data);
    $this->load->view('templates/footer');
  }
}