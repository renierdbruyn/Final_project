<?php echo form_open('profile/save_data_skills'); ?>
                                <?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
                                <table>
                                    <tr>
                                        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Analyze data or facts ">Analyze data or facts</label></td>
                                        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Investigate ">Investigate</label></td>
                                        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Audit records ">Audit records</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Keep financial record ">Keep financial records</label></td>
                                        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Locate answers or information ">Locate answers or information</label></td>
                                        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Balance money ">Balance money</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Calculate; compute ">Calculate; compute</label></td>
                                        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Manage money ">Manage money</label></td>
                                        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Classify data ">Classify data</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Compare; insert; or record facts ">Compare; insert; or record facts</label></td>
                                        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Count; observe; compile ">Count; observe; compile</label></td>
                                        <td width="34%"><label for="c103"><input type="checkbox" name="skill_name[]" id="c103" value=" Research ">Research</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c101"><input type="checkbox" name="skill_name[]" id="c101" value=" Detail-Oriented ">Detail-Oriented</label></td>
                                        <td width="33%"><label for="c102"><input type="checkbox" name="skill_name[]" id="c102" value=" Take inventory ">Take inventory</label></td>
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