lol<?php
$subject = array();
foreach ($matric_type as $row) {
    $matric_type = $row->matric_type;
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css" />
        <script src="<?php echo base_url(); ?>assets/js/school.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.1.min.js"></script>
        <style>
            .dynatable {
                border: 0; 
                border-collapse: collapse;
            }
            .dynatable th,
            .dynatable td {
                border: 0; 
                padding: 2px 10px;
                width: 170px;
                text-align: center;
            }
            .dynatable .prototype {
                display:none;
            }
        </style>
        <script>
            function get_syllabus() {

                var national_senior_certificate = new Array(
                        "Select a subject",
                        "Accounting",
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

                var senior_certificate = new Array(
                        "Select a subject",
                        "Afrikaans",
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

                var independent_education_board = new Array(
                        "Select a subject",
                        "Afrikaans Home Language",
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
    </head>
    <body onload="get_syllabus();">
        <div class="container">
            <div class="row">
                <div class="hero-unit">
                    <center><h1>School Subjects Information</h1></center>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <!--Sidebar content-->


                </div>
                <div class="span10">
                    <!--Body content               action='add_school_subject' method='POST'-->
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
                        <?php
// $this->load->helper('form');
//                    $selected = array(
//                        'English', 'Afrikaans'
//                    );
//
//                    $js = 'id="subjects" ondblclick="add_subject();"';
//                    echo form_dropdown('subjects', $sc, $selected, $js, 'style="color: red;"');
                        ?>

                        <script>
            var count = 0;

            $(document).ready(function() {
                var id = 0;

                // Add button functionality
                $("table.dynatable button.add").click(function() {
                    id++;

                    var master = $(this).parents("table.dynatable");

                    // Get a new row based on the prototype row
                    var prot = master.find(".prototype").clone();
                    prot.attr("class", "")
                    prot.find(".id").attr("value", id);

                    master.find("tbody").append(prot);
                });
                // Remove button functionality
                $(document).on("click", "table.dynatable button.remove", function() {
                    var result = confirm("Want to delete ?");
                    if (result == true) {
                        $(this).parents("tr").remove()
                    }
                    return false;
                    ;
                });
                function retain() {
                    for (var i = 0; i <= count; i++) {
                        var master = $(this).parents("table.dynatable");

                        // Get a new row based on the prototype row
                        var prot = master.find(".prototype").clone();
                        prot.attr("class", "")
                        prot.find(".id").attr("value", count);

                        master.find("tbody").append(prot);
                    }
                }

            });

            function addUp() {
//            var e = document.getElementsByTagName('input');
//

//            var s = 0;
//            for (i = 0; i < e.length; i++) {
//
//                if (e[i].type == "text" && e[i].name == "mark[]") {
//                    s++;
//                }
//            }
//            alert(s);

            }
//alert(subject.length);

            
                        </script>
                        <script>
//                            window.onbeforeunload = function(e) {
//                                e = e || window.event;
//// For IE and Firefox prior to version 4
//                                if (e) {
//                                    e.returnValue = 'Sure?';
//                                }
//
//// For Safari
//                                return 'Sure?';
//                            };


                        </script>


                        <table class="dynatable" id="none">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Subject</th>
                                    <th>Mark</th>
                                    <th><button class="add btn btn-info"  type="button">Add</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="prototype" id="text" >
<!--                                    <td><input type="hidden" name="id[]" value="0" class="id" /></td>-->
                                    <td><select id="list" name="subject[]"></select></td>
                                    <td ><input type="text" name="mark[]" id="mark" value=""/></td>
                                    <td><button class="remove btn btn-danger" type="button">Remove</button>
                                </tr>
                            <script>

                            </script>
                        </table>
                        <?php echo form_hidden("id_number", $this->session->userdata('id_number'), "id='id_number'"); ?>
                        <button class="btn btn-success" name="submit" id="submit" type="submit">Save Subjects</button>

                    </form>
                    <?php // echo site_url(); ?>
                    <script>$('#submit').click(function() {
                var i;
                var mark = document.getElementsByName("mark[]");
                for (i = 1; i < mark.length; i++) {
//    alert(mark[i].value);  GETS THE VALUE
                   var marksArray = mark[i].value;
                }
//alert(mark.value);

                var subject = document.getElementsByName("subject[]");
                for (i = 1; i < subject.length; i++) {
//    alert(subject[i].value); GETS THE VALUE
                    var subjectsArray = subject[i].value;

                }
                var form_data = {
                    subject: subjectsArray,
                    mark: marksArray,                    
                    id_number: $('#id_number').val(),
                    ajax: '1'
                };
                $.ajax({
                    url: "<?php echo site_url('profile/add_school_subject'); ?>",
                    type: "POST",
                    data: form_data,
                    success: function(msg) {
                        alert(msg);
                    }

                });
                return false;

            });</script>
                </div>
            </div>
        </div>
    </body>
</html>