<?php
foreach ($skill as $row) {
    $skill_name = $row->skill_name;
    $skill_level = $row->skill_level;
    $experience = $row->experience;
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.css" />
        <style>
            span
            {
                font-size: 20px;
                height: 60px;
                font-weight: normal;
                padding-bottom: 10px;
                margin-bottom: 10px;
            }
            .input-prepend .add-on{
                width: 300px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>Skills Information</h1></center>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->

                </div>
                <div class="span10">
                    <!--Body content-->
                    <?php
                    //$this->load->helper('form');
                    echo form_open('profile/add_skill');
                    ?>
                    <div class="clearfix" style="color:red;">

                        <?php echo form_error('skillname'); ?>

                    </div>
                    <div class="input-prepend">
                        <span class="add-on">Skill name</span>
                        <?php
//                        $skillname= array(
//                            'null'=>'Select skills',
//                            'using_a_computer'=>'Using a computer',
//                            'Microsoft_office_suite'=>'Microsoft office suite',
//                            'Using_email'=>'Using email',
//                            'Using_internet'=>'Using internet',
//                            'Installing_software'=>'Installing software',
//                            'Understand_computer_directory'=>'Understand computer directory',
//                            'Configure_a_program'=>'Configure a program',
//                            'Programming'=>'Programming',
//                            'Understand_data_security'=>'Understand data security',
//                            'Fixing_software'=>'Fixing software',
//                            'Repairing_computer_hardware'=>'Repairing computer hardware'
//                        );
//                        
//                        $skillnameProp=
//                            "class='span7'";
//                        
//                        echo form_dropdown( 'skill_name', $skillname,$this->input->post('skill_name'),$skillnameProp);
                        ?>
                        <select name="skill_name" class="span7" style="width: 240px;" >
                            <?php
                            if (isset($skill_name) && !empty($skill_name)) {
                                echo "<option value='$skill_name'" . set_select('skill_name', $skill_name) . " > " . $skill_name . "</option>";
                            }
                            else
                                "<option value='null'" . set_select('skill_name', 'null') . ">- Select One -</option>";
                            ?>
                            <option value="null" <?php echo set_select('skill_name', 'null'); ?> >- Select One -</option>
                            <option value ="using_a_computer"  <?php echo set_select('skill_name', 'using_a_computer'); ?>>Using a computer</option>
                            <option value ="Microsoft_office_suite"   <?php echo set_select('skill_name', 'Microsoft_office_suite'); ?>>Microsoft office suite</option>
                            <option value ="Using_email"   <?php echo set_select('skill_name', 'Using_email'); ?>>Using email</option>
                            <option value ="Using_internet"  <?php echo set_select('skill_name', 'Using_internet'); ?>>Using internet</option>
                            <option value ="Installing_software"  <?php echo set_select('skill_name', 'Installing_software'); ?>>Installing software</option>
                            <option value ="Understand_computer_directory"   <?php echo set_select('skill_name', 'Understand_computer_directory'); ?>>Understand computer directory</option>
                            <option value ="Configure_a_program" <?php echo set_select('skill_name', 'Configure_a_program'); ?>>Configure a program</option>
                            <option value ="Programming"  <?php echo set_select('skill_name', 'Programming'); ?>>Programming</option>
                            <option value ="Understand_data_security"  <?php echo set_select('skill_name', 'Understand_data_security'); ?>>Understand data security</option>
                            <option value ="Fixing_software"  <?php echo set_select('skill_name', 'Fixing_software'); ?>>Fixing software</option>
                            <option value ="Repairing_computer_hardware"  <?php echo set_select('skill_name', 'Repairing_computer_hardware'); ?>>Repairing computer hardware</option>
                        </select>

                    </div>
                    <br>
                    <div class="clearfix" style="color:red;">

                        <?php echo form_error('skill_level'); ?>

                    </div>
                    <div class="input-prepend">
                        <span class="add-on">Skill level</span>
                        <?php
//                        $skilllevel = array(
//                            'null' => 'Skills level',
//                            'Bigginer' => 'Bigginer',
//                            'Advanced' => 'Advanced',
//                            'Expert' => 'Expert'
//                        );
//
//                        $skilllevelProp =
//                                "'class'='span7'";

                       // echo form_dropdown('skill_level', $skilllevel, $this->input->post('skill_level'), $skilllevelProp);
                        ?>
                        <select name="skill_level" class="span7" style="width: 240px;" >
                    <?php
                    if (isset($skill_level) && !empty($skill_level)) {
                        echo "<option value='$skill_level'" . set_select('skill_level', $skill_level) . " > " . $skill_level . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('skill_level', 'null') . ">- Select One -</option>";
                    ?>
                    <option value="null" <?php echo set_select('skill_level', 'null'); ?> >- Select One -</option>
                    <option value ="Bigginer" <?php echo set_select('skill_level', 'Bigginer'); ?>>Bigginer</option>
                    <option value ="Advanced" <?php echo set_select('skill_level', 'Advanced'); ?> >Advanced</option>
                    <option value ="Expert" <?php echo set_select('skill_level', 'Expert'); ?> >Expert</option>
                </select>
                    </div>
                    <br>
                    <div class="clearfix" style="color:red;">

                        <?php echo form_error('experience'); ?>

                    </div>
                    <div class="input-prepend">
                        <span class="add-on">Experience</span>
                        <?php
//                        $experience = array(
//                            'null' => 'Experience in years',
//                            '1' => '1',
//                            '2' => '2',
//                            '3' => '3',
//                            '4' => '4',
//                            '5' => '5',
//                            '6' => '6',
//                            '7' => '7',
//                            '8' => '8',
//                            '9' => '9',
//                            'more' => 'More'
//                        );
//
//                        $experienceProp = "'class'='span7'";

                       // echo form_dropdown('experience', $experience, $this->input->post('experience'), $experienceProp);
                        ?>
                        <select name="experience" class="span7" style="width: 240px;" >
                    <?php
                    if (isset($experience) && !empty($experience)) {
                        echo "<option value='$experience'" . set_select('experience', $experience) . " > " . $experience . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('experience', 'null') . ">- Select One -</option>";
                    ?>
                    <option value="null" <?php echo set_select('experience', 'null'); ?> >- Select One -</option>
                    <option value ="1" <?php echo set_select('experience', '1'); ?>>1</option>
                    <option value ="2" <?php echo set_select('experience', '2'); ?> >2</option>
                    <option value ="3" <?php echo set_select('experience', '3'); ?> >3</option>
                    <option value ="4" <?php echo set_select('experience', '4'); ?> >4</option>
                    <option value ="5" <?php echo set_select('experience', '5'); ?> >5</option>
                    <option value ="6" <?php echo set_select('experience', '6'); ?> >6</option>
                    <option value ="7" <?php echo set_select('experience', '7'); ?> >7</option>
                    <option value ="8" <?php echo set_select('experience', '8'); ?> >8</option>
                    <option value ="9" <?php echo set_select('experience', '9'); ?> >9</option>
                    <option value ="more" <?php echo set_select('experience', 'more'); ?> >More</option>
                </select>
                    </div>
                    <br>
                    <?php echo form_hidden("id_number",$this->session->userdata('id_number')); ?>
                    <?php echo isset($info) ? $info : NULL; ?>
                    <div>
                        <input class="btn btn-success" id="prependedInput" type="submit" value="Save Data">
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>