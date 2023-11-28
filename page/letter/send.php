<div class="table_title"><img src="/common/img/letter/letter_title.png"></div>

<table class="table" style="margin-top: 20px; ">
	<colgroup>
		<col width="10%">
		<col width="55%">
		<col width="20%">
		<col width="15%">
	</colgroup>
	<tr>
		<th>번호</th>
		<th>제목</th>
		<th>받는이</th>
		<th>날짜</th>
	</tr>
</table>
<div style="height: 500px; margin-bottom: 10px;" class="table_content">
<table class="table">
	<colgroup>
		<col width="10%">
		<col width="55%">
		<col width="20%">
		<col width="15%">
	</colgroup>
	<?php 
	$query = "select * from LETTER where l_from = '{$_SESSION['no']}' order by l_no desc";
	$i = rowAll($query)+1;
	foreach(query($query) as $row) { $i-- ?>
	<tr <?= ($row->l_read=="2") ? "style='color: #772a2a;'" : "" ?>>
		<td><?= $i ?></td>
		<td style="text-align: left; padding-left: 10px;"><a href="/index.php/letter/view/<?= $row->l_no ?>"><?= $row->l_title ?></a></td>
		<td><?= $PLAYER[$row->l_to] ?></td>
		<td><?= $row->l_date ?></td>
	</tr>
	<?php } ?>
</table></div>

<a href="/index.php/letter/write"><img class="letter_btn" src="/common/img/letter/write_hover.png" onmouseover="this.src='/common/img/letter/write.png';" onmouseout="this.src='/common/img/letter/write_hover.png';"></a>
<a href="/index.php/letter/list" ><img style="margin-right: 10px;" class="letter_btn" src="/common/img/letter/list.png" onmouseover="this.src='/common/img/letter/list_hover.png';" onmouseout="this.src='/common/img/letter/list.png';"></a>

<style>
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/letter/letter_back.png'); background-repeat: no-repeat; }
	.content_top, .content_bottom { display: none; }

</style>

