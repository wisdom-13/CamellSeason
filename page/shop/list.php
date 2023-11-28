<div class="shop_left">
	<div class="shop_menu">
		<a href="/index.php/shop/list/0"><img src="/common/img/shop/all.png"  onmouseover="this.src='/common/img/shop/all_hover.png';" onmouseout="this.src='/common/img/shop/all.png';"></a>
		<a href="/index.php/shop/list/1"><img src="/common/img/shop/goods.png"  onmouseover="this.src='/common/img/shop/goods_hover.png';" onmouseout="this.src='/common/img/shop/goods.png';"></a>
		<a href="/index.php/shop/list/2"><img src="/common/img/shop/book.png"  onmouseover="this.src='/common/img/shop/book_hover.png';" onmouseout="this.src='/common/img/shop/book.png';"></a>
		<a href="/index.php/shop/list/3"><img src="/common/img/shop/material.png"  onmouseover="this.src='/common/img/shop/material_hover.png';" onmouseout="this.src='/common/img/shop/material.png';"></a>
		<a href="/index.php/shop/list/4"><img src="/common/img/shop/etc.png" onmouseover="this.src='/common/img/shop/etc_hover.png';" onmouseout="this.src='/common/img/shop/etc.png';"></a>
	</div>
	<div class="shop_item">
		<div style="overflow: scroll; height: 100%;">
		<?php 
		$type = ($val1=="0") ? "order by i_type" : "and i_type = '{$val1}'" ;	
		foreach(query("select * from ITEM where i_shop = 1 $type") as $row) { ?>
			<div class="item_box shop_item_box" data-no = "<?= $row->i_no ?>" data-name = "<?= $row->i_name; ?>" data-content = "<?= $row->i_content; ?>" data-price = "<?= $row->i_price; ?>">
				<img style="width: 70px;" src="<?= $row->i_img; ?>">
			</div>
		<?php } ?>
		<!--	
		<?php $chk = fetchAll("SELECT * FROM `INVENTORY` WHERE `in_player` = '{$_SESSION['no']}' AND `in_item` = 235 AND `in_get_date` > '2018-10-01'"); if(!$chk){ ?>	
			<div class="item_box shop_item_box" data-no = "235" data-name = "이즈야의 특별 상자" data-content = "<기간 한정> 이즈야가 일확첨금을 노린 회심의 보물상자. 잘만하면 이즈야의 일확천금을 내가 가질수 있을지도 몰라!" data-price = "300">
				<img style="width: 70px;" src="/admin/common/img/items/1535901581_이즈야의%20특별%20상자">
			</div>
		<?php } ?>
		-->
		</div>
	</div>
	<div class="shop_text">
		<img class="shop_text_item" src="">
		<div class="shop_text_content">
			<h3 class="h3"></h3>
			<p class="p"></p>
		</div>
		<div class="shop_coin">
			<img src="/common/img/foot/coin.png"> 
			<span>가격 : <span class="coin_num"></span> 花</span>
			<img class="shop_text_btn" src="/common/img/shop/buy.png"  onmouseover="this.src='/common/img/shop/buy_hover.png';" onmouseout="this.src='/common/img/shop/buy.png';">
		</div>
		
	</div>
</div>
<div class="shop_right">
	<div class="shop_word"></div>
	<div class="standing"><img src="/common/img/shop/standing/1.png"></div>
</div>
<div class="shop_back_bottom">
	<img src="/common/img/shop/shop_back_bottom.png">
</div>

<style>
	
	.content { height: 804px; padding: 40px 0 0 15px; margin-top: -30px; background: url('/common/img/shop/shop_back.png'); background-repeat: no-repeat; }
	.content_top, .content_bottom { display: none; }
	
