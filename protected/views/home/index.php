


<div class ='group'>

<ul class="list"style="list-style-type:none">
<?php for($i = 0; $i < count($qq); $i ++) { ?>

	<li>
		<a href="<?php echo '/home/vote/id/'.$qq[$i]->id.'/score/'.$qq[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $qq[$i]->vote?></span> </a>
		<a href="<?php echo $qq[$i]->url?>"><span class="song"><?php echo $qq[$i]->song?></span><br><span class="singer"><?php echo $qq[$i]->singer?></span><span class="from">(<?php echo $qq[$i]->source?>)</a>

	</li>

<?php } ?>
</ul>


<ul class="list list_end"style="list-style-type:none">
<?php for($i = 0; $i < count($xiami); $i ++) { ?>

        <li>
                <a href="<?php echo '/home/vote/id/'.$xiami[$i]->id.'/score/'.$xiami[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $xiami[$i]->vote?></span> </a>
                <a href="<?php echo $xiami[$i]->url?>"><span class="song"><?php echo $xiami[$i]->song?></span><br><span class="singer"><?php echo $xiami[$i]->singer?></span><span class="from">(<?php echo $xiami[$i]->source?>)</a>

        </li>

<?php } ?>
</ul>


<ul class="list list_end"style="list-style-type:none">
<?php for($i = 0; $i < count($net); $i ++) { ?>

        <li>
                <a href="<?php echo '/home/vote/id/'.$xiami[$i]->id.'/score/'.$net[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $net[$i]->vote?></span> </a>
                <a href="<?php echo $net[$i]->url?>"><span class="song"><?php echo $net[$i]->song?></span><br><span class="singer"><?php echo $net[$i]->singer?></span><span class="from">(<?php echo $net[$i]->source?>)</a>

        </li>

<?php } ?>
</ul>


</div>
