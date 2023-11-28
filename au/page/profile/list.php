<div class="sub">
	<div class="profile" style="text-align: left;">
		
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'SS' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/SS.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'S' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/S.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'A' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/A.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'B' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/B.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'C' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/C.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'D' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/D.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
		<div class="profile_list">
			<?php 
				$query = "select * from AU_PLAYER where p_grade = 'E' order by p_name";  
				$chk = fetchAll($query);
				if($chk){
			?>
			<div class="profile_grade"><img src="/au/common/img/profile/grade/E.png"></div>
			<?php } ?>
			<?php foreach(query($query) as $row){ ?>
			<div class="profile_list_box">
				<div class="profile_img_back"><a href="/au/index.php/profile/view/<?= $row->p_no ?>"><img src="/au/common/img/profile/head/<?= $row->p_no ?>.png"></a></div>
			</div>
			<?php } ?>
		</div>
		<div style="clear: both"></div>
	</div>
</div>
<style>
	body { background: url('/au/common/img/profile/profile_back.png');}
</style>

<script>
	$(".profile_list_box").on("mouseover",function(){
		$(this).css('background-image', 'url("/au/common/img/profile/list_back_hover.png")');
	})
	$(".profile_list_box").on("mouseleave",function(){
		$(this).css('background-image', 'url("/au/common/img/profile/list_back.png")');
	})
</script>
