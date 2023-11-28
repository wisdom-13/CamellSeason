<?php $row = fetchAll("select * from LETTER where l_no = '{$val1}'"); ?>

<div class="table_title"><img src="/common/img/letter/letter_title.png"></div>

<table class="table">
	<colgroup>
		<col width="65%">
		<col width="20%">
		<col width="15%">
	</colgroup>
	<tr>
		<th style="text-align: left; padding-left:30px;"><?= $row->l_title ?></th>
		<th><?= ($_SESSION["no"]==$row->l_to) ? $PLAYER[$row->l_from] : $PLAYER[$row->l_to] ?></th>
		<th><?= $row->l_date ?></th>
	</tr>
</table>
<div class="letter_content">
	<div><?= nl2br($row->l_content) ?></div>
</div>

<!--받은 편지-->
<?php if($_SESSION["no"]==$row->l_to){ query("update LETTER set l_read = 1 where l_no = '{$val1}'") ?> 

<div class="letter_item">
	<?php if($row->l_item!=""){ ?>
	<div class="letter_item_left">
	<?php $item = explode(",",$row->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); $i_img = fetchAll("select * from ITEM where i_no = $num[0]")?>
	<div class="letter_item_box"><img style="width: 50px;" src="<?= $i_img->i_img ?>"><span><?= $num[1] ?></span></div>
	<?php } ?>
	</div>
	<div class="letter_item_right">
		<div style="font-weight: 900; font-size: 13px; font-style: italic;">받은 물건</div>
		<div style="font-size: 13px;"><?php $item = explode(",",$row->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1] .") ";} ?></div>
		<?php if($row->l_get=="0"){ ?>
		<img class="letter_get" data-no="<?= $row->l_no ?>" data-item="<?= $row->l_item ?>" data-from="<?= $row->l_from ?>" style="margin-top: 2px; " src="/common/img/letter/get.png" onmouseover="this.src='/common/img/letter/get_hover.png';" onmouseout="this.src='/common/img/letter/get.png';">
		<?php } ?>
	</div>
	<?php } ?>
</div>

<!--보낸 편지-->
<?php } else if($_SESSION["no"]==$row->l_from){ ?> 

<div class="letter_item">
	<div class="letter_item_left">
	<?php $item = explode(",",$row->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); $i_img = fetchAll("select * from ITEM where i_no = $num[0]")?>
	<div class="letter_item_box"><img style="width: 50px;" src="<?= $i_img->i_img ?>"><span><?= $num[1] ?></span></div>
	<?php } ?>
	</div>
	<div class="letter_item_right">
		<div style="font-weight: 900; font-size: 14px; font-style: italic; margin-top: 10px;">보낸 물건</div>
		<div style="font-size: 12px;"><?php $item = explode(",",$row->l_item); for($i=0; $i < count($item); $i++){ $num = explode("^",$item[$i]); echo $ITEM[$num[0]]."(".$num[1]."), ";} ?></div>
	</div>
</div>

<?php } else { am("잘못된접근입니다.","/index.php/letter"); } ?>


<a href="/index.php/letter">
<img class="letter_btn" src="/common/img/letter/list.png" onmouseover="this.src='/common/img/letter/list_hover.png';" onmouseout="this.src='/common/img/letter/list.png';">
</a>

<style>
	.content { padding: 30px 50px; margin: 0 auto;  background: url('/common/img/letter/letter_back.png'); }
	.content_top, .content_bottom { display: none; }
	
	
</style>

<script>
	$('.letter_get').on("click",function(){
		if( confirm('상품을 수령할까요?') ) {
			no = $(this).data('no');
			item = $(this).data('item');
			from = $(this).data('from');
			$.ajax({
				type:"POST",
				url:"/index.php/ok/letter/letter_get",
				data:{no:no,item:item,from:from},
				success: function($e){
					alert("상품을 수령했습니다.");
					location.href='/index.php/letter/view/'+no;
				}
			});
		}
	});
</script>
