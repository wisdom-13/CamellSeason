<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 보유현황 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#give_item">지급</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>아이템</th>
				<th>획득경로</th>
				<th>획득날짜</th>
				<th>사용경로</th>
				<th>사용날짜</th>
			</tr>
			<?php foreach(query("select * from AU_INVENTORY ii, AU_ITEM i where i.i_no = ii.in_item order by ii.in_no desc limit 500") as $row) {?>
			<tr>
				<td><?= $row->in_no ?></td>
				<td><?= $PLAYER[$row->in_player] ?></td>
				<td><img src="/au/common/img/item/<?= $row->i_name ?>.png" width="25px"> <?= $row->i_name ?></td>
				<td><?= $row->in_get_info ?></td>
				<td><?= $row->in_get_date ?></td>
				<td><?= $row->in_use_info ?></td>
				<td><?= $row->in_use_date ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="give_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/au_admin/index.php/ok/item/addGet" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">포인트/숙련도 지급</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="all"> 전체
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; border-top: #eee solid 1px; padding-top: 20px;">
						<?php foreach(query("select * from MEMBER where m_au is not NULL") as $row){ ?>
						<label>
							<input type="checkbox" name="player[]" value="<?= $row->m_au ?>"><?= $row->m_name ?>
						</label>
						<?php } ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12"> 
						<select class="form-control" name="item">
							<option value="0">-- 아이템 --</option>
							<?php foreach(query("select * from AU_ITEM order by i_name asc") as $row) {?>
								<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
							<?php } ?>
						</select>
						<input class="form-control" type="number" name="num" value="1">
						<textarea class="form-control" id="content" name="info" placeholder="내용" required></textarea><br>
					</div>
				</div>	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="addGet" value="추가">지급</button>
			</div>
		</div>
		</form>
	</div>
</div>
<style>
	select,input { margin-bottom: 10px; margin-right: 10px;}
	label { width: 180px;}
	button {margin-top: 30px;}
</style>
<script>
	$("input[type=radio]").on("click",function(){
		var chk = $(this).val();
		var arrChk = chk.split("_"); 
		$('input:checkbox[name="player[]"]').each(function() {
			this.checked = false;
			if($(this).data(arrChk[0]) == arrChk[1]){ this.checked = true; }
		});
	})
</script>