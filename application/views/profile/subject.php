<!DOCTYPE html>
<?php
$mark = array();
$subject = array();


foreach ($matric_type as $row) {
    $matric_type = $row->matric_type;
}
?>
<html>
    <head>
        <style>
            #button{
                float: bottom;
                clear: left;
            }
            #one
            {
                width:200px;
                height:200px;
                clear: right;
                float:left;
            }
            #two
            {
                width:50px;
                height:200px;
                position:relative;
                float:left;

            }
            #three
            {
                width:200px;
                height:200px;
                float: left;

            }
            #list
            {
                width:200px;
                height:200px;
            }
            #my_list
            {
                width:200px;
                height:200px;
            }
            #delete
            {
                margin-left:15px;
                outliner:none;
            }
        </style>
    </head>
    <body onload="get_syllabus();">
        <hr>
        <form name="school_subjects" action="profile/add_school_subject">
            <div id="top">

                <select id="syllabus" name="syllabus" style=" width: 240px" disabled >
                    <?php
                    if (isset($matric_type) && !empty($matric_type)) {
                        echo "<option value='$matric_type'" . set_select('syllabus', $matric_type) . " > " . $matric_type . "</option>";
                    }
                    else
                        "<option value='null'" . set_select('contract_type', 'null') . ">- Select One -</option>";
                    ?>
                    <option value="null" >Please select a syllabus</option>
                    <option value="National Senior Certificate" >National Senior Certificate</option>
                    <option value="Independent Education Board" >Independent Education Board</option>
                    <option value="Senior Certificate" >Senior Certificate</option>
                </select>	
            </div>
            <hr>
            <div id="one">
                <select id="list" multiple >
                </select>
            </div>
           
            <div id="two">
                <button id="delete">
                    <b>-</b>
                </button>
            </div>
          
            <div id="three">
                <select id="my_list" name="my_list[]" multiple>
                </select>
            </div>
            <?php echo form_hidden("id_number", $this->session->userdata('id_number')); ?>
            <div id="buttom">
                <!--<input type="submit" name="Save subjects" value="Save Subjects" />--></br></br></br></br></br></br></br></br></br></br></br>
                <button type="submit" class="btn btn-success">Save Subjects</button>
            </div>
        </form>

        <script type="text/javascript">

        $("#list").dblclick(function()
        {
            var count = my_list.options.length;
            var subject = $("#list").val();
            var marks = prompt("Enter marks for " + subject + " :");
            while(marks > 100 || marks <= -1){
                alert('invalid mark value,\n Please input a valid mark'); 
                 marks = prompt("Enter marks for " + subject + " :");
            }
            //           alert(subject+" "+marks);
            opt = new Option(subject, marks, false, false);
            document.school_subjects.my_list.options[count] = opt;
            var marks_array = new Array();  // clear array onsave 
            var subject_array = new Array(); // clear array onsave
            subject_array[count] = subject;
            marks_array[count] = marks;
            // alert(subject+ ' ' +marks);
//            marks_array[count] = <?php // $mark; ?>
//            subject_array[count] = <?php // $subject; ?>
                
                <?php
//            foreach ($subject as $key => $mark) {
//                foreach ($mark as $k) {
//                    if ($k > 100 || $k < 0) {
//                        echo '<script>marks = prompt("Please enter a valid mark " + subject + " :");</script>';
//                    }
//                }
//            }
//            ?>
                    
                    
            count++;
        });

        function get_syllabus() {

            var national_senior_certificate = new Array("Accounting",
                    "Agricultural Management Practice",
                    "Agricultural Science",
                    "Agricultural Technology",
                    "Business Studies",
                    "Civil Technology",
                    "Computer Applications Technology",
                    "Consumer Studies",
                    "Dance Studies",
                    "Design",
                    "Dramatic Arts",
                    "Economics",
                    "Electrical Technology",
                    "Engineering Graphics and Design",
                    "Geography",
                    "History",
                    "Hospitality",
                    "Information Technology",
                    "Life Sciences",
                    "Mathematics",
                    "Maths Literacy",
                    'Mechanical Technology',
                    "Music",
                    "Physical Science",
                    "Religion Studies",
                    "Tourism",
                    "Visual Arts");

            var senior_certificate = new Array("Afrikaans",
                    "English",
                    "IsiNdebele",
                    "IsiXhosa",
                    "IsiZulu",
                    "Sepedi",
                    "Sesotho",
                    "Setswana",
                    "Siswati",
                    "Tshivenda",
                    "Xitsonga",
                    "Accounting SG",
                    "Applied Agriculture SG",
                    "Biblical Studies HG",
                    "Biology HG",
                    "Biology SG",
                    "Business Economics HG",
                    "Business Economics SG",
                    "Commercial Mathematics SG",
                    "Computer Studies HG",
                    "Computer Studies SG",
                    "Economics HG",
                    "Economics SG",
                    "Functional Mathematics SG",
                    "Geography SG",
                    "History HG",
                    "History SG",
                    "Home Economics HG",
                    "Home Economics SG",
                    "Physical Science HG",
                    "Physical Science SG",
                    "Technical Drawing HG",
                    "Technical Drawing SG");

            var independent_education_board = new Array("Afrikaans Home Language",
                    "Afrikaans First Additional Language",
                    "English Home Language",
                    "English First Additional Language",
                    "IsiXhosa First Additional Language",
                    "IsiZulu Home Language",
                    "IsiZulu First Additional Language",
                    "Sepedi First Additional Language",
                    "Sesotho First Additional Language",
                    "Setswana First Additional Language",
                    "SiSwati Home Language",
                    "SiSwati First Additional Language",
                    "Mathematical Literacy",
                    "Mathematics",
                    "Life Orientation",
                    "Dance",
                    "Design",
                    "Dramatic Arts",
                    "Music",
                    "Visual Culture Studies / Visual Arts",
                    "Accounting",
                    "Business Studies",
                    "Economics",
                    "Arabic Second Additional Language",
                    "French Second Additional Language",
                    "German Home Language",
                    "German Second Additional Language",
                    "Gujarati Home Language",
                    "Gujarati First Additional Language",
                    "Gujarati Second Additional Language",
                    "Hebrew Second Additional Language",
                    "Hindi Second Additional Language",
                    "Italian Second Additional Language",
                    "Latin Second Additional Language",
                    "Modern Greek Second Additional Language",
                    "Portuguese Home Language",
                    "Portuguese First Additional Language",
                    "Portuguese Second Additional Language",
                    "Spanish Second Additional Language",
                    "Tshivenda First Additional Language",
                    "Civil Technology",
                    "Engineering Graphics and Design",
                    "Geography",
                    "History",
                    "Religion Studies",
                    "Computer Applications Technology",
                    "Information Technology",
                    "Life Sciences",
                    "Physical Sciences",
                    "Consumer Studies",
                    "Hospitality Studies",
                    "Tourism",
                    "Equine Studies",
                    "Sports and Exercise Science",
                    "Royal Schools of Music Practical Grade 6",
                    "Royal Schools of Music Practical Grade 7",
                    "Royal Schools of Music Practical Grade 8",
                    "Trinity College of London Practical Grade 6",
                    "Trinity College of London Practical Grade 7",
                    "Trinity College of London Practical Grade 8",
                    "Trinity College of London Performer's Licentiate",
                    "Unisa Practical Music Grade 6",
                    "Unisa Practical Music Grade 7",
                    "Unisa Practical Music Grade 8",
                    "Unisa Performer's Licentiate in Music",
                    "Advanced Programme Mathematics",
                    "Advanced Mathematics");


            var syllabus = document.school_subjects.syllabus.value;

            var names, values;
            if (syllabus === "National Senior Certificate")
            {
                names = national_senior_certificate;
                values = national_senior_certificate;
            }
            else if (syllabus === "Independent Education Board")
            {
                names = independent_education_board;
                values = independent_education_board;
            }
            else if (syllabus === "Senior Certificate")
            {
                names = senior_certificate;
                values = senior_certificate;
            }
            var opt;
            for (var i = 0; i < names.length; i++)
            {
                opt = new Option(names[i], values[i], false, false);
                document.school_subjects.list.options[i] = opt;

            }
        }

        </script>

    </body>
</html>