<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 칭호 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-info btn-xs side_btn" data-toggle="modal" data-target="#give_title">칭호 지급</button>
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_title">칭호 등록</button>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<?php foreach(query("select * from TITLE") as $row){ ?>
			<tr>
				<td><?= $row->t_no ?></td>
				<td><img src="<?= $row->t_img ?>"></td>
				<td><?= $row->t_title ?></td>
				<td><?= $row->t_content ?></td>
			</tr>
			<tr>
				<td>소지자</td>
				<td colspan="3" style="text-align: left"><?php $get = explode(",",$row->t_get); for($i=1; $i<count($get)-1; $i++){ echo $PLAYER[$get[$i]].","; } ?></td>
			</tr>
			<?php } ?>
			
		</table>
		
		
	</div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="add_title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/player/addTitle" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">칭호 등록</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">칭호명</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="name" name="name" required></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">이미지</div>
					<div class="col-md-10 col-md-offset-10">
						<input type="file" class="form-control" onchange="readURL(this);" id="img" name="img" required>
						<img style="margin: 10px 0; max-width: 100%" id="blah" src="#" alt="이미지를 선택해주세요.">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">설명</div>
					<div class="col-md-10 col-md-offset-10"><textarea class="form-control" rows="5" id="content" name="content" required></textarea></div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="submit_insert_item" value="추가">추가</button>
			</div>
		</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="give_title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/player/giveTitle" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">칭호 지급</h5>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="all"> 전체
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="class_1"> 잠재능력반
						</label>
						<label>
							<input type="radio" name="chk" value="class_2"> 기술반
						</label>
						<label>
							<input type="radio" name="chk" value="class_3"> 체질반
						</label>
						<label>
							<input type="radio" name="chk" value="class_4"> 특별능력반
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<label>
							<input type="radio" name="chk" value="grade_1"> 한송이
						</label>
						<label>
							<input type="radio" name="chk" value="grade_2"> 두송이
						</label>
						<label>
							<input type="radio" name="chk" value="grade_3"> 세송이
						</label>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 10px; border-top: #eee solid 1px; padding-top: 20px;">
						<?php foreach(query("select * from MEMBER m, PLAYER p where m_player = p_no order by p_name") as $row){ ?>
						<label>
							<input type="checkbox" name="player[]" value="<?= $row->m_no ?>" data-class = "<?= $row->p_class ?>" data-grade="<?= $row->p_grade ?>"><?= $row->p_name ?>
						</label>
						<?php } ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 form-inline" style="margin-top: 10px; border-top: #eee solid 1px; padding-top: 30px;"> 
						<select class="form-control" name="title" style="width: 100%">
							<?php foreach(query("select * from TITLE") as $row) {?>
								<option value="<?= $row->t_no ?>"><?= $row->t_title ?></option>
							<?php } ?>
						</select>
					</div>

				</div>	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="addGet" value="추가">지급</button>
			</div>
		</div>
		</form>
	</div>
</div>
<style>
	form textarea { margin-bottom: 20px; }
	label { margin-right: 20px; margin-bottom: 20px; line-height: 30px;}
	a { cursor: pointer; }
	select,input { margin-bottom: 10px; margin-right: 10px;}
	button {margin-top: 30px; margin-left: 10px}
	.pagination li a { display: inline-block; width: 30px; height: 30px; text-align: center; cursor: pointer; border:1px solid #ccc; margin: 2px; color: inherit; }
	.pagination .active { background: #ccc; }
	
</style>

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
	
	$("input[type=radio]").on("click",function(){
		var chk = $(this).val();
		var arrChk = chk.split("_"); 
		$('input:checkbox[name="player[]"]').each(function() {
			this.checked = false;
			if($(this).data(arrChk[0]) == arrChk[1]){ this.checked = true; }
		});
	})
</script>