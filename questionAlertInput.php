<?PHP
	$query = "INSERT INTO questionAlet (active, timestamp, userId, lectureId) VALUES('1','".time()."','".$_SESSION['userId']."','".$_SESSION['lectureId']."')";
	$result = mysql_query($query);
?>