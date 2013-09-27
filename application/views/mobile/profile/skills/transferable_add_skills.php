<?php echo form_open('profile/save_transferable_skills'); ?>
                                <?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="33%"><label for="c4"><input type="checkbox" name="skill_name[]" id="c4" value=" Meet deadlines ">Meet deadlines</label></td>
                                        <td width="33%"><label for="c5"><input type="checkbox" name="skill_name[]" id="c5" value=" Ability to delegate ">Ability to delegate</label></td>
                                        <td width="34%"><label for="c6"><input type="checkbox" name="skill_name[]" id="c6" value=" Ability to plan ">Ability to plan</label></td>
                                    </tr>

                                    <tr>
                                        <td width="33%"><label for="c4"><input type="checkbox" name="skill_name[]" id="c4" value=" Results oriented ">Results oriented</label></td>
                                        <td width="33%"><label for="c5"><input type="checkbox" name="skill_name[]" id="c5" value=" Customer service oriented ">Customer service oriented</label></td>
                                        <td width="34%"><label for="c6"><input type="checkbox" name="skill_name[]" id="c6" value=" Supervise others ">Supervise others</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c7"><input type="checkbox" name="skill_name[]" id="c7" value=" Increase sales or efficiency ">Increase sales or efficiency</label></td>
                                        <td width="33%"><label for="c8"><input type="checkbox" name="skill_name[]" id="c8" value=" Accept responsibility ">Accept responsibility</label></td>
                                        <td width="34%"><label for="c9"><input type="checkbox" name="skill_name[]" id="c9" value=" Instruct others ">Instruct others</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c10"><input type="checkbox" name="skill_name[]" id="c10" value=" Desire to learn and improve ">Desire to learn and improve</label></td>
                                        <td width="33%"><label for="c11"><input type="checkbox" name="skill_name[]" id="c11" value=" Good time management ">Good time management</label></td>
                                        <td width="34%"><label for="c12"><input type="checkbox" name="skill_name[]" id="c12" value=" Solve problems ">Solve problems</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c13"><input type="checkbox" name="skill_name[]" id="c13" value=" Manage money/budgets ">Manage money/budgets</label></td>
                                        <td width="33%"><label for="c14"><input type="checkbox" name="skill_name[]" id="c14" value=" Manage people ">Manage people</label></td>
                                        <td width="34%"><label for="c15"><input type="checkbox" name="skill_name[]" id="c15" value=" Meet the public ">Meet the public</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c16"><input type="checkbox" name="skill_name[]" id="c16" value=" Organize people ">Organize people</label></td>
                                        <td width="33%"><label for="c17"><input type="checkbox" name="skill_name[]" id="c17" value=" Organize/manage projects ">Organize/manage projects</label></td>
                                        <td width="34%"><label for="c18"><input type="checkbox" name="skill_name[]" id="c18" value=" Team player ">Team player</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c4"><input type="checkbox" name="skill_name[]" id="c4" value=" Written communications ">Written communications</label></td>
                                        <td width="33%"><label for="c5"><input type="checkbox" name="skill_name[]" id="c5" value=" Work independently ">Work independently</label></td>
                                        <td width="34%"><label for="c6"><input type="checkbox" name="skill_name[]" id="c6" value=" Computer skills ">Computer skills</label></td>
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