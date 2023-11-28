 <div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 숙련도 / 포인트 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#give_item">지급</button>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>획득처</th>
				<th>수치</th>
				<th>날짜</th>
			</tr>
			<?php foreach(query("SELECT * FROM AU_EXP order by e_no desc limit 100") as $exp){?>
			<tr>
				<td><?= $exp->e_no;?></td>
				<td><?= $PLAYER[$exp->e_player];?></td>
				<td><?= $exp->e_info;?></td>
				<td><?= $exp->e_add;?></td>
				<td><?= $exp->e_date;?></td>
			</tr>
			<?php } //end foreach?>
			
		</table>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>획득처</th>
				<th>타입</th>
				<th>금액</th>
				<th>날짜</th>
			</tr>
			<?php foreach(query("SELECT * FROM AU_POINT order by po_no desc limit 100") as $point){?>
			<tr>
				<td><?= $point->po_no;?></td>
				<td><?= $PLAYER[$point->po_player];?></td>
				<td><?= $point->po_info;?></td>
				<td><?= $point->po_type;?></td>
				<td><?= $point->po_price;?></td>
				<td><?= $point->po_date;?></td>
			</tr>
			<?php } //end foreach?>
			
		</table>
	</div>
</div>

<div class="modal fade bs-example-modal-lg" id="give_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/au_admin/index.php/ok/player/addPoint" enctype="multipart/form-data" method="post" id="form1" runat="server">
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
						<input class="form-control" type="number" name="point" placeholder="POINT">
						<input class="form-control" type="number" name="exp" placeholder="EXP">
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