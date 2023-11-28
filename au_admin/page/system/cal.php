 <div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 정산 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>현재트윗</th>
				<th>정산 포인트/숙련도</th>
				<th>종류</th>
				<th>정산일</th>
				<th>정산</th>
			</tr>
			<?php foreach(query("SELECT * FROM AU_POINT_CAL where pc_ok_date is NULL") as $point){?>
			<tr>
				<td><?= $point->pc_no;?></td>
				<td><?= $PLAYER[$point->pc_player];?></td>
				<td><?= $point->pc_twt;?></td>
				<td><?= ($point->pc_type=="1") ? $point->pc_total*100 : $point->pc_total*1000;?></td>
				<td><?= ($point->pc_type=="1") ? "포인트" : "숙련도";?></td>
				<td><?= $point->pc_date;?></td>
				<td><a href="/au_admin/index.php/ok/system/cal_ok/<?= $point->pc_no ?>">승인</a></td>
			</tr>
			<?php } //end foreach?>
			
		</table>
	</div>
</div>