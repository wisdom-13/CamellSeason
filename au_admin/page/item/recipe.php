<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 레시피 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn" data-toggle="modal" data-target="#add_recipe">레시피 추가</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>비법서</th>
				<th>재료</th>
				<th>수량</th>
			</tr>
			<?php foreach(query("select * from RECIPE r, ITEM i where r.re_book = i.i_no") as $row) { ?>
			<tr>
				<td rowspan="7"><?= $row->re_no ?></td>
				<td rowspan="7"><img width="100px" src="<?= $row->i_img ?>"></td>
				<td colspan="2"><?= $row->i_name ?></td>
			</tr>
			<?php 
			$item = explode(",",$row->re_item);													 
			for($i=0; $i < 5; $i++){ 
				$num = explode("^", $item[$i]);
			?>		
				<tr>
					<td><?= $ITEM[$num[0]] ?></td>
					<td><?= $num[1] ?></td>
				</tr>
			<?php } ?>
			
			<tr>
				<td colspan="3"><?= $row->i_content ?></td>
			</tr>
			<? } ?>
			
			
			
		</table>
	</div>
</div>	

<!-- Modal -->
<div class="modal fade" id="add_recipe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form action="/admin/index.php/ok/item/addRecipe" enctype="multipart/form-data" method="post" id="form1" runat="server">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" style="float: left" id="myModalLabel">레시피 추가</h5>
			</div>
			
			<div class="modal-body">
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">제작템</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item" name="item">
							<?php foreach(query("select * from ITEM where i_type = 1 or i_type = 4 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">비법서</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="recipe" name="recipe">
							<?php foreach(query("select * from ITEM where i_type = 2 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">재료1</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item1" name="item1">
							<?php foreach(query("select * from ITEM where i_type = 3 or i_type = 4 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">수량</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="num1" name="num1" ></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">재료2</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item2" name="item2">
								<option value="0">없음</option>
								<?php foreach(query("select * from ITEM where i_type = 3 or i_type = 4 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">수량</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="num2" name="num2" ></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">재료3</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item3" name="item3">
								<option value="0">없음</option>
								<?php foreach(query("select * from ITEM where i_type = 3 or i_type = 4 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">수량</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="num3" name="num3" ></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">재료4</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item4" name="item4">
								<option value="0">없음</option>
								<?php foreach(query("select * from ITEM where i_type = 3 or i_type = 4 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">수량</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="num4" name="num4" ></div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">재료5</div>
					<div class="col-md-10 col-md-offset-10">
						<select class="form-control" id="item5" name="item5">
								<option value="0">없음</option>
								<?php foreach(query("select * from ITEM where i_type = 3 or i_type = 4 order by i_name") as $row){ ?>
								<option value="<?= $row->i_no ?>"><?= $row->i_name ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2" style="line-height:35px;">수량</div>
					<div class="col-md-10 col-md-offset-10"><input type="number" class="form-control" id="num5" name="num5" ></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
				<button type="submit" class="btn btn-danger" name="addRecipe" value="추가">추가</button>
			</div>
		</div>
		</form>
	</div>
</div>

<style>
	select,input { margin-bottom: 10px;}
</style>
<script type="text/javascript">
	function confirmDelete(url) {
		if( confirm('정말 삭제하시겠습니까?') ) {
			location.href = url;
		}
	}
</script>
