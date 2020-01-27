<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    public function addEmployee()
    {
        $email = $this->input->post('email', true);
        $no = $this->input->post('no_phone');
        $npwp = $this->input->post('no_npwp');
        $no_phone = str_replace("-", "", $no);
        $no_npwp = preg_replace('/\D/', '', $npwp);

        $birth = $this->input->post('birth_date');
        $password = date('dmy', strtotime($birth));
        $user = array(
            'e_id_number' => $this->input->post('e_id_number'),
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role_id' => 2
        );

        //input user
        $this->db->insert('user', $user);
        $user_id =  $this->db->insert_id();

        $employee = [
            'e_id_number' => $this->input->post('e_id_number'),
            'user_id' => $user_id,
            'name' => htmlspecialchars($this->input->post('name', true)),
            'birth_place' => $this->input->post('birth_place'),
            'birth_date' => $this->input->post('birth_date'),
            'sex' => $this->input->post('sex'),
            'status' => $this->input->post('status'),
            'email' => htmlspecialchars($email),
            'no_phone' => $no_phone,
            'address' => $this->input->post('address'),
            'religion' => $this->input->post('religion'),
            'no_npwp' => $no_npwp,
            'position_id' => $this->input->post('position'),
            'group_id' => $this->input->post('group'),
            'date_join' => date("Y-m-d"),
            'academic' => $this->input->post('academic'),
            'image' => 'default.jpg'
        ];

        //input pegawai
        $this->db->insert('employee', $employee);
    }

    public function getEmployeeById($e_id_number)
    {
        $query = "SELECT `employee`.*, `position`.`name_position`, `group`.`name_group`
                    FROM `employee` 
                    INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`  
                    INNER JOIN `group` ON `employee`.`group_id` = `group`.`id`  
                    WHERE `employee`.`e_id_number`= $e_id_number   
                ";

        return $this->db->query($query)->row_array();
    }

    public function getEmployee()
    {
        $query = "SELECT `employee`.*, `position`.`name_position`
                  FROM `employee` 
                  INNER JOIN `position`
                  ON `employee`.`position_id` = `position`.`id`  
                ";

        return $this->db->query($query)->result_array();
    }

    public function getEmployeeByUser()
    {
        $id = $this->session->userdata('e_id_number');
        $query = "SELECT `employee`.*, `position`.`name_position`, `group`.`name_group` AS `name_group`
                  FROM `employee` 
                  INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`  
                  INNER JOIN `group` ON `employee`.`group_id` = `group`.`id`  
                  WHERE `employee`.`e_id_number`= $id
                ";

        return $this->db->query($query)->row_array();
    }

    public function getLeave()
    {
        $query = "SELECT `leave`.*, `employee`.`name`
                  FROM `leave` 
                  INNER JOIN `employee`
                  ON `leave`.`employee_id` = `employee`.`e_id_number`  
                ";

        return $this->db->query($query)->result_array();
    }

    public function addLeave()
    {
        $data = [
            "employee_id" => $this->input->post('id', true),
            "date" => date("Y-m-d"),
            "total_days" => $this->input->post('day', true),
            "date_start" => $this->input->post('date_start', true),
            "date_finish" => $this->input->post('date_finish', true),
            "reason" => $this->input->post('reason', true),
        ];

        $this->db->insert('leave', $data);
    }

    public function getAbsent($month)
    {
        $query = "SELECT `absent`.*, `employee`.`name`, `employee`.`position_id`, `position`.`name_position`
                  FROM `absent` 
                  INNER JOIN `employee` ON `absent`.`employee_id` = `employee`.`e_id_number`  
                  INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`  
                  WHERE `absent`.`month` = '$month' 
                ";

        $a = $this->db->query($query)->result_array();
        $b = $this->db->query($query)->num_rows();

        return array(
            'absent_r' => $a,
            'absent_n' => $b
        );
    }

    public function getAddAbsent($month)
    {
        $query = "SELECT `employee`.*, `position`.`name_position`
                  FROM `employee`
                  INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`  
                  WHERE NOT EXISTS (
                      SELECT * FROM `absent` WHERE `absent`.`month` = '$month' AND `employee`.`e_id_number` = `absent`.`employee_id` 
                  )
                ";

        $a = $this->db->query($query)->result_array();
        $b = $this->db->query($query)->num_rows();

        return array(
            'add_absent_r' => $a,
            'add_absent_n' => $b
        );
    }

    public function getEditAbsent()
    {
        $month = $this->uri->segment(3);
        $query = "SELECT `employee`.*, `absent`.*, `position`.`name_position`
                  FROM `employee`
                  INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`  
                  INNER JOIN `absent` ON `employee`.`e_id_number` = `absent`.`employee_id`  
                  WHERE `absent`.`month` = '$month' 
                ";

        $a = $this->db->query($query)->result_array();
        $b = $this->db->query($query)->num_rows();

        return array(
            'add_absent_r' => $a,
            'add_absent_n' => $b
        );
    }

    public function addAbsent()
    {
        extract($_POST);

        foreach ($id as $key => $value) {
            $data = array(
                "employee_id" => $value,
                "present" => $present[$key],
                "permission" => $permission[$key],
                "alpha" => $alpha[$key],
                "total_absent" => $total[$key],
                "lembur" => $lembur[$key],
                "month" => $month[$key]
            );
            $this->db->insert('absent', $data);
        }
    }

    public function editAbsent()
    {
        extract($_POST);

        foreach ($month as $key => $value) {
            $data = array(
                "id" => $id[$key],
                "present" => $present[$key],
                "permission" => $permission[$key],
                "alpha" => $alpha[$key],
                "total_absent" => $total[$key],
                "lembur" => $lembur[$key],
                "month" => $value
            );


            $this->db->set('lembur', $data['lembur']);
            $this->db->set('total_absent', $data['total_absent']);
            $this->db->set('permission', $data['permission']);
            $this->db->set('alpha', $data['alpha']);
            $this->db->set('present', $data['present']);
            $this->db->where('id', $data['id']);
            $this->db->update('absent', $data);
        }
    }

    public function addGroup()
    {
        $tj = $this->input->post('tj_married');
        $meal = $this->input->post('meal');
        $ot = $this->input->post('overtime');
        $alpha = $this->input->post('alpha_cut');

        $tj_married = str_replace(".", "", $tj);
        $meal_money = str_replace(".", "", $meal);
        $overtime = str_replace(".", "", $ot);
        $alpha_cut = str_replace(".", "", $alpha);

        $data = [
            'name_group' => $this->input->post('name_group'),
            'tj_married' => $tj_married,
            'meal' => $meal_money,
            'overtime' => $overtime,
            'alpha_cuts' => $alpha_cut
        ];

        $this->db->insert('group', $data);
    }

    public function editGroup()
    {
        $tj = $this->input->post('tj_married');
        $meal = $this->input->post('meal');
        $ot = $this->input->post('overtime');
        $alpha = $this->input->post('alpha_cut');

        $tj_married = str_replace(".", "", $tj);
        $meal_money = str_replace(".", "", $meal);
        $overtime = str_replace(".", "", $ot);
        $alpha_cut = str_replace(".", "", $alpha);

        $data = [
            'id' => $this->input->post('id'),
            'name_group' => $this->input->post('name_group'),
            'tj_married' => $tj_married,
            'meal' => $meal_money,
            'overtime' => $overtime,
            'alpha_cuts' => $alpha_cut
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('group', $data);
    }

    public function getSalary($month)
    {
        $query = "SELECT `employee`.`e_id_number`, `employee`.`name`, `employee`.`status`, `position`.`name_position`, `position`.`salary`, `group`.*, `absent`.*
                    FROM `employee`
                    INNER JOIN `absent` ON `absent`.`employee_id` = `employee`.`e_id_number`
                    INNER JOIN `group` ON `group`.`id` = `employee`.`group_id`
                    INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`
                    WHERE `absent`.`month` = '$month'
                ";

        $a = $this->db->query($query)->result_array();
        $b = $this->db->query($query)->num_rows();

        return array(
            'salary_r' => $a,
            'salary_n' => $b
        );
    }

    public function getIDSalary()
    {
        // $month = uri_sergment(3);
        $id = $this->uri->segment(3);
        $query = "SELECT `employee`.`e_id_number`, `employee`.`name`, `employee`.`status`, `position`.`name_position`, `position`.`salary`, `group`.*, `absent`.*
                    FROM `employee`
                    INNER JOIN `absent` ON `absent`.`employee_id` = `employee`.`e_id_number`
                    INNER JOIN `group` ON `group`.`id` = `employee`.`group_id`
                    INNER JOIN `position` ON `employee`.`position_id` = `position`.`id`
                    WHERE `absent`.`id` = '$id'
                ";

        return $this->db->query($query)->row_array();
    }
}
