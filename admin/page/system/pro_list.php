<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 수련 일지 </h5>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>캐릭터</th>
				<th>단계</th>
				<th>횟수</th>
				<th>금액</th>
			</tr>
			
			<?php for($i=1; $i<50; $i++ ){ if(isset($PLAYER[$i])){ ?>
						
			<?php foreach(query("select pro_player, pro_stage, count(pro_stage) cc, sum(pp_price) ss from PRO p, PRO_PRO pp where p.pro_stage = pp.pp_stage and pro_player='$i' GROUP BY pro_stage order by pro_no") as $row){ ?>
			<tr>
				<td><?= $PLAYER[$row->pro_player] ?></td>
				<td><?= $row->pro_stage ?>단계</td>
				<td><?= $row->cc ?></td>
				<td><?= $row->ss ?></td>
			</tr>
			<? } ?>
			<?php $total = fetchAll("select sum(pp_price) total from PRO p, PRO_PRO pp where p.pro_stage = pp.pp_stage and pro_player='$i' order by pro_no"); if(isset($total->total)){ ?>
			<tr>
				<td colspan="4">총합 : <?= $total->total; ?></td>
			</tr>
			
			<?php }}} ?>
			
		</table>
	</div>
</div>	