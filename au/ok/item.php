<?php

switch($val1){
	//아이템 구매
	case "item_buy":
		$no = $_POST["no"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		query("insert into AU_INVENTORY (in_player, in_item, in_get_info, in_get_date) VALUES ('$AU', '{$no}', '상점구매', now())"); //아이템
		query("insert into AU_POINT (po_type, po_info, po_price, po_player, po_date) VALUES ('2', '{$name} 구매', '{$price}', '$AU', now())");//화
		point($AU);
	break;
		
	case "item_use":
		$no = $_POST["no"];
		query("update AU_INVENTORY set in_use_info = '사용', in_use_date = now() where in_player = '$AU' and in_no = '$no'");
		
	break;
		
	case "item_throw":
		$no = $_POST["no"];
		query("update AU_INVENTORY set in_use_info = '버림', in_use_date = now() where in_player = '$AU' and in_no = '$no'");
	break;
}