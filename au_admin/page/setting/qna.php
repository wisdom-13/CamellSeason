<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-image"></i> 질문 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/admin/index.php/setting/write_q">질문 등록</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>TYPE</th>
				<!--<th></th>-->
			</tr>
			<?php foreach(query("SELECT * FROM QNA order by qn_no desc") as $row){?>
			<tr>
				<td rowspan="2"><?= $row->qn_no;?></td>
				<td style="text-align: left; ">Q. <?= $row->qn_title;?></td>
				<td rowspan="2"><?= $row->qn_type;?></td>
				<!--<td><input type="checkbox" name="chk"></td>-->
			</tr>
			<tr>
				<td style="text-align: left; ">A. <?= nl2br($row->qn_content)?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>