<div style="text-align: center;">
	<div style="margin-top: 26px;"><img src="/common/img/slide/history_title.png"></div>
	<div class="slide_menu">
		<img class="slide_menu_click" title="slide_1" src="/common/img/uniform/uniform1.png" onmouseover="this.src='/common/img/uniform/uniform1_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform1.png'">
 		<img class="slide_menu_click" title="slide_2" src="/common/img/uniform/uniform2.png" onmouseover="this.src='/common/img/uniform/uniform2_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform2.png'">
 		<img class="slide_menu_click" title="slide_3" src="/common/img/uniform/uniform3.png" onmouseover="this.src='/common/img/uniform/uniform3_hover.png'"
 onmouseout="this.src='/common/img/uniform/uniform3.png'">
	</div>

	<div class="slide_content slide_1">
		<a href="/index.php/book/view/1"><img width="750px" src="/common/img/history/story1_1.png"></a>
		<a href="/index.php/book/view/2"><img width="750px" src="/common/img/history/story1_2.png"></a>
		<a href="/index.php/book/view/3"><img width="750px" src="/common/img/history/story1_3.png"></a>
		<a href="/index.php/book/view/4"><img width="750px" src="/common/img/history/story1_4.png"></a>
		<a href="/index.php/book/view/5"><img width="750px" src="/common/img/history/story1_5.png"></a>
		<br><br><br>
		<img width="750px" src="/common/img/history/event1_1.png">
		<a href="/index.php/board/view/4"><img width="750px" src="/common/img/history/event1_2.png"></a>
		<a href="/index.php/board/view/6"><img width="750px" src="/common/img/history/event1_5.png"></a>
		<a href="/index.php/board/view/8"><img width="750px" src="/common/img/history/event1_3.png"></a>
		<a href="/index.php/board/view/11"><img width="750px" src="/common/img/history/event1_4.png"></a>
		<br><br><br>
		<a href="/index.php/board/view/3"><img width="750px" src="/common/img/history/shop1_1.png"></a>
		<a href="/index.php/board/view/7"><img width="750px" src="/common/img/history/shop1_2.png"></a>
	</div>
	<div class="slide_content slide_2">
		<a href="/index.php/book/view/7"><img width="750px" src="/common/img/history/story2_1.png"></a>
		<a href="/index.php/book/view/8"><img width="750px" src="/common/img/history/story2_2.png"></a>
		<a href="/index.php/book/view/11"><img width="750px" src="/common/img/history/story2_3.png"></a>
		<a href="/index.php/book/view/13"><img width="750px" src="/common/img/history/story2_4.png"></a>
		<br><br><br>
		<a href="/index.php/book/view/15"><img width="750px" src="/common/img/history/event2_1.png"></a>
		<a href="/index.php/board/view/15"><img width="750px" src="/common/img/history/event2_2.png"></a>
		<img width="750px" src="/common/img/history/event2_3.png">
		<a href="/index.php/board/view/23"><img width="750px" src="/common/img/history/event2_4.png"></a>
		<br><br><br>
		<a href="/index.php/board/view/3"><img width="750px" src="/common/img/history/shop2_1.png"></a>
	</div>
	<div class="slide_content slide_3">
		<img width="750px" src="/common/img/history/story3_1.png">
		<img width="750px" src="/common/img/history/story3_2.png">
		<img width="750px" src="/common/img/history/story3_3.png">
		<img width="750px" src="/common/img/history/story3_4.png">
		<img width="750px" src="/common/img/history/story3_5.png">
		<img width="750px" src="/common/img/history/story3_6.png">
		<img width="750px" src="/common/img/history/story3_7.png">
		<img width="750px" src="/common/img/history/story3_8.png">
		<img width="750px" src="/common/img/history/story3_9.png">
		<img width="750px" src="/common/img/history/story3_10.png">
	</div>
	<br><br>
</div>
<style>
	.content { padding: 5px; }
	.slide_menu img { margin: 40px 100px 30px 100px; }
	.slide_menu img:nth-child(1) { margin-left: 0px}
	.slide_menu img:nth-child(3) { margin-right: 0px}
	
	.slide_content img { border: 1px solid #aaa; margin-bottom: 10px; }
	.slide_content a img { border: 1px solid #aaa; margin-bottom: 10px; }
	
	.slide_down { margin-top: -90px; float: right; margin-right: 100px; position: relative; z-index: 1; }
	.slide_down a { margin: 0 20px;}
	
	.slide_2, .slide_3 { display: none; }
	
	
</style>
<script>
	$(".slide_menu_click").on("click",function(){
		src = $(this).attr("title");
		$("."+src).css("display","block");
		$("."+src).siblings(".slide_content").css("display","none");
	})
	
	$(".slide_internal").on("mouseover",function(){
		$(this).children("img").css("opacity","0");
	})
	
	$(".slide_internal").on("mouseleave",function(){
		$(this).children("img").css("opacity","100");
	})
	
</script>