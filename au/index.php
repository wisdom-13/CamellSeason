<?php 
include "include/lib.php"; 
include "include/list.php"; 


include "page/_templates/header.php";
 if($page){
	include "include/sub.php"; 
} else { 
	 include "include/main.php"; 
} 

include "page/_templates/footer.php";

?>
