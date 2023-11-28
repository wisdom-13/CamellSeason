<?php include "{$_SERVER['DOCUMENT_ROOT']}/au/include/lib.php" ?>
<?php include "{$_SERVER['DOCUMENT_ROOT']}/au/include/list.php" ?>

<?php 
alert();
	$val = $_POST["val"];	
foreach(query("select * from AU_BATTLE where ba_room = $val order by ba_no desc") as $row){ 
if($row->ba_player=="0"){
?>
<div class="battle_log">
	<p style="text-align: center"><?= $row->ba_log ?></p>
</div>
<?php } else if($row->ba_taget=="") { ?>
<div class="battle_log">
	<img src="/au/common/img/profile/head/<?= $row->ba_player ?>.png">
	<span <?= ($AU==$row->ba_player) ? "style='color: #3A9DD4'" : "" ?>><?= $PLAYER[$row->ba_player] ?></span>
	<p style="margin-top: 5px;"><?= $row->ba_log ?><span style="color: #F3BF28"> <?= $row->ba_damages ?></span><?= $row->ba_log2 ?></p>
</div>
<?php } else { ?>
<div class="battle_log">
	<img src="/au/common/img/profile/head/<?= $row->ba_player ?>.png">
	<span <?= ($AU==$row->ba_player) ? "style='color: #3A9DD4'" : "" ?>><?= $PLAYER[$row->ba_player] ?></span> 
	→ <span <?= ($AU==$row->ba_taget) ? "style='color: #3A9DD4'" : "" ?>><?= $PLAYER[$row->ba_taget] ?></span>
	<p style="margin-top: 5px;"><?= $row->ba_log ?><br><?= $row->ba_log2 ?><span style="color: #F3BF28"><?= $row->ba_damages ?></span></p>
</div>
<?php }} ?>
