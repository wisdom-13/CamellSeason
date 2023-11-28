<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-image"></i> 메인 슬라이드 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_slide">슬라이드 추가</button>
	</div>
	<?php foreach(query("SELECT * FROM BANNER WHERE b_type = 1 order by b_order LIMIT 0,4") as $row){?>
	<div class="col-xs-12 col-sm-6 col-md-3">
		<table class="table t_left table-bordered t_system">
			<tr>
				<td colspan="2"><img width="100%" src="<?= $row->b_img;?>"></td>
			</tr>
			<tr>
				<th>NO</th>
				<td><?= $row->b_order;?></td>
			</tr>
			<tr>
				<th>URL</th>
				<td><a class="text_over" href="<?= $row->b_url;?>"><?= $row->b_url;?></a></td>
			</tr>
			<tr>
				<th>DEL</th>
				<td><a href="javascript:confirmDelete('/admin/index.php/ok/setting/delSlide/<?= $row->b_no;?>')" style="color:#000">삭제</a></td>
			</tr>
		</table>
	</div>
	<?php } ?>
</div>
<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-music"></i> BGM 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_bgm">BGM 추가</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>TITLE</th>
				<th>URL</th>
				<th>DLE</th>
			</tr>
			<?php foreach(query("SELECT * FROM BANNER WHERE b_type = 2 order by b_order") as $row){?>
			<tr>
				<td><?= $row->b_order;?></td>
				<td><?= $row->b_img;?></td>
				<td><a href="<?= $row->b_url;?>"><?= $row->b_url;?></a></td>
				<td><a href="javascript:confirmDelete('/admin/index.php/ok/setting/delBgm/<?= $row->b_no;?>')" style="color:#000">삭제</a></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>




<!-- Modal -->
<div class="modal fade" id="add_slide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/index.php/ok/setting/addSlide" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">SLIDE 추가</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">IMG</div>
					<div class="col-md-10 col-md-offset-10">
						<input type="file" class="form-control" onchange="readURL(this);" id="img" name="img" >
						<img style="margin: 10px 0; max-width: 100%" id="blah" src="#" alt="파일명은 영문으로 업로드해주세요.">
					</div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">URL</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="url" name="url"></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">ORDER</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="order" name="order"></div>
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
 
<div class="modal fade" id="add_bgm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<form action="/admin/index.php/ok/setting/addBgm" method="post" >
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" style="float: left" id="myModalLabel">BGM 추가</h5>
		</div>
		<div class="modal-body">
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-2" style="line-height:35px;">TITLE</div>
				<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="img" name="img"></div>
			</div>
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-2" style="line-height:35px;">URL</div>
				<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="url" name="url"></div>
			</div>
			<div class="row">
				<div class="col-md-2" style="line-height:35px;">ORDER</div>
				<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="order" name="order"></div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
			<button type="submit" class="btn btn-danger" name="add_bgm" value="추가">추가</button>
		</div>
	</div>
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
	
	function confirmDelete(url) {
		if( confirm('정말 삭제하시겠습니까?') ) {
			location.href = url;
		}
	}
</script>
