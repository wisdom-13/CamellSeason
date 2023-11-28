<div style="text-align: center;">
	<div style="margin-top: 26px;"><img src="/common/img/book/book_title.png"></div>
	<div class="book_menu">
		<a href="/index.php/book/list"><img title="book_1" src="/common/img/book/book1.png" ></a>
		<a href="/index.php/book/list2"><img title="book_2" src="/common/img/book/book2.png"></a>
		<a href="/index.php/book/list3"><img title="book_3" src="/common/img/book/book3.png"></a>
	</div>

	<div class="book_content">
		<?php /*
		foreach(query("select * from STORY where s_act = 2") as $row){ 
			if($row->s_yn == "2"){
				?><img src="/common/img/book/book2/lock.png"><?php	
			} else {
				?><a href="/index.php/book/view/<?= $row->s_no ?>"><img src="/common/img/book/book2/list2_1.png"></a><?php
			}
		}*/ ?>
		
		<a href="/index.php/book/view/7"><img src="/common/img/book/book2/list1.png"></a>
		<a href="/index.php/book/view/8"><img src="/common/img/book/book2/list2_1.png"></a>
		<a href="/index.php/book/view/9"><img src="/common/img/book/book2/list2_2.png"></a>
		<a href="/index.php/book/view/10"><img src="/common/img/book/book2/list2_3.png"></a>
		<a href="/index.php/book/view/11"><img src="/common/img/book/book2/list3_1.png"></a>
		<a href="/index.php/book/view/12"><img src="/common/img/book/book2/list3_2.png"></a>
		<a href="/index.php/book/view/13"><img src="/common/img/book/book2/list4_1.png"></a>
		<a href="/index.php/book/view/14"><img src="/common/img/book/book2/list4_2.png"></a>
		<a href="/index.php/book/view/15"><img src="/common/img/book/book2/list6.png"></a>
	</div>
	
	<br><br>
</div>
<style>
	.content { padding: 5px 0; overflow: hidden; }
	.book_menu a { margin: 40px 140px 20px 140px; text-align: center; display: inline-block; }
	.book_menu a:nth-child(1) { margin-left: 0px}
	.book_menu a:nth-child(3) { margin-right: 0px}
	
	.book_content { background: url('/common/img/book/book_back.png'); margin-top: 30px; padding-bottom: 35px; }
	
	.book_content img { margin: 0 15px; }
</style>