</style>
<script>
	//대사
	var talk1 = new Array('어서와, 천천히 둘러봐~♬', '특별히 찾는 물건이라도 있어?', '응응, 어서 들어와~.', '없는 거 빼고 다 있답니다~♪'); //방문
	var talk2 = new Array('이 상품에 관심 있어?', '안목이 좋은 걸~♪', '자자, 어서 골라봐.', '살까 말까 할 때는 사버리렴~♬', '쉽게 구할 수 있는 물건이 아니라고~?', '그거 정말 귀한 거야~.'); //선택
	var talk3 = new Array('오호홋, 고마워~♬ 자주 이용해줘~.', '좋은 선택인걸~.', '또 들려줄 거지?', '다른 상품도 더 둘러봐~♪'); //구매
	var talk4 = new Array('돈이 부족한 것 같은데...?', '자자, 힘내서 좀 더 벌어오라구.', '돈 없는 손님은 안 받아요~, 훠이훠이.', '흐응... 너, 돈이 없잖아.'); //잔고부족
	var talk5 = new Array('무슨 일이야?', '조금 더 둘러 보지 그래.', '흐음, 마음에 드는 물건이 없어?', '나 말고 물건을 더 보는게 어때?', '으음... 만지지 말아줄래?', '...심심하면 심부름이라도 할래?', '다 샀으면 슬슬 돌아가는 게 어때?'); //대화 
	var talk6 = new Array('반품은 안된다~?', '응응, 좋은 선택이야~♪', '단순 변심으로 인한 환불은 불가능합니다~.', '이 상품으로 결정한 거야?'); //구매여부
	var talk7 = new Array('흐응... 안 살 거야?', '그래~, 더 둘러봐.', '안 사면 후회할 텐데~.', '좀 더 고민해봐.'); //구매취소
	var talk8 = new Array('너, 이 학교 학생이 아니잖아?', '외부인은 안 받으니까 돌아가~.', '외부인에겐 안 팔아~, 돌아가.'); //비회원
	
	
	function randomTalk(a) {
		return a[Math.floor(Math.random() * a.length)];
	}
	
	//아이템 마우스오버
	$(".item_box").on("mouseover",function(){
		$(this).css("background","url('/common/img/shop/item_back_hover.png')")
	})
	$(".item_box").on("mouseleave",function(){
		$(this).css("background","url('/common/img/shop/item_back.png')")
	})
	
	
	$(".shop_word").text(randomTalk(talk1));
	
	//선택
	$(".item_box").on("click",function(){
		no = $(this).data("no");
		name = $(this).data("name");
		content = $(this).data("content");
		price = $(this).data("price");
		img = $(this).children("img").attr("src");
		$(".shop_text_item").attr("src",img);
		$(".shop_text_item").css("display","block");
		$(".shop_coin").css("display","block");
		$(".shop_text h3").text(name);
		$(".shop_text p").text(content);
		$(".coin_num").text(price);
		$(".standing img").attr("src","/common/img/shop/standing/2.png").css("z-index","0");
		$(".shop_word").text(randomTalk(talk2));
	});
	
	//구매
	<?php if(isset($POINT->m_point)){ ?>
	var point = <?= $POINT->m_point ?>;
		
	$(".shop_text_btn").off().on("click",function(){
		if(point>=price){
			con = confirm('이 물건으로 결정한거야?')
			if(con == true){
				$.ajax({
					type:"POST",
					url:"/index.php/ok/shop/shop_buy",
					data:{no:no,name:name,price:price}
				});
				$(".standing img").attr("src","/common/img/shop/standing/3.png");
				$(".shop_word").text(randomTalk(talk3));
				$(".coin").text(point-price);
				point = point-price;
				if(no == 235){
					window.location.reload()
				}
			} else if(con == false){
				$(".standing img").attr("src","/common/img/shop/standing/4.png");
				$(".shop_word").text(randomTalk(talk7));
			}
		} else {
			//잔고부족
			$(".standing img").attr("src","/common/img/shop/standing/4.png");
			$(".shop_word").text(randomTalk(talk4));
		}
	})
	<?php } else { ?>
	//외부인
	$(".shop_text_btn").on("click",function(){
		$(".shop_word").text(randomTalk(talk8));
		$(".standing img").attr("src","/common/img/shop/standing/5.png").css("z-index","10");;
	})
	<?php } ?> 
	
	//대화
	$(".standing img").on("click",function(){
		$(".standing img").attr("src","/common/img/shop/standing/5.png").css("z-index","10");
		$(".shop_word").text(randomTalk(talk5));
	})
	
	
</script>