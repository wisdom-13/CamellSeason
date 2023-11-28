<?php $row = fetchAll("select * from STORY where s_no = $val1"); ?>
<div style="text-align: center;">
	<div style="margin-top: 26px;"><img src="/common/img/book/book_title.png"></div>
	<div class="book_menu">
		<a href="/index.php/book/list"><img title="book_1" src="/common/img/book/book1_open.png"></a>
		<a href="/index.php/book/list2"><img title="book_2" src="/common/img/book/book2_open.png"></a>
		<a href="/index.php/book/list3"><img title="book_3" src="/common/img/book/book3_open.png"></a>
	</div>

	<div class="book_content">
		<div class="content_text">
			<?= nl2br($row->s_content) ?>
		</div>
	</div>
	
	<br><br>
</div>
<style>
	.content { padding: 5px 0; overflow: hidden; }
	.book_menu a { margin: 20px 110px 0 110px; display: inline-block}
	.book_menu a:nth-child(1) { margin-left: 0px}
	.book_menu a:nth-child(3) { margin-right: 0px}
	
	.book_content { background: url('/common/img/book/book_content.png'); margin-top: 8px; padding-top: 50px; padding-bottom: 35px; width: 100%; height: 613px }
	.content_text { width: 780px; height: 420px; overflow: scroll; text-align: left; font-size: 13px; line-height: 180%;}
	
</style>
<script>
	$(".book_menu img").on("click",function(){
		src = $(this).attr("title");
		$("."+src).css("display","block");
		$("."+src).siblings(".book_content").css("display","none");
	})
</script>