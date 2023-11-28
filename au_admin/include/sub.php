<?php

if($page=="ok"){
	include "{$_SERVER['DOCUMENT_ROOT']}/au_admin/ok/{$data}.php";
} else {
	$src = $val1 ? (int)$val1 ? $data : $val1 : $data;
	include "{$_SERVER['DOCUMENT_ROOT']}/au_admin/page/{$page}/{$src}.php";

}

?>