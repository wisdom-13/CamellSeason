<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 임무 등록</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
	<form method="post" action="/au_admin/index.php/ok/mission/add_mission">
		<input type="text" name="title" class="form-control" placeholder="TITIEL">
		<textarea rows="18" class="form-control" name="content"></textarea><br>
		시작일 : <input class="form-control" type="date" name="start">
		종료일 : <input class="form-control" type="date" name="end">
		<button type="submit" class="btn btn-danger btn-xs side_btn">등록</button>
	</form>
	</div>
	
</div>	

<style>
	input { margin-bottom: 10px; }
	button { margin-left: 5px; }
</style>
