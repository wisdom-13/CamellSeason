<?php
$my_no = $_SESSION["no"];
switch($val1){
	case "quest_ok":
		$chk = fetchAll("select * from REQUEST where q_player_to = '{$_SESSION["no"]}' and q_type = 3");
		$date_chk = fetchAll("select * from REQUEST where q_player_to = '{$_SESSION["no"]}' order by q_date_end desc limit 0,1"); 
		$interval = date_diff(date_create(date('Y-m-d')), date_create($date_chk->q_date_end));

		if(!$chk){
			if($interval->days >= 1 || !isset($date_chk->q_no)){
				if(fetchAll("select * from REQUEST where q_no = $val2 and q_type = 2")){
					query("update REQUEST set q_player_to = $my_no, q_type = '3', q_date_end = now() where q_no = '{$val2}'");
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						move("/m/index.php/quest");
					} else {  
						move("/index.php/quest");
					}  
				} else {
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am("이미 수락된 의뢰입니다.","/m/index.php/quest");
					} else {  
						am("이미 수락된 의뢰입니다.","/index.php/quest");
					}  
				}
				
			} else {
				if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
					am("의뢰는 1일 1회 수락할 수 있습니다.","/m/index.php/quest");
				} else {  
					am("의뢰는 1일 1회 수락할 수 있습니다.","/index.php/quest");
				}  
			}
		} else {
			if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
				am("진행중인 의뢰를 완료해야만 다음 의뢰를 수락할 수 있습니다.","/m/index.php/quest");
			} else {  
				am("진행중인 의뢰를 완료해야만 다음 의뢰를 수락할 수 있습니다.","/index.php/quest");
			}  
			
		} 
		
	break;
	case "quest_end":
		$chk = fetchAll("select * from REQUEST where q_no = '{$val2}' and q_player = '{$_SESSION["no"]}' and q_type = 3");
		$player = $chk->q_player;
		$player_to = $chk->q_player_to;
		$price = $chk->q_price;
		$item = $chk->q_item;
	
		query("update REQUEST set q_type = '4' where q_no = '{$val2}' and q_player = '$player' and q_type = '3'");
		query("insert into POINT (po_ud, po_info, po_price, po_player, po_date) VALUES ('1', '의뢰 요청 보상', '30', '$player', now())");//화
		point($player);
		query("insert into POINT (po_ud, po_info, po_price, po_player, po_date) VALUES ('1', '의뢰 수행 보상', '$price', '$player_to', now())");//화
		point($player_to);
		
		//보상 아이템이 있을떄 아이템 지급
		if($item !== 0){
			query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUES ('$player_to', '$item', '의뢰 수행 보상', now())"); //아이템
		}
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/quest");
		} else {  
			move("/index.php/quest");
		}  
		
	break;
	case "quest_del":
		query("delete from REQUEST where q_no = '{$val2}' and q_player = '{$_SESSION["no"]}' and q_type in (1,2)");
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/quest");
		} else {  
			move("/index.php/quest");
		}  
	break; 
	case "quest_write":
		$title = $_POST["title"];
		$content = addslashes($_POST["content"]);
		
		query("insert into REQUEST (q_player, q_title, q_content, q_price, q_type, q_date) VALUE ('{$_SESSION["no"]}','{$title}', '{$content}', '20', '1', now())");
		
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/quest");
		} else {  
			move("/index.php/quest");
		}  
	break;
}
?>