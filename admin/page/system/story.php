<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 도서관 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button type="button" class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target=".bs-example-modal-lg">스토리 등록</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
		
		<?php foreach(query("select * from STORY") as $row){ ?>
		<tr>
			<td style="text-align: left"><a href="/admin/index.php/system/s_view/<?= $row->s_no ?>"><?= $row->s_act ?>막 <?= $row->s_chapter ?>장 <?= $row->s_title ?></a></td>
		</tr>
		<?php } ?>
	</table>
	</div>
</div>	

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/system/story" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">스토리 등록</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">막</div>
					<div class="col-md-10 col-md-offset-10">
						<input class="form-control" type="number" name="act" value="1">
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">장</div>
					<div class="col-md-10 col-md-offset-10">
						<input class="form-control" type="text" name="chapter" value="1">
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">제목</div>
					<div class="col-md-10 col-md-offset-10">
						<input class="form-control" type="text" name="title">
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">내용</div>
					<div class="col-md-10 col-md-offset-10">
						<textarea class="form-control" rows="20" name="content"></textarea>
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">공개</div>
					<div class="col-md-10 col-md-offset-10">
						<input class="form-control" type="radio" name="yn" value="yes">
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