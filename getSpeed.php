<?PHP
	$query = "SELECT value FROM paceControl WHERE lectureId = '".$_SESSION['lectureId'])."' AND paceId IN (
				SELECT MAX(paceId) FROM paceControl GROUP BY userId
			)";
			
	$result = mysql_query($query);
	
	$sumOfValues = 0;
	$count = 0;
	
	while($line = mysql_fetch_array($result))
	{
		$sumOfValues = $sumOfValues + $line['value'];
		$count++;
	}
	
	if($count != 0)
		$speed = $sumOfValues / $count;
	else
		$speed = 42.0;
		
	$result = json_encode(array('speed' => $speed, 'count' => $count));
?>