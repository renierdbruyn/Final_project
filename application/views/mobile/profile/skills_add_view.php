<div class="container">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2">
                <!--Sidebar content-->
                <?php $this->load->view('profile/applicant_sidebar'); ?>
            </div>

            <div class="span10">
                <!--Body content-->
                
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <h6>TRANSFERABLE SKILLS</h6>
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                                <?php
                                    if($transferable_skills==false)
                                    {
                                        $this->load->view('profile/skills/transferable_add_skills');
                                        ////echo 'no data';
                                    }
                                    else
                                    {
                                        $this->load->view('profile/skills/transferable_skills');
                                        ////echo 'we got data';
                                    }
                                ?>          
                            </div>
                        </div>
                    </div>




                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                <h6>WORKING WITH PEOPLE</h6>
                            </a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <?php
                                    if($people_skills==false)
                                    {
                                        $this->load->view('profile/skills/people_add_skills');
                                        //echo 'no data';
                                    }
                                    else
                                    {
                                        $this->load->view('profile/skills/people_skills');
                                        //echo 'we got data';
                                    }
                                ?>                                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                <h6>LEADERSHIP</h6>
                            </a>
                        </div>
                        <div id="collapseThree" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <?php
                                    if($leadership_skills==false)
                                    {
                                        $this->load->view('profile/skills/people_add_skills');
                                        //echo 'no data';
                                    }
                                    else
                                    {
                                        $this->load->view('profile/skills/people_skills');
                                        //echo 'we got data';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                <h6>OTHER TRANSFERABLE SKILLS</h6>
                            </a>
                        </div>
                        <div id="collapseFour" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <?php
                                    if($other_skills==false)
                                    {
                                        $this->load->view('profile/skills/other_add_skills');
                                        //echo 'no data';
                                    }
                                    else
                                    {
                                        $this->load->view('profile/skills/other_skills');
                                        //echo 'we got data';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                                <h6>ARTISTIC AND CREATIVE</h6>
                            </a>
                        </div>
                        <div id="collapseFive" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <?php
                                    if($artistic_skills==false)
                                    {
                                        $this->load->view('profile/skills/artistic_add_skills');
                                        //echo 'no data';
                                    }
                                    else 
                                    {
                                        $this->load->view('profile/skills/artistic_skills');
                                        //echo 'we got data';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                                <h6>DEALING WITH DATA</h6>
                            </a>
                        </div>
                        <div id="collapseSix" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <?php
                                    if($data_skills==false)
                                    {
                                        $this->load->view('profile/skills/data_add_skills');
                                        //echo 'no data';
                                    }
                                    else
                                    {
                                        $this->load->view('profile/skills/data_skills');
                                        //echo 'we got data';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                                <h6>USING WORDS</h6>
                            </a>
                        </div>
                        <div id="collapseSeven" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <?php
                                    if($word_skills==false)
                                    {
                                        $this->load->view('profile/skills/word_add_skills');
                                        //echo 'no data';
                                    }
                                    else
                                    {
                                        $this->load->view('profile/skills/word_skills');
                                        //echo 'we got data';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!--end container -->
    </div>
</div>
</div>