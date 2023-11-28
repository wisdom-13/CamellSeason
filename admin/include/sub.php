<?php


//echo $_SERVER['REQUEST_URI']."///".$page.$data; 

if($page=="ok"){
	include "{$_SERVER['DOCUMENT_ROOT']}/admin/ok/{$data}.php";
} else {
	$src = $val1 ? (int)$val1 ? $data : $val1 : $data;
	include "{$_SERVER['DOCUMENT_ROOT']}/admin/page/{$page}/{$src}.php";
}

?>