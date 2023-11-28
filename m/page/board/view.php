<?php $row = fetchAll("select * from BOARD where b_no = '{$val1}'"); ?>

<div class="content">
	<div class="row">
		<div class="col-md-12">
		<div class="card card">
            <div class="card-header">
				<b><?= $row->b_title ?></b>
			</div>
            <div class="card-body">
            	<?= nl2br($row->b_content) ?>
            </div>
		</div>
		</div>
	</div>
</div>