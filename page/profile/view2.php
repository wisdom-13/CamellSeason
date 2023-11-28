<?php $row = fetchAll("SELECT * FROM PLAYER, MEMBER, GROWTH where p_no = $val1 and m_player2 = p_no and g_player = m_no");  ?>

<div class="profile_top" style="margin-top: 40px; text-align: center;">
	<img src="/common/img/profile/list/class<?= $row->p_class ?>_title.png" >
</div>
<div class="profile_menu" style="text-align: center; margin-top: 40px;" >
	<a href="/index.php/profile/npc"><img src="/common/img/profile/list/class0_menu.png" onmouseover="this.src='/common/img/profile/list/class0_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class0_menu.png'"></a>
 	<a href="/index.php/profile/class2/1"><img src="/common/img/profile/list/class1_menu.png" onmouseover="this.src='/common/img/profile/list/class1_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class1_menu.png'"></a>
 	<a href="/index.php/profile/class2/2"><img src="/common/img/profile/list/class2_menu.png" onmouseover="this.src='/common/img/profile/list/class2_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class2_menu.png'"></a>
 <a href="/index.php/profile/class2/3"><img src="/common/img/profile/list/class3_menu.png" onmouseover="this.src='/common/img/profile/list/class3_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class3_menu.png'"></a>
 	<a href="/index.php/profile/class2/4"><img src="/common/img/profile/list/class4_menu.png" onmouseover="this.src='/common/img/profile/list/class4_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class4_menu.png'"></a>
</div>


<div class="profile_word">"<?= $row->p_word ?>"</div>
<div class="profile_body"><img width="700px" src="/admin/common/img/profile/2/body/<?= $row->p_no ?>.png"></div>
	
<div class="profile_content">
	<div class="profile_btn">
		<img class="top_open" src="/common/img/profile/view/close.png" onmouseover="this.src='/common/img/profile/view/close_hover.png'"
	 onmouseout="this.src='/common/img/profile/view/close.png'">
		 <img class="top_close" style="display: none" src="/common/img/profile/view/open.png" onmouseover="this.src='/common/img/profile/view/open_hover.png'"
	 onmouseout="this.src='/common/img/profile/view/open.png'">
	</div>
	<!--미니프로필-->
	<img class="mini_top" style="margin-left: -3px; margin-top: -30px; position: relative; z-index: 5" src="/common/img/profile/view/mini_top.png">
	<div class="profile_mini">
		<div class="mini_head">
			<img width="250px;" src="/admin/common/img/profile/2/head/<?= $row->p_no ?>.png">
		</div>
		<div class="mini_text">
			<img style="margin-bottom: 10px;" src="/admin/common/img/title/title_<?= $row->m_title ?>.png">
			<p style="margin-bottom: 10px;">
				이름 : <?= $row->p_name ?> <br>
				나이 : <?= $AGE[$row->p_age] ?> <br>
				성별 : <?= $SEX[$row->p_sex] ?> <br>
				생일 : <?= $row->p_brith ?> <br>
				신체 : <?= $row->p_hight ?> <br>
			</p>
			<img src="/common/img/profile/view/grade/<?= $row->p_grade ?>.png">
			<img src="/common/img/profile/view/pro/<?= $row->p_pro ?>.png">
		</div>
		<div class="mini_age">
			<a href="/index.php/profile/view/<?= $row->m_player ?>"><img src="/common/img/profile/view/age_1.png" onmouseover="this.src='/common/img/profile/view/age_1_hover.png'"
	 onmouseout="this.src='/common/img/profile/view/age_1.png'"></a>
			<a href="/index.php/profile/view2/<?= $row->m_player2 ?>"><img src="/common/img/profile/view/age_2.png" onmouseover="this.src='/common/img/profile/view/age_2_hover.png'"onmouseout="this.src='/common/img/profile/view/age_2.png'"></a>
			<a href="/index.php/profile/view3/<?= $row->m_player3 ?>"><img src="/common/img/profile/view/age_3.png" onmouseover="this.src='/common/img/profile/view/age_3_hover.png'"onmouseout="this.src='/common/img/profile/view/age_3.png'"></a>
		</div>
	</div>
	<img class="mini_bottom" style="margin-left: -3px; margin-top: -50px;" src="/common/img/profile/view/mini_bottom.png">
	
	<!--츠보미-->
	<div class="profile_avility">
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
		
		<p class = "avility_1"><?= nl2br($row->p_avility) ?></p>
		<p class = "avility_3"><?= nl2br($row->g_3) ?></p>
		<p class = "avility_6"><?= nl2br($row->g_6) ?></p>
		<p class = "avility_9"><?= nl2br($row->g_9) ?></p>
		
		<a href="/index.php/profile/avility2/<?= $row->p_no ?>">자세히보기</a>
	</div>
	
	<!--로그-->
	<div class="profile_log">
		<div style="overflow: scroll; height: 190px">
			<?php foreach(query("SELECT * FROM LOG where l_player = '$row->m_no'") as $log){ $i++ ?>
			<img onclick="window.open('<?= $log->l_url ?>','기록','width=800, height=800, location=no,status=no,scrollbars=yes');" src="/common/img/profile/view/log_btn.png" onmouseover="this.src='/common/img/profile/view/log_btn_hover.png'"
			 onmouseout="this.src='/common/img/profile/view/log_btn.png'">
			<?php } ?>
		</div>
	</div>
	
	<!--상세 내용-->
	<img style="margin-left: -27px" src="/common/img/profile/view/look.png">
	<div class="profile_box">
		<?= nl2br($row->p_look) ?>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<img style="margin-left: -27px" src="/common/img/profile/view/info.png">
	<div class="profile_box">
		<?= nl2br($row->p_info) ?>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<img style="margin-left: -27px" src="/common/img/profile/view/etc.png">
	<div class="profile_box profile_etc">
		<?= nl2br($row->p_etc) ?>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<br>
	<?php 
	$query = "select * from RELATION where r_player = '{$row->m_no}' and r_content_2 is not NULL";
	if(fetchAll($query)){; ?>
	<!--관계-->
	<img style="margin-left: -17px" src="/common/img/profile/view/re_top.png">
	<div class="p_re profile_box">
		<?php foreach(query($query) as $re){ ?>
		<div class="re_box">
			<div class="re_head">
				<?php $row = fetchAll("select * from MEMBER where m_no = $re->r_player_to")?>
				<a href="/index.php/profile/view2/<?= $row->m_player2 ?>"><img width="140px;" src="/admin/common/img/profile/2/head/<?= $row->m_player2 ?>.png"></a>
				<div class="re_name"><?= $PLAYER[$re->r_player_to] ?></div>
			</div>
			<div class="re_text">
				<h5><?= $re->r_title_2 ?></h5>
				<p><?= $re->r_content_2 ?></p>
			</div>
		</div>
		<?php } ?>
		<div style="clear: both"></div>
	</div>
	<img style="margin: -30px 0 0 -17px;" src="/common/img/profile/view/re_bottom.png">
	<?php } ?>
	
