
<select name="subject[]">
	<?php
		foreach($view_data as $subjects )
		{
			?>
			<option value="<?php echo $subjects->nsc_subject_name; ?>"><?php echo $subjects->nsc_subject_name; ?></option>
			<?php
		}		
	?>
</select>

