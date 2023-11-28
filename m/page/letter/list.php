<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">서신함 - 받은서신</h4>
					<a href="/m/index.php/letter/send">보낸서신</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<thead class=" text-primary">
								<th class="text-center">번호</th>
								<th>제목</th>
								<th>보낸이</th>
							</thead>
							<tbody>
							<?php 
							foreach(query("select * from LETTER where l_to = '{$_SESSION['no']}'") as $row) { $i++ ?>
							<tr <?= ($row->l_read=="2") ? "style='color: #772a2a;'" : "" ?>>
								<td class="text-center"><?= $i ?></td>
								<td style="text-align: left; padding-left: 10px;"><a style="color: #000" href="/m/index.php/letter/view/<?= $row->l_no ?>"><?= $row->l_title ?></a></td>
								<td><?= $PLAYER[$row->l_from] ?></td>
							</tr>
							<?php } ?>                    
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	th { font-size: 14px !important; }
	td { font-size: 12px !important; }
</style>