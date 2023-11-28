
<?php 
	include "include/lib.php"; 
	if($_SESSION["use"]=="1"){
		include "include/list.php"; 
		include "page/_templates/header.php";
		if($page){ 
			include "include/sub.php";
		} else { 
			include "include/admin_main.php"; 
		} 
		include "page/_templates/footer.php";
	} else {
		am("권한이 없습니다.","/index.php");
	}
?>
