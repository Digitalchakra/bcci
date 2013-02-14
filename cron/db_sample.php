<?php
# inclue the ActiveRecord library
 require_once 'php-activerecord/ActiveRecord.php';

 ActiveRecord\Config::initialize(function($cfg)
 {
  $cfg->set_connections(array('development' =>
    'mysql://root:password@localhost/bcci'));
 });
if(!$con=mysql_connect('localhost','root','password'))
{
	$error_msg= "Mysql Connection failed in cron job @ BCCI";
	error_log($error_msg, 1,"manimani1014@gmail.com");
	exit;
}
if(!$db=mysql_select_db('bcci'))
{
	$error_msg= "DB Connection failed in cron job @ BCCI";
	error_log($error_msg, 1,"manimani1014@gmail.com");
	exit;
}
?>
