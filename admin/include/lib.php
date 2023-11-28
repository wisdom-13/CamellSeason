<?php
header("Content-Type:text/html");

session_start();

$URL = "/index.php";
$G = "1";
$db = new PDO ("mysql:host=127.0.0.1; dbname=camellseason; charset=utf8","camellseason","cammell123",array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$POINT = fetchAll("select * from MEMBER where m_no = '{$_SESSION["no"]}'");

$e = explode("/",$_SERVER['REQUEST_URI']);
if($e[1]=="admin" || $e[1]=="m"){
	$page = isset($e[3]) ? $e[3] : "" ;
	$data = isset($e[4]) ? $e[4] : "list" ;
	$val1 = isset($e[5]) ? $e[5] : 1 ;
	$val2 = isset($e[6]) ? $e[6] : "" ;
} else {
	$page = isset($e[2]) ? $e[2] : "" ;
	$data = isset($e[3]) ? $e[3] : "list" ;
	$val1 = isset($e[4]) ? $e[4] : 1 ;
	$val2 = isset($e[5]) ? $e[5] : "" ;
}

function query($sql,$bind=NULL){
	$rs = $GLOBALS["db"]->prepare($sql);
	$rs->execute($bind);
	return $rs;
	
}
function fetch ($sql){
	return $sql->fetch();	
}
function fetchAll($sql,$bind=NULL){
	$rs = query($sql,$bind);
	$rs = fetch($rs);
	return $rs;	
}
function row ($sql){
	return $sql->rowCount();
}
function rowAll($sql, $bind=NULL) {
	$rs = query($sql, $bind);
	$rs = row($rs);
	return $rs;
}

function alert($msg){
	echo "<script>";
	echo $msg ? "alert('{$msg}');" : "" ;
	echo "</script>";		
}

function move($url){
	echo "<script>";
	echo $url ? "location.href='{$url}';" : "window.history.back()" ;
	echo "</script>";	
}

function am ($msg,$url) {
	echo "<script>";
	echo $msg ? "alert ('{$msg}');" : "" ;
	echo $url ? "location.href='{$url}';" : "window.history.back()" ;
	echo "</script>";
}

/*
function confirmDelete($msg, $url) {
	echo "<script>";
	echo "if( confirm('{$msg}') ) {" ;
	echo "location.href = '{$url}';}" ;
	echo "</script>";
	
}
*/
function point($no){
	$g1 = fetchAll("select sum(po_price) g1 from POINT where po_player='{$no}' and po_ud='1'"); //증가
	$g2 = fetchAll("select sum(po_price) g2 from POINT where po_player='{$no}' and po_ud='2'"); //감소
	$point = (int)$g1->g1-(int)$g2->g2;
	query("update MEMBER set m_point='{$point}' where m_no='{$no}'"); //화 합계
	//$_SESSION["point"] = $point;
}

?>
