<div class="sub">
	<div class="shop">
		<div class="shop_menu">
			<a href="/au/index.php/mypage/shop/0"><img src="/au/common/img/inventory/all.png"  onmouseover="this.src='/au/common/img/inventory/all_hover.png';" onmouseout="this.src='/au/common/img/inventory/all.png';"></a>
			<a href="/au/index.php/mypage/shop/1"><img src="/au/common/img/inventory/day.png"  onmouseover="this.src='/au/common/img/inventory/day_hover.png';" onmouseout="this.src='/au/common/img/inventory/day.png';"></a>
			<a href="/au/index.php/mypage/shop/2"><img src="/au/common/img/inventory/battle.png"  onmouseover="this.src='/au/common/img/inventory/battle_hover.png';" onmouseout="this.src='/au/common/img/inventory/battle.png';"></a>
			<a href="/au/index.php/mypage/shop/3"><img src="/au/common/img/inventory/food.png"  onmouseover="this.src='/au/common/img/inventory/food_hover.png';" onmouseout="this.src='/au/common/img/inventory/food.png';"></a>
		</div>
		<div class="shop_left" onClick="slide(-1)">
			<img src="/au/common/img/shop/left.png"  onmouseover="this.src='/au/common/img/shop/left_hover.png';" onmouseout="this.src='/au/common/img/shop/left.png';">
		</div>
		<div class="shop_list">
		<?php 
			$type = ($val1=="0") ? "" : "and i_type = ".$val1;
			$query = "select * from AU_ITEM where i_shop = 1 $type"; 
			$row = rowAll($query);
			$width = 252*$row;
		?>
		<div class="item_list_box" style="width: <?= $width ?>px;" >
			<?php foreach(query($query) as $row){ ?>
			<div class="item_list">
				<div class="item">
					<img src="/au/common/img/item/<?= $row->i_name ?>.png">
				</div>
				<h5><?= $row->i_name ?></h5>
				<p><?= nl2br($row->i_content) ?></p>
				<div class="item_bottom">
					<img src="/au/common/img/shop/point.png">
					<span><?= number_format($row->i_price) ?></span>
					<button onClick="buy(<?= $row->i_no ?>, '<?= $row->i_name ?>', <?= $row->i_price ?>, <?= $_SESSION["au_point"] ?>)"><img src="/au/common/img/shop/buy.png"  onmouseover="this.src='/au/common/img/shop/buy_hover.png';" onmouseout="this.src='/au/common/img/shop/buy.png';"></button>
				</div>
			</div>
			<?php } ?>
		</div>
		</div>
		<div class="shop_right" onClick="slide(1)">
			<img src="/au/common/img/shop/right.png"  onmouseover="this.src='/au/common/img/shop/right_hover.png';" onmouseout="this.src='/au/common/img/shop/right.png';">
		</div>
	</div>
	</div>
</div>

<script>
	$(".item_list").on("mouseover",function(){
		$(this).css({"background":"url(/au/common/img/shop/item_list_hover.png)"})
	})
	$(".item_list").on("mouseleave",function(){
		$(this).css({"background":"url(/au/common/img/shop/item_list.png)"})
	})
	
	var pos = 0;
	var width = $(".item_list_box").width()-1512; 
	
	function slide(num){
		pos = pos <= 0 && num==-1 ? 0 : pos+=num;
		px = pos*252 >= width ? width : pos*252;
		$(".item_list_box").stop().animate({marginLeft:-px+"px"},500);
	}
	
	function buy(no,name,price,point){
		if(confirm("선택한 아이템을 구매하시겠습니까?")){
			if(price <= point){
				$.ajax({
					type:"POST",
					url:"/au/index.php/ok/item/item_buy",
					data:{no:no,name:name,price:price},
					success : function () {
						alert("물건을 구입하였습니다.");
						location.reload();
					}
				});
			} else {
				alert("소지 포인트가 부족합니다. 현재 소지 포인트 : "+point);
			}
		}
		
	}
	
</script>
