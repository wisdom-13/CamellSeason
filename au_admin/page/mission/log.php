<?php $mission = fetchAll("select * from AU_MISSION where mi_no = $val1"); ?>
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-image"></i> <?= $mission->mi_title ?> </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/au_admin/index.php/ok/mission/all_mission/<?= $mission->mi_no ?>">일괄 승인</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>PLAYER</th>
				<th>LOG</th>
				<th>DATE</th>
				<th>OK DATE</th>
				<!--<th></th>-->
			</tr>
			<?php foreach(query("SELECT * FROM AU_MISSION_LOG where ml_mission = $val1") as $row){?>
			<tr>
				<td><?= $row->ml_no;?></td>
				<td><?= $PLAYER[$row->ml_player];?></td>
				<td style="text-align: left; "><a href="<?= $row->ml_content ?>"><?= $row->ml_content ?></a></td>
				<td><?= $row->ml_date;?></td>
				<td><?= $row->ml_ok_date;?></td>
				<!--<td><a>승인</a></td>-->
			</tr>
			<? } ?>
		</table>
	</div>
</div>