<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search User</title>
	<script src="js/search.js"></script>
</head>
<body>

	<h1>Search User</h1>

	<!-- <form action="../controllers/Search.php" method="GET" onsubmit="return search(this);"> -->
	<form action="../controllers/Search.php" method="GET" onsubmit="return search(this);"> 
		<input type="search" name="email">
		<input type="submit" name="submit">
	</form>

	<br><br>

	<p id="i1"></p>

</body>
</html>