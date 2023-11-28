<?php

switch($val1){
	case "boardWrite":
		$title = $_POST["title"];
		$content = $_POST["content"];
		query("INSERT INTO BOARD (b_title, b_content, b_date) VALUES ('{$title}', '{$content}', now())");
		am("등록되었습니다.","/admin/index.php/setting/board");
	break;
	
	case "qnaWrite":
		$title = $_POST["title"];
		$content = $_POST["content"];
		$type = $_POST["type"];
		query("INSERT INTO QNA (qn_title, qn_content, qn_type, qn_date) VALUES ('{$title}', '{$content}', '{$type}', now())");
		am("등록되었습니다.","/admin/index.php/setting/qna");
	break;
		
	case "addSlide":
		$file = $_FILES["img"];
		$url = $_POST["url"];
		$order = $_POST["order"];
		
		$chk = explode(".",$file["name"]); 
		
		if($chk[1]=="jpeg" || $chk[1]=="png" || $chk[1]=="jpg"){
			$path = "/common/img/slide/".date("mdHis")."_".$file["name"];
			if(move_uploaded_file($file["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$path)){
				query("INSERT INTO BANNER (b_img, b_url, b_order, b_type) VALUES ('{$path}', '{$url}', '{$order}', 1)");
				move("");
			} else {
				echo("INSERT INTO BANNER (b_img, b_url, b_order, b_type) VALUES ('{$path}', '{$url}', '{$order}', 1)");
			}
		} else {
			alert("jpeg, jpg, png의 확장자만 업로드 할 수 있습니다.");
		}
		
	break;
		
	case "addBgm":
		$img = $_POST["img"];
		$url = $_POST["url"];
		$order = $_POST["order"];
		query("INSERT INTO BANNER (b_img, b_url, b_order, b_type) VALUES ('{$img}', '{$url}', '{$order}', 2)");
		move("");
	break;
		
	case "delSlide":
		query("DELETE FROM BANNER where b_no = {$val2}");
		move("");
	break;
		
	case "delBgm":
		query("DELETE FROM BANNER where b_no = {$val2}");
		move("");
	break;
		
}

?>