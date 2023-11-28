<?php $player = fetchAll("select * from PLAYER where p_no = '{$_SESSION["p2"]}'");  ?>
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
				   <?= "소지금 : ". $POINT->m_point ."花" ?>
				</p>
            </div>
        </div>
    	</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		<div class="card card">
            <div class="card-header">
				<b>공지사항</b>
			</div>
            <div class="card-body">
            	<table class="table">
            		<colgroup>
						<col width="70%">
						<col width="30%">
					</colgroup>
					<?php 
					foreach(query("select * from BOARD") as $row) { ?>
					<tr>
						<td style="text-align: left; padding-left: 10px;"><a href="/m/index.php/board/view/<?= $row->b_no ?>"><?= $row->b_title ?></a></td>
						<td><?= $row->b_date ?></td>
					</tr>
					<?php } ?>
				</table>

            </div>
		</div>
		</div>
	</div>
</div>