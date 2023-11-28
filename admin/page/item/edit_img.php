<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 이미지 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a style="margin-left: 10px;" class="btn btn-info btn-xs side_btn" href="/admin/index.php/item/items">목록으로</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<form action="/admin/index.php/ok/item/addItem" enctype="multipart/form-data" method="post" id="form1" runat="server">
			<?php $item = fetchAll("SELECT * FROM ITEM where i_no='{$val1}'") ?>
			<input type="file" class="form-control" onchange="readURL(this);" id="img" name="img" required>
			<img style="margin: 10px 0; max-width: 150px" id="blah" src="<?= $item->i_img ?>">
			<img style="margin: 10px 0; max-width: 150px" id="blah" src="#" alt="이미지를 선택해주세요.">
		</form>
	</div>
</div>

<script type="text/javascript">
	function readURL(input) { 
		if (input.files && input.files[0]) { 
			var reader = new FileReader(); 
			reader.onload = function (e) { 
				$('#blah').attr('src', e.target.result); 
			} 
			reader.readAsDataURL(input.files[0]); 
		} 
	}
</script>