<div class="sub">
	<div class="letter">
		<form method="post" action="/au/index.php/ok/system/letter">
			<div class="letter_left">
				<div class="letter_title"><input name="title" placeholder="제목을 입력해주세요." required></div>
				<div class="letter_content"><textarea style="height: 100%;" name="content" placeholder="내용을 입력해주세요." required></textarea></div>
			</div>
			<div class="letter_right">
				<div class="letter_player">
					<select name="player" style="color: #fff">
						<option value="0">받는이</option>
						<?php foreach(query("select * from MEMBER where m_au not in ($AU, 0) and m_au is not null order by m_name") as $p){ ?>
							<option value="<?= $p->m_au ?>"><?= $p->m_name ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="letter_item">
					<select class="item_name" name="item" style="width: 78%">
						<option value="0">선택없음</option>
						<?php foreach(query("select *, count(in_item) item_num from AU_INVENTORY, AU_ITEM where in_item = i_no and in_player = '$AU' and i_yn = 1 and in_use_date is NULL group by in_item") as $row) {?>
						<option value="<?=$row->in_item?>" data-num="<?=$row->item_num?>" data-name="<?= $row->i_name ?>"><?= $ITEM[$row->in_item] ?></option>
						<?php } ?>
					</select>
					<select class="item_num" name="num">
						<option value="0">0개</option>
					</select>
					<div class="letter_item_box" style="margin-top: 10px;"><img width="200px" src=""></div>
					<h3 style=" margin-bottom: 10px;">　</h3>
					<img src="/au/common/img/letter/barcode.png">
				</div>
				<button type="button" style="margin-top: 15px; display: block; background: none; border: none;" onClick="href('/au/index.php/mypage/letter_list/<?= $val1 ?>')"><img src="/au/common/img/letter/list.png" onmouseover="this.src='/au/common/img/letter/list_hover.png';" onmouseout="this.src='/au/common/img/letter/list.png';"></a>
				<button type="submit" style="margin-top: 15px; display: block; background: none; border: none;"><img src="/au/common/img/letter/big_send.png" onmouseover="this.src='/au/common/img/letter/big_send_hover.png';" onmouseout="this.src='/au/common/img/letter/big_send.png';"></button>
			</div>
		</form>
	</div>
</div>
<script>
$(".item_name").on("change",function(){
	if($(this).val()!="0"){
		$(this).siblings().find('option').remove();
		$(this).siblings().attr('disabled', false);
		
		num = $(this).find('option:selected').data("num");
		name = $(this).find('option:selected').data("name");
		$(".letter_item_box img").attr("src","/au/common/img/item/"+name+".png");
		$(".letter_item h3").text(name);
		for(var i=1; i<=num; i++){
		$(this).siblings(".item_num").append("<option value='"+i+"'>"+i+"개</option>");
		}
	} else {
		$(this).siblings().attr('disabled', true);
		$(this).siblings().find("option:eq(0)").prop("selected", true);
	}
	
});	
	
function href(url){
	if(confirm("목록으로 이동할 경우 작성중인 메세지가 삭제됩니다.")){
		location.href = url;
	}
}
</script>