<div style="text-align: center;">
	<div style="margin-top: 26px;"><img src="/common/img/world/page/school_title.png"></div>
	<div class="school_menu">
		<img title="school_1" src="/common/img/world/page/school_title_1.png">
		<img title="school_3" src="/common/img/world/page/school_title_3.png">
		<img title="school_2" src="/common/img/world/page/school_title_2.png">
	</div>

	<div class="school_content school_1">
		<img src="/common/img/world/page/school_1.png">
	</div>
	<div class="school_content school_2">
		<img src="/common/img/world/page/school_2_top.png">
			<div class="school_content_box">
				<?php for($i=1; $i<=12; $i++){ ?>
				<div style="background: url('/common/img/world/page/school_internal/<?= $i ?>_hover.png')" class="school_internal">
					<img src="/common/img/world/page/school_internal/<?= $i ?>.png">
				</div>
				<?php } ?>
			</div>
		<img src="/common/img/world/page/school_2_bottom.png"><br><br><br>
		<img src="/common/img/world/page/school_2_text.png">
	</div>
	<div class="school_content school_3">
		<img src="/common/img/world/page/school_3.png">
	</div>
	
</div>
<style>
	.content { padding: 5px; }
	.school_menu img { margin: 20px 80px 10px 80px; }
	.school_menu img:nth-child(1) { margin-left: 0px}
	.school_menu img:nth-child(3) { margin-right: 0px}
	
	.school_content_box { width: 768px; }
	.school_internal { float: left; width: 236px; height: 330px; margin: 10px;  }
	.school_internal img { transition: 0.3s;}
	
	.school_2, .school_3 { display: none; }
</style>
<script>
	$(".school_menu img").on("click",function(){
		src = $(this).attr("title");
		$("."+src).css("display","block");
		$("."+src).siblings(".school_content").css("display","none");
		
	})
	
	$(".school_internal").on("mouseover",function(){
		$(this).children("img").css("opacity","0");
	})
	
	$(".school_internal").on("mouseleave",function(){
		$(this).children("img").css("opacity","100");
	})
	
</script>