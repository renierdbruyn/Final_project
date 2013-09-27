<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class AddJobAdvert_model extends CI_Model {

    function add_Advert($data) {
        $this->db->insert('job_advert', $data);
        return;
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

