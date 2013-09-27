<style>
    table{
        width:100%;
    }
</style>
<?php
        $job_advert = $this->ranking_model->get_advert();
         $num = $this->ranking_model->num_applicants();
         
        ?>

        <?php
       
        foreach ($job_advert as $key =>$j) {
            $job_id = $j->advert_id;
            $job_title = $j->job_title;
            $results = $this->ranking_model->get_top($job_id);
        //echo $applicnts;
            ?>
<!--                <tr>
                    <td colspan="5" rowspan=""></td>
                </tr>-->
                <?php if(!empty($results)){ ?>
                <table border=1 width="100%" >
                    <tr> 
                        
                        <th colspan="5" rowspan ="<?php echo $num?>" width="30%">
                            <?php // echo $job_id ?><!--)--><?php echo $job_title; ?>
                        </th>
                       
                        <th width="25%">
                            APPLICANT NAME
                        </th>
                        <th width="25%">
                            APPLICANT EMAIL
                        </th>
                        <th width="5%">
                            RANK
                        </th>
                        <th >
                            MORE DETAILS
                        </th>
                        <th>
                            CONTACT VIA EMAIL
                        </th>
                    </tr>
 

                    <?php
                    

                    foreach ($results as $key => $job) {
                        $firstname = $job->firstname;
                        $this->db->escape($email = $job->uacc_email);
                        $rank = $job->rank;
                        $id_number = $job->app_id;
                        crypt($email);
//                         $num = count($key);
//                         echo $num;
                        ?>
                        <tr > 

                            <td>
                                <?php echo $firstname; ?>
                            </td>
                            <td>
                                <?php echo $email; ?>
                            </td>
                            <td>
                                <?php echo $rank; ?>
                            <td>
                                <?php echo anchor("ranking/display_details/$id_number/$job_id", "Details"); ?>
                            </td>
                            <td>
                                <?php echo "<a href=\"mailto:".$email."?subject=Job\">Contact<a>"; ?>
                            </td>
                        </tr>
                    

                    <?php
                }
                ?> </table> <?php 
                
                    }
        }
        //return $results;

        ?>
<!--        <table border=1>
        <tr> 
            <th>
                JOB TITLE
            </th>
            <th>
                APPLICANT NAME
            </th>
            <th>
                APPLICANT EMAIL
            </th>
            <th>
                RANK
            </th>
            <th>
                MORE DETAILS
            </th>
            <th>
                CONTACT VIA EMAIL
            </th>
        </tr>-->
        <?php
        // echo isset($result) ? $result : NULL;
//        
//        foreach ($results as $key => $job) {
//            //print_r($key);
//            $num = count($job);
//            for ($i = 0; $i < $num; $i++) {
                ?>
<!--                <tr> 

                    <td>
                        <?php //echo $job[$i]->firstname; ?>
                    </td>
                    <td>
                        <?php //echo $job[$i]->uacc_email ?>
                    </td>
                    <td>
                        <?php //echo $job[$i]->rank; ?>
                    <td>
                        <?php //echo $job[$i]->job_id;   ?>
                    </td>
                    <td>
                        <?php //echo "<a href=\"mailto:" . $job[$i]->uacc_email . "?subject=hello\">Contact<a>" ?>
                    </td>
                </tr>-->
                <?php
//           if($i> $key)
////            exit();
//            }
//        }
//        
    
    ?>




































<!--<link rel="stylesheet" href="<?php //echo base_url();           ?>assets/css/chosen.css">
<style>
    select{
        height: 100px;
    }
    multiple{
        height: 100px;
    }
