<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Information_model extends CI_Model
{
    public function getInformation()
    {
        $this->db->select('information.*, employee.name');
        $this->db->from('information');
        $this->db->join('employee', 'employee.user_id = information.user_id');
        return $this->db->get()->result_array();
    }

    public function getInformationById($id)
    {
        return $this->db->get_where('information', ['id' => $id])->row_array();
    }

    public function addInformation()
    {
        $data = [
            "title" => $this->input->post('title'),
            "content" => $this->input->post('content'),
            "user_id" => $this->session->userdata('id')
            // "date_created" => date("Y-m-d H:i:s")
        ];

        $this->db->insert('information', $data);
    }

    public function updateInfo($id)
    {
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $date = date("Y-m-d H:i:s");

        $this->db->set('title', $title);
        $this->db->set('updated_by', $this->session->userdata('id'));
        $this->db->set('content', $content);
        $this->db->set('updated_at', $date);
        $this->db->where('id', $id);
        $this->db->update('information');
    }
}
