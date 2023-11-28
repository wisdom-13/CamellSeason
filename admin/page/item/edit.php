<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 아이템 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a style="margin-left: 10px;" class="btn btn-info btn-xs side_btn" href="/admin/index.php/item/items">목록으로</a>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 20px;">
	[<a href="/admin/index.php/item/edit/0">전체</a>] [<a href="/admin/index.php/item/edit/1">상품</a>] 
	[<a href="/admin/index.php/item/edit/2">비법서</a>] [<a href="/admin/index.php/item/edit/3">재료</a>] [<a href="/admin/index.php/item/edit/4">기타</a>]
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th colspan="2">아이템</th>
				<th>가격</th>
				<th>분류</th>
				<th>등급</th>
				<th>기능</th>
				<th>사용</th>
				<th>교환</th>
				<th>판매</th>
				<th>관리</th>
			</tr>
			<?php 
			$type = ($val1=="0") ? "" : "where i_type =".$val1;
			foreach(query("select * from ITEM $type") as $row) { ?>
			<form action="/admin/index.php/ok/item/editItem/<?= $row->i_no ?>" method="post" id="form<?= $row->i_no ?>">
			<tr>
				<td><?= $row->i_no ?></td>
				<td><button type="button" class="ed_btn" data-toggle="modal" data-target="#edit_item" data-no="<?= $row->i_no ?>" data-title="<?= $row->i_name ?>" data-img="<?= $row->i_img ?>"><img width="100px" src="<?= $row->i_img ?>"></button></td>
				<td class="t_left"><input type="text" name="name" id="id" value="<?= $row->i_name ?>"><br><br><textarea style="width: 100%" name="content" id="content"><?= $row->i_content ?></textarea><br></td>
				<td><input style="text-align: right; width: 50px;" type="text" name="price" id="price" value="<?= $row->i_price ?>"> 花</td>
				<td><select name="type">
					<?php for($i=1; $i<5; $i++) {?><option value="<?= $i ?>" <?= ($row->i_type==$i) ? "selected" : "" ?>><?= $I_TYPE[$i] ?></option><?php } ?>
				</select></td>
				<td><select name="grade">
					<?php for($i=0; $i<4; $i++) {?><option value="<?= $i ?>" <?= ($row->i_grade==$i) ? "selected" : "" ?>><?= $I_GRADE[$i] ?></option><?php } ?>
				</select></td>
				<td><select name="sys">
					<?php for($i=0; $i<7; $i++) {?><option value="<?= $i ?>" <?= ($row->i_sys==$i) ? "selected" : "" ?>><?= $I_SYS[$i] ?></option><?php } ?>
				</select></td>
				<td><input type="checkbox" value="1" name="use" <?= ($row->i_use=="1") ? "checked" : "" ?>></td>
				<td><input type="checkbox" value="1" name="yn" <?= ($row->i_yn=="1") ? "checked" : "" ?>></td>
				<td><input type="checkbox" value="1" name="shop" <?= ($row->i_shop=="1") ? "checked" : "" ?>></td>
				<input type="hidden" value="<?= $val1 ?>" name="val1">
				<td><button type="submit" name="submit_update_item" value="item">확인</button></td>
			</tr>
			</form>
			<? } ?>
		</table>
	</div>
</div>

<style>
	form textarea { margin-bottom: 20px; }
	label { margin-right: 20px; margin-bottom: 20px; line-height: 30px;}
</style>
<div class="modal fade " id="edit_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/index.php/ok/item/editImg/<?=$val1?>" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">이미지 수정</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-12 col-md-offset-12 item_title" style="margin-bottom: 10px;">아이템명</div>
					<div class="col-md-12 col-md-offset-12"><input type="file" class="form-control" onchange="readURL(this);" id="img" name="img" required></div>
				</div>
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-6 col-md-offset-6">
						<img style="margin: 10px 0; max-width: 150px" src="" class="item_img">
					</div>
					<div class="col-md-6 col-md-offset-6">
						<img style="margin: 10px 0; max-width: 150px" id="blah" src="#" alt="변경할 이미지">
					</div>
				</div>
				<input type="hidden" class="item_no" name="no" value="">
				<input type="hidden" class="item_img_input" name="img_be" value="">
				<p>이미지 수정 수 캐시 삭제 또는 Ctrl + Shift + R 필요</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="submit_insert_item" value="수정">수정</button>
			</div>
		</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	
	
	$(".ed_btn").on("click",function(){
		var no = $(this).data("no");
		var title = $(this).data("title");
		var img = $(this).data("img");
		$(".item_no").val(no);
		$(".item_title").text(title);
		$(".item_img").attr("src",img);
		$(".item_img_input").val(img);
	})
	
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