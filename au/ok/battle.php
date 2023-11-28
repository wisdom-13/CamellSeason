<?php

switch($val1){
	case "attack":
		$room = $_POST["room"];
		$taget = $_POST["taget"];
		$esp = ($_POST["esp"] == "ok") ? "1" : "0";
		$player = fetchAll("select * from AU_PLAYER, AU_STATE where p_no = s_player and p_no = $AU");
		$player2 = fetchAll("select * from AU_PLAYER, AU_STATE where p_no = s_player and p_no = $taget");
		$rand = mt_rand(1,$DICE[$player->p_grade]);
		
		
		//기본
		$ee = ($esp=="1" && $player->p_position=="2") ? " ★" : "";
		$damages = $player->s_str*1000+$rand; //기본 데미지 
		$log = "ATTACK : ". $player->s_str." * 1000 + ⚂ ".$rand.$ee." = ".($player->s_str*1000+$rand);
		 
		//공격팀 이능력
		if($esp=="1" && $player->p_position=="1"){
			$esp_rand = mt_rand(120,150); 
			$damages = round($damages * $esp_rand*0.01);
			$log = "ATTACK : (".$player->s_str." * 1000 + ⚂ ".$rand.") * ★".$esp_rand*0.01." = ".$damages;
		}
		
		if($esp=="1"){ query("update AU_PLAYER set p_esp = p_esp-1 where p_no = $AU"); }
		
		$total_damages = ($damages-$player2->s_con*500 <= 0) ? "0" : $damages-$player2->s_con*500;
		$remain_damages = ($player2->p_hp - $total_damages > 0) ? $total_damages : $player2->p_hp;
		$log2 = ($player2->s_con*500)."의 공격 방어 → [".$PLAYER[$taget]."] 체력 ";
		
		//echo $log2;
		query("insert into AU_BATTLE (ba_player, ba_taget, ba_room, ba_log, ba_log2, ba_damages, ba_date) VALUE ($AU, '$taget', '$room', '$log', '$log2', '-$total_damages', now())");
		query("insert into AU_HP (hp_player, hp_num, hp_type, hp_info, hp_date) VALUE ('$taget', '$remain_damages', '2', '$PLAYER[$AU]의 공격', now())");
		hp($taget);
		if($player2->p_hp - $total_damages < 0 && $taget != "0"){ query("insert into AU_BATTLE (ba_player, ba_taget, ba_room, ba_log, ba_date) VALUE (0, 0, '$room', '$PLAYER[$taget]의 체력 0', now())"); }
	break;
	
	case "item":
		$player = fetchAll("select * from AU_PLAYER, AU_STATE where p_no = s_player and p_no = $AU");
		$room = $_POST["room"];
		$no = $_POST["no"];
		$name = $_POST["name"];
		$sys = $_POST["sys"];
		if($sys=="10"){
			$log = "[".$name."]를 사용해 대상자의 현재 위치를 파악합니다.";
		} else if($sys=="11"){
			$log = "[".$name."]를 사용해 위치추적을 방해합니다.";
		} else if($sys=="8") {
			$damages = (($player->s_hp*1000+10000)-$player->p_hp > 2000) ? "2000" : ($player->s_hp*1000+10000)-$player->p_hp;
			$log = "[".$name."]를 사용해 HP";
			$log2 = "을 회복합니다.";
			query("insert into AU_HP (hp_player, hp_num, hp_type, hp_info, hp_date) VALUE ($AU, '2000', '1', '100가지 야채주스 사용', now())");
		} else if($sys!=""){
			$damages = "1";
			$log = "[".$name."]를 사용해 ".$sys."가";
			$log2 = "상승합니다.";
			query("update AU_STATE set s_$sys = s_$sys+1 where s_player = $AU");
			if($sys=="hp"){query("insert into AU_HP (hp_player, hp_num, hp_type, hp_info, hp_date) VALUE ($AU, '1000', '1', '스텟 증가', now())");}
		}
		
		query("insert into AU_BATTLE (ba_player, ba_room, ba_log, ba_log2, ba_damages, ba_date) VALUE ($AU, '$room', '$log', '$log2', '$damages', now())");
		query("update AU_INVENTORY set in_use_info = '사용', in_use_date = now() where in_player = $AU and in_item = $no limit 1");
	break;
		
	case "point":
		foreach(query("select * from AU_PLAYER, AU_STATE where p_no = s_player and s_hp = '1'") as $row){
		 $point($row->p_no);
		}
	break;
}