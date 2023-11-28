<div class="re_add_page">
	<form action="/index.php/ok/mypage/re_add" method="post">
		<img style="margin-left: -5px" src="/common/img/profile/view/re_top.png">
		<div class="p_re profile_box">
			<div class="re_box">
				<div class="re_head">
					<img width="140px;" src="/common/img/profile/view/mob_head.png">
					<div class="re_name">
						<select id="name" name="name">
							<option value="0">이름</option>
							<?php foreach(query("select * from MEMBER, PLAYER where m_player3 = p_no") as $row){ ?>
							<option value="<?= $row->m_no ?>" data-no="<?= $row->p_no ?>"><?= $PLAYER[$row->m_no] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="re_text">
					<input type="text" name="title" placeholder="관계명"><br>
					<textarea name="content" placeholder="관계를 작성해주세요."></textarea>
				</div>
			</div>
			<button type="submit"><img src="/common/img/profile/mypage/btn_re_hover.png"></button>
			<button class="re_back" type="button"><img src="/common/img/profile/mypage/btn_back.png"></button>
			<div style="clear: both"></div>
		</div>
		<img style="margin: -30px 0 0 -5px;" src="/common/img/profile/view/re_bottom.png">
		
	</form>
</div>

<style>
	.re_add_page { display: none; position: absolute; z-index: 500; top: 50%; left: 50%; margin-top: -152px; margin-left: -384px; }
	.re_add_page button { background: none; border: none; float: right; margin-right: 5px; margin-bottom: 10px; }
	.p_re { margin-top: -50px; background: #6c6c6d; padding: 20px; width: 730px }
	.re_box { width: 700px; padding: 10px; height: 200px; color: rgba(255,255,255,0.8); }
	.re_head { width: 150px; float: left; margin-right: 20px; }
	.re_head img { border-radius: 100px; border:5px solid #851210; background: #fff; margin-bottom: 10px; }
	.re_name { text-align: center; background: #851210; width: 140px;}
	.re_name select { background: none; border: none; color: #fff; }
	.re_text { width: 500px; float: left; }
	.re_text input { width: 100%; color:#fff; background: rgba(255,255,255,0.2); border: none; margin: 10px 0; height: 25px; padding: 10px; }
	.re_text textarea { width: 100%; font-size: 13px; height: 130px; background: rgba(255,255,255,0.2); border: none; padding: 10px; color: #fff; }
</style>
<script>
	$(document).ready(function(){
		$(".join_back").stop().slideToggle(1000);
		$(".re_add_page").stop().slideToggle(1000);
		
		$(".re_back").on("click",function(){
			$(".join_back").stop().slideToggle(1000);
			$(".re_add_page").stop().slideToggle(1000);2
			location.href='/index.php/mypage/list/2';
		});
		
		$("#name").on("change",function(){
			selected = $(this).find('option:selected');
			val = selected.data('no'); 
			$(".re_head img").attr("src","/admin/common/img/profile/3/head/"+val+".png");
		})
		
	});
</script>