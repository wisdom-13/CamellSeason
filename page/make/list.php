<div class="join_back"></div>	
<div class="recipe_btn">
	<a href="/index.php/make/list/0"><img src="/common/img/make/btn_all.png"  onmouseover="this.src='/common/img/make/btn_all_hover.png';" onmouseout="this.src='/common/img/make/btn_all.png';"></a>
	<a href="/index.php/make/list/1"><img src="/common/img/make/btn_goods.png"  onmouseover="this.src='/common/img/make/btn_goods_hover.png';" onmouseout="this.src='/common/img/make/btn_goods.png';"></a>
	<a href="/index.php/make/list/2"><img src="/common/img/make/btn_item.png"  onmouseover="this.src='/common/img/make/btn_item_hover.png';" onmouseout="this.src='/common/img/make/btn_item.png';"></a>
	<a href="/index.php/make/list/3"><img src="/common/img/make/btn_cook.png"  onmouseover="this.src='/common/img/make/btn_cook_hover.png';" onmouseout="this.src='/common/img/make/btn_cook.png';"></a>
</div>
<div class="recipe_list">
	<div onClick="slide(-1)" class="recipe_list_btn">
		<img src="/common/img/make/btn_left.png">
	</div>
	<div class="recipe_list_content">
		<?php
			$type = ($val1 == "0") ? "" : "and re_type = ".$val1;
			$query = "select * from RECIPE r, ITEM i where r.re_book = i.i_no $type"; 
			$row = rowAll($query);
			$width = 130*$row;
		?>
		<div style="width: <?= $width ?>px;" class="recipe_list_book">
		<?php foreach(query($query) as $row) { $need = fetchAll("select * from INVENTORY where in_player = '{$_SESSION["no"]}' and in_item =$row->re_book"); if($need){?>
			<div class="recipe_book">
				<img data-no="<?= $row->re_no ?>" data-book="<?= $row->re_book ?>" width="110px" src="<?= $row->i_img; ?>">
			</div>
		<?php } else { ?>
			<div class="recipe_book">
				<img data-book="132" width="110px" src="/admin/common/img/items/1531598438_없음.png">
			</div>
		<?php }} ?>
		</div>
	</div>
	<div onClick="slide(1)" class="recipe_list_btn">
		<img src="/common/img/make/btn_right.png">
	</div>
</div>
<div class="recipe_bottom"></div>
<div class="recipe_foot">
	<img src="/common/img/make/make_bottom.png">
</div>
<style>
	.content { width: 959px; height: 759px; padding: 22px 40px; margin-top: -5px; margin-left: -26px; background: url('/common/img/make/make_back.png'); background-repeat: no-repeat; overflow: hidden; position: relative; }
	.content_top, .content_bottom { display: none; }
</style>

<script>
	
	var pos = 0;
	var width = $(".recipe_list_book").width()-815; 
	
	function slide(num){
		pos = pos <= 0 && num==-1 ? 0 : pos+=num;
		px = pos*390 >= width ? width : pos*390;
		$(".recipe_list_book").stop().animate({marginLeft:-px+"px"},800);
	}
	
	$(".recipe_bottom").load("/page/make/make.php");
	
	$(".recipe_book img").on("click",function(){
		var no  = $(this).data("no");
		var book = $(this).data("book");
		$(".recipe_bottom").load("/page/make/make.php",{no:no,book:book});
	})
	
</script>