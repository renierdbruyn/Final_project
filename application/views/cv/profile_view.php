<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle info" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
            <b>Personal Information</b>
        </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
            <table class="table">
                <tr>
                    <td>ID Number</td>
                    <td><?php echo $view_data["id_number"]; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $view_data["street"].", ".$view_data["suburb"].", ".$view_data["postal_code"]; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $view_data["city"]; ?></td>
                </tr>
                <tr>
                    <td>License</td>
                    <td><?php echo $view_data["license"]; ?></td>
                </tr>
                <tr>
                    <td>Relocate</td>
                    <td><?php if($view_data["relocate"]); ?></td>
                </tr>
                <tr>
                    <td>Minimum Salary</td>
                    <td><?php echo $view_data["minimum_salary"]; ?></td>
                </tr>
                <tr>
                    <td>Preferred Salary</td>
                    <td><?php echo $view_data["preferred_salary"]; ?></td>
                </tr>
                <tr>
                    <td>Contract Type</td>
                    <td><?php echo $view_data["contract"]; ?></td>
                </tr>
                <tr>
                    <td><a class="btn btn-primary pull-left" href="#"><i class="icon-edit"></i> Update</a></td>
                    <td></td>
                </tr>

            </table>
        </div>
    </div>
</div>