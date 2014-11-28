


<div class ='newmusic'>

<ul class="list"style="list-style-type:none">
<?php for($i = 0; $i < count($music); $i ++) { ?>

	<li>
		<a href="<?php echo '/home/vote/id/'.$music[$i]->id.'/score/'.$music[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $music[$i]->vote?></span> </a>
		<a href="<?php echo $music[$i]->url?>"><span class="song"><?php echo $music[$i]->song?></span><br><span class="singer"><?php echo $music[$i]->singer?></span><span class="from">(<?php echo $music[$i]->source?>)</a>

	</li>

<?php } ?>
</ul>
</div>
