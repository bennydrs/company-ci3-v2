<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['jlh_employee']  = $this->db->get('employee')->num_rows();
        $data['jlh_position']  = $this->db->get('position')->num_rows();
        $data['jlh_admin']  = $this->db->get_where('user', ['role_id' => 1])->num_rows();
        $this->load->model('employee_model', 'employee');
        // $data['absen'] = $this->employee->get();
        $absen = $this->employee->absenChart();
        $data['absen'] = [];
        if (count($absen) > 0) {
            foreach ($absen as $a) {
                $data['absen'][] = $a;
            }
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = "Role";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleaccess($role_id)
    {
        $data['title'] = "Role Access";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = array(
            'role_id' => $role_id,
            'menu_id' => $menu_id
        );

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', 'Access changed!');
    }

    public function editRole()
    {
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', 'role has been updated');
            redirect('admin/role');
        }
    }
}
