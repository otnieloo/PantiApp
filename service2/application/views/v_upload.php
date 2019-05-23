<html>
<head>
	<title>malasngoding.com</title>
</head>
<body>
	<center><h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1></center>
	<?php echo $error;?>

	<?php echo form_open_multipart('api/panti/Album/index_post');?>

	<input type="text" name="email" value="" placeholder="">
	<input type="file" name="berkas" />

	<br /><br />

	<input type="submit" value="upload" />

</form>

</body>
</html>