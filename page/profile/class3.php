<div class="profile_top" style="margin-top: 40px; text-align: center;">
	<img src="/common/img/profile/list/class<?= $val1 ?>_title.png" >
</div>
<div class="profile_menu" style="text-align: center; margin-top: 40px;" >
	<a href="/index.php/profile/npc"><img src="/common/img/profile/list/class0_menu.png" onmouseover="this.src='/common/img/profile/list/class0_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class0_menu.png'"></a>
 	<a href="/index.php/profile/class3/1"><img src="/common/img/profile/list/class1_menu.png" onmouseover="this.src='/common/img/profile/list/class1_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class1_menu.png'"></a>
 	<a href="/index.php/profile/class3/2"><img src="/common/img/profile/list/class2_menu.png" onmouseover="this.src='/common/img/profile/list/class2_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class2_menu.png'"></a>
 <a href="/index.php/profile/class3/3"><img src="/common/img/profile/list/class3_menu.png" onmouseover="this.src='/common/img/profile/list/class3_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class3_menu.png'"></a>
 	<a href="/index.php/profile/class3/4"><img src="/common/img/profile/list/class4_menu.png" onmouseover="this.src='/common/img/profile/list/class4_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class4_menu.png'"></a>
</div>
<div class="profile_list">
	<?php $G = "3"; foreach(query("select * from PLAYER p, MEMBER m where p_no = m_player3 and p_age = $G and p_class = '{$val1}' and p_use = 2 order by m_player") as $row){ ?>
		<a href="/index.php/profile/view3/<?= $row->p_no ?>">
		<div class="profile_head">
			<img class="profile_head_list" src="/admin/common/img/profile/<?= $G ?>/head/<?= $row->p_no ?>.png">
 			<img class="profile_border" src="/common/img/profile/list/head_border.png">
 			<img class="profile_border_hover" src="/common/img/profile/list/head_border_hover.png">
 			<div class="profile_text">
				<?php $member = fetchAll("SELECT * FROM MEMBER where m_player3 = $row->p_no"); ?> 
				<img src="/admin/common/img/title/title_<?= $member->m_title ?>.png">
				<span><?= $row->p_name ?></span>
 			</div>
		</div>
		</a>
	<?php } ?>
</div>

<style>
	.content { padding: 0px;}
	.profile_menu img { margin: 0 35px; }
	.profile_list { width: 750px; margin-top: 20px; }
	.profile_head { width: 140px; height: 240px; margin: 5px; overflow: hidden; float: left; position: relative; }
	.profile_head_list { width: 240px; margin-left: -50px; }
	.profile_border, .profile_border_hover { position: absolute; top: 0; left: 0; width: 140px; }
	.profile_border_hover { opacity: 0; }
	.profile_text { position: absolute; bottom: 13px; left: 13px; opacity: 0; }
	.profile_text img { display: block; text-align: right; margin: 0; }
	.profile_text span { color: #fff; text-align: right; font-size: 13px; opacity: 0.9; }
</style>
<script>
	
	$(".profile_head").on("mousemove",function(){
		$(this).children(".profile_border_hover").css("opacity","100");
		$(this).children(".profile_text").css("opacity","100");
	})
	$(".profile_head").on("mouseleave",function(){
		$(this).children(".profile_border_hover").css("opacity","0");
		$(this).children(".profile_text").css("opacity","0");
	})
</script>