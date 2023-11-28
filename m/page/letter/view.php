<?php $row = fetchAll("select * from LETTER where l_no = '{$val1}'"); ?>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<b><?= $row->l_title ?></b>
				</div>
				<div class="card-body">
					<p><?= nl2br($row->l_content) ?></p>
					<p><?= ($_SESSION["no"]==$row->l_to) ? $PLAYER[$row->l_from] : $PLAYER[$row->l_to] ?> | <?= $row->l_date ?></p>
				</div>
			</div>
		</div>
		
		<?php if(!$row->l_item==""){ ?>
		<div class="col-md-12">
			<div class="card">
			<!--받은 편지-->
			<?php if($_SESSION["no"]==$row->l_to){ query("update LETTER set l_read = 1 where l_no = '{$val1}'") ?> 
			<div class="card-body">
				<b>받은 물건</b>
				<div style="font-size: 13px;"><?php $item = explode(",",$row->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1] .") ";} ?></div>
			</div>
			<!--보낸 편지-->
			<?php } else if($_SESSION["no"]==$row->l_from){ ?> 
			<div class="card-body">
				<b>보낸 물건</b>
				<div style="font-size: 12px;"><?php $item = explode(",",$row->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1]."), ";} ?></div>
			</div>
			<?php } else { am("잘못된접근입니다.","/index.php/letter"); } ?>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<style>
	th { font-size: 14px !important; }
	td { font-size: 12px !important; }
</style>


