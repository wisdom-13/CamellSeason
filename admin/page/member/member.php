<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-dashboard"></i> 회원 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/admin/index.php/member/edit">수정</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>아이디</th>
				<th>소지금</th>
				<th>春</th>
				<th>秋</th>
				<th>冬</th>
				<th>권한</th>
				<th>가입일</th>
			</tr>
			<?php foreach(query("SELECT * FROM MEMBER") as $row){?>
			<tr>
				<td><?= $row->m_no;?></td>
				<td><?= $row->m_name;?></td>
				<td><?= $row->m_id;?></td>
				<td><?= $row->m_point;?> 花</td>
				<td><a <?php if(!$row->m_player=="0"){ ?> href="/admin/index.php/player/view/<?= $row->m_player;?>"<?php } ?>><?= $row->m_player;?></a></td>
				<td><a <?php if(!$row->m_player2=="0"){ ?> href="/admin/index.php/player/view/<?= $row->m_player2;?>"<?php } ?>><?= $row->m_player2;?></a></td>
				<td><a <?php if(!$row->m_player3=="0"){ ?> href="/admin/index.php/player/view/<?= $row->m_player3;?>"<?php } ?>><?= $row->m_player3;?></a></td>
				<td><?= $USER[$row->m_use];?></td>
				<td><?= $row->m_date;?></td>
			</tr>
			<?php } //end foreach?>
		</table>
	</div>
</div>