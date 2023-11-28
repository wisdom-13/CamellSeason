<?php

switch($val1){
	//트윗수 정산
	case "cal_twt":
		$chk = fetchAll("SELECT sum(pc_price) point FROM POINT_CAL where pc_type = 2 and pc_player = '{$_SESSION["no"]}' group by pc_player");
		$today = date("m.d");
		$point = $_POST["twt"]; //누적 트윗수
		$price = $point - $chk->point; //정산되는 트윗수
		if($price<=0){
			am("현재 트윗수가 바르지 않습니다.");
		} else {
			query("INSERT INTO POINT_CAL (pc_player, pc_price, pc_item, pc_text, pc_type, pc_date) VALUES ({$_SESSION["no"]}, $price, $point, '$today 트윗정산', 2, now())");
			if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
				am($price."花 정산을 요청했습니다.","/m/index.php/point");
			} else {  
				am($price."花 정산을 요청했습니다.","/index.php/point");
			}  
		}
	break;
		
	case "cal_event":
		$price = isset($_POST["price"]) ? $_POST["price"] : "0" ;
		
		$date = explode("-",$_POST["date"]);
		echo $text = $date[1].".".$date[2]." ".$_POST["text"];
		$item1 = ($_POST["item1"]=="0" || $_POST["num1"]=="0") ? "" : $_POST["item1"]."^".$_POST["num1"].",";
		$item2 = ($_POST["item2"]=="0" || $_POST["num2"]=="0") ? "" : $_POST["item2"]."^".$_POST["num2"].",";
		$item3 = ($_POST["item3"]=="0" || $_POST["num3"]=="0") ? "" : $_POST["item3"]."^".$_POST["num3"].",";
		$item = substr($item1.$item2.$item3 , 0, -1);
		
		query("INSERT INTO POINT_CAL (pc_player, pc_price, pc_item, pc_text, pc_type, pc_date) VALUES ('{$_SESSION["no"]}', '{$price}', '{$item}', '{$text}', 1, now())");
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/point");
		} else {  
			move("/index.php/point");
		}  
		
		
	break;
		
	case "cal_del":
		query("delete from POINT_CAL where pc_no = '{$val2}' and pc_player = '{$_SESSION["no"]}'");
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/point");
		} else {  
			move("/index.php/point");
		}  
	break;
}

?>