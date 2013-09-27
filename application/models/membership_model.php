<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class membership_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    private $email_code; //has value in session method

//    function validate(){
//        $this->db->where('username', $this->input->post('username'));
//        $this->db->where('password', md5($this->input->post('password')));
//       $query = $this->db->get('membership');
//        
//       if($query->num_rows ==1){
//           return true;
//       }
//    }
//    
//    function create_member(){
//        $new_member_insert_data = array(
//            'id_number' => $this->input->post('id_number'),
//            'firstname' => $this->input->post('first_name'),
//            'lastname' => $this->input->post('last_name'),
//            'username' => $this->input->post('username'),
//            'email' => $this->input->post('email_address'),
//            'phone' => $this->input->post('cell-phone_number'),
//            'password' => md5($this->input->post('password1'))
//        );
//        $insert = $this->db->insert('membership', $new_member_insert_data);
//        return $insert;
//    }
//    function validate() {
//        $this->db->where('username', $this->input->post('username'));
//        $this->db->where('password', sha1($this->config->item('salt') . $this->input->post('password')));
//        $query = $this->db->get('membership');
//
//        if ($query->num_rows == 1) {
//            return true;
//        }
//    }

    function login_user() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $sql = "SELECT id_number, firstname, lastname, username, email, phone, password, activated, role FROM membership WHERE  username = '{$username}' LIMIT 1";
        $query = $this->db->query($sql);
        $row = $query->row();

        if ($query->num_rows() === 1) {
//            if ($row->activated) {
            if ($row->password === sha1($this->config->item('salt') . $password)) {
                $session_data = array(
                    'id_number' => $row->id_number,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'username' => $row->username,
                    'email' => $row->email,
                    'phone' => $row->phone,
                    'role' => $row->role,
                );
                $this->set_session($session_data);

                if ($row->role === '1') {
                    return 'admin';
                } else {
                    return 'logged_in';
                }
            } else {
                return 'incorrect_password';
            }
//            } else {
//                //user have not activated their account yet
//                return 'not_activated';
//            }
        } else {
            //username not found in database
            return 'username_not_found';
        }
    }

    private function set_session($session_data) {

        $sess_data = array(
            'id_number' => $session_data['id_number'],
            'firstname' => $session_data['firstname'],
            'lastname' => $session_data['lastname'],
            'username' => $session_data['username'],
            'email' => $session_data['email'],
            'phone' => $session_data['phone'],
            'role' => $session_data['role'],
            'logged_in' => 1
        );
        $this->session->set_userdata($sess_data);
    }

    function create_member() {
//        $new_member_insert_data = array(
//            'id_number' => $this->input->post('id_number'),
//            'firstname' => $this->input->post('first_name'),
//            'lastname' => $this->input->post('last_name'),
//            'username' => $this->input->post('username'),
//            'email' => $this->input->post('email_address'),
//            'phone' => $this->input->post('cell-phone_number'),
//            'password' => sha1($this->config->item('salt') . $this->input->post('password1') . $this->config->item('salt'))
//        );
//             $insert = $this->db->insert('membership', $new_member_insert_data);
        $id_number = $this->input->post('id_number');
        $firstname = $this->input->post('first_name');
        $lastname = $this->input->post('last_name');
        $username = $this->input->post('username');
        $email = $this->input->post('email_address');
        $phone = $this->input->post('cell-phone_number');
        $password = sha1($this->config->item('salt') . $this->input->post('password1'));
        $role = 0;

        $sql = "INSERT INTO membership (id_number, firstname, lastname, username, email, phone, password)
                            VALUES(" . $id_number . ",
                                   " . $this->db->escape($firstname) . ",
                                   " . $this->db->escape($lastname) . ",
                                   " . $this->db->escape($username) . ",
                                   '" . $email . "',
                                   '" . $phone . "',
                                   '" . $password . "')";
        $query = $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            $this->set_sessions($firstname, $lastname, $username, $email, $phone, $role);
            //$this->send_validation_email();
            return $firstname;
        } else {
            $this->load->library('email');
            $this->email->from('techno206@gmail.com', 'Admin of site');
            $this->email->to('renierdbruyn@hotmail.com');
            $this->email->subject('Problem inserting user into db');

            if (isset($email)) {
                $this->email->message("Unable to Register and isert user with the the email of $email to the database");
            } else {
                $this->email->message("unable to register and insert user into the database");
            }
            $this->email->send();
            return FALSE;
        }
    }

    private function send_validation_email() {
        $email = $this->session->userdata('email');
        $email_code = $this->email_code;

        $this->email->set_mailtype('html');
        $this->email->from($this->config->item('bot_mail'), 'You Choose Recruit');
        $this->email->to('renierdbruyn@hotmail.com');
        $this->email->subject('Please activate your account');

        $message = '<!DOCTYPE html>
            <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta charset="utf-8" />
            <title></title>
            </head>
            <body>';
        $message .= '<p>Dear' . $this->session->userdata('firstname') . ',</p>';
        //the link we send will look like /signup/validate/email@adderss.com/lkjhlkjh234kjhk23hJ34k2kjh
        $message .= '<p>Thanks for creating an account at You Choose Recruit! Please <strong> <a href="' . base_url() . 'login/validate_email/' . $email . '/' . $email_code . '">click here</a></strong> to activate your account. After you have activated your account you will be able to login to your account. </p>';

        $message .= '<p> Thank you! </p>';
        $message .= '<p> The You Choose Recruit Team </p>';
        $message .= '<p> </body></html> </p>';

        $this->email->message($message);
        $this->email->send();
    }

    private function activate_account($email_address) {
        $sql = "UPDATE membership SET  activated = 1 WHERE email = '" . $email_address . "' LIMIT 1";
        $this->db->query($sql);
        if ($this->db->affected_rows() === 1) {
            return TRUE;
        } else {
            //this should never happen
            echo "ERROR when activating your account in the database. Please contact " . $this->config->item('admin_email');
            return FALSE;
        }
    }

    public function validate_email($email_address, $email_code) {
        $sql = "SELECT email, reg_time, firstname FROM membership WHERE email = '{$email_address}' LIMIT 1";
        $query = $this->db->query($sql);
        if (md5((string) $row->reg_time) === 1 && $row->firstname) {
            $query = $this->activate_account($email_address);
            if ($query === true) {
                return TRUE;
            } else {
                //this should never happen
                echo "ERROR when activating your account. Please contact " . $this->config->item('admin_email');
                return FALSE;
            }
        }
    }

    function set_sessions($firstname, $lastname, $username, $email, $phone, $role) {
        $sql = "SELECT id_number, reg_time FROM membership WHERE email = '" . $email . "' LIMIT 1 ";
        $query = $this->db->query($sql);
        $row = $query->row();
        $session_data = array(
            'id_number' => $row->id_number,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
            'logged_in' => FALSE
        );
        $this->email_code = md5((string) $row->reg_time);
        $this->session->set_userdata($session_data);
    }

}

?>
