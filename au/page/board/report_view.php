<?php $row = fetchAll("select * from AU_REPORT where b_no = $val1"); ?>
<div class="sub">
	<div class="board">
		<div class="board_text" style="margin-top: -30px;">
			<img src="/au/common/img/board/report_title.png">
		</div>
		<div class="board_title">
			<?= $row->b_title?>
		</div>
		<div class="board_content">
			<?= nl2br($row->b_content)?>
		</div>
		<a class="board_btn" href="/au/index.php/board"><img src="/au/common/img/board/btn_list.png"  onmouseover="this.src='/au/common/img/board/btn_list_hover.png';" onmouseout="this.src='/au/common/img/board/btn_list.png';"></a>
	</div>
</div>
<style>
	body { background: url('/au/common/img/board/board_back.png'); }
</style>