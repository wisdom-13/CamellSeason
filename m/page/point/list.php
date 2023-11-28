<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>트윗 정산</b></div>
				<div class="card-body">
					<div class="table-responsive">
						<form method="post" action="/index.php/ok/point/cal_twt">
                            <div class="form-group">
                                <input type="text" class="form-control" name="twt" placeholder="현재 트윗수">
                            </div>
							<button class="form-control btn-danger" style="padding: 10px; ">정산</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>조사 정산</b></div>
				<div class="card-body">
					<form method="post" action="/index.php/ok/point/cal_event">
						<div class="row">
							<div class="col-md-12 form-group">
								<input class="form-control" type="number" name="price" class="numbersOnly" placeholder="획득 花">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-9 col-sm-9 form-group">
								<select class="form-control" id="item1" name="item1">
									<option value="0">선택</option>
									<?php foreach(query("select * from ITEM order by i_type asc, i_name asc") as $row) {?>
									<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-xs-3 col-sm-3 form-group">
								<select class="form-control" class="num" name="num1">
									<?php for($i=0; $i<=10; $i++ ){  ?>
									<option value="<?= $i ?>"><?= $i?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-9 col-sm-9 form-group">
								<select class="form-control" id="item2" name="item2">
									<option value="0">선택</option>
									<?php foreach(query("select * from ITEM order by i_type asc, i_name asc") as $row) {?>
									<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-xs-3 col-sm-3 form-group">
								<select class="form-control" class="num" name="num2">
									<?php for($i=0; $i<=10; $i++ ){  ?>
									<option value="<?= $i ?>"><?= $i?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-9 col-sm-9 form-group">
								<select class="form-control" id="item3" name="item3">
									<option value="0">선택</option>
									<?php foreach(query("select * from ITEM order by i_type asc, i_name asc") as $row) {?>
									<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-xs-3 col-sm-3 form-group">
								<select class="form-control" class="num" name="num3">
									<?php for($i=0; $i<=10; $i++ ){  ?>
									<option value="<?= $i ?>"><?= $i?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-group">
								<select class="form-control" name="text"  style="margin-bottom: 10px">
									<option value="학교조사">학교조사</option>
									<option value="약초채집">약초채집</option>
									<option value="달걀서리">달걀서리</option>
									<option value="스토리조사">스토리조사</option>
									<option value="야영채집">야영채집</option>
								</select>
								<input class="form-control"  type="date" name="date" value="<?php echo date("Y-m-d");?>" required><br></div>
							<div class="col-md-12 form-group">
								<button class="form-control btn-danger" style="padding: 10px; ">정산</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>정산요청목록</b></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<?php foreach(query("select * from POINT_CAL where pc_player = '{$_SESSION["no"]}' order by pc_no desc") as $row){ ?>
								<tr>
									<td><?= $row->pc_price ?> 花</td>
									<td style="text-align: left;">
									<?php if($row->pc_type == "1"){ 
									$item = explode(",",$row->pc_item); echo $row->pc_text." : "; for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1].") "; } 
									} else { echo $row->pc_text." : ".$row->pc_item."花"; }?> 
									</td>
									<td>04.06</td>
									<td>
									<?php if(!isset($row->pc_ok_date)){ ?>
									<a href="javascript:confirmDelete('/index.php/ok/point/cal_del/<?= $row->pc_no ?>','정산 요청을 취소하시겠습니까?')" >취소</a>
									<?php } else { echo "완료됨"; } ?>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>거래내역</b></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<?php 
		foreach(query("select * from POINT where po_player = '{$_SESSION["no"]}' order by po_no desc limit 0,20") as $row){ ?>
		<tr>
			<td><?= $row->po_price ?> 花</td>
			<td><?= $row->po_info ?></td>
			<td><?= ($row->po_ud=="1") ? "수입" : "지출" ; ?></td>
			<td><?php $date = explode("-",$row->po_date); echo $date[1].".".$date[2]  ?></td>
		</tr>
		<?php } ?> 
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
	select { border-radius: 20px;}
</style>
<script>
function confirmDelete(url,am) {
		if( confirm(am) ) {
			location.href = url;
		}
	}
</script>
