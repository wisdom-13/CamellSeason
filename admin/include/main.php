<div class="main">
	<div class="slide">
		<ul>
			<?php 
			$query = "select * from BANNER where b_type = 1 and not b_order = 0 order by b_order ascc";
			foreach(query($query) as $row){ ?>
			<li><a href="<?= $row->b_url ?>"><img src="<?= $row->b_img ?>"></a></li>
			<?php } ?>
		</ul>
		<div class="slide_but">
			<span class="pos">
				<?php for($i=="0"; $i<rowAll($query); $i++){ ?>
				<button onClick="slide('',<?= $i ?>)">●</button>
				<?php } ?>
			</span>
		</div>
	</div>
	<div class="main_bottom">
		<div class="main_left">
			<div class="twt">
			<a class="twitter-timeline" href="https://twitter.com/camell_season" data-link-color="#851210" data-theme="white" height="396" width="240" 
             data-chrome="transparent noheader noborders nofooter"></a> 
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			</div>
		</div>
		<div class="main_center">
			<div class="main_cal">
				<img src="/common/img/main/schedule.png">
			</div>
			<div class="main_btn">
				<a href="https://www.evernote.com/shard/s673/sh/d586c00b-516d-4a1b-8093-1d0d8fba993f/e6fd8001f018ce5708495dbbef21cdae" style="background: url('/common/img/main/app_hover.png')"><img src="/common/img/main/app.png"></a>
				<a href="/index.php/qna/list/0" style="background: url('/common/img/main/qna_hover.png')"><img src="/common/img/main/qna.png"></a>
				<a href="/index.php/history" style="background: url('/common/img/main/history_hover.png')"><img src="/common/img/main/history.png"></a>
			</div>
		</div>
		<div class="main_right">
			<div class="main_box">
				<ul>
					<?php foreach(query("select * from BOARD order by b_no desc") as $row){ ?>
					<li><a href="/index.php/board/view/<?= $row->b_no ?>"><?= $row->b_title ?></a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="main_logo">
				<img src="/common/img/main/logo.png">
			</div>
			<div class="main_manager">
				<img src="/common/img/main/manager.png">
			</div>
		</div>
	</div>
</div>

<script>
	
	//alert($(".slide ul li img").length)

	$(".main_btn a").on("mouseover",function(){
		$(this).children("img").css("opacity","0");
	})
	
	$(".main_btn a").on("mouseleave",function(){
		$(this).children("img").css("opacity","100");
	})
</script>
