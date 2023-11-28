<div class="table_title"><img src="/common/img/letter/letter_title.png"></div>
<form class="letter_write" method="post" action="/index.php/ok/letter/letter_write">
<div class="letter_tit">
	<input style="width: 70%" type="text" name="title" id="title" placeholder="제목을 입력하세요." required>
	<select style="width: 28%;" id="to" name="to">
		<option value="0">받는이</option>
		<?php foreach(query("select * from MEMBER order by m_name") as $p){ ?>
			<option value="<?= $p->m_no ?>"><?= $p->m_name ?></option>
		<?php } ?>
	</select>
</div>
<div class="letter_content">
	<textarea style="width: 100%;" name="content" id="content" placeholder="내용을 입력하세요." required></textarea>
</div>
<div class="letter_item">
	<div style="font-weight: 900; font-style: italic;">보낼 물건</div>
		<div class="item_select">
			<select class="item_name" id="item1" name="item1">
				<option value="0">선택없음</option>
				<?php foreach(query("select *, count(in_item) item_num from INVENTORY, ITEM where in_item = i_no and in_player = '{$_SESSION['no']}' and i_yn = 1 and in_use_date is NULL group by in_item") as $row) {?>
				<option value="<?=$row->in_item?>" data-num="<?=$row->item_num?>"><?= $ITEM[$row->in_item] ?></option>
				<?php } ?>
			</select>
			<select class="item_num" id="item1" name="num1" disabled>
				<option value="0">0개</option>
			</select>
		</div>
		<div class="item_select">
			<select class="item_name" id="item2" name="item2">
				<option value="0">선택없음</option>
				<?php foreach(query("select *, count(in_item) item_num from INVENTORY, ITEM where in_item = i_no and in_player = '{$_SESSION['no']}' and i_yn = 1 and in_use_date is NULL group by in_item") as $row) {?>
				<option value="<?=$row->in_item?>" data-num="<?=$row->item_num?>"><?= $ITEM[$row->in_item] ?></option>
				<?php } ?>
			</select>
			<select class="item_num" id="item2" name="num2" disabled>
				<option value="0">0개</option>
			</select>
		</div>
		<div class="item_select">
			<select class="item_name" id="item3" name="item3">
				<option value="0">선택없음</option>
				<?php foreach(query("select *, count(in_item) item_num from INVENTORY, ITEM where in_item = i_no and in_player = '{$_SESSION['no']}' and i_yn = 1 and in_use_date is NULL group by in_item") as $row) {?>
				<option value="<?=$row->in_item?>" data-num="<?=$row->item_num?>"><?= $ITEM[$row->in_item] ?></option>
				<?php } ?>
			</select>
			<select class="item_num" id="item3" name="num3" disabled>
				<option value="0">0개</option>
			</select>
		</div>
</div>
<button class="letter_btn" name="letter_write" value="보내기"><img src="/common/img/letter/write_hover.png" onmouseover="this.src='/common/img/letter/write.png';" onmouseout="this.src='/common/img/letter/write_hover.png';"></button>
<a class="letter_btn" href="/index.php/letter">
<img style="margin-right: 10px;"  src="/common/img/letter/list.png" onmouseover="this.src='/common/img/letter/list_hover.png';" onmouseout="this.src='/common/img/letter/list.png';">
</a>
</form>
<style>
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/letter/letter_back.png'); background-repeat: no-repeat;}
	.content_top, .content_bottom { display: none; }
	
	button { border: none; background: none; }
</style>
<script>
$(".item_name").on("change",function(){
	chk = $("select option:selected[value='" + $(this).val() + "']").length
	if(chk > 1){
		alert("중복된 물품이 선택되었습니다.");
		$(this).find('option:first').attr('selected', 'selected');
	}
	
	if($(this).val()!="0"){
		$(this).siblings().find('option').remove();
		$(this).siblings().attr('disabled', false);
		num = $(this).find('option:selected').data("num");
		for(var i=1; i<=num; i++){
		$(this).siblings().append("<option value='"+i+"'>"+i+"개</option>");
		}
	} else {
		$(this).siblings().attr('disabled', true);
		$(this).siblings().find("option:eq(0)").prop("selected", true);
	}

});	
</script>
