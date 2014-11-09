<?PHP

	include 'database.php';
	
	$nameTakenPage = "";
	$mailTakenPage = "";
	$successPage = "";

	$hashedUserName = md5($_POST['username']);
	$hashedPassword = md5($_POST['password']);
	
	$query = "SELECT username FROM user WHERE username = '".mysqli_real_escape_string($hashedUserName)."'";
	$result = mysqli_query($query);
	
	if(mysqli_num_fields($result) < 0)
	{
		header("Location: ".$nameTakenPage);
		die();
		// report error, because the username is already taken
	}
		
		
	$query = "SELECT email FROM user WHERE email = '".mysqli_real_escape_string($_POST['email'])."'";
	$result = mysqli_query($query);
	
	if(mysqli_num_fields($result) < 0)
	{
		header("Location: ".$mailTakenPage);
		die();
		// report error, because the email is already taken
	}

	$query = "INSERT INTO user (prename, surname, email, username, password) VALUES('".mysqli_real_escape_string($_POST['prename'])."','".mysqli_real_escape_string($_POST['surname'])."','".mysqli_real_escape_string($_POST['email'])."','".mysqli_real_escape_string($hashedUserName)."','".mysqli_real_escape_string($hashedPassword)."')";
	mysql_query($query);
	
	header("Location: ".$successPage);
?>