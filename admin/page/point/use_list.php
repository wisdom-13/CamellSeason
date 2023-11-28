<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-money"></i> 이용내역 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#give_item">화/아이템 지급</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th>NO</th>
			<th>캐릭터</th>
			<th>금액</th>
			<th>설명</th>
			<th>타입</th>
			<th>날짜</th>
		</tr>
		<?php foreach(query("select * from POINT order by po_no desc limit 300") as $row){ ?>
		<tr>
			<td><?= $row->po_no ?></td>
			<td><?= $PLAYER[$row->po_player] ?></td>
			<td><?= $row->po_price ?> 花</td>
			<td><?= $row->po_info ?></td>
			<td><?= ($row->po_ud=="1") ? "수입" : "지출" ; ?></td>
			<td><?= $row->po_date ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="give_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/item/addGet" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">화/아이템 지급</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="all"> 전체
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="class_1"> 잠재능력반
						</label>
						<label>
							<input type="radio" name="chk" value="class_2"> 기술반
						</label>
						<label>
							<input type="radio" name="chk" value="class_3"> 체질반
						</label>
						<label>
							<input type="radio" name="chk" value="class_4"> 특별능력반
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="grade_1"> 한송이
						</label>
						<label>
							<input type="radio" name="chk" value="grade_2"> 두송이
						</label>
						<label>
							<input type="radio" name="chk" value="grade_3"> 세송이
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; border-top: #eee solid 1px; padding-top: 20px;">
						<?php foreach(query("select * from MEMBER m, PLAYER p where m_player3 = p_no order by m.m_name") as $row){ ?>
						<label>
							<input type="checkbox" name="player[]" value="<?= $row->m_no ?>" data-class = "<?= $row->p_class ?>" data-grade="<?= $row->p_grade ?>"><?= $row->p_name ?>
						</label>
						<?php } ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 form-inline" style="margin-top: 10px; border-top: #eee solid 1px; padding-top: 30px;"> 
						<select style="width: 23%" class="form-control" name="item1">
							<option value="0">-- 아이템 --</option>
							<?php foreach(query("select * from ITEM order by i_name asc") as $row) {?>
								<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
							<?php } ?>
						</select>
						<input class="form-control" style="width: 7%" type="number" name="num1" value="0">

						<select style="width: 23%" class="form-control" name="item2">
							<option value="0">-- 아이템 --</option>
							<?php foreach(query("select * from ITEM order by i_name asc") as $row) {?>
								<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
							<?php } ?>
						</select>
						<input class="form-control" style="width: 7%" type="number" name="num2" value="0">

						<select style="width: 23%" class="form-control" name="item3">
							<option value="0">-- 아이템 --</option>
							<?php foreach(query("select * from ITEM order by i_name asc") as $row) {?>
								<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
							<?php } ?>
						</select>
						<input class="form-control" style="width: 7%" type="number" name="num3" value="0">
					</div>

					<div class="col-xs-12 col-sm-12 col-md-12"> 
						<input class="form-control" type="number" name="price" placeholder="花">
						<textarea class="form-control" id="content" name="text" placeholder="내용" required></textarea><br>
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