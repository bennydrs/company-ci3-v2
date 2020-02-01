<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->model('Information_model', 'info');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Home";
        // $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['user'] = $this->Employee_model->getEmployeeByUser();
        $data['info'] = $this->info->getInformation();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function profil()
    {
        $data['title'] = "My Profile";
        // $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['user'] = $this->Employee_model->getEmployeeByUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profil', $data);
        $this->load->view('templates/footer');
    }

    // public function edit()
    // {
    //     $data['title'] = "Edit Profile";
    //     $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
    //     $data['position'] = $this->db->get_where('position')->result_array();

    //     $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('user/edit', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $id = $this->input->post('id');
    //         $name = $this->input->post('name');
    //         $b_place = $this->input->post('birth_place');
    //         $b_date = $this->input->post('birth_date');
    //         $sex = $this->input->post('sex');
    //         $status = $this->input->post('status');

    //         $no = $this->input->post('no_phone');
    //         $npwp = $this->input->post('no_npwp');
    //         $no_phone = str_replace("-", "", $no);
    //         $no_npwp = preg_replace('/\D/', '', $npwp);

    //         $address = $this->input->post('address');
    //         // $email = $this->input->post('email');
    //         $religion = $this->input->post('religion');
    //         $position = $this->input->post('position');
    //         $group = $this->input->post('group');
    //         $academic = $this->input->post('academic');
    //         //cek jika ada gambar yg diupload
    //         $upload_image = $_FILES['image']['name'];

    //         if ($upload_image) {
    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size'] = '2048';
    //             $config['upload_path'] = './assets/img/profile/';

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('image')) {
    //                 $old_image = $data['user']['image'];
    //                 if ($old_image != 'default.jpg') {
    //                     unlink(FCPATH . 'assets/img/profil/' . $old_image);
    //                 }

    //                 $new_image = $this->upload->data('file_name');
    //                 $this->db->set('image', $new_image);
    //             } else {
    //                 $error = $this->upload->display_errors();
    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $error . '</div>');
    //                 redirect('user/edit');
    //             }
    //         }

    //         $this->db->set('name', $name);
    //         $this->db->set('birth_place', $b_place);
    //         $this->db->set('birth_date', $b_date);
    //         $this->db->set('sex', $sex);
    //         $this->db->set('status', $status);
    //         $this->db->set('no_phone', $no_phone);
    //         $this->db->set('address', $address);
    //         $this->db->set('no_npwp', $no_npwp);
    //         $this->db->set('religion', $religion);
    //         $this->db->set('position_id', $position);
    //         $this->db->set('group_id', $group);
    //         $this->db->set('academic', $academic);
    //         $this->db->where('e_id_number', $id);
    //         $this->db->update('employee');

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
    //         redirect('user');
    //     }
    // }

    public function changepassword()
    {
        $data['title'] = "Change Password";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function edit($id)
    {
        $data['title'] = "Edit Pegawai";
        $data['user'] = $this->db->get_where('employee', ['id' => $id])->row_array();
        $data['position'] = $this->db->get_where('position')->result_array();
        $data['group'] = $this->db->get_where('group')->result_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('group', 'grup', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $id = $this->input->post('e_id_number');
            $name = $this->input->post('name');
            $no = $this->input->post('no_phone');
            $npwp = $this->input->post('no_npwp');
            $no_phone = str_replace("-", "", $no);
            $no_npwp = preg_replace('/\D/', '', $npwp);

            //cek jika ada gambar yg diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profil/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                    redirect('employee/edit/' . $id, 'refresh');
                }
            }

            $this->db->set('name', $name);
            $this->db->set('birth_place', $this->input->post('birth_place'));
            $this->db->set('birth_date', $this->input->post('birth_date'));
            $this->db->set('sex', $this->input->post('sex'));
            $this->db->set('status', $this->input->post('status'));
            $this->db->set('no_phone', $no_phone);
            $this->db->set('address', $this->input->post('address'));
            $this->db->set('no_npwp', $no_npwp);
            $this->db->set('religion', $this->input->post('religion'));
            $this->db->set('position_id', $this->input->post('position'));
            $this->db->set('group_id', $this->input->post('group'));
            $this->db->set('academic', $this->input->post('academic'));
            $this->db->where('id', $id);
            $this->db->update('employee');

            $this->session->set_flashdata('message', 'Data ' . $name . ' berhasil diubah!');
            if ($id == $this->session->userdata('e_id_number')) {
                redirect('user');
            } else {
                redirect('user/profil');
            }
        }
    }

    public function show_info($id)
    {
        $this->load->model('information_model', 'info');
        $data['title'] = 'Isi Info';
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['info'] = $this->info->getInformationById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/show_info', $data);
        $this->load->view('templates/footer');
    }
}
