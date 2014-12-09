<?PHP
	$query = "INSERT INTO paceId (value, timestamp, userId, lectureId) VALUES('".mysql_real_escape_string($_POST['speedValue'])."','".mysql_real_escape_string(time())."','".$_SESSION['userId']."','".$_SESSION['lectureId']."')";
	$result = mysql_query($query);
?>