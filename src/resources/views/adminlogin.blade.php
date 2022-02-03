<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ARC admin login</title>
</head>
<body>
	<form method="POST">
		@csrf
		<input type="text" placeholder="User name" name="username" >
		<input type="password" placeholder="Password" name="password" >
		<input type="submit" name="sumbit" value="Login!">
	</form>
</body>
</html>