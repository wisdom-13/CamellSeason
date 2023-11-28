 <div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><h4 class="card-title">소지품</h4><br> 
					<a href="/m/index.php/inventory/list/0">전체</a> | 
					<a href="/m/index.php/inventory/list/1">상품</a> | 
					<a href="/m/index.php/inventory/list/2">비법서</a> | 
					<a href="/m/index.php/inventory/list/3">재료</a> | 
					<a href="/m/index.php/inventory/list/4">기타</a>
				</div>
				<div class="card-body">
					<?php 
						$type = ($val1=="0") ? "" : "and i.i_type = '{$val1}'" ;
						$query = "SELECT *, count(in_item) num FROM INVENTORY ii, ITEM i where ii.in_item = i.i_no and ii.in_use_date is NULL and 
						in_player = '{$_SESSION['no']}' $type group by in_item";
						foreach(query($query) as $row) {
						?>  
						<div class="dropdown">
							<div data-toggle="dropdown" class="item_box dropdown" data-no = "<?= $row->i_no ?>" data-use = "<?= $row->i_use ?>" data-sys = "<?= $row->i_sys ?>" >
								<img style="width: 70px;" src="<?= $row->i_img; ?>">
								<span class="item_span"><?= $row->num; ?></span>
								<div class="dropdown-menu dropdown-menu-left" style="padding: 20px; width: 200px;">
									<h6><?= $row->i_name; ?></h6>
									<p><?= $row->i_content; ?></p>
									<?php if($row->i_use == "1"){ ?>
									<a onClick="use(<?= $row->i_no ?>,'<?= $row->i_name ?>','<?= $row->i_sys ?>')" style="cursor: pointer">사용하기</a> 
									<?php } if($row->i_type != "2"){ ?>
									&nbsp;&nbsp;<a onClick="push(<?= $row->i_no ?>,'<?= $row->i_sys ?>')"  style="cursor: pointer">버리기</a>
									<? } ?>
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
	.item_box { width: 75px; height: 75px; padding: 2.5px; float: left; margin: 5px 5px 0 0; border: 1px solid #ddd; position: relative; }
	.item_span { position: absolute; bottom: 0; right: 5px; font-size: 12px; }
</style>
<script>
	
	function use (no,name,sys){
		if(sys=="1"){ //일반
			if(confirm("정말로 사용할까요?")){
				window.open("https://twitter.com/intent/tweet?text=["+name+"] 사용 @STORE_SOC", "사용", "left=10, top=10, width=500, height=200");
				location.href='/index.php/ok/inventory/use/'+no;
			}
		} else if(sys=="2"){ //랜덤박스
			location.href='/index.php/ok/inventory/use_rand/'+no;
		}
	}
	
	var talk = new Array('ぁ궰?힣헿쫇口?あ쉜킿が?求|?|콻뭷?き?く?|쉜?け걄퀣く걄?걄?걃걄?さ?|じ쉜?れ뉢뮒뮔?|걄口?|求쉜뷄?쫇뛻口?ろ뷁퀣뷁ゎ?|킮?햜口?|求쉜뷄?쫇뛻珂?口?ろ뷁퀣뷁ゎ?|킮?햜|?|콻뭷', '안 놔줄 거야. 어디 가려고?', '이렇게해도 떠나지 않을거야.', '그게 가능할줄 알았어?', '차º어피 우리▷┼은 죽※死을밖에 없어.', '인형 난 신 언제나 곧 네 아침 곁에 갈 있어.', '안녕?', '소용없는 짓이야', '만나. 만나. 만나. 왜 라더로대그 는나 데는었뀌바 이많 게르다 랑이전예 어봤러둘 좀 를교학 은늘오 아잖있', '모두와 함께 했던 날들을 기억해. 내가 죽었던 날도. 너와 함께 했던 날을 기억해. 네가 죽었던 날. 우리가 함께 죽은 날을 기억. 기억해?','이제 이별은 없는거야, 영원히.','재밌어?');
	function randomTalk(a) { return a[Math.floor(Math.random() * a.length)]; }

	function con (a){
		if(cf = confirm(a)){
			con(randomTalk(talk))
		} else { return false; }
	}
	
	function push (no,sys){
		if(confirm("정말로 버릴까요?")){
			if(sys!="5"){
				location.href='/index.php/ok/inventory/push/'+no;
			} else {
				con(randomTalk(talk));
			}
		} else { return false; }
	}
	
</script>