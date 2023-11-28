<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-money"></i> 요청중인 정산 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th>NO</th>
			<th>캐릭터</th>
			<th>정산금액</th>
			<th>조사내용</th>
			<th>아이템</th>
			<th>승인</th>
		</tr>
		<?php foreach(query("select * from POINT_CAL where pc_type = 1 and pc_ok_date is NULL") as $row){ ?>
		<tr>
			<td><?= $row->pc_no ?></td>
			<td><?= $PLAYER[$row->pc_player] ?></td>
			<td><?= $row->pc_price ?> 花</td>
			<td><?= $row->pc_text ?></td>
			<td><?php $item = explode(",",$row->pc_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1] .") ";} ?></td>
			<td><a href="/admin/index.php/ok/point/event_ok/<?= $row->pc_no ?>">승인</a></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-money"></i> 조사 정산 내역 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th>NO</th>
			<th>캐릭터</th>
			<th>정산금액</th>
			<th>조사내용</th>
			<th>아이템</th>
			<th>승인일</th>
		</tr>
		<?php foreach(query("select * from POINT_CAL where pc_type = 1 and pc_ok_date is not NULL") as $row){ ?>
		<tr>
			<td><?= $row->pc_no ?></td>
			<td><?= $PLAYER[$row->pc_player] ?></td>
			<td><?= $row->pc_price ?> 花</td>
			<td><?= $row->pc_text ?></td>
			<td><?php $item = explode(",",$row->pc_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1] .") ";} ?></td>
			<td><?= $row->pc_ok_date ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	

<!-- Modal -->
<div class="modal fade" id="give_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/index.php/ok/item/addGet" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">아이템 지급</h5>
			</div>
			
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">캐릭터</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="player" name="player">
							<?php for($i=1; $i<50; $i++ ){ if(isset($PLAYER[$i])){ ?>
								<option value="<?= $i ?>"><?= $PLAYER[$i] ?></option>
							<?php }} ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">아이템</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item" name="item">
								<?php for($i=1; $i<50; $i++ ){ if(isset($ITEM[$i])){ ?>
								<option value="<?= $i ?>"><?= $ITEM[$i] ?></option>
							<?php }} ?>
						</select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">사유</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="content" name="content" required></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="addGet" value="추가">추가</button>
			</div>
		</div>
		</form>
	</div>
</div>

<style>
	select { margin-bottom: 10px;}
</style>
<script type="text/javascript">
	function confirmDelete(url) {
		if( confirm('정말 삭제하시겠습니까?') ) {
			location.href = url;
		}
	}
</script>