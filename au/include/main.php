	<div class="main_text">
	<img src="/au/common/img/main/text.png">
</div>
<div class="main_bottom">
	<div class="main_box_1 box">
		<img src="/au/common/img/main/slide.png">
	</div>
	<div class="main_box_2 box">
		<a href="/au/index.php/mypage/shop/0"><img src="/au/common/img/main/shop.png" onmouseover="this.src='/au/common/img/main/shop_hover.png';" onmouseout="this.src='/au/common/img/main/shop.png';"></a>
	</div>
	<div class="main_login">
		<?php $au = $_SESSION["au"]; if(isset($au)){ 
		$row= fetchAll("select * from AU_PLAYER WHERE p_no = $au"); 
		?>
		<div class="login_input login_ok">
			<div class="login_img">
				<img src="/au/common/img/profile/head/<?= $au ?>.png">
			</div>
			<div class="login_text">
				<img src="/au/common/img/grade/<?= $row->p_grade ?>.png">
				<h4><?= $row->p_name ?></h4>
				<a href="/au/index.php/my"><img src="/au/common/img/main/profile.png"  onmouseover="this.src='/au/common/img/main/profile_hover.png';" onmouseout="this.src='/au/common/img/main/profile.png';"></a>
				<?php if($_SESSION["use"]=="1"){ ?><a style="font-size: 12px;" href="/au_admin">관리자</a> <a style="font-size: 12px;" href="/dbadmin/">DB</a><?php } ?>
				<br>
				<?php $e = fetchAll("select sum(e_add) e_total from AU_EXP where e_player = $AU"); ?>
				<img src="/au/common/img/main/point.png"><span><?= $_SESSION["au_point"] ?></span>
				<img src="/au/common/img/main/exp.png"><span><?= number_format($e->e_total) ?></span>
			</div>
			<div style="clear: both"></div>
		</div>
		
		<div class="login_btn">
			<a href="/au/index.php/mypage"><img src="/au/common/img/main/data.png"  onmouseover="this.src='/au/common/img/main/data_hover.png';" onmouseout="this.src='/au/common/img/main/data.png';"></a>
		</div>
		<?php } else if($_SESSION["user"]=="1"){ ?>
		<p style="text-align: center; margin-top: 30px;">등록된 플레이어가 없습니다.</p>
		<?php } else { ?>
		<form action="/au/index.php/ok/auth/login" method="post">
			<div class="login_input">
				<input type="text" id="id" name="id" placeholder="ID">
				<br>
				<input type="password" id="pw" name="pw" placeholder="PASSWORD">
			</div>
			<div class="login_btn">
				<button><img src="/au/common/img/main/login.png"  onmouseover="this.src='/au/common/img/main/login_hover.png';" onmouseout="this.src='/au/common/img/main/login.png';"></button>
			</div>
		</form>	
		<?php } ?>
		<div class="main_logo">
			<img src="/au/common/img/main/logo.png">
		</div>
	</div>
	<div class="main_box_3 box">
		<ul>
			<?php foreach(query("select * from AU_BOARD order by b_no desc limit 0,5") as $row){ ?>
			<li><a href="/au/index.php/board/view/<?= $row->b_no ?>"><?= $row->b_title ?></a></li>
			<?php } ?>
		</ul>
	</div>
	<div class="main_box_4 box">
		<a  href="https://docs.google.com/document/d/18hUOeAnLxFap9P8qe4hmedwqGM_UD6_ySHF5qparous/edit?usp=sharing"><img src="/au/common/img/main/qna.png"  onmouseover="this.src='/au/common/img/main/qna_hover.png';" onmouseout="this.src='/au/common/img/main/qna.png';"></a>
	</div>
</div>

<style>
	body { background:url('/au/common/img/main_back.png'); }
</style>
<script>
	//alert($(".slide ul li img").length)

	$(".main_btn a").on("mouseover",function(){
		$(this).children("img").css("opacity","0");
	})
	
	$(".main_btn a").on("mouseleave",function(){
		$(this).children("img").css("opacity","100");
	})
</script>
