<?php

switch($val1){
	
	case "okQuest":
		query("UPDATE REQUEST SET q_type = '2' where q_no = '{$val2}'");
		move("/admin/index.php/quest/wait");
	break;
		
	case "addQuest":
		if($_POST["addQuest"]){
			
			$player = $_POST["player"];
			$title = $_POST["title"];
			$content = addslashes($_POST["content"]); // 쌍따옴표 제거
			$price = $_POST["price"];
			$item = $_POST["item"];
			query("insert into REQUEST (q_player, q_title, q_content, q_price, q_item, q_type, q_date) 
			VALUE ('{$player}', '{$title}', '{$content}', '{$price}', '{$item}', '2', now())");
			move("/admin/index.php/quest/admin");
		}
	break;
	
	/*	
	case "allQuest":
		foreach(query("select * from MEMBER") as $row){
			$item = mt_rand(278, 282);
			query("insert into REQUEST (q_player, q_title, q_content, q_price, q_item, q_type, q_date, q_player_to, q_date_end) VALUE (3, '축제준비', '(의뢰에는 금지된 신사 출입증이 함께 들어있다.) <br><br>예대제를 맞이하여 금지된 숲 안에 있는 신사를 새로이 단장할 예정입니다. <br>또한 해당 신사 내 물건을 예대제에 쓸 예정인데. <br>그 물건이 너무 많아 아이들의 도움을 빌려야 할 것 같습니다.<br>지금은 폐쇄된 신사에 필요한 도구들이 보관되어 있으니 가져와주세요.<br><br>아래는 그 품목입니다.<br><br>가면 <br>우는 여인이 그려진 그림<br>붉은 실이 가운데 묶인 호리병<br>작은 단도<br>부채<br>장신구<br>낡은 종이 뭉치<br><br>물건들은 가져오고 난 뒤 본부에 있는 창고에 놓아주세요. ', '0', '$item', '3', now() ,'{$row->m_no}', now())");
			move("/admin/index.php/quest/admin");
		}
	break;
	*/
		
	case "endQuset":
		$chk = fetchAll("select * from REQUEST where q_no = '{$val2}' and (q_player = '1' or q_player = '2' or q_player = '3') and q_type = 3");
		$player_to = $chk->q_player_to;
		$price = $chk->q_price;
		$item = $chk->q_item;
	
		query("update REQUEST set q_type = '4' where q_no = '{$val2}' and q_type = '3'");
		query("insert into POINT (po_ud, po_info, po_price, po_player, po_date) VALUES ('1', '의뢰 수행 보상', '$price', '$player_to', now())");//화
		point($player_to);
		
		//보상 아이템이 있을떄 아이템 지급
		if(isset($item)){
			query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUES ('$player_to', '$item', '의뢰 수행 보상', now())"); //아이템
		}
		move("/admin/index.php/quest/admin");
	break;
		
	case "delQuest":
		query("DELETE FROM REQUEST where q_no = '{$val2}'");
		move("/admin/index.php/quest/admin");
	break;
		
} 

?>