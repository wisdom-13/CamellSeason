<?php 
include "admin/include/lib.php"; 
include "admin/include/list.php"; 

include "page/_templates/header.php";
?>

<!-- content -->	
<?php if($page){ ?>
	
	<img class="content_top" src="/common/img/content/top.png">
	<div class="content">
	
	<?php include "include/sub.php"; ?>		  
	
	</div>
	<img class="content_bottom" src="/common/img/content/bottom.png">
	
<?php } else { include "include/main.php"; } 

include "page/_templates/footer.php";

?>

