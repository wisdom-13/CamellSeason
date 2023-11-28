<?php $row = fetchAll("select * from REQUEST where q_no = '{$val1}'"); ?>

<div class="table_title"><img src="/common/img/quest/quest_title.png"></div>

<table class="table">
	<colgroup>
		<col width="80%">
		<col width="20%">
	</colgroup>
	<tr>
		<th style="text-align: left; padding-left:30px;"><?= $row->q_title ?></th>
		<th style="text-align: right; padding-right:30px; "><?= $row->q_date_end ?></th>
	</tr>
</table>
<div class="letter_content">
	<div><?= nl2br($row->q_content) ?><br><br><br>의뢰인 : <?= $PLAYER[$row->q_player] ?><br>수행인 : <?= $PLAYER[$row->q_player_to] ?><br>
	보상 : <?= $row->q_price ?>花 / <?= $ITEM[$row->q_item] ?></div>
</div>

<a href="/index.php/quest">
<img class="letter_btn" src="/common/img/quest/btn_list.png" onmouseover="this.src='/common/img/quest/btn_list_hover.png';" onmouseout="this.src='/common/img/quest/btn_list.png';">
</a>

<style>
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/letter/letter_back.png'); }
	.content_top, .content_bottom { display: none; }
	.letter_content { background: url('/common/img/quest/quest_content.png'); height: 468px; margin-bottom: 20px;}
</style>