</style>


    CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicant_details` AS 
    select ((year(curdate()) - year(cast(concat(left(`member`.`id_number`,2),'-',substr(`member`.`id_number`,3,2),'-',substr(`member`.`id_number`,5,2)) as date))) - (date_format(curdate(),'%m%d') < date_format(cast(concat(left(`member`.`id_number`,2),'-',substr(`member`.`id_number`,3,2),'-',substr(`member`.`id_number`,5,2)) as date),'%m%d'))) AS `age`,
    `member`.`id_number` AS `id_number`,
    ((year(`job_history`.`end_date`) - year(`job_history`.`start_date`)) - (date_format(`job_history`.`end_date`,'%m%d') < date_format(`job_history`.`start_date`,'%m%d'))) AS `job_experience`,
    `job_history`.`industry_type` AS `industry_type`,
    `tertiary`.`type` AS `qualification_type`,
    `member`.`upro_phone` AS `upro_phone`,
    `member`.`upro_first_name` AS `firstname`,
    `personal`.`city` AS `city`,`personal`.`relocate` AS `relocate`,
    `personal`.`minimum_salary` AS `minimum_salary`,
    `personal`.`preferred_salary` AS `preferred_salary`,
    `personal`.`license` AS `license`,
    `personal`.`employment_equity` AS `employment_equity`,
    `user_accounts`.`uacc_email` AS `uacc_email` 
    from (((((`demo_user_profiles` `member` 
    left join `job_history` on((`member`.`id_number` = `job_history`.`id_number`))) 
    left join `personal` on((`member`.`id_number` = `personal`.`id_number`))) 
    left join `tertiary` on((`member`.`id_number` = `tertiary`.`id_number`))) 
    left join `tertiary_subjects` on((`tertiary`.`id_number` = `tertiary_subjects`.`id_number`))) 
    left join `user_accounts` on((`member`.`upro_uacc_fk` = `user_accounts`.`uacc_id`)));


    <?php
    /**
      CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicant_details` AS select ((year(curdate()) - year(cast(concat(left(`member`.`id_number`,2),'-',substr(`member`.`id_number`,3,2),'-',substr(`member`.`id_number`,5,2)) as date))) - (date_format(curdate(),'%m%d') < date_format(cast(concat(left(`member`.`id_number`,2),'-',substr(`member`.`id_number`,3,2),'-',substr(`member`.`id_number`,5,2)) as date),'%m%d'))) AS `age`,
      `member`.`id_number` AS `id_number`,
      ((year(`job_list`.`end_date`) - year(`job_list`.`start_date`)) - (date_format(`job_list`.`end_date`,'%m%d') < date_format(`job_list`.`start_date`,'%m%d'))) AS `job_experience`,
      `job_list`.`industry_type` AS `industry_type`,
      `skills`.`skill_name` AS `skill_name`,
      `skills`.`skill_level` AS `skill_level`,`skills`.`experience` AS `experience`,
      `institution`.`qualification_type` AS `qualification_type`,
      `member`.`firstname` AS `firstname`,`personal`.`city` AS `city`,
      `personal`.`relocate` AS `relocate`
      from (((((((`membership` `member`
      left join `job_history`
      on((`member`.`id_number` = `job_history`.`id_number`)))
      left join `job_list`
      on((`job_history`.`job_history_id` = `job_list`.`job_history_id`)))
      left join `personal`
      on((`member`.`id_number` = `personal`.`id_number`)))
      left join `skills`
      on((`member`.`id_number` = `skills`.`id_number`)))
      left join `tertiary`
      on((`skills`.`id_number` = `tertiary`.`id_number`)))
      left join `institution`
      on((`tertiary`.`tertiary_id` = `institution`.`tertiary_id`)))
      left join `tertiary_subject`
      on((`institution`.`institution_id` = `tertiary_subject`.`istitution_id`)));
     * */
    /**
      CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applicant_details` AS
      select ((year(curdate()) - year(cast(concat(left(`member`.`id_number`,2),'-',substr(`member`.`id_number`,3,2),'-',substr(`member`.`id_number`,5,2)) as date))) - (date_format(curdate(),'%m%d') < date_format(cast(concat(left(`member`.`id_number`,2),'-',substr(`member`.`id_number`,3,2),'-',substr(`member`.`id_number`,5,2)) as date),'%m%d'))) AS `age`,
      `member`.`id_number` AS `id_number`,
      ((year(`job_history`.`end_date`) - year(`job_history`.`start_date`)) - (date_format(`job_history`.`end_date`,'%m%d') < date_format(`job_history`.`start_date`,'%m%d'))) AS `job_experience`,
      `job_history`.`industry_type` AS `industry_type`,
      `tertiary`.`type` AS `qualification_type`,
      member.upro_phone,
      `member`.`upro_first_name` AS `firstname`,
      `personal`.`city` AS `city`,
      `personal`.`relocate` AS `relocate`,
      personal.minimum_salary,
      personal.preferred_salary,
      personal.license,
      personal.employment_equity,
      user_accounts.uacc_email

      from demo_user_profiles as member
      left join `job_history`
      on `member`.`id_number` = `job_history`.`id_number`
      left join `personal`
      on`member`.`id_number` = `personal`.`id_number`
      left join `tertiary`
      on`member`.`id_number` = `tertiary`.`id_number`
      left join `tertiary_subjects`
      on`tertiary`.`id_number` = `tertiary_subjects`.`id_number`
      LEFT JOIN  user_accounts
      ON member.upro_uacc_fk = user_accounts.uacc_id ;
     */
    ?>

    <form name="multi" action="ranking/rank">

        <select data-placeholder="Choose qualification type" multiple class="chosen-select-no-results" name="q_t[]" style="width:350px;" tabindex="2">
            <OPTION VALUE="NULL">Choose qualification type</OPTION>
            <OPTION VALUE="Advanced Certificate">Advanced Certificate</OPTION>
            <OPTION VALUE="Advanced Diploma">Advanced Diploma</OPTION>
            <OPTION VALUE="B Tech">B Tech</OPTION>
            <OPTION VALUE="Certificate">Certificate (HEQCIS)</OPTION>
            <OPTION VALUE="Diploma">Diploma</OPTION>
            <OPTION VALUE="Doctoral Degree">Doctoral Degree</OPTION>
            <OPTION VALUE="D Tech">D Tech</OPTION>
            <OPTION VALUE="Foundational Learning Certificate">Foundational Learning Certificate</OPTION>
            <OPTION VALUE="Further Diploma">Further Diploma</OPTION>
            <OPTION VALUE="Further Education and Training Certificate">Further Education and Training Certificate</OPTION>
            <OPTION VALUE="Higher Certificate">Higher Certificate</OPTION>
            <OPTION VALUE="Honours Degree">Honours Degree</OPTION>
            <OPTION VALUE="Masters Degree">Masters Degree</OPTION>
            <OPTION VALUE="M Tech">M Tech</OPTION>
            <OPTION VALUE="National Certificate">National Certificate</OPTION>
            <OPTION VALUE="National Diploma">National Diploma</OPTION>
            <OPTION VALUE="National First Degree">National First Degree</OPTION>
            <OPTION VALUE="National First Degree">National First Degree(Min 480)</OPTION>
            <OPTION VALUE="National Higher Certificate">National Higher Certificate</OPTION>
            <OPTION VALUE="National Higher Diploma">National Higher Diploma</OPTION>
            <OPTION VALUE="National Masters Diploma">National Masters Diploma</OPTION>
            <OPTION VALUE="National N Certificate">National N Certificate</OPTION>
            <OPTION VALUE="National N Diploma">National N Diploma</OPTION>
            <OPTION VALUE="Post Graduate Bachelor Degree">Post Graduate Bachelor Degree (eg B.Ed)</OPTION>
            <OPTION VALUE="Post Dip Diploma">Post Dip Diploma</OPTION>
            <OPTION VALUE="Post Graduate Diploma">Post Graduate Diploma</OPTION>
            <OPTION VALUE="Post-basic Diploma">Post-basic Diploma</OPTION>
            <OPTION VALUE="Post-doctoral Degree">Post-doctoral Degree</OPTION>
            <OPTION VALUE="Professional First Degree (Min 360)">Professional First Degree (Min 360)</OPTION>
            <OPTION VALUE="Professional Qualification">Professional Qualification</OPTION>
            <OPTION VALUE="Professional Registration">Professional Registration</OPTION>
            <OPTION VALUE="Qualification at National Senior Certificate level">Qualification at National Senior Certificate level</OPTION>
            <OPTION VALUE="not fully qualified">School below Senior Certificate: not fully qualified</OPTION>
            <OPTION VALUE="Senior Certificate">Senior Certificate</OPTION>

        </SELECT>
        <select data-placeholder="Choose qualification type" multiple class="chosen-select-no-results" name ="q_n[]" style="width:350px;" tabindex="11">
            Â Â <option value="Advanced Certificate in Education â€“ ACE">Advanced Certificate in Education â€“ ACE</option>
            Â Â <option value="National Professional Diploma in Education â€“ NPDE">National Professional Diploma in Education â€“ NPDE</option>
            Â Â <option value="Postgraduate Certificate in Education - PGCE">Postgraduate Certificate in Education - PGCE</option>
            Â Â <option value="Bachelor of Education - Hons B.Ed">Bachelor of Education - Hons B.Ed</option>
            Â Â <option value="Master of Education - M.Ed">Master of Education - M.Ed</option>
            Â Â <option value="Doctor of Philosophy - PhD">Doctor of Philosophy - PhD</option>
            Â Â <option value="Bachelor of Arts in Communication - BA Com">Bachelor of Arts in Communication - BA Com</option>
            Â Â <option value="Bachelor of Arts (Social Work) - BA SW">Bachelor of Arts (Social Work) - BA SW</option>
            Â Â <option value="Bachelor of Arts (Conservation, Tourism, and Sustainable Development) - BA (CTSD)">Bachelor of Arts (Conservation, Tourism, and Sustainable Development) - BA (CTSD)</option>
            Â Â <option value="Bachelor of Arts (Indigenous Knowledge Systems) - BA (IKS)">Bachelor of Arts (Indigenous Knowledge Systems) - BA (IKS)</option>
            Â Â <option value="Bachelor of Arts (Peace Studies and International Relations) - BA (PEC)">Bachelor of Arts (Peace Studies and International Relations) - BA (PEC)</option>
            Â Â <option value="Bachelor of Social Science - B Soc Sc">Bachelor of Social Science - B Soc Sc</option>
            Â Â <option value="Bachelor of Arts (Honours) - BA (Hons)">Bachelor of Arts (Honours) - BA (Hons)</option>
            Â Â <option value="Bachelor of Arts (Honours) in Communication - BA Com (Hons)">Bachelor of Arts (Honours) in Communication - BA Com (Hons)</option>
            Â Â <option value="Bachelor of Arts (Honours) in Translation and Interpreting - BA Hons (Trans & Interpr)">Bachelor of Arts (Honours) in Translation and Interpreting - BA Hons (Trans & Interpr)</option>
            Â Â <option value="Bachelor of Social Science (Honours) - B Soc Sc (Hons)">Bachelor of Social Science (Honours) - B Soc Sc (Hons)</option>
            Â Â <option value="Bachelor of Arts (Honours) in Theology - BA Hons (Theology)">Bachelor of Arts (Honours) in Theology - BA Hons (Theology)</option>
            Â Â <option value="Master of Arts (by Course Work) - MA">Master of Arts (by Course Work) - MA</option>
            Â Â <option value="Master of Arts in Applied Communication - MA (App. Com)">Master of Arts in Applied Communication - MA (App. Com)</option>
            Â Â <option value="Master of Arts in Indigenous Knowledge Systems - MA (IKS)">Master of Arts in Indigenous Knowledge Systems - MA (IKS)</option>
            Â Â <option value="Master of Arts in Peace Studies and International Relations- MA (PEC)">Master of Arts in Peace Studies and International Relations- MA (PEC)</option>
            Â Â <option value="Master of Arts (Social Work) - MSW">Master of Arts (Social Work) - MSW</option>
            Â Â <option value="Master of Philosophy - M Phil">Master of Philosophy - M Phil</option>
            Â Â <option value="Master of Social Science - M Soc Sc">Master of Social Science - M Soc Sc</option>
            Â Â <option value="Master of Social Science (by Course Work) - M Soc Sc">Master of Social Science (by Course Work) - M Soc Sc</option>
            Â Â <option value="Master of Social Science (Clinical Psychology) - M Soc Sc (CP)">Master of Social Science (Clinical Psychology) - M Soc Sc (CP)</option>
            Â Â <option value="Master of Theology - MTh">Master of Theology - MTh</option>
            Â Â <option value="Doctor of Literature - DLitt">Doctor of Literature - DLitt</option>
            Â Â <option value="Doctor of Philosophy - PhD">Doctor of Philosophy - PhD</option>
            Â Â <option value="Doctor of Theology - PhD">Doctor of Theology - PhD</option>
            Â Â <option value="Bachelor of Law (LLB)">Bachelor of Law (LLB)</option>
            Â Â <option value="Bachelor of Laws">Bachelor of Laws</option>
            Â Â <option value="Master of Laws (Dissertation)">Master of Laws (Dissertation)</option>
            Â Â <option value="Master of Laws (Labour and Social Security Law)">Master of Laws (Labour and Social Security Law)</option>
            Â Â <option value="Master of Philosophy (MPhil)">Master of Philosophy (MPhil)</option>
            Â Â <option value="Doctor of Laws (LLD)">Doctor of Laws (LLD)</option>
            Â Â <option value="Doctor of Philosophy (PhD)">Doctor of Philosophy (PhD)</option>
            Â Â <option value="Diploma in Agric Crop Science">Diploma in Agric Crop Science</option>
            Â Â <option value="Diploma in Animal Health">Diploma in Animal Health</option>
            Â Â <option value="Diploma in Animal Science">Diploma in Animal Science</option>
            Â Â <option value="Bachelor of Nursing (BN)">Bachelor of Nursing (BN)</option>
            Â Â <option value="Bachelor of Nursing Science (BNSc)">Bachelor of Nursing Science (BNSc)</option>
            Â Â <option value="Bachelor of Science in Agriculture (Animal Science) - BSc Agric (Animal Sci)">Bachelor of Science in Agriculture (Animal Science) - BSc Agric (Animal Sci)</option>
            Â Â <option value="Bachelor of Science in Agriculture (Agric Economics) - BSc Agric (Agric Economics)">Bachelor of Science in Agriculture (Agric Economics) - BSc Agric (Agric Economics)</option>
            Â Â <option value="Bachelor of Science in Agriculture (Animal Health) - BSc Agric (Animal Health)">Bachelor of Science in Agriculture (Animal Health) - BSc Agric (Animal Health)</option>
            Â Â <option value="Bachelor of Science in Agriculture (Crop Science) - BSc Agric (Crop Sci)">Bachelor of Science in Agriculture (Crop Science) - BSc Agric (Crop Sci)</option>
            Â Â <option value="Bachelor of Science (Land Management) - BSc (Land Management)">Bachelor of Science (Land Management) - BSc (Land Management)</option>
            Â Â <option value="Postgraduate Diploma in Agricultural Economics and Management - PGD (Agriculture)">Postgraduate Diploma in Agricultural Economics and Management - PGD (Agriculture)</option>
            Â Â <option value="Postgraduate Diploma in Agricultural Extension - PGD (Agric Ext)">Postgraduate Diploma in Agricultural Extension - PGD (Agric Ext)</option>
            Â Â <option value="Bachelor of Nursing Science (Honours) - BNSc Hons">Bachelor of Nursing Science (Honours) - BNSc Hons</option>
            Â Â <option value="Bachelor of Science (Honours) (Agricultural Economics and Management) - BSc Agric">Bachelor of Science (Honours) (Agricultural Economics and Management) - BSc Agric</option>
            Â Â <option value="Hons (Agric Econ & Man)">Hons (Agric Econ & Man)</option>
            Â Â <option value="Bachelor of Science (Honours) (Agricultural Extension) - BSc Agric Hons (Agric Ext)">Bachelor of Science (Honours) (Agricultural Extension) - BSc Agric Hons (Agric Ext)</option>
            Â Â <option value="Bachelor of Science (Honours) in Agriculture (Animal Science) - BSc Hons (Animal Sci)">Bachelor of Science (Honours) in Agriculture (Animal Science) - BSc Hons (Animal Sci)</option>
            Â Â <option value="Bachelor of Science (Honours) in Agriculture (Crop Science) - BSc Hons (Crop Sci)">Bachelor of Science (Honours) in Agriculture (Crop Science) - BSc Hons (Crop Sci)</option>
            Â Â <option value="Bachelor of Science (Honours) in Agriculture (Animal Health) - BSc Hons (Animal Health)">Bachelor of Science (Honours) in Agriculture (Animal Health) - BSc Hons (Animal Health)</option>
            Â Â <option value="Bachelor of Science (Honours) in Land Management - BSc Hons (Land Management)">Bachelor of Science (Honours) in Land Management - BSc Hons (Land Management)</option>
            Â Â <option value="Master of Science in Agriculture - MSc (Agric)">Master of Science in Agriculture - MSc (Agric)</option>
            Â Â <option value="Master of Science (Applied Radiation Science and Technology) - MSc (ARST)">Master of Science (Applied Radiation Science and Technology) - MSc (ARST)</option>
            Â Â <option value="Doctor of Philosophy - PhD">Doctor of Philosophy - PhD</option>
            Â Â <option value="Doctor of Science - DSc">Doctor of Science - DSc</option>
            Â Â <option value="Doctor of Philosophy (Agriculture) - PhD (Agric)">Doctor of Philosophy (Agriculture) - PhD (Agric)</option>
            Â Â <option value="BCom Chartered Accountancy (CA (SA))">BCom Chartered Accountancy (CA (SA))</option>
            Â Â <option value="Extended BCom Chartered Accountancy (CA (SA))">Extended BCom Chartered Accountancy (CA (SA))</option>
            Â Â <option value="BCom Financial Accountancy (SAIPA)">BCom Financial Accountancy (SAIPA)</option>
            Â Â <option value="BCom Management Accountancy">BCom Management Accountancy</option>
            Â Â <option value="BCom Accounting">BCom Accounting</option>
            Â Â <option value="BCom Accounting and Informatics">BCom Accounting and Informatics</option>
            Â Â <option value="BCom Economics and Informatics">BCom Economics and Informatics</option>
            Â Â <option value="BCom Economics and International Trade">BCom Economics and International Trade</option>
            Â Â <option value="BCom Economics and Bank Risk Management">BCom Economics and Bank Risk Management</option>
            Â Â <option value="BCom Economics, Bank Risk Management and Investment">BCom Economics, Bank Risk Management and Investment</option>
            Â Â <option value="BCom Business Management">BCom Business Management</option>
            Â Â <option value="BCom Marketing Management">BCom Marketing Management</option>
            Â Â <option value="BSc in IT">BSc in IT</option>
            Â Â <option value="BSc Computer Science and Economics">BSc Computer Science and Economics</option>
            Â Â <option value="BSc Computer Science and Statistics">BSc Computer Science and Statistics</option>
            Â Â <option value="Extended BSc in IT">Extended BSc in IT</option>
            Â Â <option value="Extended BSc in Data Mining">Extended BSc in Data Mining</option>
            Â Â <option value="BSc Quantitative Risk Management">BSc Quantitative Risk Management</option>
            Â Â <option value="BSc Financial Mathematics">BSc Financial Mathematics</option>
            Â Â <option value="BSc Data Mining / Business Intelligence">BSc Data Mining / Business Intelligence</option>
            Â Â <option value="Honours BCom Chartered Accountancy (CA (SA))">Honours BCom Chartered Accountancy (CA (SA))</option>
            Â Â <option value="Honours BSc Information Technology">Honours BSc Information Technology</option>
            Â Â <option value="Honours BCom Economics">Honours BCom Economics</option>
            Â Â <option value="Honours BCom Economics and Bank Risk Management">Honours BCom Economics and Bank Risk Management</option>
            Â Â <option value="Honours BCom Business Management">Honours BCom Business Management</option>
            Â Â <option value="Honours BCom Marketing Management">Honours BCom Marketing Management </option>
            Â Â <option value="MCom Accountancy">MCom Accountancy</option>
            Â Â <option value="MCom Business Management">MCom Business Management</option>
            Â Â <option value="MCom Marketing Management">MCom Marketing Management</option>
            Â Â <option value="MCom Economics">MCom Economics</option>
            Â Â <option value="MSc Information Technology">MSc Information Technology</option>
            Â Â <option value="MSc Operational Research">MSc Operational Research</option>
            Â Â <option value="PhD Accountancy">PhD Accountancy</option>
            Â Â <option value="PhD Bank Risk Business Management">PhD Bank Risk Business Management</option>
            Â Â <option value="PhD Marketing Management">PhD Marketing Management</option>
            Â Â <option value="PhD Economics">PhD Economics</option>
            Â Â <option value="PhD Information Technology">PhD Information Technology</option>
            Â Â <option value="PhD Operational Research">PhD Operational Research</option>
            Â Â <option value="Diploma in Sport Science">Diploma in Sport Science</option>
            Â Â <option value="Certificate in Marketing">Certificate in Marketing</option>
            Â Â <option value="Advanced Certificate in Marketing">Advanced Certificate in Marketing</option>
            Â Â <option value="Certificate in Financial Management">Certificate in Financial Management</option>
            Â Â <option value="Management Skills 1">Management Skills 1</option>
            Â Â <option value="Management Skills 2">Management Skills 2</option>
            Â Â <option value="Diploma in Sports Science">Diploma in Sports Science	</option>
            Â Â <option value="BEng (Chemical Engineering)">BEng (Chemical Engineering)</option>
            Â Â <option value="BEng (Civil Engineering)">BEng (Civil Engineering)</option>
            Â Â <option value="BEng (Computer Engineering)">BEng (Computer Engineering)</option>
            Â Â <option value="BEng (Electrical Engineering)">BEng (Electrical Engineering)</option>
            Â Â <option value="BEng (Electronic Engineering)">BEng (Electronic Engineering)</option>
            Â Â <option value="BEng (Industrial Engineering)">BEng (Industrial Engineering)</option>
            Â Â <option value="BEng (Mechanical Engineering)">BEng (Mechanical Engineering)</option>
            Â Â <option value="BEng (Metallurgical Engineering)">BEng (Metallurgical Engineering)</option>
            Â Â <option value="BEng (Mining Engineering)">BEng (Mining Engineering)</option>
            Â Â <option value="BIS (Information Science)">BIS (Information Science)</option>
            Â Â <option value="BIS in Multimedia (Four Year Programme)">BIS in Multimedia (Four Year Programme)</option>
            Â Â <option value="BIS (Multimedia)">BIS (Multimedia)</option>
            Â Â <option value="BIS (Publishing)">BIS (Publishing)</option>
            Â Â <option value="BIT - Bachelor of Information Technology">BIT - Bachelor of Information Technology	</option>
            Â Â <option value="BScArch - Bachelor of Science Architecture">BScArch - Bachelor of Science Architecture	</option>
            Â Â <option value="BSc (Computer Science)">BSc (Computer Science)</option>
            Â Â <option value="BSc - Construction Management">BSc - Construction Management</option>
            Â Â <option value="BScInt - Bachelor of Science Interior Architecture">BScInt - Bachelor of Science Interior Architecture</option>
            Â Â <option value="BScIT (Information and Knowledge Systems)">BScIT (Information and Knowledge Systems)</option>
            Â Â <option value="BScIT (Information and Knowledge Systems) (Four Year Programme)">BScIT (Information and Knowledge Systems) (Four Year Programme)</option>
            Â Â <option value="BScLArch - Bachelor of Science Landscape Architecture">BScLArch - Bachelor of Science Landscape Architecture</option>
            Â Â <option value="BScQS - Bachelor of Science Quantity Surveying">BScQS - Bachelor of Science Quantity Surveying</option>
            Â Â <option value="BSc Real Estate">BSc Real Estate</option>
            Â Â <option value="BT&RP - Bachelor of Town and Regional Planning">BT&RP - Bachelor of Town and Regional Planning</option>
            Â Â <option value="Engineering Augmented Degree Programme (ENGAGE)">Engineering Augmented Degree Programme (ENGAGE)</option>
            Â Â <option value="new">new</option>
            Â Â <option value="BAdmin (International Relations)">BAdmin (International Relations)</option>
            Â Â <option value="BAdmin (Public Management)">BAdmin (Public Management)</option>
            Â Â <option value="BAdmin (Public Management) Option: Public Administration">BAdmin (Public Management) Option: Public Administration	</option>
            Â Â <option value="BCom (Agribusiness Management)">BCom (Agribusiness Management)</option>
            Â Â <option value="BCom (Business Management)">BCom (Business Management)</option>
            Â Â <option value="BCom (Communication Management)">BCom (Communication Management)</option>
            Â Â <option value="BCom (Econometrics)">BCom (Econometrics)</option>
            Â Â <option value="BCom (Entrepreneurship)">BCom (Entrepreneurship)</option>
            Â Â <option value="BCom (Extended programme)">BCom (Extended programme)</option>
            Â Â <option value="BCom (Financial Sciences)">BCom (Financial Sciences)</option>
            Â Â <option value="BCom (Human Resource Management)">BCom (Human Resource Management)	</option>
            Â Â <option value="BCom (Informatics)">BCom (Informatics)</option>
            Â Â <option value="BCom (Investment Management)">BCom (Investment Management)</option>
            Â Â <option value="BCom (Law)">BCom (Law)</option>
            Â Â <option value="BCom Option: Supply Chain Management">BCom Option: Supply Chain Management	</option>
            Â Â <option value="BCom (Recreation and Sport Management)">BCom (Recreation and Sport Management)</option>
            Â Â <option value="BCom (Statistics)">BCom (Statistics)</option>
            Â Â <option value="BCom (Tourism Management)">BCom (Tourism Management)	</option>
            Â Â <option value="BEd (Early Childhood Development and Foundation Phase)">BEd (Early Childhood Development and Foundation Phase)</option>
            Â Â <option value="BEd (FET) (Economic and Management Sciences)">BEd (FET) (Economic and Management Sciences)</option>
            Â Â <option value="BEd (FET) (General)">BEd (FET) (General)</option>
            Â Â <option value="BEd (FET) (Human Movement Science and Sport Management)">BEd (FET) (Human Movement Science and Sport Management)</option>
            Â Â <option value="BEd (FET) (Natural Sciences)">BEd (FET) (Natural Sciences)</option>
            Â Â <option value="BEd (Intermediate Phase)">BEd (Intermediate Phase)</option>
            Â Â <option value="BEd (Senior Phase)">BEd (Senior Phase)	</option>
            Â Â <option value="BChD - Bachelor of Dentistry">BChD - Bachelor of Dentistry</option>
            Â Â <option value="BClinical Medical Practice â€“ Bachelor of Clinical Medical Practice">BClinical Medical Practice â€“ Bachelor of Clinical Medical Practice</option>
            Â Â <option value="BCur â€“ Bachelor of Nursing Science">BCur â€“ Bachelor of Nursing Science</option>
            Â Â <option value="BCur (I et A) Education and Administration">BCur (I et A) Education and Administration</option>
            Â Â <option value="BDietetics â€“ Bachelor of Dietetics">BDietetics â€“ Bachelor of Dietetics</option>
            Â Â <option value="BOccTher â€“ Bachelor of Occupational Therapy">BOccTher â€“ Bachelor of Occupational Therapy</option>
            Â Â <option value="BOH â€“ Bachelor of Oral Hygiene">BOH â€“ Bachelor of Oral Hygiene</option>
            Â Â <option value="BPhysT â€“ Bachelor of Physiotherapy">BPhysT â€“ Bachelor of Physiotherapy</option>
            Â Â <option value="BRad - Bachelor of Radiography">BRad - Bachelor of Radiography</option>
            Â Â <option value="MBChB â€“ Bachelor of Medicine and Surgery">MBChB â€“ Bachelor of Medicine and Surgery</option>
            Â Â <option value="BA (Drama)">BA (Drama)</option>
            Â Â <option value="BA (Extended programme)">BA (Extended programme)</option>
            Â Â <option value="BA (Fine Arts)">BA (Fine Arts)</option>
            Â Â <option value="BA - General">BA - General</option>
            Â Â <option value="BA - General (Psychology)">BA - General (Psychology)</option>
            Â Â <option value="BA (Human Movement Science)">BA (Human Movement Science)</option>
            Â Â <option value="BA Human Movement Science Option: Sports Psychology">BA Human Movement Science Option: Sports Psychology</option>
            Â Â <option value="BA (Information Design)">BA (Information Design)</option>
            Â Â <option value="BA Languages (English Studies)">BA Languages (English Studies)</option>
            Â Â <option value="BA (Music)">BA (Music)</option>
            Â Â <option value="BA (Visual Studies)">BA (Visual Studies)</option>
            Â Â <option value="BCommunication Pathology (Audiology)">BCommunication Pathology (Audiology)</option>
            Â Â <option value="BCommunication Pathology (Speech-Language Pathology)">BCommunication Pathology (Speech-Language Pathology)</option>
            Â Â <option value="BHCS (Heritage and Cultural Tourism)">BHCS (Heritage and Cultural Tourism)</option>
            Â Â <option value="BMus - Bachelor of Music">BMus - Bachelor of Music</option>
            Â Â <option value="BPolSci (International Studies)">BPolSci (International Studies)</option>
            Â Â <option value="BPolSci (Political Studies)">BPolSci (Political Studies)</option>
            Â Â <option value="BSocSci (Industrial Sociology and Labour Studies)">BSocSci (Industrial Sociology and Labour Studies)</option>
            Â Â <option value="BSportSci - Bachelor of Sports Sciences">BSportSci - Bachelor of Sports Sciences</option>
            Â Â <option value="BSport Sciences with Option Golf">BSport Sciences with Option Golf</option>
            Â Â <option value="BSW - Bachelor of Social Work">BSW - Bachelor of Social Work</option>
            Â Â <option value="BConsumer Science (Clothing: Retail Management)">BConsumer Science (Clothing: Retail Management)</option>
            Â Â <option value="BConsumer Science (Foods: Retail Management)">BConsumer Science (Foods: Retail Management)</option>
            Â Â <option value="BConsumer Science (Hospitality Management)">BConsumer Science (Hospitality Management)</option>
            Â Â <option value="BSc (Actuarial and Financial Mathematics)">BSc (Actuarial and Financial Mathematics)</option>
            Â Â <option value="BScAgric (Agricultural Economics/Agribusiness Management)">BScAgric (Agricultural Economics/Agribusiness Management)</option>
            Â Â <option value="BScAgric (Animal Science)">BScAgric (Animal Science)</option>
            Â Â <option value="BScAgric (Animal Science/Pasture Science)">BScAgric (Animal Science/Pasture Science)</option>
            Â Â <option value="BScAgric (Applied Plant and Soil Sciences)">BScAgric (Applied Plant and Soil Sciences)</option>
            Â Â <option value="BScAgric (Food Science and Technology)">BScAgric (Food Science and Technology)</option>
            Â Â <option value="BScAgric (Plant Pathology)">BScAgric (Plant Pathology)</option>
            Â Â <option value="BSc (Applied Mathematics)">BSc (Applied Mathematics)</option>
            Â Â <option value="BSc (Biochemistry)">BSc (Biochemistry)</option>
            Â Â <option value="BSc (Biological Sciences)">BSc (Biological Sciences)</option>
            Â Â <option value="BSc (Biotechnology)">BSc (Biotechnology)</option>
            Â Â <option value="BSc (Chemistry)">BSc (Chemistry)</option>
            Â Â <option value="BSc (Ecology)">BSc (Ecology)</option>
            Â Â <option value="BSc (Entomology)">BSc (Entomology)</option>
            Â Â <option value="BSc (Environmental and Engineering Geology)">BSc (Environmental and Engineering Geology)</option>
            Â Â <option value="BSc (Environmental Sciences)">BSc (Environmental Sciences)</option>
            Â Â <option value="BSc (Food Management)">BSc (Food Management)</option>
            Â Â <option value="BSc (Food Science)">BSc (Food Science)</option>
            Â Â <option value="BSc (Four-year programme) â€“ Biological and Agricultural Sciences">BSc (Four-year programme) â€“ Biological and Agricultural Sciences</option>
            Â Â <option value="BSc (Four-year programme) â€“ Mathematical Sciences">BSc (Four-year programme) â€“ Mathematical Sciences</option>
            Â Â <option value="BSc (Four-year programme) â€“ Physical Sciences">BSc (Four-year programme) â€“ Physical Sciences</option>
            Â Â <option value="BSc (Genetics)">BSc (Genetics)</option>
            Â Â <option value="BSc (Geography)">BSc (Geography)</option>
            Â Â <option value="BSc (Geoinformatics)">BSc (Geoinformatics)</option>
            Â Â <option value="BSc (Geology)">BSc (Geology)</option>
            Â Â <option value="BSc (Human Genetics)">BSc (Human Genetics)</option>
            Â Â <option value="BSc (Human Physiology)">BSc (Human Physiology)</option>
            Â Â <option value="BSc (Human Physiology, Genetics and Psychology)">BSc (Human Physiology, Genetics and Psychology)</option>
            Â Â <option value="BSc (Mathematical Statistics)">BSc (Mathematical Statistics)</option>
            Â Â <option value="BSc (Mathematics)">BSc (Mathematics)</option>
            Â Â <option value="BSc (Medical Sciences)">BSc (Medical Sciences)</option>
            Â Â <option value="BSc (Meteorology)">BSc (Meteorology)</option>
            Â Â <option value="BSc (Microbiology)">BSc (Microbiology)</option>
            Â Â <option value="BSc (Nutrition)">BSc (Nutrition)</option>
            Â Â <option value="BSc (Physics)">BSc (Physics)</option>
            Â Â <option value="BSc (Plant Science)">BSc (Plant Science)</option>
            Â Â <option value="BSc (Zoology)">BSc (Zoology)	</option>
            Â Â <option value="BA (Theology) Bachelor of Arts in Theology">BA (Theology) Bachelor of Arts in Theology	</option>
            Â Â <option value="BTh - Bachelor of Theology">BTh - Bachelor of Theology</option>
            Â Â <option value="BVSc (University degree in Veterinary Science)">BVSc (University degree in Veterinary Science)</option>
            Â Â <option value="BAdminHons (Municipal Administration)">BAdminHons (Municipal Administration)</option>
            Â Â <option value="BAdminHons (Public Administration)">BAdminHons (Public Administration)</option>
            Â Â <option value="BAdminHons (Public Management)">BAdminHons (Public Management)</option>
            Â Â <option value="BComHons (Accounting Sciences)">BComHons (Accounting Sciences)</option>
            Â Â <option value="BComHons (Agricultural Economics)">BComHons (Agricultural Economics)</option>
            Â Â <option value="BComHons (Business Management)">BComHons (Business Management)</option>
            Â Â <option value="BComHons (Communication Management)">BComHons (Communication Management)</option>
            Â Â <option value="BComHons (Econometrics)">BComHons (Econometrics)</option>
            Â Â <option value="BComHons (Economics)">BComHons (Economics)</option>
            Â Â <option value="BComHons (Financial Management Sciences)">BComHons (Financial Management Sciences)</option>
            Â Â <option value="BComHons (Human Resource Management)">BComHons (Human Resource Management)</option>
            Â Â <option value="BComHons (Informatics)">BComHons (Informatics)</option>
            Â Â <option value="BComHons (Internal Auditing)">BComHons (Internal Auditing)</option>
            Â Â <option value="BComHons (Investment Management)">BComHons (Investment Management)</option>
            Â Â <option value="BComHons (Marketing Management)">BComHons (Marketing Management)</option>
            Â Â <option value="BComHons (Mathematical Statistics)">BComHons (Mathematical Statistics)</option>
            Â Â <option value="BComHons (Option: Taxation)">BComHons (Option: Taxation)</option>
            Â Â <option value="BComHons (Recreation and Sport Management)">BComHons (Recreation and Sport Management)</option>
            Â Â <option value="BComHons (Statistics)">BComHons (Statistics)</option>
            Â Â <option value="BComHons (Tourism Management)">BComHons (Tourism Management)</option>
            Â Â <option value="DAdmin Municipal Administration">DAdmin Municipal Administration</option>
            Â Â <option value="DAdmin Public Administration">DAdmin Public Administration</option>
            Â Â <option value="DAdmin Public Management">DAdmin Public Management</option>
            Â Â <option value="DCom Accounting Sciences">DCom Accounting Sciences</option>
            Â Â <option value="DCom Agricultural Economics">DCom Agricultural Economics</option>
            Â Â <option value="DCom Business Management">DCom Business Management</option>
            Â Â <option value="DCom Communication Management">DCom Communication Management</option>
            Â Â <option value="DCom Econometrics">DCom Econometrics</option>
            Â Â <option value="DCom Economics"></option>
            Â Â <option value="DCom Financial Management Sciences">DCom Financial Management Sciences</option>
            Â Â <option value="DCom Human Resource Management">DCom Human Resource Management</option>
            Â Â <option value="DCom Informatics">DCom Informatics</option>
            Â Â <option value="DCom Internal Auditing">DCom Internal Auditing</option>
            Â Â <option value="DCom Marketing Management">DCom Marketing Management</option>
            Â Â <option value="DCom Mathematical Statistics">DCom Mathematical Statistics</option>
            Â Â <option value="DCom Statistics">DCom Statistics;</option>
            Â Â <option value="DCom Tourism Management">DCom Tourism Management</option>
            Â Â <option value="MAdmin Municipal Administration (Dissertation)">MAdmin Municipal Administration (Dissertation)</option>
            Â Â <option value="MAdmin Public Administration (Dissertation)">MAdmin Public Administration (Dissertation)</option>
            Â Â <option value="MAdmin Public Management (Dissertation)">MAdmin Public Management (Dissertation)</option>
            Â Â <option value="MCom Accounting Sciences (Coursework)">MCom Accounting Sciences (Coursework)</option>
            Â Â <option value="MCom Accounting Sciences (Dissertation)">MCom Accounting Sciences (Dissertation)</option>
            Â Â <option value="MCom Agricultural Economics (Dissertation)">MCom Agricultural Economics (Dissertation)</option>
            Â Â <option value="MCom Business Management (Dissertation)">MCom Business Management (Dissertation)</option>
            Â Â <option value="MCom Communication Management (Coursework)">MCom Communication Management (Coursework)</option>
            Â Â <option value="MCom Communication Management (Dissertation)">MCom Communication Management (Dissertation)</option>
            Â Â <option value="MCom Econometrics (Coursework)">MCom Econometrics (Coursework)</option>
            Â Â <option value="MCom Econometrics (Dissertation)">MCom Econometrics (Dissertation)</option>
            Â Â <option value="MCom Economics (Coursework)">MCom Economics (Coursework)</option>
            Â Â <option value="MCom Economics (Dissertation)">MCom Economics (Dissertation)</option>
            Â Â <option value="MCom Economics of Trade and Investment (Coursework)">MCom Economics of Trade and Investment (Coursework)</option>
            Â Â <option value="MCom Economics of Trade and Investment (Dissertation)">MCom Economics of Trade and Investment (Dissertation)</option>
            Â Â <option value="MCom Financial Management Sciences (Coursework)">MCom Financial Management Sciences (Coursework)</option>
            Â Â <option value="MCom Financial Management Sciences (Dissertation)">MCom Financial Management Sciences (Dissertation)</option>
            Â Â <option value="MCom Human Resource Management (Coursework)">MCom Human Resource Management (Coursework)</option>
            Â Â <option value="MCom Industrial Psychology (Coursework)">MCom Industrial Psychology (Coursework)</option>
            Â Â <option value="MCom Informatics (Coursework)">MCom Informatics (Coursework)</option>
            Â Â <option value="MCom Informatics (Dissertation)">MCom Informatics (Dissertation)</option>
            Â Â <option value="MCom Internal Auditing (Dissertation)">MCom Internal Auditing (Dissertation)</option>
            Â Â <option value="MCom Marketing Management (Coursework)">MCom Marketing Management (Coursework)</option>
            Â Â <option value="MCom Marketing Management (Dissertation)">MCom Marketing Management (Dissertation)</option>
            Â Â <option value="MCom Mathematical Statistics (Coursework)">MCom Mathematical Statistics (Coursework)</option>
            Â Â <option value="MCom Mathematical Statistics (Dissertation)">MCom Mathematical Statistics (Dissertation)</option>
            Â Â <option value="MCom Recreation and Sport Management (Dissertation)">MCom Recreation and Sport Management (Dissertation)</option>
            Â Â <option value="MCom Statistics (Coursework)">MCom Statistics (Coursework)</option>
            Â Â <option value="MCom Statistics (Dissertation)">MCom Statistics (Dissertation)</option>
            Â Â <option value="MCom Taxation (Coursework)">MCom Taxation (Coursework)</option>
            Â Â <option value="MCom Taxation (Dissertation)">MCom Taxation (Dissertation)</option>
            Â Â <option value="MCom Tourism Management (Dissertation)">MCom Tourism Management (Dissertation)</option>
            Â Â <option value="MPA Master of Public Administration (Coursework)">MPA Master of Public Administration (Coursework)</option>
            Â Â <option value="MPhil Accounting Sciences Option: Fraud Risk Management (Coursework)">MPhil Accounting Sciences Option: Fraud Risk Management (Coursework)</option>
            Â Â <option value="MPhil Agricultural Economics (Coursework)">MPhil Agricultural Economics (Coursework)</option>
            Â Â <option value="MPhil Business Management Option: Enterprise Risk Management (Coursework)">MPhil Business Management Option: Enterprise Risk Management (Coursework)</option>
            Â Â <option value="MPhil Business Management Option: Responsible Leadership (Coursework)">MPhil Business Management Option: Responsible Leadership (Coursework)</option>
            Â Â <option value="MPhil Business Management Option: Strategic Management (Coursework)">MPhil Business Management Option: Strategic Management (Coursework)</option>
            Â Â <option value="MPhil Business Management Option: Supply Chain Management (Coursework)">MPhil Business Management Option: Supply Chain Management (Coursework)</option>
            Â Â <option value="MPhil Economics (Coursework)">MPhil Economics (Coursework)</option>
            Â Â <option value="MPhil Entrepreneurship (Coursework)">MPhil Entrepreneurship (Coursework)</option>
            Â Â <option value="MPhil in Communication Management (Coursework)">MPhil in Communication Management (Coursework)</option>
            Â Â <option value="MPhil in Communication Management (Dissertation)">MPhil in Communication Management (Dissertation)</option>
            Â Â <option value="MPhil Informatics (Coursework)">MPhil Informatics (Coursework)</option>
            Â Â <option value="MPhil in Human Resource Management (Coursework)">MPhil in Human Resource Management (Coursework)</option>
            Â Â <option value="MPhil in Labour Relations (Coursework)">MPhil in Labour Relations (Coursework)</option>
            Â Â <option value="MPhil in Marketing Management option Marketing Research">MPhil in Marketing Management option Marketing Research</option>
            Â Â <option value="MPhil in Public Policy (Dissertation)">MPhil in Public Policy (Dissertation)</option>
            Â Â <option value="MPhil in Taxation (Coursework)">MPhil in Taxation (Coursework)</option>
            Â Â <option value="MPhil Internal Auditing (Coursework)">MPhil Internal Auditing (Coursework)</option>
            Â Â <option value="MPhil Tourism Managent (Dissertation)">MPhil Tourism Managent (Dissertation)</option>
            Â Â <option value="PhD Accounting Sciences">PhD Accounting Sciences</option>
            Â Â <option value="PhD Agricultural Economics">PhD Agricultural Economics</option>
            Â Â <option value="PhD Communication Management">PhD Communication Management</option>
            Â Â <option value="PhD Econometrics">PhD Econometrics</option>
            Â Â <option value="PhD Economics">PhD Economics</option>
            Â Â <option value="PhD Entrepreneurship">PhD Entrepreneurship</option>
            Â Â <option value="PhD Human Resource Management">PhD Human Resource Management</option>
            Â Â <option value="PhD in Business Management">PhD in Business Management</option>
            Â Â <option value="PhD in Financial Management Sciences">PhD in Financial Management Sciences</option>
            Â Â <option value="PhD in Informatics">PhD in Informatics</option>
            Â Â <option value="PhD in Public Administration">PhD in Public Administration</option>
            Â Â <option value="PhD in Public Management">PhD in Public Management</option>
            Â Â <option value="PhD Internal Auditing">PhD Internal Auditing</option>
            Â Â <option value="PhD Labour Relations Management">PhD Labour Relations Management</option>
            Â Â <option value="PhD Marketing Management">PhD Marketing Management</option>
            Â Â <option value="PhD Mathematical Statistics">PhD Mathematical Statistics</option>
            Â Â <option value="PhD Municipal Administration">PhD Municipal Administration</option>
            Â Â <option value="PhD Option: Fraud Risk Management">PhD Option: Fraud Risk Management</option>
            Â Â <option value="PhD Option: Industrial and Organisational Psychology">PhD Option: Industrial and Organisational Psychology</option>
            Â Â <option value="PhD Option: Taxation">PhD Option: Taxation</option>
            Â Â <option value="PhD Option: Tax Policy">PhD Option: Tax Policy</option>
            Â Â <option value="PhD Organisational Behaviour">PhD Organisational Behaviour</option>
            Â Â <option value="PhD Statistics">PhD Statistics</option>
            Â Â <option value="PhD Tourism Management">PhD Tourism Management</option>
            Â Â <option value="BEd (Hons) Assessment and Quality Assurance in Education and Training	"></option>
            Â Â <option value="BEd (Hons) Computer-integrated Education">BEd (Hons) Computer-integrated Education</option>
            Â Â <option value="BEd (Hons) Curriculum and Instructional Design and Development">BEd (Hons) Curriculum and Instructional Design and Development</option>
            Â Â <option value="BEd (Hons) Educational Psychology">BEd (Hons) Educational Psychology</option>
            Â Â <option value="BEd (Hons) Education Management, Law and Policy">BEd (Hons) Education Management, Law and Policy</option>
            Â Â <option value="BEd (Hons) Learning Support">BEd (Hons) Learning Support</option>
            Â Â <option value="BEd (Hons) Science and Mathematics Education">BEd (Hons) Science and Mathematics Education</option>
            Â Â <option value="MEd Adult and Community Education and Training (Dissertation)">MEd Adult and Community Education and Training (Dissertation)</option>
            Â Â <option value="MEd Assessment and Quality Assurance in Education and Training (Dissertation)">MEd Assessment and Quality Assurance in Education and Training (Dissertation)</option>
            Â Â <option value="MEd Curriculum and Instructional Design and Development (Dissertation)">MEd Curriculum and Instructional Design and Development (Dissertation)</option>
            Â Â <option value="MEd Educational Leadership (Coursework)">MEd Educational Leadership (Coursework)</option>
            Â Â <option value="MEd Educational Psychology (Coursework)">MEd Educational Psychology (Coursework)</option>
            Â Â <option value="MEd Education Management, Law and Policy (Dissertation)">MEd Education Management, Law and Policy (Dissertation)</option>
            Â Â <option value="MEd General (Dissertation)">MEd General (Dissertation)</option>
            Â Â <option value="MEd Learning Support, Guidance and Counselling (Dissertation)">MEd Learning Support, Guidance and Counselling (Dissertation)</option>
            Â Â <option value="PhD Adult and Community Education and Training">PhD Adult and Community Education and Training</option>
            Â Â <option value="PhD Assessment and Quality Assurance in Education and Training">PhD Assessment and Quality Assurance in Education and Training</option>
            Â Â <option value="PhD Computer-integrated Education">PhD Computer-integrated Education</option>
            Â Â <option value="PhD Curriculum and Instructional Design and Development">PhD Curriculum and Instructional Design and Development</option>
            Â Â <option value="PhD Doctor of Philosophy">PhD Doctor of Philosophy</option>
            Â Â <option value="PhD Educational Psychology">PhD Educational Psychology</option>
            Â Â <option value="PhD Education Management, Law and Policy">PhD Education Management, Law and Policy</option>
            Â Â <option value="PhD Education Policy Studies">PhD Education Policy Studies</option>
            Â Â <option value="PhD Learning Support, Guidance and Counselling">PhD Learning Support, Guidance and Counselling</option>
            Â Â <option value="BArchHons (Bachelor of Architecture Honours)">BArchHons (Bachelor of Architecture Honours)</option>
            Â Â <option value="BEngHons (Bioengineering)">BEngHons (Bioengineering)</option>
            Â Â <option value="BEngHons (Chemical Engineering)">BEngHons (Chemical Engineering)</option>
            Â Â <option value="BEngHons (Computer Engineering)">BEngHons (Computer Engineering)</option>
            Â Â <option value="BEngHons (Control Engineering)">BEngHons (Control Engineering)</option>
            Â Â <option value="BEngHons (Electrical Engineering)">BEngHons (Electrical Engineering)</option>
            Â Â <option value="BEngHons (Electronic Engineering)">BEngHons (Electronic Engineering)</option>
            Â Â <option value="BEngHons (Environmental Engineering)">BEngHons (Environmental Engineering)</option>
            Â Â <option value="BEngHons (Geotechnical Engineering)">BEngHons (Geotechnical Engineering)</option>
            Â Â <option value="BEngHons (Industrial Engineering)">BEngHons (Industrial Engineering)</option>
            Â Â <option value="BEngHons (Mechanical Engineering)">BEngHons (Mechanical Engineering)</option>
            Â Â <option value="BEngHons (Metallurgical Engineering)">BEngHons (Metallurgical Engineering)</option>
            Â Â <option value="BEngHons (Micro-electronic Engineering)">BEngHons (Micro-electronic Engineering)</option>
            Â Â <option value="BEngHons (Mining Engineering)">BEngHons (Mining Engineering)</option>
            Â Â <option value="BEngHons (Structural Engineering)">BEngHons (Structural Engineering)</option>
            Â Â <option value="BEngHons (Technology Management)">BEngHons (Technology Management)</option>
            Â Â <option value="BEngHons (Transportation Engineering)">BEngHons (Transportation Engineering)</option>
            Â Â <option value="BEngHons (Water Resources Engineering)">BEngHons (Water Resources Engineering)</option>
            Â Â <option value="BEngHons (Water Utilisation Engineering)">BEngHons (Water Utilisation Engineering)</option>
            Â Â <option value="BIS (Hons) in Information Science">BIS (Hons) in Information Science</option>
            Â Â <option value="BIS (Hons) in Multimedia">BIS (Hons) in Multimedia</option>
            Â Â <option value="BIS (Hons) in Publishing">BIS (Hons) in Publishing</option>
            Â Â <option value="BLHons Landscape Architecture">BLHons Landscape Architecture</option>
            Â Â <option value="BlntHons Interior Architecture">BlntHons Interior Architecture</option>
            Â Â <option value="BScHons (Applied Science) (Architecture)">BScHons (Applied Science) (Architecture)</option>
            Â Â <option value="BScHons (Applied Science) (Chemical Technology)">BScHons (Applied Science) (Chemical Technology)</option>
            Â Â <option value="BScHons (Applied Science) (Control)">BScHons (Applied Science) (Control)</option>
            Â Â <option value="BScHons (Applied Science) (Environmental Technology)">BScHons (Applied Science) (Environmental Technology)</option>
            Â Â <option value="BScHons (Applied Science) (Geotechnics)">BScHons (Applied Science) (Geotechnics)</option>
            Â Â <option value="BSc (Hons) (Applied Science) (Industrial Systems)">BSc (Hons) (Applied Science) (Industrial Systems)</option>
            Â Â <option value="BScHons (Applied Science) (Mechanics)">BScHons (Applied Science) (Mechanics)</option>
            Â Â <option value="BScHons (Applied Science) (Metallurgy)">BScHons (Applied Science) (Metallurgy)</option>
            Â Â <option value="BScHons (Applied Science) (Mining)">BScHons (Applied Science) (Mining)</option>
            Â Â <option value="BScHons (Applied Science) (Structures)">BScHons (Applied Science) (Structures)</option>
            Â Â <option value="BScHons (Applied Science) (Transportation Planning)">BScHons (Applied Science) (Transportation Planning)</option>
            Â Â <option value="BScHons (Applied Science) (Water Resources)">BScHons (Applied Science) (Water Resources)</option>
            Â Â <option value="BScHons (Applied Science) (Water Utilisation)">BScHons (Applied Science) (Water Utilisation)</option>
            Â Â <option value="BSc (Hons) Computer Science">BSc (Hons) Computer Science</option>
            Â Â <option value="BSc (Hons) Construction Management">BSc (Hons) Construction Management</option>
            Â Â <option value="BSc (Hons) Quantity Surveying">BSc (Hons) Quantity Surveying</option>
            Â Â <option value="BSc (Hons) Real Estate">BSc (Hons) Real Estate</option>
            Â Â <option value="BScHons (Technology Management)">BScHons (Technology Management)</option>
            Â Â <option value="DEng (Doctor of Engineering)">DEng (Doctor of Engineering)</option>
            Â Â <option value="DPhil in Information Science">DPhil in Information Science</option>
            Â Â <option value="DPhil in Library Science">DPhil in Library Science</option>
            Â Â <option value="Master of Architecture (Professional)">Master of Architecture (Professional)</option>
            Â Â <option value="Master of Architecture (Research)">Master of Architecture (Research)</option>
            Â Â <option value="Master of Information Technology (Coursework)">Master of Information Technology (Coursework)</option>
            Â Â <option value="Master of Interior Architecture (Professional)">Master of Interior Architecture (Professional)</option>
            Â Â <option value="Master of Interior Architecture (Research)">Master of Interior Architecture (Research)</option>
            Â Â <option value="Master of Landscape Architecture (Professional)">Master of Landscape Architecture (Professional)</option>
            Â Â <option value="Master of Landscape Architecture (Research)">Master of Landscape Architecture (Research)</option>
            Â Â <option value="Master of Town & Regional Planning (Coursework)">Master of Town & Regional Planning (Coursework)</option>
            Â Â <option value="Master of Town & Regional Planning (Dissertation)">Master of Town & Regional Planning (Dissertation)</option>
            Â Â <option value="MCom Informatics (Coursework)">MCom Informatics (Coursework)</option>
            Â Â <option value="MCom Informatics (Research)">MCom Informatics (Research)</option>
            Â Â <option value="MEng (Bioengineering)">MEng (Bioengineering)</option>
            Â Â <option value="MEng Chemical Engineering">MEng Chemical Engineering</option>
            Â Â <option value="MEng (Computer Engineering)">MEng (Computer Engineering)</option>
            Â Â <option value="MEng Control Engineering">MEng Control Engineering</option>
            Â Â <option value="MEng (Electrical Engineering)">MEng (Electrical Engineering)</option>
            Â Â <option value="MEng (Electronic Engineering)">MEng (Electronic Engineering)</option>
            Â Â <option value="MEng (Engineering Management)">MEng (Engineering Management)</option>
            Â Â <option value="MEng (Engineering Management) (Coursework)">MEng (Engineering Management) (Coursework)</option>
            Â Â <option value="MEng Environmental Engineering (Dissertation)">MEng Environmental Engineering (Dissertation)</option>
            Â Â <option value="MEng (Geotechnical Engineering)">MEng (Geotechnical Engineering)</option>
            Â Â <option value="MEng (Industrial Engineering) (Dissertation)">MEng (Industrial Engineering) (Dissertation)</option>
            Â Â <option value="MEng (Mechanical Engineering)">MEng (Mechanical Engineering)</option>
            Â Â <option value="MEng (Metallurgical Engineering)">MEng (Metallurgical Engineering)</option>
            Â Â <option value="MEng(Metallurgical Engineering)(Dissertation)">MEng(Metallurgical Engineering)(Dissertation)</option>
            Â Â <option value="MEng (Microelectronic Engineering)">MEng (Microelectronic Engineering)</option>
            Â Â <option value="MEng Mining Engineering (Dissertation)">MEng Mining Engineering (Dissertation)</option>
            Â Â <option value="MEng (Project Management)">MEng (Project Management)</option>
            Â Â <option value="MEng (Project Management) (Dissertation)">MEng (Project Management) (Dissertation)</option>
            Â Â <option value="MEng (Software Engineering)">MEng (Software Engineering)</option>
            Â Â <option value="MEng (Structural Engineering)">MEng (Structural Engineering)</option>
            Â Â <option value="MEng Technology Management">MEng Technology Management</option>
            Â Â <option value="MEng (Transportation Engineering)">MEng (Transportation Engineering)</option>
            Â Â <option value="MEng (Water Resources Engineering)">MEng (Water Resources Engineering)</option>
            Â Â <option value="MEng Water Utilisation Engineering">MEng Water Utilisation Engineering</option>
            Â Â <option value="MIS in Information Science (Research)">MIS in Information Science (Research)</option>
            Â Â <option value="MIS in Library Science (Research)">MIS in Library Science (Research)</option>
            Â Â <option value="MIS in Multimedia (Research)">MIS in Multimedia (Research)</option>
            Â Â <option value="MIS in Publishing (Research)">MIS in Publishing (Research)</option>
            Â Â <option value="MSc (Applied Science)">MSc (Applied Science)</option>
            Â Â <option value="MSc (Applied Science) (Architecture)">MSc (Applied Science) (Architecture)</option>
            Â Â <option value="MSc (Applied Science) (Chemical Technology)">MSc (Applied Science) (Chemical Technology)</option>
            Â Â <option value="MSc (Applied Science) Construction Management">MSc (Applied Science) Construction Management</option>
            Â Â <option value="MSc (Applied Science) (Control)">MSc (Applied Science) (Control)</option>
            Â Â <option value="MSc (Applied Science) (Environmental Technology)">MSc (Applied Science) (Environmental Technology)</option>
            Â Â <option value="MSc (Applied Science) (Geotechnics)">MSc (Applied Science) (Geotechnics)</option>
            Â Â <option value="MSc (Applied Science) (Industrial Systems)">MSc (Applied Science) (Industrial Systems)</option>
            Â Â <option value="MSc (Applied Science) (Mechanics)">MSc (Applied Science) (Mechanics)</option>
            Â Â <option value="MSc (Applied Science) (Metallurgy)">MSc (Applied Science) (Metallurgy)</option>
            Â Â <option value="MSc (Applied Science) (Mine Strata Control)">MSc (Applied Science) (Mine Strata Control)</option>
            Â Â <option value="MSc (Applied Science) (Mining Environmental Control)">MSc (Applied Science) (Mining Environmental Control)</option>
            Â Â <option value="MSc (Applied Science) Quantity Surveying">MSc (Applied Science) Quantity Surveying</option>
            Â Â <option value="MSc (Applied Science) Real Estate">MSc (Applied Science) Real Estate</option>
            Â Â <option value="MSc (Applied Science) (Structures)">MSc (Applied Science) (Structures)</option>
            Â Â <option value="MSc (Applied Science) (Transportation Planning)">MSc (Applied Science) (Transportation Planning)</option>
            Â Â <option value="MSc (Applied Science) (Water Resources)">MSc (Applied Science) (Water Resources)</option>
            Â Â <option value="MSc (Applied Science) (Water Utilisation)">MSc (Applied Science) (Water Utilisation)</option>
            Â Â <option value="MSc (Engineering Management)">MSc (Engineering Management)</option>
            Â Â <option value="MSc in Computer Science">MSc in Computer Science</option>
            Â Â <option value="MSc in Construction Management">MSc in Construction Management</option>
            Â Â <option value="MSc (Project Management)">MSc (Project Management)</option>
            Â Â <option value="MSc Quantity Surveying">MSc Quantity Surveying</option>
            Â Â <option value="MSc Real Estate">MSc Real Estate</option>
            Â Â <option value="MSc Real Estate (Coursework)">MSc Real Estate (Coursework)</option>
            Â Â <option value="MSc (Technology Management)">MSc (Technology Management)</option>
            Â Â <option value="MSc (Technology Management) (Coursework)">MSc (Technology Management) (Coursework)</option>
            Â Â <option value="PhD Architecture">PhD Architecture</option>
            Â Â <option value="PhD Computer Science">PhD Computer Science</option>
            Â Â <option value="PhD Construction Management">PhD Construction Management</option>
            Â Â <option value="PhD (Doctor of Philosophy)">PhD (Doctor of Philosophy)</option>
            Â Â <option value="PhD (Engineering)">PhD (Engineering)</option>
            Â Â <option value="PhD Industrial Engineering">PhD Industrial Engineering</option>
            Â Â <option value="PhD Information Technology">PhD Information Technology</option>
            Â Â <option value="PhD Interior Architecture">PhD Interior Architecture</option>
            Â Â <option value="PhD Landscape Architecture">PhD Landscape Architecture</option>
            Â Â <option value="PhD Publishing">PhD Publishing</option>
            Â Â <option value="Phd Quantity Surveying">Phd Quantity Surveying</option>
            Â Â <option value="Phd Real Estate">Phd Real Estate</option>
            Â Â <option value="PhD Technology Management">PhD Technology Management</option>
            Â Â <option value="PhD Town and Regional Planning">PhD Town and Regional Planning</option>
            Â Â <option value="DBA Doctor of Business Administration">DBA Doctor of Business Administration </option>
            Â Â <option value="MBA Master of Business Administration">MBA Master of Business Administration</option>
            Â Â <option value="BDieteticsHons (Bachelor of Dietetics Honours)">BDieteticsHons (Bachelor of Dietetics Honours)</option>
            Â Â <option value="BRadHons Diagnostics">BRadHons Diagnostics</option>
            Â Â <option value="BRadHons Nuclear Medicine">BRadHons Nuclear Medicine</option>
            Â Â <option value="BRadHons Radiation Therapy">BRadHons Radiation Therapy</option>
            Â Â <option value="BScHons Aerospace Medicine">BScHons Aerospace Medicine</option>
            Â Â <option value="BScHons Anatomy">BScHons Anatomy</option>
            Â Â <option value="BScHons Biokinetics">BScHons Biokinetics</option>
            Â Â <option value="BScHons Biostatistics">BScHons Biostatistics</option>
            Â Â <option value="BScHons Cell Biology">BScHons Cell Biology</option>
            Â Â <option value="BScHons Chemical Pathology">BScHons Chemical Pathology</option>
            Â Â <option value="BScHons Comparitive Anatomy">BScHons Comparitive Anatomy</option>
            Â Â <option value="BScHons Developmental Biology">BScHons Developmental Biology</option>
            Â Â <option value="BScHons Haematology">BScHons Haematology</option>
            Â Â <option value="BScHons Human Cell Biology">BScHons Human Cell Biology</option>
            Â Â <option value="BScHons Human Genetics">BScHons Human Genetics</option>
            Â Â <option value="BScHons Human Histology">BScHons Human Histology</option>
            Â Â <option value="BScHons Human Physiology">BScHons Human Physiology</option>
            Â Â <option value="BScHons Macro-anatomy">BScHons Macro-anatomy</option>
            Â Â <option value="BScHons Medical Criminalistics">BScHons Medical Criminalistics</option>
            Â Â <option value="BScHons Medical Immunology">BScHons Medical Immunology</option>
            Â Â <option value="BScHons Medical Microbiology">BScHons Medical Microbiology</option>
            Â Â <option value="BScHons Medical Nuclear Science">BScHons Medical Nuclear Science</option>
            Â Â <option value="BScHons Medical Oncology">BScHons Medical Oncology</option>
            Â Â <option value="BScHons Medical Physics">BScHons Medical Physics</option>
            Â Â <option value="BScHons Medical Virology">BScHons Medical Virology</option>
            Â Â <option value="BScHons Neuro-anatomy">BScHons Neuro-anatomy</option>
            Â Â <option value="BScHons Pharmacology">BScHons Pharmacology</option>
            Â Â <option value="BScHons Physical Anthropology">BScHons Physical Anthropology</option>
            Â Â <option value="BScHons Radiation Oncology">BScHons Radiation Oncology</option>
            Â Â <option value="BScHons Reproductive Biology">BScHons Reproductive Biology</option>
            Â Â <option value="BScHons Reproductive Biology: Andrology">BScHons Reproductive Biology: Andrology</option>
            Â Â <option value="BScHons Sport Science">BScHons Sport Science</option>
            Â Â <option value="DCur (Doctor of Nursing)">DCur (Doctor of Nursing)</option>
            Â Â <option value="DOccTher (Doctor of Occupational Therapy)">DOccTher (Doctor of Occupational Therapy)</option>
            Â Â <option value="DSc (Doctor of Science)">DSc (Doctor of Science)</option>
            Â Â <option value="DSc (Doctor of Science) Dietetics">DSc (Doctor of Science) Dietetics</option>
            Â Â <option value="MChD Community Dentistry">MChD Community Dentistry</option>
            Â Â <option value="MChD Maxillo-Facial and Oral Surgery">MChD Maxillo-Facial and Oral Surgery</option>
            Â Â <option value="MChD Maxillo-Facial and Oral Surgery (aa)">MChD Maxillo-Facial and Oral Surgery (aa)</option>
            Â Â <option value="MChD Maxillo-Facial and Oral Surgery (bb)">MChD Maxillo-Facial and Oral Surgery (bb)</option>
            Â Â <option value="MChD Maxillo-Facial and Oral Surgery (cc)">MChD Maxillo-Facial and Oral Surgery (cc)</option>
            Â Â <option value="MChD Oral Pathology">MChD Oral Pathology</option>
            Â Â <option value="MChD Orthodontics">MChD Orthodontics</option>
            Â Â <option value="MChD Periodontics and Oral Medicine">MChD Periodontics and Oral Medicine</option>
            Â Â <option value="MChD Prosthodontics">MChD Prosthodontics</option>
            Â Â <option value="MCur Clinical Fields of Study">MCur Clinical Fields of Study</option>
            Â Â <option value="MCur Clinical Fields of Study (Coursework)">MCur Clinical Fields of Study (Coursework)</option>
            Â Â <option value="MCur Nursing Education">MCur Nursing Education</option>
            Â Â <option value="MCur Nursing Education (Coursework)">MCur Nursing Education (Coursework)</option>
            Â Â <option value="MCur Nursing Management">MCur Nursing Management</option>
            Â Â <option value="MCur Nursing Management (Coursework)">MCur Nursing Management (Coursework)</option>
            Â Â <option value="MD Anaesthesiology">MD Anaesthesiology</option>
            Â Â <option value="MD Anatomy">MD Anatomy</option>
            Â Â <option value="MD Community Health">MD Community Health</option>
            Â Â <option value="MD Dermatology">MD Dermatology</option>
            Â Â <option value="MD Family Medicine">MD Family Medicine</option>
            Â Â <option value="MD Forensic Medicine">MD Forensic Medicine</option>
            Â Â <option value="MD Geriatrics">MD Geriatrics</option>
            Â Â <option value="MD Haematology">MD Haematology</option>
            Â Â <option value="MD Health Systems">MD Health Systems</option>
            Â Â <option value="MD Human Physiology">MD Human Physiology</option>
            Â Â <option value="MDietetics (Coursework)">MDietetics (Coursework)</option>
            Â Â <option value="MDietetics (Research)">MDietetics (Research)</option>
            Â Â <option value="MD Internal Medicine">MD Internal Medicine</option>
            Â Â <option value="MD Medical Microbiology">MD Medical Microbiology</option>
            Â Â <option value="MD Medical Oncology">MD Medical Oncology</option>
            Â Â <option value="MD Neurology">MD Neurology</option>
            Â Â <option value="MD Neurosurgery">MD Neurosurgery</option>
            Â Â <option value="MD Obstetrics and Gynaecology">MD Obstetrics and Gynaecology</option>
            Â Â <option value="MD Ophthalmology">MD Ophthalmology</option>
            Â Â <option value="MD Otorhinolaryngology">MD Otorhinolaryngology</option>
            Â Â <option value="MD Paediatrics">MD Paediatrics</option>
            Â Â <option value="MD Pathology">MD Pathology</option>
            Â Â <option value="MD Pharmacology">MD Pharmacology</option>
            Â Â <option value="MD Plastic and Reconstructive Surgery">MD Plastic and Reconstructive Surgery</option>
            Â Â <option value="MD Psychiatry">MD Psychiatry</option>
            Â Â <option value="MD Public Health">MD Public Health</option>
            Â Â <option value="MD Radiation Oncology">MD Radiation Oncology</option>
            Â Â <option value="MD Radiological Diagnostics">MD Radiological Diagnostics</option>
            Â Â <option value="MD Reproductive Biology">MD Reproductive Biology</option>
            Â Â <option value="MD Reproductive Biology: Andrology">MD Reproductive Biology: Andrology</option>
            Â Â <option value="MD Surgery">MD Surgery</option>
            Â Â <option value="MD Thoracic Surgery">MD Thoracic Surgery</option>
            Â Â <option value="MD Urology">MD Urology</option>
            Â Â <option value="MECI Master of Early Childhood Intervention">MECI Master of Early Childhood Intervention</option>
            Â Â <option value="MMed Anaesthesiology">MMed Anaesthesiology</option>
            Â Â <option value="MMed Dermatology">MMed Dermatology</option>
            Â Â <option value="MMed Emergency Medicine">MMed Emergency Medicine</option>
            Â Â <option value="MMed Family Medicine">MMed Family Medicine</option>
            Â Â <option value="MMed Geriatics">MMed Geriatics</option>
            Â Â <option value="MMed Internal Medicine">MMed Internal Medicine</option>
            Â Â <option value="MMed Medical Oncology">MMed Medical Oncology</option>
            Â Â <option value="MMed Neurology">MMed Neurology</option>
            Â Â <option value="MMed Neurosurgery">MMed Neurosurgery</option>
            Â Â <option value="MMed Nuclear Medicine">MMed Nuclear Medicine</option>
            Â Â <option value="MMed Obstetrics and Gynaecology">MMed Obstetrics and Gynaecology</option>
            Â Â <option value="MMed Ophthalmology">MMed Ophthalmology</option>
            Â Â <option value="MMed Orthopaedics">MMed Orthopaedics</option>
            Â Â <option value="MMed Otorhinolaryngology">MMed Otorhinolaryngology</option>
            Â Â <option value="MMed Paediatrics">MMed Paediatrics</option>
            Â Â <option value="MMed Pathology: Anatomical Pathology">MMed Pathology: Anatomical Pathology</option>
            Â Â <option value="MMed Pathology: Chemical Pathology">MMed Pathology: Chemical Pathology</option>
            Â Â <option value="MMed Pathology: Clinical Pathology">MMed Pathology: Clinical Pathology</option>
            Â Â <option value="MMed Pathology: Forensic Pathology">MMed Pathology: Forensic Pathology</option>
            Â Â <option value="MMed Pathology: Haematology">MMed Pathology: Haematology</option>
            Â Â <option value="MMed Pathology: Medical Microbiology">MMed Pathology: Medical Microbiology</option>
            Â Â <option value="MMed Pathology: Medical Virology">MMed Pathology: Medical Virology</option>
            Â Â <option value="MMed Plastic Surgery">MMed Plastic Surgery</option>
            Â Â <option value="MMed Psychiatry">MMed Psychiatry</option>
            Â Â <option value="MMed Public Health Medicine">MMed Public Health Medicine</option>
            Â Â <option value="MMed Radiation Oncology">MMed Radiation Oncology</option>
            Â Â <option value="MMed Radiological Diagnostics">MMed Radiological Diagnostics</option>
            Â Â <option value="MMed Surgery">MMed Surgery</option>
            Â Â <option value="MMed Surgery Option: Paediatric Surgery">MMed Surgery Option: Paediatric Surgery</option>
            Â Â <option value="MMed Thoracic Surgery">MMed Thoracic Surgery</option>
            Â Â <option value="MMed Urology">MMed Urology</option>
            Â Â <option value="MMilMed (Master of Military Medicine)">MMilMed (Master of Military Medicine)</option>
            Â Â <option value="MOccTher Activity Theory">MOccTher Activity Theory</option>
            Â Â <option value="MOccTher Hand Therapy">MOccTher Hand Therapy</option>
            Â Â <option value="MOccTher Neurology">MOccTher Neurology</option>
            Â Â <option value="MOccTher Paediatrics">MOccTher Paediatrics</option>
            Â Â <option value="MOccTher Psychiatry">MOccTher Psychiatry</option>
            Â Â <option value="MOccTher (Research)">MOccTher (Research)</option>
            Â Â <option value="MPharmMed (Master of Medical Pharmacology)">MPharmMed (Master of Medical Pharmacology)</option>
            Â Â <option value="MPhil Pain Management">MPhil Pain Management</option>
            Â Â <option value="MPhil Philosophy and Ethics of Mental Health">MPhil Philosophy and Ethics of Mental Health</option>
            Â Â <option value="MPH (Master of Public Health)">MPH (Master of Public Health)</option>
            Â Â <option value="MPhysT (Internal Medicine)">MPhysT (Internal Medicine)</option>
            Â Â <option value="MPhysT (Neurology/Neurosurgery)">MPhysT (Neurology/Neurosurgery)</option>
            Â Â <option value="MPhysT (Orthopaedic Manual Therapy)">MPhysT (Orthopaedic Manual Therapy)</option>
            Â Â <option value="MPhysT (Orthopaedics)">MPhysT (Orthopaedics)</option>
            Â Â <option value="MPhysT (Paediatrics)">MPhysT (Paediatrics)</option>
            Â Â <option value="MPhysT (Research)">MPhysT (Research)</option>
            Â Â <option value="MPhysT (Sports Medicine)">MPhysT (Sports Medicine)</option>
            Â Â <option value="MPhysT (Surgery)">MPhysT (Surgery)</option>
            Â Â <option value="MPhysT (Women's Health)">MPhysT (Women's Health)</option>
            Â Â <option value="MRad Diagnostics">MRad Diagnostics</option>
            Â Â <option value="MRad Nuclear Medicine">MRad Nuclear Medicine</option>
            Â Â <option value="MRad Radiation Therapy">MRad Radiation Therapy</option>
            Â Â <option value="MSc Aerospace Medicine">MSc Aerospace Medicine</option>
            Â Â <option value="MSc Anatomy">MSc Anatomy</option>
            Â Â <option value="MSc Applied Human Nutrition">MSc Applied Human Nutrition</option>
            Â Â <option value="MSc Biostatistics (Public Health)">MSc Biostatistics (Public Health)</option>
            Â Â <option value="MSc Cell Biology">MSc Cell Biology</option>
            Â Â <option value="MSc Chemical Pathology">MSc Chemical Pathology</option>
            Â Â <option value="MSc Clinical Epidemiology">MSc Clinical Epidemiology</option>
            Â Â <option value="MSc Community Health">MSc Community Health</option>
            Â Â <option value="MScDent General">MScDent General</option>
            Â Â <option value="MScDent Maxillo facial and Oral Radiology">MScDent Maxillo facial and Oral Radiology</option>
            Â Â <option value="MScDent Oral Surgery">MScDent Oral Surgery</option>
            Â Â <option value="MSc Epidemiology">MSc Epidemiology</option>
            Â Â <option value="MSc Haematology">MSc Haematology</option>
            Â Â <option value="MSc Human Genetics">MSc Human Genetics</option>
            Â Â <option value="MSc Human Physiology">MSc Human Physiology</option>
            Â Â <option value="MSc Medical Applied Psychology">MSc Medical Applied Psychology</option>
            Â Â <option value="MSc Medical Criminalistics">MSc Medical Criminalistics</option>
            Â Â <option value="MSc Medical Immunology">MSc Medical Immunology</option>
            Â Â <option value="MSc Medical Microbiology">MSc Medical Microbiology</option>
            Â Â <option value="MSc Medical Nuclear Science">MSc Medical Nuclear Science</option>
            Â Â <option value="MSc Medical Oncology">MSc Medical Oncology</option>
            Â Â <option value="MSc Medical Physics">MSc Medical Physics</option>
            Â Â <option value="MSc Medical Virology">MSc Medical Virology</option>
            Â Â <option value="MSc Pharmacology">MSc Pharmacology</option>
            Â Â <option value="MSc Radiation Oncology">MSc Radiation Oncology</option>
            Â Â <option value="MSc Reproductive Biology">MSc Reproductive Biology</option>
            Â Â <option value="MSc Reproductive Biology: Andrology">MSc Reproductive Biology: Andrology</option>
            Â Â <option value="MSc Sport Science">MSc Sport Science</option>
            Â Â <option value="MSc Sports Medicine">MSc Sports Medicine</option>
            Â Â <option value="PhD Anaesthesiology">PhD Anaesthesiology</option>
            Â Â <option value="PhD Anatomical Pathology">PhD Anatomical Pathology</option>
            Â Â <option value="PhD Anatomy">PhD Anatomy;PhD Anatomy;PhD Anatomy</option>
            Â Â <option value="PhD Chemical Pathology">PhD Chemical Pathology</option>
            Â Â <option value="PhD Community Health">PhD Community Health</option>
            Â Â <option value="PhD (Dentistry)">PhD (Dentistry)</option>
            Â Â <option value="PhD Diagnostic Radiology">PhD Diagnostic Radiology</option>
            Â Â <option value="PhD Dietetics">PhD Dietetics</option>
            Â Â <option value="PhD Environmental Health">PhD Environmental Health</option>
            Â Â <option value="PhD Epidemiology">PhD Epidemiology</option>
            Â Â <option value="PhD Family Medicine">PhD Family Medicine</option>
            Â Â <option value="PhD Forensic Pathology">PhD Forensic Pathology</option>
            Â Â <option value="PhD Health Ethics">PhD Health Ethics</option>
            Â Â <option value="PhD Health Systems">PhD Health Systems</option>
            Â Â <option value="PhD Human Genetics">PhD Human Genetics</option>
            Â Â <option value="PhD Internal Medicine">PhD Internal Medicine</option>
            Â Â <option value="PhD Medical Immunology">PhD Medical Immunology</option>
            Â Â <option value="PhD Medical Microbiology">PhD Medical Microbiology</option>
            Â Â <option value="PhD Medical Nuclear Science">PhD Medical Nuclear Science</option>
            Â Â <option value="PhD Medical Oncology">PhD Medical Oncology</option>
            Â Â <option value="PhD Medical Physics">PhD Medical Physics</option>
            Â Â <option value="PhD Medical Virology">PhD Medical Virology</option>
            Â Â <option value="PhD Mental Health">PhD Mental Health</option>
            Â Â <option value="PhD Neurology">PhD Neurology</option>
            Â Â <option value="PhD Nursing Science">PhD Nursing Science</option>
            Â Â <option value="PhD Obstetrics and Gynaecology">PhD Obstetrics and Gynaecology</option>
            Â Â <option value="PhD Occupational Therapy">PhD Occupational Therapy</option>
            Â Â <option value="PhD Orthopaedics">PhD Orthopaedics</option>
            Â Â <option value="PhD Paediatrics">PhD Paediatrics</option>
            Â Â <option value="PhD Pharmacology">PhD Pharmacology</option>
            Â Â <option value="PhD Physiotherapy">PhD Physiotherapy</option>
            Â Â <option value="PhD Psychiatry">PhD Psychiatry</option>
            Â Â <option value="PhD Public Health">PhD Public Health</option>
            Â Â <option value="PhD Radiography">PhD Radiography</option>
            Â Â <option value="PhD Reproductive Biology">PhD Reproductive Biology</option>
            Â Â <option value="PhD Reproductive Biology: Andrology">PhD Reproductive Biology: Andrology</option>
            Â Â <option value="PhD Sport Science">PhD Sport Science</option>
            Â Â <option value="PhD Sports Medicine">PhD Sports Medicine</option>
            Â Â <option value="PhD Urology">PhD Urology</option>
            Â Â <option value="BA HMSHons Biokinetics">BA HMSHons Biokinetics	</option>
            Â Â <option value="BA HMSHons in Recreation">BA HMSHons in Recreation	</option>
            Â Â <option value="BA HMSHons Recreation and Sports Management">BA HMSHons Recreation and Sports Management	</option>
            Â Â <option value="BA HMSHons Sport Science">BA HMSHons Sport Science	</option>
            Â Â <option value="BA(Hons) African Languages">BA(Hons) African Languages	</option>
            Â Â <option value="BA(Hons) Afrikaans">BA(Hons) Afrikaans	</option>
            Â Â <option value="BA(Hons) Ancient Languages and Cultures Studies">BA(Hons) Ancient Languages and Cultures Studies	</option>
            Â Â <option value="BA(Hons) Applied Language Studies">BA(Hons) Applied Language Studies	</option>
            Â Â <option value="BA(Hons) Archaeology">BA(Hons) Archaeology	</option>
            Â Â <option value="BA(Hons) Augmentative and Alternative Communication">BA(Hons) Augmentative and Alternative Communication	</option>
            Â Â <option value="BA(Hons) Biblical and Religious Studies">BA(Hons) Biblical and Religious Studies	</option>
            Â Â <option value="BA(Hons) Criminology">BA(Hons) Criminology	</option>
            Â Â <option value="BA(Hons) Drama and Film Studies">BA(Hons) Drama and Film Studies	</option>
            Â Â <option value="BA(Hons) English">BA(Hons) English	</option>
            Â Â <option value="BA(Hons) French">BA(Hons) French</option>
            Â Â <option value="BA(Hons) German">BA(Hons) German	</option>
            Â Â <option value="BA(Hons) HMS in Recreation Option: Corporate Wellness">BA(Hons) HMS in Recreation Option: Corporate Wellness	</option>
            Â Â <option value="BA(Hons) International Relations">BA(Hons) International Relations	</option>
            Â Â <option value="BA(Hons) Journalism">BA(Hons) Journalism	</option>
            Â Â <option value="BA(Hons) Literary Theory">BA(Hons) Literary Theory</option>
            Â Â <option value="BA(Hons) Philosophy">BA(Hons) Philosophy</option>
            Â Â <option value="BA(Hons) Political Science">BA(Hons) Political Science	</option>
            Â Â <option value="BA(Hons) Translation and Professional Writing">BA(Hons) Translation and Professional Writing	</option>
            Â Â <option value="BA(Hons) Visual Studies">BA(Hons) Visual Studies	</option>
            Â Â <option value="BHCS(Hons) Heritage and Cultural Tourism">BHCS(Hons) Heritage and Cultural Tourism	</option>
            Â Â <option value="BHCS (Hons) Heritage and Museum Studies">BHCS (Hons) Heritage and Museum Studies	</option>
            Â Â <option value="BHCS (Hons) History">BHCS (Hons) History	</option>
            Â Â <option value="BMus(Hons) General Musicology">BMus(Hons) General Musicology	</option>
            Â Â <option value="BMus(Hons) in Music Communication">BMus(Hons) in Music Communication	</option>
            Â Â <option value="BMus(Hons) Music Education">BMus(Hons) Music Education	</option>
            Â Â <option value="BMus(Hons) Music Technology">BMus(Hons) Music Technology	</option>
            Â Â <option value="BMus(Hons) Performing Art">BMus(Hons) Performing Art	</option>
            Â Â <option value="BSocSci (Hons) Anthropology">BSocSci (Hons) Anthropology	</option>
            Â Â <option value="BSocSci(Hons) Development Studies">BSocSci(Hons) Development Studies	</option>
            Â Â <option value="BSocSci(Hons) Environmental Analysis and Management">BSocSci(Hons) Environmental Analysis and Management	</option>
            Â Â <option value="BSocSci(Hons) Gender Studies">BSocSci(Hons) Gender Studies	</option>
            Â Â <option value="BSocSci(Hons) Geography">BSocSci(Hons) Geography	</option>
            Â Â <option value="BSocSci(Hons) Industrial Sociology and Labour Studies">BSocSci(Hons) Industrial Sociology and Labour Studies	</option>
            Â Â <option value="BSocSci(Hons) Psychology">BSocSci(Hons) Psychology	</option>
            Â Â <option value="BSocSci(Hons) Sociology">BSocSci(Hons) Sociology	</option>
            Â Â <option value="DLitt African Languages">DLitt African Languages	</option>
            Â Â <option value="DLitt Afrikaans">DLitt Afrikaans	</option>
            Â Â <option value="DLitt English">DLitt English	</option>
            Â Â <option value="DLitt French">DLitt French	</option>
            Â Â <option value="DLitt German">DLitt German	</option>
            Â Â <option value="DLitt Greek">DLitt Greek	</option>
            Â Â <option value="DLitt Latin">DLitt Latin	</option>
            Â Â <option value="DLitt Literary Theory">DLitt Literary Theory	</option>
            Â Â <option value="DLitt Semitic Languages">DLitt Semitic Languages	</option>
            Â Â <option value="DMus focusing on Composition">DMus focusing on Composition	</option>
            Â Â <option value="DMus focusing on Performing Arts">DMus focusing on Performing Arts	</option>
            Â Â <option value="DMus focusing on Research">DMus focusing on Research	</option>
            Â Â <option value="DPhil Anthropology">DPhil Anthropology	</option>
            Â Â <option value="DPhil Archaeology">DPhil Archaeology	</option>
            Â Â <option value="DPhil Communication Pathology">DPhil Communication Pathology	</option>
            Â Â <option value="DPhil Criminology">DPhil Criminology	</option>
            Â Â <option value="DPhil Drama">DPhil Drama	</option>
            Â Â <option value="DPhil Drama and Film Studies">DPhil Drama and Film Studies	</option>
            Â Â <option value="DPhil Fine Arts focusing on Creative Production">DPhil Fine Arts focusing on Creative Production	</option>
            Â Â <option value="DPhil Fine Arts focusing on Curatorial Practice">DPhil Fine Arts focusing on Curatorial Practice	</option>
            Â Â <option value="DPhil Fine Arts focusing on Research">DPhil Fine Arts focusing on Research	</option>
            Â Â <option value="DPhil Geography">DPhil Geography	</option>
            Â Â <option value="DPhil History">DPhil History	</option>
            Â Â <option value="DPhil History of Art (Research)">DPhil History of Art (Research)	</option>
            Â Â <option value="DPhil Human Movement Science">DPhil Human Movement Science	</option>
            Â Â <option value="DPhil Human Movement Science Option: Biokinetics">DPhil Human Movement Science Option: Biokinetics	</option>
            Â Â <option value="DPhil Human Movement Science Option: Recreation and Sports management">DPhil Human Movement Science Option: Recreation and Sports management	</option>
            Â Â <option value="DPhil Human Movement Science Option: Sports Sciences">DPhil Human Movement Science Option: Sports Sciences	</option>
            Â Â <option value="DPhil International Relations">DPhil International Relations	</option>
            Â Â <option value="DPhil Linguistics">DPhil Linguistics	</option>
            Â Â <option value="DPhil Philosophy">DPhil Philosophy	</option>
            Â Â <option value="DPhil Political Science">DPhil Political Science	</option>
            Â Â <option value="DPhil Psychology">DPhil Psychology	</option>
            Â Â <option value="DPhil Social Work">DPhil Social Work	</option>
            Â Â <option value="DPhil Sociology">DPhil Sociology	</option>
            Â Â <option value="MA African-European Cultural Relations (Research)">MA African-European Cultural Relations (Research)	</option>
            Â Â <option value="MA African Languages (Coursework)">MA African Languages (Coursework)	</option>
            Â Â <option value="MA African Languages (Research)">MA African Languages (Research)</option>
            Â Â <option value="MA Afrikaans (Coursework)">MA Afrikaans (Coursework)	</option>
            Â Â <option value="MA Afrikaans (Research)">MA Afrikaans (Research)</option>
            Â Â <option value="MA Ancient Languages and Cultures Studies (Research)">MA Ancient Languages and Cultures Studies (Research)</option>
            Â Â <option value="MA Applied Language Studies Option:Translation and Interpreting (Coursework)">MA Applied Language Studies Option:Translation and Interpreting (Coursework)	</option>
            Â Â <option value="MA Applied Language Studies (Research)">MA Applied Language Studies (Research)	</option>
            Â Â <option value="MA Archaeology (Research)">MA Archaeology (Research)	</option>
            Â Â <option value="MA Augmentative and Alternative Communication (Coursework)">MA Augmentative and Alternative Communication (Coursework)</option>
            Â Â <option value="MA Augmentative and Alternative Communication (Research)">MA Augmentative and Alternative Communication (Research)</option>
            Â Â <option value="MA Biblical and Religious Studies (Coursework)">MA Biblical and Religious Studies (Coursework)</option>
            Â Â <option value="MA Biblical and Religious Studies (Research)">MA Biblical and Religious Studies (Research)</option>
            Â Â <option value="MA Clinical Psychology (Coursework)">MA Clinical Psychology (Coursework)</option>
            Â Â <option value="MA Counselling Psychology (Coursework)">MA Counselling Psychology (Coursework)</option>
            Â Â <option value="MA Creative Writing (Research)">MA Creative Writing (Research)</option>
            Â Â <option value="MA Criminology (Research)">MA Criminology (Research)</option>
            Â Â <option value="MA Culture and Media Studies">MA Culture and Media Studies</option>
            Â Â <option value="MA Drama and Film Studies (Research)">MA Drama and Film Studies (Research)</option>
            Â Â <option value="MA Drama Performance (Research)">MA Drama Performance (Research)</option>
            Â Â <option value="MA Drama (Research)">MA Drama (Research)</option>
            Â Â <option value="MA English (Research)">MA English (Research)</option>
            Â Â <option value="MA Environment and Society (Coursework)">MA Environment and Society (Coursework)</option>
            Â Â <option value="MA Fine Arts (Research)">MA Fine Arts (Research)</option>
            Â Â <option value="MA French (Research)">MA French (Research)	</option>
            Â Â <option value="MA General (Research)">MA General (Research)</option>
            Â Â <option value="MA Geography (Research)">MA Geography (Research)</option>
            Â Â <option value="MA German (Research)">MA German (Research)</option>
            Â Â <option value="MA History of Art (Research)">MA History of Art (Research)</option>
            Â Â <option value="MA Human Movement Science Option: Biokinetics (Research)">MA Human Movement Science Option: Biokinetics (Research)</option>
            Â Â <option value="MA Human Movement Science Option: Recreation and Sports Management (Research)">MA Human Movement Science Option: Recreation and Sports Management (Research)</option>
            Â Â <option value="MA Human Movement Science Option: Sports Sciences (Research)">MA Human Movement Science Option: Sports Sciences (Research)</option>
            Â Â <option value="MA Human Movement Science (Research)">MA Human Movement Science (Research)</option>
            Â Â <option value="MA Information Design (Coursework)">MA Information Design (Coursework)</option>
            Â Â <option value="MA International Relations (Coursework)">MA International Relations (Coursework)</option>
            Â Â <option value="MA International Relations (Research)">MA International Relations (Research)</option>
            Â Â <option value="MA Linguistics (Research)">MA Linguistics (Research)</option>
            Â Â <option value="MA Literary Theory (Research)">MA Literary Theory (Research)</option>
            Â Â <option value="MA Philosophy (Research)">MA Philosophy (Research)</option>
            Â Â <option value="MA Political Science (Coursework)">MA Political Science (Coursework)</option>
            Â Â <option value="MA Political Science (Research)">Political Science (Research)</option>
            Â Â <option value="MA Psychology (Research)">MA Psychology (Research)</option>
            Â Â <option value="MA Research Psychology (Coursework)">MA Research Psychology (Coursework)</option>
            Â Â <option value="MA Visual Studies (Research)">MA Visual Studies (Research)</option>
            Â Â <option value="M Communication Pathology (Research)">M Communication Pathology (Research)	</option>
            Â Â <option value="M Diplomatic Studies (Coursework)">M Diplomatic Studies (Coursework)</option>
            Â Â <option value="MHCS Heritage and Cultural Tourism (Coursework)">MHCS Heritage and Cultural Tourism (Coursework)</option>
            Â Â <option value="MHCS Heritage and Cultural Tourism (Research)">MHCS Heritage and Cultural Tourism (Research)</option>
            Â Â <option value="MHCS Heritage and Museum Studies (Coursework)">MHCS Heritage and Museum Studies (Coursework)</option>
            Â Â <option value="MHCS Heritage and Museum Studies (Research)">MHCS Heritage and Museum Studies (Research)</option>
            Â Â <option value="MHCS History (Coursework)">MHCS History (Coursework)</option>
            Â Â <option value="MHCS History (Research)">MHCS History (Research)</option>
            Â Â <option value="MMus Composition (Research)">MMus Composition (Research)</option>
            Â Â <option value="MMus Music Education (Coursework)">MMus Music Education (Coursework)</option>
            Â Â <option value="MMus Music Education (Research)">MMus Music Education (Research)</option>
            Â Â <option value="MMus Musicology (Research)">MMus Musicology (Research)</option>
            Â Â <option value="MMus Music Technology (Coursework)">MMus Music Technology (Coursework)</option>
            Â Â <option value="MMus Music Therapy (Coursework)">MMus Music Therapy (Coursework)</option>
            Â Â <option value="MMus Performing Art (Music) (Coursework)">MMus Performing Art (Music) (Coursework)	</option>
            Â Â <option value="MPhil Option: Political Philosopy">MPhil Option: Political Philosopy</option>
            Â Â <option value="M Security Studies (Coursework)">M Security Studies (Coursework)	</option>
            Â Â <option value="MSocSci Anthropology (Research)">MSocSci Anthropology (Research)	</option>
            Â Â <option value="MSocSci Development Studies (Research)">MSocSci Development Studies (Research)	</option>
            Â Â <option value="MSocSci Employee Assistance Programmes (Coursework)">MSocSci Employee Assistance Programmes (Coursework)</option>
            Â Â <option value="MSocSci Gender Studies (Coursework)">MSocSci Gender Studies (Coursework)</option>
            Â Â <option value="MSocSci Gender Studies (Research)">MSocSci Gender Studies (Research)</option>
            Â Â <option value="MSocSci Industrial Sociology and Labour Studies (Coursework)">MSocSci Industrial Sociology and Labour Studies (Coursework)</option>
            Â Â <option value="MSocSci Industrial Sociology and Labour Studies (Research)">MSocSci Industrial Sociology and Labour Studies (Research)</option>
            Â Â <option value="MSocSci Sociology (Coursework)">MSocSci Sociology (Coursework)</option>
            Â Â <option value="MSocSci Sociology (Research)">MSocSci Sociology (Research)</option>
            Â Â <option value="MSW in Employee Assistance Programmes">MSW in Employee Assistance Programmes</option>
            Â Â <option value="MSW in Healthcare (Coursework)">MSW in Healthcare (Coursework)</option>
            Â Â <option value="MSW in Social Development and Policy (Coursework)">MSW in Social Development and Policy (Coursework)</option>
            Â Â <option value="MSW Play Therapy (Coursework)">MSW Play Therapy (Coursework)</option>
            Â Â <option value="MSW Social Work (Research)">MSW Social Work (Research)</option>
            Â Â <option value="PhD Augmentative and Alternative Communication">PhD Augmentative and Alternative Communication</option>
            Â Â <option value="PhD Environment and Society (Research)">PhD Environment and Society (Research)</option>
            Â Â <option value="PhD General">PhD General</option>
            Â Â <option value="PhD History of Ancient Culture">PhD History of Ancient Culture</option>
            Â Â <option value="PhD in Biblical and Religious Studies">PhD in Biblical and Religious Studies</option>
            Â Â <option value="PhD Information Design">PhD Information Design</option>
            Â Â <option value="PhD in Psychology">PhD in Psychology</option>
            Â Â <option value="PhD Option: Creative Writing">PhD Option: Creative Writing</option>
            Â Â <option value="PhD Option: Development Studies">PhD Option: Development Studies</option>
            Â Â <option value="PhD Option: Heritage and Cultural Tourism"></option>
            Â Â <option value="PhD Visual Studies">PhD Visual Studies</option>
            Â Â <option value="LLD Human Rights">LLD Human Rights</option>
            Â Â <option value="LLD Jurisprudence">LLD Jurisprudence</option>
            Â Â <option value="LLD Mercantile Law">LLD Mercantile Law</option>
            Â Â <option value="LLD Private Law">LLD Private Law</option>
            Â Â <option value="LLD Procedural Law">LLD Procedural Law</option>
            Â Â <option value="LLD Public Law">LLD Public Law</option>
            Â Â <option value="LLM (Coursework) Child Law">LLM (Coursework) Child Law</option>
            Â Â <option value="LLM (Coursework) Constitutional Law and Administrative Law">LLM (Coursework) Constitutional Law and Administrative Law</option>
            Â Â <option value="LLM (Coursework) Corporate Law">LLM (Coursework) Corporate Law</option>
            Â Â <option value="LLM (Coursework) Criminal Law">LLM (Coursework) Criminal Law</option>
            Â Â <option value="LLM (Coursework) Environmental Law">LLM (Coursework) Environmental Law</option>
            Â Â <option value="LLM (Coursework) Human Rights and Democratisation in Africa">LLM (Coursework) Human Rights and Democratisation in Africa</option>
            Â Â <option value="LLM (Coursework) Insolvency Law">LLM (Coursework) Insolvency Law</option>
            Â Â <option value="LLM (Coursework) International Law">LLM (Coursework) International Law</option>
            Â Â <option value="LLM (Coursework) International Law Option: Air, Space and Telecommunication Law">LLM (Coursework) International Law Option: Air, Space and Telecommunication Law</option>
            Â Â <option value="LLM (Coursework) International Law Option: International Humanitarian Law and Human Rights in Military Operations">LLM (Coursework) International Law Option: International Humanitarian Law and Human Rights in Military Operations</option>
            Â Â <option value="LLM (Coursework) International Trade and Investment Law in Africa (Option 1)">LLM (Coursework) International Trade and Investment Law in Africa (Option 1)	</option>
            Â Â <option value="LLM (Coursework) International Trade and Investment Law in Africa (Option 2)">LLM (Coursework) International Trade and Investment Law in Africa (Option 2)</option>
            Â Â <option value="LLM (Coursework) Labour Law">LLM (Coursework) Labour Law</option>
            Â Â <option value="LLM (Coursework) Law and Political Justice">LLM (Coursework) Law and Political Justice</option>
            Â Â <option value="LLM (Coursework) Law of Contract">LLM (Coursework) Law of Contract</option>
            Â Â <option value="LLM (Coursework) Mercantile Law">LLM (Coursework) Mercantile Law</option>
            Â Â <option value="LLM (Coursework) Multidisciplinary Human Rights">LLM (Coursework) Multidisciplinary Human Rights</option>
            Â Â <option value="LLM (Coursework) Private Law: General">LLM (Coursework) Private Law: General</option>
            Â Â <option value="LLM (Coursework) Private Law Option: Estate Law">LLM (Coursework) Private Law Option: Estate Law</option>
            Â Â <option value="LLM (Coursework) Private Law Option: Family Law">LLM (Coursework) Private Law Option: Family Law</option>
            Â Â <option value="LLM (Coursework) Private Law Option: Intellectual Property Law">LLM (Coursework) Private Law Option: Intellectual Property Law</option>
            Â Â <option value="LLM (Coursework) Procedural Law">LLM (Coursework) Procedural Law</option>
            Â Â <option value="LLM (Coursework) Socio-Economic Rights: Theory and Practice">LLM (Coursework) Socio-Economic Rights: Theory and Practice</option>
            Â Â <option value="LLM (Coursework) Tax Law">LLM (Coursework) Tax Law	</option>
            Â Â <option value="LLM (Dissertation) Human Rights"></option>
            Â Â <option value="LLM (Dissertation) Jurisprudence">LLM (Dissertation) Jurisprudence</option>
            Â Â <option value="LLM (Dissertation) Mercantile Law">LLM (Dissertation) Mercantile Law</option>
            Â Â <option value="LLM (Dissertation) Private Law">LLM (Dissertation) Private Law</option>
            Â Â <option value="LLM (Dissertation) Procedural Law">LLM (Dissertation) Procedural Law</option>
            Â Â <option value="LLM (Dissertation) Public Law">LLM (Dissertation) Public Law</option>
            Â Â <option value="MPhil Option: Human Rights and Democratisation in Africa">MPhil Option: Human Rights and Democratisation in Africa	</option>
            Â Â <option value="MPhil Option: Multidisciplinary Human Rights (Coursework)">MPhil Option: Multidisciplinary Human Rights (Coursework)</option>
            Â Â <option value="BInstAgrar(Hons) Agribusiness Management">BInstAgrar(Hons) Agribusiness Management</option>
            Â Â <option value="BInstAgrar(Hons) Agricultural Economics">BInstAgrar(Hons) Agricultural Economics</option>
            Â Â <option value="BInstAgrar(Hons) Crop Protection">BInstAgrar(Hons) Crop Protection</option>
            Â Â <option value="BInstAgrar(Hons) Extension">BInstAgrar(Hons) Extension</option>
            Â Â <option value="BInstAgrar(Hons) Plant Production">BInstAgrar(Hons) Plant Production</option>
            Â Â <option value="BInstAgrar(Hons) Plant Quarantine">BInstAgrar(Hons) Plant Quarantine</option>
            Â Â <option value="BInstAgrar(Hons) Rural Development Planning">BInstAgrar(Hons) Rural Development Planning</option>
            Â Â <option value="BSc(Hons) Actuarial Science">BSc(Hons) Actuarial Science</option>
            Â Â <option value="BSc(Hons) Animal Science">BSc(Hons) Animal Science	</option>
            Â Â <option value="BSc(Hons) Applied Mathematics">BSc(Hons) Applied Mathematics</option>
            Â Â <option value="BSc(Hons) Biochemistry">BSc(Hons) Biochemistry</option>
            Â Â <option value="BSc(Hons) Bioinformatics">BSc(Hons) Bioinformatics</option>
            Â Â <option value="BSc(Hons) Biotechnology">BSc(Hons) Biotechnology</option>
            Â Â <option value="BSc(Hons) Chemistry">BSc(Hons) Chemistry</option>
            Â Â <option value="BSc(Hons) Entomology">BSc(Hons) Entomology</option>
            Â Â <option value="BSc(Hons) Environmental Analysis and Management">BSc(Hons) Environmental Analysis and Management</option>
            Â Â <option value="BSc(Hons) Financial Engineering">BSc(Hons) Financial Engineering</option>
            Â Â <option value="BSc(Hons) Food Science">BSc(Hons) Food Science</option>
            Â Â <option value="BSc(Hons) Genetics">BSc(Hons) Genetics</option>
            Â Â <option value="BSc(Hons) Geography">BSc(Hons) Geography</option>
            Â Â <option value="BSc(Hons) Geoinformatics">BSc(Hons) Geoinformatics</option>
            Â Â <option value="BSc(Hons) Geology">BSc(Hons) Geology</option>
            Â Â <option value="BSc(Hons) Mathematical Statistics">BSc(Hons) Mathematical Statistics</option>
            Â Â <option value="BSc(Hons) Mathematics">BSc(Hons) Mathematics</option>
            Â Â <option value="BSc(Hons) Mathematics of Finance">BSc(Hons) Mathematics of Finance</option>
            Â Â <option value="BSc(Hons) Meteorology">BSc(Hons) Meteorology</option>
            Â Â <option value="BSc(Hons) Microbiology">BSc(Hons) Microbiology</option>
            Â Â <option value="BSc(Hons) Nutrition and Food Science">BSc(Hons) Nutrition and Food Science</option>
            Â Â <option value="BSc(Hons) Option: Engineering Geology">BSc(Hons) Option: Engineering Geology</option>
            Â Â <option value="BSc(Hons) Option: Hydrogeology">BSc(Hons) Option: Hydrogeology</option>
            Â Â <option value="BSc(Hons): (Option) Medicinal Plant Science">BSc(Hons): (Option) Medicinal Plant Science</option>
            Â Â <option value="BSc(Hons) Physics">BSc(Hons) Physics</option>
            Â Â <option value="BSc(Hons) Plant Science">BSc(Hons) Plant Science</option>
            Â Â <option value="BSc(Hons) Soil Science [Option: Environmental Soil Science]">BSc(Hons) Soil Science [Option: Environmental Soil Science]</option>
            Â Â <option value="BSc(Hons) Wildlife Management">BSc(Hons) Wildlife Management	</option>
            Â Â <option value="BSc(Hons) Zoology">BSc(Hons) Zoology	</option>
            Â Â <option value="MConsumer Science Clothing Management">MConsumer Science Clothing Management</option>
            Â Â <option value="MConsumer Science Clothing Management (Coursework)">MConsumer Science Clothing Management (Coursework)</option>
            Â Â <option value="MConsumer Science Food Management">MConsumer Science Food Management</option>
            Â Â <option value="MConsumer Science Food Management (Coursework)">MConsumer Science Food Management (Coursework)</option>
            Â Â <option value="MConsumer Science General">MConsumer Science General</option>
            Â Â <option value="MConsumer Science General (Coursework)">MConsumer Science General (Coursework)</option>
            Â Â <option value="MConsumer Science Interior Merchandise Management">MConsumer Science Interior Merchandise Management</option>
            Â Â <option value="MConsumer Science Interior Merchandise Management (Coursework)">MConsumer Science Interior Merchandise Management (Coursework)</option>
            Â Â <option value="MInstAgrar Agricultural Economics">MInstAgrar Agricultural Economics</option>
            Â Â <option value="MInstAgrar Agronomy">MInstAgrar Agronomy</option>
            Â Â <option value="MInstAgrar Animal Production Management">MInstAgrar Animal Production Management</option>
            Â Â <option value="MInstAgrar Crop Protection">MInstAgrar Crop Protection</option>
            Â Â <option value="MInstAgrar Environmental Management (Coursework)">MInstAgrar Environmental Management (Coursework)</option>
            Â Â <option value="MInstAgrar Extension">MInstAgrar Extension</option>
            Â Â <option value="MInstAgrar Horticulture">MInstAgrar Horticulture	</option>
            Â Â <option value="MInstAgrar Pasture Science">MInstAgrar Pasture Science</option>
            Â Â <option value="MInstAgrar Plant Quarantine">MInstAgrar Plant Quarantine</option>
            Â Â <option value="MInstAgrar Rural Development Planning">MInstAgrar Rural Development Planning</option>
            Â Â <option value="MPhil Wildlife Management">MPhil Wildlife Management</option>
            Â Â <option value="MSc Actuarial Science">MSc Actuarial Science</option>
            Â Â <option value="MSc(Agric) Agricultural Economics">MSc(Agric) Agricultural Economics</option>
            Â Â <option value="MSc(Agric) Agricultural Extension">MSc(Agric) Agricultural Extension</option>
            Â Â <option value="MSc(Agric) Agronomy">MSc(Agric) Agronomy</option>
            Â Â <option value="MSc(Agric) Animal Breeding and Genetics">MSc(Agric) Animal Breeding and Genetics</option>
            Â Â <option value="MSc(Agric) Animal Science: Animal Nutrition">MSc(Agric) Animal Science: Animal Nutrition</option>
            Â Â <option value="MSc(Agric) Animal Science: Meat Science">MSc(Agric) Animal Science: Meat Science</option>
            Â Â <option value="MSc(Agric) Animal Science: Production ManagementMSc(Agric) Animal Science: Production Management"></option>
            Â Â <option value=""></option>
            Â Â <option value="MSc(Agric) Animal Science: Production Physiology">MSc(Agric) Animal Science: Production Physiology</option>
            Â Â <option value="MSc(Agric) Entomology">MSc(Agric) Entomology</option>
            Â Â <option value="MSc(Agric) Food Science and Technology">MSc(Agric) Food Science and Technology</option>
            Â Â <option value="MSc(Agric) in Pasture Science">MSc(Agric) in Pasture Science</option>
            Â Â <option value="MSc(Agric) Microbiology">MSc(Agric) Microbiology</option>
            Â Â <option value="MSc(Agric) Plant Pathology">MSc(Agric) Plant Pathology</option>
            Â Â <option value="MSc(Agric) Soil Science">MSc(Agric) Soil Science</option>
            Â Â <option value="MSc Applied Mathematics">MSc Applied Mathematics</option>
            Â Â <option value="MSc Applied Mineralogy">MSc Applied Mineralogy</option>
            Â Â <option value="MSc Applied Statistics">MSc Applied Statistics</option>
            Â Â <option value="MSc Biochemistry">MSc Biochemistry</option>
            Â Â <option value="MSc Bioinformatics">MSc Bioinformatics</option>
            Â Â <option value="MSc Biotechnology">MSc Biotechnology</option>
            Â Â <option value="MSc Chemistry">MSc Chemistry</option>
            Â Â <option value="MSc Engineering and Environmental Geology">MSc Engineering and Environmental Geology</option>
            Â Â <option value="MSc Engineering Geology">MSc Engineering Geology</option>
            Â Â <option value="MSc Entomology">MSc Entomology</option>
            Â Â <option value="MSc Environmental Ecology (Coursework)">MSc Environmental Ecology (Coursework)</option>
            Â Â <option value="MSc Environmental Education (Coursework)">MSc Environmental Education (Coursework)</option>
            Â Â <option value="MSc Environment and Society (Coursework)">MSc Environment and Society (Coursework)</option>
            Â Â <option value="MSc: Exploration Geophysics">MSc: Exploration Geophysics</option>
            Â Â <option value="MSc Financial Engineering">MSc Financial Engineering</option>
            Â Â <option value="MSc Food Science">MSc Food Science</option>
            Â Â <option value="MSc Genetics">MSc Genetics</option>
            Â Â <option value="MSc Geography">MSc Geography</option>
            Â Â <option value="MSc Geoinformatics">MSc Geoinformatics</option>
            Â Â <option value="MSc Geology">MSc Geology</option>
            Â Â <option value="MSc in Postharvest Technology">MSc in Postharvest Technology</option>
            Â Â <option value="MSc Mathematical Statistics">MSc Mathematical Statistics</option>
            Â Â <option value="MSc Mathematics">MSc Mathematics</option>
            Â Â <option value="MSc Mathematics Education">MSc Mathematics Education</option>
            Â Â <option value="MSc Mathematics of Finance">MSc Mathematics of Finance</option>
            Â Â <option value="MSc Meteorology">MSc Meteorology</option>
            Â Â <option value="MSc Microbiology">MSc Microbiology</option>
            Â Â <option value="MSc Nutrition">MSc Nutrition;</option>
            Â Â <option value="MSc [Option: Air Quality Management] (Coursework)">MSc [Option: Air Quality Management] (Coursework)</option>
            Â Â <option value="MSc [Option: Environmental Management] (Coursework)">MSc [Option: Environmental Management] (Coursework)</option>
            Â Â <option value="MSc [Option: Forest Management and the Environment (Coursework)">MSc [Option: Forest Management and the Environment (Coursework)</option>
            Â Â <option value="MSc [Option: Forest Science]">MSc [Option: Forest Science]</option>
            Â Â <option value="MSc [Option: Medicinal Plant Science]">MSc [Option: Medicinal Plant Science]	</option>
            Â Â <option value="MSc Physics">MSc Physics</option>
            Â Â <option value="MSc Plant Pathology">MSc Plant Pathology</option>
            Â Â <option value="MSc Plant Science">MSc Plant Science</option>
            Â Â <option value="MSc Science Education">MSc Science Education</option>
            Â Â <option value="MSc Soil Science">MSc Soil Science</option>
            Â Â <option value="MSc Water Resource Management (Coursework)">MSc Water Resource Management (Coursework)</option>
            Â Â <option value="MSc Wildlife Management">MSc Wildlife Management</option>
            Â Â <option value="MSc Zoology">MSc Zoology</option>
            Â Â <option value="PhD Agrarian Extension">PhD Agrarian Extension</option>
            Â Â <option value="PhD Agricultural Economics">PhD Agricultural Economics</option>
            Â Â <option value="PhD Agronomy">PhD Agronomy</option>
            Â Â <option value="PhD Animal Production Management">PhD Animal Production Management</option>
            Â Â <option value="PhD Animal Science">PhD Animal Science</option>
            Â Â <option value="PhD Biochemistry">PhD Biochemistry</option>
            Â Â <option value="PhD Bioinformatics">PhD Bioinformatics</option>
            Â Â <option value="PhD Biotechnology">PhD Biotechnology</option>
            Â Â <option value="PhD ChemistryPhD">PhD Chemistry</option>
            Â Â <option value="PhD Consumer Science: Clothing Management">PhD Consumer Science: Clothing Management</option>
            Â Â <option value="PhD Consumer Science: Development">PhD Consumer Science: Development</option>
            Â Â <option value="PhD Consumer Science: Food Management">PhD Consumer Science: Food Management</option>
            Â Â <option value="PhD Consumer Science: Interior Merchandise">PhD Consumer Science: Interior Merchandise</option>
            Â Â <option value="PhD Crop Protection">PhD Crop Protection</option>
            Â Â <option value="PhD Engineering and Environmental Geology">PhD Engineering and Environmental Geology</option>
            Â Â <option value="PhD Entomology">PhD Entomology</option>
            Â Â <option value="PhD Environmental Ecology">PhD Environmental Ecology</option>
            Â Â <option value="PhD Environmental Economics">PhD Environmental Economics</option>
            Â Â <option value="PhD Environment and Society">PhD Environment and Society</option>
            Â Â <option value="PhD Food Science">PhD Food Science</option>
            Â Â <option value="PhD Genetics">PhD Genetics</option>
            Â Â <option value="PhD Geography">PhD Geography</option>
            Â Â <option value="PhD Geoinformatics">PhD Geoinformatics</option>
            Â Â <option value="PhD Geology">PhD Geology	</option>
            Â Â <option value="PhD Horticultural Science">PhD Horticultural Science</option>
            Â Â <option value="PhD in Extension">PhD in Extension</option>
            Â Â <option value="PhD Mathematical Sciences">PhD Mathematical Sciences</option>
            Â Â <option value="PhD Mathematical Statistics">PhD Mathematical Statistics</option>
            Â Â <option value="PhD Meteorology">PhD Meteorology</option>
            Â Â <option value="PhD Microbiology">PhD Microbiology</option>
            Â Â <option value="PhD Nutrition">PhD Nutrition</option>
            Â Â <option value="PhD [Option:Air Quality Management]">PhD [Option:Air Quality Management]</option>
            Â Â <option value="PhD [Option: Environmental Management]">PhD [Option: Environmental Management]</option>
            Â Â <option value="PhD [Option:Forest Science]">PhD [Option:Forest Science]</option>
            Â Â <option value="PhD [Option: Medicinal Plant Science]">PhD [Option: Medicinal Plant Science]</option>
            Â Â <option value="PhD Pasture Science">PhD Pasture Science</option>
            Â Â <option value="PhD Physics">PhD Physics</option>
            Â Â <option value="PhD Plant Pathology">PhD Plant Pathology</option>
            Â Â <option value="PhD Plant Science">PhD Plant Science</option>
            Â Â <option value="PhD Rural Development Planning">PhD Rural Development Planning</option>
            Â Â <option value="PhD Science and Mathematics Education">PhD Science and Mathematics Education</option>
            Â Â <option value="PhD Soil Science">PhD Soil Science</option>
            Â Â <option value="PhD Water Resource Management">PhD Water Resource Management</option>
            Â Â <option value="PhD Wildlife Management">PhD Wildlife Management</option>
            Â Â <option value="PhD Zoology">PhD Zoology</option>
            Â Â <option value="BAHons (Theology) Church History and Church Polity">BAHons (Theology) Church History and Church Polity</option>
            Â Â <option value="BAHons (Theology) Dogmatics and Christian Ethics">BAHons (Theology) Dogmatics and Christian Ethics</option>
            Â Â <option value="BAHons (Theology) New Testament Studies">BAHons (Theology) New Testament Studies</option>
            Â Â <option value="BAHons (Theology) Old Testament Studies">BAHons (Theology) Old Testament Studies</option>
            Â Â <option value="BAHons (Theology) Practical Theology">BAHons (Theology) Practical Theology</option>
            Â Â <option value="BAHons (Theology) Science of Religion and Missiology">BAHons (Theology) Science of Religion and Missiology</option>
            Â Â <option value="BAHons (Theology) Theological Studies">BAHons (Theology) Theological Studies</option>
            Â Â <option value="DD Church History and Church Polity">DD Church History and Church Polity</option>
            Â Â <option value="DD Dogmatics and Christian Ethics">DD Dogmatics and Christian Ethics</option>
            Â Â <option value="DD New Testament Studies">DD New Testament Studies</option>
            Â Â <option value="DD Old Testament Studies">DD Old Testament Studies</option>
            Â Â <option value="DD Practical Theology">DD Practical Theology</option>
            Â Â <option value="DD Practical Theology: Pastoral Family Therapy">DD Practical Theology: Pastoral Family Therapy</option>
            Â Â <option value="DD Science of Religion and Missiology">DD Science of Religion and Missiology</option>
            Â Â <option value="MA(Theology) Church History and Church Polity (Coursework)">MA(Theology) Church History and Church Polity (Coursework)</option>
            Â Â <option value="MA(Theology) Church History and Church Polity (Dissertation)">MA(Theology) Church History and Church Polity (Dissertation)</option>
            Â Â <option value="MA(Theology) Dogmatics and Christian Ethics (Coursework)">MA(Theology) Dogmatics and Christian Ethics (Coursework)</option>
            Â Â <option value="MA(Theology) Dogmatics and Christian Ethics (Dissertation)">MA(Theology) Dogmatics and Christian Ethics (Dissertation)</option>
            Â Â <option value="MA(Theology) New Testament Studies (Coursework)">MA(Theology) New Testament Studies (Coursework)</option>
            Â Â <option value="MA(Theology) New Testament Studies (Dissertation)">MA(Theology) New Testament Studies (Dissertation)</option>
            Â Â <option value="MA(Theology) Old Testament Studies (Coursework)">MA(Theology) Old Testament Studies (Coursework)</option>
            Â Â <option value="MA(Theology) Old Testament Studies (Dissertation)">MA(Theology) Old Testament Studies (Dissertation)</option>
            Â Â <option value="MA(Theology) Pastoral Family Therapy (Coursework)">MA(Theology) Pastoral Family Therapy (Coursework)</option>
            Â Â <option value="MA(Theology) Practical Theology (Coursework)">MA(Theology) Practical Theology (Coursework)</option>
            Â Â <option value="MA(Theology) Practical Theology (Dissertation)">MA(Theology) Practical Theology (Dissertation)</option>
            Â Â <option value="MA(Theology) Science of Religion and Missiology (Coursework)">MA(Theology) Science of Religion and Missiology (Coursework)</option>
            Â Â <option value="MA(Theology) Science of Religion and Missiology (Dissertation)">MA(Theology) Science of Religion and Missiology (Dissertation)</option>
            Â Â <option value="MA(Theology) Youth Ministry (Coursework)">MA(Theology) Youth Ministry (Coursework)</option>
            Â Â <option value="MDiv (Curriculum aa)">MDiv (Curriculum aa)</option>
            Â Â <option value="MDiv (Curriculum bb)">MDiv (Curriculum bb)</option>
            Â Â <option value="MPhil Applied Theology">MPhil Applied Theology</option>
            Â Â <option value="MTh Church History and Church Polity (aa)">MTh Church History and Church Polity (aa)</option>
            Â Â <option value="MTh Church History and Church Polity (bb)">MTh Church History and Church Polity (bb)</option>
            Â Â <option value="MTh Dogmatics and Christian Ethics (aa)">MTh Dogmatics and Christian Ethics (aa)</option>
            Â Â <option value="MTh Dogmatics and Christian Ethics (bbMTh Dogmatics and Christian Ethics (bb)"></option>
            Â Â <option value="MTh New Testament Studies (aa)">MTh New Testament Studies (aa)</option>
            Â Â <option value="MTh New Testament Studies (bb)">MTh New Testament Studies (bb)</option>
            Â Â <option value="MTh Old Testament studies (aa)">MTh Old Testament studies (aa)</option>
            Â Â <option value="MTh Old Testament studies (bb)">MTh Old Testament studies (bb)</option>
            Â Â <option value="MTh Practical Theology (aa)">MTh Practical Theology (aa)</option>
            Â Â <option value="MTh Practical Theology (bb)">MTh Practical Theology (bb)</option>
            Â Â <option value="MTh Science of Religion and Missiology (aa)">MTh Science of Religion and Missiology (aa)</option>
            Â Â <option value="MTh Science of Religion and Missiology (bb)">MTh Science of Religion and Missiology (bb)</option>
            Â Â <option value="PhD Church History and Church Policy">PhD Church History and Church Policy</option>
            Â Â <option value="PhD Dogmatics and Christian Ethics">PhD Dogmatics and Christian Ethics</option>
            Â Â <option value="PhD New Testament Studies">PhD New Testament Studies</option>
            Â Â <option value="PhD Old Testament Studies">PhD Old Testament Studies</option>
            Â Â <option value="PhD Practical Theology">PhD Practical Theology</option>
            Â Â <option value="PhD Practical Theology: Pastoral Family Therapy">PhD Practical Theology: Pastoral Family Therapy</option>
            Â Â <option value="PhD Practical Theology: Youth Ministry">PhD Practical Theology: Youth Ministry</option>
            Â Â <option value="PhD Science of Religion and Missiology">PhD Science of Religion and Missiology</option>
            Â Â <option value="BVSc(Hons)">BVSc(Hons)</option>
            Â Â <option value="DVSc Anatomy and physiology">DVSc Anatomy and physiology</option>
            Â Â <option value="DVSc Paraclinical sciences">DVSc Paraclinical sciences</option>
            Â Â <option value="DVSc Production animal studies">DVSc Production animal studies</option>
            Â Â <option value="DVSc Veterinary tropical diseases">DVSc Veterinary tropical diseases</option>
            Â Â <option value="Master of Science Option: Animal/Human/Ecosystem Health">Master of Science Option: Animal/Human/Ecosystem Health</option>
            Â Â <option value="Master of Science Option: Ruminant health">Master of Science Option: Ruminant health</option>
            Â Â <option value="Master of Science Option: Veterinary epidemiology">Master of Science Option: Veterinary epidemiology</option>
            Â Â <option value="Master of Science Option: Veterinary reproduction">Master of Science Option: Veterinary reproduction</option>
            Â Â <option value="MMedVet Anaesthesiology">MMedVet Anaesthesiology</option>
            Â Â <option value="MMedVet Cattle Herd Health">MMedVet Cattle Herd Health</option>
            Â Â <option value="MMedVet Clinical Laboratory Diagnostics">MMedVet Clinical Laboratory Diagnostics</option>
            Â Â <option value="MMedVet Diagnostic Imaging">MMedVet Diagnostic Imaging</option>
            Â Â <option value="MMedVet Laboratory Animal Science">MMedVet Laboratory Animal Science</option>
            Â Â <option value="MMedVet Medicine (Bovine)">MMedVet Medicine (Bovine)</option>
            Â Â <option value="MMedVet Medicine (Equine)">MMedVet Medicine (Equine)</option>
            Â Â <option value="MMedVet Medicine (Small Animals)">MMedVet Medicine (Small Animals)</option>
            Â Â <option value="MMedVet Ophthalmology">MMedVet Ophthalmology	</option>
            Â Â <option value="MMedVet Pathology">MMedVet Pathology</option>
            Â Â <option value="MMedVet Pharmacology">MMedVet Pharmacology</option>
            Â Â <option value="MMedVet Pig Herd Health">MMedVet Pig Herd Health</option>
            Â Â <option value="MMedVet Poultry Diseases">MMedVet Poultry Diseases</option>
            Â Â <option value="MMedVet Reproduction">MMedVet Reproduction</option>
            Â Â <option value="MMedVet Small Stock Herd Health"></option>
            Â Â <option value="MMedVet Surgery (Equine)">MMedVet Surgery (Equine)</option>
            Â Â <option value="MMedVet Surgery (Small Animals)">MMedVet Surgery (Small Animals)</option>
            Â Â <option value="MMedVet Toxicology">MMedVet Toxicology</option>
            Â Â <option value="MMedVet Veterinary Public Health">MMedVet Veterinary Public Health</option>
            Â Â <option value="MMedVet Wildlife Diseases">MMedVet Wildlife Diseases</option>
            Â Â <option value="MSc (Veterinary Industrial Pharmacology)">MSc (Veterinary Industrial Pharmacology)</option>
            Â Â <option value="MSc (Veterinary Science) Anatomy and Physiology">MSc (Veterinary Science) Anatomy and Physiology</option>
            Â Â <option value="MSc (Veterinary Science) Companion Animal Clinical Studies">MSc (Veterinary Science) Companion Animal Clinical Studies</option>
            Â Â <option value="MSc (Veterinary Science) Paraclinical Sciences">MSc (Veterinary Science) Paraclinical Sciences	</option>
            Â Â <option value="MSc (Veterinary Science) Production Animal Studies">MSc (Veterinary Science) Production Animal Studies</option>
            Â Â <option value="MSc (Veterinary Science) Veterinary Tropical Diseases">MSc (Veterinary Science) Veterinary Tropical Diseases</option>
            Â Â <option value="PhD Anatomy and Physiology">PhD Anatomy and Physiology</option>
            Â Â <option value="PhD Companion Animal Clinical Studies">PhD Companion Animal Clinical Studies</option>
            Â Â <option value="PhD Paraclinical Sciences">PhD Paraclinical Sciences</option>
            Â Â <option value="PhD Production Animal Studies">PhD Production Animal Studies</option>
            Â Â <option value="PhD Veterinary Tropical Diseases">PhD Veterinary Tropical Diseases</option>
            Â Â <option value="Postgraduate Certificate in the Theory of Accountancy">Postgraduate Certificate in the Theory of Accountancy</option>
            Â Â <option value="Postgraduate Diploma in Economic and Management Sciences Option: Entrepreneurship">Postgraduate Diploma in Economic and Management Sciences Option: Entrepreneurship</option>
            Â Â <option value="Postgraduate Diploma in Economic and Management Sciences Option: Integrated Reporting">Postgraduate Diploma in Economic and Management Sciences Option: Integrated Reporting</option>
            Â Â <option value="Postgraduate Diploma in Investigative and Forensic Accounting">Postgraduate Diploma in Investigative and Forensic Accounting</option>
            Â Â <option value="PGCE Postgraduate Certificate in Education: Early Childhood Development and Foundation Phase"></option>
            Â Â <option value="PGCE Postgraduate Certificate in Education: Further Education and Training">PGCE Postgraduate Certificate in Education: Further Education and Training</option>
            Â Â <option value="PGCE Postgraduate Certificate in Education: Intermediate Phase">PGCE Postgraduate Certificate in Education: Intermediate Phase</option>
            Â Â <option value="PGCE Postgraduate Certificate in Education: Senior Phase">PGCE Postgraduate Certificate in Education: Senior Phase</option>
            Â Â <option value="PGCHE Postgraduate Certificate in Higher Education">PGCHE Postgraduate Certificate in Higher Education</option>
            Â Â <option value="PDBA Postgraduate Diploma in Business Administration (offered by GIBS)">PDBA Postgraduate Diploma in Business Administration (offered by GIBS)</option>
            Â Â <option value="Advanced University Diploma in Oral Hygiene (AdvUnivDipHO)">Advanced University Diploma in Oral Hygiene (AdvUnivDipHO)</option>
            Â Â <option value="Medicine Special (Postgraduate)">Medicine Special (Postgraduate)</option>
            Â Â <option value="Postgraduate Diploma in Dentistry (PGDipDent)">Postgraduate Diploma in Dentistry (PGDipDent)</option>
            Â Â <option value="Postgraduate Diploma in Family Medicine">Postgraduate Diploma in Family Medicine</option>
            Â Â <option value="Postgraduate Diploma in General Ultrasound (PGDipGUS)">Postgraduate Diploma in General Ultrasound (PGDipGUS)</option>
            Â Â <option value="Postgraduate Diploma in Group Activities (DGA)">Postgraduate Diploma in Group Activities (DGA)</option>
            Â Â <option value="Postgraduate Diploma in Hand Therapy (DHT)">Postgraduate Diploma in Hand Therapy (DHT)</option>
            Â Â <option value="Postgraduate Diploma in Health Systems Management (DHSM)">Postgraduate Diploma in Health Systems Management (DHSM)</option>
            Â Â <option value="Postgraduate Diploma in Occupational Health (DipOH)">Postgraduate Diploma in Occupational Health (DipOH)</option>
            Â Â <option value="Postgraduate Diploma in Occupational Medicine and Health (DOMH)">Postgraduate Diploma in Occupational Medicine and Health (DOMH)</option>
            Â Â <option value="Postgraduate Diploma in Public Health (DPH)">Postgraduate Diploma in Public Health (DPH)</option>
            Â Â <option value="Postgraduate Diploma in Public Health Medicine (DipPHM)">Postgraduate Diploma in Public Health Medicine (DipPHM)</option>
            Â Â <option value="Postgraduate Diploma in the Handling of Childhood Disability (DHCD)">Postgraduate Diploma in the Handling of Childhood Disability (DHCD)</option>
            Â Â <option value="Postgraduate Diploma in Tropical Medicine and Health (DTM&H)">Postgraduate Diploma in Tropical Medicine and Health (DTM&H)</option>
            Â Â <option value="Postgraduate Diploma in Vocational Rehabilitation (DVR)">Postgraduate Diploma in Vocational Rehabilitation (DVR)</option>
            Â Â <option value="Visiting postgraduate students">Visiting postgraduate students</option>
            Â Â <option value="Advanced Diploma in Hearing Aid Acoustics">Advanced Diploma in Hearing Aid Acoustics</option>
            Â Â <option value="Certificate in Sport Sciences">Certificate in Sport Sciences</option>
            Â Â <option value="Postgraduate Diploma in Heritage and Museum Studies">Postgraduate Diploma in Heritage and Museum Studies</option>
            Â Â <option value="Advanced University Diploma in Extension and Rural Development">Advanced University Diploma in Extension and Rural Development</option>
            Â Â <option value="University Diploma in Theology">University Diploma in Theology</option>
            Â Â <option value="DipVetNurs (Diploma in Veterinary Nursing)">DipVetNurs (Diploma in Veterinary Nursing)</option>
        </select>

        <input type="submit" name="submit">
        </from>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js" type="text/javascript"></script>
        <script src="<?php //echo base_url(); ?>assets/js/chosen.jquery.js" type="text/javascript"></script>

        <script>
            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "95%"},
                '.chosen-select-height': {height: "20px"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        </script>-->



    <!--
    Advanced Certificate in Education â€“ ACE;Advanced Certificate in Education â€“ ACE
    National Professional Diploma in Education â€“ NPDE;National Professional Diploma in Education â€“ NPDE
    Postgraduate Certificate in Education - PGCE;Postgraduate Certificate in Education - PGCE
    Bachelor of Education - Hons B.Ed;Bachelor of Education - Hons B.Ed
    Master of Education - M.Ed;Master of Education - M.Ed
    Doctor of Philosophy - PhD;Doctor of Philosophy - PhD
    Bachelor of Arts in Communication - BA Com;Bachelor of Arts in Communication - BA Com
    Bachelor of Arts (Social Work) - BA SW;Bachelor of Arts (Social Work) - BA SW
    Bachelor of Arts (Conservation, Tourism, and Sustainable Development) - BA (CTSD);Bachelor of Arts (Conservation, Tourism, and Sustainable Development) - BA (CTSD)
    Bachelor of Arts (Indigenous Knowledge Systems) - BA (IKS);Bachelor of Arts (Indigenous Knowledge Systems) - BA (IKS)
    Bachelor of Arts (Peace Studies and International Relations) - BA (PEC);Bachelor of Arts (Peace Studies and International Relations) - BA (PEC)
    Bachelor of Social Science - B Soc Sc;Bachelor of Social Science - B Soc Sc
    Bachelor of Arts (Honours) - BA (Hons);Bachelor of Arts (Honours) - BA (Hons)
    Bachelor of Arts (Honours) in Communication - BA Com (Hons);Bachelor of Arts (Honours) in Communication - BA Com (Hons)
    Bachelor of Arts (Honours) in Translation and Interpreting - BA Hons (Trans & Interpr);Bachelor of Arts (Honours) in Translation and Interpreting - BA Hons (Trans & Interpr)
    Bachelor of Social Science (Honours) - B Soc Sc (Hons);Bachelor of Social Science (Honours) - B Soc Sc (Hons)
    Bachelor of Arts (Honours) in Theology - BA Hons (Theology);Bachelor of Arts (Honours) in Theology - BA Hons (Theology)
    Master of Arts (by Course Work) - MA;Master of Arts (by Course Work) - MA
    Master of Arts in Applied Communication - MA (App. Com);Master of Arts in Applied Communication - MA (App. Com)
    Master of Arts in Indigenous Knowledge Systems - MA (IKS);Master of Arts in Indigenous Knowledge Systems - MA (IKS)
    Master of Arts in Peace Studies and International Relations- MA (PEC);Master of Arts in Peace Studies and International Relations- MA (PEC)
    Master of Arts (Social Work) - MSW;Master of Arts (Social Work) - MSW
    Master of Philosophy - M Phil;Master of Philosophy - M Phil
    Master of Social Science - M Soc Sc;Master of Social Science - M Soc Sc
    Master of Social Science (by Course Work) - M Soc Sc;Master of Social Science (by Course Work) - M Soc Sc
    Master of Social Science (Clinical Psychology) - M Soc Sc (CP);Master of Social Science (Clinical Psychology) - M Soc Sc (CP)
    Master of Theology - MTh;Master of Theology - MTh
    Doctor of Literature - DLitt;Doctor of Literature - DLitt
    Doctor of Philosophy - PhD;Doctor of Philosophy - PhD
    Doctor of Theology - PhD;Doctor of Theology - PhD
    Bachelor of Law (LLB);Bachelor of Law (LLB)
    Bachelor of Laws;Bachelor of Laws
    Master of Laws (Dissertation);Master of Laws (Dissertation)
    Master of Laws (Labour and Social Security Law);Master of Laws (Labour and Social Security Law)
    Master of Philosophy (MPhil);Master of Philosophy (MPhil)
    Doctor of Laws (LLD);Doctor of Laws (LLD)
    Doctor of Philosophy (PhD);Doctor of Philosophy (PhD)
    Diploma in Agric Crop Science;Diploma in Agric Crop Science
    Diploma in Animal Health;Diploma in Animal Health
    Diploma in Animal Science;Diploma in Animal Science
    Bachelor of Nursing (BN);Bachelor of Nursing (BN)
    Bachelor of Nursing Science (BNSc);Bachelor of Nursing Science (BNSc)
    Bachelor of Science in Agriculture (Animal Science) - BSc Agric (Animal Sci);Bachelor of Science in Agriculture (Animal Science) - BSc Agric (Animal Sci)
    Bachelor of Science in Agriculture (Agric Economics) - BSc Agric (Agric Economics);Bachelor of Science in Agriculture (Agric Economics) - BSc Agric (Agric Economics)
    Bachelor of Science in Agriculture (Animal Health) - BSc Agric (Animal Health);Bachelor of Science in Agriculture (Animal Health) - BSc Agric (Animal Health)
    Bachelor of Science in Agriculture (Crop Science) - BSc Agric (Crop Sci);Bachelor of Science in Agriculture (Crop Science) - BSc Agric (Crop Sci)
    Bachelor of Science (Land Management) - BSc (Land Management);Bachelor of Science (Land Management) - BSc (Land Management)
    Postgraduate Diploma in Agricultural Economics and Management - PGD (Agriculture);Postgraduate Diploma in Agricultural Economics and Management - PGD (Agriculture)
    Postgraduate Diploma in Agricultural Extension - PGD (Agric Ext);Postgraduate Diploma in Agricultural Extension - PGD (Agric Ext)
    Bachelor of Nursing Science (Honours) - BNSc Hons;Bachelor of Nursing Science (Honours) - BNSc Hons
    Bachelor of Science (Honours) (Agricultural Economics and Management) - BSc Agric;Bachelor of Science (Honours) (Agricultural Economics and Management) - BSc Agric
    Hons (Agric Econ & Man);Hons (Agric Econ & Man)
    Bachelor of Science (Honours) (Agricultural Extension) - BSc Agric Hons (Agric Ext);Bachelor of Science (Honours) (Agricultural Extension) - BSc Agric Hons (Agric Ext)
    Bachelor of Science (Honours) in Agriculture (Animal Science) - BSc Hons (Animal Sci);Bachelor of Science (Honours) in Agriculture (Animal Science) - BSc Hons (Animal Sci)
    Bachelor of Science (Honours) in Agriculture (Crop Science) - BSc Hons (Crop Sci);Bachelor of Science (Honours) in Agriculture (Crop Science) - BSc Hons (Crop Sci)
    Bachelor of Science (Honours) in Agriculture (Animal Health) - BSc Hons (Animal Health);Bachelor of Science (Honours) in Agriculture (Animal Health) - BSc Hons (Animal Health)
    Bachelor of Science (Honours) in Land Management - BSc Hons (Land Management);Bachelor of Science (Honours) in Land Management - BSc Hons (Land Management)
    Master of Science in Agriculture - MSc (Agric);Master of Science in Agriculture - MSc (Agric)
    Master of Science (Applied Radiation Science and Technology) - MSc (ARST);Master of Science (Applied Radiation Science and Technology) - MSc (ARST)
    Doctor of Philosophy - PhD;Doctor of Philosophy - PhD
    Doctor of Science - DSc;Doctor of Science - DSc
    Doctor of Philosophy (Agriculture) - PhD (Agric);Doctor of Philosophy (Agriculture) - PhD (Agric)
    BCom Chartered Accountancy (CA (SA));BCom Chartered Accountancy (CA (SA))
    Extended BCom Chartered Accountancy (CA (SA));Extended BCom Chartered Accountancy (CA (SA))
    BCom Financial Accountancy (SAIPA);BCom Financial Accountancy (SAIPA)
    BCom Management Accountancy;BCom Management Accountancy
    BCom Accounting;BCom Accounting
    BCom Accounting and Informatics;BCom Accounting and Informatics
    BCom Economics and Informatics;BCom Economics and Informatics
    BCom Economics and International Trade;BCom Economics and International Trade
    BCom Economics and Bank Risk Management;BCom Economics and Bank Risk Management
    BCom Economics, Bank Risk Management and Investment;BCom Economics, Bank Risk Management and Investment
    BCom Business Management;BCom Business Management
    BCom Marketing Management;BCom Marketing Management
    BSc in IT;BSc in IT
    BSc Computer Science and Economics;BSc Computer Science and Economics
    BSc Computer Science and Statistics;BSc Computer Science and Statistics
    Extended BSc in IT;Extended BSc in IT
    Extended BSc in Data Mining;Extended BSc in Data Mining
    BSc Quantitative Risk Management;BSc Quantitative Risk Management
    BSc Financial Mathematics;BSc Financial Mathematics
    BSc Data Mining / Business Intelligence;BSc Data Mining / Business Intelligence
    Honours BCom Chartered Accountancy (CA (SA));Honours BCom Chartered Accountancy (CA (SA))
    Honours BSc Information Technology;Honours BSc Information Technology
    Honours BCom Economics;Honours BCom Economics
    Honours BCom Economics and Bank Risk Management;Honours BCom Economics and Bank Risk Management
    Honours BCom Business Management;Honours BCom Business Management
    Honours BCom Marketing Management;Honours BCom Marketing Management 
    MCom Accountancy;MCom Accountancy
    MCom Business Management;MCom Business Management
    MCom Marketing Management;MCom Marketing Management
    MCom Economics;MCom Economics
    MSc Information Technology;MSc Information Technology
    MSc Operational Research;MSc Operational Research
    PhD Accountancy;PhD Accountancy
    PhD Bank Risk Business Management;PhD Bank Risk Business Management
    PhD Marketing Management;PhD Marketing Management
    PhD Economics;PhD Economics
    PhD Information Technology;PhD Information Technology
    PhD Operational Research;PhD Operational Research
    Diploma in Sport Science;Diploma in Sport Science
    Certificate in Marketing;Certificate in Marketing
    Advanced Certificate in Marketing;Advanced Certificate in Marketing
    Certificate in Financial Management;Certificate in Financial Management
    Management Skills 1;Management Skills 1
    Management Skills 2;Management Skills 2
    Diploma in Sports Science;Diploma in Sports Science	
    BEng (Chemical Engineering);BEng (Chemical Engineering)
    BEng (Civil Engineering);BEng (Civil Engineering)
    BEng (Computer Engineering);BEng (Computer Engineering)
    BEng (Electrical Engineering);BEng (Electrical Engineering)
    BEng (Electronic Engineering);BEng (Electronic Engineering)
    BEng (Industrial Engineering);BEng (Industrial Engineering)
    BEng (Mechanical Engineering);BEng (Mechanical Engineering)
    BEng (Metallurgical Engineering);BEng (Metallurgical Engineering)
    BEng (Mining Engineering);BEng (Mining Engineering)
    BIS (Information Science);BIS (Information Science)
    BIS in Multimedia (Four Year Programme);BIS in Multimedia (Four Year Programme)
    BIS (Multimedia);BIS (Multimedia)
    BIS (Publishing);BIS (Publishing)
    BIT - Bachelor of Information Technology;BIT - Bachelor of Information Technology	
    BScArch - Bachelor of Science Architecture;BScArch - Bachelor of Science Architecture	
    BSc (Computer Science);BSc (Computer Science)
    BSc - Construction Management;BSc - Construction Management
    BScInt - Bachelor of Science Interior Architecture;BScInt - Bachelor of Science Interior Architecture
    BScIT (Information and Knowledge Systems);BScIT (Information and Knowledge Systems)
    BScIT (Information and Knowledge Systems) (Four Year Programme);BScIT (Information and Knowledge Systems) (Four Year Programme)
    BScLArch - Bachelor of Science Landscape Architecture;BScLArch - Bachelor of Science Landscape Architecture
    BScQS - Bachelor of Science Quantity Surveying;BScQS - Bachelor of Science Quantity Surveying
    BSc Real Estate;BSc Real Estate
    BT&RP - Bachelor of Town and Regional Planning;BT&RP - Bachelor of Town and Regional Planning
    Engineering Augmented Degree Programme (ENGAGE);Engineering Augmented Degree Programme (ENGAGE)
    new;new
    BAdmin (International Relations);BAdmin (International Relations)
    BAdmin (Public Management);BAdmin (Public Management)
    BAdmin (Public Management) Option: Public Administration;BAdmin (Public Management) Option: Public Administration	
    BCom (Agribusiness Management);BCom (Agribusiness Management)
    BCom (Business Management);BCom (Business Management)
    BCom (Communication Management);BCom (Communication Management)
    BCom (Econometrics);BCom (Econometrics)
    BCom (Entrepreneurship);BCom (Entrepreneurship)
    BCom (Extended programme);BCom (Extended programme)
    BCom (Financial Sciences);BCom (Financial Sciences)
    BCom (Human Resource Management);BCom (Human Resource Management)	
    BCom (Informatics);BCom (Informatics)
    BCom (Investment Management);BCom (Investment Management)
    BCom (Law);BCom (Law)
    BCom Option: Supply Chain Management;BCom Option: Supply Chain Management	
    BCom (Recreation and Sport Management);BCom (Recreation and Sport Management)
    BCom (Statistics);BCom (Statistics)
    BCom (Tourism Management);BCom (Tourism Management)	
    BEd (Early Childhood Development and Foundation Phase);BEd (Early Childhood Development and Foundation Phase)
    BEd (FET) (Economic and Management Sciences);BEd (FET) (Economic and Management Sciences)
    BEd (FET) (General);BEd (FET) (General)
    BEd (FET) (Human Movement Science and Sport Management);BEd (FET) (Human Movement Science and Sport Management)
    BEd (FET) (Natural Sciences);BEd (FET) (Natural Sciences)
    BEd (Intermediate Phase);BEd (Intermediate Phase)
    BEd (Senior Phase);BEd (Senior Phase)	
    BChD - Bachelor of Dentistry;BChD - Bachelor of Dentistry
    BClinical Medical Practice â€“ Bachelor of Clinical Medical Practice;BClinical Medical Practice â€“ Bachelor of Clinical Medical Practice
    BCur â€“ Bachelor of Nursing Science;BCur â€“ Bachelor of Nursing Science
    BCur (I et A) Education and Administration;BCur (I et A) Education and Administration
    BDietetics â€“ Bachelor of Dietetics;BDietetics â€“ Bachelor of Dietetics
    BOccTher â€“ Bachelor of Occupational Therapy;BOccTher â€“ Bachelor of Occupational Therapy
    BOH â€“ Bachelor of Oral Hygiene;BOH â€“ Bachelor of Oral Hygiene
    BPhysT â€“ Bachelor of Physiotherapy;BPhysT â€“ Bachelor of Physiotherapy
    BRad - Bachelor of Radiography;BRad - Bachelor of Radiography
    MBChB â€“ Bachelor of Medicine and Surgery;MBChB â€“ Bachelor of Medicine and Surgery
    BA (Drama);BA (Drama)
    BA (Extended programme);BA (Extended programme)
    BA (Fine Arts);BA (Fine Arts)
    BA - General;BA - General
    BA - General (Psychology);BA - General (Psychology)
    BA (Human Movement Science);BA (Human Movement Science)
    BA Human Movement Science Option: Sports Psychology;BA Human Movement Science Option: Sports Psychology
    BA (Information Design);BA (Information Design)
    BA Languages (English Studies);BA Languages (English Studies)
    BA (Music);BA (Music)
    BA (Visual Studies);BA (Visual Studies)
    BCommunication Pathology (Audiology);BCommunication Pathology (Audiology)
    BCommunication Pathology (Speech-Language Pathology);BCommunication Pathology (Speech-Language Pathology)
    BHCS (Heritage and Cultural Tourism);BHCS (Heritage and Cultural Tourism)
    BMus - Bachelor of Music;BMus - Bachelor of Music
    BPolSci (International Studies);BPolSci (International Studies)
    BPolSci (Political Studies);BPolSci (Political Studies)
    BSocSci (Industrial Sociology and Labour Studies);BSocSci (Industrial Sociology and Labour Studies)
    BSportSci - Bachelor of Sports Sciences;BSportSci - Bachelor of Sports Sciences
    BSport Sciences with Option Golf;BSport Sciences with Option Golf
    BSW - Bachelor of Social Work;BSW - Bachelor of Social Work
    BConsumer Science (Clothing: Retail Management);BConsumer Science (Clothing: Retail Management)
    BConsumer Science (Foods: Retail Management);BConsumer Science (Foods: Retail Management)
    BConsumer Science (Hospitality Management);BConsumer Science (Hospitality Management)
    BSc (Actuarial and Financial Mathematics);BSc (Actuarial and Financial Mathematics)
    BScAgric (Agricultural Economics/Agribusiness Management);BScAgric (Agricultural Economics/Agribusiness Management)
    BScAgric (Animal Science);BScAgric (Animal Science)
    BScAgric (Animal Science/Pasture Science);BScAgric (Animal Science/Pasture Science)
    BScAgric (Applied Plant and Soil Sciences);BScAgric (Applied Plant and Soil Sciences)
    BScAgric (Food Science and Technology);BScAgric (Food Science and Technology)
    BScAgric (Plant Pathology);BScAgric (Plant Pathology)
    BSc (Applied Mathematics);BSc (Applied Mathematics)
    BSc (Biochemistry);BSc (Biochemistry)
    BSc (Biological Sciences);BSc (Biological Sciences)
    BSc (Biotechnology);BSc (Biotechnology)
    BSc (Chemistry);BSc (Chemistry)
    BSc (Ecology);BSc (Ecology)
    BSc (Entomology);BSc (Entomology)
    BSc (Environmental and Engineering Geology);BSc (Environmental and Engineering Geology)
    BSc (Environmental Sciences);BSc (Environmental Sciences)
    BSc (Food Management);BSc (Food Management)
    BSc (Food Science);BSc (Food Science)
    BSc (Four-year programme) â€“ Biological and Agricultural Sciences;BSc (Four-year programme) â€“ Biological and Agricultural Sciences
    BSc (Four-year programme) â€“ Mathematical Sciences;BSc (Four-year programme) â€“ Mathematical Sciences
    BSc (Four-year programme) â€“ Physical Sciences;BSc (Four-year programme) â€“ Physical Sciences
    BSc (Genetics);BSc (Genetics)
    BSc (Geography);BSc (Geography)
    BSc (Geoinformatics);BSc (Geoinformatics)
    BSc (Geology);BSc (Geology)
    BSc (Human Genetics);BSc (Human Genetics)
    BSc (Human Physiology);BSc (Human Physiology)
    BSc (Human Physiology, Genetics and Psychology);BSc (Human Physiology, Genetics and Psychology)
    BSc (Mathematical Statistics);BSc (Mathematical Statistics)
    BSc (Mathematics);BSc (Mathematics)
    BSc (Medical Sciences);BSc (Medical Sciences)
    BSc (Meteorology);BSc (Meteorology)
    BSc (Microbiology);BSc (Microbiology)
    BSc (Nutrition);BSc (Nutrition)
    BSc (Physics);BSc (Physics)
    BSc (Plant Science);BSc (Plant Science)
    BSc (Zoology);BSc (Zoology)	
    BA (Theology) Bachelor of Arts in Theology;BA (Theology) Bachelor of Arts in Theology	
    BTh - Bachelor of Theology;BTh - Bachelor of Theology
    BVSc (University degree in Veterinary Science);BVSc (University degree in Veterinary Science)
    BAdminHons (Municipal Administration);BAdminHons (Municipal Administration)
    BAdminHons (Public Administration);BAdminHons (Public Administration)
    BAdminHons (Public Management);BAdminHons (Public Management)
    BComHons (Accounting Sciences);BComHons (Accounting Sciences)
    BComHons (Agricultural Economics);BComHons (Agricultural Economics)
    BComHons (Business Management);BComHons (Business Management)
    BComHons (Communication Management);BComHons (Communication Management)
    BComHons (Econometrics);BComHons (Econometrics)
    BComHons (Economics);BComHons (Economics)
    BComHons (Financial Management Sciences);BComHons (Financial Management Sciences)
    BComHons (Human Resource Management);BComHons (Human Resource Management)
    BComHons (Informatics);BComHons (Informatics)
    BComHons (Internal Auditing);BComHons (Internal Auditing)
    BComHons (Investment Management);BComHons (Investment Management)
    BComHons (Marketing Management);BComHons (Marketing Management)
    BComHons (Mathematical Statistics);BComHons (Mathematical Statistics)
    BComHons (Option: Taxation);BComHons (Option: Taxation)
    BComHons (Recreation and Sport Management);BComHons (Recreation and Sport Management)
    BComHons (Statistics);BComHons (Statistics)
    BComHons (Tourism Management);BComHons (Tourism Management)
    DAdmin Municipal Administration;DAdmin Municipal Administration
    DAdmin Public Administration;DAdmin Public Administration
    DAdmin Public Management;DAdmin Public Management
    DCom Accounting Sciences;DCom Accounting Sciences
    DCom Agricultural Economics;DCom Agricultural Economics
    DCom Business Management;DCom Business Management
    DCom Communication Management;DCom Communication Management
    DCom Econometrics;DCom Econometrics
    DCom Economics
    DCom Financial Management Sciences;DCom Financial Management Sciences
    DCom Human Resource Management;DCom Human Resource Management
    DCom Informatics;DCom Informatics
    DCom Internal Auditing;DCom Internal Auditing
    DCom Marketing Management;DCom Marketing Management
    DCom Mathematical Statistics;DCom Mathematical Statistics
    DCom Statistics;DCom Statistics;
    DCom Tourism Management;DCom Tourism Management
    MAdmin Municipal Administration (Dissertation);MAdmin Municipal Administration (Dissertation)
    MAdmin Public Administration (Dissertation);MAdmin Public Administration (Dissertation)
    MAdmin Public Management (Dissertation);MAdmin Public Management (Dissertation)
    MCom Accounting Sciences (Coursework);MCom Accounting Sciences (Coursework)
    MCom Accounting Sciences (Dissertation);MCom Accounting Sciences (Dissertation)
    MCom Agricultural Economics (Dissertation);MCom Agricultural Economics (Dissertation)
    MCom Business Management (Dissertation);MCom Business Management (Dissertation)
    MCom Communication Management (Coursework);MCom Communication Management (Coursework)
    MCom Communication Management (Dissertation);MCom Communication Management (Dissertation)
    MCom Econometrics (Coursework);MCom Econometrics (Coursework)
    MCom Econometrics (Dissertation);MCom Econometrics (Dissertation)
    MCom Economics (Coursework);MCom Economics (Coursework)
    MCom Economics (Dissertation);MCom Economics (Dissertation)
    MCom Economics of Trade and Investment (Coursework);MCom Economics of Trade and Investment (Coursework)
    MCom Economics of Trade and Investment (Dissertation);MCom Economics of Trade and Investment (Dissertation)
    MCom Financial Management Sciences (Coursework);MCom Financial Management Sciences (Coursework)
    MCom Financial Management Sciences (Dissertation);MCom Financial Management Sciences (Dissertation)
    MCom Human Resource Management (Coursework);MCom Human Resource Management (Coursework)
    MCom Industrial Psychology (Coursework);MCom Industrial Psychology (Coursework)
    MCom Informatics (Coursework);MCom Informatics (Coursework)
    MCom Informatics (Dissertation);MCom Informatics (Dissertation)
    MCom Internal Auditing (Dissertation);MCom Internal Auditing (Dissertation)
    MCom Marketing Management (Coursework);MCom Marketing Management (Coursework)
    MCom Marketing Management (Dissertation);MCom Marketing Management (Dissertation)
    MCom Mathematical Statistics (Coursework);MCom Mathematical Statistics (Coursework)
    MCom Mathematical Statistics (Dissertation);MCom Mathematical Statistics (Dissertation)
    MCom Recreation and Sport Management (Dissertation);MCom Recreation and Sport Management (Dissertation)
    MCom Statistics (Coursework);MCom Statistics (Coursework)
    MCom Statistics (Dissertation);MCom Statistics (Dissertation)
    MCom Taxation (Coursework);MCom Taxation (Coursework)
    MCom Taxation (Dissertation);MCom Taxation (Dissertation)
    MCom Tourism Management (Dissertation);MCom Tourism Management (Dissertation)
    MPA Master of Public Administration (Coursework);MPA Master of Public Administration (Coursework)
    MPhil Accounting Sciences Option: Fraud Risk Management (Coursework);MPhil Accounting Sciences Option: Fraud Risk Management (Coursework)
    MPhil Agricultural Economics (Coursework);MPhil Agricultural Economics (Coursework)
    MPhil Business Management Option: Enterprise Risk Management (Coursework);MPhil Business Management Option: Enterprise Risk Management (Coursework)
    MPhil Business Management Option: Responsible Leadership (Coursework);MPhil Business Management Option: Responsible Leadership (Coursework)
    MPhil Business Management Option: Strategic Management (Coursework);MPhil Business Management Option: Strategic Management (Coursework)
    MPhil Business Management Option: Supply Chain Management (Coursework);MPhil Business Management Option: Supply Chain Management (Coursework)
    MPhil Economics (Coursework);MPhil Economics (Coursework)
    MPhil Entrepreneurship (Coursework);MPhil Entrepreneurship (Coursework)
    MPhil in Communication Management (Coursework);MPhil in Communication Management (Coursework)
    MPhil in Communication Management (Dissertation);MPhil in Communication Management (Dissertation)
    MPhil Informatics (Coursework);MPhil Informatics (Coursework)
    MPhil in Human Resource Management (Coursework);MPhil in Human Resource Management (Coursework)
    MPhil in Labour Relations (Coursework);MPhil in Labour Relations (Coursework)
    MPhil in Marketing Management option Marketing Research;MPhil in Marketing Management option Marketing Research
    MPhil in Public Policy (Dissertation);MPhil in Public Policy (Dissertation)
    MPhil in Taxation (Coursework);MPhil in Taxation (Coursework)
    MPhil Internal Auditing (Coursework);MPhil Internal Auditing (Coursework)
    MPhil Tourism Managent (Dissertation);MPhil Tourism Managent (Dissertation)
    PhD Accounting Sciences;PhD Accounting Sciences
    PhD Agricultural Economics;PhD Agricultural Economics
    PhD Communication Management;PhD Communication Management
    PhD Econometrics;PhD Econometrics
    PhD Economics;PhD Economics
    PhD Entrepreneurship;PhD Entrepreneurship
    PhD Human Resource Management;PhD Human Resource Management
    PhD in Business Management;PhD in Business Management
    PhD in Financial Management Sciences;PhD in Financial Management Sciences
    PhD in Informatics;PhD in Informatics
    PhD in Public Administration;PhD in Public Administration
    PhD in Public Management;PhD in Public Management
    PhD Internal Auditing;PhD Internal Auditing
    PhD Labour Relations Management;PhD Labour Relations Management
    PhD Marketing Management;PhD Marketing Management
    PhD Mathematical Statistics;PhD Mathematical Statistics
    PhD Municipal Administration;PhD Municipal Administration
    PhD Option: Fraud Risk Management;PhD Option: Fraud Risk Management
    PhD Option: Industrial and Organisational Psychology;PhD Option: Industrial and Organisational Psychology
    PhD Option: Taxation;PhD Option: Taxation
    PhD Option: Tax Policy;PhD Option: Tax Policy
    PhD Organisational Behaviour;PhD Organisational Behaviour
    PhD Statistics;PhD Statistics
    PhD Tourism Management;PhD Tourism Management
    BEd (Hons) Assessment and Quality Assurance in Education and Training	
    BEd (Hons) Computer-integrated Education;BEd (Hons) Computer-integrated Education
    BEd (Hons) Curriculum and Instructional Design and Development;BEd (Hons) Curriculum and Instructional Design and Development
    BEd (Hons) Educational Psychology;BEd (Hons) Educational Psychology
    BEd (Hons) Education Management, Law and Policy;BEd (Hons) Education Management, Law and Policy
    BEd (Hons) Learning Support;BEd (Hons) Learning Support
    BEd (Hons) Science and Mathematics Education;BEd (Hons) Science and Mathematics Education
    MEd Adult and Community Education and Training (Dissertation);MEd Adult and Community Education and Training (Dissertation)
    MEd Assessment and Quality Assurance in Education and Training (Dissertation);MEd Assessment and Quality Assurance in Education and Training (Dissertation)
    MEd Curriculum and Instructional Design and Development (Dissertation);MEd Curriculum and Instructional Design and Development (Dissertation)
    MEd Educational Leadership (Coursework);MEd Educational Leadership (Coursework)
    MEd Educational Psychology (Coursework);MEd Educational Psychology (Coursework)
    MEd Education Management, Law and Policy (Dissertation);MEd Education Management, Law and Policy (Dissertation)
    MEd General (Dissertation);MEd General (Dissertation)
    MEd Learning Support, Guidance and Counselling (Dissertation);MEd Learning Support, Guidance and Counselling (Dissertation)
    PhD Adult and Community Education and Training;PhD Adult and Community Education and Training
    PhD Assessment and Quality Assurance in Education and Training;PhD Assessment and Quality Assurance in Education and Training
    PhD Computer-integrated Education;PhD Computer-integrated Education
    PhD Curriculum and Instructional Design and Development;PhD Curriculum and Instructional Design and Development
    PhD Doctor of Philosophy;PhD Doctor of Philosophy
    PhD Educational Psychology;PhD Educational Psychology
    PhD Education Management, Law and Policy;PhD Education Management, Law and Policy
    PhD Education Policy Studies;PhD Education Policy Studies
    PhD Learning Support, Guidance and Counselling;PhD Learning Support, Guidance and Counselling
    BArchHons (Bachelor of Architecture Honours);BArchHons (Bachelor of Architecture Honours)
    BEngHons (Bioengineering);BEngHons (Bioengineering)
    BEngHons (Chemical Engineering);BEngHons (Chemical Engineering)
    BEngHons (Computer Engineering);BEngHons (Computer Engineering)
    BEngHons (Control Engineering);BEngHons (Control Engineering)
    BEngHons (Electrical Engineering);BEngHons (Electrical Engineering)
    BEngHons (Electronic Engineering);BEngHons (Electronic Engineering)
    BEngHons (Environmental Engineering);BEngHons (Environmental Engineering)
    BEngHons (Geotechnical Engineering);BEngHons (Geotechnical Engineering)
    BEngHons (Industrial Engineering);BEngHons (Industrial Engineering)
    BEngHons (Mechanical Engineering);BEngHons (Mechanical Engineering)
    BEngHons (Metallurgical Engineering);BEngHons (Metallurgical Engineering)
    BEngHons (Micro-electronic Engineering);BEngHons (Micro-electronic Engineering)
    BEngHons (Mining Engineering);BEngHons (Mining Engineering)
    BEngHons (Structural Engineering);BEngHons (Structural Engineering)
    BEngHons (Technology Management);BEngHons (Technology Management)
    BEngHons (Transportation Engineering);BEngHons (Transportation Engineering)
    BEngHons (Water Resources Engineering);BEngHons (Water Resources Engineering)
    BEngHons (Water Utilisation Engineering);BEngHons (Water Utilisation Engineering)
    BIS (Hons) in Information Science;BIS (Hons) in Information Science
    BIS (Hons) in Multimedia;BIS (Hons) in Multimedia
    BIS (Hons) in Publishing;BIS (Hons) in Publishing
    BLHons Landscape Architecture;BLHons Landscape Architecture
    BlntHons Interior Architecture;BlntHons Interior Architecture
    BScHons (Applied Science) (Architecture);BScHons (Applied Science) (Architecture)
    BScHons (Applied Science) (Chemical Technology);BScHons (Applied Science) (Chemical Technology)
    BScHons (Applied Science) (Control);BScHons (Applied Science) (Control)
    BScHons (Applied Science) (Environmental Technology);BScHons (Applied Science) (Environmental Technology)
    BScHons (Applied Science) (Geotechnics);BScHons (Applied Science) (Geotechnics)
    BSc (Hons) (Applied Science) (Industrial Systems);BSc (Hons) (Applied Science) (Industrial Systems)
    BScHons (Applied Science) (Mechanics);BScHons (Applied Science) (Mechanics)
    BScHons (Applied Science) (Metallurgy);BScHons (Applied Science) (Metallurgy)
    BScHons (Applied Science) (Mining);BScHons (Applied Science) (Mining)
    BScHons (Applied Science) (Structures);BScHons (Applied Science) (Structures)
    BScHons (Applied Science) (Transportation Planning);BScHons (Applied Science) (Transportation Planning)
    BScHons (Applied Science) (Water Resources);BScHons (Applied Science) (Water Resources)
    BScHons (Applied Science) (Water Utilisation);BScHons (Applied Science) (Water Utilisation)
    BSc (Hons) Computer Science;BSc (Hons) Computer Science
    BSc (Hons) Construction Management;BSc (Hons) Construction Management
    BSc (Hons) Quantity Surveying;BSc (Hons) Quantity Surveying
    BSc (Hons) Real Estate;BSc (Hons) Real Estate
    BScHons (Technology Management);BScHons (Technology Management)
    DEng (Doctor of Engineering);DEng (Doctor of Engineering)
    DPhil in Information Science;DPhil in Information Science
    DPhil in Library Science;DPhil in Library Science
    Master of Architecture (Professional);Master of Architecture (Professional)
    Master of Architecture (Research);Master of Architecture (Research)
    Master of Information Technology (Coursework);Master of Information Technology (Coursework)
    Master of Interior Architecture (Professional);Master of Interior Architecture (Professional)
    Master of Interior Architecture (Research);Master of Interior Architecture (Research)
    Master of Landscape Architecture (Professional);Master of Landscape Architecture (Professional)
    Master of Landscape Architecture (Research);Master of Landscape Architecture (Research)
    Master of Town & Regional Planning (Coursework);Master of Town & Regional Planning (Coursework)
    Master of Town & Regional Planning (Dissertation);Master of Town & Regional Planning (Dissertation)
    MCom Informatics (Coursework);MCom Informatics (Coursework)
    MCom Informatics (Research);MCom Informatics (Research)
    MEng (Bioengineering);MEng (Bioengineering)
    MEng Chemical Engineering;MEng Chemical Engineering
    MEng (Computer Engineering);MEng (Computer Engineering)
    MEng Control Engineering;MEng Control Engineering
    MEng (Electrical Engineering);MEng (Electrical Engineering)
    MEng (Electronic Engineering);MEng (Electronic Engineering)
    MEng (Engineering Management);MEng (Engineering Management)
    MEng (Engineering Management) (Coursework);MEng (Engineering Management) (Coursework)
    MEng Environmental Engineering (Dissertation);MEng Environmental Engineering (Dissertation)
    MEng (Geotechnical Engineering);MEng (Geotechnical Engineering)
    MEng (Industrial Engineering) (Dissertation);MEng (Industrial Engineering) (Dissertation)
    MEng (Mechanical Engineering);MEng (Mechanical Engineering)
    MEng (Metallurgical Engineering);MEng (Metallurgical Engineering)
    MEng(Metallurgical Engineering)(Dissertation);MEng(Metallurgical Engineering)(Dissertation)
    MEng (Microelectronic Engineering);MEng (Microelectronic Engineering)
    MEng Mining Engineering (Dissertation);MEng Mining Engineering (Dissertation)
    MEng (Project Management);MEng (Project Management)
    MEng (Project Management) (Dissertation);MEng (Project Management) (Dissertation)
    MEng (Software Engineering);MEng (Software Engineering)
    MEng (Structural Engineering);MEng (Structural Engineering)
    MEng Technology Management;MEng Technology Management
    MEng (Transportation Engineering);MEng (Transportation Engineering)
    MEng (Water Resources Engineering);MEng (Water Resources Engineering)
    MEng Water Utilisation Engineering;MEng Water Utilisation Engineering
    MIS in Information Science (Research);MIS in Information Science (Research)
    MIS in Library Science (Research);MIS in Library Science (Research)
    MIS in Multimedia (Research);MIS in Multimedia (Research)
    MIS in Publishing (Research);MIS in Publishing (Research)
    MSc (Applied Science);MSc (Applied Science)
    MSc (Applied Science) (Architecture);MSc (Applied Science) (Architecture)
    MSc (Applied Science) (Chemical Technology);MSc (Applied Science) (Chemical Technology)
    MSc (Applied Science) Construction Management;MSc (Applied Science) Construction Management
    MSc (Applied Science) (Control);MSc (Applied Science) (Control)
    MSc (Applied Science) (Environmental Technology);MSc (Applied Science) (Environmental Technology)
    MSc (Applied Science) (Geotechnics);MSc (Applied Science) (Geotechnics)
    MSc (Applied Science) (Industrial Systems);MSc (Applied Science) (Industrial Systems)
    MSc (Applied Science) (Mechanics);MSc (Applied Science) (Mechanics)
    MSc (Applied Science) (Metallurgy);MSc (Applied Science) (Metallurgy)
    MSc (Applied Science) (Mine Strata Control);MSc (Applied Science) (Mine Strata Control)
    MSc (Applied Science) (Mining Environmental Control);MSc (Applied Science) (Mining Environmental Control)
    MSc (Applied Science) Quantity Surveying;MSc (Applied Science) Quantity Surveying
    MSc (Applied Science) Real Estate;MSc (Applied Science) Real Estate
    MSc (Applied Science) (Structures);MSc (Applied Science) (Structures)
    MSc (Applied Science) (Transportation Planning);MSc (Applied Science) (Transportation Planning)
    MSc (Applied Science) (Water Resources);MSc (Applied Science) (Water Resources)
    MSc (Applied Science) (Water Utilisation);MSc (Applied Science) (Water Utilisation)
    MSc (Engineering Management);MSc (Engineering Management)
    MSc in Computer Science;MSc in Computer Science
    MSc in Construction Management;MSc in Construction Management
    MSc (Project Management);MSc (Project Management)
    MSc Quantity Surveying;MSc Quantity Surveying
    MSc Real Estate;MSc Real Estate
    MSc Real Estate (Coursework);MSc Real Estate (Coursework)
    MSc (Technology Management);MSc (Technology Management)
    MSc (Technology Management) (Coursework);MSc (Technology Management) (Coursework)
    PhD Architecture;PhD Architecture
    PhD Computer Science;PhD Computer Science
    PhD Construction Management;PhD Construction Management
    PhD (Doctor of Philosophy);PhD (Doctor of Philosophy)
    PhD (Engineering);PhD (Engineering)
    PhD Industrial Engineering;PhD Industrial Engineering
    PhD Information Technology;PhD Information Technology
    PhD Interior Architecture;PhD Interior Architecture
    PhD Landscape Architecture;PhD Landscape Architecture
    PhD Publishing;PhD Publishing
    Phd Quantity Surveying;Phd Quantity Surveying
    Phd Real Estate;Phd Real Estate
    PhD Technology Management;PhD Technology Management
    PhD Town and Regional Planning;PhD Town and Regional Planning
    DBA Doctor of Business Administration;DBA Doctor of Business Administration 
    MBA Master of Business Administration;MBA Master of Business Administration
    BDieteticsHons (Bachelor of Dietetics Honours);BDieteticsHons (Bachelor of Dietetics Honours)
    BRadHons Diagnostics;BRadHons Diagnostics
    BRadHons Nuclear Medicine;BRadHons Nuclear Medicine
    BRadHons Radiation Therapy;BRadHons Radiation Therapy
    BScHons Aerospace Medicine;BScHons Aerospace Medicine
    BScHons Anatomy;BScHons Anatomy
    BScHons Biokinetics;BScHons Biokinetics
    BScHons Biostatistics;BScHons Biostatistics
    BScHons Cell Biology;BScHons Cell Biology
    BScHons Chemical Pathology;BScHons Chemical Pathology
    BScHons Comparitive Anatomy;BScHons Comparitive Anatomy
    BScHons Developmental Biology;BScHons Developmental Biology
    BScHons Haematology;BScHons Haematology
    BScHons Human Cell Biology;BScHons Human Cell Biology
    BScHons Human Genetics;BScHons Human Genetics
    BScHons Human Histology;BScHons Human Histology
    BScHons Human Physiology;BScHons Human Physiology
    BScHons Macro-anatomy;BScHons Macro-anatomy
    BScHons Medical Criminalistics;BScHons Medical Criminalistics
    BScHons Medical Immunology;BScHons Medical Immunology
    BScHons Medical Microbiology;BScHons Medical Microbiology
    BScHons Medical Nuclear Science;BScHons Medical Nuclear Science
    BScHons Medical Oncology;BScHons Medical Oncology
    BScHons Medical Physics;BScHons Medical Physics
    BScHons Medical Virology;BScHons Medical Virology
    BScHons Neuro-anatomy;BScHons Neuro-anatomy
    BScHons Pharmacology;BScHons Pharmacology
    BScHons Physical Anthropology;BScHons Physical Anthropology
    BScHons Radiation Oncology;BScHons Radiation Oncology
    BScHons Reproductive Biology;BScHons Reproductive Biology
    BScHons Reproductive Biology: Andrology;BScHons Reproductive Biology: Andrology
    BScHons Sport Science;BScHons Sport Science
    DCur (Doctor of Nursing);DCur (Doctor of Nursing)
    DOccTher (Doctor of Occupational Therapy);DOccTher (Doctor of Occupational Therapy)
    DSc (Doctor of Science);DSc (Doctor of Science)
    DSc (Doctor of Science) Dietetics;DSc (Doctor of Science) Dietetics
    MChD Community Dentistry;MChD Community Dentistry
    MChD Maxillo-Facial and Oral Surgery;MChD Maxillo-Facial and Oral Surgery
    MChD Maxillo-Facial and Oral Surgery (aa);MChD Maxillo-Facial and Oral Surgery (aa)
    MChD Maxillo-Facial and Oral Surgery (bb);MChD Maxillo-Facial and Oral Surgery (bb)
    MChD Maxillo-Facial and Oral Surgery (cc);MChD Maxillo-Facial and Oral Surgery (cc)
    MChD Oral Pathology;MChD Oral Pathology
    MChD Orthodontics;MChD Orthodontics
    MChD Periodontics and Oral Medicine;MChD Periodontics and Oral Medicine
    MChD Prosthodontics;MChD Prosthodontics
    MCur Clinical Fields of Study;MCur Clinical Fields of Study
    MCur Clinical Fields of Study (Coursework);MCur Clinical Fields of Study (Coursework)
    MCur Nursing Education;MCur Nursing Education
    MCur Nursing Education (Coursework);MCur Nursing Education (Coursework)
    MCur Nursing Management;MCur Nursing Management
    MCur Nursing Management (Coursework);MCur Nursing Management (Coursework)
    MD Anaesthesiology;MD Anaesthesiology
    MD Anatomy;MD Anatomy
    MD Community Health;MD Community Health
    MD Dermatology;MD Dermatology
    MD Family Medicine;MD Family Medicine
    MD Forensic Medicine;MD Forensic Medicine
    MD Geriatrics;MD Geriatrics
    MD Haematology;MD Haematology
    MD Health Systems;MD Health Systems
    MD Human Physiology;MD Human Physiology
    MDietetics (Coursework);MDietetics (Coursework)
    MDietetics (Research);MDietetics (Research)
    MD Internal Medicine;MD Internal Medicine
    MD Medical Microbiology;MD Medical Microbiology
    MD Medical Oncology;MD Medical Oncology
    MD Neurology;MD Neurology
    MD Neurosurgery;MD Neurosurgery
    MD Obstetrics and Gynaecology;MD Obstetrics and Gynaecology
    MD Ophthalmology;MD Ophthalmology
    MD Otorhinolaryngology;MD Otorhinolaryngology
    MD Paediatrics;MD Paediatrics
    MD Pathology;MD Pathology
    MD Pharmacology;MD Pharmacology
    MD Plastic and Reconstructive Surgery;MD Plastic and Reconstructive Surgery
    MD Psychiatry;MD Psychiatry
    MD Public Health;MD Public Health
    MD Radiation Oncology;MD Radiation Oncology
    MD Radiological Diagnostics;MD Radiological Diagnostics
    MD Reproductive Biology;MD Reproductive Biology
    MD Reproductive Biology: Andrology;MD Reproductive Biology: Andrology
    MD Surgery;MD Surgery
    MD Thoracic Surgery;MD Thoracic Surgery
    MD Urology;MD Urology
    MECI Master of Early Childhood Intervention;MECI Master of Early Childhood Intervention
    MMed Anaesthesiology;MMed Anaesthesiology
    MMed Dermatology;MMed Dermatology
    MMed Emergency Medicine;MMed Emergency Medicine
    MMed Family Medicine;MMed Family Medicine
    MMed Geriatics;MMed Geriatics
    MMed Internal Medicine;MMed Internal Medicine
    MMed Medical Oncology;MMed Medical Oncology
    MMed Neurology;MMed Neurology
    MMed Neurosurgery;MMed Neurosurgery
    MMed Nuclear Medicine;MMed Nuclear Medicine
    MMed Obstetrics and Gynaecology;MMed Obstetrics and Gynaecology
    MMed Ophthalmology;MMed Ophthalmology
    MMed Orthopaedics;MMed Orthopaedics
    MMed Otorhinolaryngology;MMed Otorhinolaryngology
    MMed Paediatrics;MMed Paediatrics
    MMed Pathology: Anatomical Pathology;MMed Pathology: Anatomical Pathology
    MMed Pathology: Chemical Pathology;MMed Pathology: Chemical Pathology
    MMed Pathology: Clinical Pathology;MMed Pathology: Clinical Pathology
    MMed Pathology: Forensic Pathology;MMed Pathology: Forensic Pathology
    MMed Pathology: Haematology;MMed Pathology: Haematology
    MMed Pathology: Medical Microbiology;MMed Pathology: Medical Microbiology
    MMed Pathology: Medical Virology;MMed Pathology: Medical Virology
    MMed Plastic Surgery;MMed Plastic Surgery
    MMed Psychiatry;MMed Psychiatry
    MMed Public Health Medicine;MMed Public Health Medicine
    MMed Radiation Oncology;MMed Radiation Oncology
    MMed Radiological Diagnostics;MMed Radiological Diagnostics
    MMed Surgery;MMed Surgery
    MMed Surgery Option: Paediatric Surgery;MMed Surgery Option: Paediatric Surgery
    MMed Thoracic Surgery;MMed Thoracic Surgery
    MMed Urology;MMed Urology
    MMilMed (Master of Military Medicine);MMilMed (Master of Military Medicine)
    MOccTher Activity Theory;MOccTher Activity Theory
    MOccTher Hand Therapy;MOccTher Hand Therapy
    MOccTher Neurology;MOccTher Neurology
    MOccTher Paediatrics;MOccTher Paediatrics
    MOccTher Psychiatry;MOccTher Psychiatry
    MOccTher (Research);MOccTher (Research)
    MPharmMed (Master of Medical Pharmacology);MPharmMed (Master of Medical Pharmacology)
    MPhil Pain Management;MPhil Pain Management
    MPhil Philosophy and Ethics of Mental Health;MPhil Philosophy and Ethics of Mental Health
    MPH (Master of Public Health);MPH (Master of Public Health)
    MPhysT (Internal Medicine);MPhysT (Internal Medicine)
    MPhysT (Neurology/Neurosurgery);MPhysT (Neurology/Neurosurgery)
    MPhysT (Orthopaedic Manual Therapy);MPhysT (Orthopaedic Manual Therapy)
    MPhysT (Orthopaedics);MPhysT (Orthopaedics)
    MPhysT (Paediatrics);MPhysT (Paediatrics)
    MPhysT (Research);MPhysT (Research)
    MPhysT (Sports Medicine);MPhysT (Sports Medicine)
    MPhysT (Surgery);MPhysT (Surgery)
    MPhysT (Women's Health);MPhysT (Women's Health)
    MRad Diagnostics;MRad Diagnostics
    MRad Nuclear Medicine;MRad Nuclear Medicine
    MRad Radiation Therapy;MRad Radiation Therapy
    MSc Aerospace Medicine;MSc Aerospace Medicine
    MSc Anatomy;MSc Anatomy
    MSc Applied Human Nutrition;MSc Applied Human Nutrition
    MSc Biostatistics (Public Health);MSc Biostatistics (Public Health)
    MSc Cell Biology;MSc Cell Biology
    MSc Chemical Pathology;MSc Chemical Pathology
    MSc Clinical Epidemiology;MSc Clinical Epidemiology
    MSc Community Health;MSc Community Health
    MScDent General;MScDent General
    MScDent Maxillo facial and Oral Radiology;MScDent Maxillo facial and Oral Radiology
    MScDent Oral Surgery;MScDent Oral Surgery
    MSc Epidemiology;MSc Epidemiology
    MSc Haematology;MSc Haematology
    MSc Human Genetics;MSc Human Genetics
    MSc Human Physiology;MSc Human Physiology
    MSc Medical Applied Psychology;MSc Medical Applied Psychology
    MSc Medical Criminalistics;MSc Medical Criminalistics
    MSc Medical Immunology;MSc Medical Immunology
    MSc Medical Microbiology;MSc Medical Microbiology
    MSc Medical Nuclear Science;MSc Medical Nuclear Science
    MSc Medical Oncology;MSc Medical Oncology
    MSc Medical Physics;MSc Medical Physics
    MSc Medical Virology;MSc Medical Virology
    MSc Pharmacology;MSc Pharmacology
    MSc Radiation Oncology;MSc Radiation Oncology
    MSc Reproductive Biology;MSc Reproductive Biology
    MSc Reproductive Biology: Andrology;MSc Reproductive Biology: Andrology
    MSc Sport Science;MSc Sport Science
    MSc Sports Medicine;MSc Sports Medicine
    PhD Anaesthesiology;PhD Anaesthesiology
    PhD Anatomical Pathology;PhD Anatomical Pathology
    PhD Anatomy;PhD Anatomy;PhD Anatomy;PhD Anatomy
    PhD Chemical Pathology;PhD Chemical Pathology
    PhD Community Health;PhD Community Health
    PhD (Dentistry);PhD (Dentistry)
    PhD Diagnostic Radiology;PhD Diagnostic Radiology
    PhD Dietetics;PhD Dietetics
    PhD Environmental Health;PhD Environmental Health
    PhD Epidemiology;PhD Epidemiology
    PhD Family Medicine;PhD Family Medicine
    PhD Forensic Pathology;PhD Forensic Pathology
    PhD Health Ethics;PhD Health Ethics
    PhD Health Systems;PhD Health Systems
    PhD Human Genetics;PhD Human Genetics
    PhD Internal Medicine;PhD Internal Medicine
    PhD Medical Immunology;PhD Medical Immunology
    PhD Medical Microbiology;PhD Medical Microbiology
    PhD Medical Nuclear Science;PhD Medical Nuclear Science
    PhD Medical Oncology;PhD Medical Oncology
    PhD Medical Physics;PhD Medical Physics
    PhD Medical Virology;PhD Medical Virology
    PhD Mental Health;PhD Mental Health
    PhD Neurology;PhD Neurology
    PhD Nursing Science;PhD Nursing Science
    PhD Obstetrics and Gynaecology;PhD Obstetrics and Gynaecology
    PhD Occupational Therapy;PhD Occupational Therapy
    PhD Orthopaedics;PhD Orthopaedics
    PhD Paediatrics;PhD Paediatrics
    PhD Pharmacology;PhD Pharmacology
    PhD Physiotherapy;PhD Physiotherapy
    PhD Psychiatry;PhD Psychiatry
    PhD Public Health;PhD Public Health
    PhD Radiography;PhD Radiography
    PhD Reproductive Biology;PhD Reproductive Biology
    PhD Reproductive Biology: Andrology;PhD Reproductive Biology: Andrology
    PhD Sport Science;PhD Sport Science
    PhD Sports Medicine;PhD Sports Medicine
    PhD Urology;PhD Urology
    BA HMSHons Biokinetics;BA HMSHons Biokinetics	
    BA HMSHons in Recreation;BA HMSHons in Recreation	
    BA HMSHons Recreation and Sports Management;BA HMSHons Recreation and Sports Management	
    BA HMSHons Sport Science;BA HMSHons Sport Science	
    BA(Hons) African Languages;BA(Hons) African Languages	
    BA(Hons) Afrikaans;BA(Hons) Afrikaans	
    BA(Hons) Ancient Languages and Cultures Studies;BA(Hons) Ancient Languages and Cultures Studies	
    BA(Hons) Applied Language Studies;BA(Hons) Applied Language Studies	
    BA(Hons) Archaeology;BA(Hons) Archaeology	
    BA(Hons) Augmentative and Alternative Communication;BA(Hons) Augmentative and Alternative Communication	
    BA(Hons) Biblical and Religious Studies;BA(Hons) Biblical and Religious Studies	
    BA(Hons) Criminology;BA(Hons) Criminology	
    BA(Hons) Drama and Film Studies;BA(Hons) Drama and Film Studies	
    BA(Hons) English;BA(Hons) English	
    BA(Hons) French;BA(Hons) French
    BA(Hons) German;BA(Hons) German	
    BA(Hons) HMS in Recreation Option: Corporate Wellness;BA(Hons) HMS in Recreation Option: Corporate Wellness	
    BA(Hons) International Relations;BA(Hons) International Relations	
    BA(Hons) Journalism;BA(Hons) Journalism	
    BA(Hons) Literary Theory;BA(Hons) Literary Theory
    BA(Hons) Philosophy;BA(Hons) Philosophy
    BA(Hons) Political Science;BA(Hons) Political Science	
    BA(Hons) Translation and Professional Writing;BA(Hons) Translation and Professional Writing	
    BA(Hons) Visual Studies;BA(Hons) Visual Studies	
    BHCS(Hons) Heritage and Cultural Tourism;BHCS(Hons) Heritage and Cultural Tourism	
    BHCS (Hons) Heritage and Museum Studies;BHCS (Hons) Heritage and Museum Studies	
    BHCS (Hons) History;BHCS (Hons) History	
    BMus(Hons) General Musicology;BMus(Hons) General Musicology	
    BMus(Hons) in Music Communication;BMus(Hons) in Music Communication	
    BMus(Hons) Music Education;BMus(Hons) Music Education	
    BMus(Hons) Music Technology;BMus(Hons) Music Technology	
    BMus(Hons) Performing Art;BMus(Hons) Performing Art	
    BSocSci (Hons) Anthropology;BSocSci (Hons) Anthropology	
    BSocSci(Hons) Development Studies;BSocSci(Hons) Development Studies	
    BSocSci(Hons) Environmental Analysis and Management;BSocSci(Hons) Environmental Analysis and Management	
    BSocSci(Hons) Gender Studies;BSocSci(Hons) Gender Studies	
    BSocSci(Hons) Geography;BSocSci(Hons) Geography	
    BSocSci(Hons) Industrial Sociology and Labour Studies;BSocSci(Hons) Industrial Sociology and Labour Studies	
    BSocSci(Hons) Psychology;BSocSci(Hons) Psychology	
    BSocSci(Hons) Sociology;BSocSci(Hons) Sociology	
    DLitt African Languages;DLitt African Languages	
    DLitt Afrikaans;DLitt Afrikaans	
    DLitt English;DLitt English	
    DLitt French;DLitt French	
    DLitt German;DLitt German	
    DLitt Greek;DLitt Greek	
    DLitt Latin;DLitt Latin	
    DLitt Literary Theory;DLitt Literary Theory	
    DLitt Semitic Languages;DLitt Semitic Languages	
    DMus focusing on Composition;DMus focusing on Composition	
    DMus focusing on Performing Arts;DMus focusing on Performing Arts	
    DMus focusing on Research;DMus focusing on Research	
    DPhil Anthropology;DPhil Anthropology	
    DPhil Archaeology;DPhil Archaeology	
    DPhil Communication Pathology;DPhil Communication Pathology	
    DPhil Criminology;DPhil Criminology	
    DPhil Drama;DPhil Drama	
    DPhil Drama and Film Studies;DPhil Drama and Film Studies	
    DPhil Fine Arts focusing on Creative Production;DPhil Fine Arts focusing on Creative Production	
    DPhil Fine Arts focusing on Curatorial Practice;DPhil Fine Arts focusing on Curatorial Practice	
    DPhil Fine Arts focusing on Research;DPhil Fine Arts focusing on Research	
    DPhil Geography;DPhil Geography	
    DPhil History;DPhil History	
    DPhil History of Art (Research);DPhil History of Art (Research)	
    DPhil Human Movement Science;DPhil Human Movement Science	
    DPhil Human Movement Science Option: Biokinetics;DPhil Human Movement Science Option: Biokinetics	
    DPhil Human Movement Science Option: Recreation and Sports management;DPhil Human Movement Science Option: Recreation and Sports management	
    DPhil Human Movement Science Option: Sports Sciences;DPhil Human Movement Science Option: Sports Sciences	
    DPhil International Relations;DPhil International Relations	
    DPhil Linguistics;DPhil Linguistics	
    DPhil Philosophy;DPhil Philosophy	
    DPhil Political Science;DPhil Political Science	
    DPhil Psychology;DPhil Psychology	
    DPhil Social Work;DPhil Social Work	
    DPhil Sociology;DPhil Sociology	
    MA African-European Cultural Relations (Research);MA African-European Cultural Relations (Research)	
    MA African Languages (Coursework);MA African Languages (Coursework)	
    MA African Languages (Research);MA African Languages (Research)
    MA Afrikaans (Coursework);MA Afrikaans (Coursework)	
    MA Afrikaans (Research);MA Afrikaans (Research)
    MA Ancient Languages and Cultures Studies (Research);MA Ancient Languages and Cultures Studies (Research)
    MA Applied Language Studies Option:Translation and Interpreting (Coursework);MA Applied Language Studies Option:Translation and Interpreting (Coursework)	
    MA Applied Language Studies (Research);MA Applied Language Studies (Research)	
    MA Archaeology (Research);MA Archaeology (Research)	
    MA Augmentative and Alternative Communication (Coursework);MA Augmentative and Alternative Communication (Coursework)
    MA Augmentative and Alternative Communication (Research);MA Augmentative and Alternative Communication (Research)
    MA Biblical and Religious Studies (Coursework);MA Biblical and Religious Studies (Coursework)
    MA Biblical and Religious Studies (Research);MA Biblical and Religious Studies (Research)
    MA Clinical Psychology (Coursework);MA Clinical Psychology (Coursework)
    MA Counselling Psychology (Coursework);MA Counselling Psychology (Coursework)
    MA Creative Writing (Research);MA Creative Writing (Research)
    MA Criminology (Research);MA Criminology (Research)
    MA Culture and Media Studies;MA Culture and Media Studies
    MA Drama and Film Studies (Research);MA Drama and Film Studies (Research)
    MA Drama Performance (Research);MA Drama Performance (Research)
    MA Drama (Research);MA Drama (Research)
    MA English (Research);MA English (Research)
    MA Environment and Society (Coursework);MA Environment and Society (Coursework)
    MA Fine Arts (Research);MA Fine Arts (Research)
    MA French (Research);MA French (Research)	
    MA General (Research);MA General (Research)
    MA Geography (Research);MA Geography (Research)
    MA German (Research);MA German (Research)
    MA History of Art (Research);MA History of Art (Research)
    MA Human Movement Science Option: Biokinetics (Research);MA Human Movement Science Option: Biokinetics (Research)
    MA Human Movement Science Option: Recreation and Sports Management (Research);MA Human Movement Science Option: Recreation and Sports Management (Research)
    MA Human Movement Science Option: Sports Sciences (Research);MA Human Movement Science Option: Sports Sciences (Research)
    MA Human Movement Science (Research);MA Human Movement Science (Research)
    MA Information Design (Coursework);MA Information Design (Coursework)
    MA International Relations (Coursework);MA International Relations (Coursework)
    MA International Relations (Research);MA International Relations (Research)
    MA Linguistics (Research);MA Linguistics (Research)
    MA Literary Theory (Research);MA Literary Theory (Research)
    MA Philosophy (Research);MA Philosophy (Research)
    MA Political Science (Coursework);MA Political Science (Coursework)
    MA Political Science (Research);Political Science (Research)
    MA Psychology (Research);MA Psychology (Research)
    MA Research Psychology (Coursework);MA Research Psychology (Coursework)
    MA Visual Studies (Research);MA Visual Studies (Research)
    M Communication Pathology (Research);M Communication Pathology (Research)	
    M Diplomatic Studies (Coursework);M Diplomatic Studies (Coursework)
    MHCS Heritage and Cultural Tourism (Coursework);MHCS Heritage and Cultural Tourism (Coursework)
    MHCS Heritage and Cultural Tourism (Research);MHCS Heritage and Cultural Tourism (Research)
    MHCS Heritage and Museum Studies (Coursework);MHCS Heritage and Museum Studies (Coursework)
    MHCS Heritage and Museum Studies (Research);MHCS Heritage and Museum Studies (Research)
    MHCS History (Coursework);MHCS History (Coursework)
    MHCS History (Research);MHCS History (Research)
    MMus Composition (Research);MMus Composition (Research)
    MMus Music Education (Coursework);MMus Music Education (Coursework)
    MMus Music Education (Research);MMus Music Education (Research)
    MMus Musicology (Research);MMus Musicology (Research)
    MMus Music Technology (Coursework);MMus Music Technology (Coursework)
    MMus Music Therapy (Coursework);MMus Music Therapy (Coursework)
    MMus Performing Art (Music) (Coursework);MMus Performing Art (Music) (Coursework)	
    MPhil Option: Political Philosopy;MPhil Option: Political Philosopy
    M Security Studies (Coursework);M Security Studies (Coursework)	
    MSocSci Anthropology (Research);MSocSci Anthropology (Research)	
    MSocSci Development Studies (Research);MSocSci Development Studies (Research)	
    MSocSci Employee Assistance Programmes (Coursework);MSocSci Employee Assistance Programmes (Coursework)
    MSocSci Gender Studies (Coursework);MSocSci Gender Studies (Coursework)
    MSocSci Gender Studies (Research);MSocSci Gender Studies (Research)
    MSocSci Industrial Sociology and Labour Studies (Coursework);MSocSci Industrial Sociology and Labour Studies (Coursework)
    MSocSci Industrial Sociology and Labour Studies (Research);MSocSci Industrial Sociology and Labour Studies (Research)
    MSocSci Sociology (Coursework);MSocSci Sociology (Coursework)
    MSocSci Sociology (Research);MSocSci Sociology (Research)
    MSW in Employee Assistance Programmes;MSW in Employee Assistance Programmes
    MSW in Healthcare (Coursework);MSW in Healthcare (Coursework)
    MSW in Social Development and Policy (Coursework);MSW in Social Development and Policy (Coursework)
    MSW Play Therapy (Coursework);MSW Play Therapy (Coursework)
    MSW Social Work (Research);MSW Social Work (Research)
    PhD Augmentative and Alternative Communication;PhD Augmentative and Alternative Communication
    PhD Environment and Society (Research);PhD Environment and Society (Research)
    PhD General;PhD General
    PhD History of Ancient Culture;PhD History of Ancient Culture
    PhD in Biblical and Religious Studies;PhD in Biblical and Religious Studies
    PhD Information Design;PhD Information Design
    PhD in Psychology;PhD in Psychology
    PhD Option: Creative Writing;PhD Option: Creative Writing
    PhD Option: Development Studies;PhD Option: Development Studies
    PhD Option: Heritage and Cultural Tourism
    PhD Visual Studies;PhD Visual Studies
    LLD Human Rights;LLD Human Rights
    LLD Jurisprudence;LLD Jurisprudence
    LLD Mercantile Law;LLD Mercantile Law
    LLD Private Law;LLD Private Law
    LLD Procedural Law;LLD Procedural Law
    LLD Public Law;LLD Public Law
    LLM (Coursework) Child Law;LLM (Coursework) Child Law
    LLM (Coursework) Constitutional Law and Administrative Law;LLM (Coursework) Constitutional Law and Administrative Law
    LLM (Coursework) Corporate Law;LLM (Coursework) Corporate Law
    LLM (Coursework) Criminal Law;LLM (Coursework) Criminal Law
    LLM (Coursework) Environmental Law;LLM (Coursework) Environmental Law
    LLM (Coursework) Human Rights and Democratisation in Africa;LLM (Coursework) Human Rights and Democratisation in Africa
    LLM (Coursework) Insolvency Law;LLM (Coursework) Insolvency Law
    LLM (Coursework) International Law;LLM (Coursework) International Law
    LLM (Coursework) International Law Option: Air, Space and Telecommunication Law;LLM (Coursework) International Law Option: Air, Space and Telecommunication Law
    LLM (Coursework) International Law Option: International Humanitarian Law and Human Rights in Military Operations;LLM (Coursework) International Law Option: International Humanitarian Law and Human Rights in Military Operations
    LLM (Coursework) International Trade and Investment Law in Africa (Option 1);LLM (Coursework) International Trade and Investment Law in Africa (Option 1)	
    LLM (Coursework) International Trade and Investment Law in Africa (Option 2);LLM (Coursework) International Trade and Investment Law in Africa (Option 2)
    LLM (Coursework) Labour Law;LLM (Coursework) Labour Law
    LLM (Coursework) Law and Political Justice;LLM (Coursework) Law and Political Justice
    LLM (Coursework) Law of Contract;LLM (Coursework) Law of Contract
    LLM (Coursework) Mercantile Law;LLM (Coursework) Mercantile Law
    LLM (Coursework) Multidisciplinary Human Rights;LLM (Coursework) Multidisciplinary Human Rights
    LLM (Coursework) Private Law: General;LLM (Coursework) Private Law: General
    LLM (Coursework) Private Law Option: Estate Law;LLM (Coursework) Private Law Option: Estate Law
    LLM (Coursework) Private Law Option: Family Law;LLM (Coursework) Private Law Option: Family Law
    LLM (Coursework) Private Law Option: Intellectual Property Law;LLM (Coursework) Private Law Option: Intellectual Property Law
    LLM (Coursework) Procedural Law;LLM (Coursework) Procedural Law
    LLM (Coursework) Socio-Economic Rights: Theory and Practice;LLM (Coursework) Socio-Economic Rights: Theory and Practice
    LLM (Coursework) Tax Law;LLM (Coursework) Tax Law	
    LLM (Dissertation) Human Rights
    LLM (Dissertation) Jurisprudence;LLM (Dissertation) Jurisprudence
    LLM (Dissertation) Mercantile Law;LLM (Dissertation) Mercantile Law
    LLM (Dissertation) Private Law;LLM (Dissertation) Private Law
    LLM (Dissertation) Procedural Law;LLM (Dissertation) Procedural Law
    LLM (Dissertation) Public Law;LLM (Dissertation) Public Law
    MPhil Option: Human Rights and Democratisation in Africa;MPhil Option: Human Rights and Democratisation in Africa	
    MPhil Option: Multidisciplinary Human Rights (Coursework);MPhil Option: Multidisciplinary Human Rights (Coursework)
    BInstAgrar(Hons) Agribusiness Management;BInstAgrar(Hons) Agribusiness Management
    BInstAgrar(Hons) Agricultural Economics;BInstAgrar(Hons) Agricultural Economics
    BInstAgrar(Hons) Crop Protection;BInstAgrar(Hons) Crop Protection
    BInstAgrar(Hons) Extension;BInstAgrar(Hons) Extension
    BInstAgrar(Hons) Plant Production;BInstAgrar(Hons) Plant Production
    BInstAgrar(Hons) Plant Quarantine;BInstAgrar(Hons) Plant Quarantine
    BInstAgrar(Hons) Rural Development Planning;BInstAgrar(Hons) Rural Development Planning
    BSc(Hons) Actuarial Science;BSc(Hons) Actuarial Science
    BSc(Hons) Animal Science;BSc(Hons) Animal Science	
    BSc(Hons) Applied Mathematics;BSc(Hons) Applied Mathematics
    BSc(Hons) Biochemistry;BSc(Hons) Biochemistry
    BSc(Hons) Bioinformatics;BSc(Hons) Bioinformatics
    BSc(Hons) Biotechnology;BSc(Hons) Biotechnology
    BSc(Hons) Chemistry;BSc(Hons) Chemistry
    BSc(Hons) Entomology;BSc(Hons) Entomology
    BSc(Hons) Environmental Analysis and Management;BSc(Hons) Environmental Analysis and Management
    BSc(Hons) Financial Engineering;BSc(Hons) Financial Engineering
    BSc(Hons) Food Science;BSc(Hons) Food Science
    BSc(Hons) Genetics;BSc(Hons) Genetics
    BSc(Hons) Geography;BSc(Hons) Geography
    BSc(Hons) Geoinformatics;BSc(Hons) Geoinformatics
    BSc(Hons) Geology;BSc(Hons) Geology
    BSc(Hons) Mathematical Statistics;BSc(Hons) Mathematical Statistics
    BSc(Hons) Mathematics;BSc(Hons) Mathematics
    BSc(Hons) Mathematics of Finance;BSc(Hons) Mathematics of Finance
    BSc(Hons) Meteorology;BSc(Hons) Meteorology
    BSc(Hons) Microbiology;BSc(Hons) Microbiology
    BSc(Hons) Nutrition and Food Science;BSc(Hons) Nutrition and Food Science
    BSc(Hons) Option: Engineering Geology;BSc(Hons) Option: Engineering Geology
    BSc(Hons) Option: Hydrogeology;BSc(Hons) Option: Hydrogeology
    BSc(Hons): (Option) Medicinal Plant Science;BSc(Hons): (Option) Medicinal Plant Science
    BSc(Hons) Physics;BSc(Hons) Physics
    BSc(Hons) Plant Science;BSc(Hons) Plant Science
    BSc(Hons) Soil Science [Option: Environmental Soil Science];BSc(Hons) Soil Science [Option: Environmental Soil Science]
    BSc(Hons) Wildlife Management;BSc(Hons) Wildlife Management	
    BSc(Hons) Zoology;BSc(Hons) Zoology	
    MConsumer Science Clothing Management;MConsumer Science Clothing Management
    MConsumer Science Clothing Management (Coursework);MConsumer Science Clothing Management (Coursework)
    MConsumer Science Food Management;MConsumer Science Food Management
    MConsumer Science Food Management (Coursework);MConsumer Science Food Management (Coursework)
    MConsumer Science General;MConsumer Science General
    MConsumer Science General (Coursework);MConsumer Science General (Coursework)
    MConsumer Science Interior Merchandise Management;MConsumer Science Interior Merchandise Management
    MConsumer Science Interior Merchandise Management (Coursework);MConsumer Science Interior Merchandise Management (Coursework)
    MInstAgrar Agricultural Economics;MInstAgrar Agricultural Economics
    MInstAgrar Agronomy;MInstAgrar Agronomy
    MInstAgrar Animal Production Management;MInstAgrar Animal Production Management
    MInstAgrar Crop Protection;MInstAgrar Crop Protection
    MInstAgrar Environmental Management (Coursework);MInstAgrar Environmental Management (Coursework)
    MInstAgrar Extension;MInstAgrar Extension
    MInstAgrar Horticulture;MInstAgrar Horticulture	
    MInstAgrar Pasture Science;MInstAgrar Pasture Science
    MInstAgrar Plant Quarantine;MInstAgrar Plant Quarantine
    MInstAgrar Rural Development Planning;MInstAgrar Rural Development Planning
    MPhil Wildlife Management;MPhil Wildlife Management
    MSc Actuarial Science;MSc Actuarial Science
    MSc(Agric) Agricultural Economics;MSc(Agric) Agricultural Economics
    MSc(Agric) Agricultural Extension;MSc(Agric) Agricultural Extension
    MSc(Agric) Agronomy;MSc(Agric) Agronomy
    MSc(Agric) Animal Breeding and Genetics;MSc(Agric) Animal Breeding and Genetics
    MSc(Agric) Animal Science: Animal Nutrition;MSc(Agric) Animal Science: Animal Nutrition
    MSc(Agric) Animal Science: Meat Science;MSc(Agric) Animal Science: Meat Science
    MSc(Agric) Animal Science: Production ManagementMSc(Agric) Animal Science: Production Management
    
    MSc(Agric) Animal Science: Production Physiology;MSc(Agric) Animal Science: Production Physiology
    MSc(Agric) Entomology;MSc(Agric) Entomology
    MSc(Agric) Food Science and Technology;MSc(Agric) Food Science and Technology
    MSc(Agric) in Pasture Science;MSc(Agric) in Pasture Science
    MSc(Agric) Microbiology;MSc(Agric) Microbiology
    MSc(Agric) Plant Pathology;MSc(Agric) Plant Pathology
    MSc(Agric) Soil Science;MSc(Agric) Soil Science
    MSc Applied Mathematics;MSc Applied Mathematics
    MSc Applied Mineralogy;MSc Applied Mineralogy
    MSc Applied Statistics;MSc Applied Statistics
    MSc Biochemistry;MSc Biochemistry
    MSc Bioinformatics;MSc Bioinformatics
    MSc Biotechnology;MSc Biotechnology
    MSc Chemistry;MSc Chemistry
    MSc Engineering and Environmental Geology;MSc Engineering and Environmental Geology
    MSc Engineering Geology;MSc Engineering Geology
    MSc Entomology;MSc Entomology
    MSc Environmental Ecology (Coursework);MSc Environmental Ecology (Coursework)
    MSc Environmental Education (Coursework);MSc Environmental Education (Coursework)
    MSc Environment and Society (Coursework);MSc Environment and Society (Coursework)
    MSc: Exploration Geophysics;MSc: Exploration Geophysics
    MSc Financial Engineering;MSc Financial Engineering
    MSc Food Science;MSc Food Science
    MSc Genetics;MSc Genetics
    MSc Geography;MSc Geography
    MSc Geoinformatics;MSc Geoinformatics
    MSc Geology;MSc Geology
    MSc in Postharvest Technology;MSc in Postharvest Technology
    MSc Mathematical Statistics;MSc Mathematical Statistics
    MSc Mathematics;MSc Mathematics
    MSc Mathematics Education;MSc Mathematics Education
    MSc Mathematics of Finance;MSc Mathematics of Finance
    MSc Meteorology;MSc Meteorology
    MSc Microbiology;MSc Microbiology
    MSc Nutrition;MSc Nutrition;
    MSc [Option: Air Quality Management] (Coursework);MSc [Option: Air Quality Management] (Coursework)
    MSc [Option: Environmental Management] (Coursework);MSc [Option: Environmental Management] (Coursework)
    MSc [Option: Forest Management and the Environment (Coursework);MSc [Option: Forest Management and the Environment (Coursework)
    MSc [Option: Forest Science];MSc [Option: Forest Science]
    MSc [Option: Medicinal Plant Science];MSc [Option: Medicinal Plant Science]	
    MSc Physics;MSc Physics
    MSc Plant Pathology;MSc Plant Pathology
    MSc Plant Science;MSc Plant Science
    MSc Science Education;MSc Science Education
    MSc Soil Science;MSc Soil Science
    MSc Water Resource Management (Coursework);MSc Water Resource Management (Coursework)
    MSc Wildlife Management;MSc Wildlife Management
    MSc Zoology;MSc Zoology
    PhD Agrarian Extension;PhD Agrarian Extension
    PhD Agricultural Economics;PhD Agricultural Economics
    PhD Agronomy;PhD Agronomy
    PhD Animal Production Management;PhD Animal Production Management
    PhD Animal Science;PhD Animal Science
    PhD Biochemistry;PhD Biochemistry
    PhD Bioinformatics;PhD Bioinformatics
    PhD Biotechnology;PhD Biotechnology
    PhD ChemistryPhD;PhD Chemistry
    PhD Consumer Science: Clothing Management;PhD Consumer Science: Clothing Management
    PhD Consumer Science: Development;PhD Consumer Science: Development
    PhD Consumer Science: Food Management;PhD Consumer Science: Food Management
    PhD Consumer Science: Interior Merchandise;PhD Consumer Science: Interior Merchandise
    PhD Crop Protection;PhD Crop Protection
    PhD Engineering and Environmental Geology;PhD Engineering and Environmental Geology
    PhD Entomology;PhD Entomology
    PhD Environmental Ecology;PhD Environmental Ecology
    PhD Environmental Economics;PhD Environmental Economics
    PhD Environment and Society;PhD Environment and Society
    PhD Food Science;PhD Food Science
    PhD Genetics;PhD Genetics
    PhD Geography;PhD Geography
    PhD Geoinformatics;PhD Geoinformatics
    PhD Geology;PhD Geology	
    PhD Horticultural Science;PhD Horticultural Science
    PhD in Extension;PhD in Extension
    PhD Mathematical Sciences;PhD Mathematical Sciences
    PhD Mathematical Statistics;PhD Mathematical Statistics
    PhD Meteorology;PhD Meteorology
    PhD Microbiology;PhD Microbiology
    PhD Nutrition;PhD Nutrition
    PhD [Option:Air Quality Management];PhD [Option:Air Quality Management]
    PhD [Option: Environmental Management];PhD [Option: Environmental Management]
    PhD [Option:Forest Science];PhD [Option:Forest Science]
    PhD [Option: Medicinal Plant Science];PhD [Option: Medicinal Plant Science]
    PhD Pasture Science;PhD Pasture Science
    PhD Physics;PhD Physics
    PhD Plant Pathology;PhD Plant Pathology
    PhD Plant Science;PhD Plant Science
    PhD Rural Development Planning;PhD Rural Development Planning
    PhD Science and Mathematics Education;PhD Science and Mathematics Education
    PhD Soil Science;PhD Soil Science
    PhD Water Resource Management;PhD Water Resource Management
    PhD Wildlife Management;PhD Wildlife Management
    PhD Zoology;PhD Zoology
    BAHons (Theology) Church History and Church Polity;BAHons (Theology) Church History and Church Polity
    BAHons (Theology) Dogmatics and Christian Ethics;BAHons (Theology) Dogmatics and Christian Ethics
    BAHons (Theology) New Testament Studies;BAHons (Theology) New Testament Studies
    BAHons (Theology) Old Testament Studies;BAHons (Theology) Old Testament Studies
    BAHons (Theology) Practical Theology;BAHons (Theology) Practical Theology
    BAHons (Theology) Science of Religion and Missiology;BAHons (Theology) Science of Religion and Missiology
    BAHons (Theology) Theological Studies;BAHons (Theology) Theological Studies
    DD Church History and Church Polity;DD Church History and Church Polity
    DD Dogmatics and Christian Ethics;DD Dogmatics and Christian Ethics
    DD New Testament Studies;DD New Testament Studies
    DD Old Testament Studies;DD Old Testament Studies
    DD Practical Theology;DD Practical Theology
    DD Practical Theology: Pastoral Family Therapy;DD Practical Theology: Pastoral Family Therapy
    DD Science of Religion and Missiology;DD Science of Religion and Missiology
    MA(Theology) Church History and Church Polity (Coursework);MA(Theology) Church History and Church Polity (Coursework)
    MA(Theology) Church History and Church Polity (Dissertation);MA(Theology) Church History and Church Polity (Dissertation)
    MA(Theology) Dogmatics and Christian Ethics (Coursework);MA(Theology) Dogmatics and Christian Ethics (Coursework)
    MA(Theology) Dogmatics and Christian Ethics (Dissertation);MA(Theology) Dogmatics and Christian Ethics (Dissertation)
    MA(Theology) New Testament Studies (Coursework);MA(Theology) New Testament Studies (Coursework)
    MA(Theology) New Testament Studies (Dissertation);MA(Theology) New Testament Studies (Dissertation)
    MA(Theology) Old Testament Studies (Coursework);MA(Theology) Old Testament Studies (Coursework)
    MA(Theology) Old Testament Studies (Dissertation);MA(Theology) Old Testament Studies (Dissertation)
    MA(Theology) Pastoral Family Therapy (Coursework);MA(Theology) Pastoral Family Therapy (Coursework)
    MA(Theology) Practical Theology (Coursework);MA(Theology) Practical Theology (Coursework)
    MA(Theology) Practical Theology (Dissertation);MA(Theology) Practical Theology (Dissertation)
    MA(Theology) Science of Religion and Missiology (Coursework);MA(Theology) Science of Religion and Missiology (Coursework)
    MA(Theology) Science of Religion and Missiology (Dissertation);MA(Theology) Science of Religion and Missiology (Dissertation)
    MA(Theology) Youth Ministry (Coursework);MA(Theology) Youth Ministry (Coursework)
    MDiv (Curriculum aa);MDiv (Curriculum aa)
    MDiv (Curriculum bb);MDiv (Curriculum bb)
    MPhil Applied Theology;MPhil Applied Theology
    MTh Church History and Church Polity (aa);MTh Church History and Church Polity (aa)
    MTh Church History and Church Polity (bb);MTh Church History and Church Polity (bb)
    MTh Dogmatics and Christian Ethics (aa);MTh Dogmatics and Christian Ethics (aa)
    MTh Dogmatics and Christian Ethics (bbMTh Dogmatics and Christian Ethics (bb)
    MTh New Testament Studies (aa);MTh New Testament Studies (aa)
    MTh New Testament Studies (bb);MTh New Testament Studies (bb)
    MTh Old Testament studies (aa);MTh Old Testament studies (aa)
    MTh Old Testament studies (bb);MTh Old Testament studies (bb)
    MTh Practical Theology (aa);MTh Practical Theology (aa)
    MTh Practical Theology (bb);MTh Practical Theology (bb)
    MTh Science of Religion and Missiology (aa);MTh Science of Religion and Missiology (aa)
    MTh Science of Religion and Missiology (bb);MTh Science of Religion and Missiology (bb)
    PhD Church History and Church Policy;PhD Church History and Church Policy
    PhD Dogmatics and Christian Ethics;PhD Dogmatics and Christian Ethics
    PhD New Testament Studies;PhD New Testament Studies
    PhD Old Testament Studies;PhD Old Testament Studies
    PhD Practical Theology;PhD Practical Theology
    PhD Practical Theology: Pastoral Family Therapy;PhD Practical Theology: Pastoral Family Therapy
    PhD Practical Theology: Youth Ministry;PhD Practical Theology: Youth Ministry
    PhD Science of Religion and Missiology;PhD Science of Religion and Missiology
    BVSc(Hons);BVSc(Hons)
    DVSc Anatomy and physiology;DVSc Anatomy and physiology
    DVSc Paraclinical sciences;DVSc Paraclinical sciences
    DVSc Production animal studies;DVSc Production animal studies
    DVSc Veterinary tropical diseases;DVSc Veterinary tropical diseases
    Master of Science Option: Animal/Human/Ecosystem Health;Master of Science Option: Animal/Human/Ecosystem Health
    Master of Science Option: Ruminant health;Master of Science Option: Ruminant health
    Master of Science Option: Veterinary epidemiology;Master of Science Option: Veterinary epidemiology
    Master of Science Option: Veterinary reproduction;Master of Science Option: Veterinary reproduction
    MMedVet Anaesthesiology;MMedVet Anaesthesiology
    MMedVet Cattle Herd Health;MMedVet Cattle Herd Health
    MMedVet Clinical Laboratory Diagnostics;MMedVet Clinical Laboratory Diagnostics
    MMedVet Diagnostic Imaging;MMedVet Diagnostic Imaging
    MMedVet Laboratory Animal Science;MMedVet Laboratory Animal Science
    MMedVet Medicine (Bovine);MMedVet Medicine (Bovine)
    MMedVet Medicine (Equine);MMedVet Medicine (Equine)
    MMedVet Medicine (Small Animals);MMedVet Medicine (Small Animals)
    MMedVet Ophthalmology;MMedVet Ophthalmology	
    MMedVet Pathology;MMedVet Pathology
    MMedVet Pharmacology;MMedVet Pharmacology
    MMedVet Pig Herd Health;MMedVet Pig Herd Health
    MMedVet Poultry Diseases;MMedVet Poultry Diseases
    MMedVet Reproduction;MMedVet Reproduction
    MMedVet Small Stock Herd Health;
    MMedVet Surgery (Equine);MMedVet Surgery (Equine)
    MMedVet Surgery (Small Animals);MMedVet Surgery (Small Animals)
    MMedVet Toxicology;MMedVet Toxicology
    MMedVet Veterinary Public Health;MMedVet Veterinary Public Health
    MMedVet Wildlife Diseases;MMedVet Wildlife Diseases
    MSc (Veterinary Industrial Pharmacology);MSc (Veterinary Industrial Pharmacology)
    MSc (Veterinary Science) Anatomy and Physiology;MSc (Veterinary Science) Anatomy and Physiology
    MSc (Veterinary Science) Companion Animal Clinical Studies;MSc (Veterinary Science) Companion Animal Clinical Studies
    MSc (Veterinary Science) Paraclinical Sciences;MSc (Veterinary Science) Paraclinical Sciences	
    MSc (Veterinary Science) Production Animal Studies;MSc (Veterinary Science) Production Animal Studies
    MSc (Veterinary Science) Veterinary Tropical Diseases;MSc (Veterinary Science) Veterinary Tropical Diseases
    PhD Anatomy and Physiology;PhD Anatomy and Physiology
    PhD Companion Animal Clinical Studies;PhD Companion Animal Clinical Studies
    PhD Paraclinical Sciences;PhD Paraclinical Sciences
    PhD Production Animal Studies;PhD Production Animal Studies
    PhD Veterinary Tropical Diseases;PhD Veterinary Tropical Diseases
    Postgraduate Certificate in the Theory of Accountancy;Postgraduate Certificate in the Theory of Accountancy
    Postgraduate Diploma in Economic and Management Sciences Option: Entrepreneurship;Postgraduate Diploma in Economic and Management Sciences Option: Entrepreneurship
    Postgraduate Diploma in Economic and Management Sciences Option: Integrated Reporting;Postgraduate Diploma in Economic and Management Sciences Option: Integrated Reporting
    Postgraduate Diploma in Investigative and Forensic Accounting;Postgraduate Diploma in Investigative and Forensic Accounting
    PGCE Postgraduate Certificate in Education: Early Childhood Development and Foundation Phase
    PGCE Postgraduate Certificate in Education: Further Education and Training;PGCE Postgraduate Certificate in Education: Further Education and Training
    PGCE Postgraduate Certificate in Education: Intermediate Phase;PGCE Postgraduate Certificate in Education: Intermediate Phase
    PGCE Postgraduate Certificate in Education: Senior Phase;PGCE Postgraduate Certificate in Education: Senior Phase
    PGCHE Postgraduate Certificate in Higher Education;PGCHE Postgraduate Certificate in Higher Education
    PDBA Postgraduate Diploma in Business Administration (offered by GIBS);PDBA Postgraduate Diploma in Business Administration (offered by GIBS)
    Advanced University Diploma in Oral Hygiene (AdvUnivDipHO);Advanced University Diploma in Oral Hygiene (AdvUnivDipHO)
    Medicine Special (Postgraduate);Medicine Special (Postgraduate)
    Postgraduate Diploma in Dentistry (PGDipDent);Postgraduate Diploma in Dentistry (PGDipDent)
    Postgraduate Diploma in Family Medicine;Postgraduate Diploma in Family Medicine
    Postgraduate Diploma in General Ultrasound (PGDipGUS);Postgraduate Diploma in General Ultrasound (PGDipGUS)
    Postgraduate Diploma in Group Activities (DGA);Postgraduate Diploma in Group Activities (DGA)
    Postgraduate Diploma in Hand Therapy (DHT);Postgraduate Diploma in Hand Therapy (DHT)
    Postgraduate Diploma in Health Systems Management (DHSM);Postgraduate Diploma in Health Systems Management (DHSM)
    Postgraduate Diploma in Occupational Health (DipOH);Postgraduate Diploma in Occupational Health (DipOH)
    Postgraduate Diploma in Occupational Medicine and Health (DOMH);Postgraduate Diploma in Occupational Medicine and Health (DOMH)
    Postgraduate Diploma in Public Health (DPH);Postgraduate Diploma in Public Health (DPH)
    Postgraduate Diploma in Public Health Medicine (DipPHM);Postgraduate Diploma in Public Health Medicine (DipPHM)
    Postgraduate Diploma in the Handling of Childhood Disability (DHCD);Postgraduate Diploma in the Handling of Childhood Disability (DHCD)
    Postgraduate Diploma in Tropical Medicine and Health (DTM&H);Postgraduate Diploma in Tropical Medicine and Health (DTM&H)
    Postgraduate Diploma in Vocational Rehabilitation (DVR);Postgraduate Diploma in Vocational Rehabilitation (DVR)
    Visiting postgraduate students;Visiting postgraduate students
    Advanced Diploma in Hearing Aid Acoustics;Advanced Diploma in Hearing Aid Acoustics
    Certificate in Sport Sciences;Certificate in Sport Sciences
    Postgraduate Diploma in Heritage and Museum Studies;Postgraduate Diploma in Heritage and Museum Studies
    Advanced University Diploma in Extension and Rural Development;Advanced University Diploma in Extension and Rural Development
    University Diploma in Theology;University Diploma in Theology
    DipVetNurs (Diploma in Veterinary Nursing);DipVetNurs (Diploma in Veterinary Nursing)
    
    
    
    http://up.edurecruit.co.za/index.php/postgraduate/2 <!-- continue from here --> 
    <!--
    http://programmes.up.ac.za/
    
    -->

