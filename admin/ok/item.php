<?php

switch($val1){
	//아이템 추가
	case "addItem":
		if($_POST["submit_insert_item"]){
			$name = $_POST["name"];
			$content = $_POST["content"];
			$price = $_POST["price"];
			$type = $_POST["type"];
			$grade = $_POST["grade"];
			$sys = $_POST["sys"];
			$use = $_POST["use"];
			$shop = $_POST["shop"];
			$yn = $_POST["yn"];
			$file = $_FILES["img"];
			$path = "/admin/common/img/items/".time()."_".$name;
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
			
			query("INSERT INTO ITEM (i_name, i_img, i_content, i_price, i_type, i_grade, i_sys, i_use, i_shop, i_yn) VALUES ('{$name}', '{$path}', '{$content}', '{$price}', '{$type}', '{$grade}', '{$sys}', '{$use}', '{$shop}', '{$yn}')");
			move("/admin/index.php/item/items/0");
		}
	break;
	
	//아이템 수정
	case "editItem":
		if($_POST["submit_update_item"]){
			$name = $_POST["name"];
			$content = $_POST["content"];
			$price = $_POST["price"];
			$type = $_POST["type"];
			$grade = $_POST["grade"];
			$sys = $_POST["sys"];
			$use = ($_POST["use"]=="1") ? "1" : "2" ;
			$shop = ($_POST["shop"]=="1") ? "1" : "2" ;
			$yn = ($_POST["yn"]=="1") ? "1" : "2" ;
			$link = $_POST["val1"];
			
			query("UPDATE ITEM SET i_name = '{$name}', i_content = '{$content}', i_price = '{$price}', i_type = '{$type}', i_grade = '{$grade}', i_sys = '{$sys}', i_use = '{$use}', i_shop = '{$shop}', i_yn = '{$yn}' where i_no = '{$val2}'");
			move("/admin/index.php/item/edit/$link");
		}
	break;
		
	//이미지 수정 
	case "editImg":
		$no = $_POST["no"];
		$path = $_POST["img_be"];
		$file = $_FILES["img"];
		
		$ff = explode(".",$file["name"]);
			
		if($ff[1]=="png"){
			if(!move_uploaded_file($file["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}".$path)){
				am("파일 업로드에 실패했습니다.","");
				return;   
			}	
		} else {
			alert("png 확장자만 업로드 할 수 있습니다.");
			move("/admin/index.php/item/edit");
			return;   
		}
		
		move("/admin/index.php/item/edit/$val2");
	break;
	
	//아이템 삭제
	case "delItem":
		query("DELETE FROM ITEM where i_no = '{$val2}'");
		move("/admin/index.php/item/items");
	break;	
	
	//아이템 지급
	case "addGet":
		if($_POST["addGet"]){
		
			$val = "";
			$player = $_POST["player"];
			$price = $_POST["price"];
			$text = $_POST["text"];
			
			$item1 = ($_POST["item1"]=="0" || $_POST["num1"]=="0") ? "" : $_POST["item1"]."^".$_POST["num1"].",";
			$item2 = ($_POST["item2"]=="0" || $_POST["num2"]=="0") ? "" : $_POST["item2"]."^".$_POST["num2"].",";
			$item3 = ($_POST["item3"]=="0" || $_POST["num3"]=="0") ? "" : $_POST["item3"]."^".$_POST["num3"].",";
			$items = substr($item1.$item2.$item3 , 0, -1);
			$item = explode(",",$items);
			
			
			for($h=0; $h<count($player); $h++){
				for($i=0; $i < count($item); $i++){ 
					$num = explode("^", $item[$i]);
					for($j=0; $j < $num[1]; $j++){ 
						$val .= "('$player[$h]', '$num[0]', '$text', now()),";
					}
				}
			}
			$v = substr($val , 0, -1);
			
			query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v");
			
			if($price != ""){
			for($h=0; $h<count($player); $h++){
			query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('$player[$h]', '{$price}', '{$text}', now())");
			point($player[$h]);
			}}
			
			move("/admin/index.php/point/use_list");
			
		}
		
	break;
		
	//레시피 추가
	case "addRecipe":
		if($_POST["addRecipe"]){
			$item = $_POST["item"];
			$recipe = $_POST["recipe"];
			$item1 = ($_POST["item1"]=="0" || $_POST["num1"]=="0") ? "" : $_POST["item1"]."^".$_POST["num1"].",";
			$item2 = ($_POST["item2"]=="0" || $_POST["num2"]=="0") ? "" : $_POST["item2"]."^".$_POST["num2"].",";
			$item3 = ($_POST["item3"]=="0" || $_POST["num3"]=="0") ? "" : $_POST["item3"]."^".$_POST["num3"].",";
			$item4 = ($_POST["item4"]=="0" || $_POST["num4"]=="0") ? "" : $_POST["item4"]."^".$_POST["num4"].",";
			$item5 = ($_POST["item5"]=="0" || $_POST["num5"]=="0") ? "" : $_POST["item5"]."^".$_POST["num5"].",";
			$items = substr($item1.$item2.$item3.$item4.$item5 , 0, -1);
			
			query("insert into RECIPE (re_item, re_goods, re_book) VALUES ('{$items}','{$item}','{$recipe}')");
			move("/admin/index.php/item/recipe");
		}
	break;
		
	//레시피 삭제
	case "delRecipe":
		query("DELETE FROM RECIPE where re_no = '{$val2}'");
		move("/admin/index.php/item/recipe");
	break;	
	
} 

?>