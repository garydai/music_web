<link type="text/css" rel="stylesheet" href="/comment.css" />

<div class="title">

	<a href="<?php echo $title->url?>"  target="_blank"  ><span class="song"><?php echo $title->song?></span></a>
	<br><span class="singer"><?php echo $title->singer?></span>
</div>

<div class="add_comment">

	<form method="post" action="/comment/add_comment">

		<input type="hidden" name="type" value="<?php if(isset($title->judge)) echo 'recommend'; else echo 'new'?>">
		<input type="hidden" name="id" value="<?php echo $title->id?>">

		<textarea name="content" rows="6" cols="60"></textarea><br>

		<input type="submit" value="add comment">
	</form>
	

</div>

<div class="comments">

	<?php for($i=0; $i < count($comments); $i ++) {?>
		<div class="comment"><?php echo $comments[$i]->content?></div>
	<?php } ?>


</div>


