<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 아이템 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a style="margin-left: 10px;" class="btn btn-info btn-xs side_btn" href="/admin/index.php/item/edit/1">아이템수정</a>
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_item">아이템등록</button>
		
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 20px;">
	[<a href="/admin/index.php/item/items/0">전체</a>] [<a href="/admin/index.php/item/items/1">상품</a>] 
	[<a href="/admin/index.php/item/items/2">비법서</a>] [<a href="/admin/index.php/item/items/3">재료</a>] [<a href="/admin/index.php/item/items/4">기타</a>]
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
			<tr>
				<td><?= $row->i_no ?></td>
				<td><img width="100px" src="<?= $row->i_img ?>"></td>
				<td class="t_left"><b><?= $row->i_name ?></b><br><br><?= $row->i_content ?><br></td>
				<td><?= $row->i_price ?> 花</td>
				<td><?= $I_TYPE[$row->i_type] ?></td>
				<td><?= $I_GRADE[$row->i_grade] ?></td>
				<td><?= $I_SYS[$row->i_sys] ?></td>
				<td><?= $YN[$row->i_use] ?></td>
				<td><?= $YN[$row->i_yn] ?></td>
				<td><?= $YN[$row->i_shop] ?></td>
				<td><a href="javascript:confirmDelete('/admin/index.php/ok/item/delItem/<?= $row->i_no;?>')" style="color:#000">삭제</a></td>
			</tr>
			<? } ?>
		</table>
		
		<div>
			<ul class="pagination">
				<?php for($i=1; $i<=$page; $i++) {?>
				<li><a <?= ($i==$val1) ? "class='active'" : "" ?> href="/admin/index.php/item/items/<?=$i?>"><?=$i?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="add_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<form action="/admin/index.php/ok/item/addItem" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">아이템 등록</h5>
			</div>
			
			<div class="modal-body">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">아이템명</div>
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
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-2" style="line-height:35px;">가격</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="price" name="price" value="0" required></div>
				</div>
				
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">분류</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="type" id="type" value="1" checked> 일반
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" id="type" value="2"> 비법서
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" id="type" value="3"> 재료
						</label>
						<label class="radio-inline">
							<input type="radio" name="type" id="type" value="4"> 기타
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">등급</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="grade" id="grade" value="0" checked> X
						</label>
						<label class="radio-inline">
							<input type="radio" name="grade" id="grade" value="1"> 저급
						</label>
						<label class="radio-inline">
							<input type="radio" name="grade" id="grade" value="2"> 중급
						</label>
						<label class="radio-inline">
							<input type="radio" name="grade" id="grade" value="3"> 고급
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">기능</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="sys" id="sys" value="1" checked> 상황용
						</label>
						<label class="radio-inline">
							<input type="radio" name="sys" id="sys" value="2"> 랜덤박스
						</label>
						<label class="radio-inline">
							<input type="radio" name="sys" id="sys" value="3"> 비약
						</label>
						<label class="radio-inline">
							<input type="radio" name="sys" id="sys" value="4"> 결정석
						</label>
						<label class="radio-inline">
							<input type="radio" name="sys" id="sys" value="5"> 괴담
						</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">판매</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="shop" id="shop" value="1"> 진열
						</label>
						<label class="radio-inline">
							<input type="radio" name="shop" id="shop" value="2" checked> 미진열
						</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">사용</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="use" id="use" value="1" checked> 가능
						</label>
						<label class="radio-inline">
							<input type="radio" name="use" id="use" value="2"> 불가능
						</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">교환</div>
					<div class="col-md-10 col-md-offset-10">
						<label class="radio-inline">
							<input type="radio" name="yn" id="yn" value="1" checked> 가능
						</label>
						<label class="radio-inline">
							<input type="radio" name="yn" id="yn" value="2"> 불가능
						</label>
					</div>
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

<style>
	form textarea { margin-bottom: 20px; }
	label { margin-right: 20px; margin-bottom: 20px; line-height: 30px;}
	a { cursor: pointer; }
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
</script>