<div class="sub">
	<div class="inventory">
		<div class="inven">
			<img class="inven_title" src="/au/common/img/inventory/inventory_title.png">
			<div class="inven_btn">
				<a href="/au/index.php/mypage/inventory/0"><img src="/au/common/img/inventory/all.png"  onmouseover="this.src='/au/common/img/inventory/all_hover.png';" onmouseout="this.src='/au/common/img/inventory/all.png';"></a>
				<a href="/au/index.php/mypage/inventory/1"><img src="/au/common/img/inventory/day.png"  onmouseover="this.src='/au/common/img/inventory/day_hover.png';" onmouseout="this.src='/au/common/img/inventory/day.png';"></a>
				<a href="/au/index.php/mypage/inventory/2"><img src="/au/common/img/inventory/battle.png"  onmouseover="this.src='/au/common/img/inventory/battle_hover.png';" onmouseout="this.src='/au/common/img/inventory/battle.png';"></a>
				<a href="/au/index.php/mypage/inventory/3"><img src="/au/common/img/inventory/food.png"  onmouseover="this.src='/au/common/img/inventory/food_hover.png';" onmouseout="this.src='/au/common/img/inventory/food.png';"></a>
			</div>
			<div style="clear: both"></div>
			<div class="inven_item_list">
				<?php
					$type = ($val1 == "0") ? "" : "and i_type = ".$val1;
					$query = "select * from AU_INVENTORY, AU_ITEM where in_item = i_no and in_player = $AU and in_use_info is NULL $type"; 
					foreach(query($query) as $row){
				?>
				<div class="inven_item">
					<div><img src="/au/common/img/item/<?= $row->i_name ?>.png"></div>
					<h3><?= $row->i_name ?></h3>
					<p><?= nl2br($row->i_content) ?></p>
					<button onClick="use('<?= $row->in_no ?>','2')"><img src="/au/common/img/inventory/btn_throw.png"  onmouseover="this.src='/au/common/img/inventory/btn_throw_hover.png';" onmouseout="this.src='/au/common/img/inventory/btn_throw.png';"></button>
					<?php if($row->i_type != "2"){ ?>
					<button onClick="use('<?= $row->in_no ?>','1','<?= $row->i_name ?>','<?= $row->i_type ?>')"><img src="/au/common/img/inventory/btn_use.png"  onmouseover="this.src='/au/common/img/inventory/btn_use_hover.png';" onmouseout="this.src='/au/common/img/inventory/btn_use.png';"></button>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="infor">
			<img class="info_title" src="/au/common/img/inventory/information.png">
			<div class="info_img">
				<img src="/au/common/img/inventory/title_point.png"><br>
				<img data-yn="no" src="/au/common/img/inventory/title_exp.png">
			</div>
			<div class="info_text">
				<span><?= number_format($_SESSION["au_point"]) ?></span><br>
				<?php $e = fetchAll("select sum(e_add) e_total from AU_EXP where e_player = $AU"); ?>
				<span><?= number_format($e->e_total) ?></span>
			</div>
			<img src="/au/common/img/inventory/hr.png">
			
			<div class="cal">
				<form action="/au/index.php/ok/cal/twt_cal" method="post">
					<img class="cal_title" src="/au/common/img/inventory/calculate.png">
					<div class="cal_radion">
						<img data-type="포인트" title="2" style="margin-right: 20px;" src="/au/common/img/inventory/point_chk.png">
						<img data-type="숙련도" title="1" src="/au/common/img/inventory/exp.png">
						<input id="cal_type" type="hidden" name="type" value="포인트">
						<input id="cal_total" type="hidden" name="total" value="">
					</div>
					<input id="twt" width="305px;" type="text" name="twt" placeholder="현재 트윗 수" required>
					<p>마지막 정산트윗 : <span class="max_twt"><?php $twt = fetchAll("select max(pc_twt) max from AU_POINT_CAL where pc_player = $AU"); 
						if($twt){echo $twt->max;} else {echo "0";} ?></span><br>
					<span class="now_twt">0</span>의 <span class="type_text">포인트</span>가 지급됩니다.</p>
					<button><img src="/au/common/img/inventory/btn_submit.png"  onmouseover="this.src='/au/common/img/inventory/btn_submit_hover.png';" onmouseout="this.src='/au/common/img/inventory/btn_submit.png';"></button>
				</form>
				<br>
				<form action="/au/index.php/ok/cal/mission_cal" method="post">
					<input class="cal_input" type="text" name="content" placeholder="임무정산 : 임무 트윗 링크" width="70%" required>
					<button><img src="/au/common/img/inventory/btn_submit.png"  onmouseover="this.src='/au/common/img/inventory/btn_submit_hover.png';" onmouseout="this.src='/au/common/img/inventory/btn_submit.png';"></button>
				</form>
			</div>
			<img src="/au/common/img/inventory/hr.png">
			<img class="cal_title" src="/au/common/img/inventory/record.png">
			<table class="cal_table">
				<colgroup>
					<col width="5%">
					<col width="45%">
					<col width="30%">
					<col width="20%">
				</colgroup>
				<?php $i=="1"; foreach(query("select * from AU_POINT_CAL where pc_player = $AU order by pc_no desc limit 4") as $row){ $i++; ?>
				<tr>
					<td style="font-weight: bold;"><?= $i ?></td>
					<td><?= ($row->pc_type == "1") ? $row->pc_total*100 :  $row->pc_total*1000 ?> <?= ($row->pc_type == "1") ? "포인트" : "숙련도"  ?></td>
					<td><?= $row->pc_date ?></td>
					<td><?= ($row->pc_ok_date == "") ? "대기" : "완료" ?></td>
				</tr>			
				
				<?php } ?> 
			</table>
		</div>
	</div>
</div>

<script>
	
	function use(no,type,name,tt){
		if(type=="1"){
			if(confirm("정말로 사용할까요?")){
				if(tt=="3"){
					$.ajax({
						type:"POST",
						url:"/au/index.php/ok/item/item_use",
						data:{no:no},
						success : function ($e) {
							location.href = '/au/index.php/mypage/inventory/0';
							window.open("https://twitter.com/intent/tweet?text=["+name+"] 사용 @DICE_COF", "사용", "left=10, top=10, width=500, height=200");
						}
					});
				} else {
					$.ajax({
						type:"POST",
						url:"/au/index.php/ok/item/item_use",
						data:{no:no},
						success : function ($e) {
							location.href = '/au/index.php/mypage/inventory/0';
							window.open("https://twitter.com/intent/tweet?text=["+name+"] 사용 @STORE_SOC", "사용", "left=10, top=10, width=500, height=200");
						}
					});
				}
			}
		} else {
			if(confirm("아이템을 버릴 경우 복구되지 않습니다.")){
				$.ajax({
					type:"POST",
					url:"/au/index.php/ok/item/item_throw",
					data:{no:no},
					success : function () {
						location.href = '/au/index.php/mypage/inventory/0';
					}
				});
			}
		}
	}
	
	$(".cal_radion img").on("click",function(){
		if($(this).attr("title")=="1"){
			src = $(this).attr("src").split(".");
			$(this).attr("src",src[0]+"_chk.png");
			$(this).attr("title","2");
			$("#cal_type").val($(this).data("type"));
			$(".type_text").text($(this).data("type"));
			nochk = $(this).siblings("img").attr("src").split("_");
			if(nochk[1] != ""){ $(this).siblings("img").attr("src",nochk[0]+".png") }
			$(this).siblings("img").attr("title","1")
		} 
		now = $("#twt").val()-$(".max_twt").text();
		if(now>0){
			if($("#cal_type").val()=="포인트"){
				$(".now_twt").text(now*100);
			} else {
				$(".now_twt").text(now*1000);
			}
		}
	})
	
	$("#twt").on("keyup",function(){
		now = $(this).val()-$(".max_twt").text();
		$("#cal_total").val(now);
		if(now>0){	
			if($("#cal_type").val()=="포인트"){
				$(".now_twt").text(now*100);
			} else {
				$(".now_twt").text(now*1000);
			}
		}
	})
	/*
	function twt_cal(){
		twt = $(".max_twt").text();
		total = $("#twt").val()-$(".max_twt").text();;
		type = $("#cal_type").val();
		if(total>0){
			$.ajax({
				type:"POST",
				url:"/index.php/ok/cal/twt_cal",
				data:{twt:twt,total:tatal,type:type},
				success : function () {
					alert("정산 신청이 완료되었습니다.")
				}
			});
		} else {
			alert("현재 트윗을 정확히 입력해주세요.")
		}
		
		$.ajax({
			type:"POST",
			url:"/index.php/ok/cal/twt_cal",
			data:{twt:twt,total:tatal,type:type},
			success function(){
				location.reload();
			}
		});
		
	}
	*/
</script>