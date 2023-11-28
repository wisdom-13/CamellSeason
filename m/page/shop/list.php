<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-user">
				<div class="card-body" style="min-height: 0">
					<div class="author">
						<img style="background: #fff;" class="avatar border-gray" src="/admin/common/img/profile/0/head/0.png">
						<h5 style="margin-top: 20px;">" 어서와, 천천히 둘러봐~♬ "</h5>
						<p style="color: #3F3F3F">
						   텐리 이즈야 | 잡화점 주인
						</p>
						<b class="shop_coin">소지금 : <span><?= $POINT->m_point ?></span>花</b>
					</div>
					<p class="description text-center"></p>
				</div>
				<hr>
				<div class="button-container">
					<a class="btn btn-neutral" href="/m/index.php/shop/list/0">전체</a>
					<a class="btn btn-neutral" href="/m/index.php/shop/list/1">상품</a>
					<a class="btn btn-neutral" href="/m/index.php/shop/list/2">비법서</a>
					<a class="btn btn-neutral" href="/m/index.php/shop/list/3">재료</a>
					<a class="btn btn-neutral" href="/m/index.php/shop/list/4">기타</a>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<?php 
					$type = ($val1=="0") ? "" : "and i_type = '{$val1}'" ;	
					foreach(query("select * from ITEM where i_shop = 1 and i_yn = 1 $type") as $row) { ?>
						<div class="dropdown">
							<div data-toggle="dropdown" class="item_box dropdown" data-no = "<?= $row->i_no ?>" data-use = "<?= $row->i_use ?>" data-sys = "<?= $row->i_sys ?>" >
								<img style="width: 70px;" src="<?= $row->i_img; ?>">
								
								<div class="dropdown-menu dropdown-menu-left" style="padding: 20px; width: 200px;">
									<h6><?= $row->i_name; ?></h6>
									<p><?= $row->i_content; ?></p>
									<p>가격 : <?= $row->i_price; ?> 花</p>
									<a onClick="buy(<?= $row->i_no ?>,'<?= $row->i_name ?>',<?= $row->i_price ?>)" class="shop_buy" style="cursor: pointer">구매</a>
								</div>
								
							</div>
						</div>
					<?php } ?>
					<div style="clear: both"></div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<style>
	.card-header a { color: #000; }
	.button-container a { width: 15%; padding-left: 0; padding-right: 0}
	.item_box { width: 75px; height: 75px; padding: 2.5px; float: left; margin: 5px 5px 0 0; border: 1px solid #ddd; position: relative; }
	.item_span { position: absolute; bottom: 0; right: 5px; font-size: 12px; }
	.shop_buy { position: relative; z-index: 1000;}
</style>

<script>
//구매
point = <?= $_SESSION["point"] ?>;

function buy(no,name,price){
	
	if(point>=price){
		con = confirm('이 물건으로 결정한거야?')
		
		if(con == true){
			$.ajax({
				type:"POST",
				url:"/index.php/ok/shop/shop_buy",
				data:{no:no,name:name,price:price}
			});
			point-=price;
			$(".shop_coin span").text(point);
		} 
		
	} else {
		//잔고부족
		alert("돈이 부족한 것 같은데?");
	}
}

/*
$(".shop_buy").click(function(){
	
	no = $(this).data("no");
	name = $(this).data("name");
	price = $(this).data("price");

	if(point>=price){
		con = confirm('이 물건으로 결정한거야?')
		if(con == true){
			$.ajax({
				type:"POST",
				url:"/index.php/ok/shop/shop_buy",
				data:{no:no,name:name,price:price}
			});
			point = point-price;
			$(".shop_coin").text(point-price);
		} 
	} else {
		//잔고부족
		alert("돈이 부족한 것 같은데?");
	}
	
	alert()
})
*/
</script>