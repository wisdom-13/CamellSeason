<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-image"></i> 임무 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/au_admin/index.php/mission/write">임무 등록</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>DATE</th>
				<th>LOG</th>
			</tr>
			<?php foreach(query("SELECT * FROM AU_MISSION") as $row){?>
			<tr>
				<td><?= $row->mi_no;?></td>
				<td style="text-align: left; "><a href="/au_admin/index.php/mission/view/<?= $row->mi_no;?>"><?= $row->mi_title;?></a></td>
				<td><?= $row->mi_start;?> ~ <?= $row->mi_end;?></td>
				<td><a href="/au_admin/index.php/mission/log/<?= $row->mi_no ?>">보고서</a></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>