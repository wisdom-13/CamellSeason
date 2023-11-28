<?php

switch($val1){

	case "login":
		$id = $_POST["id"];
		$pw = $_POST["pw"];
		$chk = fetchAll("select * from MEMBER where m_id = '{$id}' and m_pw = '{$pw}'");
		if($chk){	
			if($chk->m_use=="3"){
				isset($_POST["login"]) ? am("관리자의 승인을 기다려주세요.","/m/index.php") : am("관리자의 승인을 기다려주세요.");
			} else {
				isset($_POST["login"]) ? move("/m/index.php") : move($URL);
				$_SESSION["no"] = $chk->m_no;
				$_SESSION["id"] = $chk->m_id;
				$_SESSION["name"] = $chk->m_name;
				$_SESSION["p1"] = $chk->m_player;
				$_SESSION["p2"] = $chk->m_player2;
				$_SESSION["p3"] = $chk->m_player3;
				$_SESSION["au"] = $chk->m_au;
				$_SESSION["point"] = $chk->m_point;
				$_SESSION["use"] = $chk->m_use;
			}
		} else {
			isset($_POST["login"]) ? am("아이디 또는 비밀번호가 옳지 않습니다.","/m/index.php") : am("아이디 또는 비밀번호가 옳지 않습니다.");
		}
	break;
	
	case "join":
		$id = $_POST["id"];
		$pw = $_POST["pw"];
		$name = $_POST["name"];
		$chk = fetchAll("select * from MEMBER where m_id = '{$id}'");
		if($chk){
			isset($_POST["join"]) ? am("중복된 아이디 입니다.","/m/index.php") : am("중복된 아이디 입니다.");;
		} else {
			query("insert into MEMBER set m_id = '{$id}', m_pw = '{$pw}', m_name = '{$name}', m_date = now()");
			isset($_POST["join"]) ? am("회원가입이 완료되었습니다.","/m/index.php") : am("회원가입이 완료되었습니다.");;
		}
	break;
	
	case "logout":
		session_destroy();
		move("/index.php");
	break;	
		
	case "m_logout":
		session_destroy();
		move("/m/index.php");
	break;	
}

?>