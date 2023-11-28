<?php 
//if(!isset($AU)){ am("/au/index.php");} 
$row= fetchAll("select * from AU_PLAYER, AU_STATE WHERE p_no = $AU and p_no = s_player"); 
?>
<div class="sub" style="width: 980px;">
<div class="mypage_left">
	<img style="margin-bottom: 20px;" src="/au/common/img/mypage/grade/<?= $row->p_grade ?>.png" width="440px;">
	<div class="mypage_state" style="width: 980px">
		<div data-state = "hp" class="mypage_state_num hp"><?= $row->s_hp ?></div>
		<div data-state = "str" class="mypage_state_num str"><?= $row->s_str ?></div>
		<div data-state = "con" class="mypage_state_num con"><?= $row->s_con ?></div>
		<div data-state = "esp" class="mypage_state_num esp"><?= $row->s_esp ?></div>
	</div>
	<div style="clear: both"></div>
	<div class="mypage_state_box">
		<div class="mypage_state_text">
			<img src="/au/common/img/mypage/state/state_hp.png">
			<img src="/au/common/img/mypage/state/state_str.png">
			<img src="/au/common/img/mypage/state/state_con.png">
			<img src="/au/common/img/mypage/state/state_esp.png">
		</div>
		<div class="mypage_state_gauge">
			<div class="gauge_hp">
				<img src="/au/common/img/mypage/state/100.png"><span><?= number_format(10000+$row->s_hp*1000)."/".number_format(10000+$row->s_hp*1000) ?></span>
			</div>
			<div class="gauge_str">
				<img src="/au/common/img/mypage/state/100.png"><span><?= number_format($row->s_str*1000) ?></span>
			</div>
			<div class="gauge_con">
				<img src="/au/common/img/mypage/state/100.png"><span><?= number_format($row->s_con*500) ?></span>
			</div>
			
			<div class="gauge_esp">
				<img src="/au/common/img/mypage/state/100.png"><span><?= $row->s_con."/".$row->s_con ?></span>
			</div>
		</div>
		<div class="mypage_exp">
			<?php 
			$e = fetchAll("select sum(e_add) e_add from AU_EXP where e_player = $AU");
			$exp = fetchAll("select * from AU_GRADE where g_grade = '$row->p_grade'"); ?>
			현재 숙련도<br>
			<span><?= number_format($e->e_add) ?></span>
			다음 등급까지 남은 숙련도<br>
			<span><?= ($exp->g_exp - $e->e_add <= 0) ? "0" : number_format($exp->g_exp - $e->e_add) ?></span>
		</div>
		<div style="clear: both"></div><br>
		<div class="mypage_state_add">
			<div>
				<img src="/au/common/img/mypage/state/none_state.png"><span class="state_none"><?= $row->s_none ?></span>
				<p>스텟 아이콘을 클릭하여 스텟을 분배한 뒤, <br>OK 버튼을 클릭하여 스텟을 적용할 수 있습니다. </p>
			</div>
			<img class="state_reset" src="/au/common/img/mypage/state/reset.png"  onmouseover="this.src='/au/common/img/mypage/state/reset_hover.png';" onmouseout="this.src='/au/common/img/mypage/state/reset.png';">
			<img class="state_ok" src="/au/common/img/mypage/state/ok.png"  onmouseover="this.src='/au/common/img/mypage/state/ok_hover.png';" onmouseout="this.src='/au/common/img/mypage/state/ok.png';">
		</div>
	</div>
</div>
</div>


<script>
	num = 0;
	
	$(".mypage_state_num").on("click",function(){
		state = $(this).data("state");
		if($(".state_none").text() <= 0) {
			alert("분배 가능한 스텟이 없습니다.")
		} else {
			$(this).text(Number($(this).text())+1);
			$(".state_none").text(Number($(".state_none").text())-1);
			num += 1;
		}
		
	});
	
	$(".state_ok").on("click",function(){
		hp = $(".hp").text();
		str = $(".str").text();
		con = $(".con").text();
		esp = $(".esp").text();
		none = $(".state_none").text();
		if(<?= $row->s_none ?> >= num){
			$.ajax({
				type:"POST",
				url:"/au/index.php/ok/system/state",
				data:{hp:hp,str:str,con:con,esp:esp,none:none},
				success:function(){
					location.reload();
				}
			});
		} else {
			alert("스텟이 잘못 입력되엇습니다.");
			location.reload();
		}
		
	})
	
	$(".state_reset").on("click",function(){
		location.reload();
	})
</script>