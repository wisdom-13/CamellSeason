<div class="in_left">
	<div class="in_menu">
		<a href="/index.php/inventory/list/0"><img src="/common/img/inventory/all.png"  onmouseover="this.src='/common/img/inventory/all_hover.png';" onmouseout="this.src='/common/img/inventory/all.png';"></a>
		<a href="/index.php/inventory/list/1"><img src="/common/img/inventory/goods.png"  onmouseover="this.src='/common/img/inventory/goods_hover.png';" onmouseout="this.src='/common/img/inventory/goods.png';"></a>
		<a href="/index.php/inventory/list/2"><img src="/common/img/inventory/book.png"  onmouseover="this.src='/common/img/inventory/book_hover.png';" onmouseout="this.src='/common/img/inventory/book.png';"></a>
		<a href="/index.php/inventory/list/3"><img src="/common/img/inventory/material.png"  onmouseover="this.src='/common/img/inventory/material_hover.png';" onmouseout="this.src='/common/img/inventory/material.png';"></a>
		<a href="/index.php/inventory/list/4"><img src="/common/img/inventory/etc.png"  onmouseover="this.src='/common/img/inventory/etc_hover.png';" onmouseout="this.src='/common/img/inventory/etc.png';"></a>
	</div>

	
	<div class="in_item">
		<?php 
		$type = ($val1=="0") ? "" : "and i.i_type = '{$val1}'" ;
		$query = "SELECT *, count(in_item) num FROM INVENTORY ii, ITEM i where ii.in_item = i.i_no and ii.in_use_date is NULL and 
		in_player = '{$_SESSION['no']}' $type group by in_item";
		foreach(query($query) as $row) {
		?>
			<div class="item_box" data-no = "<?= $row->i_no ?>" data-type="<?= $row->i_type ?>" data-use = "<?= $row->i_use ?>" data-sys = "<?= $row->i_sys ?>" data-name = "<?= $row->i_name; ?>" data-content = "<?= $row->i_content; ?>">
				<img style="width: 70px;" src="<?= $row->i_img; ?>">
				<span><?= ($row->i_type == "2") ? "" : $row->num; ?></span>
			</div>
		<?php } ?>
	</div>
	
	<div class="in_text">
		<img class="in_text_item" src="">
		<div class="in_text_content">
			<h3 class="h3"></h3>
			<p class="p"></p>
		</div>
		<div class="in_text_button">
			<img class="item_push" src="/common/img/inventory/in_btn1.png" onmouseover="this.src='/common/img/inventory/in_btn1_hover.png';" onmouseout="this.src='/common/img/inventory/in_btn1.png';">
			<img class="item_use" src="/common/img/inventory/in_btn2.png" onmouseover="this.src='/common/img/inventory/in_btn2_hover.png';" onmouseout="this.src='/common/img/inventory/in_btn2.png';">
		</div>
	</div> 
</div>

<div class="in_record"></div>

<style>
	.content { padding: 0; margin: 0; background: none; }
	.content_top, .content_bottom { display: none; }
</style>

<script>
	$(".in_item div").on("click",function(){
		$(".item_use").css("display","none");	
		no = $(this).data("no");
		name = $(this).data("name");
		content = $(this).data("content");
		img = $(this).children("img").attr("src");
		sys = $(this).data("sys");
		type = $(this).data("type");
		use = $(this).data("use");
		$(".in_text_item").attr("src",img);
		$(".in_text_item").css("display","block")
		$(".in_text h3").text(name);
		$(".in_text p").text(content);
		$(".in_record").load("/page/inventory/record.php",{no:no,name:name});
		
		if(use=="1"){ $(".item_use").css("display","inline")} else {$(".item_push").css("display","none"); }
		if(type!="2"){$(".item_push").css("display","inline");} else {$(".item_push").css("display","none"); }
	});
	
	//아이템 사용
	$(".item_use").on("click",function(){
		if(sys=="1" || sys=="4" || sys=="7"){ //일반
			if(confirm("정말로 사용할까요?")){
				window.open("https://twitter.com/intent/tweet?text=["+name+"] 사용 @STORE_SOC", "사용", "left=10, top=10, width=500, height=200");
				location.href='/index.php/ok/inventory/use/'+no;
			}
		} else if(sys=="2"){ //랜덤박스
			location.href='/index.php/ok/inventory/use_rand/'+no;
		} else if(sys=="6"){ //회복
			location.href='/index.php/ok/inventory/use_hp/'+no;
		} else if(sys=="8"){
			window.open("https://twitter.com/intent/tweet?text=[졸업장] 사용 @camell_season", "사용", "left=10, top=10, width=500, height=200");
		}
	});
	
	//아이템 버리기
	var talk = new Array('ぁ궰?힣헿쫇口?あ쉜킿が?求|?|콻뭷?き?く?|쉜?け걄퀣く걄?걄?걃걄?さ?|じ쉜?れ뉢뮒뮔?|걄口?|求쉜뷄?쫇뛻口?ろ뷁퀣뷁ゎ?|킮?햜口?|求쉜뷄?쫇뛻珂?口?ろ뷁퀣뷁ゎ?|킮?햜|?|콻뭷', '안 놔줄 거야. 어디 가려고?', '이렇게해도 떠나지 않을거야.', '그게 가능할줄 알았어?', '차º어피 우리▷┼은 죽※死을밖에 없어.', '인형 난 신 언제나 곧 네 아침 곁에 갈 있어.', '안녕?', '소용없는 짓이야', '만나. 만나. 만나. 왜 라더로대그 는나 데는었뀌바 이많 게르다 랑이전예 어봤러둘 좀 를교학 은늘오 아잖있', '모두와 함께 했던 날들을 기억해. 내가 죽었던 날도. 너와 함께 했던 날을 기억해. 네가 죽었던 날. 우리가 함께 죽은 날을 기억. 기억해?','이제 이별은 없는거야, 영원히.','재밌어?');
	function randomTalk(a) { return a[Math.floor(Math.random() * a.length)]; }

	function con (a){
		if(cf = confirm(a)){
			con(randomTalk(talk))
		} else { return false; }
	}

	$(".item_push").on("click",function(){
		if(confirm("정말로 버릴까요?")){
			if(sys!="5"){
				location.href='/index.php/ok/inventory/push/'+no;
			} else {
				con(randomTalk(talk));
			}
		} else { return false; }

	})
	
	
</script>
