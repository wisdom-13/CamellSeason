<?php include "{$_SERVER['DOCUMENT_ROOT']}/au/include/lib.php" ?>
<?php include "{$_SERVER['DOCUMENT_ROOT']}/au/include/list.php" ?>

<?php 
$row= fetchAll("select * from AU_PLAYER, AU_STATE WHERE p_no = $AU and p_no = s_player"); 
?>
<div class="battle_head">
	<img style="margin-bottom: 15px; margin-top: 5px;" width="100%" src="/au/common/img/mypage/grade/<?= $row->p_grade ?>.png">
	<img width="250px;" style="border: 2px solid #1558ba; background: url('/au/common/img/battle/head_back.png');" src="/au/common/img/profile/head/<?= $AU ?>.png">
</div>
<div class="battle_text">
	<h4 style="text-align: center; color: #c9d2ff; font-size: 24px; margin: 20px 0 ;"><?= $row->p_name ?></h4>
	<div>
		<img src="/au/common/img/battle/hp.png"><br>
		<img src="/au/common/img/battle/str.png"><br>
		<img src="/au/common/img/battle/co.png"><br>
		<img src="/au/common/img/battle/esp.png">
	</div>
	<div class="battle_text_state">
		<?php
		$g1 = fetchAll("select sum(po_price) g1 from AU_POINT where po_player='$au' and po_type='1'"); //증가
		$g2 = fetchAll("select sum(po_price) g2 from AU_POINT where po_player='$au' and po_type='2'"); //감소
		$point = (int)$g1->g1-(int)$g2->g2;
		?>
		<span id="hp"><?= number_format($row->p_hp) ?></span><br>
		<span><?= number_format($row->s_str*1000) ?></span><br>
		<span><?= number_format($row->s_con*500) ?></span><br>
		<span id="esp" data-esp = "<?= $row->p_esp ?>">
			<?php for($i=1; $i<=$row->p_esp; $i++){ ?><img src="/au/common/img/battle/esp_1.png"><?php } for($i=1; $i<=5-$row->p_esp; $i++){?><img src="/au/common/img/battle/esp_2.png"><?php } ?>
		</span>	
			
	</div>
	<br>
	<div style="text-align: center"><button style="text-align: center; margin-top: 20px;" onClick="location.href='/au/index.php/mypage/state'"><img src="/au/common/img/battle/state.png"  onmouseover="this.src='/au/common/img/battle/state_hover.png';" onmouseout="this.src='/au/common/img/battle/state.png';"></button></div>
</div>