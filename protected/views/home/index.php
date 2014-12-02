
<script type="text/javascript" src="/js/jquery.tabslideout.1.3.js"></script>

<div class ='group'>

<ul class="list list1"style="list-style-type:none">
<?php for($i = 0; $i < count($qq); $i ++) { ?>

	<li>
		<a href="<?php echo '/home/vote/id/'.$qq[$i]->id.'/score/'.$qq[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $qq[$i]->vote?></span> </a>
		<a href="<?php echo $qq[$i]->url?>" target="_blank" ><span class="song"><?php echo $qq[$i]->song?></span><br><span class="singer"><?php echo $qq[$i]->singer?></span><span class="from">(<?php echo $qq[$i]->source?>)</a>

	</li>

<?php } ?>
</ul>


<ul class="list list_end list2"style="list-style-type:none">
<?php for($i = 0; $i < count($xiami); $i ++) { ?>

        <li>
                <a href="<?php echo '/home/vote/id/'.$xiami[$i]->id.'/score/'.$xiami[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $xiami[$i]->vote?></span> </a>
                <a href="<?php echo $xiami[$i]->url?>"  target="_blank" ><span class="song"><?php echo $xiami[$i]->song?></span><br><span class="singer"><?php echo $xiami[$i]->singer?></span><span class="from">(<?php echo $xiami[$i]->source?>)</a>

        </li>

<?php } ?>
</ul>


<ul class="list list_end list3"style="list-style-type:none">
<?php for($i = 0; $i < count($net); $i ++) { ?>

        <li>
                <a href="<?php echo '/home/vote/id/'.$xiami[$i]->id.'/score/'.$net[$i]->vote?>"> <i class="arrow"></i><span class="score"><?php echo $net[$i]->vote?></span> </a>
                <a href="<?php echo $net[$i]->url?>"  target="_blank"  ><span class="song"><?php echo $net[$i]->song?></span><br><span class="singer"><?php echo $net[$i]->singer?></span><span class="from">(<?php echo $net[$i]->source?>)</a>

        </li>

<?php } ?>
</ul>


</div>


<div class="slide-out-div" style="height:552px; background-color: rgb(66, 139, 202); z-index:9999; " id="cryptsychat">
	<a class="handle" href="#">&nbsp;</a>

	<div id="chat">
	        <div id="menu">
        	        <p class="welcome">just talk <b></b></p>
                	<div style="clear:both"></div>
	        </div>

	        <div id="chatbox"></div>
        	<div id="message">
                	<input name="usermsg" type="text" id="usermsg" size="63" />
	                <input name="submitmsg" type="button"  id="submitmsg" value="Send" />
        	</div>

	</div>

</div>

<script type="text/javascript">
	$("#submitmsg").click(function(){
	
		var clientmsg = $("#usermsg").val();
		$.ajax({
        	        type: "post",
	                url: "/home/submit",
			data:{'msg':clientmsg},
        	        success: function(html) {
			$("#chatbox").html(html);
        	        }
	            });




	});


	function loadMsg(){	
		var oldscrollHeight = $("#chatbox")[0].scrollHeight;	
//		alert(oldscrollHeight);
		$.ajax({
			url: "/home/loadMsg",
			success: function(html)
				{		
				$("#chatbox").html(html); //Insert chat log into the #chatbox div
				$("#chatbox")[0].scrollTop = $("#chatbox")[0].scrollHeight;	
				}				
		});
	}


$(function() {




	$('.slide-out-div').tabSlideOut({
		tabHandle: '.handle',					 // class of the element that will become your tab
		pathToTabImage: '/images/chatlogo.png',   // path to the image for the tab //Optionally can be set using css
		imageHeight: '89px',					 // height of tab image		   //Optionally can be set using css
		imageWidth: '35px',					   // width of tab image			//Optionally can be set using css
		tabLocation: 'right',					 // side of screen where tab lives, top, right, bottom, or left
		speed: 300,							   // speed of animation
		action: 'click',						  // options: 'click' or 'hover', action to trigger animation
		topPos: '60px',						  // position from the top/ use if tabLocation is left or right
		leftPos: '20px',						  // position from left/ use if tabLocation is bottom or top
		fixedPosition: true					   // options: true makes it stick(fixed position) on scroll
	});


	
});



</script>
