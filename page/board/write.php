<div class="table_title"><img src="/common/img/board/board_title.png"></div>

<form method="post" action="/admin/index.php/ok/setting/boardWrite">
	<input type="text" name="title" class="form-control" placeholder="TITIEL">
	<textarea name="content" id="summernote" value=""></textarea>
</from>

<style>
	input { margin-bottom: 10px; }
</style>

<script>
$(document).ready(function() {
	 $('#summernote').summernote({
		 height: 400,                 // set editor height
		 minHeight: null,             // set minimum height of editor
		 maxHeight: null,             // set maximum height of editor
		 focus: true                  // set focus to editable area after initializing summernote
     });
});
</script>
