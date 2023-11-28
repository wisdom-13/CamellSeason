<?php $view = fetchAll("SELECT * FROM LETTER where l_no='{$val1}'") ?>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 서신 내용</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered">
			<tr>
				<th><?= $view->l_no; ?></th>
				<th><?= $view->l_title; ?></th>
				<th><?= $view->l_date; ?></th>
			</tr>
			<tr>
				<td colspan="3">보낸이 : <?= $PLAYER[$view->l_from]; ?> / 받는이 : <?= $PLAYER[$view->l_to]; ?></td>
			</tr>
			<tr>
				<td colspan="3" height="300px;" style="vertical-align: top"><?= $view->l_content; ?></td>
			</tr>
			<tr>
				<td colspan="3"><?php $item = explode(",",$view->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1] .") ";} ?></td>
			</tr>
		</table>
	</div>
</div>	

<style>
	table tr td { text-align: left; padding-bottom: 300px; }
</style>