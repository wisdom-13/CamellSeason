<?php

switch($val1){
	case "pro_chk":
		$chk = fetchAll("SELECT count(pro_stage)+1 stage FROM `PRO` WHERE pro_player = '{$_SESSION["no"]}' and pro_yn = 1");
		$stage = $chk->stage;
		query("UPDATE PLAYER set p_pro = '{$stage}' where p_no = '{$_SESSION["p3"]}'"); //성장하면 수정하기
		move("/index.php/pro");
	break;
		
	case "pro":
		echo "p1 : ".$_SESSION["p1"]." no: ".$_SESSION["no"];
	break;
	
	case "pro_pro":
		$chk = fetchAll("SELECT count(pro_stage)+1 stage FROM `PRO` WHERE pro_player = '{$_SESSION["no"]}' and pro_yn = 1");
		$stage = $chk->stage +1;
		
		if($stage <= 10){
			$num = mt_rand(1,100); 
			$PRO = array(); 
			$PRICE = array();
			foreach(query("SELECT * FROM PRO_PRO") as $row){
				$PRO[$row->pp_stage] = $row->pp_pro; //확률 $PRO[2] = 40
				$PRICE[$row->pp_stage] = $row->pp_price; //화 
			}
			if($POINT->m_point >= $PRICE[$stage]){
				query("insert into POINT (po_ud, po_info, po_price, po_player, po_date) VALUES ('2', '{$stage}단계 수련', '{$PRICE[$stage]}', '{$_SESSION["no"]}', now())");//화
				point($_SESSION["no"]);
				
				if($PRO[$stage] >= $num){
					query("insert into PRO set pro_player = '{$_SESSION["no"]}', pro_stage = '{$stage}', pro_yn = '1', pro_type = '1', pro_date = now()");
					query("UPDATE PLAYER set p_pro = '{$stage}' where p_no = '{$_SESSION["p3"]}'"); //성장하면 수정하기
					//am("단계 : ".$stage.", 확률 : ".$PRO[$stage].", 랜덤수 : ".$num." => 성공","/index.php/pro");
					move("/index.php/pro/list/2");
				} else {
					query("insert into PRO set pro_player = '{$_SESSION["no"]}', pro_stage = '{$stage}', pro_yn = '2', pro_type = '1', pro_date = now()");
					//am("단계 : ".$stage.", 확률 : ".$PRO[$stage].", 랜덤수 : ".$num." => 실패","/index.php/pro"); 
					move("/index.php/pro/list/3");
				}

			} else {
				am("수련 비용이 부족합니다.","/index.php/pro");
			}
		
		} else {
			move("/index.php/pro");
		}
	break;
	
	case "pro_item":
		foreach(query("SELECT * FROM PRO_PRO") as $row){
			$PRICE[$row->pp_stage] = $row->pp_item; //물약 
		}
		$chk = fetchAll("SELECT count(pro_stage)+1 stage FROM `PRO` WHERE pro_player = '{$_SESSION["no"]}' and pro_yn = 1");
		$stage = $chk->stage +1;
		$item = fetchAll("SELECT COUNT(in_item) count FROM INVENTORY WHERE in_player = '{$_SESSION["no"]}' and in_item = 9 and in_use_date is NULL");	
		
		if($stage < 10){
			if($PRICE[$stage] <= $item->count){
				query("insert into PRO set pro_player = '{$_SESSION["no"]}', pro_stage = '{$stage}', pro_yn = '1', pro_type = '1', pro_date = now()");
				query("UPDATE PLAYER set p_pro = '{$stage}' where p_no = '{$_SESSION["p3"]}'"); //성장하면 수정하기
				query("update INVENTORY set in_type_use = '수련', in_use_date = now() where in_item = '9' and in_player = '{$_SESSION["no"]}' and in_use_date is NULL limit $PRICE[$stage]");
				move("/index.php/pro/list/2");
			} else {
				$num = $PRICE[$stage] - $item->count;
				am("수련의 비약 ".$num."개가 부족합니다.","/index.php/pro");
			}
		}
	break;
}

?>