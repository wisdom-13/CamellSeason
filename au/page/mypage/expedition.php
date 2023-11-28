<?php 
$query = "select * from AU_EXPEDITION_LOG where tr_player = $AU and tr_end > now()";
$row = fetchAll($query);
if($row){
$data = explode(" ",$row->tr_end);
$data[0] = explode("-",$data[0]);
$data[1] = explode(":",$data[1]);


$date1=mktime($data[1][0], $data[1][1], $data[1][2], $data[0][1], $data[0][2], $data[0][0]); //종료시간 ; 시, 분, 초, 월, 일 년
$date2=mktime(); 

$total_secs=abs($date1 - $date2); 
$diff_in_days = floor($total_secs / 86400); 
$rest_hours = $total_secs % 86400; 
$diff_in_hours = floor($rest_hours / 3600); 
$rest_mins = $rest_hours % 3600; 
$diff_in_mins = floor($rest_mins / 60); 
$diff_in_secs = floor($rest_mins % 60); 
}
?>
<body onload='Timer(<?= $diff_in_secs ?>, <?= $diff_in_mins ?>, <?= $diff_in_hours ?>, <?= $diff_in_days ?>)' >

<div class="sub">
	<div class="expedition">
		<div class="expedition_list">
			<?php
				$back = fetchAll("select * from AU_EXPEDITION_LOG where tr_player = $AU and tr_get = 0");
				$expedition = array(2,4,8,12);
				for($i=0; $i<4; $i++){
				$row = fetchAll("select * from AU_EXPEDITION_LOG where tr_player = $AU and tr_type = $expedition[$i] order by tr_no desc limit 0,1");
				if(!$row){ //진행중인 원정이 없을경우 
			?>
				<div class="expedition_box" title="back_<?= $expedition[$i] ?>" <?php if(!$back){ ?> onClick="start(<?= $expedition[$i] ?>)" <?php } ?> >
					<img src="/au/common/img/expedition/btn_<?= $expedition[$i] ?>.png">
				</div>
			<?php	//원정이 진행중일 경우 
				} else if(strtotime($row->tr_end) >= strtotime(date("Y-m-d H:i:s"))) {
			?>
				<div class="expedition_box" title="back_<?= $expedition[$i] ?>">
					<img class="ing_img" src="/au/common/img/expedition/ing_text.png">
					<span class="ing_text"></span>
				</div>
			<?php	//원정이 완료된 경우 
				} else if($row->tr_get == "0") {
			?>
				<div class="expedition_box" title="back_<?= $expedition[$i] ?>" onClick="end(<?= $expedition[$i] ?>)">
					<img class="end_img" src="/au/common/img/expedition/end_text.png">
					<?php $end = fetchAll("select * from AU_EXPEDITION where t_time = $expedition[$i]"); ?>
					<p class="end_text"><?= $end->t_exp ?> 숙련도 / <?= $end->t_point ?> 포인트</p>
				</div>
			<?php
				} else {
			?>
				<div class="expedition_box" title="back_<?= $expedition[$i] ?>" <?php if(!$back){ ?> onClick="start(<?= $expedition[$i] ?>)" <?php } ?> >
					<img src="/au/common/img/expedition/btn_<?= $expedition[$i] ?>.png">
				</div>
			<?php
				}} 
			?>
		</div>
	</div>
</div>
</body>

<script>
	<?php if($back){ ?>
	$(".expedition").css('background-image', 'url("/au/common/img/expedition/back_<?= $back->tr_type ?>.png")');
	<?php } ?>
	
	$(".expedition_box").on("mouseover",function(){
		$(this).css('background-image', 'url("/au/common/img/expedition/btn_hover.png")');
		
	})
	$(".expedition_box").on("mouseleave",function(){
		$(this).css('background-image', 'url("/au/common/img/expedition/btn.png")');
	})
	$(".expedition_box").on("click",function(){
		title = $(this).attr("title");
		$(".expedition").css('background-image', 'url("/au/common/img/expedition/' + title + '.png")');
	})
	
	function start(time){
		if(confirm("원정을 진행하시겠습니까?")){
			$.ajax({
				type:"POST",
				url:"/au/index.php/ok/system/expedition_start",
				data:{time:time},
				success : function($e){
					location.reload();
				}
			});
		}
	}
	
	function end(time){
		$.ajax({
			type:"POST",
			url:"/au/index.php/ok/system/expedition_end",
			data:{time:time},
			success : function($e){
				alert("원정 완료 보상을 받았습니다.");
				location.reload();
			}
		});
	}
	
	//숫자 앞에 0 붙이기
	function pad(n, width) {
	  n = n + '';
	  return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
	}
	
	function Timer(diff_in_secs, diff_in_mins, diff_in_hours, diff_in_days){ 
		day=diff_in_days;	
		hour=diff_in_hours; 
		min=diff_in_mins; 
		sec=diff_in_secs; 
		Timer1(); 
	} 
	function Timer1(){ 
		sec=sec-1; 
		if(sec == -1){ 
			sec = 59; 
			min = min-1; 
		} 
		if(min == -1){ 
			min=59; 
			hour = hour - 1; 
		} 
		if(hour == -1){ 
			hour = 23; 
			day = day - 1; 
		} 
		if(sec == 0 && min == 0 && hour == 0 && day == 0){ 
			location.reload();
			return; 
		} 
		$(".ing_text").text(pad(hour,2) + ':' + pad(min,2) + ':' + pad(sec,2));
		window.setTimeout('Timer1()',1000); 
	} 
z
</script>