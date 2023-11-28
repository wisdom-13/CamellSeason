<?php

switch($val1){

	case "login":
		$id = $_POST["id"];
		$pw = $_POST["pw"];
		$chk = fetchAll("select * from MEMBER where m_id = '{$id}' and m_pw = '{$pw}'");
		if($chk){	
			if($chk->m_use=="3"){
				am("관리자의 승인을 기다려주세요.");
			} else {
				move("/au/index.php");
				$_SESSION["no"] = $chk->m_no;
				$_SESSION["id"] = $chk->m_id;
				$_SESSION["name"] = $chk->m_name;
				$_SESSION["p1"] = $chk->m_player;
				$_SESSION["p2"] = $chk->m_player2;
				$_SESSION["p3"] = $chk->m_player3;
				$_SESSION["au"] = $chk->m_au;
				$_SESSION["point"] = $chk->m_point;
				$_SESSION["au_point"] = $chk->m_au_point;
				$_SESSION["use"] = $chk->m_use;
				point($AU);
			}
		} else {
			am("아이디 또는 비밀번호가 옳지 않습니다.","/au/index.php");
		}
	break;
	
	case "logout":
		session_destroy();
		move("/au/index.php");
	break;	
		
	case "re_add":
		$name = $_POST["name"];
		if($name=="0"){ am("상태 캐릭터를 선택해주세요.",""); return; }
		$title = $_POST["title"];
		$content = $_POST["content"];
		query("insert into AU_RELATION set r_player = '$AU', r_player_to = '$name', r_title = '$title', r_content = '$content'");
		move("/au/index.php/my");
	break;
		
	case "re_del":
		query("delete from AU_RELATION where r_no = '$val2'");
		move("/au/index.php/my");
	break;
		
}

?>