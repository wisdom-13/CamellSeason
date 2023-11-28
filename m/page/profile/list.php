<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>잠재능력반</b></div>
				<div class="card-body ">
					<?php foreach(query("select * from PLAYER where p_class = 1 and p_age = 3") as $row){ ?>
						<a href="/m/index.php/profile/list/view/<?= $row->p_no ?>"><img width="150px" src="/admin/common/img/profile/3/head/<?= $row->p_no ?>.png"></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>체질반</b></div>
				<div class="card-body ">
					<?php foreach(query("select * from PLAYER where p_class = 2 and p_age = 3") as $row){ ?>
						<a href="/m/index.php/profile/list/view/<?= $row->p_no ?>"><img width="150px" src="/admin/common/img/profile/3/head/<?= $row->p_no ?>.png"></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>기술반</b></div>
				<div class="card-body ">
					<?php foreach(query("select * from PLAYER where p_class = 3 and p_age = 3") as $row){ ?>
						<a href="/m/index.php/profile/list/view/<?= $row->p_no ?>"><img width="150px" src="/admin/common/img/profile/3/head/<?= $row->p_no ?>.png"></a>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>특별능력반</b></div>
				<div class="card-body ">
					<?php foreach(query("select * from PLAYER where p_class = 4 and p_age = 3") as $row){ ?>
						<a href="/m/index.php/profile/list/view/<?= $row->p_no ?>"><img width="150px" src="/admin/common/img/profile/3/head/<?= $row->p_no ?>.png"></a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>


<style>
	img { margin-bottom: 10px; }
</style>