<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=${encoding}">
    <title>Add Job Adverts</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
    <script>
        $(function() {
          $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
          $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
        });
    </script>
    <style type="text/css" media='screen'>
        label {display: block;}
    </style>
  
  </head>
  <TABLE  BORDER="5px"  WIDTH="100%"   CELLPADDING="20" CELLSPACING="3">
    <TR>
       <TH COLSPAN="3"><BR><H3>ADDING JOB ADVERT</H3></TH>
    </TR>
    <TR>
       <TH>Job Advert Details:</TH>
       <TH>Job Benefits:</TH>
       <TH>Job Requirements/Qualifications:</TH>	
    </TR>
    <TR ALIGN="CENTER">
       <TD>  
            <?php echo form_open('addJobAdvert/addAdvert'); ?>
            <p>
              <label for="job_title">Title : <input type ="text" name="job_title" size="34" value="<?php echo set_value('job_title'); ?>" /></label>
              <div class="text-warning"><?php echo form_error('job_title'); ?></div>
            </p>
            <p>
              <label for="company_name">Company Name : <input type ="text" name="company_name" size="34" value="<?php echo set_value('company_name'); ?>" /></label>
              <div class="text-warning"><?php echo form_error('company_name'); ?></div>
            </p>
            <p>
              <label for="job_description">Job Description : <textarea cols="25" rows="5" name="job_description" value="<?php echo set_value('job_description');  ?>" ></textarea></label>
              <div class="text-warning"><?php echo form_error('job_description'); ?></div>
            </p>
            <p>
              <label for="industry">Industry : <input type ="text" name="industry" size="34" value="<?php echo set_value('industry'); ?>" /></label>
              <div class="text-warning"><?php echo form_error('industry'); ?></div>
            </p>
            <p>
              <label for="job_duties">Job Duties : <textarea cols="25" rows="5" name="job_duties" value="<?php echo set_value('job_duties');  ?>" ></textarea></label>
              <div class="text-warning"><?php echo form_error('job_duties'); ?></div>
            </p>
            <p>
              <label for="start_date">Start Date : <input type="text" name="start_date" size="34"  id="datepicker" /></label>
              <div class="text-warning"><?php echo form_error('start_date'); ?></div>
            </p>
            <p>
              <label for="end_date">End Date : <input type="text" name="end_date" size="34" id="datepicker1" />          </label>
              <div class="text-warning"><?php echo form_error('end_date'); ?></div>
            </p>
       </TD>
       <TD>
           <p>
               <p>
              <label for="num_of_positions">Number Of Available Positions : <input type ="text" name="num_of_positions" size="34" value="<?php echo set_value('num_of_positions'); ?>" /></label>
              <div class="text-warning"><?php echo form_error('num_of_positions'); ?></div>
            </p>
           </p>
            <p>
              <label for="salary_offered">Salary Offered : R<input type ="text" name="salary_offered" size="34" value="<?php echo set_value('salary_offered'); ?>" /></label>
              <div class="text-warning"><?php echo form_error('salary_offered'); ?></div>
            </p>
            <p>
              <label for="salary_type">Salary Type : <?php  $salary_type = array('none' => '-Select-',
                                                                            'wage' => 'Weekly Wages', 
                                                                            'salary' => 'Monthly Salary', 
                                                                            'annual' => 'Annual Salary');
                echo form_dropdown('salary_type', $salary_type, 'none'); ?>
              </label>         
            </p>
            <p>
              <label for="negotiable">Salary Negotiable : <input type="checkbox" name="negotiable" value="1" checked="checked" /> </label>
            </p>
            <p>
              <label for="contract_type">Contract Type : <?php  $contract_type = array('none' => '-Select-',
                                                                            'permanent' => 'Permanent', 
                                                                            'part_time' => 'Part Time', 
                                                                            'fixed_term' => 'Fixed Term',
                                                                            'zero_hour' => 'Zero Hour',
                                                                            'volunteer' => 'Volunteer');
                echo form_dropdown('contract_type', $contract_type, 'none');?>
              </label>           
            </p>
            <p>
              <label for="company_location">Company Regional Location: <?php $company_location = array('none' => '-Select-',
                                                                                                'ec' => 'Eastern Cape',
                                                                                                'fs' => 'Free State',
                                                                                                'gp' => 'Gauteng',
                                                                                                'kzn' => 'KwaZulu-Natal',
                                                                                                'lp' => 'Limpopo',
                                                                                                'mp' => 'Mpumalanga',
                                                                                                'nc' => 'Northern Cape',
                                                                                                'nw' => 'North West',
                                                                                                'wc' => 'Western Cape');                                         
              echo form_dropdown('company_location', $company_location, 'none'); ?>
              </label> 
            </p>
            <p>
              <h4>Benefits : </h4>
              <table border="1" WIDTH="100%">
                <tr>
                  <th>
                      <input type="checkbox" name="medical_aid" value="1" checked="checked" />
                      <label for="medical_aid"> Medical Aid</label>
                  </th>
                  <th>
                      <input type="checkbox" name="uif" value="1" checked="checked" />
                      <label for="uif"> UIF</label>
                  </th>
                </tr>
                <tr>
                  <th>
                      <input type="checkbox" name="car_allowance" value="1" checked="checked" />
                      <label for="car_allowance"> Car Allowance</label>
                  </th>
                  <th>
                      <input type="checkbox" name="home_allowance" value="1" checked="checked" />
                      <label for="home_allowance"> Home Allowance</label>
                  </th>
                </tr>
                <tr>
                  <th colspan="2">
                      <label for="other_benefits">Other : <input type="text" name="other_benefits" size="34" value="<?php echo set_value('other','None'); ?>" </label>
                      </th>
                </tr>
              </table>
          </p>
          <br/>
      </TD>
      <TD>
      <p>
          <label for="drivers_licence">Drivers Licence : <?php $drivers_licence = array('none' => '-Select-',
                                                                                    'none' => 'Not Required',
                                                                                    'a1' => 'A1',
                                                                                    'a' => 'A',
                                                                                    'b' => 'B',
                                                                                    'eb' => 'EB',
                                                                                    'c1' => 'C1',
                                                                                    'c' => 'C',
                                                                                    'ec1' => 'EC1',
                                                                                    'ec' => 'EC');
            echo form_dropdown('drivers_licence', $drivers_licence, 'none'); ?>
          </label>
      </p>
      <p>
          <label for="required_experience">Required Experience (<em>Years of Experience</em>) : </label>
          <input type ="text" name="required_experience" size="34" value="<?php echo set_value('required_experience'); ?>" />
          <div class="text-warning"><?php echo form_error('required_experience'); ?></div>
      </p>
      <p>
          <label for="age_group">Age Group: <?php $age_group = array( 'none' => '-Select-',
                                                                      'any' => 'Any Age Group',
                                                                      'b' => '18 - 23',
                                                                      'c' => '24 - 30',
                                                                      'd' => '31 - 40',
                                                                      'e' => '40 +');
                echo form_dropdown('age_group', $age_group, 'none'); ?>
          </label>
      </p>
      <p>
          <label for="male"><input type="checkbox" name="male" value="1" checked="checked" /> Male</label>

          <label for="female"><input type="checkbox" name="female" value="1" checked="checked" /> Female</label>
      </p>
      <p>
          <label for="employment_equity">Employment Equity : <?php $employment_equity = array('none' => '-Select-',
                                                                                    'any' => 'All',
                                                                                    'caucation' => 'Caucation',
                                                                                    'black' => 'Black',
                                                                                    'asian' => 'Asian',
                                                                                    'mixed_race' => 'Mixed Race');
                echo form_dropdown('employment_equity', $employment_equity, 'none'); ?>
          </label>
      </p>
          
      <!-- Advanced multi-select -->
      <p>
          <select data-placeholder="Choose qualification type" multiple="multiple" class="chosen-select-no-results" name="qualification_type[]" style="width:350px;" tabindex="2">
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
      </p>
      <p>
          <select data-placeholder="Choose qualification type" multiple="multiple" class="chosen-select-no-results" name ="qualification_name[]" style="width:350px;" tabindex="11">
             <option value="Advanced Certificate in Education ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ ACE">Advanced Certificate in Education ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ ACE</option>
             <option value="National Professional Diploma in Education ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ NPDE">National Professional Diploma in Education ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ NPDE</option>
             <option value="Postgraduate Certificate in Education - PGCE">Postgraduate Certificate in Education - PGCE</option>
             <option value="Bachelor of Education - Hons B.Ed">Bachelor of Education - Hons B.Ed</option>
             <option value="Master of Education - M.Ed">Master of Education - M.Ed</option>
             <option value="Doctor of Philosophy - PhD">Doctor of Philosophy - PhD</option>
             <option value="Bachelor of Arts in Communication - BA Com">Bachelor of Arts in Communication - BA Com</option>
             <option value="Bachelor of Arts (Social Work) - BA SW">Bachelor of Arts (Social Work) - BA SW</option>
             <option value="Bachelor of Arts (Conservation, Tourism, and Sustainable Development) - BA (CTSD)">Bachelor of Arts (Conservation, Tourism, and Sustainable Development) - BA (CTSD)</option>
             <option value="Bachelor of Arts (Indigenous Knowledge Systems) - BA (IKS)">Bachelor of Arts (Indigenous Knowledge Systems) - BA (IKS)</option>
             <option value="Bachelor of Arts (Peace Studies and International Relations) - BA (PEC)">Bachelor of Arts (Peace Studies and International Relations) - BA (PEC)</option>
             <option value="Bachelor of Social Science - B Soc Sc">Bachelor of Social Science - B Soc Sc</option>
             <option value="Bachelor of Arts (Honours) - BA (Hons)">Bachelor of Arts (Honours) - BA (Hons)</option>
             <option value="Bachelor of Arts (Honours) in Communication - BA Com (Hons)">Bachelor of Arts (Honours) in Communication - BA Com (Hons)</option>
             <option value="Bachelor of Arts (Honours) in Translation and Interpreting - BA Hons (Trans & Interpr)">Bachelor of Arts (Honours) in Translation and Interpreting - BA Hons (Trans & Interpr)</option>
             <option value="Bachelor of Social Science (Honours) - B Soc Sc (Hons)">Bachelor of Social Science (Honours) - B Soc Sc (Hons)</option>
             <option value="Bachelor of Arts (Honours) in Theology - BA Hons (Theology)">Bachelor of Arts (Honours) in Theology - BA Hons (Theology)</option>
             <option value="Master of Arts (by Course Work) - MA">Master of Arts (by Course Work) - MA</option>
             <option value="Master of Arts in Applied Communication - MA (App. Com)">Master of Arts in Applied Communication - MA (App. Com)</option>
             <option value="Master of Arts in Indigenous Knowledge Systems - MA (IKS)">Master of Arts in Indigenous Knowledge Systems - MA (IKS)</option>
             <option value="Master of Arts in Peace Studies and International Relations- MA (PEC)">Master of Arts in Peace Studies and International Relations- MA (PEC)</option>
             <option value="Master of Arts (Social Work) - MSW">Master of Arts (Social Work) - MSW</option>
             <option value="Master of Philosophy - M Phil">Master of Philosophy - M Phil</option>
             <option value="Master of Social Science - M Soc Sc">Master of Social Science - M Soc Sc</option>
             <option value="Master of Social Science (by Course Work) - M Soc Sc">Master of Social Science (by Course Work) - M Soc Sc</option>
             <option value="Master of Social Science (Clinical Psychology) - M Soc Sc (CP)">Master of Social Science (Clinical Psychology) - M Soc Sc (CP)</option>
             <option value="Master of Theology - MTh">Master of Theology - MTh</option>
             <option value="Doctor of Literature - DLitt">Doctor of Literature - DLitt</option>
             <option value="Doctor of Philosophy - PhD">Doctor of Philosophy - PhD</option>
             <option value="Doctor of Theology - PhD">Doctor of Theology - PhD</option>
             <option value="Bachelor of Law (LLB)">Bachelor of Law (LLB)</option>
             <option value="Bachelor of Laws">Bachelor of Laws</option>
             <option value="Master of Laws (Dissertation)">Master of Laws (Dissertation)</option>
             <option value="Master of Laws (Labour and Social Security Law)">Master of Laws (Labour and Social Security Law)</option>
             <option value="Master of Philosophy (MPhil)">Master of Philosophy (MPhil)</option>
             <option value="Doctor of Laws (LLD)">Doctor of Laws (LLD)</option>
             <option value="Doctor of Philosophy (PhD)">Doctor of Philosophy (PhD)</option>
             <option value="Diploma in Agric Crop Science">Diploma in Agric Crop Science</option>
             <option value="Diploma in Animal Health">Diploma in Animal Health</option>
             <option value="Diploma in Animal Science">Diploma in Animal Science</option>
             <option value="Bachelor of Nursing (BN)">Bachelor of Nursing (BN)</option>
             <option value="Bachelor of Nursing Science (BNSc)">Bachelor of Nursing Science (BNSc)</option>
             <option value="Bachelor of Science in Agriculture (Animal Science) - BSc Agric (Animal Sci)">Bachelor of Science in Agriculture (Animal Science) - BSc Agric (Animal Sci)</option>
             <option value="Bachelor of Science in Agriculture (Agric Economics) - BSc Agric (Agric Economics)">Bachelor of Science in Agriculture (Agric Economics) - BSc Agric (Agric Economics)</option>
             <option value="Bachelor of Science in Agriculture (Animal Health) - BSc Agric (Animal Health)">Bachelor of Science in Agriculture (Animal Health) - BSc Agric (Animal Health)</option>
             <option value="Bachelor of Science in Agriculture (Crop Science) - BSc Agric (Crop Sci)">Bachelor of Science in Agriculture (Crop Science) - BSc Agric (Crop Sci)</option>
             <option value="Bachelor of Science (Land Management) - BSc (Land Management)">Bachelor of Science (Land Management) - BSc (Land Management)</option>
             <option value="Postgraduate Diploma in Agricultural Economics and Management - PGD (Agriculture)">Postgraduate Diploma in Agricultural Economics and Management - PGD (Agriculture)</option>
             <option value="Postgraduate Diploma in Agricultural Extension - PGD (Agric Ext)">Postgraduate Diploma in Agricultural Extension - PGD (Agric Ext)</option>
             <option value="Bachelor of Nursing Science (Honours) - BNSc Hons">Bachelor of Nursing Science (Honours) - BNSc Hons</option>
             <option value="Bachelor of Science (Honours) (Agricultural Economics and Management) - BSc Agric">Bachelor of Science (Honours) (Agricultural Economics and Management) - BSc Agric</option>
             <option value="Hons (Agric Econ & Man)">Hons (Agric Econ & Man)</option>
             <option value="Bachelor of Science (Honours) (Agricultural Extension) - BSc Agric Hons (Agric Ext)">Bachelor of Science (Honours) (Agricultural Extension) - BSc Agric Hons (Agric Ext)</option>
             <option value="Bachelor of Science (Honours) in Agriculture (Animal Science) - BSc Hons (Animal Sci)">Bachelor of Science (Honours) in Agriculture (Animal Science) - BSc Hons (Animal Sci)</option>
             <option value="Bachelor of Science (Honours) in Agriculture (Crop Science) - BSc Hons (Crop Sci)">Bachelor of Science (Honours) in Agriculture (Crop Science) - BSc Hons (Crop Sci)</option>
             <option value="Bachelor of Science (Honours) in Agriculture (Animal Health) - BSc Hons (Animal Health)">Bachelor of Science (Honours) in Agriculture (Animal Health) - BSc Hons (Animal Health)</option>
             <option value="Bachelor of Science (Honours) in Land Management - BSc Hons (Land Management)">Bachelor of Science (Honours) in Land Management - BSc Hons (Land Management)</option>
             <option value="Master of Science in Agriculture - MSc (Agric)">Master of Science in Agriculture - MSc (Agric)</option>
             <option value="Master of Science (Applied Radiation Science and Technology) - MSc (ARST)">Master of Science (Applied Radiation Science and Technology) - MSc (ARST)</option>
             <option value="Doctor of Philosophy - PhD">Doctor of Philosophy - PhD</option>
             <option value="Doctor of Science - DSc">Doctor of Science - DSc</option>
             <option value="Doctor of Philosophy (Agriculture) - PhD (Agric)">Doctor of Philosophy (Agriculture) - PhD (Agric)</option>
             <option value="BCom Chartered Accountancy (CA (SA))">BCom Chartered Accountancy (CA (SA))</option>
             <option value="Extended BCom Chartered Accountancy (CA (SA))">Extended BCom Chartered Accountancy (CA (SA))</option>
             <option value="BCom Financial Accountancy (SAIPA)">BCom Financial Accountancy (SAIPA)</option>
             <option value="BCom Management Accountancy">BCom Management Accountancy</option>
             <option value="BCom Accounting">BCom Accounting</option>
             <option value="BCom Accounting and Informatics">BCom Accounting and Informatics</option>
             <option value="BCom Economics and Informatics">BCom Economics and Informatics</option>
             <option value="BCom Economics and International Trade">BCom Economics and International Trade</option>
             <option value="BCom Economics and Bank Risk Management">BCom Economics and Bank Risk Management</option>
             <option value="BCom Economics, Bank Risk Management and Investment">BCom Economics, Bank Risk Management and Investment</option>
             <option value="BCom Business Management">BCom Business Management</option>
             <option value="BCom Marketing Management">BCom Marketing Management</option>
             <option value="BSc in IT">BSc in IT</option>
             <option value="BSc Computer Science and Economics">BSc Computer Science and Economics</option>
             <option value="BSc Computer Science and Statistics">BSc Computer Science and Statistics</option>
             <option value="Extended BSc in IT">Extended BSc in IT</option>
             <option value="Extended BSc in Data Mining">Extended BSc in Data Mining</option>
             <option value="BSc Quantitative Risk Management">BSc Quantitative Risk Management</option>
             <option value="BSc Financial Mathematics">BSc Financial Mathematics</option>
             <option value="BSc Data Mining / Business Intelligence">BSc Data Mining / Business Intelligence</option>
             <option value="Honours BCom Chartered Accountancy (CA (SA))">Honours BCom Chartered Accountancy (CA (SA))</option>
             <option value="Honours BSc Information Technology">Honours BSc Information Technology</option>
             <option value="Honours BCom Economics">Honours BCom Economics</option>
             <option value="Honours BCom Economics and Bank Risk Management">Honours BCom Economics and Bank Risk Management</option>
             <option value="Honours BCom Business Management">Honours BCom Business Management</option>
             <option value="Honours BCom Marketing Management">Honours BCom Marketing Management </option>
             <option value="MCom Accountancy">MCom Accountancy</option>
             <option value="MCom Business Management">MCom Business Management</option>
             <option value="MCom Marketing Management">MCom Marketing Management</option>
             <option value="MCom Economics">MCom Economics</option>
             <option value="MSc Information Technology">MSc Information Technology</option>
             <option value="MSc Operational Research">MSc Operational Research</option>
             <option value="PhD Accountancy">PhD Accountancy</option>
             <option value="PhD Bank Risk Business Management">PhD Bank Risk Business Management</option>
             <option value="PhD Marketing Management">PhD Marketing Management</option>
             <option value="PhD Economics">PhD Economics</option>
             <option value="PhD Information Technology">PhD Information Technology</option>
             <option value="PhD Operational Research">PhD Operational Research</option>
             <option value="Diploma in Sport Science">Diploma in Sport Science</option>
             <option value="Certificate in Marketing">Certificate in Marketing</option>
             <option value="Advanced Certificate in Marketing">Advanced Certificate in Marketing</option>
             <option value="Certificate in Financial Management">Certificate in Financial Management</option>
             <option value="Management Skills 1">Management Skills 1</option>
             <option value="Management Skills 2">Management Skills 2</option>
             <option value="Diploma in Sports Science">Diploma in Sports Science	</option>
             <option value="BEng (Chemical Engineering)">BEng (Chemical Engineering)</option>
             <option value="BEng (Civil Engineering)">BEng (Civil Engineering)</option>
             <option value="BEng (Computer Engineering)">BEng (Computer Engineering)</option>
             <option value="BEng (Electrical Engineering)">BEng (Electrical Engineering)</option>
             <option value="BEng (Electronic Engineering)">BEng (Electronic Engineering)</option>
             <option value="BEng (Industrial Engineering)">BEng (Industrial Engineering)</option>
             <option value="BEng (Mechanical Engineering)">BEng (Mechanical Engineering)</option>
             <option value="BEng (Metallurgical Engineering)">BEng (Metallurgical Engineering)</option>
             <option value="BEng (Mining Engineering)">BEng (Mining Engineering)</option>
             <option value="BIS (Information Science)">BIS (Information Science)</option>
             <option value="BIS in Multimedia (Four Year Programme)">BIS in Multimedia (Four Year Programme)</option>
             <option value="BIS (Multimedia)">BIS (Multimedia)</option>
             <option value="BIS (Publishing)">BIS (Publishing)</option>
             <option value="BIT - Bachelor of Information Technology">BIT - Bachelor of Information Technology	</option>
             <option value="BScArch - Bachelor of Science Architecture">BScArch - Bachelor of Science Architecture	</option>
             <option value="BSc (Computer Science)">BSc (Computer Science)</option>
             <option value="BSc - Construction Management">BSc - Construction Management</option>
             <option value="BScInt - Bachelor of Science Interior Architecture">BScInt - Bachelor of Science Interior Architecture</option>
             <option value="BScIT (Information and Knowledge Systems)">BScIT (Information and Knowledge Systems)</option>
             <option value="BScIT (Information and Knowledge Systems) (Four Year Programme)">BScIT (Information and Knowledge Systems) (Four Year Programme)</option>
             <option value="BScLArch - Bachelor of Science Landscape Architecture">BScLArch - Bachelor of Science Landscape Architecture</option>
             <option value="BScQS - Bachelor of Science Quantity Surveying">BScQS - Bachelor of Science Quantity Surveying</option>
             <option value="BSc Real Estate">BSc Real Estate</option>
             <option value="BT&RP - Bachelor of Town and Regional Planning">BT&RP - Bachelor of Town and Regional Planning</option>
             <option value="Engineering Augmented Degree Programme (ENGAGE)">Engineering Augmented Degree Programme (ENGAGE)</option>
             <option value="new">new</option>
             <option value="BAdmin (International Relations)">BAdmin (International Relations)</option>
             <option value="BAdmin (Public Management)">BAdmin (Public Management)</option>
             <option value="BAdmin (Public Management) Option: Public Administration">BAdmin (Public Management) Option: Public Administration	</option>
             <option value="BCom (Agribusiness Management)">BCom (Agribusiness Management)</option>
             <option value="BCom (Business Management)">BCom (Business Management)</option>
             <option value="BCom (Communication Management)">BCom (Communication Management)</option>
             <option value="BCom (Econometrics)">BCom (Econometrics)</option>
             <option value="BCom (Entrepreneurship)">BCom (Entrepreneurship)</option>
             <option value="BCom (Extended programme)">BCom (Extended programme)</option>
             <option value="BCom (Financial Sciences)">BCom (Financial Sciences)</option>
             <option value="BCom (Human Resource Management)">BCom (Human Resource Management)	</option>
             <option value="BCom (Informatics)">BCom (Informatics)</option>
             <option value="BCom (Investment Management)">BCom (Investment Management)</option>
             <option value="BCom (Law)">BCom (Law)</option>
             <option value="BCom Option: Supply Chain Management">BCom Option: Supply Chain Management	</option>
             <option value="BCom (Recreation and Sport Management)">BCom (Recreation and Sport Management)</option>
             <option value="BCom (Statistics)">BCom (Statistics)</option>
             <option value="BCom (Tourism Management)">BCom (Tourism Management)	</option>
             <option value="BEd (Early Childhood Development and Foundation Phase)">BEd (Early Childhood Development and Foundation Phase)</option>
             <option value="BEd (FET) (Economic and Management Sciences)">BEd (FET) (Economic and Management Sciences)</option>
             <option value="BEd (FET) (General)">BEd (FET) (General)</option>
             <option value="BEd (FET) (Human Movement Science and Sport Management)">BEd (FET) (Human Movement Science and Sport Management)</option>
             <option value="BEd (FET) (Natural Sciences)">BEd (FET) (Natural Sciences)</option>
             <option value="BEd (Intermediate Phase)">BEd (Intermediate Phase)</option>
             <option value="BEd (Senior Phase)">BEd (Senior Phase)	</option>
             <option value="BChD - Bachelor of Dentistry">BChD - Bachelor of Dentistry</option>
             <option value="BClinical Medical Practice ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Clinical Medical Practice">BClinical Medical Practice ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Clinical Medical Practice</option>
             <option value="BCur ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Nursing Science">BCur ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Nursing Science</option>
             <option value="BCur (I et A) Education and Administration">BCur (I et A) Education and Administration</option>
             <option value="BDietetics ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Dietetics">BDietetics ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Dietetics</option>
             <option value="BOccTher ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Occupational Therapy">BOccTher ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Occupational Therapy</option>
             <option value="BOH ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Oral Hygiene">BOH ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Oral Hygiene</option>
             <option value="BPhysT ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Physiotherapy">BPhysT ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Physiotherapy</option>
             <option value="BRad - Bachelor of Radiography">BRad - Bachelor of Radiography</option>
             <option value="MBChB ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Medicine and Surgery">MBChB ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Bachelor of Medicine and Surgery</option>
             <option value="BA (Drama)">BA (Drama)</option>
             <option value="BA (Extended programme)">BA (Extended programme)</option>
             <option value="BA (Fine Arts)">BA (Fine Arts)</option>
             <option value="BA - General">BA - General</option>
             <option value="BA - General (Psychology)">BA - General (Psychology)</option>
             <option value="BA (Human Movement Science)">BA (Human Movement Science)</option>
             <option value="BA Human Movement Science Option: Sports Psychology">BA Human Movement Science Option: Sports Psychology</option>
             <option value="BA (Information Design)">BA (Information Design)</option>
             <option value="BA Languages (English Studies)">BA Languages (English Studies)</option>
             <option value="BA (Music)">BA (Music)</option>
             <option value="BA (Visual Studies)">BA (Visual Studies)</option>
             <option value="BCommunication Pathology (Audiology)">BCommunication Pathology (Audiology)</option>
             <option value="BCommunication Pathology (Speech-Language Pathology)">BCommunication Pathology (Speech-Language Pathology)</option>
             <option value="BHCS (Heritage and Cultural Tourism)">BHCS (Heritage and Cultural Tourism)</option>
             <option value="BMus - Bachelor of Music">BMus - Bachelor of Music</option>
             <option value="BPolSci (International Studies)">BPolSci (International Studies)</option>
             <option value="BPolSci (Political Studies)">BPolSci (Political Studies)</option>
             <option value="BSocSci (Industrial Sociology and Labour Studies)">BSocSci (Industrial Sociology and Labour Studies)</option>
             <option value="BSportSci - Bachelor of Sports Sciences">BSportSci - Bachelor of Sports Sciences</option>
             <option value="BSport Sciences with Option Golf">BSport Sciences with Option Golf</option>
             <option value="BSW - Bachelor of Social Work">BSW - Bachelor of Social Work</option>
             <option value="BConsumer Science (Clothing: Retail Management)">BConsumer Science (Clothing: Retail Management)</option>
             <option value="BConsumer Science (Foods: Retail Management)">BConsumer Science (Foods: Retail Management)</option>
             <option value="BConsumer Science (Hospitality Management)">BConsumer Science (Hospitality Management)</option>
             <option value="BSc (Actuarial and Financial Mathematics)">BSc (Actuarial and Financial Mathematics)</option>
             <option value="BScAgric (Agricultural Economics/Agribusiness Management)">BScAgric (Agricultural Economics/Agribusiness Management)</option>
             <option value="BScAgric (Animal Science)">BScAgric (Animal Science)</option>
             <option value="BScAgric (Animal Science/Pasture Science)">BScAgric (Animal Science/Pasture Science)</option>
             <option value="BScAgric (Applied Plant and Soil Sciences)">BScAgric (Applied Plant and Soil Sciences)</option>
             <option value="BScAgric (Food Science and Technology)">BScAgric (Food Science and Technology)</option>
             <option value="BScAgric (Plant Pathology)">BScAgric (Plant Pathology)</option>
             <option value="BSc (Applied Mathematics)">BSc (Applied Mathematics)</option>
             <option value="BSc (Biochemistry)">BSc (Biochemistry)</option>
             <option value="BSc (Biological Sciences)">BSc (Biological Sciences)</option>
             <option value="BSc (Biotechnology)">BSc (Biotechnology)</option>
             <option value="BSc (Chemistry)">BSc (Chemistry)</option>
             <option value="BSc (Ecology)">BSc (Ecology)</option>
             <option value="BSc (Entomology)">BSc (Entomology)</option>
             <option value="BSc (Environmental and Engineering Geology)">BSc (Environmental and Engineering Geology)</option>
             <option value="BSc (Environmental Sciences)">BSc (Environmental Sciences)</option>
             <option value="BSc (Food Management)">BSc (Food Management)</option>
             <option value="BSc (Food Science)">BSc (Food Science)</option>
             <option value="BSc (Four-year programme) ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Biological and Agricultural Sciences">BSc (Four-year programme) ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Biological and Agricultural Sciences</option>
             <option value="BSc (Four-year programme) ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Mathematical Sciences">BSc (Four-year programme) ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Mathematical Sciences</option>
             <option value="BSc (Four-year programme) ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Physical Sciences">BSc (Four-year programme) ÃƒÂ¢Ã¢â€šÂ¬Ã¢â‚¬Å“ Physical Sciences</option>
             <option value="BSc (Genetics)">BSc (Genetics)</option>
             <option value="BSc (Geography)">BSc (Geography)</option>
             <option value="BSc (Geoinformatics)">BSc (Geoinformatics)</option>
             <option value="BSc (Geology)">BSc (Geology)</option>
             <option value="BSc (Human Genetics)">BSc (Human Genetics)</option>
             <option value="BSc (Human Physiology)">BSc (Human Physiology)</option>
             <option value="BSc (Human Physiology, Genetics and Psychology)">BSc (Human Physiology, Genetics and Psychology)</option>
             <option value="BSc (Mathematical Statistics)">BSc (Mathematical Statistics)</option>
             <option value="BSc (Mathematics)">BSc (Mathematics)</option>
             <option value="BSc (Medical Sciences)">BSc (Medical Sciences)</option>
             <option value="BSc (Meteorology)">BSc (Meteorology)</option>
             <option value="BSc (Microbiology)">BSc (Microbiology)</option>
             <option value="BSc (Nutrition)">BSc (Nutrition)</option>
             <option value="BSc (Physics)">BSc (Physics)</option>
             <option value="BSc (Plant Science)">BSc (Plant Science)</option>
             <option value="BSc (Zoology)">BSc (Zoology)	</option>
             <option value="BA (Theology) Bachelor of Arts in Theology">BA (Theology) Bachelor of Arts in Theology	</option>
             <option value="BTh - Bachelor of Theology">BTh - Bachelor of Theology</option>
             <option value="BVSc (University degree in Veterinary Science)">BVSc (University degree in Veterinary Science)</option>
             <option value="BAdminHons (Municipal Administration)">BAdminHons (Municipal Administration)</option>
             <option value="BAdminHons (Public Administration)">BAdminHons (Public Administration)</option>
             <option value="BAdminHons (Public Management)">BAdminHons (Public Management)</option>
             <option value="BComHons (Accounting Sciences)">BComHons (Accounting Sciences)</option>
             <option value="BComHons (Agricultural Economics)">BComHons (Agricultural Economics)</option>
             <option value="BComHons (Business Management)">BComHons (Business Management)</option>
             <option value="BComHons (Communication Management)">BComHons (Communication Management)</option>
             <option value="BComHons (Econometrics)">BComHons (Econometrics)</option>
             <option value="BComHons (Economics)">BComHons (Economics)</option>
             <option value="BComHons (Financial Management Sciences)">BComHons (Financial Management Sciences)</option>
             <option value="BComHons (Human Resource Management)">BComHons (Human Resource Management)</option>
             <option value="BComHons (Informatics)">BComHons (Informatics)</option>
             <option value="BComHons (Internal Auditing)">BComHons (Internal Auditing)</option>
             <option value="BComHons (Investment Management)">BComHons (Investment Management)</option>
             <option value="BComHons (Marketing Management)">BComHons (Marketing Management)</option>
             <option value="BComHons (Mathematical Statistics)">BComHons (Mathematical Statistics)</option>
             <option value="BComHons (Option: Taxation)">BComHons (Option: Taxation)</option>
             <option value="BComHons (Recreation and Sport Management)">BComHons (Recreation and Sport Management)</option>
             <option value="BComHons (Statistics)">BComHons (Statistics)</option>
             <option value="BComHons (Tourism Management)">BComHons (Tourism Management)</option>
             <option value="DAdmin Municipal Administration">DAdmin Municipal Administration</option>
             <option value="DAdmin Public Administration">DAdmin Public Administration</option>
             <option value="DAdmin Public Management">DAdmin Public Management</option>
             <option value="DCom Accounting Sciences">DCom Accounting Sciences</option>
             <option value="DCom Agricultural Economics">DCom Agricultural Economics</option>
             <option value="DCom Business Management">DCom Business Management</option>
             <option value="DCom Communication Management">DCom Communication Management</option>
             <option value="DCom Econometrics">DCom Econometrics</option>
             <option value="DCom Economics"></option>
             <option value="DCom Financial Management Sciences">DCom Financial Management Sciences</option>
             <option value="DCom Human Resource Management">DCom Human Resource Management</option>
             <option value="DCom Informatics">DCom Informatics</option>
             <option value="DCom Internal Auditing">DCom Internal Auditing</option>
             <option value="DCom Marketing Management">DCom Marketing Management</option>
             <option value="DCom Mathematical Statistics">DCom Mathematical Statistics</option>
             <option value="DCom Statistics">DCom Statistics;</option>
             <option value="DCom Tourism Management">DCom Tourism Management</option>
             <option value="MAdmin Municipal Administration (Dissertation)">MAdmin Municipal Administration (Dissertation)</option>
             <option value="MAdmin Public Administration (Dissertation)">MAdmin Public Administration (Dissertation)</option>
             <option value="MAdmin Public Management (Dissertation)">MAdmin Public Management (Dissertation)</option>
             <option value="MCom Accounting Sciences (Coursework)">MCom Accounting Sciences (Coursework)</option>
             <option value="MCom Accounting Sciences (Dissertation)">MCom Accounting Sciences (Dissertation)</option>
             <option value="MCom Agricultural Economics (Dissertation)">MCom Agricultural Economics (Dissertation)</option>
             <option value="MCom Business Management (Dissertation)">MCom Business Management (Dissertation)</option>
             <option value="MCom Communication Management (Coursework)">MCom Communication Management (Coursework)</option>
             <option value="MCom Communication Management (Dissertation)">MCom Communication Management (Dissertation)</option>
             <option value="MCom Econometrics (Coursework)">MCom Econometrics (Coursework)</option>
             <option value="MCom Econometrics (Dissertation)">MCom Econometrics (Dissertation)</option>
             <option value="MCom Economics (Coursework)">MCom Economics (Coursework)</option>
             <option value="MCom Economics (Dissertation)">MCom Economics (Dissertation)</option>
             <option value="MCom Economics of Trade and Investment (Coursework)">MCom Economics of Trade and Investment (Coursework)</option>
             <option value="MCom Economics of Trade and Investment (Dissertation)">MCom Economics of Trade and Investment (Dissertation)</option>
             <option value="MCom Financial Management Sciences (Coursework)">MCom Financial Management Sciences (Coursework)</option>
             <option value="MCom Financial Management Sciences (Dissertation)">MCom Financial Management Sciences (Dissertation)</option>
             <option value="MCom Human Resource Management (Coursework)">MCom Human Resource Management (Coursework)</option>
             <option value="MCom Industrial Psychology (Coursework)">MCom Industrial Psychology (Coursework)</option>
             <option value="MCom Informatics (Coursework)">MCom Informatics (Coursework)</option>
             <option value="MCom Informatics (Dissertation)">MCom Informatics (Dissertation)</option>
             <option value="MCom Internal Auditing (Dissertation)">MCom Internal Auditing (Dissertation)</option>
             <option value="MCom Marketing Management (Coursework)">MCom Marketing Management (Coursework)</option>
             <option value="MCom Marketing Management (Dissertation)">MCom Marketing Management (Dissertation)</option>
             <option value="MCom Mathematical Statistics (Coursework)">MCom Mathematical Statistics (Coursework)</option>
             <option value="MCom Mathematical Statistics (Dissertation)">MCom Mathematical Statistics (Dissertation)</option>
             <option value="MCom Recreation and Sport Management (Dissertation)">MCom Recreation and Sport Management (Dissertation)</option>
             <option value="MCom Statistics (Coursework)">MCom Statistics (Coursework)</option>
             <option value="MCom Statistics (Dissertation)">MCom Statistics (Dissertation)</option>
             <option value="MCom Taxation (Coursework)">MCom Taxation (Coursework)</option>
             <option value="MCom Taxation (Dissertation)">MCom Taxation (Dissertation)</option>
             <option value="MCom Tourism Management (Dissertation)">MCom Tourism Management (Dissertation)</option>
             <option value="MPA Master of Public Administration (Coursework)">MPA Master of Public Administration (Coursework)</option>
             <option value="MPhil Accounting Sciences Option: Fraud Risk Management (Coursework)">MPhil Accounting Sciences Option: Fraud Risk Management (Coursework)</option>
             <option value="MPhil Agricultural Economics (Coursework)">MPhil Agricultural Economics (Coursework)</option>
             <option value="MPhil Business Management Option: Enterprise Risk Management (Coursework)">MPhil Business Management Option: Enterprise Risk Management (Coursework)</option>
             <option value="MPhil Business Management Option: Responsible Leadership (Coursework)">MPhil Business Management Option: Responsible Leadership (Coursework)</option>
             <option value="MPhil Business Management Option: Strategic Management (Coursework)">MPhil Business Management Option: Strategic Management (Coursework)</option>
             <option value="MPhil Business Management Option: Supply Chain Management (Coursework)">MPhil Business Management Option: Supply Chain Management (Coursework)</option>
             <option value="MPhil Economics (Coursework)">MPhil Economics (Coursework)</option>
             <option value="MPhil Entrepreneurship (Coursework)">MPhil Entrepreneurship (Coursework)</option>
             <option value="MPhil in Communication Management (Coursework)">MPhil in Communication Management (Coursework)</option>
             <option value="MPhil in Communication Management (Dissertation)">MPhil in Communication Management (Dissertation)</option>
             <option value="MPhil Informatics (Coursework)">MPhil Informatics (Coursework)</option>
             <option value="MPhil in Human Resource Management (Coursework)">MPhil in Human Resource Management (Coursework)</option>
             <option value="MPhil in Labour Relations (Coursework)">MPhil in Labour Relations (Coursework)</option>
             <option value="MPhil in Marketing Management option Marketing Research">MPhil in Marketing Management option Marketing Research</option>
             <option value="MPhil in Public Policy (Dissertation)">MPhil in Public Policy (Dissertation)</option>
             <option value="MPhil in Taxation (Coursework)">MPhil in Taxation (Coursework)</option>
             <option value="MPhil Internal Auditing (Coursework)">MPhil Internal Auditing (Coursework)</option>
             <option value="MPhil Tourism Managent (Dissertation)">MPhil Tourism Managent (Dissertation)</option>
             <option value="PhD Accounting Sciences">PhD Accounting Sciences</option>
             <option value="PhD Agricultural Economics">PhD Agricultural Economics</option>
             <option value="PhD Communication Management">PhD Communication Management</option>
             <option value="PhD Econometrics">PhD Econometrics</option>
             <option value="PhD Economics">PhD Economics</option>
             <option value="PhD Entrepreneurship">PhD Entrepreneurship</option>
             <option value="PhD Human Resource Management">PhD Human Resource Management</option>
             <option value="PhD in Business Management">PhD in Business Management</option>
             <option value="PhD in Financial Management Sciences">PhD in Financial Management Sciences</option>
             <option value="PhD in Informatics">PhD in Informatics</option>
             <option value="PhD in Public Administration">PhD in Public Administration</option>
             <option value="PhD in Public Management">PhD in Public Management</option>
             <option value="PhD Internal Auditing">PhD Internal Auditing</option>
             <option value="PhD Labour Relations Management">PhD Labour Relations Management</option>
             <option value="PhD Marketing Management">PhD Marketing Management</option>
             <option value="PhD Mathematical Statistics">PhD Mathematical Statistics</option>
             <option value="PhD Municipal Administration">PhD Municipal Administration</option>
             <option value="PhD Option: Fraud Risk Management">PhD Option: Fraud Risk Management</option>
             <option value="PhD Option: Industrial and Organisational Psychology">PhD Option: Industrial and Organisational Psychology</option>
             <option value="PhD Option: Taxation">PhD Option: Taxation</option>
             <option value="PhD Option: Tax Policy">PhD Option: Tax Policy</option>
             <option value="PhD Organisational Behaviour">PhD Organisational Behaviour</option>
             <option value="PhD Statistics">PhD Statistics</option>
             <option value="PhD Tourism Management">PhD Tourism Management</option>
             <option value="BEd (Hons) Assessment and Quality Assurance in Education and Training	"></option>
             <option value="BEd (Hons) Computer-integrated Education">BEd (Hons) Computer-integrated Education</option>
             <option value="BEd (Hons) Curriculum and Instructional Design and Development">BEd (Hons) Curriculum and Instructional Design and Development</option>
             <option value="BEd (Hons) Educational Psychology">BEd (Hons) Educational Psychology</option>
             <option value="BEd (Hons) Education Management, Law and Policy">BEd (Hons) Education Management, Law and Policy</option>
             <option value="BEd (Hons) Learning Support">BEd (Hons) Learning Support</option>
             <option value="BEd (Hons) Science and Mathematics Education">BEd (Hons) Science and Mathematics Education</option>
             <option value="MEd Adult and Community Education and Training (Dissertation)">MEd Adult and Community Education and Training (Dissertation)</option>
             <option value="MEd Assessment and Quality Assurance in Education and Training (Dissertation)">MEd Assessment and Quality Assurance in Education and Training (Dissertation)</option>
             <option value="MEd Curriculum and Instructional Design and Development (Dissertation)">MEd Curriculum and Instructional Design and Development (Dissertation)</option>
             <option value="MEd Educational Leadership (Coursework)">MEd Educational Leadership (Coursework)</option>
             <option value="MEd Educational Psychology (Coursework)">MEd Educational Psychology (Coursework)</option>
             <option value="MEd Education Management, Law and Policy (Dissertation)">MEd Education Management, Law and Policy (Dissertation)</option>
             <option value="MEd General (Dissertation)">MEd General (Dissertation)</option>
             <option value="MEd Learning Support, Guidance and Counselling (Dissertation)">MEd Learning Support, Guidance and Counselling (Dissertation)</option>
             <option value="PhD Adult and Community Education and Training">PhD Adult and Community Education and Training</option>
             <option value="PhD Assessment and Quality Assurance in Education and Training">PhD Assessment and Quality Assurance in Education and Training</option>
             <option value="PhD Computer-integrated Education">PhD Computer-integrated Education</option>
             <option value="PhD Curriculum and Instructional Design and Development">PhD Curriculum and Instructional Design and Development</option>
             <option value="PhD Doctor of Philosophy">PhD Doctor of Philosophy</option>
             <option value="PhD Educational Psychology">PhD Educational Psychology</option>
             <option value="PhD Education Management, Law and Policy">PhD Education Management, Law and Policy</option>
             <option value="PhD Education Policy Studies">PhD Education Policy Studies</option>
             <option value="PhD Learning Support, Guidance and Counselling">PhD Learning Support, Guidance and Counselling</option>
             <option value="BArchHons (Bachelor of Architecture Honours)">BArchHons (Bachelor of Architecture Honours)</option>
             <option value="BEngHons (Bioengineering)">BEngHons (Bioengineering)</option>
             <option value="BEngHons (Chemical Engineering)">BEngHons (Chemical Engineering)</option>
             <option value="BEngHons (Computer Engineering)">BEngHons (Computer Engineering)</option>
             <option value="BEngHons (Control Engineering)">BEngHons (Control Engineering)</option>
             <option value="BEngHons (Electrical Engineering)">BEngHons (Electrical Engineering)</option>
             <option value="BEngHons (Electronic Engineering)">BEngHons (Electronic Engineering)</option>
             <option value="BEngHons (Environmental Engineering)">BEngHons (Environmental Engineering)</option>
             <option value="BEngHons (Geotechnical Engineering)">BEngHons (Geotechnical Engineering)</option>
             <option value="BEngHons (Industrial Engineering)">BEngHons (Industrial Engineering)</option>
             <option value="BEngHons (Mechanical Engineering)">BEngHons (Mechanical Engineering)</option>
             <option value="BEngHons (Metallurgical Engineering)">BEngHons (Metallurgical Engineering)</option>
             <option value="BEngHons (Micro-electronic Engineering)">BEngHons (Micro-electronic Engineering)</option>
             <option value="BEngHons (Mining Engineering)">BEngHons (Mining Engineering)</option>
             <option value="BEngHons (Structural Engineering)">BEngHons (Structural Engineering)</option>
             <option value="BEngHons (Technology Management)">BEngHons (Technology Management)</option>
             <option value="BEngHons (Transportation Engineering)">BEngHons (Transportation Engineering)</option>
             <option value="BEngHons (Water Resources Engineering)">BEngHons (Water Resources Engineering)</option>
             <option value="BEngHons (Water Utilisation Engineering)">BEngHons (Water Utilisation Engineering)</option>
             <option value="BIS (Hons) in Information Science">BIS (Hons) in Information Science</option>
             <option value="BIS (Hons) in Multimedia">BIS (Hons) in Multimedia</option>
             <option value="BIS (Hons) in Publishing">BIS (Hons) in Publishing</option>
             <option value="BLHons Landscape Architecture">BLHons Landscape Architecture</option>
             <option value="BlntHons Interior Architecture">BlntHons Interior Architecture</option>
             <option value="BScHons (Applied Science) (Architecture)">BScHons (Applied Science) (Architecture)</option>
             <option value="BScHons (Applied Science) (Chemical Technology)">BScHons (Applied Science) (Chemical Technology)</option>
             <option value="BScHons (Applied Science) (Control)">BScHons (Applied Science) (Control)</option>
             <option value="BScHons (Applied Science) (Environmental Technology)">BScHons (Applied Science) (Environmental Technology)</option>
             <option value="BScHons (Applied Science) (Geotechnics)">BScHons (Applied Science) (Geotechnics)</option>
             <option value="BSc (Hons) (Applied Science) (Industrial Systems)">BSc (Hons) (Applied Science) (Industrial Systems)</option>
             <option value="BScHons (Applied Science) (Mechanics)">BScHons (Applied Science) (Mechanics)</option>
             <option value="BScHons (Applied Science) (Metallurgy)">BScHons (Applied Science) (Metallurgy)</option>
             <option value="BScHons (Applied Science) (Mining)">BScHons (Applied Science) (Mining)</option>
             <option value="BScHons (Applied Science) (Structures)">BScHons (Applied Science) (Structures)</option>
             <option value="BScHons (Applied Science) (Transportation Planning)">BScHons (Applied Science) (Transportation Planning)</option>
             <option value="BScHons (Applied Science) (Water Resources)">BScHons (Applied Science) (Water Resources)</option>
             <option value="BScHons (Applied Science) (Water Utilisation)">BScHons (Applied Science) (Water Utilisation)</option>
             <option value="BSc (Hons) Computer Science">BSc (Hons) Computer Science</option>
             <option value="BSc (Hons) Construction Management">BSc (Hons) Construction Management</option>
             <option value="BSc (Hons) Quantity Surveying">BSc (Hons) Quantity Surveying</option>
             <option value="BSc (Hons) Real Estate">BSc (Hons) Real Estate</option>
             <option value="BScHons (Technology Management)">BScHons (Technology Management)</option>
             <option value="DEng (Doctor of Engineering)">DEng (Doctor of Engineering)</option>
             <option value="DPhil in Information Science">DPhil in Information Science</option>
             <option value="DPhil in Library Science">DPhil in Library Science</option>
             <option value="Master of Architecture (Professional)">Master of Architecture (Professional)</option>
             <option value="Master of Architecture (Research)">Master of Architecture (Research)</option>
             <option value="Master of Information Technology (Coursework)">Master of Information Technology (Coursework)</option>
             <option value="Master of Interior Architecture (Professional)">Master of Interior Architecture (Professional)</option>
             <option value="Master of Interior Architecture (Research)">Master of Interior Architecture (Research)</option>
             <option value="Master of Landscape Architecture (Professional)">Master of Landscape Architecture (Professional)</option>
             <option value="Master of Landscape Architecture (Research)">Master of Landscape Architecture (Research)</option>
             <option value="Master of Town & Regional Planning (Coursework)">Master of Town & Regional Planning (Coursework)</option>
             <option value="Master of Town & Regional Planning (Dissertation)">Master of Town & Regional Planning (Dissertation)</option>
             <option value="MCom Informatics (Coursework)">MCom Informatics (Coursework)</option>
             <option value="MCom Informatics (Research)">MCom Informatics (Research)</option>
             <option value="MEng (Bioengineering)">MEng (Bioengineering)</option>
             <option value="MEng Chemical Engineering">MEng Chemical Engineering</option>
             <option value="MEng (Computer Engineering)">MEng (Computer Engineering)</option>
             <option value="MEng Control Engineering">MEng Control Engineering</option>
             <option value="MEng (Electrical Engineering)">MEng (Electrical Engineering)</option>
             <option value="MEng (Electronic Engineering)">MEng (Electronic Engineering)</option>
             <option value="MEng (Engineering Management)">MEng (Engineering Management)</option>
             <option value="MEng (Engineering Management) (Coursework)">MEng (Engineering Management) (Coursework)</option>
             <option value="MEng Environmental Engineering (Dissertation)">MEng Environmental Engineering (Dissertation)</option>
             <option value="MEng (Geotechnical Engineering)">MEng (Geotechnical Engineering)</option>
             <option value="MEng (Industrial Engineering) (Dissertation)">MEng (Industrial Engineering) (Dissertation)</option>
             <option value="MEng (Mechanical Engineering)">MEng (Mechanical Engineering)</option>
             <option value="MEng (Metallurgical Engineering)">MEng (Metallurgical Engineering)</option>
             <option value="MEng(Metallurgical Engineering)(Dissertation)">MEng(Metallurgical Engineering)(Dissertation)</option>
             <option value="MEng (Microelectronic Engineering)">MEng (Microelectronic Engineering)</option>
             <option value="MEng Mining Engineering (Dissertation)">MEng Mining Engineering (Dissertation)</option>
             <option value="MEng (Project Management)">MEng (Project Management)</option>
             <option value="MEng (Project Management) (Dissertation)">MEng (Project Management) (Dissertation)</option>
             <option value="MEng (Software Engineering)">MEng (Software Engineering)</option>
             <option value="MEng (Structural Engineering)">MEng (Structural Engineering)</option>
             <option value="MEng Technology Management">MEng Technology Management</option>
             <option value="MEng (Transportation Engineering)">MEng (Transportation Engineering)</option>
             <option value="MEng (Water Resources Engineering)">MEng (Water Resources Engineering)</option>
             <option value="MEng Water Utilisation Engineering">MEng Water Utilisation Engineering</option>
             <option value="MIS in Information Science (Research)">MIS in Information Science (Research)</option>
             <option value="MIS in Library Science (Research)">MIS in Library Science (Research)</option>
             <option value="MIS in Multimedia (Research)">MIS in Multimedia (Research)</option>
             <option value="MIS in Publishing (Research)">MIS in Publishing (Research)</option>
             <option value="MSc (Applied Science)">MSc (Applied Science)</option>
             <option value="MSc (Applied Science) (Architecture)">MSc (Applied Science) (Architecture)</option>
             <option value="MSc (Applied Science) (Chemical Technology)">MSc (Applied Science) (Chemical Technology)</option>
             <option value="MSc (Applied Science) Construction Management">MSc (Applied Science) Construction Management</option>
             <option value="MSc (Applied Science) (Control)">MSc (Applied Science) (Control)</option>
             <option value="MSc (Applied Science) (Environmental Technology)">MSc (Applied Science) (Environmental Technology)</option>
             <option value="MSc (Applied Science) (Geotechnics)">MSc (Applied Science) (Geotechnics)</option>
             <option value="MSc (Applied Science) (Industrial Systems)">MSc (Applied Science) (Industrial Systems)</option>
             <option value="MSc (Applied Science) (Mechanics)">MSc (Applied Science) (Mechanics)</option>
             <option value="MSc (Applied Science) (Metallurgy)">MSc (Applied Science) (Metallurgy)</option>
             <option value="MSc (Applied Science) (Mine Strata Control)">MSc (Applied Science) (Mine Strata Control)</option>
             <option value="MSc (Applied Science) (Mining Environmental Control)">MSc (Applied Science) (Mining Environmental Control)</option>
             <option value="MSc (Applied Science) Quantity Surveying">MSc (Applied Science) Quantity Surveying</option>
             <option value="MSc (Applied Science) Real Estate">MSc (Applied Science) Real Estate</option>
             <option value="MSc (Applied Science) (Structures)">MSc (Applied Science) (Structures)</option>
             <option value="MSc (Applied Science) (Transportation Planning)">MSc (Applied Science) (Transportation Planning)</option>
             <option value="MSc (Applied Science) (Water Resources)">MSc (Applied Science) (Water Resources)</option>
             <option value="MSc (Applied Science) (Water Utilisation)">MSc (Applied Science) (Water Utilisation)</option>
             <option value="MSc (Engineering Management)">MSc (Engineering Management)</option>
             <option value="MSc in Computer Science">MSc in Computer Science</option>
             <option value="MSc in Construction Management">MSc in Construction Management</option>
             <option value="MSc (Project Management)">MSc (Project Management)</option>
             <option value="MSc Quantity Surveying">MSc Quantity Surveying</option>
             <option value="MSc Real Estate">MSc Real Estate</option>
             <option value="MSc Real Estate (Coursework)">MSc Real Estate (Coursework)</option>
             <option value="MSc (Technology Management)">MSc (Technology Management)</option>
             <option value="MSc (Technology Management) (Coursework)">MSc (Technology Management) (Coursework)</option>
             <option value="PhD Architecture">PhD Architecture</option>
             <option value="PhD Computer Science">PhD Computer Science</option>
             <option value="PhD Construction Management">PhD Construction Management</option>
             <option value="PhD (Doctor of Philosophy)">PhD (Doctor of Philosophy)</option>
             <option value="PhD (Engineering)">PhD (Engineering)</option>
             <option value="PhD Industrial Engineering">PhD Industrial Engineering</option>
             <option value="PhD Information Technology">PhD Information Technology</option>
             <option value="PhD Interior Architecture">PhD Interior Architecture</option>
             <option value="PhD Landscape Architecture">PhD Landscape Architecture</option>
             <option value="PhD Publishing">PhD Publishing</option>
             <option value="Phd Quantity Surveying">Phd Quantity Surveying</option>
             <option value="Phd Real Estate">Phd Real Estate</option>
             <option value="PhD Technology Management">PhD Technology Management</option>
             <option value="PhD Town and Regional Planning">PhD Town and Regional Planning</option>
             <option value="DBA Doctor of Business Administration">DBA Doctor of Business Administration </option>
             <option value="MBA Master of Business Administration">MBA Master of Business Administration</option>
             <option value="BDieteticsHons (Bachelor of Dietetics Honours)">BDieteticsHons (Bachelor of Dietetics Honours)</option>
             <option value="BRadHons Diagnostics">BRadHons Diagnostics</option>
             <option value="BRadHons Nuclear Medicine">BRadHons Nuclear Medicine</option>
             <option value="BRadHons Radiation Therapy">BRadHons Radiation Therapy</option>
             <option value="BScHons Aerospace Medicine">BScHons Aerospace Medicine</option>
             <option value="BScHons Anatomy">BScHons Anatomy</option>
             <option value="BScHons Biokinetics">BScHons Biokinetics</option>
             <option value="BScHons Biostatistics">BScHons Biostatistics</option>
             <option value="BScHons Cell Biology">BScHons Cell Biology</option>
             <option value="BScHons Chemical Pathology">BScHons Chemical Pathology</option>
             <option value="BScHons Comparitive Anatomy">BScHons Comparitive Anatomy</option>
             <option value="BScHons Developmental Biology">BScHons Developmental Biology</option>
             <option value="BScHons Haematology">BScHons Haematology</option>
             <option value="BScHons Human Cell Biology">BScHons Human Cell Biology</option>
             <option value="BScHons Human Genetics">BScHons Human Genetics</option>
             <option value="BScHons Human Histology">BScHons Human Histology</option>
             <option value="BScHons Human Physiology">BScHons Human Physiology</option>
             <option value="BScHons Macro-anatomy">BScHons Macro-anatomy</option>
             <option value="BScHons Medical Criminalistics">BScHons Medical Criminalistics</option>
             <option value="BScHons Medical Immunology">BScHons Medical Immunology</option>
             <option value="BScHons Medical Microbiology">BScHons Medical Microbiology</option>
             <option value="BScHons Medical Nuclear Science">BScHons Medical Nuclear Science</option>
             <option value="BScHons Medical Oncology">BScHons Medical Oncology</option>
             <option value="BScHons Medical Physics">BScHons Medical Physics</option>
             <option value="BScHons Medical Virology">BScHons Medical Virology</option>
             <option value="BScHons Neuro-anatomy">BScHons Neuro-anatomy</option>
             <option value="BScHons Pharmacology">BScHons Pharmacology</option>
             <option value="BScHons Physical Anthropology">BScHons Physical Anthropology</option>
             <option value="BScHons Radiation Oncology">BScHons Radiation Oncology</option>
             <option value="BScHons Reproductive Biology">BScHons Reproductive Biology</option>
             <option value="BScHons Reproductive Biology: Andrology">BScHons Reproductive Biology: Andrology</option>
             <option value="BScHons Sport Science">BScHons Sport Science</option>
             <option value="DCur (Doctor of Nursing)">DCur (Doctor of Nursing)</option>
             <option value="DOccTher (Doctor of Occupational Therapy)">DOccTher (Doctor of Occupational Therapy)</option>
             <option value="DSc (Doctor of Science)">DSc (Doctor of Science)</option>
             <option value="DSc (Doctor of Science) Dietetics">DSc (Doctor of Science) Dietetics</option>
             <option value="MChD Community Dentistry">MChD Community Dentistry</option>
             <option value="MChD Maxillo-Facial and Oral Surgery">MChD Maxillo-Facial and Oral Surgery</option>
             <option value="MChD Maxillo-Facial and Oral Surgery (aa)">MChD Maxillo-Facial and Oral Surgery (aa)</option>
             <option value="MChD Maxillo-Facial and Oral Surgery (bb)">MChD Maxillo-Facial and Oral Surgery (bb)</option>
             <option value="MChD Maxillo-Facial and Oral Surgery (cc)">MChD Maxillo-Facial and Oral Surgery (cc)</option>
             <option value="MChD Oral Pathology">MChD Oral Pathology</option>
             <option value="MChD Orthodontics">MChD Orthodontics</option>
             <option value="MChD Periodontics and Oral Medicine">MChD Periodontics and Oral Medicine</option>
             <option value="MChD Prosthodontics">MChD Prosthodontics</option>
             <option value="MCur Clinical Fields of Study">MCur Clinical Fields of Study</option>
             <option value="MCur Clinical Fields of Study (Coursework)">MCur Clinical Fields of Study (Coursework)</option>
             <option value="MCur Nursing Education">MCur Nursing Education</option>
             <option value="MCur Nursing Education (Coursework)">MCur Nursing Education (Coursework)</option>
             <option value="MCur Nursing Management">MCur Nursing Management</option>
             <option value="MCur Nursing Management (Coursework)">MCur Nursing Management (Coursework)</option>
             <option value="MD Anaesthesiology">MD Anaesthesiology</option>
             <option value="MD Anatomy">MD Anatomy</option>
             <option value="MD Community Health">MD Community Health</option>
             <option value="MD Dermatology">MD Dermatology</option>
             <option value="MD Family Medicine">MD Family Medicine</option>
             <option value="MD Forensic Medicine">MD Forensic Medicine</option>
             <option value="MD Geriatrics">MD Geriatrics</option>
             <option value="MD Haematology">MD Haematology</option>
             <option value="MD Health Systems">MD Health Systems</option>
             <option value="MD Human Physiology">MD Human Physiology</option>
             <option value="MDietetics (Coursework)">MDietetics (Coursework)</option>
             <option value="MDietetics (Research)">MDietetics (Research)</option>
             <option value="MD Internal Medicine">MD Internal Medicine</option>
             <option value="MD Medical Microbiology">MD Medical Microbiology</option>
             <option value="MD Medical Oncology">MD Medical Oncology</option>
             <option value="MD Neurology">MD Neurology</option>
             <option value="MD Neurosurgery">MD Neurosurgery</option>
             <option value="MD Obstetrics and Gynaecology">MD Obstetrics and Gynaecology</option>
             <option value="MD Ophthalmology">MD Ophthalmology</option>
             <option value="MD Otorhinolaryngology">MD Otorhinolaryngology</option>
             <option value="MD Paediatrics">MD Paediatrics</option>
             <option value="MD Pathology">MD Pathology</option>
             <option value="MD Pharmacology">MD Pharmacology</option>
             <option value="MD Plastic and Reconstructive Surgery">MD Plastic and Reconstructive Surgery</option>
             <option value="MD Psychiatry">MD Psychiatry</option>
             <option value="MD Public Health">MD Public Health</option>
             <option value="MD Radiation Oncology">MD Radiation Oncology</option>
             <option value="MD Radiological Diagnostics">MD Radiological Diagnostics</option>
             <option value="MD Reproductive Biology">MD Reproductive Biology</option>
             <option value="MD Reproductive Biology: Andrology">MD Reproductive Biology: Andrology</option>
             <option value="MD Surgery">MD Surgery</option>
             <option value="MD Thoracic Surgery">MD Thoracic Surgery</option>
             <option value="MD Urology">MD Urology</option>
             <option value="MECI Master of Early Childhood Intervention">MECI Master of Early Childhood Intervention</option>
             <option value="MMed Anaesthesiology">MMed Anaesthesiology</option>
             <option value="MMed Dermatology">MMed Dermatology</option>
             <option value="MMed Emergency Medicine">MMed Emergency Medicine</option>
             <option value="MMed Family Medicine">MMed Family Medicine</option>
             <option value="MMed Geriatics">MMed Geriatics</option>
             <option value="MMed Internal Medicine">MMed Internal Medicine</option>
             <option value="MMed Medical Oncology">MMed Medical Oncology</option>
             <option value="MMed Neurology">MMed Neurology</option>
             <option value="MMed Neurosurgery">MMed Neurosurgery</option>
             <option value="MMed Nuclear Medicine">MMed Nuclear Medicine</option>
             <option value="MMed Obstetrics and Gynaecology">MMed Obstetrics and Gynaecology</option>
             <option value="MMed Ophthalmology">MMed Ophthalmology</option>
             <option value="MMed Orthopaedics">MMed Orthopaedics</option>
             <option value="MMed Otorhinolaryngology">MMed Otorhinolaryngology</option>
             <option value="MMed Paediatrics">MMed Paediatrics</option>
             <option value="MMed Pathology: Anatomical Pathology">MMed Pathology: Anatomical Pathology</option>
             <option value="MMed Pathology: Chemical Pathology">MMed Pathology: Chemical Pathology</option>
             <option value="MMed Pathology: Clinical Pathology">MMed Pathology: Clinical Pathology</option>
             <option value="MMed Pathology: Forensic Pathology">MMed Pathology: Forensic Pathology</option>
             <option value="MMed Pathology: Haematology">MMed Pathology: Haematology</option>
             <option value="MMed Pathology: Medical Microbiology">MMed Pathology: Medical Microbiology</option>
             <option value="MMed Pathology: Medical Virology">MMed Pathology: Medical Virology</option>
             <option value="MMed Plastic Surgery">MMed Plastic Surgery</option>
             <option value="MMed Psychiatry">MMed Psychiatry</option>
             <option value="MMed Public Health Medicine">MMed Public Health Medicine</option>
             <option value="MMed Radiation Oncology">MMed Radiation Oncology</option>
             <option value="MMed Radiological Diagnostics">MMed Radiological Diagnostics</option>
             <option value="MMed Surgery">MMed Surgery</option>
             <option value="MMed Surgery Option: Paediatric Surgery">MMed Surgery Option: Paediatric Surgery</option>
             <option value="MMed Thoracic Surgery">MMed Thoracic Surgery</option>
             <option value="MMed Urology">MMed Urology</option>
             <option value="MMilMed (Master of Military Medicine)">MMilMed (Master of Military Medicine)</option>
             <option value="MOccTher Activity Theory">MOccTher Activity Theory</option>
             <option value="MOccTher Hand Therapy">MOccTher Hand Therapy</option>
             <option value="MOccTher Neurology">MOccTher Neurology</option>
             <option value="MOccTher Paediatrics">MOccTher Paediatrics</option>
             <option value="MOccTher Psychiatry">MOccTher Psychiatry</option>
             <option value="MOccTher (Research)">MOccTher (Research)</option>
             <option value="MPharmMed (Master of Medical Pharmacology)">MPharmMed (Master of Medical Pharmacology)</option>
             <option value="MPhil Pain Management">MPhil Pain Management</option>
             <option value="MPhil Philosophy and Ethics of Mental Health">MPhil Philosophy and Ethics of Mental Health</option>
             <option value="MPH (Master of Public Health)">MPH (Master of Public Health)</option>
             <option value="MPhysT (Internal Medicine)">MPhysT (Internal Medicine)</option>
             <option value="MPhysT (Neurology/Neurosurgery)">MPhysT (Neurology/Neurosurgery)</option>
             <option value="MPhysT (Orthopaedic Manual Therapy)">MPhysT (Orthopaedic Manual Therapy)</option>
             <option value="MPhysT (Orthopaedics)">MPhysT (Orthopaedics)</option>
             <option value="MPhysT (Paediatrics)">MPhysT (Paediatrics)</option>
             <option value="MPhysT (Research)">MPhysT (Research)</option>
             <option value="MPhysT (Sports Medicine)">MPhysT (Sports Medicine)</option>
             <option value="MPhysT (Surgery)">MPhysT (Surgery)</option>
             <option value="MPhysT (Women's Health)">MPhysT (Women's Health)</option>
             <option value="MRad Diagnostics">MRad Diagnostics</option>
             <option value="MRad Nuclear Medicine">MRad Nuclear Medicine</option>
             <option value="MRad Radiation Therapy">MRad Radiation Therapy</option>
             <option value="MSc Aerospace Medicine">MSc Aerospace Medicine</option>
             <option value="MSc Anatomy">MSc Anatomy</option>
             <option value="MSc Applied Human Nutrition">MSc Applied Human Nutrition</option>
             <option value="MSc Biostatistics (Public Health)">MSc Biostatistics (Public Health)</option>
             <option value="MSc Cell Biology">MSc Cell Biology</option>
             <option value="MSc Chemical Pathology">MSc Chemical Pathology</option>
             <option value="MSc Clinical Epidemiology">MSc Clinical Epidemiology</option>
             <option value="MSc Community Health">MSc Community Health</option>
             <option value="MScDent General">MScDent General</option>
             <option value="MScDent Maxillo facial and Oral Radiology">MScDent Maxillo facial and Oral Radiology</option>
             <option value="MScDent Oral Surgery">MScDent Oral Surgery</option>
             <option value="MSc Epidemiology">MSc Epidemiology</option>
             <option value="MSc Haematology">MSc Haematology</option>
             <option value="MSc Human Genetics">MSc Human Genetics</option>
             <option value="MSc Human Physiology">MSc Human Physiology</option>
             <option value="MSc Medical Applied Psychology">MSc Medical Applied Psychology</option>
             <option value="MSc Medical Criminalistics">MSc Medical Criminalistics</option>
             <option value="MSc Medical Immunology">MSc Medical Immunology</option>
             <option value="MSc Medical Microbiology">MSc Medical Microbiology</option>
             <option value="MSc Medical Nuclear Science">MSc Medical Nuclear Science</option>
             <option value="MSc Medical Oncology">MSc Medical Oncology</option>
             <option value="MSc Medical Physics">MSc Medical Physics</option>
             <option value="MSc Medical Virology">MSc Medical Virology</option>
             <option value="MSc Pharmacology">MSc Pharmacology</option>
             <option value="MSc Radiation Oncology">MSc Radiation Oncology</option>
             <option value="MSc Reproductive Biology">MSc Reproductive Biology</option>
             <option value="MSc Reproductive Biology: Andrology">MSc Reproductive Biology: Andrology</option>
             <option value="MSc Sport Science">MSc Sport Science</option>
             <option value="MSc Sports Medicine">MSc Sports Medicine</option>
             <option value="PhD Anaesthesiology">PhD Anaesthesiology</option>
             <option value="PhD Anatomical Pathology">PhD Anatomical Pathology</option>
             <option value="PhD Anatomy">PhD Anatomy;PhD Anatomy;PhD Anatomy</option>
             <option value="PhD Chemical Pathology">PhD Chemical Pathology</option>
             <option value="PhD Community Health">PhD Community Health</option>
             <option value="PhD (Dentistry)">PhD (Dentistry)</option>
             <option value="PhD Diagnostic Radiology">PhD Diagnostic Radiology</option>
             <option value="PhD Dietetics">PhD Dietetics</option>
             <option value="PhD Environmental Health">PhD Environmental Health</option>
             <option value="PhD Epidemiology">PhD Epidemiology</option>
             <option value="PhD Family Medicine">PhD Family Medicine</option>
             <option value="PhD Forensic Pathology">PhD Forensic Pathology</option>
             <option value="PhD Health Ethics">PhD Health Ethics</option>
             <option value="PhD Health Systems">PhD Health Systems</option>
             <option value="PhD Human Genetics">PhD Human Genetics</option>
             <option value="PhD Internal Medicine">PhD Internal Medicine</option>
             <option value="PhD Medical Immunology">PhD Medical Immunology</option>
             <option value="PhD Medical Microbiology">PhD Medical Microbiology</option>
             <option value="PhD Medical Nuclear Science">PhD Medical Nuclear Science</option>
             <option value="PhD Medical Oncology">PhD Medical Oncology</option>
             <option value="PhD Medical Physics">PhD Medical Physics</option>
             <option value="PhD Medical Virology">PhD Medical Virology</option>
             <option value="PhD Mental Health">PhD Mental Health</option>
             <option value="PhD Neurology">PhD Neurology</option>
             <option value="PhD Nursing Science">PhD Nursing Science</option>
             <option value="PhD Obstetrics and Gynaecology">PhD Obstetrics and Gynaecology</option>
             <option value="PhD Occupational Therapy">PhD Occupational Therapy</option>
             <option value="PhD Orthopaedics">PhD Orthopaedics</option>
             <option value="PhD Paediatrics">PhD Paediatrics</option>
             <option value="PhD Pharmacology">PhD Pharmacology</option>
             <option value="PhD Physiotherapy">PhD Physiotherapy</option>
             <option value="PhD Psychiatry">PhD Psychiatry</option>
             <option value="PhD Public Health">PhD Public Health</option>
             <option value="PhD Radiography">PhD Radiography</option>
             <option value="PhD Reproductive Biology">PhD Reproductive Biology</option>
             <option value="PhD Reproductive Biology: Andrology">PhD Reproductive Biology: Andrology</option>
             <option value="PhD Sport Science">PhD Sport Science</option>
             <option value="PhD Sports Medicine">PhD Sports Medicine</option>
             <option value="PhD Urology">PhD Urology</option>
             <option value="BA HMSHons Biokinetics">BA HMSHons Biokinetics	</option>
             <option value="BA HMSHons in Recreation">BA HMSHons in Recreation	</option>
             <option value="BA HMSHons Recreation and Sports Management">BA HMSHons Recreation and Sports Management	</option>
             <option value="BA HMSHons Sport Science">BA HMSHons Sport Science	</option>
             <option value="BA(Hons) African Languages">BA(Hons) African Languages	</option>
             <option value="BA(Hons) Afrikaans">BA(Hons) Afrikaans	</option>
             <option value="BA(Hons) Ancient Languages and Cultures Studies">BA(Hons) Ancient Languages and Cultures Studies	</option>
             <option value="BA(Hons) Applied Language Studies">BA(Hons) Applied Language Studies	</option>
             <option value="BA(Hons) Archaeology">BA(Hons) Archaeology	</option>
             <option value="BA(Hons) Augmentative and Alternative Communication">BA(Hons) Augmentative and Alternative Communication	</option>
             <option value="BA(Hons) Biblical and Religious Studies">BA(Hons) Biblical and Religious Studies	</option>
             <option value="BA(Hons) Criminology">BA(Hons) Criminology	</option>
             <option value="BA(Hons) Drama and Film Studies">BA(Hons) Drama and Film Studies	</option>
             <option value="BA(Hons) English">BA(Hons) English	</option>
             <option value="BA(Hons) French">BA(Hons) French</option>
             <option value="BA(Hons) German">BA(Hons) German	</option>
             <option value="BA(Hons) HMS in Recreation Option: Corporate Wellness">BA(Hons) HMS in Recreation Option: Corporate Wellness	</option>
             <option value="BA(Hons) International Relations">BA(Hons) International Relations	</option>
             <option value="BA(Hons) Journalism">BA(Hons) Journalism	</option>
             <option value="BA(Hons) Literary Theory">BA(Hons) Literary Theory</option>
             <option value="BA(Hons) Philosophy">BA(Hons) Philosophy</option>
             <option value="BA(Hons) Political Science">BA(Hons) Political Science	</option>
             <option value="BA(Hons) Translation and Professional Writing">BA(Hons) Translation and Professional Writing	</option>
             <option value="BA(Hons) Visual Studies">BA(Hons) Visual Studies	</option>
             <option value="BHCS(Hons) Heritage and Cultural Tourism">BHCS(Hons) Heritage and Cultural Tourism	</option>
             <option value="BHCS (Hons) Heritage and Museum Studies">BHCS (Hons) Heritage and Museum Studies	</option>
             <option value="BHCS (Hons) History">BHCS (Hons) History	</option>
             <option value="BMus(Hons) General Musicology">BMus(Hons) General Musicology	</option>
             <option value="BMus(Hons) in Music Communication">BMus(Hons) in Music Communication	</option>
             <option value="BMus(Hons) Music Education">BMus(Hons) Music Education	</option>
             <option value="BMus(Hons) Music Technology">BMus(Hons) Music Technology	</option>
             <option value="BMus(Hons) Performing Art">BMus(Hons) Performing Art	</option>
             <option value="BSocSci (Hons) Anthropology">BSocSci (Hons) Anthropology	</option>
             <option value="BSocSci(Hons) Development Studies">BSocSci(Hons) Development Studies	</option>
             <option value="BSocSci(Hons) Environmental Analysis and Management">BSocSci(Hons) Environmental Analysis and Management	</option>
             <option value="BSocSci(Hons) Gender Studies">BSocSci(Hons) Gender Studies	</option>
             <option value="BSocSci(Hons) Geography">BSocSci(Hons) Geography	</option>
             <option value="BSocSci(Hons) Industrial Sociology and Labour Studies">BSocSci(Hons) Industrial Sociology and Labour Studies	</option>
             <option value="BSocSci(Hons) Psychology">BSocSci(Hons) Psychology	</option>
             <option value="BSocSci(Hons) Sociology">BSocSci(Hons) Sociology	</option>
             <option value="DLitt African Languages">DLitt African Languages	</option>
             <option value="DLitt Afrikaans">DLitt Afrikaans	</option>
             <option value="DLitt English">DLitt English	</option>
             <option value="DLitt French">DLitt French	</option>
             <option value="DLitt German">DLitt German	</option>
             <option value="DLitt Greek">DLitt Greek	</option>
             <option value="DLitt Latin">DLitt Latin	</option>
             <option value="DLitt Literary Theory">DLitt Literary Theory	</option>
             <option value="DLitt Semitic Languages">DLitt Semitic Languages	</option>
             <option value="DMus focusing on Composition">DMus focusing on Composition	</option>
             <option value="DMus focusing on Performing Arts">DMus focusing on Performing Arts	</option>
             <option value="DMus focusing on Research">DMus focusing on Research	</option>
             <option value="DPhil Anthropology">DPhil Anthropology	</option>
             <option value="DPhil Archaeology">DPhil Archaeology	</option>
             <option value="DPhil Communication Pathology">DPhil Communication Pathology	</option>
             <option value="DPhil Criminology">DPhil Criminology	</option>
             <option value="DPhil Drama">DPhil Drama	</option>
             <option value="DPhil Drama and Film Studies">DPhil Drama and Film Studies	</option>
             <option value="DPhil Fine Arts focusing on Creative Production">DPhil Fine Arts focusing on Creative Production	</option>
             <option value="DPhil Fine Arts focusing on Curatorial Practice">DPhil Fine Arts focusing on Curatorial Practice	</option>
             <option value="DPhil Fine Arts focusing on Research">DPhil Fine Arts focusing on Research	</option>
             <option value="DPhil Geography">DPhil Geography	</option>
             <option value="DPhil History">DPhil History	</option>
             <option value="DPhil History of Art (Research)">DPhil History of Art (Research)	</option>
             <option value="DPhil Human Movement Science">DPhil Human Movement Science	</option>
             <option value="DPhil Human Movement Science Option: Biokinetics">DPhil Human Movement Science Option: Biokinetics	</option>
             <option value="DPhil Human Movement Science Option: Recreation and Sports management">DPhil Human Movement Science Option: Recreation and Sports management	</option>
             <option value="DPhil Human Movement Science Option: Sports Sciences">DPhil Human Movement Science Option: Sports Sciences	</option>
             <option value="DPhil International Relations">DPhil International Relations	</option>
             <option value="DPhil Linguistics">DPhil Linguistics	</option>
             <option value="DPhil Philosophy">DPhil Philosophy	</option>
             <option value="DPhil Political Science">DPhil Political Science	</option>
             <option value="DPhil Psychology">DPhil Psychology	</option>
             <option value="DPhil Social Work">DPhil Social Work	</option>
             <option value="DPhil Sociology">DPhil Sociology	</option>
             <option value="MA African-European Cultural Relations (Research)">MA African-European Cultural Relations (Research)	</option>
             <option value="MA African Languages (Coursework)">MA African Languages (Coursework)	</option>
             <option value="MA African Languages (Research)">MA African Languages (Research)</option>
             <option value="MA Afrikaans (Coursework)">MA Afrikaans (Coursework)	</option>
             <option value="MA Afrikaans (Research)">MA Afrikaans (Research)</option>
             <option value="MA Ancient Languages and Cultures Studies (Research)">MA Ancient Languages and Cultures Studies (Research)</option>
             <option value="MA Applied Language Studies Option:Translation and Interpreting (Coursework)">MA Applied Language Studies Option:Translation and Interpreting (Coursework)	</option>
             <option value="MA Applied Language Studies (Research)">MA Applied Language Studies (Research)	</option>
             <option value="MA Archaeology (Research)">MA Archaeology (Research)	</option>
             <option value="MA Augmentative and Alternative Communication (Coursework)">MA Augmentative and Alternative Communication (Coursework)</option>
             <option value="MA Augmentative and Alternative Communication (Research)">MA Augmentative and Alternative Communication (Research)</option>
             <option value="MA Biblical and Religious Studies (Coursework)">MA Biblical and Religious Studies (Coursework)</option>
             <option value="MA Biblical and Religious Studies (Research)">MA Biblical and Religious Studies (Research)</option>
             <option value="MA Clinical Psychology (Coursework)">MA Clinical Psychology (Coursework)</option>
             <option value="MA Counselling Psychology (Coursework)">MA Counselling Psychology (Coursework)</option>
             <option value="MA Creative Writing (Research)">MA Creative Writing (Research)</option>
             <option value="MA Criminology (Research)">MA Criminology (Research)</option>
             <option value="MA Culture and Media Studies">MA Culture and Media Studies</option>
             <option value="MA Drama and Film Studies (Research)">MA Drama and Film Studies (Research)</option>
             <option value="MA Drama Performance (Research)">MA Drama Performance (Research)</option>
             <option value="MA Drama (Research)">MA Drama (Research)</option>
             <option value="MA English (Research)">MA English (Research)</option>
             <option value="MA Environment and Society (Coursework)">MA Environment and Society (Coursework)</option>
             <option value="MA Fine Arts (Research)">MA Fine Arts (Research)</option>
             <option value="MA French (Research)">MA French (Research)	</option>
             <option value="MA General (Research)">MA General (Research)</option>
             <option value="MA Geography (Research)">MA Geography (Research)</option>
             <option value="MA German (Research)">MA German (Research)</option>
             <option value="MA History of Art (Research)">MA History of Art (Research)</option>
             <option value="MA Human Movement Science Option: Biokinetics (Research)">MA Human Movement Science Option: Biokinetics (Research)</option>
             <option value="MA Human Movement Science Option: Recreation and Sports Management (Research)">MA Human Movement Science Option: Recreation and Sports Management (Research)</option>
             <option value="MA Human Movement Science Option: Sports Sciences (Research)">MA Human Movement Science Option: Sports Sciences (Research)</option>
             <option value="MA Human Movement Science (Research)">MA Human Movement Science (Research)</option>
             <option value="MA Information Design (Coursework)">MA Information Design (Coursework)</option>
             <option value="MA International Relations (Coursework)">MA International Relations (Coursework)</option>
             <option value="MA International Relations (Research)">MA International Relations (Research)</option>
             <option value="MA Linguistics (Research)">MA Linguistics (Research)</option>
             <option value="MA Literary Theory (Research)">MA Literary Theory (Research)</option>
             <option value="MA Philosophy (Research)">MA Philosophy (Research)</option>
             <option value="MA Political Science (Coursework)">MA Political Science (Coursework)</option>
             <option value="MA Political Science (Research)">Political Science (Research)</option>
             <option value="MA Psychology (Research)">MA Psychology (Research)</option>
             <option value="MA Research Psychology (Coursework)">MA Research Psychology (Coursework)</option>
             <option value="MA Visual Studies (Research)">MA Visual Studies (Research)</option>
             <option value="M Communication Pathology (Research)">M Communication Pathology (Research)	</option>
             <option value="M Diplomatic Studies (Coursework)">M Diplomatic Studies (Coursework)</option>
             <option value="MHCS Heritage and Cultural Tourism (Coursework)">MHCS Heritage and Cultural Tourism (Coursework)</option>
             <option value="MHCS Heritage and Cultural Tourism (Research)">MHCS Heritage and Cultural Tourism (Research)</option>
             <option value="MHCS Heritage and Museum Studies (Coursework)">MHCS Heritage and Museum Studies (Coursework)</option>
             <option value="MHCS Heritage and Museum Studies (Research)">MHCS Heritage and Museum Studies (Research)</option>
             <option value="MHCS History (Coursework)">MHCS History (Coursework)</option>
             <option value="MHCS History (Research)">MHCS History (Research)</option>
             <option value="MMus Composition (Research)">MMus Composition (Research)</option>
             <option value="MMus Music Education (Coursework)">MMus Music Education (Coursework)</option>
             <option value="MMus Music Education (Research)">MMus Music Education (Research)</option>
             <option value="MMus Musicology (Research)">MMus Musicology (Research)</option>
             <option value="MMus Music Technology (Coursework)">MMus Music Technology (Coursework)</option>
             <option value="MMus Music Therapy (Coursework)">MMus Music Therapy (Coursework)</option>
             <option value="MMus Performing Art (Music) (Coursework)">MMus Performing Art (Music) (Coursework)	</option>
             <option value="MPhil Option: Political Philosopy">MPhil Option: Political Philosopy</option>
             <option value="M Security Studies (Coursework)">M Security Studies (Coursework)	</option>
             <option value="MSocSci Anthropology (Research)">MSocSci Anthropology (Research)	</option>
             <option value="MSocSci Development Studies (Research)">MSocSci Development Studies (Research)	</option>
             <option value="MSocSci Employee Assistance Programmes (Coursework)">MSocSci Employee Assistance Programmes (Coursework)</option>
             <option value="MSocSci Gender Studies (Coursework)">MSocSci Gender Studies (Coursework)</option>
             <option value="MSocSci Gender Studies (Research)">MSocSci Gender Studies (Research)</option>
             <option value="MSocSci Industrial Sociology and Labour Studies (Coursework)">MSocSci Industrial Sociology and Labour Studies (Coursework)</option>
             <option value="MSocSci Industrial Sociology and Labour Studies (Research)">MSocSci Industrial Sociology and Labour Studies (Research)</option>
             <option value="MSocSci Sociology (Coursework)">MSocSci Sociology (Coursework)</option>
             <option value="MSocSci Sociology (Research)">MSocSci Sociology (Research)</option>
             <option value="MSW in Employee Assistance Programmes">MSW in Employee Assistance Programmes</option>
             <option value="MSW in Healthcare (Coursework)">MSW in Healthcare (Coursework)</option>
             <option value="MSW in Social Development and Policy (Coursework)">MSW in Social Development and Policy (Coursework)</option>
             <option value="MSW Play Therapy (Coursework)">MSW Play Therapy (Coursework)</option>
             <option value="MSW Social Work (Research)">MSW Social Work (Research)</option>
             <option value="PhD Augmentative and Alternative Communication">PhD Augmentative and Alternative Communication</option>
             <option value="PhD Environment and Society (Research)">PhD Environment and Society (Research)</option>
             <option value="PhD General">PhD General</option>
             <option value="PhD History of Ancient Culture">PhD History of Ancient Culture</option>
             <option value="PhD in Biblical and Religious Studies">PhD in Biblical and Religious Studies</option>
             <option value="PhD Information Design">PhD Information Design</option>
             <option value="PhD in Psychology">PhD in Psychology</option>
             <option value="PhD Option: Creative Writing">PhD Option: Creative Writing</option>
             <option value="PhD Option: Development Studies">PhD Option: Development Studies</option>
             <option value="PhD Option: Heritage and Cultural Tourism"></option>
             <option value="PhD Visual Studies">PhD Visual Studies</option>
             <option value="LLD Human Rights">LLD Human Rights</option>
             <option value="LLD Jurisprudence">LLD Jurisprudence</option>
             <option value="LLD Mercantile Law">LLD Mercantile Law</option>
             <option value="LLD Private Law">LLD Private Law</option>
             <option value="LLD Procedural Law">LLD Procedural Law</option>
             <option value="LLD Public Law">LLD Public Law</option>
             <option value="LLM (Coursework) Child Law">LLM (Coursework) Child Law</option>
             <option value="LLM (Coursework) Constitutional Law and Administrative Law">LLM (Coursework) Constitutional Law and Administrative Law</option>
             <option value="LLM (Coursework) Corporate Law">LLM (Coursework) Corporate Law</option>
             <option value="LLM (Coursework) Criminal Law">LLM (Coursework) Criminal Law</option>
             <option value="LLM (Coursework) Environmental Law">LLM (Coursework) Environmental Law</option>
             <option value="LLM (Coursework) Human Rights and Democratisation in Africa">LLM (Coursework) Human Rights and Democratisation in Africa</option>
             <option value="LLM (Coursework) Insolvency Law">LLM (Coursework) Insolvency Law</option>
             <option value="LLM (Coursework) International Law">LLM (Coursework) International Law</option>
             <option value="LLM (Coursework) International Law Option: Air, Space and Telecommunication Law">LLM (Coursework) International Law Option: Air, Space and Telecommunication Law</option>
             <option value="LLM (Coursework) International Law Option: International Humanitarian Law and Human Rights in Military Operations">LLM (Coursework) International Law Option: International Humanitarian Law and Human Rights in Military Operations</option>
             <option value="LLM (Coursework) International Trade and Investment Law in Africa (Option 1)">LLM (Coursework) International Trade and Investment Law in Africa (Option 1)	</option>
             <option value="LLM (Coursework) International Trade and Investment Law in Africa (Option 2)">LLM (Coursework) International Trade and Investment Law in Africa (Option 2)</option>
             <option value="LLM (Coursework) Labour Law">LLM (Coursework) Labour Law</option>
             <option value="LLM (Coursework) Law and Political Justice">LLM (Coursework) Law and Political Justice</option>
             <option value="LLM (Coursework) Law of Contract">LLM (Coursework) Law of Contract</option>
             <option value="LLM (Coursework) Mercantile Law">LLM (Coursework) Mercantile Law</option>
             <option value="LLM (Coursework) Multidisciplinary Human Rights">LLM (Coursework) Multidisciplinary Human Rights</option>
             <option value="LLM (Coursework) Private Law: General">LLM (Coursework) Private Law: General</option>
             <option value="LLM (Coursework) Private Law Option: Estate Law">LLM (Coursework) Private Law Option: Estate Law</option>
             <option value="LLM (Coursework) Private Law Option: Family Law">LLM (Coursework) Private Law Option: Family Law</option>
             <option value="LLM (Coursework) Private Law Option: Intellectual Property Law">LLM (Coursework) Private Law Option: Intellectual Property Law</option>
             <option value="LLM (Coursework) Procedural Law">LLM (Coursework) Procedural Law</option>
             <option value="LLM (Coursework) Socio-Economic Rights: Theory and Practice">LLM (Coursework) Socio-Economic Rights: Theory and Practice</option>
             <option value="LLM (Coursework) Tax Law">LLM (Coursework) Tax Law	</option>
             <option value="LLM (Dissertation) Human Rights"></option>
             <option value="LLM (Dissertation) Jurisprudence">LLM (Dissertation) Jurisprudence</option>
             <option value="LLM (Dissertation) Mercantile Law">LLM (Dissertation) Mercantile Law</option>
             <option value="LLM (Dissertation) Private Law">LLM (Dissertation) Private Law</option>
             <option value="LLM (Dissertation) Procedural Law">LLM (Dissertation) Procedural Law</option>
             <option value="LLM (Dissertation) Public Law">LLM (Dissertation) Public Law</option>
             <option value="MPhil Option: Human Rights and Democratisation in Africa">MPhil Option: Human Rights and Democratisation in Africa	</option>
             <option value="MPhil Option: Multidisciplinary Human Rights (Coursework)">MPhil Option: Multidisciplinary Human Rights (Coursework)</option>
             <option value="BInstAgrar(Hons) Agribusiness Management">BInstAgrar(Hons) Agribusiness Management</option>
             <option value="BInstAgrar(Hons) Agricultural Economics">BInstAgrar(Hons) Agricultural Economics</option>
             <option value="BInstAgrar(Hons) Crop Protection">BInstAgrar(Hons) Crop Protection</option>
             <option value="BInstAgrar(Hons) Extension">BInstAgrar(Hons) Extension</option>
             <option value="BInstAgrar(Hons) Plant Production">BInstAgrar(Hons) Plant Production</option>
             <option value="BInstAgrar(Hons) Plant Quarantine">BInstAgrar(Hons) Plant Quarantine</option>
             <option value="BInstAgrar(Hons) Rural Development Planning">BInstAgrar(Hons) Rural Development Planning</option>
             <option value="BSc(Hons) Actuarial Science">BSc(Hons) Actuarial Science</option>
             <option value="BSc(Hons) Animal Science">BSc(Hons) Animal Science	</option>
             <option value="BSc(Hons) Applied Mathematics">BSc(Hons) Applied Mathematics</option>
             <option value="BSc(Hons) Biochemistry">BSc(Hons) Biochemistry</option>
             <option value="BSc(Hons) Bioinformatics">BSc(Hons) Bioinformatics</option>
             <option value="BSc(Hons) Biotechnology">BSc(Hons) Biotechnology</option>
             <option value="BSc(Hons) Chemistry">BSc(Hons) Chemistry</option>
             <option value="BSc(Hons) Entomology">BSc(Hons) Entomology</option>
             <option value="BSc(Hons) Environmental Analysis and Management">BSc(Hons) Environmental Analysis and Management</option>
             <option value="BSc(Hons) Financial Engineering">BSc(Hons) Financial Engineering</option>
             <option value="BSc(Hons) Food Science">BSc(Hons) Food Science</option>
             <option value="BSc(Hons) Genetics">BSc(Hons) Genetics</option>
             <option value="BSc(Hons) Geography">BSc(Hons) Geography</option>
             <option value="BSc(Hons) Geoinformatics">BSc(Hons) Geoinformatics</option>
             <option value="BSc(Hons) Geology">BSc(Hons) Geology</option>
             <option value="BSc(Hons) Mathematical Statistics">BSc(Hons) Mathematical Statistics</option>
             <option value="BSc(Hons) Mathematics">BSc(Hons) Mathematics</option>
             <option value="BSc(Hons) Mathematics of Finance">BSc(Hons) Mathematics of Finance</option>
             <option value="BSc(Hons) Meteorology">BSc(Hons) Meteorology</option>
             <option value="BSc(Hons) Microbiology">BSc(Hons) Microbiology</option>
             <option value="BSc(Hons) Nutrition and Food Science">BSc(Hons) Nutrition and Food Science</option>
             <option value="BSc(Hons) Option: Engineering Geology">BSc(Hons) Option: Engineering Geology</option>
             <option value="BSc(Hons) Option: Hydrogeology">BSc(Hons) Option: Hydrogeology</option>
             <option value="BSc(Hons): (Option) Medicinal Plant Science">BSc(Hons): (Option) Medicinal Plant Science</option>
             <option value="BSc(Hons) Physics">BSc(Hons) Physics</option>
             <option value="BSc(Hons) Plant Science">BSc(Hons) Plant Science</option>
             <option value="BSc(Hons) Soil Science [Option: Environmental Soil Science]">BSc(Hons) Soil Science [Option: Environmental Soil Science]</option>
             <option value="BSc(Hons) Wildlife Management">BSc(Hons) Wildlife Management	</option>
             <option value="BSc(Hons) Zoology">BSc(Hons) Zoology	</option>
             <option value="MConsumer Science Clothing Management">MConsumer Science Clothing Management</option>
             <option value="MConsumer Science Clothing Management (Coursework)">MConsumer Science Clothing Management (Coursework)</option>
             <option value="MConsumer Science Food Management">MConsumer Science Food Management</option>
             <option value="MConsumer Science Food Management (Coursework)">MConsumer Science Food Management (Coursework)</option>
             <option value="MConsumer Science General">MConsumer Science General</option>
             <option value="MConsumer Science General (Coursework)">MConsumer Science General (Coursework)</option>
             <option value="MConsumer Science Interior Merchandise Management">MConsumer Science Interior Merchandise Management</option>
             <option value="MConsumer Science Interior Merchandise Management (Coursework)">MConsumer Science Interior Merchandise Management (Coursework)</option>
             <option value="MInstAgrar Agricultural Economics">MInstAgrar Agricultural Economics</option>
             <option value="MInstAgrar Agronomy">MInstAgrar Agronomy</option>
             <option value="MInstAgrar Animal Production Management">MInstAgrar Animal Production Management</option>
             <option value="MInstAgrar Crop Protection">MInstAgrar Crop Protection</option>
             <option value="MInstAgrar Environmental Management (Coursework)">MInstAgrar Environmental Management (Coursework)</option>
             <option value="MInstAgrar Extension">MInstAgrar Extension</option>
             <option value="MInstAgrar Horticulture">MInstAgrar Horticulture	</option>
             <option value="MInstAgrar Pasture Science">MInstAgrar Pasture Science</option>
             <option value="MInstAgrar Plant Quarantine">MInstAgrar Plant Quarantine</option>
             <option value="MInstAgrar Rural Development Planning">MInstAgrar Rural Development Planning</option>
             <option value="MPhil Wildlife Management">MPhil Wildlife Management</option>
             <option value="MSc Actuarial Science">MSc Actuarial Science</option>
             <option value="MSc(Agric) Agricultural Economics">MSc(Agric) Agricultural Economics</option>
             <option value="MSc(Agric) Agricultural Extension">MSc(Agric) Agricultural Extension</option>
             <option value="MSc(Agric) Agronomy">MSc(Agric) Agronomy</option>
             <option value="MSc(Agric) Animal Breeding and Genetics">MSc(Agric) Animal Breeding and Genetics</option>
             <option value="MSc(Agric) Animal Science: Animal Nutrition">MSc(Agric) Animal Science: Animal Nutrition</option>
             <option value="MSc(Agric) Animal Science: Meat Science">MSc(Agric) Animal Science: Meat Science</option>
             <option value="MSc(Agric) Animal Science: Production ManagementMSc(Agric) Animal Science: Production Management"></option>
             <option value=""></option>
             <option value="MSc(Agric) Animal Science: Production Physiology">MSc(Agric) Animal Science: Production Physiology</option>
             <option value="MSc(Agric) Entomology">MSc(Agric) Entomology</option>
             <option value="MSc(Agric) Food Science and Technology">MSc(Agric) Food Science and Technology</option>
             <option value="MSc(Agric) in Pasture Science">MSc(Agric) in Pasture Science</option>
             <option value="MSc(Agric) Microbiology">MSc(Agric) Microbiology</option>
             <option value="MSc(Agric) Plant Pathology">MSc(Agric) Plant Pathology</option>
             <option value="MSc(Agric) Soil Science">MSc(Agric) Soil Science</option>
             <option value="MSc Applied Mathematics">MSc Applied Mathematics</option>
             <option value="MSc Applied Mineralogy">MSc Applied Mineralogy</option>
             <option value="MSc Applied Statistics">MSc Applied Statistics</option>
             <option value="MSc Biochemistry">MSc Biochemistry</option>
             <option value="MSc Bioinformatics">MSc Bioinformatics</option>
             <option value="MSc Biotechnology">MSc Biotechnology</option>
             <option value="MSc Chemistry">MSc Chemistry</option>
             <option value="MSc Engineering and Environmental Geology">MSc Engineering and Environmental Geology</option>
             <option value="MSc Engineering Geology">MSc Engineering Geology</option>
             <option value="MSc Entomology">MSc Entomology</option>
             <option value="MSc Environmental Ecology (Coursework)">MSc Environmental Ecology (Coursework)</option>
             <option value="MSc Environmental Education (Coursework)">MSc Environmental Education (Coursework)</option>
             <option value="MSc Environment and Society (Coursework)">MSc Environment and Society (Coursework)</option>
             <option value="MSc: Exploration Geophysics">MSc: Exploration Geophysics</option>
             <option value="MSc Financial Engineering">MSc Financial Engineering</option>
             <option value="MSc Food Science">MSc Food Science</option>
             <option value="MSc Genetics">MSc Genetics</option>
             <option value="MSc Geography">MSc Geography</option>
             <option value="MSc Geoinformatics">MSc Geoinformatics</option>
             <option value="MSc Geology">MSc Geology</option>
             <option value="MSc in Postharvest Technology">MSc in Postharvest Technology</option>
             <option value="MSc Mathematical Statistics">MSc Mathematical Statistics</option>
             <option value="MSc Mathematics">MSc Mathematics</option>
             <option value="MSc Mathematics Education">MSc Mathematics Education</option>
             <option value="MSc Mathematics of Finance">MSc Mathematics of Finance</option>
             <option value="MSc Meteorology">MSc Meteorology</option>
             <option value="MSc Microbiology">MSc Microbiology</option>
             <option value="MSc Nutrition">MSc Nutrition;</option>
             <option value="MSc [Option: Air Quality Management] (Coursework)">MSc [Option: Air Quality Management] (Coursework)</option>
             <option value="MSc [Option: Environmental Management] (Coursework)">MSc [Option: Environmental Management] (Coursework)</option>
             <option value="MSc [Option: Forest Management and the Environment (Coursework)">MSc [Option: Forest Management and the Environment (Coursework)</option>
             <option value="MSc [Option: Forest Science]">MSc [Option: Forest Science]</option>
             <option value="MSc [Option: Medicinal Plant Science]">MSc [Option: Medicinal Plant Science]	</option>
             <option value="MSc Physics">MSc Physics</option>
             <option value="MSc Plant Pathology">MSc Plant Pathology</option>
             <option value="MSc Plant Science">MSc Plant Science</option>
             <option value="MSc Science Education">MSc Science Education</option>
             <option value="MSc Soil Science">MSc Soil Science</option>
             <option value="MSc Water Resource Management (Coursework)">MSc Water Resource Management (Coursework)</option>
             <option value="MSc Wildlife Management">MSc Wildlife Management</option>
             <option value="MSc Zoology">MSc Zoology</option>
             <option value="PhD Agrarian Extension">PhD Agrarian Extension</option>
             <option value="PhD Agricultural Economics">PhD Agricultural Economics</option>
             <option value="PhD Agronomy">PhD Agronomy</option>
             <option value="PhD Animal Production Management">PhD Animal Production Management</option>
             <option value="PhD Animal Science">PhD Animal Science</option>
             <option value="PhD Biochemistry">PhD Biochemistry</option>
             <option value="PhD Bioinformatics">PhD Bioinformatics</option>
             <option value="PhD Biotechnology">PhD Biotechnology</option>
             <option value="PhD ChemistryPhD">PhD Chemistry</option>
             <option value="PhD Consumer Science: Clothing Management">PhD Consumer Science: Clothing Management</option>
             <option value="PhD Consumer Science: Development">PhD Consumer Science: Development</option>
             <option value="PhD Consumer Science: Food Management">PhD Consumer Science: Food Management</option>
             <option value="PhD Consumer Science: Interior Merchandise">PhD Consumer Science: Interior Merchandise</option>
             <option value="PhD Crop Protection">PhD Crop Protection</option>
             <option value="PhD Engineering and Environmental Geology">PhD Engineering and Environmental Geology</option>
             <option value="PhD Entomology">PhD Entomology</option>
             <option value="PhD Environmental Ecology">PhD Environmental Ecology</option>
             <option value="PhD Environmental Economics">PhD Environmental Economics</option>
             <option value="PhD Environment and Society">PhD Environment and Society</option>
             <option value="PhD Food Science">PhD Food Science</option>
             <option value="PhD Genetics">PhD Genetics</option>
             <option value="PhD Geography">PhD Geography</option>
             <option value="PhD Geoinformatics">PhD Geoinformatics</option>
             <option value="PhD Geology">PhD Geology	</option>
             <option value="PhD Horticultural Science">PhD Horticultural Science</option>
             <option value="PhD in Extension">PhD in Extension</option>
             <option value="PhD Mathematical Sciences">PhD Mathematical Sciences</option>
             <option value="PhD Mathematical Statistics">PhD Mathematical Statistics</option>
             <option value="PhD Meteorology">PhD Meteorology</option>
             <option value="PhD Microbiology">PhD Microbiology</option>
             <option value="PhD Nutrition">PhD Nutrition</option>
             <option value="PhD [Option:Air Quality Management]">PhD [Option:Air Quality Management]</option>
             <option value="PhD [Option: Environmental Management]">PhD [Option: Environmental Management]</option>
             <option value="PhD [Option:Forest Science]">PhD [Option:Forest Science]</option>
             <option value="PhD [Option: Medicinal Plant Science]">PhD [Option: Medicinal Plant Science]</option>
             <option value="PhD Pasture Science">PhD Pasture Science</option>
             <option value="PhD Physics">PhD Physics</option>
             <option value="PhD Plant Pathology">PhD Plant Pathology</option>
             <option value="PhD Plant Science">PhD Plant Science</option>
             <option value="PhD Rural Development Planning">PhD Rural Development Planning</option>
             <option value="PhD Science and Mathematics Education">PhD Science and Mathematics Education</option>
             <option value="PhD Soil Science">PhD Soil Science</option>
             <option value="PhD Water Resource Management">PhD Water Resource Management</option>
             <option value="PhD Wildlife Management">PhD Wildlife Management</option>
             <option value="PhD Zoology">PhD Zoology</option>
             <option value="BAHons (Theology) Church History and Church Polity">BAHons (Theology) Church History and Church Polity</option>
             <option value="BAHons (Theology) Dogmatics and Christian Ethics">BAHons (Theology) Dogmatics and Christian Ethics</option>
             <option value="BAHons (Theology) New Testament Studies">BAHons (Theology) New Testament Studies</option>
             <option value="BAHons (Theology) Old Testament Studies">BAHons (Theology) Old Testament Studies</option>
             <option value="BAHons (Theology) Practical Theology">BAHons (Theology) Practical Theology</option>
             <option value="BAHons (Theology) Science of Religion and Missiology">BAHons (Theology) Science of Religion and Missiology</option>
             <option value="BAHons (Theology) Theological Studies">BAHons (Theology) Theological Studies</option>
             <option value="DD Church History and Church Polity">DD Church History and Church Polity</option>
             <option value="DD Dogmatics and Christian Ethics">DD Dogmatics and Christian Ethics</option>
             <option value="DD New Testament Studies">DD New Testament Studies</option>
             <option value="DD Old Testament Studies">DD Old Testament Studies</option>
             <option value="DD Practical Theology">DD Practical Theology</option>
             <option value="DD Practical Theology: Pastoral Family Therapy">DD Practical Theology: Pastoral Family Therapy</option>
             <option value="DD Science of Religion and Missiology">DD Science of Religion and Missiology</option>
             <option value="MA(Theology) Church History and Church Polity (Coursework)">MA(Theology) Church History and Church Polity (Coursework)</option>
             <option value="MA(Theology) Church History and Church Polity (Dissertation)">MA(Theology) Church History and Church Polity (Dissertation)</option>
             <option value="MA(Theology) Dogmatics and Christian Ethics (Coursework)">MA(Theology) Dogmatics and Christian Ethics (Coursework)</option>
             <option value="MA(Theology) Dogmatics and Christian Ethics (Dissertation)">MA(Theology) Dogmatics and Christian Ethics (Dissertation)</option>
             <option value="MA(Theology) New Testament Studies (Coursework)">MA(Theology) New Testament Studies (Coursework)</option>
             <option value="MA(Theology) New Testament Studies (Dissertation)">MA(Theology) New Testament Studies (Dissertation)</option>
             <option value="MA(Theology) Old Testament Studies (Coursework)">MA(Theology) Old Testament Studies (Coursework)</option>
             <option value="MA(Theology) Old Testament Studies (Dissertation)">MA(Theology) Old Testament Studies (Dissertation)</option>
             <option value="MA(Theology) Pastoral Family Therapy (Coursework)">MA(Theology) Pastoral Family Therapy (Coursework)</option>
             <option value="MA(Theology) Practical Theology (Coursework)">MA(Theology) Practical Theology (Coursework)</option>
             <option value="MA(Theology) Practical Theology (Dissertation)">MA(Theology) Practical Theology (Dissertation)</option>
             <option value="MA(Theology) Science of Religion and Missiology (Coursework)">MA(Theology) Science of Religion and Missiology (Coursework)</option>
             <option value="MA(Theology) Science of Religion and Missiology (Dissertation)">MA(Theology) Science of Religion and Missiology (Dissertation)</option>
             <option value="MA(Theology) Youth Ministry (Coursework)">MA(Theology) Youth Ministry (Coursework)</option>
             <option value="MDiv (Curriculum aa)">MDiv (Curriculum aa)</option>
             <option value="MDiv (Curriculum bb)">MDiv (Curriculum bb)</option>
             <option value="MPhil Applied Theology">MPhil Applied Theology</option>
             <option value="MTh Church History and Church Polity (aa)">MTh Church History and Church Polity (aa)</option>
             <option value="MTh Church History and Church Polity (bb)">MTh Church History and Church Polity (bb)</option>
             <option value="MTh Dogmatics and Christian Ethics (aa)">MTh Dogmatics and Christian Ethics (aa)</option>
             <option value="MTh Dogmatics and Christian Ethics (bbMTh Dogmatics and Christian Ethics (bb)"></option>
             <option value="MTh New Testament Studies (aa)">MTh New Testament Studies (aa)</option>
             <option value="MTh New Testament Studies (bb)">MTh New Testament Studies (bb)</option>
             <option value="MTh Old Testament studies (aa)">MTh Old Testament studies (aa)</option>
             <option value="MTh Old Testament studies (bb)">MTh Old Testament studies (bb)</option>
             <option value="MTh Practical Theology (aa)">MTh Practical Theology (aa)</option>
             <option value="MTh Practical Theology (bb)">MTh Practical Theology (bb)</option>
             <option value="MTh Science of Religion and Missiology (aa)">MTh Science of Religion and Missiology (aa)</option>
             <option value="MTh Science of Religion and Missiology (bb)">MTh Science of Religion and Missiology (bb)</option>
             <option value="PhD Church History and Church Policy">PhD Church History and Church Policy</option>
             <option value="PhD Dogmatics and Christian Ethics">PhD Dogmatics and Christian Ethics</option>
             <option value="PhD New Testament Studies">PhD New Testament Studies</option>
             <option value="PhD Old Testament Studies">PhD Old Testament Studies</option>
             <option value="PhD Practical Theology">PhD Practical Theology</option>
             <option value="PhD Practical Theology: Pastoral Family Therapy">PhD Practical Theology: Pastoral Family Therapy</option>
             <option value="PhD Practical Theology: Youth Ministry">PhD Practical Theology: Youth Ministry</option>
             <option value="PhD Science of Religion and Missiology">PhD Science of Religion and Missiology</option>
             <option value="BVSc(Hons)">BVSc(Hons)</option>
             <option value="DVSc Anatomy and physiology">DVSc Anatomy and physiology</option>
             <option value="DVSc Paraclinical sciences">DVSc Paraclinical sciences</option>
             <option value="DVSc Production animal studies">DVSc Production animal studies</option>
             <option value="DVSc Veterinary tropical diseases">DVSc Veterinary tropical diseases</option>
             <option value="Master of Science Option: Animal/Human/Ecosystem Health">Master of Science Option: Animal/Human/Ecosystem Health</option>
             <option value="Master of Science Option: Ruminant health">Master of Science Option: Ruminant health</option>
             <option value="Master of Science Option: Veterinary epidemiology">Master of Science Option: Veterinary epidemiology</option>
             <option value="Master of Science Option: Veterinary reproduction">Master of Science Option: Veterinary reproduction</option>
             <option value="MMedVet Anaesthesiology">MMedVet Anaesthesiology</option>
             <option value="MMedVet Cattle Herd Health">MMedVet Cattle Herd Health</option>
             <option value="MMedVet Clinical Laboratory Diagnostics">MMedVet Clinical Laboratory Diagnostics</option>
             <option value="MMedVet Diagnostic Imaging">MMedVet Diagnostic Imaging</option>
             <option value="MMedVet Laboratory Animal Science">MMedVet Laboratory Animal Science</option>
             <option value="MMedVet Medicine (Bovine)">MMedVet Medicine (Bovine)</option>
             <option value="MMedVet Medicine (Equine)">MMedVet Medicine (Equine)</option>
             <option value="MMedVet Medicine (Small Animals)">MMedVet Medicine (Small Animals)</option>
             <option value="MMedVet Ophthalmology">MMedVet Ophthalmology	</option>
             <option value="MMedVet Pathology">MMedVet Pathology</option>
             <option value="MMedVet Pharmacology">MMedVet Pharmacology</option>
             <option value="MMedVet Pig Herd Health">MMedVet Pig Herd Health</option>
             <option value="MMedVet Poultry Diseases">MMedVet Poultry Diseases</option>
             <option value="MMedVet Reproduction">MMedVet Reproduction</option>
             <option value="MMedVet Small Stock Herd Health"></option>
             <option value="MMedVet Surgery (Equine)">MMedVet Surgery (Equine)</option>
             <option value="MMedVet Surgery (Small Animals)">MMedVet Surgery (Small Animals)</option>
             <option value="MMedVet Toxicology">MMedVet Toxicology</option>
             <option value="MMedVet Veterinary Public Health">MMedVet Veterinary Public Health</option>
             <option value="MMedVet Wildlife Diseases">MMedVet Wildlife Diseases</option>
             <option value="MSc (Veterinary Industrial Pharmacology)">MSc (Veterinary Industrial Pharmacology)</option>
             <option value="MSc (Veterinary Science) Anatomy and Physiology">MSc (Veterinary Science) Anatomy and Physiology</option>
             <option value="MSc (Veterinary Science) Companion Animal Clinical Studies">MSc (Veterinary Science) Companion Animal Clinical Studies</option>
             <option value="MSc (Veterinary Science) Paraclinical Sciences">MSc (Veterinary Science) Paraclinical Sciences	</option>
             <option value="MSc (Veterinary Science) Production Animal Studies">MSc (Veterinary Science) Production Animal Studies</option>
             <option value="MSc (Veterinary Science) Veterinary Tropical Diseases">MSc (Veterinary Science) Veterinary Tropical Diseases</option>
             <option value="PhD Anatomy and Physiology">PhD Anatomy and Physiology</option>
             <option value="PhD Companion Animal Clinical Studies">PhD Companion Animal Clinical Studies</option>
             <option value="PhD Paraclinical Sciences">PhD Paraclinical Sciences</option>
             <option value="PhD Production Animal Studies">PhD Production Animal Studies</option>
             <option value="PhD Veterinary Tropical Diseases">PhD Veterinary Tropical Diseases</option>
             <option value="Postgraduate Certificate in the Theory of Accountancy">Postgraduate Certificate in the Theory of Accountancy</option>
             <option value="Postgraduate Diploma in Economic and Management Sciences Option: Entrepreneurship">Postgraduate Diploma in Economic and Management Sciences Option: Entrepreneurship</option>
             <option value="Postgraduate Diploma in Economic and Management Sciences Option: Integrated Reporting">Postgraduate Diploma in Economic and Management Sciences Option: Integrated Reporting</option>
             <option value="Postgraduate Diploma in Investigative and Forensic Accounting">Postgraduate Diploma in Investigative and Forensic Accounting</option>
             <option value="PGCE Postgraduate Certificate in Education: Early Childhood Development and Foundation Phase"></option>
             <option value="PGCE Postgraduate Certificate in Education: Further Education and Training">PGCE Postgraduate Certificate in Education: Further Education and Training</option>
             <option value="PGCE Postgraduate Certificate in Education: Intermediate Phase">PGCE Postgraduate Certificate in Education: Intermediate Phase</option>
             <option value="PGCE Postgraduate Certificate in Education: Senior Phase">PGCE Postgraduate Certificate in Education: Senior Phase</option>
             <option value="PGCHE Postgraduate Certificate in Higher Education">PGCHE Postgraduate Certificate in Higher Education</option>
             <option value="PDBA Postgraduate Diploma in Business Administration (offered by GIBS)">PDBA Postgraduate Diploma in Business Administration (offered by GIBS)</option>
             <option value="Advanced University Diploma in Oral Hygiene (AdvUnivDipHO)">Advanced University Diploma in Oral Hygiene (AdvUnivDipHO)</option>
             <option value="Medicine Special (Postgraduate)">Medicine Special (Postgraduate)</option>
             <option value="Postgraduate Diploma in Dentistry (PGDipDent)">Postgraduate Diploma in Dentistry (PGDipDent)</option>
             <option value="Postgraduate Diploma in Family Medicine">Postgraduate Diploma in Family Medicine</option>
             <option value="Postgraduate Diploma in General Ultrasound (PGDipGUS)">Postgraduate Diploma in General Ultrasound (PGDipGUS)</option>
             <option value="Postgraduate Diploma in Group Activities (DGA)">Postgraduate Diploma in Group Activities (DGA)</option>
             <option value="Postgraduate Diploma in Hand Therapy (DHT)">Postgraduate Diploma in Hand Therapy (DHT)</option>
             <option value="Postgraduate Diploma in Health Systems Management (DHSM)">Postgraduate Diploma in Health Systems Management (DHSM)</option>
             <option value="Postgraduate Diploma in Occupational Health (DipOH)">Postgraduate Diploma in Occupational Health (DipOH)</option>
             <option value="Postgraduate Diploma in Occupational Medicine and Health (DOMH)">Postgraduate Diploma in Occupational Medicine and Health (DOMH)</option>
             <option value="Postgraduate Diploma in Public Health (DPH)">Postgraduate Diploma in Public Health (DPH)</option>
             <option value="Postgraduate Diploma in Public Health Medicine (DipPHM)">Postgraduate Diploma in Public Health Medicine (DipPHM)</option>
             <option value="Postgraduate Diploma in the Handling of Childhood Disability (DHCD)">Postgraduate Diploma in the Handling of Childhood Disability (DHCD)</option>
             <option value="Postgraduate Diploma in Tropical Medicine and Health (DTM&H)">Postgraduate Diploma in Tropical Medicine and Health (DTM&H)</option>
             <option value="Postgraduate Diploma in Vocational Rehabilitation (DVR)">Postgraduate Diploma in Vocational Rehabilitation (DVR)</option>
             <option value="Visiting postgraduate students">Visiting postgraduate students</option>
             <option value="Advanced Diploma in Hearing Aid Acoustics">Advanced Diploma in Hearing Aid Acoustics</option>
             <option value="Certificate in Sport Sciences">Certificate in Sport Sciences</option>
             <option value="Postgraduate Diploma in Heritage and Museum Studies">Postgraduate Diploma in Heritage and Museum Studies</option>
             <option value="Advanced University Diploma in Extension and Rural Development">Advanced University Diploma in Extension and Rural Development</option>
             <option value="University Diploma in Theology">University Diploma in Theology</option>
             <option value="DipVetNurs (Diploma in Veterinary Nursing)">DipVetNurs (Diploma in Veterinary Nursing)</option>
          </select>
      </p>
      
      <TR>
        <TH COLSPAN="3">Submit new Job Advert
            <p>
                <input class="btn btn-primary " type="submit" value="Submit"/>
            </p>
        </TH>
      </TR>         
      <input type="hidden" name="consultant_name" value="<?php echo $user['upro_first_name'] ." ". $user['upro_last_name']; ?>"
            <?php echo form_close(); ?> 
      </TR>
  </TABLE>
    <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js" type="text/javascript"></script>

<script>
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"},
      '.chosen-select-height'    : {height:"20px"}
    };
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    } 
</script>
</html>









    
   
     
    