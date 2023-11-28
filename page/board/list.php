<div class="board_title" style="margin-top: 80px;"><img src="/common/img/board/board_list_title.png"></div>
<div class="table_box">
<div class="table_scroll">
<table class="table" style="width: 700px;">
	<colgroup>
		<col width="10%">
		<col width="70%">
		<col width="20%">
	</colgroup>
	<?php 
	foreach(query("select * from BOARD") as $row) { ?>
	<tr>
		<td><?= $row->b_no ?></td>
		<td style="text-align: left; padding-left: 10px;"><a href="/index.php/board/view/<?= $row->b_no ?>"><?= $row->b_title ?></a></td>
		<td><?= $row->b_date ?></td>
	</tr>
	<?php } ?>
</table>
</div>
</div>

<style>
	.content { padding:0; text-align: center; }
	.table_box { background: url('/common/img/board/board_list_content.png'); width: 840px; height: 552px; padding-top: 30px; margin-top: -30px; }
	.table_scroll { height: 500px; overflow:scroll; }
</style>

