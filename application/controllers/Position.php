<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Position";
        // $data['user'] = $this->db->get_where('user', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['position'] = $this->db->get('position')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('position/index', $data);
        $this->load->view('templates/footer');
    }

    public function addposition()
    {
        $data['title'] = "Position";
        $data['user'] = $this->db->get_where('user', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['position'] = $this->db->get('position')->result_array();

        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('position/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('position', ['name_position' => $this->input->post('position')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New position added</div>');
            redirect('position');
        }
    }

    public function edit_position()
    {
        $data['title'] = "Edit Position";
        $data['user'] = $this->db->get_where('user', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['position'] = $this->db->get('position')->row_array();

        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('position/position', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('position', ['name_position' => $this->input->post('position')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">position updated</div>');
            redirect('position');
        }
    }

    public function delete_position($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('position');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">position deleted</div>');
        redirect('position');
    }
}
