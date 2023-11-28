<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 의뢰 승인 대기</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>의뢰인</th>
				<th>제목</th>
				<th>내용</th>
				<th>보수</th>
				<th>날짜</th>
				<th>승인</th>
			</tr>
			<?php foreach(query("select * from REQUEST where q_type = 1") as $row){ ?>
			<tr>
				<td><?= $row->q_no ?></td>
				<td><?= $PLAYER[$row->q_player] ?></td>
				<td><a href="/admin/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
				<td style="text-align: left"><?= $row->q_content ?></td>	
				<td><?= $row->q_price ?> 花 / <?= $ITEM[$row->q_item] ?></td>
				<td><?= $row->q_date ?></td>
				<td><a href="/admin/index.php/ok/quest/okQuest/<?= $row->q_no ?>">승인</a></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 의뢰 수락 대기 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>제목</th>
				<th>의뢰인</th>
				<th>날짜</th>
			</tr>
			<?php foreach(query("select * from REQUEST where q_type = 2") as $row){ ?>
			<tr>
				<td><?= $row->q_no ?></td>
				<td><a href="/admin/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
				<td><?= $PLAYER[$row->q_player] ?></td>
				<td><?= $row->q_date ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	

<style>
	select, textarea { margin-bottom: 10px;}
</style>