<?php

//echo $_SERVER['REQUEST_URI']."///".$page.$data; 

if($page=="ok"){
	include "{$_SERVER['DOCUMENT_ROOT']}/au/ok/{$data}.php";
} else if($page=="mypage") {
	if($AU!="" || $data=="shop"){ 
		$src = $val1 ? (int)$val1 ? $data : $val1 : $data;
		include "{$_SERVER['DOCUMENT_ROOT']}/au/page/{$page}/{$src}.php";
	} else {
		am("관계자 외 열람할 수 없습니다.","/au/index.php"); return; 
	}
} else {
	$src = $val1 ? (int)$val1 ? $data : $val1 : $data;
	include "{$_SERVER['DOCUMENT_ROOT']}/au/page/{$page}/{$src}.php";
}

?>