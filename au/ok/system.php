<?php

switch($val1){
	//아이템 구매
	case "letter":
		$name = $_POST["player"];
		$title = $_POST["title"];
		$content = addslashes($_POST["content"]);
		$i = $_POST["item"];
		$num = $_POST["num"];
		$item = ($i=="0") ? "" : $i."^".$num;
		$from = $PLAYER[$AU]."에게 받음";
		$to = $PLAYER[$name]."에게 보냄";
		
		if($name == "0"){ am("받는이를 선택하세요.",""); return; }
		
		query("insert into AU_LETTER (l_to, l_from, l_title, l_content, l_item, l_date) VALUE ('{$name}','{$AU}','{$title}', '{$content}', '{$item}', now())");
		
		if($item!="0" && $num!="0"){
		query("insert into AU_INVENTORY (in_player, in_item, in_get_info, in_get_date) VALUES ('$name', '$item', '$from', now())");//받은사람
		query("update AU_INVENTORY set in_use_info = '$to', in_use_date = now() where in_player = '$AU' and in_item = '$i' limit $num");
		}
		am("문자가 발송되었습니다.","/au/index.php/mypage/letter_list/1");
	break;
		
	case "expedition_start":
		$time = $_POST["time"];
		$timestamp = strtotime("+".$time." hours");
		$end_time = date("Y-m-d H:i:s", $timestamp);
		query("insert into AU_EXPEDITION_LOG (tr_player, tr_type, tr_start, tr_end) VALUE ($AU, '$time', now(), '$end_time')");
	break;
		
	case "expedition_end":
		$time = $_POST["time"];
		$expedition = fetchAll("select * from AU_EXPEDITION where t_time = $time");
		query("update AU_EXPEDITION_LOG set tr_get = 1 where tr_player = $AU and tr_get = 0 and tr_type = '$time' order by tr_no desc");
		query("insert into AU_EXP (e_player, e_info, e_add, e_date) VALUE ($AU, '$expedition->t_name 원정 보상', $expedition->t_exp, now())");
		query("insert into AU_POINT (po_player, po_type, po_info, po_price, po_date) VALUE ($AU, '1', '$expedition->t_name 원정 보상', $expedition->t_point, now())");
		point($AU);
	break;

	case "upgrade" :
		$no = $_POST["no"];
		$chk = fetchAll("select * from AU_GRADE where g_no = $no+1");
		query("update AU_STATE set s_none = s_none+$chk->g_state where s_player = $AU");
		query("update AU_PLAYER set p_grade = '$chk->g_grade' where p_no = $AU");
	break;
		
	case "state" :
		$hp = $_POST["hp"];
		$str = $_POST["str"];
		$con = $_POST["con"];
		$esp = $_POST["esp"];
		$none = $_POST["none"];
		$chk = fetchAll("select * from AU_STATE where s_player = $AU");
		$hp_chk = ((int)$hp - (int)$chk->s_hp) *1000;
		query("update AU_STATE set s_none = $none, s_hp = $hp, s_str = $str, s_con = $con, s_esp = $esp where s_player = $AU");
		query("insert into AU_HP (hp_player, hp_num, hp_type, hp_info, hp_date) VALUE ('$AU','$hp_chk','1','스텟 배분',now())");
		//$state = $_POST["state"];
		//query("update AU_STATE set s_none = s_none-1, s_$state = s_$state+1 where s_player = $AU");
	break;
}