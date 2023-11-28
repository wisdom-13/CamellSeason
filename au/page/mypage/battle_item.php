<?php include "{$_SERVER['DOCUMENT_ROOT']}/au/include/lib.php" ?>
<?php include "{$_SERVER['DOCUMENT_ROOT']}/au/include/list.php" ?>

<div class="battle_item_list">
	<?php foreach(query("select * from AU_ITEM, AU_INVENTORY where i_no = in_item and in_player = $AU and in_use_info is NULL and i_type = 2") as $row){ ?>
	<div data-name="<?= $row->i_name ?>" data-no="<?= $row->i_no ?>" data-sys="<?= $row->i_sys ?>" class="battle_item_box">
		<img src="/au/common/img/item/<?= $row->i_name ?>.png">
		<div class="battle_item_text">
			<h5 style="font-size: 17px; color: #4f78ff; font-weight: bold;"><?= $row->i_name ?></h5>
			<p style="font-size: 11px; color:#7d88d8;"><?= nl2br($row->i_content) ?></p>
		</div>
	</div>
	<?php } ?>
</div>
<div class="battle_item_use">
	<img class="battle_item_use_img" src="http://placehold.it/160x160">
	<h4 style="text-align: center; color: #4f78ff; font-weight: bold">아이템 선택 </h4>
	<button onClick="item()"><img src="/au/common/img/battle/use.png" onmouseover="this.src='/au/common/img/battle/use_hover.png';" onmouseout="this.src='/au/common/img/battle/use.png';"></button>
</div>

<script>
	
$(".battle_item_box").on("click",function(){
	name = $(this).data("name");
	no = $(this).data("no");
	sys = $(this).data("sys");
	$(".battle_item_use h4").text(name);
	$(".battle_item_use_img").attr("src","/au/common/img/item/"+name+".png");
})
	
function item(){
	room = $("select[name=room]").val();
	$.ajax({
		type:"POST",
		url:"/au/index.php/ok/battle/item",
		data:{no:no,name:name,room:room,sys:sys},
		success:function(e){
			console.log(e);
			$(".battle_left").load('/au/page/mypage/battle_profile.php');
			$(".battle_item").load('/au/page/mypage/battle_item.php');
			$(".battle_right").load('/au/page/mypage/battle_log.php',{val:room});
		}
	});
}
</script>