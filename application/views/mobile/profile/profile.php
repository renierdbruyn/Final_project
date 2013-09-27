
        <div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('profile/applicant_sidebar'); ?>
                    </div>

                    <div class="span10">
                        <!--Body content-->

<?php $this->load->view($view_name, $view_data); ?>
                    </div> <!--end container -->
                </div>
            </div>
        </div>