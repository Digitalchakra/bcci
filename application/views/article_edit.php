
	<? if($content)
	{
		$html = 'this <br>is<br/>some<br />text <br    />!';
		$text = preg_replace('#<br\s*/?>#i', "\n", $content[0]->content);
	?>
	<form method="post" action="<?=base_url('article/save')?>">
		<input type="hidden" name="art_id" value="<?=$content[0]->id?>">
		Author Name: <input type="text" name="author" value="<?=$content[0]->author?>">
		Title: <input type="text" name="title" value="<?=$content[0]->title?>">
		Content: <textarea name="content"> <?=$text?></textarea>
		<input type="submit">
	</form>
	<? } else 
	{?>
	<form method="post" action="<?=base_url('article/save')?>">
		Author Name: <input type="text" name="author" >
		Title: <input type="text" name="title">
		Content: <textarea name="content"></textarea>
		<input type="submit">
	</form>
	<?}?>