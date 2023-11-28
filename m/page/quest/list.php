<div class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<?php 
					$my_row = rowAll("select * from REQUEST where q_player = '{$_SESSION["no"]}'");
					$v1 = $val1-1; 
				?>
				<div class="card-header"><b>내 의뢰</b><div class="arrow" style="display: inline-block; float: right"><a href="/m/index.php/quest/list/<?= ($val1-1 > 0) ? $val1-1 : $val1 ?>">&lt;</a> &nbsp; <a href="/m/index.php/quest/list/<?= ($val1+1 <= $my_row) ? $val1+1 : $val1 ?>">&gt;</a></div></div>
				<div class="card-body">
					<div class="table-responsive">
						<?php 
							$my_row = rowAll("select * from REQUEST where q_player = '{$_SESSION["no"]}'");
							$v1 = $val1-1; 
						?>
						<?php $my = fetchAll("select * from REQUEST where q_player = '{$_SESSION["no"]}' order by q_date desc limit $v1,1"); ?>
						<h6 class="text-danger"><?= isset($my->q_title) ? $my->q_title : "요청한 의뢰가 없습니다." ?></h6>
						<p><?= nl2br($my->q_content) ?><br><br><?= "의뢰일 : ".$my->q_date ?><?= (isset($my->q_player_to)) ? "<br>수행인 : ".$PLAYER[$my->q_player_to] : "" ?></p>
						<span class="q_type" data-type="<?= $my->q_type ?>"><?= $QUEST[$my->q_type] ?></span>
						<span class="q_btn" onClick="questType('<?= $my->q_no ?>','<?= $my->q_type ?>')" style="float: right; font-weight: 900; text-decoration: underline"><?php if($my->q_type=="1" || $my->q_type =="2"){ echo "삭제";}else if($my->q_type=="3"){ echo "의뢰완료";} ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"><b>수행중인 의뢰</b></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<?php $ing = fetchAll("select * from REQUEST where q_type = 3 and q_player_to = '{$_SESSION["no"]}' limit 0,1"); ?>
							<h6 class="text-danger"><?= isset($ing->q_title) ? $ing->q_title : "진행중인 의뢰가 없습니다." ?></h6>
							<p>
								<?= nl2br($ing->q_content) ?><br><br><?= isset($ing->q_price) ? "보상 : ".$ing->q_price."花" : "";?>
								<?= isset($ing->q_item) ? ", ".$ITEM[$ing->q_item]."" : "" ?><br><?= isset($ing->q_title) ? "의뢰일 : ".$ing->q_date."<br>의뢰인 : ".$PLAYER[$ing->q_player] : ""; ?>
							</p>
							<span style="float: right"></span><span><?= $QUEST[$ing->q_type] ?></span>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>새로운 의뢰</b>
					<?php
					$date_chk = fetchAll("select * from REQUEST where q_player = '{$_SESSION["no"]}' order by q_date desc limit 0,1"); 
					$interval = date_diff(date_create(date('Y-m-d')), date_create($date_chk->q_date));
					if($interval->days >= 1 || !isset($date_chk->q_no)){
					?>
					<div class="arrow" style="display: inline-block; float: right"><a href="/m/index.php/quest/write">새 의뢰 등록</a></div>
					<?php } else { ?>
					<div class="arrow" style="display: inline-block; float: right"><a onClick="alert('의뢰는 1일에 1번 요청 할 수 있습니다.')" href="#">새 의뢰 등록</a></div>
					<?php } ?>

				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<?php foreach(query("select * from REQUEST where q_type = 2 and q_player not in ('{$_SESSION["no"]}') ") as $row){ ?>
							<tr>
								<td style="text-align: left; padding-left: 30px;"><?= $row->q_title ?></td>
								<td><?php $date = explode("-", $row->q_date); echo $date[1].".".$date[2]  ?></td>
								<td><a href="javascript:confirmDelete('/index.php/ok/quest/quest_ok/<?= $row->q_no;?>')" style="color: #851210 !important">수락</a></td>
							</tr>

							<?php } ?>    
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>지난 의뢰</b></div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table">
							<?php foreach(query("select * from REQUEST where q_type = 4 and q_player_to = '{$_SESSION['no']}' order by q_no desc limit 10") as $row){ ?>
							<tr>
								<td style="text-align: left; padding-left: 30px;"><a style="color: #000" href="/m/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
								<td><?= $PLAYER[$row->q_player] ?></td>
								<td><?php $date = explode("-", $row->q_date); echo $date[1].".".$date[2]  ?></td>
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
</style>
<script>
	
	function confirmDelete(url) {
		if( confirm("이 의뢰를 수락할까요? (진행중인 의뢰를 완료하기 전까지 새로운 의뢰를 받을 수 없습니다.)") ) {
			location.href = url;
		}
	}
	
	function questType(no,type){
		if(type == "1" || type == "2"){
			if( confirm("의뢰를 삭제하시겠습니까?") ) {
				location.href='/index.php/ok/quest/quest_del/'+no;
			}	
		} else if(type=="3") {
		 	if( confirm("의뢰를 완료하고 보상을 지급합니다. (의뢰 수행이 완전히 끝나기 전에 완료 할 경우 보상이 회수 될 수 있습니다.)") ) {
				location.href='/index.php/ok/quest/quest_end/'+no;
			}
		}
	}
	
	/*
	type = $(".q_type").data("type");
	if(type == "1" || type == "2"){
		$(".q_btn").text("삭제").on("click",function(){
			if( confirm("의뢰를 삭제하시겠습니까?") ) {
				no = $(this).data("no");
				location.href='/index.php/ok/quest/quest_del/'+no;
			}	
		})
	} else if(type=="3") {
		$(".q_btn").text("의뢰완료").on("click",function(){
			if( confirm("의뢰를 완료하고 보상을 지급합니다. (의뢰 수행이 완전히 끝나기 전에 완료 할 경우 보상이 회수 될 수 있습니다.)") ) {
				no = $(this).data("no");
				location.href='/index.php/ok/quest/quest_end/'+no;
			}
		})
	}
	*/
</script>