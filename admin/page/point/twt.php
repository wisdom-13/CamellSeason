<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-money"></i> 요청중인 정산 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn">정산신청</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th>NO</th>
			<th>캐릭터</th>
			<th>정산금액</th>
			<th>현재트윗</th>
			<th>신청날짜</th>
			<th>승인</th>
		</tr>
		<?php foreach(query("select * from POINT_CAL where pc_type = 2 and pc_ok_date is NULL") as $row){ ?>
		<tr>
			<td><?= $row->pc_no ?></td>
			<td><?= $PLAYER[$row->pc_player] ?></td>
			<td><?= $row->pc_price ?> 花</td>
			<td>누적 <?= $row->pc_item ?>트윗</td>
			<td><?= $row->pc_date ?></td>
			<td><a href="/admin/index.php/ok/point/twt_ok/<?= $row->pc_no ?>">승인</a></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-money"></i> 트윗수 정산 내역 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th>NO</th>
			<th>캐릭터</th>
			<th>정산금액</th>
			<th>현재트윗</th>
			<th>신청날짜</th>
			<th>승인일</th>
		</tr>
		<?php foreach(query("select * from POINT_CAL where pc_type = 2 and pc_ok_date is not NULL") as $row){ ?>
		<tr>
			<td><?= $row->pc_no ?></td>
			<td><?= $PLAYER[$row->pc_player] ?></td>
			<td><?= $row->pc_price ?> 花</td>
			<td>누적 <?= $row->pc_item ?>트윗</td>
			<td><?= $row->pc_date ?></td>
			<td><?= $row->pc_ok_date ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	
