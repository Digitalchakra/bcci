<?php
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Tbl_videos extends ActiveRecord\Model { }
//Tbl_photo::connection()->query('TRUNCATE TABLE `Tbl_photo`');
//die;
try
	{
		$result=array();
		$node=array();
		$base_url ='http://www.espncricinfo.com';
		$url='http://www.espncricinfo.com/ci/content/video_audio/index.html';
		
			if($html = file_get_html($url))
			{
				//feature news
				foreach($html->find('div.#cricinfoVideo div.rsltVdos') as $main)
					{
							foreach($main->find('p span.vdosTime') as $pdate)
							{
								$node['time']=$pdate->plaintext;
							}
							foreach($main->find('a') as $a)
							{
								$node['link']=$base_url.preg_replace( '/\s+/', '',$a->getAttribute('href'));
								$node['video_id']=end( explode( '/', substr($node['link'], 0, strpos( $node['link'], '.html')) ) );
								foreach($main->find('img') as $img)
								{
									$node['src']=$img->getAttribute('src');
								}
								if($a->getAttribute('class')=='vdosTitleSml')
								{
									$node['title']=$a->plaintext;
								}
							}
							foreach($main->find('p') as $pcaption)
							{
								$content = explode($node['time'],$pcaption->plaintext);
								$node['description']=trim($content[0]);
								$node['pubdate']=trim(str_replace('|','',$content[1]));
							}
							$result[]=$node;
					}
			}
				//echo "<pre>"; print_r($result);
		//db insertion
		if(count($result)>0)
		{
			//Tbl_photo::connection()->query('TRUNCATE TABLE `Tbl_photo`');
			foreach($result as $row)
			{
				Tbl_videos::create($row);	
			}
		}
	}
catch (Exception $e)
	{
		echo $e;
		$error_msg="Cron: Read news result xml failed @ BCCI->".$e;
		error_log($error_msg, 3,dirname(__FILE__).'/error.log');
	}


?>
