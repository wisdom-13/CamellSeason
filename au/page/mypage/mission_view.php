<?php $row = fetchAll("select * from AU_MISSION where mi_no = $val1"); ?>
<div class="sub">
	<div class="board">
		<div class="board_text" style="margin-top: -30px;">
			<img src="/au/common/img/board/mission_title.png">
		</div>
		<div class="board_title">
			<?= $row->mi_title?>
		</div>
		<div class="board_content" >
			<p style="height: 470px; overflow: scroll"><?= nl2br($row->mi_content)?></p>
		</div>
		<a class="board_btn" href="/au/index.php/mypage/mission"><img src="/au/common/img/board/btn_list.png"  onmouseover="this.src='/au/common/img/board/btn_list_hover.png';" onmouseout="this.src='/au/common/img/board/btn_list.png';"></a>
	</div>
</div>
<style>
	body { background: url('/au/common/img/board/board_back.png'); }
	.board { margin-top: 50px;}
</style>