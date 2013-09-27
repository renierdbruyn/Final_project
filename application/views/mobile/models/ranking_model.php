<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @note_to_Self :  ons sal alles wat in die criteara benodig word in ie job_advert table moet sit
 */
class ranking_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * in controller:
     * if($_post['age'] = $this->ranking_model->age()){
     * echo person details
     * 
     */
    function job_experience() {
//        $sql = "SELECT * FROM  job_list 
//        JOIN job_history
//        ON job_list.job_history_id = job_history.job_history_id";
//        $query = $this->db->query($sql)->result();
//
//        foreach ($query as $row) {
//            $start = $row->start_date;
//            $end = $row->end_date;
//            $id_number = $row->id_number;
//
////            $date = "$day/$month/$year";
////            //explode the date to get month, day and year
//            $start = explode("-", $start);
//            $end = explode("-", $end);
////            //get age from date or birthdate
//            $exp_in_years = (date("md", date("U", mktime(0, 0, 0, $start[2], $start[1], $start[0]))) > date("md", mktime(0, 0, 0, $end[2], $end[1], 0)) ? ((date("Y", mktime(0, 0, 0, 0, 0, $end[0])) - $start[0])) : (date("Y", mktime(0, 0, 0, 0, 0, $end[0])) - $start[0]));
//
//            return $exp_in_years;

        $data = array();
        //get work experience in years
        $sql = "SELECT DISTINCT FLOOR(DATEDIFF(end_date,start_date)/365) AS experience, hist.id_number FROM job_list as job, job_history as hist WHERE hist.job_history_id = job.job_history_id";
        $query = $this->db->query($sql)->result();
        foreach ($query as $key => $row) {
            $id_number = $row->id_number;
            $exp_in_years = $row->experience;
            $data[$key]['id number'] = $id_number;
            $data[$key]['experience'] = $exp_in_years;
        }
    }

    /**
     * in controller:
     * if($_post['experience'] === $this->ranking_model->age()){
     * echo person details
     * 
     */
    function location() {
        $sql = "SELECT * FROM personal";
        $query = $this->db->query($sql)->result();

        foreach ($query as $row) {
            $city = $row->city;
//            $address = $row->address;
//
////            $date = "$day/$month/$year";
////            //explode the date to get month, day and year
//           // $suburb = explode(",", $address);
////            //get age from date or birthdate
        }
        return $city;
    }

    function relocate() {
        $sql = "SELECT * FROM personal";
        $query = $this->db->query($sql)->result();

        foreach ($query as $row) {
            $relocate = $row->relocate;
        }
        return $relocate;
    }

    function get_advert() {
        $sql = "SELECT * FROM job_advert";
        $advert = $this->db->query($sql)->result();
        return $advert;
    }

    function get_advert_by_id() {
        $sql = "SELECT * FROM job_advert WHERE advert_id =(SELECT DISTINCT job_id FROM rank_results WHERE job_id ='{$this->uri->segment(4)}')LIMIT 1";
        $advert = $this->db->query($sql);
        return $advert->result();
    }

    function get_applicant_by_id() {
        $sql = "SELECT * FROM applicant_details 
                WHERE id_number = (SELECT DISTINCT applicant_id 
                                   FROM rank_results 
                                   WHERE applicant_id='{$this->uri->segment(3)}') LIMIT 1";
        $applicant = $this->db->query($sql);
        return $applicant->result();
    }

    function get_rank_results() {
        $sql1 = "SELECT * FROM rank_results";
        $results = $this->db->query($sql1)->num_rows();
        ;
        return $results;
    }

// YEAR(job.end_date) - YEAR(job.start_date) - (DATE_FORMAT(job.end_date, '%m%d') < DATE_FORMAT(job.start_date, '%m%d')) as experience
    function rank() {
        $rank = 0;
        $sql1 = "SELECT * FROM applicant_details";
        $results = $this->db->query($sql1)->result();
        $sql3 = "SELECT * FROM job_advert";
        $job_advert = $this->db->query($sql3)->result();

        foreach ($results as $applicant) {
            $applicant_age = $applicant->age;
            $applicant_id_number = $applicant->id_number;
            $applicant_job_experience = $applicant->job_experience;
            $applicant_industry_type = $applicant->industry_type;
            $applicant_qualification_type = $applicant->qualification_type;
            $applicant_city = $applicant->city;
            $applicant_relocate = $applicant->relocate;
            $applicant_first_name = $applicant->firstname;
            $applicant_phone = $applicant->upro_phone;
            $applicant_min_salary = $applicant->minimum_salary;
            $applicant_prefered_salary = $applicant->preferred_salary;
            $applicant_licence = $applicant->license;
            $applicant_employment_equity = $applicant->employment_equity;
            $applicant_email = $applicant->uacc_email;
            $applicant_gender = $applicant->gender;
            $applicants = array();

            foreach ($job_advert as $advert) {
                $advert_id = $advert->advert_id;
                $job_title = $advert->job_title;
                $salary_offered = $advert->salary_offered;
                $is_negotiable = $advert->negotiable;
                $company_location = $advert->company_location;
                $Job_experience = $advert->required_experience;
                $age = $advert->age_group;
                $male = $advert->male;
                $female = $advert->female;
                $job_industry = $advert->industry_type;
                $emplyment_equity = $advert->employment_equity;
                $qualification_type = $advert->qualification_type;
                $qualification_name = $advert->qualification_name;
                $drivers_licence = $advert->drivers_licence;
                $status = $advert->status;

                if ($age = "b") {
                    $agegroup = "18-23";
                } else if ($age = "c") {
                    $agegroup = "24-30";
                } else if ($age = "d") {
                    $agegroup = "31-40";
                } else if ($age = "e") {
                    $agegroup = "40-1000";
                }
                $agegroups = explode("-", $agegroup);

                if ($age === "any" || $applicant_age >= $agegroups[0] || $applicant_age <= $agegroups[1]) {
                    $applicants[$applicant_id_number] = $rank;
                } else {
                    $applicants[$applicant_id_number] = $rank + 5;
                }
                if ($applicant_industry_type == $job_industry) {
                    $applicants[$applicant_id_number]+=0;
                    if ($applicant_job_experience >= $Job_experience) {
                        $applicants[$applicant_id_number]+=0;
                    } else {
                        $applicants[$applicant_id_number]+=10;
                    }
                } else {
                    $applicants[$applicant_id_number]+=5;
                }
                if ($applicant_qualification_type == $qualification_type) {
                    $applicants[$applicant_id_number]+=0;
                } else {
                    $applicants[$applicant_id_number]+=25;
                }

                if ($applicant_gender < 5000) {
                    $gender = "female";
                } else {
                    $gender = "male";
                }
                if ($male == 1 && $gender = "male") {
                    $applicants[$applicant_id_number]+=0;
                } else if ($female == 1 && $gender = "female") {
                    $applicants[$applicant_id_number]+=0;
                } else if ($male == 0 && $female == 0) {
                    $applicants[$applicant_id_number]+=0;
                } else {
                    $applicants[$applicant_id_number]+=40;
                }
//                if ($applicant_qualification_name == $qualification_name) {
//                    $applicants[$applicant_id_number]+=0;
//                } else {
//                    $applicants[$applicant_id_number]+=30;
//                }

                if ($applicant_licence == $drivers_licence || $applicant_licence != NULL && $drivers_licence != NULL || $applicant_licence == NULL && $drivers_licence == NULL) {
                    $applicants[$applicant_id_number]+=0;

                    if ($applicant_licence != NULL && $drivers_licence = NULL) {
                        $applicants[$applicant_id_number]+=0;
                    }
                } else {
                    $applicants[$applicant_id_number]+=5;
                }
                if ($applicant_industry_type == $job_industry) {
                    $applicants[$applicant_id_number]+=0;
                } else {
                    $applicants[$applicant_id_number]+=30;
                }

                asort($applicants);
                //    $applicants[$applicant_id_number]= array();
                $counter = 1;

                //echo out in table where job name is header... and then display for each job the applicants that qualify
//                echo "<pre>$applicant_first_name,_-_-_-_-$applicant_id_number ranked $applicants[$applicant_id_number] for $job_title &nbsp; contact:<br></pre>";
                if ($applicants[$applicant_id_number] <= 40) {
                    $sql = "INSERT INTO rank_results (applicant_id,job_id,rank)
                    VALUES('{$applicant_id_number}','{$advert_id}','{$applicants[$applicant_id_number]}')
                        ON DUPLICATE KEY UPDATE 
                        applicant_id = '{$applicant_id_number}',
                       job_id = '{$advert_id}',
                       rank = '{$applicants[$applicant_id_number]}'";
                    $this->db->query($sql);
                    mysql_error();
                }

                $sql = "DELETE FROM rank_results 
                            WHERE job_id in (SELECT advert_id FROM job_advert WHERE status =0)";
                $this->db->query($sql);
                mysql_error();




                if ($counter == 10) {
                    break;
                }
                // increase the counter
                $counter++;
            }
        }
        ?>
        <!--        </table>-->
        <?php
    }

    /**
      create table rank_results(
      id int not null auto_increment,
      applicant_id varchar(13) references demo_user_profiles(id_number),
      job_id int references job_advert(advert_id),
      rank int,
      primary key(id,applicant_id,job_id)
      );
     */
    function get_top($job_id) {
        $sql = "SELECT DISTINCT r.rank, a.advert_id AS job_id, a.job_title, d.firstname, d.uacc_email, d.id_number AS app_id
    FROM rank_results AS r 
        INNER JOIN job_advert AS a 
            ON r.job_id = a.advert_id 
        INNER JOIN applicant_details AS d 
            ON r.applicant_id = d.id_number
    WHERE a.advert_id = '{$job_id}'       
    ORDER BY r.rank, d.firstname";
        $results = $this->db->query($sql)->result();
        return $results;
        //var_dump($result);
    }

    function num_applicants() {
        $sql = "SELECT COUNT(DISTINCT rank.applicant_id )as num
               FROM rank_results as rank";
        $results = $this->db->query($sql);
        if ($results->num_rows() > 0) {
            $row = $results->row();
            $number = $row->num;
        }
        return $number + 1;
    }

    function send_applicant_results() {
        $sql = "SELECT * 
                 FROM rank_results AS result
                 LEFT JOIN job_advert AS advert
                 ON result.job_id = advert.advert_id
                 LEFT JOIN applicant_details AS app
                 ON result.applicant_id = app.id_number ";

        $results = $this->db->query($sql)->result();

        foreach ($results as $result) {
            $id_number = $result->applicant_id;
            $email = $result->uacc_email;
            $job_title = $result->job_title;

//            $sql = "SELECT job_id FROM rank_results WHERE applicant_id = '{$id_number}' ";
//            $results = $this->db->query($sql)->result();
            echo "<pre>";
            var_dump($result);
            echo "</pre>";
        }
    }

}

