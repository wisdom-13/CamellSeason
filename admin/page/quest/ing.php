<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 진행중인 의뢰 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>제목</th>
				<th>의뢰인</th>
				<th>수행인</th>
				<th>등록날짜</th>
				<th>완료</th>
			</tr>
			<?php foreach(query("select * from REQUEST where q_type = 3") as $row){ ?>
			<tr>
				<td><?= $row->q_no ?></td>
				<td><a href="/admin/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
				<td><?= $PLAYER[$row->q_player] ?></td>
				<td><?= $PLAYER[$row->q_player_to] ?></td>
				<td><?= $row->q_date ?></td>
				<td><a href="/admin/quest/end/<?= $row->q_no ?>">완료</a></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	