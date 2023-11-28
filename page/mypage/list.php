<?php 
if(!isset($_SESSION["no"])){ am("로그인 후 이용하실 수 있습니다.","/index.php"); return; }
$age = ($val1 == "1") ? "" : $val1;
$row = fetchAll("SELECT * FROM PLAYER, MEMBER, GROWTH where p_no = '{$_SESSION['p'.$val1]}' and m_player$age = p_no and g_player = m_no"); 
?>

<div class="profile_word">"<?= $row->p_word ?>"</div>
<div class="profile_body"><img width="700px" src="/admin/common/img/profile/<?= $val1 ?>/body/<?= $_SESSION['p'.$val1] ?>.png"></div>
	
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
			<img width="250px;" src="/admin/common/img/profile/<?= $val1 ?>/head/<?= $_SESSION['p'.$val1] ?>.png">
		</div>
		<div class="mini_text">
			<img class="profile_title" style="margin-bottom: 10px;" src="/admin/common/img/title/title_<?= $row->m_title ?>.png">
			<p style=" margin-bottom: 10px;">
				이름 : <?= $row->p_name ?> <br>
				나이 : <?= $AGE[$row->p_age] ?>세<br>
				성별 : <?= $SEX[$row->p_sex] ?> <br>
				생일 : <?= $row->p_brith ?> <br>
				신체 : <?= $row->p_hight ?> <br>
			</p>
			<img src="/common/img/profile/view/grade/<?= $row->p_grade ?>.png">
			<img src="/common/img/profile/view/pro/<?= $row->p_pro ?>.png">
		</div>
		<div class="mini_right">
			<div class="mini_age">
				<a href="/index.php/mypage/list/1"><img src="/common/img/profile/view/age_1.png" onmouseover="this.src='/common/img/profile/view/age_1_hover.png'"
				onmouseout="this.src='/common/img/profile/view/age_1.png'"></a>
				<a href="/index.php/mypage/list/2"><img src="/common/img/profile/view/age_2.png" onmouseover="this.src='/common/img/profile/view/age_2_hover.png'" onmouseout="this.src='/common/img/profile/view/age_2.png'"></a>
				
				<?php if($_SESSION["p3"]!="0") { ?>
				<a href="/index.php/mypage/list/3"><img src="/common/img/profile/view/age_3.png" onmouseover="this.src='/common/img/profile/view/age_3_hover.png'" onmouseout="this.src='/common/img/profile/view/age_3.png'"></a>
				<?php } else { ?>
				<img src="/common/img/profile/view/age_3.png">
				<?php } ?>
			</div>
			<div class="mini_title">
			<div style="height: 130px; overflow: scroll; ">	
				
				<div class="title_list">
					<p style="float: left; width: 80%; line-height: 30px">칭호 없음</p>
					<img class="title_use" data-no = "0" style="float: right;" src="/common/img/profile/mypage/use.png" onmouseover="this.src='/common/img/profile/mypage/use_hover.png'"
				onmouseout="this.src='/common/img/profile/mypage/use.png'">
				</div>
				<?php foreach(query("SELECT * FROM `TITLE` WHERE t_get LIKE '%,$row->m_no,%'") as $title) { ?>
				<div class="title_list">
					<img style="float: left; margin-top: -10px" src="<?= $title->t_img ?>" title="<?= $title->t_content ?>">
					<img class="title_use" data-no = "<?= $title->t_no ?>" style="float: right; " src="/common/img/profile/mypage/use.png" onmouseover="this.src='/common/img/profile/mypage/use_hover.png'"
				onmouseout="this.src='/common/img/profile/mypage/use.png'">
				</div>
				<?php } ?>
			</div>
			</div>
		</div>
	</div>
	<img class="mini_bottom" style="margin-left: -3px; margin-top: -30px;" src="/common/img/profile/view/mini_bottom.png">
	
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
			<img class="avility_open" data-pro="3" src="/common/img/profile/view/avility_0<?= ($pro>=3&&$pro<6) ? "_hover" : "" ?>.png">
			<img class="avility_open" data-pro="6" src="/common/img/profile/view/avility_0<?= ($pro>=6&&$pro<9) ? "_hover" : "" ?>.png">
			<img class="avility_open" data-pro="9" src="/common/img/profile/view/avility_0<?= ($pro>=9) ? "_hover" : ""; ?>.png">
		</div>
		
		<p class = "avility_1"><?= nl2br($row->p_avility) ?></p>
		<p class = "avility_3"><?= nl2br($row->g_3) ?></p>
		<p class = "avility_6"><?= nl2br($row->g_6) ?></p>
		<p class = "avility_9"><?= nl2br($row->g_9) ?></p>
		
		<a href="/index.php/mypage/avility/<?= $age ?>">자세히보기</a>
	</div>
	
	<!--로그-->
	<div class="profile_log">
		<div style="overflow: scroll; height: 190px">
			<?php foreach(query("SELECT * FROM LOG where l_player = '{$_SESSION["no"]}'") as $log){ $i++ ?>
			<img onclick="window.open('<?= $log->l_url ?>','기록','location=no,status=no,scrollbars=yes');" src="/common/img/profile/view/log_btn.png" onmouseover="this.src='/common/img/profile/view/log_btn_hover.png'"
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
	<div class="profile_box">
		<?= nl2br($row->p_etc) ?>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<img style="margin-left: -27px" src="/common/img/profile/view/hidden.png">
	<div class="profile_box">
		<?= nl2br($row->p_hidden) ?>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<br>
	<div style="clear: both"></div>
	<?php 
	$query = "select * from RELATION where r_player = '{$_SESSION['no']}' and r_content_$val1 is not NULL";
	if(fetchAll($query)){; ?>
	<!--관계-->
	<img style="margin-left: -17px" src="/common/img/profile/view/re_top.png">
	<div class="p_re profile_box">
		<?php foreach(query($query) as $re){ ?>
		<div class="re_box">
			<?php 
				$title = r_title_.$val1;
				$content = r_content_.$val1;
				$mm = m_player.$age;
			?>
			<div class="re_head">
				<?php $member = fetchAll("select * from MEMBER where m_no = $re->r_player_to");  ?>
				<a href="/index.php/profile/view<?= $age ?>/<?= $member->$mm ?>"><img width="140px;" src="/admin/common/img/profile/<?= $val1 ?>/head/<?= $member->$mm ?>.png"></a>
				<div class="re_name"><?= $PLAYER[$re->r_player_to] ?></div>
			</div>
			<div class="re_text">
				<h5><?= $re->$title ?></h5>
				<p><?= $re->$content ?></p>
			</div>
		</div>
		<?php } ?>
		<div style="clear: both"></div>
	</div>
	<img style="margin: -30px 0 0 -17px;" src="/common/img/profile/view/re_bottom.png">
	<?php } ?>
	
	<div class="mypage_btn">
		<!--
		<?php if($_SESSION["p3"]=="0" || !isset($_SESSION["p3"])){ //업로드?> 
		<a href="/index.php/mypage/profile"><img src="/common/img/profile/mypage/update.png" onmouseover="this.src='/common/img/profile/mypage/update_hover.png'"
		 onmouseout="this.src='/common/img/profile/mypage/update.png'"></a>
		<?php } else { //업데이트 ?>
		<a href="/index.php/mypage/update"><img src="/common/img/profile/mypage/update.png" onmouseover="this.src='/common/img/profile/mypage/update_hover.png'"
		 onmouseout="this.src='/common/img/profile/mypage/update.png'"></a>
		<?php } ?>
		-->
		<a onClick="alert('학적부 등록기간이 아닙니다.')"><img src="/common/img/profile/mypage/update.png" onmouseover="this.src='/common/img/profile/mypage/update_hover.png'"
		 onmouseout="this.src='/common/img/profile/mypage/update.png'"></a>
	 	<a href="/index.php/mypage/list/re"><img class="add_re" src="/common/img/profile/mypage/re.png" onmouseover="this.src='/common/img/profile/mypage/re_hover.png'"
		 onmouseout="this.src='/common/img/profile/mypage/re.png'"></a>
	 	<a href="/index.php/mypage/list/log"><img src="/common/img/profile/mypage/log.png" onmouseover="this.src='/common/img/profile/mypage/log_hover.png'"
	 	onmouseout="this.src='/common/img/profile/mypage/log.png'"></a>	
	</div>
</div>

<style>
	.content { padding: 0px; text-align: center; }
	.profile_content { width: 750px; margin-top: -250px; position: relative; z-index: 1;}
	.profile_word { background: url("/common/img/profile/view_npc/profile_word.png"); width: 707px; height: 72px; padding: 32px 0; text-align: center; font-size: 14px; font-weight: 900; margin-top: 30px; color: #666;}	
	.profile_btn { float: right; position: relative; z-index: 10;}
	.profile_mini { width: 100%; height: 250px; background: url('/common/img/profile/view/mini_back.png'); margin-top: -20px; }
	.profile_mini div { float: left; }
	.mini_head { width: 270px; }
	.mini_text { width: 180px; color: #fff; text-align: left; padding-top: 10px; }
	.mini_text p { font-size: 14px; }
	.mini_right { width: 294px; float: right; }
	.mini_age {padding: 15px 0 5px 0; }
	.mini_age img { padding: 0 3px; text-align: center; }
	.mini_title { width: 294px; background: url('/common/img/profile/mypage/title_list.png'); height: 181px; padding: 35px 15px 10px 15px;  }
	.title_list { background: url('/common/img/profile/mypage/need.png'); margin-bottom: 8px; transition: 0.3s; width: 264px; height: 44px; padding: 7px; text-align: left; }
	.title_list p { margin-top: 2px; font-size: 12px; font-family: "굴림"} 
	/*.title_list:hover { background: url('/common/img/profile/mypage/need_hover.png'); }*/
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
	
	.mypage_btn img { margin: 0px 10px 20px 10px; }
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
		 
		$(".title_use").on("click",function(){
			no = $(this).data("no");
			player = <?= $_SESSION["no"] ?>;
			
			$.ajax({
				type:"POST",
				url:"/index.php/ok/mypage/title_change",
				data:{no:no,player:player}
			});
			
			$(".profile_title").attr("src","/admin/common/img/title/title_"+no+".png");
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
		
	});
</script>
