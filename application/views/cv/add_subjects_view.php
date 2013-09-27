<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#nsc">National Senior Certificate</a></li>
  <li><a href="#sc">Senior Certificate</a></li>
  <li><a href="#ieb">Independent Examination Board</a></li>
</ul>
 <a id="element" href="#" data-toggle="tooltip" title="first tooltip">hover over me</a>
<div class="tab-content">
  <div class="tab-pane active" id="nsc">
  	<?php
		
		$attributes = array('class' => 'horizontal-form');
		echo form_open('profile/add_nsc_subject', $attributes);
		
		echo form_fieldset('NATIONAL SENIOR CERTIFICATE');
		
		echo form_label('Subject Name: ');
		echo form_input('subject', '');
	
		echo form_label('Available Subjects');
		
		?>
	
	<select name="available" multiple="multiple" style="height:200px;">
	  <?php 
	  
	  	foreach($view_data as $subjects )
			{
				
				?>
				<option value="<?php echo $subjects->nsc_subject_name; ?>"><?php echo $subjects->nsc_subject_name; ?></option>
				<?php //	var_dump($subjects); ?>
				<?php
				
			}	
	  		
      ?>
	</select>
	
	<?php
		echo form_label();
		echo form_submit('save','Save', 'class="btn btn-success btn-large"');
		
		echo form_fieldset_close();
		
		echo form_close();
	?>
  </div>
  <div class="tab-pane" id="sc">
  	<?php
		
		$attributes = array('class' => 'horizontal-form');
		echo form_open('profile/add_sc_subject', $attributes);
		
		echo form_fieldset('SENIOR CERTIFICATE');
		
		echo form_label('Subject Name: ');
		echo form_input('subject', '');
		
		echo form_label('Available Subjects');
		?>
	
	<select name="available" multiple="multiple" style="height:200px;">
	  <?php 
	  
	  	foreach($view_data as $subjects )
			{
				
				?>
				<option value="<?php echo $subjects->sc_subject_name; ?>"><?php echo $subjects->nsc_subject_name; ?></option>
				<?php //	var_dump($subjects); ?>
				<?php
				
			}	
	  		
      ?>
	</select>
	
	<?php
		echo form_label();
		echo form_submit('save','Save', 'class="btn btn-success btn-large"');
		
		echo form_fieldset_close();
		
		echo form_close();
	?>
  </div>
  <div class="tab-pane" id="ieb">
  	<?php
		
		$attributes = array('class' => 'horizontal-form');
		echo form_open('profile/add_ieb_subject', $attributes);
		
		echo form_fieldset('INDEPENDENT EXAMINATION BOARD');
		
		echo form_label('Subject Name: ');
		echo form_input('subject', '');
		
		echo form_label('Available Subjects');
		
		?>
	
	<select name="available" multiple="multiple" style="height:200px;">
	  <?php 
	  
	  	foreach($view_data as $subjects )
			{
				
				?>
				<option value="<?php echo $subjects->ieb_subject_name; ?>"><?php echo $subjects->nsc_subject_name; ?></option>
				<?php //	var_dump($subjects); ?>
				<?php
				
			}	
	  		
      ?>
	</select>
	
	<?php
		
		echo form_label();
		echo form_submit('save','Save', 'class="btn btn-success btn-large"');
		
		echo form_fieldset_close();
		
		echo form_close();
	?>
  </div>
</div>
 
<script>
  $('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});
$('#element').tooltip('toggle')
</script>