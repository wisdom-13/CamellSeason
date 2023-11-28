
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"> 도서관</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
								<?php foreach(query("select * from STORY") as $row){ ?>
								<tr>
									<td style="text-align: left"><?= $row->s_act ?>막 <?= $row->s_chapter ?>장 </td>
									<td><a href="/m/index.php/book/view/<?= $row->s_no ?>"><?= $row->s_title ?></a></td>
								</tr>
								<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>