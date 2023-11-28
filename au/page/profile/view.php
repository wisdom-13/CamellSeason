<?php $row = fetchAll("select * from AU_PLAYER, AU_STATE where p_no = $val1 and p_no = s_player"); ?>
<div class="sub">
	<div class="profile">
		<div class="profile_word">
			"<?= $row->p_word ?>"
		</div>
		<div class="profile_body">
			<img style="max-width: 1200px;" src="/au/common/img/profile/body/<?= $val1 ?>.png">
		</div>
		<br>
		<div class="profile_top">
			<div class="profile_head">
				<img src="/au/common/img/profile/grade/<?= $row->p_grade ?>.png"><br>
				<img class="profile_head_img" src="/au/common/img/profile/head/<?= $val1 ?>.png">
				<h3><?= $row->p_name ?></h3>
				<p>
					능력 : <?= $row->p_ability_name ?><br>
					나이 : <?= $row->p_age ?>세<br>
					성별 : <?= $SEX[$row->p_sex] ?><br>
					생일 : <?= $row->p_brith ?><br>
					신체 : <?= $row->p_hight ?><br>
				</p>
			</div>	
			<div class="profile_right">
				<div class="profile_state">
					<img style="margin-top: -25px; margin-bottom: 10px;" src="/au/common/img/profile/state.png"><br>
					<span style=" background: url('/au/common/img/profile/hp.png');"><?= $row->s_hp ?></span>
					<span style=" background: url('/au/common/img/profile/str.png');"><?= $row->s_str ?></span>
					<span style=" background: url('/au/common/img/profile/co.png');"><?= $row->s_con ?></span>
					<span style=" background: url('/au/common/img/profile/esp.png');"><?= $row->s_esp ?></span>
				</div>
				<div class="profile_app">
					<img src="/au/common/img/profile/app.png"><br><br>
					<p style="height: 200px; overflow: scroll;"><?= nl2br($row->p_look) ?><p>
				</div>
			</div>
			
			<div class="profile_ability">
				<img src="/au/common/img/profile/ability.png"><br><br>
				<p style="height: 180px; overflow: scroll;"><?= nl2br($row->p_ability) ?><p>
			</div>
		</div>
		<div style="clear: both"></div>
		<br><br>
		<img src="/au/common/img/profile/top.png">
		<div class="profile_box">
			<img src="/au/common/img/profile/info.png"><br><br>
			<p><?= nl2br($row->p_info) ?></p>
		</div>
		<img style="margin-top: -15px" src="/au/common/img/profile/bottom.png">
		<div style="clear: both"></div>
		<br><br>
		<img src="/au/common/img/profile/top.png">
		<div class="profile_box">
			<img src="/au/common/img/profile/other.png"><br><br>
			<p><?= nl2br($row->p_etc) ?></p>
		</div>
		<img style="margin-top: -15px" src="/au/common/img/profile/bottom.png">
		<br><br>
		<?php 
			$query = "select * from AU_RELATION where r_player = $val1";
			$chk = fetchAll($query); 
			$num = rowAll($query);
			if($chk){ 
		?>
		<img src="/au/common/img/profile/re_top.png">
		<div class="profile_re">
			<?php $i="0"; foreach(query($query) as $row){ $i++; ?>
			<div class="profile_box_head">
				<a href="/au/index.php/profile/view/<?= $row->r_player_to ?>"><img src="/au/common/img/profile/head/<?= $row->r_player_to ?>.png"></a>
			</div>
			<div class="profile_box_text">
				<h3><?= $row->r_title ?></h3>
				<p><?= $row->r_content ?></p>
			</div>
			<?php if($i<$num){ ?><img style="margin: 30px 0;" src="/au/common/img/profile/re_center.png"><?php } ?>
			<div style="clear: both"></div>
			<?php } ?>
			
		</div>
		
		<img style="margin-top: -5px" src="/au/common/img/profile/re_bottom.png">
		<?php } ?>
		<br><br>
	</div>
</div>
<style>
	.profile_box img { max-width: 1200px; }
</style>