<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 츠보미 성장 방향 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button type="button" class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_growth">
			성장 방향 추가
		</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>단계</th>
				<th>설명</th>
				<th>삭제</th>
			</tr>
			<?php foreach(query("SELECT * FROM GROWTH") as $row){?>
			<tr>
				<td rowspan="3"><?= $row->g_player ?></td>
				<td rowspan="3"><?= $PLAYER[$row->g_player] ?></td>
				<td>3단계</td>
				<td><?= $row->g_3 ?></td>
				<td rowspan="3"><a href="javascript:confirmDelete('/admin/index.php/ok/player/delGrowth/<?= $row->g_no;?>')" style="color:#000">삭제</a></td>
				
			</tr>
			<tr>
				<td>6단계</td>
				<td><?= $row->g_6 ?></td>
			</tr>
			<tr>
				<td>9단계</td>
				<td><?= $row->g_9 ?></td>
			</tr>
			
			<? } ?>
		</table>
	</div>
</div>

<div class="modal fade" id="add_growth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/index.php/ok/player/addGrowth" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">츠보미 성장 방향 추가</h5>
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
					<div class="col-md-2" style="line-height:35px;">3단계</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="g_1" name="g_1" required></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">6단계</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="g_1" name="g_2" required></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">9단계</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="g_1" name="g_3" required></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="add_growth" value="추가">추가</button>
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