<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Information_model', 'info');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Informasi";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['information'] = $this->info->getInformation();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('information/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah informasi";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('information/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->info->addInformation();
            $this->session->set_flashdata('message', 'Informasi baru berhasil ditambahkan');
            redirect('info');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit informasi";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['info'] = $this->info->getInformationById($id);

        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('information/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->info->updateInfo($id);
            $this->session->set_flashdata('message', 'Informasi berhasil diubah');
            redirect('info');
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('information');

        $this->session->set_flashdata('message', 'Information has been deleted!');
        redirect('information');
    }
}
