<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 수련장 확률 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a href="/admin/index.php/system/pro_list" class="btn btn-danger btn-xs side_btn">수련 일지</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>단계</th>
				<?php for($i=1; $i<11; $i++){ ?>
				<th><?=$i?>단계</th>
				<? } ?>
			</tr>
			<tr>
				<th>확률</th>
				<td>100%</td>
				<?php foreach(query("SELECT pp_pro from PRO_PRO") as $row){ ?>
				<td><?= $row->pp_pro ?>%</td>
				<?php } ?>
			</tr>
			<tr>
				<th>금액</th>
				<td>0花</td>
				<?php foreach(query("SELECT pp_price from PRO_PRO") as $row){ ?>
				<td><?= $row->pp_price ?>花</td>
				<?php } ?>
			</tr>
			<tr>
				<th>비약</th>
				<td>0개</td>
				<?php foreach(query("SELECT pp_item from PRO_PRO") as $row){ ?>
				<td><?= $row->pp_item ?>개</td>
				<?php } ?>
			</tr>
		</table>
	</div>
</div>	
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 수련 일지 </h5>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>단계</th>
				<th>결과</th>
				<th>수련일</th>
			</tr>
			<?php foreach(query("SELECT * from PRO order by pro_no desc limit 300") as $row){ ?>
			<tr>
				<td><?=$row->pro_no?></td>
				<td><?= $PLAYER[$row->pro_player] ?></td>
				<td><?= $row->pro_stage ?>단계</td>
				<td><?= $YN[$row->pro_yn] ?></td>
				<td><?= $row->pro_date ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	