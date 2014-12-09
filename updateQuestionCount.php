<?PHP
	$query = "UPDATE questionAlet SET active='0'
				WHERE questionId IN (
					SELECT questionId FROM questionAlet LIMIT 1
         
				)";
	$result = mysql_query($query);
?>