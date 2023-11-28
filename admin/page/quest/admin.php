<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 관리자 의뢰</h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_quest">의뢰 등록</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>제목</th>
				<th>의뢰인</th>
				<th>수행인</th>
				<th>수락날짜</th>
				<th>상태</th>
			</tr>
			<?php foreach(query("select * from REQUEST where q_player in (1,2,3) and not q_type = 4") as $row){ ?>
			<tr>
				<td><?= $row->q_no ?></td>
				<td><a href="/admin/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
				<td><?= $PLAYER[$row->q_player] ?></td>
				<td><?= $PLAYER[$row->q_player_to] ?></td>
				<td><?= $row->q_date_end ?></td>
				<td><?php if($row->q_type == "3"){ ?><a href="/admin/index.php/ok/quest/endQuset/<?= $row->q_no ?>">완료</a><?php } elseif ($row->q_type == "2") { ?><a  href="javascript:confirmDelete('/admin/index.php/ok/quest/delQuest/<?= $row->q_no ?>')">삭제</a> <?php } ?></td>
			</tr>
			<? } ?>
		</table>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>제목</th>
				<th>의뢰인</th>
				<th>수행인</th>
				<th>수락날짜</th>
				<th>상태</th>
			</tr>
			<?php foreach(query("select * from REQUEST where q_player = 1 and q_type = 4") as $row){ ?>
			<tr>
				<td><?= $row->q_no ?></td>
				<td><a href="/admin/index.php/quest/view/<?= $row->q_no ?>"><?= $row->q_title ?></a></td>
				<td><?= $PLAYER[$row->q_player] ?></td>
				<td><?= $PLAYER[$row->q_player_to] ?></td>
				<td><?= $row->q_date_end ?></td>
				<td>완료</td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	
<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="add_quest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/quest/addQuest" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">의뢰 등록</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">의뢰인</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" name="player">
						<?php foreach(query("select * from MEMBER") as $p){ ?>
							<option value="<?= $p->m_no ?>"><?= $p->m_name ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">의뢰 제목</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="title" name="title" required></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">설명</div>
					<div class="col-md-10 col-md-offset-10"><textarea class="form-control" rows="5" id="content" name="content" required></textarea></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">보수</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="price" name="price" value="0" required></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">보상</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item" name="item">
							<option value="0">없음</option>
							<?php foreach(query("select * from ITEM order by i_type asc, i_name asc") as $row) {?>
							<option value="<?= $row->i_no ?>"><?= $ITEM[$row->i_no] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="addQuest" value="추가">추가</button>
			</div>
		</div>
		</form>
	</div>
</div>

<style>
	select, textarea { margin-bottom: 10px;}
</style>

<script>
function confirmDelete(url) {
		if( confirm('정말 삭제하시겠습니까?') ) {
			location.href = url;
		}
	}
</script>