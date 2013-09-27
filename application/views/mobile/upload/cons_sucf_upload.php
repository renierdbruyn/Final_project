<div class="container">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span2">
                        <!--Sidebar content-->
                        <?php $this->load->view('login/admin/consultant_sidebar'); ?>
                    </div>
                
                    <div class="span8">
                        <!--Body content-->

						
					<div class="container">
    <div class="row-fluid">
        <div class="span5">

<title>Upload Form</title>
</head>
<body>

<h3>Your Advert was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('uploads', 'Upload Another File!'); ?></p>
        </div>
    </div>
                                        </div>
                    </div>
                </div>
            </div>
</div>

</body>
</html>