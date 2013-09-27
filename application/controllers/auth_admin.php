<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth_admin extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (1 == 2) {
            $sections = array(
                'benchmarks' => TRUE, 'memory_usage' => TRUE,
                'config' => FALSE, 'controller_info' => FALSE, 'get' => FALSE, 'post' => FALSE, 'queries' => FALSE,
                'uri_string' => FALSE, 'http_headers' => FALSE, 'session_data' => FALSE
            );
            $this->output->set_profiler_sections($sections);
            $this->output->enable_profiler(TRUE);
        }

        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');

        $this->auth = new stdClass;

        $this->load->library('flexi_auth');

        if (!$this->flexi_auth->is_logged_in_via_password() || !$this->flexi_auth->is_admin()) {
            $this->flexi_auth->set_error_message('You must login as an admin to access this area.', TRUE);
            $this->session->set_flashdata('message', $this->flexi_auth->get_messages());
            redirect('auth');
        }

        $this->load->vars('current_url', $this->uri->uri_to_assoc(1));

        $this->data = null;
    }

    function index() {
        $this->dashboard();
    }

    function dash() {
        $data['view_data'] = '';

        $data['content'] = 'login/admin/dashboard_view';
        $this->load->view('layout/layout', $data);
    }

    function dashboard() {
        $data['message'] = $this->session->flashdata('message'); {
            if ($this->input->post('update_account')) {
                $this->load->model('demo_auth_model');
                $this->demo_auth_model->update_account();
            }

            $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

            $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
            $data['view_data'] = '';

            $data['content'] = 'login/admin/dashboard_view';
            $this->load->view('layout/layout', $data);
        }
    }

    function manage_user_accounts() {
        $this->load->model('demo_auth_admin_model');

        if (!$this->flexi_auth->is_privileged('View Users')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user accounts.</p>');
            redirect('auth_admin');
        }

        if ($this->input->post('search_users') && $this->input->post('search_query')) {
            $search_query = str_replace(' ', '-', $this->input->post('search_query'));

            redirect('auth_admin/manage_user_accounts/search/' . $search_query . '/page/');
        } else if ($this->input->post('update_users') && $this->flexi_auth->is_privileged('Update Users')) {
            $this->demo_auth_admin_model->update_user_accounts();
        }

        $this->demo_auth_admin_model->get_user_accounts();

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/user_acccounts_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function update_user_account($user_id) {
        if (!$this->flexi_auth->is_privileged('Update Users')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to update user accounts.</p>');
            redirect('auth_admin');
        }

        if ($this->input->post('update_users_account')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->update_user_account($user_id);
        }

        $sql_where = array($this->flexi_auth->db_column('user_acc', 'id') => $user_id);
        $data['user'] = $this->flexi_auth->get_users_row_array(FALSE, $sql_where);

        $data['groups'] = $this->flexi_auth->get_groups_array();

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/user_acccounts_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function manage_user_groups() {
        if (!$this->flexi_auth->is_privileged('View User Groups')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user groups.</p>');
            redirect('auth_admin');
        }

        if ($this->input->post('delete_group') && $this->flexi_auth->is_privileged('Delete User Groups')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->manage_user_groups();
        }

        $sql_select = array(
            $this->flexi_auth->db_column('user_group', 'id'),
            $this->flexi_auth->db_column('user_group', 'name'),
            $this->flexi_auth->db_column('user_group', 'description'),
            $this->flexi_auth->db_column('user_group', 'admin')
        );
        $data['user_groups'] = $this->flexi_auth->get_groups_array($sql_select);

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();

                $data['content'] = 'login/admin/user_groups_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function insert_user_group() {
        if (!$this->flexi_auth->is_privileged('Insert User Groups')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to insert new user groups.</p>');
            redirect('auth_admin/manage_user_groups');
        }

        if ($this->input->post('insert_user_group')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->insert_user_group();
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/user_group_insert_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function update_user_group($group_id) {
        if (!$this->flexi_auth->is_privileged('Update User Groups')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to update user groups.</p>');
            redirect('auth_admin/manage_user_groups');
        }

        if ($this->input->post('update_user_group')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->update_user_group($group_id);
        }

        $sql_where = array($this->flexi_auth->db_column('user_group', 'id') => $group_id);
        $data['group'] = $this->flexi_auth->get_groups_row_array(FALSE, $sql_where);

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/user_group_update_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function manage_privileges() {
        if (!$this->flexi_auth->is_privileged('View Privileges')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to view user privileges.</p>');
            redirect('auth_admin');
        }

        if ($this->input->post('delete_privilege') && $this->flexi_auth->is_privileged('Delete Privileges')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->manage_privileges();
        }

        $sql_select = array(
            $this->flexi_auth->db_column('user_privileges', 'id'),
            $this->flexi_auth->db_column('user_privileges', 'name'),
            $this->flexi_auth->db_column('user_privileges', 'description')
        );
        $data['privileges'] = $this->flexi_auth->get_privileges_array($sql_select);

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/privileges_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function insert_privilege() {
        if (!$this->flexi_auth->is_privileged('Insert Privileges')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to insert new user privileges.</p>');
            redirect('auth_admin/manage_privileges');
        }

        if ($this->input->post('insert_privilege')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->insert_privilege();
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/privilege_insert_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function update_privilege($privilege_id) {
        if (!$this->flexi_auth->is_privileged('Update Privileges')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to update user privileges.</p>');
            redirect('auth_admin/manage_privileges');
        }

        if ($this->input->post('update_privilege')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->update_privilege($privilege_id);
        }

        $sql_where = array($this->flexi_auth->db_column('user_privileges', 'id') => $privilege_id);
        $data['privilege'] = $this->flexi_auth->get_privileges_row_array(FALSE, $sql_where);

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/privilege_update_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function update_user_privileges($user_id) {
        if (!$this->flexi_auth->is_privileged('Update Privileges')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to update user privileges.</p>');
            redirect('auth_admin/manage_user_accounts');
        }

        if ($this->input->post('update_user_privilege')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->update_user_privileges($user_id);
        }

        $sql_select = array(
            'upro_uacc_fk',
            'upro_first_name',
            'upro_last_name',
            $this->flexi_auth->db_column('user_acc', 'group_id'),
            $this->flexi_auth->db_column('user_group', 'name')
        );
        $sql_where = array($this->flexi_auth->db_column('user_acc', 'id') => $user_id);
        $data['user'] = $this->flexi_auth->get_users_row_array($sql_select, $sql_where);

        $sql_select = array(
            $this->flexi_auth->db_column('user_privileges', 'id'),
            $this->flexi_auth->db_column('user_privileges', 'name'),
            $this->flexi_auth->db_column('user_privileges', 'description')
        );
        $data['privileges'] = $this->flexi_auth->get_privileges_array($sql_select);

        // Get user groups current privilege data.
        $sql_select = array($this->flexi_auth->db_column('user_privilege_groups', 'privilege_id'));
        $sql_where = array($this->flexi_auth->db_column('user_privilege_groups', 'group_id') => $this->data['user'][$this->flexi_auth->db_column('user_acc', 'group_id')]);
        $group_privileges = $this->flexi_auth->get_user_group_privileges_array($sql_select, $sql_where);

        $data['group_privileges'] = array();
        foreach ($group_privileges as $privilege) {
            $data['group_privileges'][] = $privilege[$this->flexi_auth->db_column('user_privilege_groups', 'privilege_id')];
        }

        $sql_select = array($this->flexi_auth->db_column('user_privilege_users', 'privilege_id'));
        $sql_where = array($this->flexi_auth->db_column('user_privilege_users', 'user_id') => $user_id);
        $user_privileges = $this->flexi_auth->get_user_privileges_array($sql_select, $sql_where);

        $data['user_privileges'] = array();
        foreach ($user_privileges as $privilege) {
            $this->data['user_privileges'][] = $privilege[$this->flexi_auth->db_column('user_privilege_users', 'privilege_id')];
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

        $data['privilege_sources'] = $this->auth->auth_settings['privilege_sources'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/user_privileges_update_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function update_group_privileges($group_id) {
        if (!$this->flexi_auth->is_privileged('Update Privileges')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have access privileges to update group privileges.</p>');
            redirect('auth_admin/manage_user_accounts');
        }

        if ($this->input->post('update_group_privilege')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->update_group_privileges($group_id);
        }

        $sql_where = array($this->flexi_auth->db_column('user_group', 'id') => $group_id);
        $data['group'] = $this->flexi_auth->get_groups_row_array(FALSE, $sql_where);

        $sql_select = array(
            $this->flexi_auth->db_column('user_privileges', 'id'),
            $this->flexi_auth->db_column('user_privileges', 'name'),
            $this->flexi_auth->db_column('user_privileges', 'description')
        );
        $data['privileges'] = $this->flexi_auth->get_privileges_array($sql_select);

        $sql_select = array($this->flexi_auth->db_column('user_privilege_groups', 'privilege_id'));
        $sql_where = array($this->flexi_auth->db_column('user_privilege_groups', 'group_id') => $group_id);
        $group_privileges = $this->flexi_auth->get_user_group_privileges_array($sql_select, $sql_where);

        $data['group_privileges'] = array();
        foreach ($group_privileges as $privilege) {
            $data['group_privileges'][] = $privilege[$this->flexi_auth->db_column('user_privilege_groups', 'privilege_id')];
        }

        $data['message'] = (!isset($this->data['message'])) ? $this->session->flashdata('message') : $this->data['message'];

        $data['privilege_sources'] = $this->auth->auth_settings['privilege_sources'];
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/user_group_privileges_update_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function list_user_status($status = FALSE) {
        if (!$this->flexi_auth->is_privileged('View Users')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user accounts.</p>');
            redirect('auth_admin');
        }

        $data['page_title'] = ($status == 'inactive') ? 'Inactive Users' : 'Active Users';
        $data['status'] = ($status == 'inactive') ? 'inactive_users' : 'active_users'; // Indicate page function.

        $sql_select = array(
            $this->flexi_auth->db_column('user_acc', 'id'),
            $this->flexi_auth->db_column('user_acc', 'email'),
            $this->flexi_auth->db_column('user_acc', 'active'),
            $this->flexi_auth->db_column('user_group', 'name'),
            'upro_first_name',
            'upro_last_name'
        );
        $sql_where[$this->flexi_auth->db_column('user_acc', 'active')] = ($status == 'inactive') ? 0 : 1;
        if (!$this->flexi_auth->in_group('Master Admin')) {
            $sql_where[$this->flexi_auth->db_column('user_group', 'id') . ' !='] = 2;
        }
        $data['users'] = $this->flexi_auth->get_users_array($sql_select, $sql_where);
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/users_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function delete_unactivated_users() {
        if (!$this->flexi_auth->is_privileged('View Users')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view user accounts.</p>');
            redirect('auth_admin');
        }

        $inactive_days = 28;

        if ($this->input->post('delete_unactivated') && $this->flexi_auth->is_privileged('Delete Users')) {
            $this->load->model('demo_auth_admin_model');
            $this->demo_auth_admin_model->delete_users($inactive_days);
        }

        $sql_select = array(
            $this->flexi_auth->db_column('user_acc', 'id'),
            $this->flexi_auth->db_column('user_acc', 'email'),
            $this->flexi_auth->db_column('user_acc', 'active'),
            $this->flexi_auth->db_column('user_group', 'name'),
            'upro_first_name',
            'upro_last_name'
        );
        $data['users'] = $this->flexi_auth->get_unactivated_users_array($inactive_days, $sql_select);
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/users_unactivated_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

    function failed_login_users() {
        if (!$this->flexi_auth->is_privileged('View Users')) {
            $this->session->set_flashdata('message', '<p class="error_msg">You do not have privileges to view this page.</p>');
            redirect('auth_admin');
        }

        $data['page_title'] = 'Failed Login Users';
        $data['status'] = 'failed_login_users';

        $sql_select = array(
            $this->flexi_auth->db_column('user_acc', 'id'),
            $this->flexi_auth->db_column('user_acc', 'email'),
            $this->flexi_auth->db_column('user_acc', 'failed_logins'),
            $this->flexi_auth->db_column('user_acc', 'active'),
            $this->flexi_auth->db_column('user_group', 'name'),
            'upro_first_name',
            'upro_last_name'
        );
        $sql_where[$this->flexi_auth->db_column('user_acc', 'failed_logins') . ' >='] = 3;
        if (!$this->flexi_auth->in_group('Master Admin')) {
            $sql_where[$this->flexi_auth->db_column('user_group', 'id') . ' !='] = 2;
        }
        $data['users'] = $this->flexi_auth->get_users_array($sql_select, $sql_where);
        $data['view_data'] = ''; {
            $data['message'] = $this->session->flashdata('message'); {
                if ($this->input->post('update_account')) {
                    $this->load->model('demo_auth_model');
                    $this->demo_auth_model->update_account();
                }

                $data['user'] = $this->flexi_auth->get_user_by_identity_row_array();


                $data['content'] = 'login/admin/users_view';
                $this->load->view('layout/layout', $data);
            }
        }
    }

}

