<?php echo form_open('profile/save_people_skills'); ?>
                                <?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
                                <table>
                                    <tr>
                                        <td width="34%"><label for="c20"><input type="checkbox" name="skill_name[]" id="c20" value=" Patient ">Patient</label></td>
                                        <td width="33%"><label for="c21"><input type="checkbox" name="skill_name[]" id="c21" value=" Care for ">Care for</label></td>
                                        <td width="33%"><label for="c22"><input type="checkbox" name="skill_name[]" id="c22" value=" Persuasive ">Persuasive</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c21"><input type="checkbox" name="skill_name[]" id="c21" value=" Confront others ">Confront others</label></td>
                                        <td width="33%"><label for="c22"><input type="checkbox" name="skill_name[]" id="c22" value=" Pleasant ">Pleasant</label></td>
                                        <td width="34%"><label for="c23"><input type="checkbox" name="skill_name[]" id="c23" value=" Counsel people ">Counsel people</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Sensitive ">Sensitive</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Demonstrate something ">Demonstrate something</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Supportive ">Supportive</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Diplomatic ">Diplomatic</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Supervise ">Supervise</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Speak in public ">Speak in public</label></td>
                                    </tr> 
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Help others ">Help others</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Tactful ">Tactful</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Interview others ">Interview others</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Anticipate needs ">Anticipate needs</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" High energy ">High energy</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Insightful ">Insightful</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Teach ">Teach</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Open minded ">Open minded</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Kind ">Kind</label></td>
                                    </tr> 
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Take orders ">Take orders</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Listen ">Listen</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Serving ">Serving</label></td>
                                    </tr>                  
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Trust ">Trust</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Working with others ">Working with others</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Negotiate ">Negotiate</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c24"><input type="checkbox" name="skill_name[]" id="c24" value=" Understand ">Understand</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Adaptive ">Adaptive</label></td>
                                        <td width="33%"><label for="c25"><input type="checkbox" name="skill_name[]" id="c25" value=" Outgoing ">Outgoing</label></td>
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
