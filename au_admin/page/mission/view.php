<?php $view = fetchAll("SELECT * FROM AU_MISSION where mi_no='{$val1}'") ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 임무</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered">
			<tr>
				<th><?= $view->mi_no; ?></th>
				<th><?= $view->mi_title; ?></th>
				<th><?= $view->mi_start; ?> ~ <?= $view->mi_end; ?></th>
			</tr>
			<tr>
				<td colspan="3" height="300px;" style="vertical-align: top"><?= $view->mi_content; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<a class="btn btn-info btn-xs side_btn" href="/au_admin/index.php/mission/list">목록</a>
	</div>
</div>	

<style>
	table tr td { text-align: left; padding-bottom: 300px; }
	button { margin-left: 5px; }
</style>