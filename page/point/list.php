<div class="table_title"><img src="/common/img/point/point_title.png"></div>

<div class="point_th"><img src="/common/img/point/point_th.png"></div>
<div style="height: 200px;" class="table_content">
<table class="table">
	<colgroup>
		<col width="4%">
		<col width="80%">
		<col width="8%">
		<col width="8%">
	</colgroup>
	<?php foreach(query("select * from POINT_CAL where pc_player = '{$_SESSION["no"]}' order by pc_no desc limit 10") as $row){ ?>
		<tr>
			<td></td>
			<td style="text-align: left;">
			<?php if($row->pc_type == "1"){ 
				echo $row->pc_text." : "; 
				echo ($row->pc_price!="") ? $row->pc_price."花 " : "" ; 
				if($row->pc_item!=""){ 
					$item = explode(",",$row->pc_item);  
					for($i=0; $i < count($item); $i++){ 
						$num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1].") "; 
					}
				} 
			} else { 
				echo $row->pc_text." : ".$row->pc_price."花"; 
			}?> 
			</td>
			<td><?php $date = explode("-",$row->pc_date); echo $date[1].".".$date[2] ?></td>
			<td>
			<?php if(!isset($row->pc_ok_date)){ ?>
			<a href="javascript:confirmDelete('/index.php/ok/point/cal_del/<?= $row->pc_no ?>','정산 요청을 취소하시겠습니까?')" >취소</a>
			<?php } else { echo "완료됨"; } ?>
			</td>
		</tr>
	<?php } ?>

</table>
</div>

<img style="margin-left: -12px; margin-top: -28px;" src="/common/img/point/point_flower.png">

<div class="point_left">
	
	<h6 style="font-weight: 900">트윗정산</h6>
	<form method="post" action="/index.php/ok/point/cal_twt">
		<input type="text" id="twt" name="twt" placeholder="현재 트윗수" required><br>
		<button type="submit">정산</button>
	</form>
	<h6 style="font-weight: 900">조사정산</h6>
	<form method="post" action="/index.php/ok/point/cal_event">
		<input type="number" name="price" class="numbersOnly" placeholder="획득 花"><br>
		<div class="item_select">
			<select id="item1" class="item" name="item1">
				<option value="0">선택</option>
				<?php foreach(query("select * from ITEM where i_sys not in (4, 5, 7) order by i_type asc, i_name asc") as $row) {?>
				<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
				<?php } ?>
			</select>
			<select class="num" name="num1">
				<?php for($i=0; $i<=10; $i++ ){  ?>
				<option value="<?= $i ?>"><?= $i?></option>
				<?php } ?>
			</select>
		</div>
		<div class="item_select">
			<select id="item2" class="item" name="item2">
				<option value="0">선택</option>
				<?php foreach(query("select * from ITEM where i_sys not in (4, 5, 7) order by i_type asc, i_name asc") as $row) {?>
				<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
				<?php } ?>
			</select>
			<select class="num" name="num2">
				<?php for($i=0; $i<=10; $i++ ){  ?>
				<option value="<?= $i ?>"><?= $i?></option>
				<?php } ?>
			</select>
		</div>
		<div class="item_select">
			<select id="item3" class="item" name="item3">
				<option value="0">선택</option>
				<?php foreach(query("select * from ITEM where i_sys not in (4, 5, 7) order by i_type asc, i_name asc") as $row) {?>
				<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
				<?php } ?>
			</select>
			<select class="num" name="num3">
				<?php for($i=0; $i<=10; $i++ ){  ?>
				<option value="<?= $i ?>"><?= $i?></option>
				<?php } ?>
			</select>
		</div>
		<input style="width: 55%; height: 23px; margin: 5px 5px 5px 0; float: left;" type="date" name="date" value="<?php echo date("Y-m-d");?>" required><br>
		<select name="text" style="width: 43%; height: 24px; margin-top: 5px; float: left; ">
			<option value="학교조사">학교조사</option>
			<option value="약초채집">약초채집</option>
			<option value="달걀서리">달걀서리</option>
			<option value="스토리조사">스토리조사</option>
			<option value="야영채집">야영채집</option>
		</select>
		<button>정산</button>
	</form>
</div>

<div class="point_right">
	<table class="table" style="width: 100%;">
		<colgroup>
			<col width="15%">
			<col width="50%">
			<col width="15%">
			<col width="20%">
		</colgroup>
		<tr>
			<th>금액</th>
			<th>거래내역</th>
			<th>분류</th>
			<th>날짜</th>
		</tr>
	</table> 

	<div class="point_right_table" >
	<table class="table" style="width: 100%;">
		<colgroup>
			<col width="15%">
			<col width="50%">
			<col width="15%">
			<col width="20%">
		</colgroup>
		<?php 
		foreach(query("select * from POINT where po_player = '{$_SESSION["no"]}' order by po_no desc limit 0,50") as $row){ ?>
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

<style>
	
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/point/point_back.png'); background-repeat: no-repeat; }
	.content_top, .content_bottom { display: none; }
	.point_th { margin-left: -18px; margin-top: -10px; }
	.point_right { width: 465px; border: none; }
	.point_right .table tr th {  width: 465px; z-index: 10; position: relative; }
	.point_right_table { width: 465px; background: url('/common/img/point/point_td_s.png'); height: 312px; margin-top: -30px; padding-top: 33px; }
	.point_right_table tr td { border: none; }
	.table tr td { }
	.item_select { display: inline; }
</style>
<script>
function confirmDelete(url,am) {
	if( confirm(am) ) {
		location.href = url;
	}
}
	
$(".item").on("change",function(){
	$(this).siblings().find('option[value=1]').prop("selected", true);
})
</script>
