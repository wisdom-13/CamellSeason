 <div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 프로필 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/admin/index.php/player/write">프로필 등록</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>원어</th>
				<th>나이</th>
				<th>반</th>
				<th>등급</th>
				<th>단계</th>
				<th>신체</th>
				<th>생일</th>
				<th>츠보미</th>
				<th>상태</th>
			</tr>
			<?php foreach(query("SELECT * FROM PLAYER ") as $row){?>
			<tr>
				<td><?= $row->p_no;?></td>
				<td><a href="/admin/index.php/player/view/<?= $row->p_no;?>"><?php echo $row->p_name;?></a></td>
				<td><?= $row->p_name_j;?></td>
				<td><?= $AGE[$row->p_age];?></td>
				<td><?= $CLASS[$row->p_class];?></td>
				<td><?= $GRADE[$row->p_grade];?></td>
				<td><?= $row->p_pro?>단계</td>
				<td><?= $row->p_hight;?></td>
				<td><?= $row->p_brith;?></td>
				<td><?= $row->p_avility_name;?></td>
				<td><?= $YN[$row->p_use];?></td>
			</tr>
			<?php } //end foreach?>
			
		</table>
	</div>
</div>