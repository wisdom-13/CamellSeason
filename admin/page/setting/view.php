<?php $view = fetchAll("SELECT * FROM BOARD where b_no='{$val1}'") ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 게시글</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered">
			<tr>
				<th><?= $view->b_no; ?></th>
				<th><?= $view->b_title; ?></th>
				<th><?= $view->b_date; ?></th>
			</tr>
			<tr>
				<td colspan="3" height="300px;" style="vertical-align: top"><?= $view->b_content; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_slide">삭제</button>
		<button class="btn btn-primary btn-xs side_btn" data-toggle="modal" data-target="#add_slide">수정</button>
		<button class="btn btn-default btn-xs side_btn" data-toggle="modal" data-target="#add_slide">목록</button>
	</div>
</div>	

<style>
	table tr td { text-align: left; padding-bottom: 300px; }
	button { margin-left: 5px; }
</style>