 <?php $row = fetchAll("select * from AU_LETTER where l_no = $val2"); ?>
<div class="sub">
	<div class="letter">
		<div class="letter_left">
			<div class="letter_title"><?= $row->l_title ?><span style="float: right"><?= $row->l_date ?></span></div>
			<div class="letter_content"><?= nl2br($row->l_content) ?></div>
		</div>
		<div class="letter_right">
			<div class="letter_player"><?= ($val1=="2") ? $PLAYER[$row->l_to] : $PLAYER[$row->l_from] ?></div>
			<div class="letter_item">
				<?php if($row->l_item != ""){ $item = explode("^",$row->l_item); $item_img = fetchAll("select * from AU_ITEM where i_no = $item[0]"); ?>
				<div class="letter_item_box" style="margin-top: 30px;"><img width="200px" src="/au/common/img/item/<?= $item_img->i_name ?>.png"></div>
				<h3 style=" margin-bottom: 30px;"><?= $ITEM[$item[0]] ?> (<?= $item[1] ?>)</h3>
				<img src="/au/common/img/letter/barcode.png">
				<?php } else { ?>
				<div class="letter_item_box" style="margin-top: 10px;"></div>
				<?php } ?>
			</div>
			<a href="/au/index.php/mypage/letter_list/<?= $val1 ?>"><img src="/au/common/img/letter/big_list.png" onmouseover="this.src='/au/common/img/letter/big_list_hover.png';" onmouseout="this.src='/au/common/img/letter/big_list.png';"></a>
		</div>
	</div>
</div>