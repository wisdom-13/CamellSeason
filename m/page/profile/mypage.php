<?php $p = "p".$val1; $player = fetchAll("select * from PLAYER where p_no = '{$_SESSION[$p]}'");  ?>
<div class="content">
	<div class="row">
		<div class="col-md-12">
        <div class="card card-user">
            <div class="card-body">
                <div class="author">
                    <img style="background: #fff;" class="avatar border-gray" src="/admin/common/img/profile/<?= $player->p_age ?>/head/<?= $player->p_no ?>.png">
                    <h5 class="title" style="margin: 0;"><?= $player->p_name ?></h5>
                    <p class="description">
                       <?= $player->p_name_j ?>
                    </p>
                </div>
                <p class="description text-center" style="font-size: 12px;">
                    <?php $pro = fetchAll("select p_pro from PLAYER where p_no = '{$_SESSION["p1"]}'"); //성장하면 수정하기 ?>
                     <?= $CLASS[$player->p_class] ?> | <?= $player->p_avility_name	?><br>
                    <?= $GRADE[$player->p_grade] ?> | <?= $pro->p_pro ?>단계<br>
                    신체 : <?= $player->p_hight ?> | 생일 : <?= $player->p_brith ?>
                </p>
                <p class="description text-center" style="font-weight: 900; color: #000; font-size: 13px; margin-bottom: 0">
				   <?= "소지금 : ".$_SESSION["point"]."花" ?>
				</p>
            </div>
            <hr>
            <div class="button-container">
                <a href="/m/index.php/profile/list/1" class="btn btn-neutral">
                    초등부
                </a>
                <a style="color: #666" class="btn btn-neutral">
                    중등부
                </a>
                <a class="btn btn-neutral">
                    고등부
                </a>
            </div>
        </div>
    	</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b><?= $player->p_avility_name?></b></div>
				<div class="card-body "><?= nl2br($player->p_avility)?></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>외형</b></div>
				<div class="card-body "><?= nl2br($player->p_look)?></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>성격</b></div>
				<div class="card-body "><?= nl2br($player->p_info)?></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>기타</b></div>
				<div class="card-body "><?= nl2br($player->p_etc)?></div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header "><b>비밀설정</b></div>
				<div class="card-body "><?= nl2br($player->p_hidden)?></div>
			</div>
		</div>
	</div>
</div>