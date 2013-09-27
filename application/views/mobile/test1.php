<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">


        <style>
            * {
                margin:0px;
                padding:5px;
            }
            body {
                color: black !important;
            }
            table {
                width:100%;
            }
            #header table {
                width:100%;
                padding: 0px;
            }
            #header table td, .amount-summary td {
                vertical-align: text-top;
                padding: 5px;
            }
            #company-name{
                color:red;
                font-size: 18px;
            }
            #invoice-to td {
                text-align: left
            }
            #invoice-to {
                margin-bottom: 15px;
            }
            #invoice-to-right-table td {
                padding-right: 5px;
                padding-left: 5px;
                text-align: right;
            }
            .seperator {
                height: 25px
            }
            .top-border {
                border-top: none;
            }
            .no-bottom-border {
                border:none !important;
                background-color: black !important;
            }
        </style>
<img src="<?php echo base_url(); ?>assets/img/ycr.jpg" class="img-rounded" height="75px" width="150px"/>
<h4> latest ranked candidates</h4>
<?php foreach($report AS $viewData)
 {
$id = $viewData->id;
$title = $viewData->applicant_id;
$rank = $viewData->rank;
$job = $viewData->job_id;

?>

            <table class="table table-striped" style="width: 100%;">
                <tr>
                    <td style="padding-left: 10px;">
        job id:<?php echo isset ($id) ? $id : NULL;?></br>
        <?php echo isset($title) ? $title : NULL;?><br>
    points:<?php echo isset ($rank) ? $rank : NULL;?><br>
        job id:<?php echo isset ($job) ? $job : NULL;?>

                       
                    </td>

</table>   

		
	
    <?php
 }
?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reports.css" type="text/css">
	
                
                
                