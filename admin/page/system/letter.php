<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 서신함 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button type="button" class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target=".bs-example-modal-lg">서신작성</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		<tr>
			<th>NO</th>
			<th>제목</th>
			<th>보내는이</th>
			<th>받는이</th>
			<th>날짜</th>
			<th>수신확인</th>
		</tr>
		<?php foreach(query("select * from LETTER order by l_no desc limit 300") as $row){ ?>
		<tr>
			<td><?= $row->l_no ?></td>
			<td><a href="/admin/index.php/system/view/<?= $row->l_no ?>"><?= $row->l_title ?></a></td>
			<td><?= $PLAYER[$row->l_from] ?></td>
			<td><?= $PLAYER[$row->l_to] ?></td>
			<td><?= $row->l_date ?></td>
			<td><?= $YN[$row->l_read] ?></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/system/letter" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">서신 작성</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">보내는 사람</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" name="to">
						<?php foreach(query("select * from MEMBER") as $p){ ?>
							<option value="<?= $p->m_no ?>"><?= $p->m_name ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">받는 사람</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" name="from">
						<option value="0">단체</option>	
						<?php foreach(query("select * from MEMBER") as $p){ ?>
							<option value="<?= $p->m_no ?>"><?= $p->m_name ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">제목</div>
					<div class="col-md-10 col-md-offset-10">
						<input class="form-control" type="text" name="title" value="0">
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">내용</div>
					<div class="col-md-10 col-md-offset-10">
						<textarea class="form-control" rows="20" name="content"></textarea>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">아이템</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control">
						<option value="0">없음</option>	
							<?php foreach(query("select * from ITEM") as $item){ ?>
							<option value="<?= $item->i_no ?>"><?= $item->i_name ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">화</div>
					<div class="col-md-10 col-md-offset-10">
						<input class="form-control" type="number" name="price" value="0">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="add_slide" value="추가">추가</button>
			</div>
		</div>
		</form>
	</div>
</div>