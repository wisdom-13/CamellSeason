<?php

switch($val1){
	//아이템 구매
	case "shop_buy":
		$no = $_POST["no"];
		$name = $_POST["name"];
		$price = $_POST["price"];
		query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUES ('{$_SESSION["no"]}', '{$no}', '상점구매', now())"); //아이템
		query("insert into POINT (po_ud, po_info, po_price, po_player, po_date) VALUES ('2', '{$name} 구매', '{$price}', '{$_SESSION["no"]}', now())");//화
		point($_SESSION["no"]);
	break;
}