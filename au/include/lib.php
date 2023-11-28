<?php
header("Content-Type:text/html");

session_start();

$URL = "/index.php";
$G = "1";
$db = new PDO ("mysql:host=127.0.0.1; dbname=camellseason; charset=utf8","camellseason","cammell123",array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$AU = $_SESSION["au"];
$POINT = fetchAll("select * from MEMBER where m_no = '{$_SESSION["no"]}'");

$e = explode("/",$_SERVER['REQUEST_URI']);
$page = isset($e[3]) ? $e[3] : "" ;
$data = isset($e[4]) ? $e[4] : "list" ;
$val1 = isset($e[5]) ? $e[5] : 1 ;
$val2 = isset($e[6]) ? $e[6] : "" ;

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
	$au = $_SESSION["au"];
	$g1 = fetchAll("select sum(po_price) g1 from AU_POINT where po_player='$au' and po_type='1'"); //증가
	$g2 = fetchAll("select sum(po_price) g2 from AU_POINT where po_player='$au' and po_type='2'"); //감소
	$point = (int)$g1->g1-(int)$g2->g2;
	//alert($point);
	query("update MEMBER set m_au_point='{$point}' where m_au='{$no}'"); //화 합계
	$_SESSION["au_point"] = $point;
}

function hp($no){
	$g1 = fetchAll("select sum(hp_num) g1 from AU_HP where hp_player='$no' and hp_type='1'"); //증가
	$g2 = fetchAll("select sum(hp_num) g2 from AU_HP where hp_player='$no' and hp_type='2'"); //감소
	$hp = (int)$g1->g1-(int)$g2->g2;
	query("update AU_PLAYER set p_hp='{$hp}' where p_no='{$no}'"); //화 합계
}

?>
