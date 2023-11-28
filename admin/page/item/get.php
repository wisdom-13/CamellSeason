<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 보유현황 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>아이템</th>
				<th>획득경로</th>
				<th>획득날짜</th>
				<th>사용경로</th>
				<th>사용날짜</th>
			</tr>
			<?php foreach(query("select * from INVENTORY ii, ITEM i where i.i_no = ii.in_item order by ii.in_no desc limit 500") as $row) {?>
			<tr>
				<td><?= $row->in_no ?></td>
				<td><?= $PLAYER[$row->in_player] ?></td>
				<td><img src="<?= $row->i_img ?>" width="25px"> <?= $row->i_name ?></td>
				<td><?= $row->in_type ?></td>
				<td><?= $row->in_get_date ?></td>
				<td><?= $row->in_type_use ?></td>
				<td><?= $row->in_use_date ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>

