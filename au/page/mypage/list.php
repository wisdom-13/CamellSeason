<?php 

$row= fetchAll("select * from AU_PLAYER, AU_STATE WHERE p_no = $AU and p_no = s_player"); 
?>
<div class="sub">
	<div class="mypage_right">
		<img style="max-width: 800px; min-height: 820px;" src="/au/common/img/profile/body/<?= $AU ?>.png">
	</div>
	<div class="mypage_left">
		<img src="/au/common/img/mypage/grade/<?= $row->p_grade ?>.png" width="440px;">
		<h1><?= $row->p_name ?></h1>
		<div class="mypage_state">
			<div class="mypage_state_num hp"><?= $row->s_hp ?></div>
			<div class="mypage_state_num str"><?= $row->s_str ?></div>
			<div class="mypage_state_num con"><?= $row->s_con ?></div>
			<div class="mypage_state_num esp"><?= $row->s_esp ?></div>
		</div>
		<div style="clear: both"></div>
		<div class="mypage_state_box">
			<div class="mypage_state_text">
				<img src="/au/common/img/mypage/state/state_hp.png">
				<img src="/au/common/img/mypage/state/state_str.png">
				<img src="/au/common/img/mypage/state/state_con.png">
				<img src="/au/common/img/mypage/state/state_esp.png">
			</div>
			<div class="mypage_state_gauge">
				<div class="gauge_hp">
					<img src="/au/common/img/mypage/state/<?= ceil((($row->p_hp)/(10000+$row->s_hp*1000)*100)/10)*10 ?>.png"><span><?= number_format($row->p_hp)."/".number_format(10000+$row->s_hp*1000) ?></span>
				</div>
				<div class="gauge_str">
					<img src="/au/common/img/mypage/state/100.png"><span><?= number_format($row->s_str*1000) ?></span>
				</div>
				<div class="gauge_con">
					<img src="/au/common/img/mypage/state/100.png"><span><?= number_format($row->s_con*500) ?></span>
				</div>
				<div class="gauge_esp">
					<img src="/au/common/img/mypage/state/100.png"><span><?= $row->p_esp."/".floor($row->s_esp/2) ?></span>
				</div>
			</div>
			<div class="mypage_exp">
				<?php 
				$e = fetchAll("select sum(e_add) e_add from AU_EXP where e_player = $AU");
				$exp = fetchAll("select * from AU_GRADE where g_grade = '$row->p_grade'"); ?>
				현재 숙련도<br>
				<span><?= number_format($e->e_add) ?></span>
				다음 등급까지 남은 숙련도<br>
				<span><?= ($exp->g_exp - $e->e_add <= 0) ? "0" : number_format($exp->g_exp - $e->e_add) ?></span>
				<?php if($exp->g_exp - $e->e_add <= 0 && $e->e_add != ""){ ?>
				<img onClick="upgrade('<?= $exp->g_no ?>','<?= $row->p_grade ?>')" style="margin-top: -40px;" src="/au/common/img/mypage/state/upgrade.png"  onmouseover="this.src='/au/common/img/mypage/state/upgrade_hover.png';" onmouseout="this.src='/au/common/img/mypage/state/upgrade.png';">
				<?php } ?>
			</div>
		</div>
		<div class="sub_btn">
			<a href="/au/index.php/_templates/nopage"><img src="/au/common/img/mypage/button/battle.png"  onmouseover="this.src='/au/common/img/mypage/button/battle_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/battle.png';"></a>
			<a href="/au/index.php/mypage/mission"><img src="/au/common/img/mypage/button/mission.png"  onmouseover="this.src='/au/common/img/mypage/button/mission_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/mission.png';"></a>
			<a href="/au/index.php/mypage/expedition"><img src="/au/common/img/mypage/button/expedition.png"  onmouseover="this.src='/au/common/img/mypage/button/expedition_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/expedition.png';"></a>
			<a href="/au/index.php/mypage/state"><img src="/au/common/img/mypage/button/state.png"  onmouseover="this.src='/au/common/img/mypage/button/state_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/state.png';"></a>
			<a href="/au/index.php/mypage/letter_list/1"><img src="/au/common/img/mypage/button/message.png"  onmouseover="this.src='/au/common/img/mypage/button/message_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/message.png';"></a>
			<a href="/au/index.php/mypage/shop"><img src="/au/common/img/mypage/button/shop.png"  onmouseover="this.src='/au/common/img/mypage/button/shop_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/shop.png';"></a>
			<a href="/au/index.php/mypage/inventory/0"><img src="/au/common/img/mypage/button/inventory.png"  onmouseover="this.src='/au/common/img/mypage/button/inventory_hover.png';" onmouseout="this.src='/au/common/img/mypage/button/inventory.png';"></a>
		</div>
	</div>
	
</div>
<script>
function upgrade(no,grade){
	if(grade == "A" || grade == "S"){
		alert("특별 조건 달성 시 승급이 가능합니다. 해당 조건은 총괄계 DM에서 안내됩니다.");
	} else {
		$.ajax({
			type:"POST",
			url:"/au/index.php/ok/system/upgrade",
			data:{no:no},
			success : function (e){
				console.log(e);
				alert("승급을 축하드립니다!");
				location.reload();
			}
		});
	}
}
</script>