<?php $row = fetchAll("select * from STORY where s_no = $val1"); ?>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> <?= $row->s_act ?>막 <?= $row->s_chapter ?>장 <?= $row->s_title ?></h4>
				</div>
				<div class="card-header "><?= nl2br($row->s_content) ?></div><br><br>
			</div>
		</div>
		
	</div>
</div>