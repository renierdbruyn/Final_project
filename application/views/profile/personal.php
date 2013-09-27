
<?php
foreach ($personal as $row) {
    $address = $row->address;

    $city = $row->city;
    $licence = $row->licence;
    $self_description = $row->self_description;
    $id_number = $row->id_number;
    $gender = $row->gender;
    $relocate = $row->relocate;
    $minimum_salary = $row->minimum_salary;
    $prefered_salary = $row->prefered_salary;
    $contract_type = $row->contract_type;
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
        <title><?php //echo $title;   ?></title>
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
            .span7 {
                width: 240px;
            }

        </style>

        <script src="<?php echo base_url(); ?>assets/js/address.js"></script>
        <script>
            function get()
            {
                var street = document.getElementById("street").value;
                var suburb = document.getElementById("suburb").value;
                var code = document.getElementById("code").value;
                var address = street + ", " + suburb + ", " + code;
                document.getElementById("fullAddress").value = address;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>Personal Information</h1></center>
                </div>
            </div>
        </div>



        <div class="span10">
            <!--Body content-->
            <?php
            // $this->load->helper('form');
            echo form_open('profile/add_personal');
            ?>
            <div class="clearfix" style="color:red;">

                <?php echo form_error('fullAddress'); ?>

            </div>
            <div class="input-prepend">

                <label class="add-on ">Address</label>
                <input class="span7" style="width: 240px; cursor: pointer" id="fullAddress" name="fullAddress" readonly type="text" placeholder="55 milarina, Newlands west, 4037" style="cursor:pointer; width:300px;" value="<?php echo isset($address) ? $address : set_value('fullAddress'); ?>">
            </div>

            <br>
            <div id="addressForm" class="input-prepend">
                <label class="add-on">Street</label>
                <?php
                if (isset($address) && !empty($address)) {
                    $add = explode(",", $address);
                    $street = $add[0];
                    $suburb = $add[1];
                    $postal = $add[2];
                }
                ?>
                <input class="span7" name="street" style="width: 240px;" id="street" type="text" placeholder="55 Milarina dr" value="<?php echo isset($street) ? $street : set_value('street'); ?>">
                <br>
                <label class="add-on">Suburb</label>
                <input class="span7" id="suburb" style="width: 240px;" name="suburb" type="text" placeholder="Newlands west"value="<?php echo isset($suburb) ? $suburb : set_value('suburb'); ?>">
                <br>
                <label class="add-on">Postal code</label>
                <input class="span7" id="code" style="width: 240px;" name="code" type="text" placeholder="4037" value="<?php echo isset($postal) ? $postal : set_value('code'); ?>">
                <br>
                <?php
                $js = 'id="addressButton" onclick="get()"';
                echo form_button('addressButton', 'Save address', $js)
                ?>
            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('city'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">City</label>
                <input class="span7" id="city" style="width: 240px;" name="city" type="text" placeholder="Durban" value="<?php echo isset($city) ? $city : set_value('city'); ?>" >


            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('licence'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">License</label>

                <select name="licence" class="span7" style="width: 240px;" >
                    <?php
                    if (isset($licence) && !empty($licence)) {
                        echo "<option value='$licence'" . set_select('licence', $licence) . " > " . $licence . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('licence', 'null') . ">- Select One -</option>";
                    ?>
                    <option value="null" <?php echo set_select('licence', 'null'); ?> >- Select One -</option>
                    <option value ="none"  <?php echo set_select('licence', 'none'); ?>>Don't have one</option>
                    <option value ="A1"  <?php echo set_select('licence', 'A1'); ?>>A1</option>
                    <option value ="A"   <?php echo set_select('licence', 'A'); ?>>A</option>
                    <option value ="B"   <?php echo set_select('licence', 'B'); ?>>B</option>
                    <option value ="EB"  <?php echo set_select('licence', 'EB'); ?>>EB</option>
                    <option value ="C1"  <?php echo set_select('licence', 'C1'); ?>>C1</option>
                    <option value ="C"   <?php echo set_select('licence', 'C'); ?>>C</option>
                    <option value ="EC1" <?php echo set_select('licence', 'EC1'); ?>>EC1</option>
                    <option value ="EC"  <?php echo set_select('licence', 'EC'); ?>>EC</option>
                </select>

            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('gender'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Gender</label>

                <select name="gender" class="span7" style="width: 240px;">
                    <?php
                    if (isset($gender) && !empty($gender)) {
                        echo "<option value='$gender'" . set_select('gender', $gender) . " > " . $gender . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('gender', 'null') . ">- Select One -</option>";
                    ?>
                    <option value="null" <?php echo set_select('gender', 'null'); ?> >- Select One -</option>
                    <option value ="male" <?php echo set_select('gender', 'male'); ?>>Male</option>
                    <option value ="female"<?php echo set_select('gender', 'female'); ?>>Female</option>
                </select>

            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('minimum_salary'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Minimum salary per month </label>
                <input class="span7" style="width: 240px;" name="minimum_salary" type="text" placeholder="5 000 " value="<?php echo isset($minimum_salary) ? $minimum_salary : set_value('minimum_salary'); ?>">

            </div>
            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('prefered_salary'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Prefered salary per month</label>
                <input class="span7" style="width: 240px;" name="prefered_salary"  type="text" placeholder="15 000 " value="<?php echo isset($prefered_salary) ? $prefered_salary : set_value('prefered_salary'); ?>">
            </div>

            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('relocate'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">relocate</label> 
                <?php
//                    $relocate = array(
//                        'name' => 'relocate',
//                        'value' => 'Yes'
//                    );

                $optrelocate = array(
                    'yes' => 'Yes',
                    'no' => 'No',
                );
                // echo form_dropdown($relocate,$optrelocate, 'no');
                ?>
                <select name="relocate" class="span7" style="width: 240px;" >
                    <?php
                    if (isset($relocate) && !empty($relocate)) {
                        echo "<option value='$relocate'" . set_select('relocate', $relocate) . " > " . $relocate . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('relocate', 'null') . ">- Select One -</option>";
                    ?>

                    <option value="null" <?php echo set_select('relocate', 'null'); ?> >- Select One -</option>
                    <option value ="yes" <?php echo set_select('relocate', 'yes'); ?>>Yes</option>
                    <option value ="no" <?php echo set_select('relocate', 'no'); ?>>No</option>
                </select>
            </div>

            <br>
            <div class="clearfix" style="color:red;">
                <?php echo form_error('contract_type'); ?>
            </div>
            <div class="input-prepend">

                <label class="add-on">Prefered Contract Type</label> 

                <select name="contract_type" class="span7" style="width: 240px;" >
                    <?php
                    if (isset($contract_type) && !empty($contract_type)) {
                        echo "<option value='$contract_type'" . set_select('contract_type', $contract_type) . " > " . $contract_type . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('contract_type', 'null') . ">- Select One -</option>";
                    ?>
                    <option value="null" <?php echo set_select('contract_type', 'null'); ?> >- Select One -</option>
                    <option value ="permanent" <?php echo set_select('contract_type', 'permanent'); ?>>Permanent</option>
                    <option value ="temporary" <?php echo set_select('contract_type', 'temporary'); ?> >Temporary</option>
                    <option value ="contract" <?php echo set_select('contract_type', 'contract'); ?> >Contract</option>
                </select>
            </div>

            <br>
            <?php echo form_hidden("id_number", $this->session->userdata('id_number')); ?>
            <?php echo isset($info) ? $info : NULL; ?>
            <div>
                <button class="btn btn-success"  type="submit">Save Data</button>
                <?php
//echo form_button(array('class'=>'span2 btn btn-success', 'name'=>'personal', 'content'=>'Save Data'));
                echo form_close();
                ?>
            </div>
            <?php //echo validation_errors('<p class ="error">');     ?>
        </div>
    </div>
</div>

</body>
</html>