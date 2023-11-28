<?php $row = fetchAll("select * from STORY where s_no = $val1"); ?>
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 도서관 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a href="/admin/index.php/system/s_update/<?= $val1 ?>" class="btn btn-danger btn-xs side_btn">수정</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th><?= $row->s_act ?>막 <?= $row->s_chapter ?>장 <?= $row->s_title ?></th>	
		</tr>
		<tr>
			<td style="text-align: left"<?= nl2br($row->s_content) ?></td>
		</tr>
	</table>
	</div>
</div>	