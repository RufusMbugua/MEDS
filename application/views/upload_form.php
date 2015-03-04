<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('upload/update');?>

<input type="file" name="user_file" size="20" />

<br /><br />

<input type="submit" value="upload_button" name="upload_button" />

</form>

</body>
</html>