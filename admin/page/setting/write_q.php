
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 질문</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
	<form method="post" action="/admin/index.php/ok/setting/qnaWrite">
		<select class="form-control" name="type">
			<option value="1">세계관</option>
			<option value="2">시스템</option>
			<option value="3">캐릭터</option>
			<option value="4">기타</option>
		</select><br>
		<textarea rows="10" class="form-control" name="title" placeholder="질문"></textarea><br>
		<textarea rows="10" class="form-control" name="content" placeholder="답변"></textarea>
		<button type="submit" class="btn btn-danger btn-xs side_btn">등록</button>
	</form>
	</div>
	
</div>	

<style>
	table tr td { text-align: left; padding-bottom: 300px; }
	input { margin-bottom: 10px; }
	button { margin-left: 5px; }
</style>
