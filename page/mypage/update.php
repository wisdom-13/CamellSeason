<?php if($_SESSION["p3"]=="0"){ move("/index.php/mypage/profile"); return; } ?>

<?php $row = fetchAll("SELECT * FROM PLAYER where p_no ='{$_SESSION['p3']}'"); ?>

<form action="/index.php/ok/mypage/update_profile/<?= $_SESSION["no"] ?>" enctype="multipart/form-data" method="post" id="form1" runat="server">
<div class="profile_word">"<input style="width: 80%; text-align: center" type="text" name="word" placeholder="한마디를 입력해주세요." value="<?= $row->p_word ?>" required>"</div>
<div class="profile_body" style="margin: 20px 0">
	<label style="width: 700px">
		<input type="file" style="display: none" class="form-control" onchange="bodyImg(this);" id="img" name="body">
		<img style="margin: 10px 0; width: 700px; min-height: 300px; line-height: 300px" id="blah" src="/admin/common/img/profile/3/body/<?= $row->p_no ?>.png" alt="이미지를 첨부해주세요. (700x자유)">
	</label>
</div>
	
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
			<label style="width: 250px;">
				<input type="file" style="display: none" class="form-control" onchange="headImg(this);" id="img" name="head">
				<img style="width: 250px; min-height: 250px; line-height: 250px" id="blah2" src="/admin/common/img/profile/3/head/<?= $row->p_no ?>.png" alt="이미지를 첨부해주세요. (300x300)">
			</label>
		</div>
		<div class="mini_text">
			<br>
			<p style="margin-bottom: 10px;">
				이름 : <?= $row->p_name ?> <br>
				나이 : 20세<br>
				성별 : <?= $SEX[$row->p_sex] ?><br>
				생일 : <?= $row->p_brith ?><br>
				신체 : <input type="text" style="color: #fff;" name="hight" placeholder="cm / kg" value="<?= $row->p_hight ?>" required> <br>
			</p>
			<img src="/common/img/profile/view/grade/<?= $row->p_grade ?>.png">
			<img src="/common/img/profile/view/pro/<?= $row->p_pro ?>.png">
		</div>
		<div class="mini_age">
			<img src="/common/img/profile/view/age_1.png" >
			<img src="/common/img/profile/view/age_2.png">
			<img src="/common/img/profile/view/age_3_hover.png">
		</div>
	</div>
	<img class="mini_bottom" style="margin-left: -3px; margin-top: -50px;" src="/common/img/profile/view/mini_bottom.png">
	
	<!--상세 내용-->
	<img style="margin-left: -27px" src="/common/img/profile/view/look.png">
	<div class="profile_box">
		<textarea name="look" placeholder="전신의 유무와 상관없이 최소 3줄 이상 서술해세요." required><?= $row->p_look ?></textarea>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<img style="margin-left: -27px" src="/common/img/profile/view/info.png">
	<div class="profile_box">
		<textarea name="info" placeholder="최소 3줄 이상 서술해주세요. 출처 표기를 한 인용 글, 캐릭터 이입 한마디나 키워드 작성 후 서술도 허용하고 있습니다." required><?= $row->p_info ?></textarea>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<img style="margin-left: -27px" src="/common/img/profile/view/etc.png">
	<div class="profile_box">
		<textarea name="etc" placeholder="기타 이미지가 있을 경우 <img width='이미지 가로 사이즈px(700px이하)' src='이미지 주소'>로 입력해주시기 바라며, 이미지 첨부에 어려움이 있는 경우 총괄계로 문의해주세요." required><?= $row->p_etc ?></textarea>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<img style="margin-left: -27px" src="/common/img/profile/view/hidden.png">
	<div class="profile_box">
		<textarea name="hidden"><?= $row->p_hidden ?></textarea>
	</div>
	<img style="margin-left: -21.5px; margin-top: -20px;" src="/common/img/profile/view/bottom.png">
	<br>
</div>
<button class="profile_submit" type="submit"><img src="/common/img/profile/mypage/update.png" onmouseover="this.src='/common/img/profile/mypage/update_hover.png'" onmouseout="this.src='/common/img/profile/mypage/update.png'"></button>

</form>
<style>
	.content { padding: 0px; text-align: center; }
	
	input, textarea { background: none; border: none; }
	textarea { width: 100%; height: 200px; }
	
	.profile_menu img { margin: 0 35px; }
	.profile_content { width: 750px; position: relative; z-index: 1;}
	.profile_word { background: url("/common/img/profile/view_npc/profile_word.png"); width: 707px; height: 72px; padding: 32px 0; text-align: center; font-size: 14px; font-weight: 900; margin-top: 30px; color: #666;}	
	.profile_btn { float: right; position: relative; z-index: 10;}
	.profile_mini { width: 100%; height: 250px; background: url('/common/img/profile/view/mini_back.png'); margin-top: -20px; }
	.profile_mini div { float: left; }
	.mini_head { padding: 0 10px; width: 300px; }
	.mini_text { width: 280px; color: #fff; text-align: left; padding-top: 25px; font-size: 13px; }
	.mini_age { width: 100px; padding: 40px 0; }
	.mini_age img { padding-bottom: 15px; }
	.profile_box { width: 100%; min-height: 200px; padding: 50px 30px 40px 30px; background: rgba(0,0,0,0.14); margin-top: -110px; clear: both; text-align: left; line-height: 180%; font-size: 13px;  }
	.profile_submit { background: none; border: none; clear: both; margin-bottom: 20px;}
	
</style>

<script>
	function bodyImg(input) { 
		if (input.files && input.files[0]) { 
			var reader = new FileReader(); 
			reader.onload = function (e) { 
				$('#blah').attr('src', e.target.result); 
			} 
			reader.readAsDataURL(input.files[0]); 
		} 
	} 
	function headImg(input) { 
		if (input.files && input.files[0]) { 
			var reader = new FileReader(); 
			reader.onload = function (e) { 
				$('#blah2').attr('src', e.target.result); 
			} 
			reader.readAsDataURL(input.files[0]); 
		} 
	} 
</script>
