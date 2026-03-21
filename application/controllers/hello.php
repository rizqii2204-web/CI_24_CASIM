<?php
class Hello extends CI_Controller {

    public function index()
    {
        $data['nama'] = "Triono";
        $this->load->view('hello_view', $data);
    }
}