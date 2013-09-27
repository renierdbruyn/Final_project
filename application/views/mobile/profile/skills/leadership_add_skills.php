<?php echo form_open('profile/save_leadership_skills'); ?>
                                <?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
                                <table>
                                    <tr>
                                        <td width="33%"><label for="c26"><input type="checkbox" name="skill_name[]" id="c26" value=" Arrange social functions ">Arrange social functions</label></td>
                                        <td width="33%"><label for="c27"><input type="checkbox" name="skill_name[]" id="c27" value=" Motivate people ">Motivate people</label></td>
                                        <td width="34%"><label for="c28"><input type="checkbox" name="skill_name[]" id="c28" value=" Negotiate agreements ">Negotiate agreements</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c29"><input type="checkbox" name="skill_name[]" id="c29" value=" Decisive ">Decisive</label></td>
                                        <td width="33%"><label for="c30"><input type="checkbox" name="skill_name[]" id="c30" value=" Plan ">Plan</label></td>
                                        <td width="34%"><label for="c31"><input type="checkbox" name="skill_name[]" id="c31" value=" Delegate ">Delegate</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c32"><input type="checkbox" name="skill_name[]" id="c32" value=" Run meetings ">Run meetings</label></td>
                                        <td width="33%"><label for="c33"><input type="checkbox" name="skill_name[]" id="c33" value=" Direct others ">Direct others</label></td>
                                        <td width="34%"><label for="c34"><input type="checkbox" name="skill_name[]" id="c34" value=" Explain things to others ">Explain things to others</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c35"><input type="checkbox" name="skill_name[]" id="c35" value=" Self-motivated ">Self-motivated</label></td>
                                        <td width="33%"><label for="c36"><input type="checkbox" name="skill_name[]" id="c36" value=" Get results ">Get results</label></td>
                                        <td width="34%"><label for="c37"><input type="checkbox" name="skill_name[]" id="c37" value=" Share leadership ">Share leadership</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c38"><input type="checkbox" name="skill_name[]" id="c38" value=" Think of others ">Think of others</label></td>
                                        <td width="33%"><label for="c39"><input type="checkbox" name="skill_name[]" id="c39" value=" Direct projects ">Direct projects</label></td>
                                        <td width="34%"><label for="c40"><input type="checkbox" name="skill_name[]" id="c40" value=" Team builder ">Team builder</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c41"><input type="checkbox" name="skill_name[]" id="c41" value=" Solve problems ">Solve problems</label></td>
                                        <td width="33%"><label for="c42"><input type="checkbox" name="skill_name[]" id="c42" value=" Mediate problems ">Mediate problems</label></td>
                                        <td width="34%"><label for="c43"><input type="checkbox" name="skill_name[]" id="c43" value=" Take risks ">Take risks</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c44"><input type="checkbox" name="skill_name[]" id="c44" value=" Empowering others ">Empowering others</label></td>
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