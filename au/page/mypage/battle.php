<?php 

$row= fetchAll("select * from AU_PLAYER, AU_STATE WHERE p_no = $AU and p_no = s_player"); 
foreach(query("select * from AU_PLAYER, AU_STATE where p_no = s_player") as $row2){
	hp($row2->p_no);
}
?>
<div class="sub">
	<div class="battle">
		<div class="battle_left"></div>
		<div class="battle_center">
			<div class="battle_room">
				<select name="room" style=" width: 100%">
					<?php foreach(query("SELECT * FROM `AU_ROOM` WHERE r_player LIKE '%,$AU,%'") as $room) { ?>
					<option value="<?= $room->r_no ?>" data-player="<?= $room->r_player ?>"><?= $room->r_title ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="battle_fight">
				<img class="battle_text_state" src="/au/common/img/battle/attack.png"> 
				<select name="taget" style="width: 750px; margin-left: 10px">
					<option value="0">훈련용 로봇</option>
					<?php foreach(query("select * from AU_PLAYER where p_no not in ($AU)") as $player){ ?>
					<option value="<?= $player->p_no ?>"><?= $player->p_name ?></option>	
					<?php } ?>
				</select>
				<br><br>
				<p>
				<span style="font-size: 24px; color: inherit;">DAMAGES : <?= $row->s_str ?> * 1000 + ⚂<?= $DICE[$row->p_grade] ?></span><br>
				DEFENSE : <?= $row->s_con ?> * 500 = <?= $row->s_con*500 ?><br>
				<span style="font-weight: bold; color: inherit; display: inline-block; margin-top: 10px"><?= $POSITION[$row->p_position] ?> : <?= $row->p_ability_name ?></span><br>
				<?= $row->p_ability_info ?><br>
				<label style="float: right;">
					<?php if($row->p_esp > 0){ ?>
					<input type="checkbox" name="esp" value="ok"> 이능력 사용 (ESP 1 차감)
					<?php } ?>
				<br></label>
				</p>
				<?php if($row->p_hp == "0"){ ?>
				<button style="width: 100%;"><img src="/au/common/img/battle/battle_hover.png"></button>
				<?php } else { ?>
				<button class="battle_btn" style="width: 100%;" onClick="attack()"><img src="/au/common/img/battle/battle.png" onmouseover="this.src='/au/common/img/battle/battle_hover.png';" onmouseout="this.src='/au/common/img/battle/battle.png';"></button>
				<?php } ?>
				
			</div>
			<div class="battle_item"></div>
		</div>
		<div class="battle_right" style="overflow: scroll"></div>
	</div>
</div>
<script>
	
	<?php $PLAYER[0] = "훈련용 로봇" ?>
	var js_array = <?php echo json_encode($PLAYER)?>; 
	
	val = 0;
	$(".battle_right").load('/au/page/mypage/battle_log.php',{val:val});
	$(".battle_left").load('/au/page/mypage/battle_profile.php');
	$(".battle_item").load('/au/page/mypage/battle_item.php');
	
	$(".battle_room select").on("change",function(){
		val = $(this).val();
		$(".battle_right").load('/au/page/mypage/battle_log.php',{val:val})
		player = $(this).find('option:selected').data("player").split(",");
		$(".battle_fight select").find('option').remove();
		player.forEach(function(item) {
			if(item != "" && item != <?= $AU ?>){
				$(".battle_fight select").append("<option value='"+item+"'>"+js_array[item]+"</option>");
			}
		});
		if($(this).val()!="0"){ $("label").css("visibility","visible");  }
	})
	
	$(".battle_fight select").on("click",function(){
		if($(this).val()=="0"){
			$("label").css("visibility","visible"); 
		} else if($(".battle_room select").val()=="0") {
			$("label").css("visibility","hidden");
			$("label input").prop("checked", false)
		} else {
			$("label").css("visibility","visible"); 
		}
	})
	
	function attack(){	
		if($("#hp").text() == "0"){
			alert("기절한 상태에선 전투를 진행 할 수 없습니다.");
		} else {
			room = $("select[name=room]").val();
			taget = $("select[name=taget]").val();
			esp = $("input[name=esp]:checked").val();
			
			if($("#esp").data("esp") <= "0" && esp != ""){
				alert("ESP를 모두 소진하였습니다.");
			} else {
				$.ajax({
					type:"POST",
					url:"/au/index.php/ok/battle/attack",
					data:{room:room,taget:taget,esp:esp},
					success:function(e){
						console.log(e);
						$(".battle_right").load('/au/page/mypage/battle_log.php',{val:room});
						$(".battle_left").load('/au/page/mypage/battle_profile.php');
						$(".battle_fight button").attr("onClick","");
						$(".sub").effect("shake", {times:5}, 800 );
						$(".battle_btn").css("opacity","0.5");
					}
				});
			}
		}
		setTimeout(function() {
			$(".battle_fight button").attr("onClick","attack()");
			$(".battle_btn").css("opacity","1");
		}, 1000);
	}
	
	$(".sub").on("mouseover",function(){
		room = $("select[name=room]").val();
		$(".battle_right").load('/au/page/mypage/battle_log.php',{val:room});
		$(".battle_left").load('/au/page/mypage/battle_profile.php');
		
	})
	

</script>