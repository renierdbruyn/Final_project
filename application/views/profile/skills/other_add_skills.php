<?php echo form_open('profile/save_other_skills'); ?>
                                <?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
                                <table>
                                    <tr>
                                        <td width="33%"><label for="c62"><input type="checkbox" name="skill_name[]" id="c62" value=" Use my hands ">Use my hands</label></td>
                                        <td width="33%"><label for="c62"><input type="checkbox" name="skill_name[]" id="c62" value=" Assemble or make things ">Assemble or make things</label></td>
                                        <td width="34%"><label for="c63"><input type="checkbox" name="skill_name[]" id="c63" value=" Safety conscious ">Safety conscious</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c64"><input type="checkbox" name="skill_name[]" id="c64" value=" Build; observe; inspect things ">Build; observe; inspect things</label></td>
                                        <td width="34%"><label for="c65"><input type="checkbox" name="skill_name[]" id="c65" value=" Construct or repairs ">Construct or repairs</label></td>
                                        <td width="33%"><label for="c62"><input type="checkbox" name="skill_name[]" id="c62" value=" Off-bearing or feeding machinery ">Off-bearing or feeding machinery</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c66"><input type="checkbox" name="skill_name[]" id="c66" value=" Follow instructions ">Follow instructions</label></td>
                                        <td width="33%"><label for="c67"><input type="checkbox" name="skill_name[]" id="c67" value=" Operate tools and machinery ">Operate tools and machinery</label></td>
                                        <td width="34%"><label for="c68"><input type="checkbox" name="skill_name[]" id="c68" value=" Drive or operate vehicles ">Drive or operate vehicles</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c69"><input type="checkbox" name="skill_name[]" id="c69" value=" Repair things ">Repair things</label></td>
                                        <td width="33%"><label for="c70"><input type="checkbox" name="skill_name[]" id="c70" value=" Good with my hands ">Good with my hands</label></td>
                                        <td width="34%"><label for="c71"><input type="checkbox" name="skill_name[]" id="c71" value=" Use complex equipment ">Use complex equipment</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c72"><input type="checkbox" name="c72" id="c72" value=" Use equipment ">Use equipment</label></td>
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