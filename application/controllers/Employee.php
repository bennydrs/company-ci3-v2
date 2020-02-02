<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Employee_model', 'employee');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Pegawai";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['employee'] = $this->employee->getEmployee();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/index', $data);
        $this->load->view('templates/footer');
    }

    public function addemployee()
    {
        $data['title'] = "Tambah Pegawai";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $data['position'] = $this->db->get_where('position')->result_array();
        $data['group'] = $this->db->get_where('group')->result_array();

        $this->form_validation->set_rules('e_id_number', 'Employee ID Number', 'required|trim|min_length[5]|is_unique[employee.e_id_number]', array('is_unique' => 'This ID has already registered'));
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('birth_place', 'Birth Place', 'required|trim');
        $this->form_validation->set_rules('birth_date', 'Birth Date', 'required|trim');
        $this->form_validation->set_rules('sex', 'Sex', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[employee.email]', array('is_unique' => 'This email has already registered'));
        $this->form_validation->set_rules('no_phone', 'No Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('religion', 'Religion', 'required|trim');
        $this->form_validation->set_rules('no_npwp', 'No NPWP', 'required|trim');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        $this->form_validation->set_rules('academic', 'Academic', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('employee/add-employee', $data);
            $this->load->view('templates/footer');
        } else {
            $this->employee->addEmployee();

            $this->session->set_flashdata('message', 'Pegawai baru berhasil ditambah!');
            redirect('employee/index');
        }
    }

    public function detail($e_id_number)
    {
        $data['title'] = "Detail";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $this->load->model('Employee_model', 'employee');

        $data['employee'] = $this->employee->getEmployeeById($e_id_number);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/detail', $data);
        $this->load->view('templates/footer');
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
            $this->load->view('employee/edit', $data);
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
                redirect('employee');
            }
        }
    }

    public function deleteEmployee($id)
    {
        //hapus user
        $this->db->where('id', $id);
        $this->db->delete('user');

        //hapus pegawai
        $this->db->where('user_id', $id);
        $this->db->delete('employee');

        $this->session->set_flashdata('message', 'Data pegawai berhasil dihapus!');
        redirect('employee/index');
    }

    // public function printPDF()
    // {
    //     $data['employee'] = $this->employee->getEmployee();
    //     $view = $this->load->view('Print/employeePDF', $data, TRUE);
    //     $mpdf->WriteHTML($view);
    //     // $mpdf->WriteHTML('besok libur');
    //     $mpdf->Output();
    // }

    public function position()
    {
        $data['title'] = "Jabatan";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['position'] = $this->db->get('position')->result_array();

        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('employee/position', $data);
            $this->load->view('templates/footer');
        } else {
            $salary = $this->input->post('salary');
            $salarynew = str_replace(".", "", $salary);

            $this->db->insert('position', ['name_position' => $this->input->post('position'), 'salary' => $salarynew]);
            $this->session->set_flashdata('message', 'New position added');
            redirect('employee/position');
        }
    }

    public function edit_position()
    {
        $salary = $this->input->post('salary');
        $salarynew = str_replace(".", "", $salary);

        $name_position_old = $this->input->post('name_position_old');
        $name_position_new = $this->input->post('name_position');

        // cek unique
        if ($name_position_new != $name_position_old) {
            $name_check = $this->db->get_where('position', ['name_position' => $name_position_new]);
            if ($name_check->num_rows() > 0) {
                $this->session->set_flashdata('error', 'Position "' . $name_position_new . '" already exist');
                // $this->error['th_slug'] = 'Slug "' . $data['th_slug'] . '" sudah digunakan';
                redirect('employee/position');
            }
        }

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('position', ['name_position' => $name_position_new, 'salary' => $salarynew]);
        $this->session->set_flashdata('message', 'Position has been updated');
        redirect('employee/position');
    }

    public function delete_position($id)
    {
        $this->session->set_flashdata('confirm', 'Delete?');
        $this->db->where('id', $id);
        $this->db->delete('position');
        $this->session->set_flashdata('message', 'position has been deleted');
        redirect('employee/position');
    }

    public function leave()
    {
        $data['title'] = "Cuti";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['leave'] = $this->employee->getLeave();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('cuti/index', $data);
        $this->load->view('templates/footer');
    }

    public function addleave()
    {
        $data['title'] = "Tambah Cuti";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $data['employee'] = $this->employee->getEmployee();

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('day', 'Day', 'required');
        $this->form_validation->set_rules('date_start', 'Date start', 'required');
        $this->form_validation->set_rules('date_finish', 'Date finish', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('cuti/add-leave', $data);
            $this->load->view('templates/footer');
        } else {
            $this->employee->addLeave();

            $this->session->set_flashdata('message', 'New position added');
            redirect('cuti/leave');
        }
    }

    public function Absent()
    {
        $data['title'] = "Absen";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $month = $this->input->get('month');
        $data['month'] = $month;
        $absen = $this->employee->getAbsent($month);
        $data['absent_r'] = $absen['absent_r'];
        $data['absent_n'] = $absen['absent_n'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absen/absent', $data);
        $this->load->view('templates/footer');
    }

    public function addAbsent()
    {
        $data['title'] = "Tambah Absen";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $month = $this->input->get('month');
        $data['date'] = $month;
        $absen = $this->employee->getAddAbsent($month);
        $data['absent_r'] = $absen['add_absent_r'];
        $data['absent_n'] = $absen['add_absent_n'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absen/add-absent', $data);
        $this->load->view('templates/footer');
    }

    public function saveAbsent()
    {
        $this->employee->addAbsent();

        $this->session->set_flashdata('message', 'Absen baru ditambahkan!');
        redirect('employee/Absent');
    }

    public function editAbsent()
    {

        $data['title'] = "Edit Absen";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();
        $month = $this->uri->segment(3);
        $data['date'] = $month;
        $absen = $this->employee->getEditAbsent();
        $data['absent_r'] = $absen['add_absent_r'];
        $data['absent_n'] = $absen['add_absent_n'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absen/edit-absent', $data);
        $this->load->view('templates/footer');
    }

    public function edit_absen($id)
    {
        $absen = $this->input->get_post('value');

        $this->db->set('present', $absen);
        $this->db->where('id', $id);
        $this->db->update('absent');
    }

    public function prosesEditAbsent()
    {
        // $month = $this->uri->segment('3');
        $month = $this->input->post('bulan');
        // $absen = $this->employee->getEditAbsent();
        // $data['absent_r'] = $absen['add_absent_r'];
        // $data['absent_n'] = $absen['add_absent_n'];

        // $total = $this->input->post('total');
        // if ($total < 31) {

        //     $this->session->set_flashdata('error', 'labih 31');
        //     redirect('employee/editAbsent');
        // }
        $this->employee->editAbsent();
        $this->session->set_flashdata('message', 'data absen berhasil ditambahkan!');
        redirect('employee/absent?month=' . $month);
    }

    public function group()
    {
        $data['title'] = "Golongan";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        // $data['leave'] = $this->employee->getLeave();
        $data['group'] = $this->db->get('group')->result_array();

        $this->form_validation->set_rules('name_group', 'Name group', 'required|trim|is_unique[group.name_group]', array('is_unique' => 'This ID has already registered'));
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('golongan/group', $data);
            $this->load->view('templates/footer');
        } else {
            $this->employee->addGroup();
            $this->session->set_flashdata('message', 'golongan berhasil ditambah');
            redirect('golongan/group');
        }
    }

    public function editGroup()
    {
        $name_group_old = $this->input->post('name_group_old');
        $name = $this->input->post('name_group');

        // cek unique
        if ($name != $name_group_old) {
            $name_check = $this->db->get_where('group', ['name_group' => $name]);
            if ($name_check->num_rows() > 0) {
                $this->session->set_flashdata('error', 'nama golongan "' . $name . '" sudah ada!');
                // $this->error['th_slug'] = 'Slug "' . $data['th_slug'] . '" sudah digunakan';
                redirect('employee/group');
            }
        }
        $this->employee->editGroup();
        $this->session->set_flashdata('message', 'group has been updated');
        redirect('employee/group');
    }

    public function salary()
    {
        $data['title'] = "Gaji";
        $data['user'] = $this->db->get_where('employee', ['e_id_number' => $this->session->userdata('e_id_number')])->row_array();

        $month = $this->input->get('month');
        $data['date'] = $month;
        $absen = $this->employee->getSalary($month);
        $data['salary_r'] = $absen['salary_r'];
        $data['salary_n'] = $absen['salary_n'];

        // $absen = $this->employee->getAddAbsent($month);
        // $data['absent_r'] = $absen['add_absent_r'];
        // $data['absent_n'] = $absen['add_absent_n'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('employee/salary', $data);
        $this->load->view('templates/footer');
    }


    public function export_pegawai_pdf()
    {
        $data['pegawai'] = $this->employee->getEmployee();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "data-pegawai.pdf";
        $this->pdf->load_view('export/pegawai_pdf', $data);
    }

    public function export_salary_pdf_one()
    {
        $data['salary'] = $this->employee->getIDSalary();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "slip-gaji.pdf";
        $this->pdf->load_view('export/slip_gaji_pdf', $data);
    }

    // public function print_salary()
    // {
    //     $mpdf = new \Mpdf\Mpdf();

    //     $data['salary'] = $this->employee->getIDSalary();
    //     $view = $this->load->view('Print/salaryPDF', $data, TRUE);
    //     $mpdf->WriteHTML($view);
    //     // $mpdf->WriteHTML('besok libur');
    //     $mpdf->Output();
    // }
}
