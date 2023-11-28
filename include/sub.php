<?php
if($page=="ok"){
	include "{$_SERVER['DOCUMENT_ROOT']}/ok/{$data}.php";
} else if(!isset($_SESSION["no"]) && ($page=="inventory" || $page=="letter" || $page=="point" || $page=="pro" || $page=="quest")) {
	am("학생인증 후 이용할 수 있습니다.","/index.php");
} else {
	$src = $val1 ? (int)$val1 ? $data : $val1 : $data;
	include "{$_SERVER['DOCUMENT_ROOT']}/page/{$page}/{$src}.php";
}
?>