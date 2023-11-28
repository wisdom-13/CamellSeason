<div class="sub">
	<div class="board">
		<div class="board_text" style="margin-top: -30px;">
			<img src="/au/common/img/board/mission_title.png">
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
					foreach(query("select * from AU_MISSION") as $row){
				?>
				<tr>
					<td><?= $row->mi_no ?></td>
					<td style="text-align: left;"><a href="/au/index.php/mypage/mission_view/<?= $row->mi_no ?>"><?= $row->mi_title ?></td>
					<td><?= $row->mi_start ?> ~ <?= $row->mi_end ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
<style>
	body { background: url('/au/common/img/board/board_back.png'); }
</style>