</div>

<style>
	.content { padding: 0px; text-align: center; }
	.profile_menu img { margin: 0 35px; }
	.profile_content { width: 750px; margin-top: -250px; position: relative; z-index: 1;}
	.profile_word { background: url("/common/img/profile/view_npc/profile_word.png"); width: 707px; height: 72px; padding: 32px 0; text-align: center; font-size: 14px; font-weight: 900; margin-top: 30px; color: #666;}	
	.profile_btn { float: right; position: relative; z-index: 10;}
	.profile_mini { width: 100%; height: 250px; background: url('/common/img/profile/view/mini_back.png'); margin-top: -20px; }
	.profile_mini div { float: left; }
	.mini_head { padding: 0 10px; width: 300px; }
	.mini_text { width: 280px; color: #fff; text-align: left; padding-top: 10px; font-size: 13px; }
	.mini_age { width: 100px; padding: 40px 0; }
	.mini_age img { padding-bottom: 15px; }
	.profile_avility { width: 470px; height: 260px; float: left; padding: 30px 40px; background: url('/common/img/profile/view/avility_back.png'); margin-top: -10px; text-align: left; }
	.profile_avility h4, .profile_avility span { font-weight: 900; font-size: 20px;}
	.profile_avility p { height: 140px; overflow: scroll; margin-top: 15px; margin-bottom: 5px; font-size: 14px; display: none; }
	.profile_avility a { font-size: 12px; font-weight: 900; color: #851210 !important; float: right;}
	.avility_btn { margin-top: -32px; text-align: right; }
	.profile_log { width: 274px; height: 260px; float: right; padding: 40px 36px; background: url('/common/img/profile/view/log_back.png'); margin-top: -10px; }
	.profile_log img { float: left; padding: 2px; }
	.profile_box { width: 100%; min-height: 200px; padding: 50px 30px 40px 30px; background: rgba(0,0,0,0.14); margin-top: -110px; clear: both; text-align: left; line-height: 180%; font-size: 13px;  }
	.p_re { margin-top: -50px; background: rgba(0,0,0,0.5); padding: 20px; }
	.re_box { width: 100%; padding: 10px; height: 200px; color: rgba(255,255,255,0.8); }
	.re_head { width: 150px; float: left; margin-right: 20px; }
	.re_head img { border-radius: 100px; border:5px solid #851210; background: #fff; margin-bottom: 10px; }
	.re_name { color: #fff; text-align: center; background: #851210; width: 140px;}
	.re_text h5 { margin-top: 30px; color:#fff; }
	.re_text p { font-size: 13px; line-height: 160%; height: 130px; overflow: scroll; }
</style>

<script>
	$(document).ready(function(){
		
		height = $(".profile_body").height();
		if(height<="650"&&height!==0){
			$(".profile_content").css("margin-top","0");
		}
		
		$(".top_open").css("display","block");
		
		
		$(".top_open").on("click",function(){
			if(height<="650"&&height!==0){
				$(".profile_mini, .mini_bottom").css("display","none");
			} else {
				$(".profile_mini, .mini_top").css("display","none");
				$(".profile_content").css("margin-top","0");
				$(".profile_btn").css("margin-bottom","10px");
				$(".mini_bottom").attr("src","/common/img/profile/view/mini_top.png");
			}
			$(this).css("display","none");
			$(".top_close").css("display","block");
			
		})
		
		$(".top_close").on("click",function(){
			if(height<="650"&&height!==0){
				$(".profile_mini, .mini_bottom").css("display","inline-block");
			} else {
				$(".profile_mini, .mini_top").css("display","inline-block");
				$(".profile_content").css("margin-top","-250px");
				$(".profile_btn").css("margin-bottom","0px");
				$(".mini_bottom").attr("src","/common/img/profile/view/mini_bottom.png");
			}
			$(this).css("display","none");
			$(".top_open").css("display","block");
			
		})
		
		
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
		
		
		if($(".profile_etc img").width() > 700){
			$(".profile_etc img").css("width","100%");
		}
		
	});
</script>
