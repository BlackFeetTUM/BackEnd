<?PHP
	$query = "SELECT value FROM paceControl WHERE lectureId = '".$_SESSION['lectureId'])."' AND paceId IN (
				SELECT MAX(paceId) FROM paceControl GROUP BY userId
			)";
			
	$result = mysql_query($query);
	
	$i = 0;
	
	while($line = mysql_fetch_array($result))
	{
		$values[i] = $line['value'];
	}
		
	$result = json_encode($values);
?>