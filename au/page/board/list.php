<div class="sub">
	<div class="board">
		<div class="board_text">
			<img src="/au/common/img/board/board_text.png">
		</div>
		<div class="board_list">
			<table>
				<colgroup>
					<col width="10%">
					<col width="70%">
					<col width="20%">
					
				</colgroup>
				<tr>
					<th>NO</th>
					<th>TITLE</th>
					<th>DATE</th>
				</tr>
				<?php 
					foreach(query("select * from AU_BOARD") as $row){
				?>
				<tr>
					<td><?= $row->b_no ?></td>
					<td style="text-align: left;"><a href="/au/index.php/board/view/<?= $row->b_no ?>"><?= $row->b_title ?></td>
					<td><?= $row->b_date ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
<style>
	body { background: url('/au/common/img/board/board_back.png'); }
</style>