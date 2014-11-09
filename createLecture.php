<?PHP

	session_start();
	$_SESSION['lectureId'] = '';
	
	include 'database.php';
	
	$lectureSuccessPage = "";
	$lectureFailPage = "";
	
	$passwordFound = false;
	
	$length = 10;
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$antiInfiLoop = 0;
	
	while(!$passwordFound && $antiInfiLoop < 10000)
	{
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		
		$query = "SELECT password FROM lectures WHERE password = '".mysqli_real_escape_string($randomString)."'";
		$result = mysqli_query($query);
		
		if(mysqli_num_fields($result) < 0)
			$passwordFound = true;
		
		$antiInfiLoop++;
	}
	
	if($antiInfiLoop >= 10000)
	{
		header($lectureFailPage);
		die();
	}
	
	$query = "INSERT INTO lectures (name, startDate, active, password) VALUES('".mysqli_real_escape_string($_POST['name'])."','".mysqli_real_escape_string(date("Y-m-d H:i:s"))"','1','".mysqli_real_escape_string($randomString)."')";
	mysql_query($query);
	
	header($lectureSuccessPage);
?>