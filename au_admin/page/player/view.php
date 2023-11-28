<?php $player_view = fetchAll("SELECT * FROM AU_PLAYER where p_no='{$val1}'") ?>

<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-9">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> <?= $player_view->p_name; ?> </h5>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3">
		<a href="javascript:confirmDelete('/au_admin/index.php/ok/player/delPlayer/<?= $player_view->p_no ?>')" class="btn btn-danger btn-xs side_btn">삭제</a>
		<a href="/au_admin/index.php/player/edit/<?= $player_view->p_no ?>" class="btn btn-primary btn-xs side_btn">수정</a>
		<a href="/au_admin/index.php/player/profile" class="btn btn-success btn-xs side_btn">이전</a>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 profile">
		<h4>" <?= $player_view->p_word; ?> "</h4>
		<img width="800px;" src="/au/common/img/profile/body/<?= $val1 ?>.png">
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 profile">
		<img width="250px" src="/au/common/img/profile/head/<?= $val1 ?>.png">
	</div>
	<div class="col-xs-9 col-sm-9 col-md-9 profile">
		<p>이름 : <?= $player_view->p_name; ?> / <?= $player_view->p_name_j; ?></p>
		<p>성별 : <?= $SEX[$player_view->p_sex]; ?> | 나이 : <?= $player_view->p_age; ?> | 생일 : <?= $player_view->p_brith; ?></p>
		<p>신체 : <?= $player_view->p_hight; ?></p>
		<p>등급 : <?= $player_view->p_grade; ?></p>
		<p>츠보미 : <?= $player_view->p_ability_name; ?></p>
		<p>타입 : <?= $TYPE[$player_view->p_type]; ?> 타입</p>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 profile">		
		<p class="lead">외형</p>
		<p><?= nl2br($player_view->p_look); ?></p>
		<hr>
		<p class="lead"><?= $player_view->p_ability_name; ?></p>
		<p><?= nl2br($player_view->p_ability); ?></p>
		<hr>
		<p class="lead">성격</p>
		<p><?= nl2br($player_view->p_info); ?></p>
		<hr>
		<p class="lead">특징</p>
		<p><?= nl2br($player_view->p_etc); ?></p>
		<hr>
		<p class="lead">비밀설정</p>
		<p><?= nl2br($player_view->p_hidden); ?></p>
		
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 profile">		
		<hr><p class="lead">관계</p>
		<?php foreach(query("select * from AU_RELATION where r_player = $val1") as $re){ ?>
			<p style="font-weight: bold"><?= $PLAYER[$re->r_player_to] ?> - <?= $re->r_title ?></p>
			<p><?= $re->r_content ?></p>
		<?php } ?>
	</div>
</div>

<style>
	.profile { text-align: center; padding: 30px 100px; margin-top: 10px; }
	a { margin:0 2px;}
	p { font-size: 14px; line-height: 180%; text-align: left; }
	hr { margin: 30px auto; }
</style>

<script>
	function confirmDelete(url) {
		if(confirm('정말 삭제하시겠습니까?')) {
			location.href = url;
		}
	}
</script>