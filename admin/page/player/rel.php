<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 관계 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_rel">관계 등록</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>초등부</th>
				<th>중등부</th>
				<th>고등부</th>
				<th>DEL</th>
			</tr>
			<?php foreach (query("SELECT * FROM RELATION") as $row){ ?>
			<tr>
				<td><?= $row->r_no ?></td>
				<td><?= $PLAYER[$row->r_player] ?> <-> <?= $PLAYER[$row->r_player_to] ?></td>
				<td class="t_left"><b><?= $row->r_title_1 ?></b><br><?= nl2br($row->r_content_1) ?></td>
				<td class="t_left"><b><?= $row->r_title_2 ?></b><br><?= nl2br($row->r_content_2) ?></td>
				<td class="t_left"><b><?= $row->r_title_3 ?></b><br><?= nl2br($row->r_content_3) ?></td>
				<td><a href="javascript:confirmDelete('/admin/index.php/ok/player/delRel/<?= $row->r_no;?>')" style="color:#000">삭제</a></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>

<div class="modal fade" id="add_rel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/index.php/ok/player/addRel" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">관계 등록</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">캐릭터</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" name="player">
							<?php for($i=1; $i<50; $i++ ){ if(isset($PLAYER[$i])){ ?>
								<option value="<?= $i ?>"><?= $PLAYER[$i] ?></option>
							<?php }} ?>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">캐릭터</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" name="player_to">
							<?php for($i=1; $i<50; $i++ ){ if(isset($PLAYER[$i])){ ?>
								<option value="<?= $i ?>"><?= $PLAYER[$i] ?></option>
							<?php }} ?>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">타입</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" name="type">
							<option value="1" selected>초등부</option>
							<option value="2">중등부</option>
							<option value="3">고등부</option>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;" required>제목</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="title" name="title"></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;" required>내용</div>
					<div class="col-md-10 col-md-offset-10"><textarea class="form-control" rows="5" id="content" name="content"></textarea></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="add_rel" value="추가">추가</button>
			</div>
		</div>
		</form>
	</div>
</div>



<script>
	function confirmDelete(url) {
		if( confirm('정말 삭제하시겠습니까?') ) {
			location.href = url;
		}
	}
</script>