<?php
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
include('exception.php');
class Tbl_videos extends ActiveRecord\Model { }
$log_title = "BCCI VIDEO CRON ";
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
			else
			{
				notify($log_title,'failed to read the VIDEO URL');
			}

		if(count($result)>0)
		{
			//Tbl_photo::connection()->query('TRUNCATE TABLE `Tbl_photo`');
			foreach($result as $row)
			{
				$find=array('video_id'=>$row['video_id']);
					if($found = Tbl_videos::find($find))
					{
						$found->update_attributes($row);
					}
					else
					{
						Tbl_videos::create($row);
					}
			}
		}
		else
		{
			notify($log_title,'empty record in VIDEO URL');
		}
	}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}


?>
