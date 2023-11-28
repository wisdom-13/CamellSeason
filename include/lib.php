<?php

header("Content-Type:text/html");

session_start();

$db = new PDO ("mysql:host=localhost; dbname=camellseason; charset=utf8","camellseason","cammell123",array(PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

$URL = "/index.php";

$e = explode("/",$_SERVER['REQUEST_URI']);
$page = isset($e[2]) ? $e[2] : "" ;
$data = isset($e[3]) ? $e[3] : "list" ;
$val1 = isset($e[4]) ? $e[4] : 1 ;
$val2 = isset($e[5]) ? $e[5] : "" ;
	
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
echo $msg ? "alert ('{$msg}');" : "" ;
echo "</script>";	
}

function move($url){
echo "<script>";
echo $url ? "location.replace ('{$url}');" : "window.history.back()" ;
echo "</script>";	
}

function am ($msg,$url) {
echo "<script>";
echo $msg ? "alert ('{$msg}');" : "" ;
echo $url ? "location.replace ('{$url}');" : "window.history.back()" ;
echo "</script>";
}
?>