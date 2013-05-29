
	<? if($content)
	{
		$html = 'this <br>is<br/>some<br />text <br    />!';
		$text = preg_replace('#<br\s*/?>#i', "\n", $content[0]->content);
	?>
	<form method="post" action="<?=base_url('article/save')?>">
		<input type="hidden" name="art_id" value="<?=$content[0]->id?>">
		Author Name: <input type="text" name="author" value="<?=$content[0]->author?>"> <br>
		Title: <input type="text" name="title" value="<?=$content[0]->title?>"><br>
		Content: <textarea style="width:600px; height:200px" name="content"> <?=$text?></textarea><br>
		<input type="submit" value="Update">
	</form>
	<? } else 
	{?>
	<form method="post" action="<?=base_url('article/save')?>">
		Author Name: <input type="text" name="author" ><br>
		Title: <input type="text" name="title"><br>
		Content: <textarea style="width:600px; height:200px" name="content"></textarea><br>
		<input type="submit" value="Add">
	</form>
	<?}?>