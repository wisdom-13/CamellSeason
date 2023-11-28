<div class="table_title"><img src="/common/img/quest/quest_title.png"></div>

<div class="quest_left">

<!-- 내의뢰 -->
<div class="quest_box1 quest_box">
	<?php 
		$my_row = rowAll("select * from REQUEST where q_player = '{$_SESSION["no"]}'");
		$v1 = $val1-1; 
	?>
	<div class="arrow"><a href="/index.php/quest/list/<?= ($val1-1 > 0) ? $val1-1 : $val1 ?>">&lt;</a> &nbsp; <a href="/index.php/quest/list/<?= ($val1+1 <= $my_row) ? $val1+1 : $val1 ?>">&gt;</a></div>
	<?php $my = fetchAll("select * from REQUEST where q_player = '{$_SESSION["no"]}' order by q_date desc limit $v1,1"); ?>
	<h6><?= isset($my->q_title) ? $my->q_title : "요청한 의뢰가 없습니다." ?></h6>
	<p><?= nl2br($my->q_content) ?><br><br><?= "의뢰일 : ".$my->q_date ?><?= (isset($my->q_player_to)) ? "<br>수행인 : ".$PLAYER[$my->q_player_to] : "" ?></p>
	<span class="q_type" data-type="<?= $my->q_type ?>"><?= $QUEST[$my->q_type] ?></span>
	<span class="q_btn" data-no="<?= $my->q_no ?>" data-type="<?= $my->q_type ?>" style="float: right; font-weight: 900; text-decoration: underline"></span>
</div>

<!-- 진행중인 의뢰 -->
<div class="quest_box2 quest_box">
	<?php $ing = fetchAll("select * from REQUEST where q_type = 3 and q_player_to = '{$_SESSION["no"]}' limit 0,1"); ?>
	<h6><?= isset($ing->q_title) ? $ing->q_title : "진행중인 의뢰가 없습니다." ?></h6>
	<p>
		<?= nl2br($ing->q_content) ?><br><br><?= isset($ing->q_price) ? "보상 : ".$ing->q_price."花" : "";?>
		<?= isset($ing->q_item) ? ", ".$ITEM[$ing->q_item]."" : "" ?><br><?= isset($ing->q_title) ? "의뢰인 : ".$PLAYER[$ing->q_player] : ""; ?>
	</p>
	<span style="float: right"></span><span><?= $QUEST[$ing->q_type] ?></span>
</div>
</div>

<div class="quest_right">
	<table class="table">
		<tr>
			<th>새로운 의뢰</th>
		</tr>
	</table>

	<div class="quest_table_div" >
	<table class="table" style="width: 100%;">
		<colgroup>
			<col width="60%">
			<col width="20%">
			<col width="20%">
		</colgroup>
		<?php foreach(query("select * from REQUEST where q_type = 2 and q_player not in ('{$_SESSION["no"]}') ") as $row){ ?>
		<tr>
			<td style="text-align: left; padding-left: 30px;"><?= $row->q_title ?></td>
			<td><?php $date = explode("-", $row->q_date); echo $date[1].".".$date[2]  ?></td>
			<td><a href="javascript:confirmDelete('/index.php/ok/quest/quest_ok/<?= $row->q_no;?>')" style="color: #851210 !important">수락</a></td>
		</tr>
		
		<?php } ?> 
	</table>
	</div>
	<table class="table">
		<tr>
			<th>지난 의뢰</th>
		</tr>
	</table>

	<div class="quest_table_div" >
	<table class="table" style="width: 100%;">
		<colgroup>
			<col width="52%">
			<col width="28%">
			<col width="20%">
		</colgroup>
		<?php foreach(query("select * from REQUEST where q_type = 4 and q_player_to = '{$_SESSION['no']}' order by q_no desc") as $row){ ?>
		<tr>
			<td style="text-align: left; padding-left: 30px;"><a href="/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
			<td><?= $PLAYER[$row->q_player] ?></td>
			<td><?php $date = explode("-", $row->q_date); echo $date[1].".".$date[2]  ?></td>
		</tr>
		<?php } ?> 
	</table>
	</div>
</div>

<?php
$date_chk = fetchAll("select * from REQUEST where q_player = '{$_SESSION["no"]}' order by q_date desc limit 0,1"); 
$interval = date_diff(date_create(date('Y-m-d')), date_create($date_chk->q_date));
if($interval->days >= 1 || !isset($date_chk->q_no)){
?>
<div class="quest_btn">
	<a href="/index.php/quest/write"><img src="/common/img/quest/btn_quest.png" onmouseover="this.src='/common/img/quest/btn_quest_hover.png';" onmouseout="this.src='/common/img/quest/btn_quest.png';"></a>
</div>
<?php } else { ?>
<div class="quest_btn">
	<img onClick="alert('의뢰는 1일에 1번 요청 할 수 있습니다.')" src="/common/img/quest/btn_quest.png" onmouseover="this.src='/common/img/quest/btn_quest_hover.png';" onmouseout="this.src='/common/img/quest/btn_quest.png';">
</div>
<?php } ?>


<style>
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/letter/letter_back.png'); background-repeat: no-repeat; }
	.content_top, .content_bottom { display: none; }
</style>
<script>
	function confirmDelete(url) {
		if( confirm("이 의뢰를 수락할까요? (진행중인 의뢰를 완료하기 전까지 새로운 의뢰를 받을 수 없습니다.)") ) {
			location.href = url;
		}
	}
	
	var type = $(".q_type").data("type");
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
</script>
