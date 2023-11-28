<div style="text-align: center;">
	<div style="margin-top: 26px;"><img src="/common/img/uniform/uniform_title.png"></div>
	<div class="uniform_menu">
		<img title="uniform_1" src="/common/img/uniform/uniform1.png" onmouseover="this.src='/common/img/uniform/uniform1_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform1.png'">
		<img title="uniform_2" src="/common/img/uniform/uniform2.png" onmouseover="this.src='/common/img/uniform/uniform2_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform2.png'">
		<img title="uniform_3" src="/common/img/uniform/uniform3.png" onmouseover="this.src='/common/img/uniform/uniform3_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform3.png'">
 		<img title="uniform_4" src="/common/img/uniform/uniform4.png" onmouseover="this.src='/common/img/uniform/uniform4_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform4.png'">
	</div>

	<div class="uniform_content uniform_1">
		<img src="/common/img/uniform/uniform_1.png">
	</div>
	<div class="uniform_content uniform_2">
		<img src="/common/img/uniform/uniform_2.png">
	</div>
	<div class="uniform_content uniform_3">
		<img src="/common/img/uniform/uniform_3.png" onmouseover="this.src='/common/img/uniform/uniform_3_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform_3.png'">
	</div>
	<div class="uniform_content uniform_4">
		<img src="/common/img/uniform/uniform_4.png">
		
		<div class="uniform_down">
			<a target="_blank" href="/common/img/uniform/동백-뱃지-다운로드용.png"><img src="/common/img/uniform/uniform_btn1.png" onmouseover="this.src='/common/img/uniform/uniform_btn1_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform_btn1.png'"></a>
 			<a target="_blank" href="/common/img/uniform/성화-뱃지-다운로드용.png"><img src="/common/img/uniform/uniform_btn2.png" onmouseover="this.src='/common/img/uniform/uniform_btn2_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform_btn2.png'"></a>
		</div>
	</div>
	<br><br>
</div>
<style>
	.content { padding: 5px; }
	.uniform_menu img { margin: 40px 70px 20px 70px; }
	.uniform_menu img:nth-child(1) { margin-left: 0px}
	.uniform_menu img:nth-child(4) { margin-right: 0px}

	
	.uniform_down { margin-top: -90px; float: right; margin-right: 100px; position: relative; z-index: 1; }
	.uniform_down a { margin: 0 20px;}
	
	.uniform_2, .uniform_3, .uniform_4 { display: none; }
	
	
</style>
<script>
	$(".uniform_menu img").on("click",function(){
		src = $(this).attr("title");
		$("."+src).css("display","block");
		$("."+src).siblings(".uniform_content").css("display","none");
	})
</script>