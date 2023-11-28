<?php

switch($val1){
	case "addItem":
		if($_POST["submit_insert_item"]){
			$name = $_POST["name"];
			$content = $_POST["content"];
			$price = $_POST["price"];
			$type = $_POST["type"];
			$sys = $_POST["sys"];
			$use = $_POST["use"];
			$shop = $_POST["shop"];
			$yn = $_POST["yn"];
			$file = $_FILES["img"];
			$path = "/admin/common/img/items/".time()."_".$name.".png";	
			$ff = explode(".",$file["name"]);
			
			if($ff[1]=="png"){
				if(!move_uploaded_file($file["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$path)){
					am("파일 업로드에 실패했습니다.","");
					return;   
				}	
			} else {
				alert("png 확장자만 업로드 할 수 있습니다.");
				move("/admin/index.php/item/items");
				return;   
			}
			
			query("INSERT INTO AU_ITEM (i_name, i_img, i_content, i_price, i_type, i_sys, i_use, i_shop, i_yn) VALUES ('{$name}', '{$path}', '{$content}', '{$price}', '{$type}', '1', '{$use}', '{$shop}', '{$yn}')");
			move("/au_admin/index.php/item/items/0");
		}
	break;
	
	case "addGet":
		$player = $_POST["player"];
		$item = $_POST["item"];
		$num = $_POST["num"];
		$info = $_POST["info"];
		
		for($i=0; $i<count($player); $i++){
			for($j=0; $j<$num; $j++){
				query("insert into AU_INVENTORY (in_player, in_item, in_get_info, in_get_date) VALUE ('$player[$i]', '$item', '$info', now())");	
			}
		}
		am('지급되었습니다.','/au_admin/index.php/item/inventory');
	break;
} 

?>