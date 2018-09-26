<?php
session_start();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Den hemliga sidan</title>
</head>
<body>
<?php

if(isset($_POST['submit'])) // if($_POST['submit'] == "Logga in")
{
	include 'db.php';

	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
		$password = $_POST['password'];

		$statement = $dbh->query("SELECT * FROM sh");
		$row = $statement->fetch(PDO::FETCH_ASSOC);

		//echo "<pre>" . print_r($row,1) . "</pre>";

		if($username == $row['username']
			&& password_verify($password, $row['password']))
		{
			echo "<h1>Välkommen in till den hemliga sidan.</h1>";
		}
		else
		{
			echo "<h1>Väldigt fel!</h1>";
		}
	}
	// echo "<pre>" . print_r($_POST,1) . "</pre>";
}
else 
{
	echo "<h1>Vad gör du här?</h1>";
}
?>
</body>
</html>
