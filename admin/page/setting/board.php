<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-image"></i> 게시판 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/admin/index.php/setting/write">프로필 등록</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>URL</th>
				<!--<th></th>-->
			</tr>
			<?php foreach(query("SELECT * FROM BOARD order by b_no desc") as $row){?>
			<tr>
				<td><?= $row->b_no;?></td>
				<td style="text-align: left; "><a href="/admin/index.php/setting/view/<?= $row->b_no;?>"><?= $row->b_title;?></a></td>
				<td><?= $row->b_date;?></td>
				<!--<td><input type="checkbox" name="chk"></td>-->
			</tr>
			<? } ?>
		</table>
	</div>
</div>