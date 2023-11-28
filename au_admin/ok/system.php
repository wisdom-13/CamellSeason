<?php

switch($val1){
	case "letter":
		$to = $_POST["to"];
		$title = $_POST["title"];
		$content = $_POST["content"];
		
		query("INSERT INTO AU_LETTER (l_to, l_from, l_title, l_content, l_date) VALUES ('$to', '0', '$title', '$content', now())");
		am("전송 되었습니다.","/au_admin/index.php/system/letter");
	break;
	
	case "cal_ok":
		$chk = fetchAll("select * from AU_POINT_CAL where pc_no = $val2");
		query("update AU_POINT_CAL set pc_ok_date = now() where pc_no = $val2");
		
		if($chk->pc_type=="1"){
			$point = $chk->pc_total*100;
			query("insert into AU_POINT (po_player, po_type, po_price, po_info, po_date) VALUE ('$chk->pc_player','1','$point', '트윗수 정산', now())");
			point($chk->pc_player);
		} else {
			$exp = $chk->pc_total*1000;
			query("insert into AU_EXP (e_player, e_info, e_add, e_date) VALUE ('$chk->pc_player','트윗수 정산', '$exp', now())");
		}
		
		am("정산이 완료되었습니다.","/au_admin/index.php/system/cal");
	break;
}

?>