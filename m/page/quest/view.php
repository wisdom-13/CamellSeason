<?php $row = fetchAll("select * from REQUEST where q_no = '{$val1}'"); ?>

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b><?= $row->q_title ?></b></div>
				<div class="card-body">
					<?= nl2br($row->q_content) ?><br><br>의뢰인 : <?= $PLAYER[$row->q_player] ?><br>수행인 : <?= $PLAYER[$row->q_player_to] ?><br>완료일 : <?= $row->q_date_end ?><br>
	보상 : <?= $row->q_price ?>花, <?= $ITEM[$row->q_item] ?>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
</style>