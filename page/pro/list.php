<div class="pro">
	<div class="pro_gauge">
		<img src="/common/img/pro/pro_gauge_back.png">
		<div class="pro_gauge_bar"><img src="/common/img/pro/pro_gauge.png"></div>
	</div>
	<div class="pro_triangle"><img src="/common/img/pro/triangle.png"></div>
	<div class="pro_stage">
	<?php $pro = fetchAll("select p_pro from PLAYER where p_no = '{$_SESSION["p3"]}'"); //성장하면 수정하기 ?>
	<?php $pp = fetchAll("select pp_price from PRO_PRO where pp_no = '$pro->p_pro'"); //성장하면 수정하기 ?>
		<p class="stage_num">개화 <?= $pro->p_pro?>단계</p>
		<?php if($pro->p_pro == "9"){ ?>
		<span class="stage_num2">현재 츠보미 능력 성장도는 <?= $pro->p_pro ?>단계 입니다.<br>다음 단계로의 성장을 시도하기 위해선 <?= $pp->pp_price ?>花가 필요합니다.</span><br>
		<a href="/index.php/ok/pro/pro_pro/<?= mt_rand(0,100) ?>"><img class="pro_btn1" src="/common/img/pro/train.png" onmouseover="this.src='/common/img/pro/train_hover.png';" onmouseout="this.src='/common/img/pro/train.png';"></a>
		<a><img class="pro_btn2" src="/common/img/pro/portion_hover.png"></a>
		<?php } else if($pro->p_pro != "10"){ ?>
		<span class="stage_num2">현재 츠보미 능력 성장도는 <?= $pro->p_pro ?>단계 입니다.<br>다음 단계로의 성장을 시도하기 위해선 <?= $pp->pp_price ?>花가 필요합니다.</span><br>
		<a href="/index.php/ok/pro/pro_pro/<?= mt_rand(0,100) ?>"><img class="pro_btn1" src="/common/img/pro/train.png" onmouseover="this.src='/common/img/pro/train_hover.png';" onmouseout="this.src='/common/img/pro/train.png';"></a>
		<a href="/index.php/ok/pro/pro_item/<?= mt_rand(0,100) ?>"><img class="pro_btn2" src="/common/img/pro/portion.png" onmouseover="this.src='/common/img/pro/portion_hover.png';" onmouseout="this.src='/common/img/pro/portion.png';"></a>
		<?php } else { ?>
		<span class="stage_num2">축하합니다!<br>츠보미를 최대로 성장시켰습니다.<br>더 이상 츠보미를 성장시킬 수 없습니다.</span><br>
		<?php } ?>
	</div>
	<div class="pro_left">
		<div class="pro_evolution"></div>
		<div class="pro_growth"></div>	
	</div>
	<div class="pro_right">
		<img class="pro_people" src="/admin/common/img/profile/3/head/<?= $_SESSION["p3"] ?>.png"><!-- 성장하면 수정하기  -->
		<img class="pro_frame" src="/common/img/pro/people.png">
	</div>
</div>

<?php if($val1!="1"){ ?>
<div class="pro_popup">
	<img src="/common/img/pro/<?= $val1=="2" ? "success" : "fail" ?>.png"><br>
	<a href="/index.php/ok/pro/pro_pro/<?= mt_rand(0,100) ?>"><img src="/common/img/pro/re.png" onmouseover="this.src='/common/img/pro/re_hover.png';" onmouseout="this.src='/common/img/pro/re.png';"></a>
	<a href="/index.php/pro"><img src="/common/img/pro/close.png" onmouseover="this.src='/common/img/pro/close_hover.png';" onmouseout="this.src='/common/img/pro/close.png';"></a>
</div>
<div class="pro_back"></div>
<?php } ?>

<style>
	.content { padding: 55px 0px; text-align: center; margin-top: -28px; height: 805px;  background: url('/common/img/pro/pro_back.png'); }
	.content_top, .content_bottom { display: none; }
</style>

<script>
	//var stage = $(".stage_num2").text();
	var stage = <?= $pro->p_pro ?>;
	var bar = stage*65;
	$(".pro_gauge_bar").css("width",bar+"px");
	$(".pro_triangle").css("margin-left",bar-3+"px");
	if(stage==10){
		$(".pro_triangle").css("opacity","0");
	}
	
	//진급
	if(stage<4){
		$(".pro_evolution").text("두송이 진급까지 "+(4-stage)+"단계").css("background","url('/common/img/pro/evolution_1.png')");
	} else if(stage==4) {
		$(".pro_evolution").text("두송이 진급이 가능합니다.").css("background","url('/common/img/pro/evolution_1.png')");
	} else if(stage<8){
		$(".pro_evolution").text("세송이 진급까지 "+(8-stage)+"단계").css("background","url('/common/img/pro/evolution_2.png')");
	} else if(stage==8){
		$(".pro_evolution").text("세송이 진급이 가능합니다.").css("background","url('/common/img/pro/evolution_2.png')");
	} else if(stage<10) {
		$(".pro_evolution").text("성화 진급까지 "+(10-stage)+"단계").css("background","url('/common/img/pro/evolution_3.png')");
	} else {
		$(".pro_evolution").text("성화 진급이 가능합니다.").css("background","url('/common/img/pro/evolution_3.png')");
	}
	//성장
	if(stage<3){
		$(".pro_growth").text("츠보미 성장까지 "+(3-stage)+"단계").css("background","url('/common/img/pro/growth_1.png')");
	} else if(stage==3) {
		$(".pro_growth").text("츠보미가 성장했습니다.").css("background","url('/common/img/pro/growth_1.png')");
	} else if(stage<6){
		$(".pro_growth").text("츠보미 성장까지 "+(6-stage)+"단계").css("background","url('/common/img/pro/growth_2.png')");
	} else if(stage==6){
		$(".pro_growth").text("츠보미가 성장했습니다.").css("background","url('/common/img/pro/growth_2.png')");
	} else if(stage<9){
		$(".pro_growth").text("츠보미 성장까지 "+(9-stage)+"단계").css("background","url('/common/img/pro/growth_3.png')");
	} else if(stage==9){
		$(".pro_growth").text("츠보미가 성장했습니다.").css("background","url('/common/img/pro/growth_3.png')");
	} else {
		$(".pro_growth").text("최고 등급입니다.").css("background","url('/common/img/pro/growth_3.png')");
	}
	
</script>
