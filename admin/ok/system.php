<?php

switch($val1){
	case "letter":
		$to = $_POST["to"];
		$from = $_POST["from"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		$price = $_POST["price"];
		$item = $_POST["item"];
		
		if($from == "0"){
			foreach(query("select * from MEMBER") as $p){ 
				query("INSERT INTO LETTER (l_to, l_from, l_title, l_content, l_item, l_get, l_date) VALUES ('{$p->m_no}', '$to', '$title', '$content', '49^1', 0, now())");
				//query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('{$p->m_no}', '{$price}', '유우호선생님의 선물', now())");
				
		}}
		
		//query("INSERT INTO BOARD (b_title, b_content, b_date) VALUES ('{$title}', '{$content}', now())");
		am("등록되었습니다.","/admin/index.php/setting/board");
	break;
		
	case "story":
		$act = $_POST["act"];
		$chapter = $_POST["chapter"];
		$title = $_POST["title"];
		$content = addslashes($_POST["content"]);
		$yn = ($_POST["yn"]=="yes") ? "1" : "2" ;
		query("insert into STORY (s_title, s_content, s_act, s_chapter) VALUES ('$title', '$content', '$act', '$chapter')");
		am("등록되었습니다.","/admin/index.php/system/story");
	break;
		
	case "story_update":
		$title = $_POST["title"];
		$content = addslashes($_POST["content"]);
		$yn = ($_POST["yn"]=="yes") ? "1" : "2" ;
		query("update STORY set s_title = '$title', s_content = '$content', s_yn = '$yn' where s_no = $val2");
		am("수정되었습니다.","/admin/index.php/system/story");
	break;
}

?>