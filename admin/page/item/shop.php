<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 상점 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_shop">아이템 진열</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th colspan="2">아이템</th>
				<th>구매가</th>
				<th>순서</th>
				<th>노출</th>
				<th>관리</th>
			</tr>
			<?php foreach(query("select * from SHOP") as $row) { ?>
			<tr>
				<td><?= $row->s_no ?></td>
				<td><img width="100px" src="<?= $row->i_img ?>"></td>
				<td class="t_left"><b><?= $row->i_name ?></b><br><br><?= $row->i_content ?><br><em>: <?= $row->s_info ?></em></td>
				<td><?=$row->s_price ?> 花</td>
				<td><?=$row->s_num ?></td>
				<td><?=$YN[$row->s_show] ?></td>
				<td><a>수정</a><br><br><a href="javascript:confirmDelete('/admin/setting/del_slide/<?= $row->b_no;?>')" style="color:#000">삭제</a></td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	


<!-- Modal -->
<div class="modal fade" id="add_shop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/setting/add_slide" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">아이템 진열</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">아이템</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control">
							<option>아이템 선택</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">설명</div>
					<div class="col-md-10 col-md-offset-10"><textarea class="form-control" rows="5" id="content" name="content"></textarea></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">가격</div>
					<div class="col-md-10 col-md-offset-10 input-group">
						<input type="number" class="form-control" id="exampleInputAmount">
						<div class="input-group-addon">花</div>
					</div>
				</div>
				<!--
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">시작일</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="start" name="name"></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">종료일</div>
					<div class="col-md-10 col-md-offset-10"><input type="text" class="form-control" id="name" name="name"></div>
				</div>
				-->
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">순서</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="name" name="name"></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">노출</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="type" id="type" value="1"> 노출
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" id="type" value="2"> 미노출
						</label>
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

<style>
	form textarea { margin-bottom: 20px; }
	label { margin-right: 20px; margin-bottom: 20px; line-height: 30px;}
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
	
	$("#start").on("click",function(){
		alert();
	})
</script>