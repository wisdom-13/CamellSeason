<?php include "{$_SERVER['DOCUMENT_ROOT']}/include/lib.php" ?>

<?php 
	$no = $_POST["no"]; $book = $_POST["book"]; 
	$row = fetchAll("select * from ITEM where i_no = '{$book}'"); //레피시북 아이템에 대한 정보
	$book = fetchAll("select * from RECIPE where re_book = '{$book}'"); //레시피 내용
?>
<div class="recipe_book_text">
	<div class="recipe_book_back">
		<img src="<?= $row->i_img ?>">
	</div>
	<h3 style="color: #2d2d2d"><?= $row->i_name ?></h3>
	<p style="width: 190px;"><?= $row->i_content ?></p>
	<button class="make_btn" data-book="<?= $book->re_no ?>"><img src="/common/img/make/btn_make.png"></button>
</div>
<div class="recipe_jar">
	<div class="recipe_make_item">
		<?php 
		if(isset($_POST["book"])&&$_POST["book"]!="132"){
		$item = explode(",",$book->re_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); 
		$i_img = fetchAll("select * from ITEM where i_no = $num[0]");
		$have = fetchAll("SELECT *, count(in_item) num FROM INVENTORY where in_use_date is NULL and in_player = '{$_SESSION['no']}' and in_item = '{$num[0]}'");
		?>
		<div class="recipe_item"><img style="width: 50px;" title="<?= $i_img->i_name?>" src="<?= $i_img->i_img ?>">
		<p><span class="have"><?= $have->num ?></span>/<span class="need"><?= $num[1] ?></span></p></div>
		<?php }} ?>	
	</div>
</div>

<?php $make = fetchAll("select * from ITEM where i_no = '{$book->re_goods}'"); ?>
<div class="make_popup">
	<h3><?= $make->i_name ?></h3>
	<div><img src="<?= $make->i_img ?>"></div>
	<p><?= nl2br($make->i_content) ?></p>
</div>

<style>
	.recipe_item img { -webkit-filter: grayscale(100%); filter: gray; }
</style>

<script>

	var full = 0;
	var num = $('.have').length;
	
	for(var i=0; i<num; i++){
		if(parseInt($(".recipe_item .have").eq(i).text()) >= parseInt($(".recipe_item .need").eq(i).text())){
			$(".recipe_item img").eq(i).css("-webkit-filter","grayscale(20%)");
			full += 1;
		}
		if(parseInt(full)==parseInt(num)){
			$(".recipe_jar").css("background","url('/common/img/make/jar_full.png')");
			$(".make_btn img").attr("src","/common/img/make/btn_make_hover.png");
			$(".make_btn").attr("title","make");
		}
	}
	
	$(".make_btn").off().on("click",function(){
		if($(this).attr("title")=="make"){
			book = $(this).data("book");
			$.ajax({
			type:"POST",
			url:"/index.php/ok/inventory/make",
			data:{book:book},
			success: function($e){
				$(".make_popup").css("opacity","100");
				$(".join_back").stop().slideToggle(1000);
				console.log($e);
			}
		});
		} 
	});
	
	$(".make_popup, .join_back").on("click",function(){
		$(".recipe_bottom").load("/page/make/make.php");
		$(".make_popup").css("opacity","0");
		$(".join_back").stop().slideUp(1000);
	})
	
</script>