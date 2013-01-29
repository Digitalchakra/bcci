<?php
try
	{
		$data = file_get_contents('http://static.cricinfo.com/rss/livescores.xml');	
		file_put_contents(getcwd().'/result.txt', $data);
	}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read live result xml failed @ BCCI";
		error_log($error_msg, 1,"manimani1014@gmail.com");
	}


?>
