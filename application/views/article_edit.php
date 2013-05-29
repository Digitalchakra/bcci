<div class = "container">
  <div class = "row">
    <!--Fixtures-->
    <div class = "span12">
	<? if($content)
	{
		$html = 'this <br>is<br/>some<br />text <br    />!';
		$text = preg_replace('#<br\s*/?>#i', "\n", $content[0]->content);
	?>
	<form method="post" action="<?=base_url('article/save')?>">
		<input type="hidden" name="art_id" value="<?=$content[0]->id?>">
		<p>Author Name</p> <input type="text" name="author" value="<?=$content[0]->author?>"> <br>
		<p>Title</p> <input type="text" name="title" value="<?=$content[0]->title?>"><br>
		<p>Content</p><textarea style="width:600px; height:200px" name="content"> <?=$text?></textarea><br>
		<input type="submit" class="btn btn-success" value="Update">
	</form>
	<? } else 
	{?>
	<form method="post" action="<?=base_url('article/save')?>">
		<p>Author Name</p> <input type="text" name="author" ><br>
		<p>Title</p><input type="text" name="title"><br>
		<p>Content</p><textarea style="width:600px; height:200px" name="content"></textarea><br>
		<input type="submit" class="btn btn-success" value="Add">
	</form>
	<?}?>
</div>
</div>
</div>