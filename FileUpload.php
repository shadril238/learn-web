<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>File Upload</title>
</head>
<body>

	<h1>File Upload</h1>

	<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<label for="fullname">Full Name:</label>
		<input type="text" name="fullname">

		<br><br>

		<label for="photo">File:</label>
		<input type="file" name="photo" id="photo">

		<br><br>

		<input type="submit">
		
	</form>

	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$source = $_FILES['photo']['tmp_name'];
			//$filename = md5(date('Y-m-d H:i:s:u')); //generates unique filename (md5-> generates Hash)
			$ext = explode(".", $_FILES['photo']['name']);
			$ext = $ext[count($ext) - 1];
			$destination = 'images/'. 'def' . '.' . $ext;
			move_uploaded_file($source, $destination);
		}
	?>

</body>
</html>