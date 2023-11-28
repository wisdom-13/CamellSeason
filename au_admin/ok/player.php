<?php

switch($val1){
	case "addPlayer":
		$word = $_POST["word"];
		$look = addslashes($_POST["look"]);
		$name = $_POST["name"];
		$name_j = $_POST["name_j"];
		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$brith = $_POST["brith"];
		$hight = $_POST["hight"];
		$grade = $_POST["grade"];
		$avility_name = $_POST["avility_name"];
		$avility = addslashes($_POST["avility"]);
		$position = $_POST["position"];
		$info = addslashes($_POST["info"]);
		$etc = addslashes($_POST["etc"]);
		$hidden = addslashes($_POST["hidden"]);
		$team = $_POST["team"];
		
		query("INSERT INTO AU_PLAYER (p_word, p_look, p_name, p_name_j, p_sex, p_age, p_brith, p_hight, p_grade, p_ability_name, p_ability, p_position, p_info, p_etc, p_hidden, p_team) 
		VALUES ('$word', '$look', '$name', '$name_j', '$sex', '$age', '$brith', '$hight', '$grade', '$avility_name', '$avility', '$position', '$info', '$etc', '$hidden', '$team')");
		
		$num = fetchAll("SELECT MAX(p_no) no FROM AU_PLAYER");
		query("update MEMBER set m_au = $num->no where m_name = '$name'");
		
		am("등록되었습니다.","/au_admin/index.php/player/state");
	break;
		
	case "addState":
		$name = $_POST["name"];
		$hp = $_POST["hp"];
		$str = $_POST["str"];
		$con = $_POST["con"];
		$esp = $_POST["esp"];
		
		query("insert into AU_STATE (s_player, s_hp, s_str, s_con, s_esp) VALUE ('$name', '$hp', '$str', '$con','$esp')");
		query("insert into AU_HP (hp_player, hp_num, hp_type, hp_info, hp_date) VALUE ('$name', '10000', '1', '기본 체력', now())");
		query("insert into AU_HP (hp_player, hp_num, hp_type, hp_info, hp_date) VALUE ('$name', 1000*$hp, '1', '스텟 배분', now())");
		am("등록되었습니다.","/au_admin/index.php/player/profile");
	break;
		
	case "addPoint":
		$player = $_POST["player"];
		$exp = $_POST["exp"];
		$point = $_POST["point"];
		$info = $_POST["info"];
		
		for($i=0; $i<count($player); $i++){
			query("insert into AU_POINT (po_player, po_type, po_price, po_info, po_date) VALUE ('$player[$i]','1','$point', '$info', now())");
			query("insert into AU_EXP (e_player, e_info, e_add, e_date) VALUE ('$player[$i]','$info', '$exp', now())");
			point($player[$i]);
		}
		
		am("지급되었습니다.","/au_admin/index.php/player/point");
	break;
} 

?>