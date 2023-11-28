<?php

switch($val1){
	//트윗정
	case "twt_cal":
		$twt = $_POST["twt"];
		$total = $_POST["total"];
		$type = ($_POST["type"]=="포인트") ? "1" : "2";
		if($total<=0){
			am("현재 트윗수가 잘못 입력되었습니다.");
		} else {
			query("insert into AU_POINT_CAL (pc_player, pc_twt, pc_total, pc_type, pc_date) VALUE ('$AU', '$twt', '$total', '$type', now())");
			am("정산되었습니다.","/au/index.php/mypage/inventory/list/0");
		}
		
	break;
	
	//임무정산
	case "mission_cal":
		$content = $_POST["content"];
		$chk = fetchAll("select * from AU_MISSION where date(now()) BETWEEN mi_start AND mi_end");
		if($chk){
			query("insert into AU_MISSION_LOG (ml_player, ml_mission, ml_content, ml_date) VALUE ('$AU', '$chk->mi_no', '$content', now())");
			am("정산되었습니다.","/au/index.php/mypage/inventory");
		} else {
			am("현재 입무 정산기간이 아닙니다.","/au/index.php/mypage/inventory/list/0");
		}
	break;
		
}