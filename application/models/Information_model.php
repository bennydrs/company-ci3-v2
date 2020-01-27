<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Information_model extends CI_Model
{
    public function getInformation()
    {
        return $this->db->get('information')->result_array();
    }

    public function addInformation()
    {
        $data = [
            "title" => $this->input->post('title'),
            "info" => $this->input->post('info'),
            "date_created" => date("Y-m-d H:i:s")
        ];

        $this->db->insert('information', $data);
    }

    public function edit()
    {
        $title = $this->input->post('title');
        $info = $this->input->post('info');

        $this->db->set('title', $title);
        $this->db->set('info', $info);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('information');
    }
}
