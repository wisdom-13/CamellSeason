<?php

switch($val1){
		
	case "addPlayer":
		if($_POST["submit_insert_player"]){
			$word = $_POST["word"];
			$name = $_POST["name"];
			$name_j = $_POST["name_j"];
			$hight = $_POST["hight"];
			$brith = $_POST["brith"];
			$avility_name = $_POST["avility_name"];
			$sex = $_POST["sex"];
			$age = $_POST["age"];
			$class = $_POST["class"];
			$grade = $_POST["grade"];
			$look = $_POST["look"];
			$avility = addslashes($_POST["avility"]);
			$info = addslashes($_POST["info"]);
			$etc = addslashes($_POST["etc"]);
			$hidden = addslashes($_POST["hidden"]);
			$type = $_POST["type"];
			query("INSERT INTO PLAYER (p_word, p_name, p_name_j, p_hight, p_brith, p_avility_name, p_sex, p_age, p_class, p_grade, p_look, p_avility, p_info, p_etc, p_hidden, p_type) 
			VALUES ('{$word}', '{$name}', '{$name_j}', '{$hight}', '{$brith}', '{$avility_name}', '{$sex}', '{$age}', '{$class}', '{$grade}', '{$look}', '{$avility}', '{$info}', '{$etc}', '{$hidden}', '{$type}')");
			am("등록되었습니다.","/admin/index.php/player/profile");
		}
	break;
	
	case "updatePlayer":
		if($_POST["submit_update_player"]){
			$word = $_POST["word"];
			$name = $_POST["name"];
			$name_j = $_POST["name_j"];
			$hight = $_POST["hight"];
			$brith = $_POST["brith"];
			$avility_name = $_POST["avility_name"];
			$sex = $_POST["sex"];
			$age = $_POST["age"];
			$class = $_POST["class"];
			$grade = $_POST["grade"];
			$look = $_POST["look"];
			$avility =  addslashes($_POST["avility"]);
			$info =  addslashes($_POST["info"]);
			$etc =  addslashes($_POST["etc"]);
			$hidden =  addslashes($_POST["hidden"]);
			$type = $_POST["type"];
			$no = $_POST["no"];
			query("UPDATE PLAYER SET p_word = '{$word}', p_name = '{$name}', p_name_j = '{$name_j}', p_hight = '{$hight}', p_brith = '{$brith}', p_avility_name = '{$avility_name}', p_sex = '{$sex}', p_age = '{$age}', p_class = '{$class}', p_grade = '{$grade}', p_look = '{$look}', p_avility = '{$avility}', p_info = '{$info}', p_etc = '{$etc}', p_hidden = '{$hidden}', p_type = '{$type}' where p_no = '{$no}'");
			am("수정되었습니다.","/admin/index.php/player/profile");
		}
	break;
		
	case "delPlayer":
		query("DELETE FROM PLAYER where p_no = '{$val2}'");
		move("/admin/index.php/player/profile");
	break;
		
	case "addGrowth":
		$player = $_POST["player"];
		$g_1 = $_POST["g_1"];
		$g_2 = $_POST["g_2"];
		$g_3 = $_POST["g_3"];
		query("INSERT INTO GROWTH (g_player, g_3, g_6, g_9) VALUES ('{$player}', '{$g_1}', '{$g_2}', '{$g_3}')");
		move("/admin/index.php/player/growth");
	break;
	
	case "delGrowth":
		query("DELETE FROM GROWTH where g_no = '{$val2}'");
		move("/admin/index.php/player/growth");
	break;
		
	case "addRel":
		if($_POST["add_rel"]){
			$player = $_POST["player"];
			$player_to = $_POST["player_to"];
			$title = $_POST["title"];
			$content = $_POST["content"];
			$type = $_POST["type"];
			
			$chk = fetchAll("select * from RELATION where r_player = '{$player}' and r_player_to = '{$player_to}'");
			
			if($chk){
				//이미 등록된 관계가 있을 때
				query("UPDATE RELATION set r_title_$type = '$title', r_content_$type = '$content' where r_player = '{$player}' and r_player_to = '{$player_to}'");
			} else {
				query("insert into RELATION (r_player, r_player_to, r_title_$type, r_content_$type) VALUES ('$player', '$player_to', '$title', '$content')");
			}
			
			//query("INSERT INTO RELATION (r_player, r_player_to, r_content, r_type) VALUES ('{$player}', '{$player_to}', '{$content}', '{$type}')");
			move("/admin/index.php/player/rel");
		};
	break;
		
	case "delRel":
		query("DELETE FROM RELATION where r_no = '{$val2}'");
		move("/admin/index.php/player/rel");
	break;
	
	case "addTitle":
		$name = $_POST["name"];
		$content = $_POST["content"];
		$file = $_FILES["img"];
		$num = fetchAll("select t_no from TITLE order by t_no desc limit 1");
		$num = ($num->t_no)+1; 
		$path = "/admin/common/img/title/title_".$num.".png";
		$ff = explode(".",$file["name"]);
	
		
		if($ff[1]=="png"){
			if(!move_uploaded_file($file["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$path)){
				am("파일 업로드에 실패했습니다.","");
				return;   
			}	
		} else {
			alert("png 확장자만 업로드 할 수 있습니다.");
			move("/admin/index.php/player/title");
			return;   
		}
		
		query("INSERT INTO TITLE (t_title, t_img, t_content) VALUES ('{$name}', '{$path}', '{$content}')");
		move("/admin/index.php/player/title");
	break;
		
	case "giveTitle":
		$player = ",".implode(",", $_POST["player"]).",";
		$title = $_POST["title"];
		query("update TITLE set t_get = CONCAT(t_get,'{$player}') where t_no = $title ");
		move("/admin/index.php/player/title");
	break;
		
	case "hp":
		$no = $_POST["no"];
		$total = $_POST["total"];
		query("update MEMBER set m_hp = $total where m_no = $no");
	break;
		
	case "profile_edit":
		$no = $_POST["no"];
		$type = $_POST["type"];
		$val = $_POST["val"];
		query("update PLAYER set p_$type = '$val' where p_no = $no");		
	break;
} 

?>