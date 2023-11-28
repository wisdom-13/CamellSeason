<?php $row = fetchAll("select * from BOARD where b_no = '{$val1}'"); ?>

<div class="board_title"><?= $row->b_title ?></div>

<div class="board_content">
	<div><?= nl2br($row->b_content) ?></div>
</div>

<a href="/index.php/board" style="text-align: center; display: block">
<img src="/common/img/board/board_btn.png" onmouseover="this.src='/common/img/board/board_btn_hover.png';" onmouseout="this.src='/common/img/board/board_btn.png';">
</a>


<style>
	.content { padding:0; }
	.board_title { background: url('/common/img/board/board_title.png'); width: 701px; height: 71px; margin-bottom: 20px;color: #fff; text-align: center; padding-top: 32px; opacity: 0.8; margin-top: 60px; }
	.board_content { background: url('/common/img/board/board_content.png'); width: 840px; height: 505px; margin-bottom: 20px; padding: 50px 100px; }
	.board_content div { width: 600px; height: 430px; overflow: scroll;  }
</style>
