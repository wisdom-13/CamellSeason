 <div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 프로필 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/au_admin/index.php/player/write">프로필 등록</a>
		<a style="margin-right: 10px;" class="btn btn-info btn-xs side_btn" href="/au_admin/index.php/player/state">스텟 등록</a>
	</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>원어</th>
				<th>나이</th>
				<th>등급</th>
				<th>능력</th>
				<th>HP</th>
				<th>STR</th>
				<th>CON</th>
				<th>ESP</th>
				<th>팀</th>
				<th>포지션</th>
				<th>상태</th>
			</tr>
			<?php foreach(query("SELECT * FROM AU_PLAYER, AU_STATE where s_player = p_no") as $row){?>
			<tr>
				<td><?= $row->p_no;?></td>
				<td><a href="/au_admin/index.php/player/view/<?= $row->p_no;?>"><?php echo $row->p_name;?></a></td>
				<td><?= $row->p_name_j;?></td>
				<td><?= $row->p_age;?></td>
				<td><?= $row->p_grade;?></td>
				<td><?= $row->p_ability_name;?></td>
				<td><?= $row->s_hp ?></td>
				<td><?= $row->s_str ?></td>
				<td><?= $row->s_con ?></td>
				<td><?= $row->s_esp ?></td>
				<td><?= $TEAM[$row->p_team] ?></td>
				<td><?= $POSITION[$row->p_position] ?></td>
				<td><?= $YN[$row->p_use];?></td>
			</tr>
			<?php } //end foreach?>
			
		</table>
	</div>
</div>