<?php
include('exception.php');
$log_title = "BCCI LIVESCORE CRON ";
try
{
$url='http://webclient.cricbuzz.com/includes/deccanherald/livecricketscore/filter-match-details.json?'.time();
if($content=file_get_contents($url))
{
file_put_contents(dirname(__FILE__).'/live.json', $content);
}
else
{
	 notify($log_title,'failed to read the LIVE SCORE URL');
}
}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}
?>
