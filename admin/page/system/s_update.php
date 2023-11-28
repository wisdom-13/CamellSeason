<?php $row = fetchAll("select * from STORY where s_no = $val1"); ?>
<form action="/admin/index.php/ok/system/story_update/<?= $val1 ?>" method="post">
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 도서관 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		
		<button type="submit" class="btn btn-info btn-xs side_btn">완료</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12"><br>
		<input class="form-control" type="text" name="title" value="<?= $row->s_title ?>"><br>
		<textarea class="form-control" rows="25" name="content"><?= $row->s_content ?></textarea><br>
		공개 <input type="radio" name="yn" value="yes" <?= ($row->s_yn == "1" ? "checked" : "")?> >
	</div>
</div>	
</form>