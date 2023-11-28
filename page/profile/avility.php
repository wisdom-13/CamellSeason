<?php 
$row = fetchAll("SELECT * FROM PLAYER, MEMBER, GROWTH where p_no = $val1 and m_player = p_no and g_player = m_no and p_use = 1"); ?>

<div class="avility_page">
	<?php
		if($row->p_pro >= 9){
			$pro = 9;
		} else if($row->p_pro >= 6) {
			$pro = 6;
		} else if($row->p_pro >= 3) {
			$pro = 3;
		} else {
			$pro = 1;
		}
	?>
	<h4><?= $row->p_avility_name ?> <span class="pro_text"><?= $pro ?>단계</span></h4>
	<div class="avility_btn">
		<img class="avility_open" data-pro="1" src="/common/img/profile/view/avility_0<?= ($pro<3) ? "_hover" : "" ?>.png">
		<img class="<?= ($pro>=3) ? "avility_open" : "" ?>" data-pro="3" src="/common/img/profile/view/avility_<?= ($pro>=3) ? "0" : "lock"; echo ($pro>=3&&$pro<6) ? "_hover" : "" ?>.png">
		<img class="<?= ($pro>=6) ? "avility_open" : "" ?>" data-pro="6" src="/common/img/profile/view/avility_<?= ($pro>=6) ? "0" : "lock";echo ($pro>=6&&$pro<9) ? "_hover" : "" ?>.png">
		<img class="<?= ($pro>=9) ? "avility_open" : "" ?>" data-pro="9" src="/common/img/profile/view/avility_<?= ($pro>=9) ? "0" : "lock"; ?>.png">
	</div>
	<div style="height:  350px; overflow: scroll; margin-top: 15px; margin-bottom: 5px;">
		<p class = "avility_1"><?= nl2br($row->p_avility) ?></p>
		<p class = "avility_3"><?= nl2br($row->g_3) ?></p>
		<p class = "avility_6"><?= nl2br($row->g_6) ?></p>
		<p class = "avility_9"><?= nl2br($row->g_9) ?></p>	
	</div>
</div>

<style>
	.avility_page { background: url('/common/img/quest/quest_content.png'); width: 803px; height: 475px; position: absolute; z-index: 500; top: 50%; left: 50%; margin-top: -238px; margin-left: -401px; padding: 50px 60px; display: none; }
	.avility_page h4, .avility_page span { font-weight: 900; font-size: 20px;}
	.avility_page p { font-size: 14px; text-align: left; display: none; }
	.avility_btn { margin-top: -32px; text-align: right; }
</style>
<script>
	$(document).ready(function(){
		$(".join_back").stop().slideToggle(1000);
		$(".avility_page").stop().slideToggle(1000);
		
		
		$(".join_back").on("click",function(){
			$(".join_back").stop().slideToggle(1000);
			$(".avility_page").stop().slideToggle(1000);
			location.href='/index.php/profile/view/<?= $val1 ?>';
		});
		
		$(".avility_<?= $pro?>").css("display","block");
		
		$(".avility_open").on("click",function(){
			pro = $(this).data("pro");
			$(".pro_text").text(pro+"단계");
			src = $(this).attr('src');
			a = src.split('_');
			$(this).attr('src',a[0]+"_0_hover.png");
			$(this).siblings(".avility_open").attr("src","/common/img/profile/view/avility_0.png");
			$(".avility_"+pro).css("display","block");
			$(".avility_"+pro).siblings("p").css("display","none");
		});
	});
</script>