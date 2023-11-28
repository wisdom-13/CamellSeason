
<div class="profile_top" style="margin-top: 40px; text-align: center;">
	<img src="/common/img/profile/list/class0_title.png" >
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
<div class="profile_list" style="width: 305px;">
	<?php foreach(query("select * from PLAYER where p_age = 0 limit 0,2") as $row){ ?>
		<a href="/index.php/profile/npc_view/<?= $row->p_no ?>">
		<div class="profile_head">
			<div class="profile_head_list_box"><img class="profile_head_list" src="/admin/common/img/profile/0/head/<?= $row->p_no ?>.png"></div>
 			<img class="profile_border" src="/common/img/profile/list/head_npc_border.png">
 			<img class="profile_border_hover" src="/common/img/profile/list/head_npc_border_hover.png">
 			<div class="profile_text">
				<span><?= (is_numeric($row->p_class)) ? $CLASS[$row->p_class]."담당" : $row->p_class; ?></span><br>
				<span style="font-size: 15px;"><?= $row->p_name ?></span>
 			</div>
		</div>
		</a>
	<?php } ?>
</div>
<div class="profile_list">
	<?php foreach(query("select * from PLAYER where p_age = 0 limit 2,5") as $row){ ?>
		<a href="/index.php/profile/npc_view2/<?= $row->p_no ?>">
		<div class="profile_head">
			<div class="profile_head_list_box"><img class="profile_head_list" src="/admin/common/img/profile/0/head/<?= $row->p_no ?>.png"></div>
 			<img class="profile_border" src="/common/img/profile/list/head_npc_border.png">
 			<img class="profile_border_hover" src="/common/img/profile/list/head_npc_border_hover.png">
 			<div class="profile_text">
				<span><?= (is_numeric($row->p_class)) ? $CLASS[$row->p_class]."담당" : $row->p_class; ?></span><br>
				<span style="font-size: 15px;"><?= $row->p_name ?></span>
 			</div>
		</div>
		</a>
	<?php } ?>
</div>

<style>
	.content { padding: 0px;}
	.profile_menu img { margin: 0 35px; }
	.profile_list { width: 760px; margin-top: 20px; display: block; clear: both; }
	.profile_head { width: 148px; height: 248px; margin: 5px 2px; padding: 8px; overflow: hidden; float: left; position: relative; }
	.profile_head_list { width: 235px; margin-left: -50px; }
	.profile_head_list_box { width:135px; height: 235px; overflow: hidden; margin-left: -3px; }
	.profile_border, .profile_border_hover { position: absolute; top: 0px; left: 0px;  }
	.profile_border_hover { opacity: 0; }
	.profile_text { position: absolute; bottom: 38px; left: 13px; opacity: 0; }
	.profile_text span { color: #fff; text-align: right; font-size: 12px; opacity: 0.6; font-weight: bold; }
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