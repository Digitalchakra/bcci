<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Tbl_photos extends ActiveRecord\Model { }
$log_title = "BCCI NEWS CRON ";
try
	{
		$result=array();
		$node=array();
		$base_url ='http://www.espncricinfo.com';
		$url='http://www.espncricinfo.com/ci/content/current/image/index.html';
		
			if($html = file_get_html($url))
			{
				//feature news
				foreach($html->find('div.#ciHomeContentlhs div.pnl650M div.ciPhotoContainer tr td.ciPicHldr') as $main)
					{
							foreach($main->find('p.ciPhotoGalleryDate') as $pdate)
							{
								$node['pubdate']=$pdate->plaintext;
							}
							foreach($main->find('a') as $a)
							{
								$node['link']=$base_url.$a->getAttribute('href');
								$node['img_id']=str_replace('.html','',end( explode( '/', $node['link'] ) ));
								foreach($main->find('img') as $img)
								{
									$node['icon']=$base_url.$img->getAttribute('src');
									$node['src']=str_replace('icon.','',$node['icon']);
								}
							}
							foreach($main->find('p.ciPhotoGalleryCaption') as $pcaption)
							{
								$node['description']=$pcaption->plaintext;
							}
							$result[]=$node;
					}
			}
			else
			{
				notify($log_title,'failed to read the PHOTO URL');
			}

			
		//db insertion
		if(count($result)>0)
		{
			
			//Tbl_photo::connection()->query('TRUNCATE TABLE `Tbl_photo`');
			foreach($result as $row)
			{
				$find=array('img_id'=>$row['img_id']);
					if($found = Tbl_photos::find($find))
					{
						$found->update_attributes($row);
					}
					else
					{
						Tbl_photos::create($row);
					}
			}
		}
	}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}


?>
