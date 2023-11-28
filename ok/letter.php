<?php 
	
switch($val1){
	case "letter_write":
		$to = $_POST["to"];
		$to_item = $PLAYER[$to]."에게 보냄";
		$from = $_SESSION["no"];
		$title = $_POST["title"];
		$content = addslashes($_POST["content"]);
		
		//if($_POST["item1"]==$_POST["item2"] || $_POST["item1"]==$_POST["item3"] || $_POST["item2"]==$_POST["item3"]){ am("아이템을 다시 선택해주세요.","/index.php/letter/write"); return; }
		
		$item1 = ($_POST["item1"]=="0" || $_POST["num1"]=="0") ? "" : $_POST["item1"]."^".$_POST["num1"].",";
		$item2 = ($_POST["item2"]=="0" || $_POST["num2"]=="0") ? "" : $_POST["item2"]."^".$_POST["num2"].",";
		$item3 = ($_POST["item3"]=="0" || $_POST["num3"]=="0") ? "" : $_POST["item3"]."^".$_POST["num3"].",";
		
		
		$item = substr($item1.$item2.$item3 , 0, -1);
		$get = ($item=="") ? "1" : "0" ;
		
		query("insert into LETTER (l_to, l_from, l_title, l_content, l_item, l_get, l_date) VALUE ('{$to}','{$from}','{$title}', '{$content}', '{$item}', '{$get}', now())");
		
		if($item1 != ""){
		query("update INVENTORY set in_type_use = '{$to_item}', in_use_date = now() where in_item = '{$_POST["item1"]}' and in_player = '{$_SESSION["no"]}' and in_use_date is NULL limit {$_POST["num1"]}");
		}
		if($item2 != ""){
		query("update INVENTORY set in_type_use = '{$to_item}', in_use_date = now() where in_item = '{$_POST["item2"]}' and in_player = '{$_SESSION["no"]}' and in_use_date is NULL limit {$_POST["num2"]}");
		}
		if($item3 != ""){
		query("update INVENTORY set in_type_use = '{$to_item}', in_use_date = now() where in_item = '{$_POST["item3"]}' and in_player = '{$_SESSION["no"]}' and in_use_date is NULL limit {$_POST["num3"]}");
		}
		
		move("/index.php/letter");
	break;
	
	case "letter_get":
		$no = $_POST["no"];
		$to = $_SESSION["no"];
		$from = $PLAYER[$_POST["from"]]."에게 받음";
		$val = "";
		$item = explode(",",$_POST["item"]);
		for($i=0; $i < count($item); $i++){ 
			$num = explode("^", $item[$i]);
			for($j=0; $j < $num[1]; $j++){ 
				$val .= "('{$to}', '$num[0]', '{$from}', now()),";
			}
		}
		$v = substr($val , 0, -1);
		
		query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v");
		query("update LETTER set l_get = 1 where l_no = '{$no}'");
	break;
		
}
