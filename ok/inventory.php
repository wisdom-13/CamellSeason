<?php 
	
switch($val1){
	case "use":
		query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '{$val2}' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
		
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/inventory/list/0");
		} else {  
			move("/index.php/inventory/list/0");
		}  
	break;
	
	case "use_rand":
		$chk = fetchAll("select * from INVENTORY where in_item = $val2 and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
		if($chk){
			$all = array();
			$grade1 = array();
			$grade2 = array();
			$grade3 = array();
			$etc = array();
			$recipe = array();
			$recipe_cook = array();
			$price1 = array("500","300","300","300","300","300","300","300","300","100","100","100","100","100","100","100","100","100","50","50");
			$price2 = array("1","2","3","4");
			$no = array("꽝!");
			foreach(query("select * from ITEM where i_grade = '1'") as $row){ array_push($grade1, $row->i_no); }
			foreach(query("select * from ITEM where i_grade = '2'") as $row){ array_push($grade2, $row->i_no); }
			foreach(query("select * from ITEM where i_grade = '3'") as $row){ array_push($grade3, $row->i_no); }
			foreach(query("select * from ITEM where i_type = '4'") as $row){ array_push($etc, $row->i_no); }
			foreach(query("select * from ITEM where i_type = '2' and i_no not in (249,283)") as $row){ array_push($recipe, $row->i_no); }
			foreach(query("select * from ITEM i, RECIPE r where i.i_no = r.re_book and re_type = 3") as $row){ array_push($recipe_cook, $row->i_no); }

			switch($val2){
				case "356": //복주머니 
				case "40": //신비로운 쪽지
					$rand = mt_rand("1","100");
					if($rand==1){
						$price = "50";
					} else if($rand>1 && $rand <=10){
						$item = $grade3[mt_rand("0",count($grade3)-1)];
					} else if($rand>10 && $rand <=20){
						$item = $grade2[mt_rand("0",count($grade2)-1)];
					} else if($rand>20 && $rand <=35){
						$item = $grade1[mt_rand("0",count($grade1)-1)];
					} else if($rand>35 && $rand <=55){
						$price = $price2[mt_rand("0",count($price2)-1)];
					} else { 
						$item = $etc[mt_rand("0",count($etc)-1)];
					}
					
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '$val2' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
					
					if(isset($item)){
						$text = $ITEM[$item];
						query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE ('{$_SESSION["no"]}', $item, '신비로운 쪽지에서 획득', now())");
					} else {
						$text = $price."花";
						query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('{$_SESSION["no"]}', $price, '신비로운 쪽지에서 획득', now())");
						point($_SESSION["no"]);	
					}
					
					
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am("[".$text."] 를 획득했다!","/m/index.php/inventory/list/0");
					} else {  
						am("[".$text."] 를 획득했다!","/index.php/inventory/list/0");
					}  
						
				break;
				case "355": //조미료 
				case "41": //타마테바코
					$rand = mt_rand("0",count($recipe)-1);
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '$val2' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
					query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE ('{$_SESSION["no"]}', $recipe[$rand], '타마테바코에서 획득', now())");
					am("[".$ITEM[$recipe[$rand]]."] 를 획득했다!","/index.php/inventory/list/0");
					
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am("[".$ITEM[$recipe[$rand]]."] 를 획득했다!","/m/index.php/inventory/list/0");
					} else {  
						am("[".$ITEM[$recipe[$rand]]."] 를 획득했다!","/index.php/inventory/list/0");
					}  
				break;
				case "235": //특별상자
					$price = $price1[mt_rand("0",count($price1)-1)];
					array_push($all, $grade3[mt_rand("0",count($grade3)-1)]);
					for($i=0; $i<5; $i++){ array_push($all, $grade2[mt_rand("0",count($grade2)-1)]); }
					for($j=0; $j<10; $j++){ array_push($all, $grade1[mt_rand("0",count($grade1)-1)]); }
					
					for($h=0; $h<16; $h++){
						$v .= "('{$_SESSION["no"]}', '$all[$h]', '이즈야의 특별 상자에서 획득', now()),";
						$alert .= $ITEM[$all[$h]].", ";
					}
					
					$v = substr($v , 0, -1);
					$alert = substr($alert , 0, -1);
					
					alert("이즈야의 특별 상자에서 ".$price."花, ".$alert." 를 획득했다!");
					query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v");
					query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('{$_SESSION["no"]}', $price, '이즈야의 특별 상자에서 획득', now())");
					point($_SESSION["no"]);	
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '235' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
				
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am(alert("이즈야의 특별 상자에서 ".$price."花, ".$alert." 를 획득했다!"),"/m/index.php/inventory/list/0");
					} else {  
						am(alert("이즈야의 특별 상자에서 ".$price."花, ".$alert." 를 획득했다!"),"/index.php/inventory/list/0");
					}  
				break;
				case "236" : //약초꾼의 보따리
					$all = array("68", "63", "93", "55", "66", "70");
					for($i=0; $i<6; $i++){
						$v .= "('{$_SESSION["no"]}', '$all[$i]', '약초꾼의 보따리에서 획득', now()),";
						$alert .= $ITEM[$all[$i]].", ";
					}
					$v = substr($v , 0, -1);
					$alert = substr($alert , 0, -1);
					
					query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v, $v, $v, $v, $v");
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '236' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am("약초꾼의 보따리에서 나무토막 5개, 새벽에 받은 이슬 5개, 벚꽃잎 5개, 나뭇잎 5개, 낡은 천 5개, 종이 5개를 획득했다!","/m/index.php/inventory/list/0");
					} else {  
						am("약초꾼의 보따리에서 나무토막 5개, 새벽에 받은 이슬 5개, 벚꽃잎 5개, 나뭇잎 5개, 낡은 천 5개, 종이 5개를 획득했다!","/index.php/inventory/list/0");
					}  
				break;
				case "282" : //교장선생님 보따리
					$all = array("68", "63", "93", "55", "66", "70");
					for($i=0; $i<6; $i++){
						$v .= "('{$_SESSION["no"]}', '$all[$i]', '입학 기념 환영 보따리에서 획득', now()),";
						$alert .= $ITEM[$all[$i]].", ";
					}
					$v = substr($v , 0, -1);
					$alert = substr($alert , 0, -1);
					
					query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v, $v, $v, $v, $v");
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '282' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am("입학 기념 환영 보따리에서 나무토막 5개, 새벽에 받은 이슬 5개, 벚꽃잎 5개, 나뭇잎 5개, 낡은 천 5개, 종이 5개를 획득했다!","/m/index.php/inventory/list/0");
					} else {  
						am("입학 기념 환영 보따리에서 나무토막 5개, 새벽에 받은 이슬 5개, 벚꽃잎 5개, 나뭇잎 5개, 낡은 천 5개, 종이 5개를 획득했다!","/index.php/inventory/list/0");
					}  
				break;
				case "239": //비법서 보따리
					//for($i=0; $i<5; $i++){ array_push($all, $recipe_cook[mt_rand("0",count($grade2)-1)]); }
					$v == "";
					for($h=0; $h<5; $h++){
						$cook = $recipe_cook[mt_rand("0",count($recipe_cook)-1)];
						$v .= "('{$_SESSION["no"]}', '$cook', '비법서 보따리에서 획득', now()),";
						$alert .= $ITEM[$cook].", ";
					}
					$v = substr($v , 0, -1);
					$alert = substr($alert , 0, -1);
					query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v");
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '239' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
					
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am(alert("비법서 보따리에서 ".$alert." 를 획득했다!"),"/m/index.php/inventory/list/0");
					} else {  
						am(alert("비법서 보따리에서 ".$alert." 를 획득했다!"),"/index.php/inventory/list/0");
					}  
				break;
				case "250": //수련상자
					$rand = mt_rand("1","100");
					if($rand==1){
						$item = "9";
					} else if($rand>1 && $rand <=6){
						$item = "111";
					} else if($rand>6 && $rand <=21){
						$high = array("53","81","100");
						$item = $high[mt_rand("0","2")];
					} else { 
						$low = array("52","54","97","56");
						$num = mt_rand("2","5");
						$item = $low[mt_rand("0","3")];
					}
					
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '250' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");

					
					if(isset($num)){
						$v == "";
						for($i=1; $i<=$num; $i++){
							$v .= "('{$_SESSION["no"]}', $item, '수련 지원 상자에서 획득', now()),";
						}
						$v = substr($v , 0, -1);
						query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE $v");
					} else {
						query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE ('{$_SESSION["no"]}', $item, '수련 지원 상자에서 획득', now())");
					}
					
					$alert = isset($num) ? $ITEM[$item]."(".$num.")" : $ITEM[$item] ;
					
					if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
						am(alert("수련 지원 상자에서 ".$alert." 를 획득했다!"),"/m/index.php/inventory/list/0");
					} else {  
						am(alert("수련 지원 상자에서 ".$alert." 를 획득했다!"),"/index.php/inventory/list/0");
					}  
				break;
					
				case "354":
					$rand = mt_rand("1","10000");
					if($rand==1){
						$price = "10000";
					} else if($rand>1 && $rand <=1000){
						$price = "0";
					} else if($rand>1000 && $rand <=2000){
						$price = "1";
					} else if($rand>2000 && $rand <=3000){
						$price = "100";
					} else { 
						$price = "10";
					}
					if($price!=0){
						query("insert into POINT (po_player, po_price, po_info, po_date) VALUES ('{$_SESSION["no"]}', $price, '100일 기념 행운복권에 획득', now())");
						point($_SESSION["no"]);
						if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
							am(alert("100일 기념 행운복권에서 ".$price."花 를 획득했다!"),"/m/index.php/inventory/list/0");
						} else {  
							am(alert("100일 기념 행운복권에서 ".$price."花 를 획득했다!"),"/index.php/inventory/list/0");
						}  
					}
					query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = '354' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");

				break;
			}
		} else {
			am("잘못된 접근입니다.","/index.php/inventory/list/0");
		}
	break;
		
	case "use_hp":
		$chk = fetchAll("select * from INVENTORY where in_item = $val2 and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
		if($chk){
			$hp = array();
			$hp[10] = 100;
			$hp[49] = 10;
			$hp[50] = 20;
			$hp[51] = 30;
			
			$hp_chk = fetchAll("select * from MEMBER where m_no = '{$_SESSION["no"]}'");
			$total = ($hp_chk->m_hp + $hp[$val2] >= 100) ? "100" : $hp_chk->m_hp + $hp[$val2] ;
			
			query("update MEMBER set m_hp = $total where m_no = '{$_SESSION["no"]}'");
			query("update INVENTORY set in_type_use = '사용', in_use_date = now() where in_item = $val2 and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
			
			if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
				am(alert($hp[$val2]."의 체력이 회복되었다."),"/m/index.php/inventory/list/0");
			} else {  
				am(alert($hp[$val2]."의 체력이 회복되었다."),"/index.php/inventory/list/0");
			}  
		} else {
			am("잘못된 접근입니다.","/index.php/inventory/list/0");
		}
	break;
		
	case "push":
		query("update INVENTORY set in_type_use = '버림', in_use_date = now() where in_item = '{$val2}' and in_player = '{$_SESSION["no"]}' and in_use_date is null limit 1");
		if(strpos($_SERVER["HTTP_REFERER"], "/m/") !== false) {  
			move("/m/index.php/inventory/list/0");
		} else {  
			move("/index.php/inventory/list/0");
		}  
		
	break;
		
	case "make":
		$book = $_POST["book"]; //recipe no
		if($book == "160"){ //결정화 제작
			$row = fetchAll("select * from PLAYER where p_no = '{$_SESSION['p1']}'");
			$name = $row->p_avility_name." 결정화";
			$i_no = fetchAll("select * from ITEM where i_name LIKE '$name'");
			query("update INVENTORY set in_type_use = '결정화 제작', in_use_date = now() where in_item = '284' and in_player = '{$_SESSION["no"]}' and in_use_date is NULL order by in_get_date desc limit 5");
			query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE ('{$_SESSION["no"]}','$i_no->i_no','제작',now())");
			
		} else {
			$recipe = fetchAll("select * from RECIPE where re_no = '{$book}'");
			$item = explode(",",$recipe->re_item);
			$to_item = $ITEM[$recipe->re_goods]." 제작";
			for($i=0;$i<count($item);$i++){
				$num = explode("^",$item[$i]);
				query("update INVENTORY set in_type_use = '{$to_item}', in_use_date = now() where in_item = '{$num[0]}' and in_player = '{$_SESSION["no"]}' 
				and in_use_date is NULL limit {$num[1]}");
			}

			query("insert into INVENTORY (in_player, in_item, in_type, in_get_date) VALUE ('{$_SESSION["no"]}','{$recipe->re_goods}','제작',now())");
		}
	break;
	
	
	case "flower":
		foreach(query("select * from MEMBER, PLAYER where p_no = m_player") as $row){
			$name = $row->p_avility_name." 결정화";
			$content = $row->p_name."의 ".$row->p_avility_name."가 깃든 결정화. 단 한 번 상대의 츠보미를 사용할 수 있다.";
			echo("INSERT INTO ITEM (i_name, i_img, i_content, i_price, i_type, i_grade, i_sys, i_use, i_shop, i_yn) VALUES ('$name', '/admin/common/img/items/1538894387_결정화', '$content', '0', '1', '0', '4', '1', '2', '1')");
		}
	break;
	
}

?>