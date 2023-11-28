<?php $view = fetchAll("SELECT * FROM REQUEST where q_no='{$val1}'") ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 의뢰 내용</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered">
			<tr>
				<th><?= $view->q_no; ?></th>
				<th><?= $view->q_title; ?></th>
				<th><?= $view->q_date; ?></th>
			</tr>
			<tr>
				<td colspan="3">의뢰인 : <?= $PLAYER[$view->q_player]; ?> / 수행인 : <?= $PLAYER[$view->q_player_to]; ?></td>
			</tr>
			<tr>
				<td colspan="3" height="300px;" style="vertical-align: top"><?= $view->q_content; ?></td>
			</tr>
			<tr>
				<td colspan="3">보상 : <?= $view->q_price ?>花 / <?= $ITEM[$view->q_item] ?></td>
			</tr>
		</table>
	</div>
</div>	

<style>
	table tr td { text-align: left; padding-bottom: 300px; }
</style>