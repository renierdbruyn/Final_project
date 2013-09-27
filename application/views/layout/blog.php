            <UL class="nav nav-list bs-docs-sidenav">

                <?php
                foreach ($blogs AS $viewData) {
                    $id = $viewData->advert_id;
                    $title = $viewData->job_title;
                    $body = $viewData->job_description;
                    $date = $viewData->start_date;
                    $location = $viewData->company_location;
                    $salary = $viewData->salary_offered;
                    ?>

                    <?php
                    ?>
                    <div class="span 10">
                        <b>job title:</b> <?php echo isset($title) ? $title : NULL; ?>
    <?php //echo isset($body) ? $body : NULL; ?> </br>
    <b>location:</b> <?php echo isset($location) ? $location : NULL; ?>
    </br>
                        <b>close date: </b> <?php echo isset($date) ? $date : NULL; ?>
                        </br>
                        <b>salary:</b> <?php echo isset($salary) ? "R".$salary : NULL; ?>

                        <hr>
                    </div>

    <?php
}
?>
            </UL>