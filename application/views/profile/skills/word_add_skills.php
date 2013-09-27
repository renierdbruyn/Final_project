<?php echo form_open('profile/save_word_skills'); ?>
<?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
<table>
    <tr>
        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Articulate ">Articulate</label></td>
        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Innovative ">Innovative</label></td>
        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Communicate verbally ">Communicate verbally</label></td>
    </tr>
    <tr>
        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Logical ">Logical</label></td>
        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Remember information ">Remember information</label></td>
        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Accurate ">Accurate</label></td>
    </tr>
    <tr>
        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Research ">Research</label></td>
        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Create new ideas ">Create new ideas</label></td>
        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Design ">Design</label></td>
    </tr>
    <tr>
        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Speak in public ">Speak in public</label></td>
        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Edit ">Edit</label></td>
        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Write clearly ">Write clearly</label></td>
    </tr>
    <tr>
        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Prefer details ">Prefer details</label></td>
        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value="Understand the big picture">Understand the big picture</label></td>
    </tr>
    <tr>
        <td>
            <?php
            echo form_submit('save', 'Save', 'class="btn btn-success btn-large"');
            ?>
        </td>
        <td></td>
        <td></td>
    </tr>
</table>
<?php echo form_close(); ?>