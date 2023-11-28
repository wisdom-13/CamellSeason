<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-dashboard"></i> 회원 관리 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>아이디</th>
				<th>AU</th>
				<th>POINT</th>
				<th>권한</th>
			</tr>
			<?php foreach(query("SELECT * FROM MEMBER") as $row){?>
			<tr>
				<td><?= $row->m_no;?></td>
				<td><?= $row->m_name;?></td>
				<td><?= $row->m_id;?></td>
				
				<td><a <?php if(!$row->m_au==""){ ?> href="/au_admin/index.php/player/view/<?= $row->m_au;?>"<?php } ?>><?= $row->m_au;?></a></td>
				<td><?= $row->m_au_point;?></td>
				<td><?= $USER[$row->m_use];?></td>
			</tr>
			<?php } //end foreach?>
		</table>
	</div>
</div>