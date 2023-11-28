<?php

switch($val1){
	
	case "twt_ok":
		query("UPDATE POINT_CAL SET pc_ok_date = now() where pc_no = '{$val2}'");
		query("insert into POINT (po_info, po_price, po_player, po_date) SELECT pc_text, pc_price, pc_player, pc_date FROM POINT_CAL where pc_no = '{$val2}'");
		$chk = fetchAll("select * from POINT_CAL where pc_no = '{$val2}'");
		point($chk->pc_player);
		move("/admin/index.php/point/twt");
	break;
		
	case "event_ok":
		$chk = fetchAll("select * from POINT_CAL where pc_no = '{$val2}'");
		$player = $chk->pc_player;
		$price = $chk->pc_price;
		$item = explode(",",$chk->pc_item);
		$text = $chk->pc_text;
		for($i=0; $i < count($item); $i++){ 
			$num = explode("^", $item[$i]);
			for($j=0; $j < $num[1]; $j++){ 
				$val .= "('{$player}', '$num[0]', '{$text}', now()),";
			}
		}
		$v = substr($val , 0, -1);
		query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v");
		if(!isset($price) || $price != "0"){ query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('{$player}', '{$price}', '{$text}', now())");}
		query("UPDATE POINT_CAL SET pc_ok_date = now() where pc_no = '{$val2}'");
		point($player);
		move("/admin/index.php/point/event");
	break;
	
	/*
	case "give_point":
		if($_POST["give_point"]){
			$player = $_POST["player"];
			$price = $_POST["price"];
			$num = $_POST["num"];
			$type = $_POST["content"];
			query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('{$player}', '{$price}', '{$type}', now())");
			point($player);
			move("/admin/index.php/point/use_list");
		}
	break;
	*/
		
	case "point_chk":
		for($i=1; $i<50; $i++ ){ if(isset($PLAYER[$i])){
			point($i);
		}} 
		move("/");
	break; 
	
		
			
} 
?>