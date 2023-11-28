<div class="sub">
	<div class="board">
		<div class="board_list">
			<table>
				<colgroup>
					<col width="10%">
					<col width="50%">
					<col width="30%">
					<col width="10%">
				</colgroup>
				<tr>
					<th>NO</th>
					<th>TITLE</th>
					<th><?= ($val1=="1") ? "SENDER" : "RECIPIENT" ?></th>
					<th>DATE</th>
				</tr>
			</table>
			<div style="height: 600px; overflow: scroll; margin-bottom: 10px;">
				<table>
					<colgroup>
						<col width="10%">
						<col width="50%">
						<col width="30%">
						<col width="10%">
					</colgroup>
					<?php 
						$sr = ($val1=="2") ? "from" : "to";
						$sr2 = ($val1=="2") ? "l_to" : "l_from";
						foreach(query("select * from AU_LETTER where l_$sr=$AU") as $row){
					?>
					<tr>
						<td><?= $row->l_no ?></td>
						<td style="text-align: left;"><a href="/au/index.php/mypage/letter_view/<?= $val1 ?>/<?= $row->l_no ?>"><?= $row->l_title ?></td>
						<td><?= $PLAYER[$row->$sr2] ?></td>
						<td><?= $row->l_date ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
		<div style="float: right; margin-top: 10px;">
			<?php if($val1=="1"){?>
			<a href="/au/index.php/mypage/letter_list/2"><img src="/au/common/img/letter/receive.png" onmouseover="this.src='/au/common/img/letter/send_hover.png';" onmouseout="this.src='/au/common/img/letter/receive.png';"></a>
			<?php } else { ?>
			<a href="/au/index.php/mypage/letter_list/1"><img src="/au/common/img/letter/send.png" onmouseover="this.src='/au/common/img/letter/send_hover.png';" onmouseout="this.src='/au/common/img/letter/send.png';"></a>
			<?php } ?>
			<a href="/au/index.php/mypage/letter_write"><img src="/au/common/img/letter/write.png" onmouseover="this.src='/au/common/img/letter/write_hover.png';" onmouseout="this.src='/au/common/img/letter/write.png';"></a>
		</div>
	</div>
</div>
<style>
	body { background: url('/au/common/img/board/board_back.png'); }
</style>