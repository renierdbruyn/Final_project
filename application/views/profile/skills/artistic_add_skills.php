<?php echo form_open('profile/save_artistic_skills'); ?>
                                <?php echo form_hidden('id_number', $this->session->userdata('id_number')); ?>
                                <table>
                                    <tr>
                                        <td width="33%"><label for="c83"><input type="checkbox" name="skill_name[]" id="c83" value=" Artistic ">Artistic</label></td>
                                        <td width="33%"><label for="c84"><input type="checkbox" name="skill_name[]" id="c84" value=" Music appreciation ">Music appreciation</label></td>
                                        <td width="34%"><label for="c85"><input type="checkbox" name="skill_name[]" id="c85" value=" Dance; body movement ">Dance; body movement</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c86"><input type="checkbox" name="skill_name[]" id="c86" value=" Perform; act ">Perform; act</label></td>
                                        <td width="33%"><label for="c87"><input type="checkbox" name="skill_name[]" id="c87" value=" Draw; sketch; render ">Draw; sketch; render</label></td>
                                        <td width="34%"><label for="c88"><input type="checkbox" name="skill_name[]" id="c88" value=" Present artistic ideas ">Present artistic ideas</label></td>
                                    </tr>
                                    <tr>
                                        <td width="33%"><label for="c89"><input type="checkbox" name="skill_name[]" id="c89" value=" Play instruments ">Play instruments</label></td>
                                        <td width="33%"><label for="c90"><input type="checkbox" name="skill_name[]" id="c90" value=" Expressive ">Expressive</label></td>
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