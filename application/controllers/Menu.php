<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model', 'menu');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Menu Management";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['menu'] = $this->menu->getMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'New menu added');
            redirect('menu');
        }
    }

    public function editMenu()
    {
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['menu'] = $this->menu->getMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'menu has been updated');
            redirect('menu');
        }
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
        $this->session->set_flashdata('message', 'menu has been deleted');
        redirect('menu');
    }

    public function subMenu()
    {
        $data['title'] = "Submenu Management";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'New submenu added');
            redirect('menu/submenu');
        }
    }

    public function edit_subMenu()
    {
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'submenu updated');
            redirect('menu/submenu');
        }
    }

    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
        redirect('menu/subMenu');
        $this->session->set_flashdata('message', 'submenu deleted');
    }

    public function sortSubMenu()
    {
        $data['title'] = "Atur Menu";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['submenu'] = $this->menu->getSubMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/sortSubMenu', $data);
        $this->load->view('templates/footer');
    }

    public function updateSortMenu()
    {
        // $menu = $this->db->get('user_sub_menu');
        $menu = $this->menu->getSubMenu();

        foreach ($menu as $task) {
            // $task->timestamps = false; // To disable update_at field updation
            $id = $task['id'];

            foreach ($this->input->post('order') as $order) {
                if ($order['id'] == $id) {
                    $this->db->where('id', $order['id']);
                    $this->db->update('user_sub_menu', ['order_by' => $order['position']]);
                    $this->session->set_flashdata('message', 'Urutan menu berhasil diubah');
                }
            }
        }
    }
}
