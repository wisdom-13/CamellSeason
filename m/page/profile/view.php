<?php $player = fetchAll("select * from PLAYER p, MEMBER m where (m_player = p_no || m_player2 = p_no || m_player3 = p_no) and p_no = '$val1'");  ?>
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
                <div style="text-align: center"><a href="/admin/common/img/profile/<?= $player->p_age ?>/body/<?= $player->p_no ?>.png">전신 이미지 보기</a></div>
            </div>
            <hr>
            <div class="button-container">
                <a href="/m/index.php/profile/view/<?= $player->m_player ?>" <?= $val1==$player->m_player ? "style='color: #666'" : "" ?> class="btn btn-neutral">
                    초등부
                </a>
                <a href="/m/index.php/profile/view/<?= $player->m_player2 ?>" <?= $val1==$player->m_player2 ? "style='color: #666'" : "" ?> class="btn btn-neutral">
                    중등부
                </a>
                <a href="/m/index.php/profile/view/<?= $player->m_player3 ?>" <?= $val1==$player->m_player3 ? "style='color: #666'" : "" ?> class="btn btn-neutral">
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
		<? 
			if($val1<="45") { $num = "1"; } else if($val1<="88") { $num = "2"; } else { $num = "3"; }
			$r_title = r_title_.$num;
			$r_content = r_content_.$num;
			foreach(query("select * from RELATION where r_player = $player->m_no and $r_content is not NULL") as $re){ 
			
		?>
			<div class="col-md-12">
			<div class="card ">
				<div class="card-header"><b><?= $PLAYER[$re->r_player_to]." : ".$re->$r_title ?></b></div>
				<div class="card-body "><?= nl2br($re->$r_content)?></div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>