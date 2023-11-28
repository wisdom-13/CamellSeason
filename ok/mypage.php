<?php 
	
switch($val1){
	case "add_profile":
		
		$word = $_POST["word"];
		$hight = $_POST["hight"];
		$look = addslashes($_POST["look"]);
		$info = addslashes($_POST["info"]);
		$etc = addslashes($_POST["etc"]);
		$hidden = addslashes($_POST["hidden"]);
		
		$head = $_FILES["head"];
		$body = $_FILES["body"];
		
		$chk = fetchAll("select * from PLAYER where p_no = '{$_SESSION['p1']}'");
		$avility = addslashes($chk->p_avility);
		
		$num_o = fetchAll("SELECT MAX(p_no) no FROM PLAYER");
		
		query("INSERT INTO PLAYER (p_word, p_name, p_name_j, p_hight, p_brith, p_avility_name, p_sex, p_age, p_class, p_grade, p_look, p_avility, p_info, p_etc, p_hidden, p_type) 
			VALUES ('{$word}', '$chk->p_name', '$chk->p_name_j', '{$hight}', '$chk->p_brith', '$chk->p_avility_name', '$chk->p_sex', '3', '$chk->p_class', '$chk->p_grade', '{$look}', '$avility', '{$info}', '{$etc}', '{$hidden}', '$chk->p_type')");
		
		$num = fetchAll("SELECT MAX(p_no) no FROM PLAYER");
		
		if($num_o == $num){
			am("등록에 실패했습니다. (해당 문구가 계속하여 출력 될 시 총괄계로 문의 부탁드립니다.)");
			return;
	
		}
			
		$head_path = "/admin/common/img/profile/3/head/".$num->no.".png";
		$body_path = "/admin/common/img/profile/3/body/".$num->no.".png";
		
		$head_chk = explode(".",$head["name"]);
		$body_chk = explode(".",$body["name"]);
		
		if($head_chk[1]=="png" && $body_chk[1]=="png"){
			if(!move_uploaded_file($head["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$head_path)){
				am("파일 업로드에 실패했습니다.","");
				return;   
			}
			if(!move_uploaded_file($body["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$body_path)){
				am("파일 업로드에 실패했습니다.","");
				return;   
			}	
		} else {
			am("png 확장자만 업로드 할 수 있습니다.","");
			return;   
		}
		
		query("update MEMBER set m_player3 = $num->no where m_no = '{$_SESSION["no"]}'");
		$_SESSION["p3"] = $num->no;
		
		//echo $head_path;
		
		am("프로필이 등록되었습니다.","/index.php/mypage/list/3");
		
		/*am("프로필 제출 기간이 아닙니다.","/index.php/mypage");*/
	break;
		
	case "update_profile":
		
		$word = $_POST["word"];
		$hight = $_POST["hight"];
		$look = addslashes($_POST["look"]);
		$info = addslashes($_POST["info"]);
		$etc = addslashes($_POST["etc"]);
		$hidden = addslashes($_POST["hidden"]);
		
		$head = $_FILES["head"];
		$body = $_FILES["body"];
		
		if($head["name"]!=""){
			$head_path = "/admin/common/img/profile/3/head/".$_SESSION["p3"].".png";
			$head_chk = explode(".",$head["name"]);
			if($head_chk[1]=="png"){
				if(!move_uploaded_file($head["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$head_path)){
					am("파일 업로드에 실패했습니다.","");
					return;   
				}
			} else {
				am("png 확장자만 업로드 할 수 있습니다.","");
				return;   
			}
		}
		
		if($body["name"]!=""){
			$body_path = "/admin/common/img/profile/3/body/".$_SESSION["p3"].".png";
			$body_chk = explode(".",$body["name"]);
			if($body_chk[1]=="png"){
				if(!move_uploaded_file($body["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$body_path)){
					am("파일 업로드에 실패했습니다.","");
					return;   
				}
			} else {
				am("png 확장자만 업로드 할 수 있습니다.","");
				return;   
			}
		}
		
		query("UPDATE PLAYER set p_word = '{$word}', p_hight = '{$hight}', p_look = '{$look}', p_info = '{$info}', p_etc = '{$etc}', p_hidden = '{$hidden}' where p_no = '{$_SESSION["p3"]}'");
		
		am("프로필이 수정되었습니다.","/index.php/mypage/list/3");
		
		/*am("프로필 제출 기간이 아닙니다.","/index.php/mypage");*/
	break;
	
	case "title_change":
		$no = $_POST["no"];
		$player = $_POST["player"];
		query("UPDATE MEMBER set m_title = $no where m_no = $player");
	break;
		
	case "re_add":
		$player = $_SESSION["no"];
		$player_to = $_POST["name"];
		$title = $_POST["title"];
		$content = addslashes($_POST["content"]);
		$type = "3"; //초등부 :1
		
		$chk = fetchAll("select * from RELATION where r_player = '$player' and r_player_to = '$player_to'");

		if($chk){
			//이미 등록된 관계가 있을 때
			query("UPDATE RELATION set r_title_$type = '$title', r_content_$type = '$content' where r_player = '$player' and r_player_to = '$player_to'");
		} else {
			query("insert into RELATION (r_player, r_player_to, r_title_$type, r_content_$type) VALUES ('$player', '$player_to', '$title', '$content')");
		}

		am("등록되었습니다.","/index.php/mypage/list/3");
	break;
		
	case "log_add":
		$player = $_SESSION["no"];
		$type = $_POST["type"];

		if($type == "url"){
			//외부링크
			$url = $_POST["link"];
			query("insert into LOG (l_url, l_player, l_type, l_date) VALUES ('$url', '$player', '1', now())");
		} else if ($type == "img") {
			$file = $_FILES["file"];
			$path = "/admin/common/img/log/".$player."_".$file["name"]."_".time();
			$ff = explode(".",$file["name"]);
			
			if($ff[1]=="png" || $ff[1]=="jpg" || $ff[1]=="jpeg"){
				if(!move_uploaded_file($file["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$path)){
					am("파일 업로드에 실패했습니다.","");
					return;   
				}	
			} else {
				am("png, jpg, jpeg 확장자만 업로드 할 수 있습니다.","");
				return;   
			}
			query("insert into LOG (l_url, l_player, l_type, l_date) VALUES ('$path', '$player', '2', now())");

		}
		am("등록되었습니다.","/index.php/mypage/list/3");

	break;
		
}
