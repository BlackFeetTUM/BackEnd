<?PHP

	session_start();
	$_SESSION['userId'] = '';
	
	include 'database.php';

	$loginFailPage = "";
	$loginSuccessPage = "";
	
	$hashedUserName = md5($_POST['username']);
	$hashedPassword = md5($_POST['password']);
	
	$query = "SELECT userId, username FROM user WHERE username = '".mysqli_real_escape_string($hashedUserName)."' AND password = '".mysqli_real_escape_string($hashedUserName)."'";
	$result = mysqli_query($query);
	while($line = mysqli_fetch_array($result))
	{
		$_SESSION['userId'] = $line['userId'];
	}
	
	if($_SESSION['userId'] != "")
	{
		header("Location: ".$loginSuccessPage);
		die();
	}
	else
	{
		header("Location: ".$loginFailPage);
		die();
	}
	
?>