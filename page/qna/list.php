<div class="table_title"><img src="/common/img/qna/qna.png"></div>

<div class="qna_menu">
		<a <?= ($val1=="0") ? 'style="font-weight: 900;" ' : "" ?> href="/index.php/qna/list/0">전체</a> |
		<a <?= ($val1=="1") ? 'style="font-weight: 900;" ' : "" ?>  href="/index.php/qna/list/1"> 세계관</a> |
		<a <?= ($val1=="2") ? 'style="font-weight: 900;" ' : "" ?>  href="/index.php/qna/list/2"> 시스템</a> |
		<a <?= ($val1=="3") ? 'style="font-weight: 900;" ' : "" ?>  href="/index.php/qna/list/3"> 캐릭터</a> |
		<a <?= ($val1=="4") ? 'style="font-weight: 900;" ' : "" ?>  href="/index.php/qna/list/4">기타</a>
	</div>
	<div class="qna_list">	
		<?php $type = ($val1 == "0") ? "" : "where qn_type = '{$val1}'"; 
		foreach(query("select * from QNA $type") as $row){ ?>
		<div class="qna">
			<h2>Q. <?= $row->qn_title ?></h2>
			<img class="open" src="/common/img/qna/open.png">
			<div class="h_con">
				A. <?= nl2br($row->qn_content) ?>
			</div>
		</div>
		<?php } ?>
	</div>

<style>
	.qna_list {margin-top: 10px; height: 440px; overflow: scroll; }
	.qna_menu { text-align: right; margin: 10px 0}
	.qna_menu a { padding: 5px; cursor: pointer; }
	.qna { width:800px; float: left; padding: 12px; border-bottom: 1px #ccc solid; box-sizing: border-box; text-align: left; opacity: 0.8 }
	.qna h2 { width: 750px; float: left; font-size: 15px; color: #141414; margin: 0; }
	.open, .close { display: block; width: 18px; float: right; padding: 5px 0;}
	.h_con { width: 100%; font-size: 14px; float: left; margin-top: 10px; display: none; color: #585858; line-height: 180%; }
</style>
<script>
	$(".qna h2").on("click",function(){
		if($(this).siblings(".open").attr("alt")=="open"){
			$(this).css("font-weight", "900");
			$(this).siblings(".h_con").stop().slideDown();
			$(this).siblings(".open").attr("src",src="/common/img/qna/close.png");
			$(this).siblings(".open").attr("alt","close");
		} else {
			$(this).css("font-weight", "normal");
			$(this).siblings(".h_con").stop().slideUp();
			$(this).siblings(".open").attr("src",src="/common/img/qna/open.png");
			$(this).siblings(".open").attr("alt","open");
		}
	});
</script>