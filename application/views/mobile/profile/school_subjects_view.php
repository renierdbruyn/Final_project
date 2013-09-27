<form action="" name="school" method="post">
<select id="syllabus" name="syllabus" onchange="fillList();">
    <option>Select Syllabus</option>
    <option value="NSC" >National Senior Certificate</option>
    <option value="SC" >Senior Certificate</option>
    <option value="IEB" >Independent Education Board</option>
</select>

<div>
	<p>
		<select  name="subject">
			<option></option>
		</select>
		<input type="text" name="marks" id="var'+displayCount+'"/>
		<span class="btn btn-danger removeVar"><i class="icon-minus"></i> </span>
	</p>
	<p>
		<select name="subject">
			<option></option>
		</select>
		<input type="text" name="marks" id="var'+displayCount+'"/>
		<span class="btn btn-danger removeVar"><i class="icon-minus"></i> </span>
	</p>
	<p>
		<select name="subject3">
			<option></option>
		</select>
		<input type="text" name="marks" id="var'+displayCount+'"/>
		<span class="btn btn-danger removeVar"><i class="icon-minus"></i> </span>
	</p>
</div>
<p> 
<span class="btn btn-success" id="addVar" onclick='fillList();'> <i class="icon-plus"></i> </span>
</p>
<p>
<input class="btn btn-primary btn-large" type="submit" value="Save">
</p>
 
</form>
<script>
var varCount=3;
//create three initial fields
var displayCount
var startingNo = 3;
var $node = "";
for(varCount=3;varCount<=startingNo;varCount++){
    var displayCount = varCount+1;
    $node += '<p><select name="subject[]"></select><input type="text" name="marks"/><span class="btn btn-danger removeVar"><i class="icon-minus"></i> </span></p>';
}
//add them to the DOM
//$('div').prepend($node);
//$('div').parent().after("#syllabus");
//remove a textfield    
$('div').on('click', '.removeVar', function(){
   $(this).parent().remove();
  
});
//add a new node
$('#addVar').on('click', function(){
varCount++;
$node = '<p><select name="subject'+displayCount+'"></select><input type="text" name="marks"/><span class="btn btn-danger removeVar"><i class="icon-minus"></i> </span></p>';
$(this).parent().before($node);
});


 $("#identifier").modal();    


</script>
<script>
	
    

    function fillList()
    {
     	alert("whats up");
        var syllabus = $("#syllabus").val();

        var nsc = new Array("Accounting",
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
                "Mechanical Technology",
                "Music",
                "Physical Science",
                "Religion Studies",
                "Tourism",
                "Visual Arts"
                );

        var sc = new Array("Afrikaans",
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

        var ieb = new Array("Afrikaans Home Language",
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
        var nothing = new Array("Please Select A Syllabus");
        var values, text;
        if (syllabus == "NSC")
        {
            values = nsc;
            text = nsc;
        }
        else if (syllabus == "SC")
        {
            values = sc;
            text = sc;
        }
        else if (syllabus == "IEB")
        {
            values = ieb;
            text = ieb;
        }
        else
        {
            document.school.subject.length = 0;
           // document.school.subject2.length = 0;
           // document.school.subject3.length = 0;
            values = nothing;
            text = nothing;
        }
        var opt;
	for(var c = 1; c<=displayCount; c++)
	{
	 
        for (var i = 0; i < values.length; i++)
        {
            opt = new Option(values[i], text[i], false, false);
            document.school.subject.options[i] = opt;
          //  document.school.subject1.options[i] = opt;
        }
    }
        

    }
</script>
<div class="container">
<h2>Example of creating Modals with Twitter Bootstrap</h2>
<div  class="modal hide fade" id="example" aria-hidden="true">
            <div class="modal-header">
              <a class="close" data-dismiss="modal">×</a>
              <h3>This is a Modal Heading</h3>
            </div>
            <div class="modal-body">
              <h4>Text in a modal</h4>
              <p>You can add some text here.</p>		        
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn-success">Call to action</a>
              <a href="#" class="btn" data-dismiss="modal">Close</a>
            </div>
          </div>
<p><a data-toggle="modal" href="#example" class="btn btn-primary btn-large">Launch demo modal</a></p>
</div>