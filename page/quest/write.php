<div class="table_title"><img src="/common/img/quest/quest_title.png"></div>
<form class="quest_write" method="post" action="/index.php/ok/quest/quest_write">
<div class="letter_tit">
	<input style="width: 100%" type="text" name="title" id="title" placeholder="제목을 입력하세요." required>
</div>
<div class="letter_content">
	<textarea style="width: 100%;" name="content" id="content" placeholder="내용을 입력하세요." required></textarea>
</div>

<button class="letter_btn"><img src="/common/img/quest/btn_write.png" onmouseover="this.src='/common/img/quest/btn_write_hover.png';" onmouseout="this.src='/common/img/quest/btn_write.png';"></button>
<a class="letter_btn" href="/index.php/quest">
<img style="margin-right: 10px;" src="/common/img/quest/btn_list.png" onmouseover="this.src='/common/img/quest/btn_list_hover.png';" onmouseout="this.src='/common/img/quest/btn_list.png';">
</a>
</form>
<style>
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/letter/letter_back.png'); background-repeat: no-repeat;}
	.content_top, .content_bottom { display: none; }
	.letter_content { background: url('/common/img/quest/quest_content.png'); height: 468px; margin-bottom: 20px;}
	button { border: none; background: none; }
</style>
