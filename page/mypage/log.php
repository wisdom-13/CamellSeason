<div class="log_add_page">
	<form action="/index.php/ok/mypage/log_add" method="post" enctype="multipart/form-data">
		<label><input value="img" type="radio" name="type" checked> 이미지첨부</label>
		<label><input value="url" type="radio" name="type"> 외부링크</label>
		<input class="log_file" type="file" name="file">
		<input class="log_link" type="text" name="link" placeholder="링크를 입력해주세요.">
		<button type="submit"><img src="/common/img/profile/mypage/btn_log_hover.png"></button>
		<button class="log_back" type="button"><img src="/common/img/profile/mypage/btn_log_back.png"></button>
	</form>
</div>

<style>
	.content { width: 803px;}
	.log_add_page { background: url('/common/img/profile/mypage/log_back.png'); width: 803px; height: 376px; position: absolute; z-index: 500; top: 50%; left: 50%; margin-top: -188px; margin-left: -401px; padding: 120px 60px; display: none; }
	.log_add_page label { margin: 10px 20px 20px 0;}
	.log_add_page button { background: none; border: none; margin-top: 20px; text-align: left; }
	.log_file { display: block;  background: rgba(255,255,255,0.3);  width: 620px; height: 30px;}
	.log_link { background: rgba(255,255,255,0.3); border: none; display: none; width: 620px; height: 30px; padding: 2px 5px; }
</style>
<script>
	$(document).ready(function(){
		$(".join_back").stop().slideToggle(1000);
		$(".log_add_page").stop().slideToggle(1000);
		
		$("input[type=radio]").on("click",function(){
			if($(this).val() == "img"){
				$(".log_file").css("display","block").attr("required",true);
				$(".log_link").css("display","none").attr("required",false);
			} else {
				$(".log_file").css("display","none").attr("required",false);
				$(".log_link").css("display","block").attr("required",true);
			}
			
		})
		
		$(".log_back").on("click",function(){
			$(".join_back").stop().slideToggle(1000);
			$(".re_add_page").stop().slideToggle(1000);
			location.href='/index.php/mypage';
		});
	});
</script>