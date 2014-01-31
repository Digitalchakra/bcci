<?php
include('exception.php');
ini_set('set_time_limit', 0);
require('db.php');
include('simple_html_dom.php');
class Tbl_news extends ActiveRecord\Model { }
$log_title = "BCCI NEWS CRON ";
try
	{
			
			$url ='http://www.wisdenindia.com/cricket-news';
			$result=array();
			$html =file_get_html($url);
			
			foreach($html->find('div#loop div.post') as $div)
			{
				$node['media2']= '/assets/Images/news-default.png';
				$node['media1']= '/assets/Images/news-default.png';
				$node['news_id']=$id=ereg_replace("[^0-9]","",$div->getAttribute('id'));
				foreach($div->find('img') as $img)
				{
					$node['media2']= $img->getAttribute('src');
					//$node['media1']= str_replace("-300x180","",$img->getAttribute('src'));
					$node['media1']= str_replace("-405x270","",$img->getAttribute('src'));
				}
				foreach($div->find('div.post-meta') as $postDate)
				{
					foreach($postDate->find('a.url') as $a)
					{
						$a->outertext="";
					}
					$node['pubdate']=trim(str_replace("&middot;","",$postDate->innertext));
				}
				foreach($div->find('h3 a') as $title)
				{
					$node['link']=$title->getAttribute('href');
					$node['title']=mb_convert_encoding(trim($title->innertext), "HTML-ENTITIES", "UTF-8");
				}
				foreach($div->find('p') as $desc)
				{
					$node['description']=mb_convert_encoding(trim($desc->innertext), "HTML-ENTITIES", "UTF-8");
				}
				$result[]=$node;
			}
		//db insertion
		if(count($result)>0)
		{
			//to delete old records(8)
			if(Tbl_news::count() > 32)
			{
				$todelete=Tbl_news::find('all', array('limit' => 8,'order' => 'id asc'));
				foreach($todelete as $row)
				{
					$row->delete();
				}
			}
			foreach($result as $row)
			{
				$find=array('news_id'=>$row['news_id']);
				if($found = Tbl_news::find($find))
					{
						$found->update_attributes($row);
					}
					else
					{
						Tbl_news::create($row);
					}
			}
		}
		else
		{
			notify($log_title,'NEWS URL is empty');
		}
	}
catch (Exception $e)
	{
		error_log($e, 3,dirname(__FILE__).'/error.log');
	}


?>
