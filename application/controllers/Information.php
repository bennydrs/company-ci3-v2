<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Information extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Information_model', 'info');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Information";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['information'] = $this->info->getInformation();

        $this->form_validation->set_rules('title', 'title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('information/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->info->addInformation();

            $this->session->set_flashdata('message', 'New information added');
            redirect('information');
        }
    }

    public function edit()
    {
        $this->info->edit();

        $this->session->set_flashdata('message', 'information updated');
        redirect('information');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('information');

        $this->session->set_flashdata('message', 'Information has been deleted!');
        redirect('information');
    }
}
