<?php $player_view = fetchAll("SELECT * FROM PLAYER where p_no='{$val1}'") ?>

<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-9">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> <?= $player_view->p_name; ?> </h5>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3">
		<a href="javascript:confirmDelete('/admin/index.php/ok/player/delPlayer/<?= $player_view->p_no ?>')" class="btn btn-danger btn-xs side_btn">삭제</a>
		<a href="/admin/index.php/player/edit/<?= $player_view->p_no ?>" class="btn btn-primary btn-xs side_btn">수정</a>
		<a href="/admin/index.php/player/profile" class="btn btn-success btn-xs side_btn">이전</a>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 profile">
		<h4>" <?= $player_view->p_word; ?> "</h4>
		<img width="800px;" src="/admin/common/img/profile/<?=$player_view->p_age; ?>/body/<?= $player_view->p_no ?>.png">
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 profile">
		<img width="250px" src="/admin/common/img/profile/<?=$player_view->p_age; ?>/head/<?= $player_view->p_no ?>.png">
	</div>
	<div class="col-xs-9 col-sm-9 col-md-9 profile">
		<p>이름 : <?= $player_view->p_name; ?> / <?= $player_view->p_name_j; ?></p>
		<p>성별 : <?= $SEX[$player_view->p_sex]; ?> | 나이 : <?= $AGE[$player_view->p_age]; ?> | 생일 : <?= $player_view->p_brith; ?></p>
		<p>신체 : <?= $player_view->p_hight; ?></p>
		<p>반 : <?= $CLASS[$player_view->p_class]; ?> | 등급 : <?= $GRADE[$player_view->p_grade]; ?></p>
		<p>츠보미 : <?= $player_view->p_avility_name; ?></p>
		<p>타입 : <?= $TYPE[$player_view->p_type]; ?> 타입</p>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 profile">		
		<p class="lead">외형</p>
		<p><?= nl2br($player_view->p_look); ?></p>
		<hr>
		<p class="lead"><?= $player_view->p_avility_name; ?></p>
		<p><?= nl2br($player_view->p_avility); ?></p>
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