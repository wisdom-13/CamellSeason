<?php

switch($val1){
	case "add_mission":
		$title = $_POST["title"];
		$content = $_POST["content"];
		$start = $_POST["start"];
		$end = $_POST["end"];
		query("insert into AU_MISSION (mi_title, mi_content, mi_start, mi_end) VALUE ('$title','$content','$start','$end')");
		am("등록되었습니다.","/au_admin/index.php/mission/list");
	break;
	
	case "all_mission":
		foreach(query("select * from AU_MISSION_LOG where ml_ok_date is NULL and ml_mission = $val2") as $row){
			query("update AU_MISSION_LOG set ml_ok_date = now() where ml_no = $row->ml_no");
			query("insert into AU_POINT (po_player, po_type, po_price, po_info, po_date) VALUE ('$row->ml_player','1','2500', '임무 보상', now())");
			query("insert into AU_EXP (e_player, e_info, e_add, e_date) VALUE ('$row->ml_player','임무 보상', '25000', now())");
			point($row->ml_player);
			am("등록되었습니다.","/au_admin/index.php/mission/list");
		}
	break;
} 

?>