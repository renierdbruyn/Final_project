<html>
<head>

</head>
<body>
<? echo heading($forminput,3) ?>
<? echo form_open('site/input'); ?>
<? echo form_input('id',$fid['value']); ?>
<? echo $name		.' : '.
        form_input('name',$fname['value']).br(); ?>
<? echo $number		.' : '.
        form_input('number',$fnumber['value']).br(); ?>
<? echo form_submit('submit','Submit!');  ?>
<? echo form_close(); ?>


</body>
</html>
