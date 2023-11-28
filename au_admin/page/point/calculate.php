<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 아이템/화 지급 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
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
	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px; border-top: #eee solid 1px; padding-top: 20px;">
		<?php foreach(query("select * from MEMBER m, PLAYER p where m_player = p_no") as $row){ ?>
		<label>
			<input type="checkbox" name="player" value="<?= $row->p_name ?>" data-class = "<?= $row->p_class ?>" data-grade="<?= $row->p_grade ?>"><?= $row->p_name ?>
		</label>
		<?php } ?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12 form-inline" style="margin-top: 10px; border-top: #eee solid 1px; padding-top: 30px;"> 
		<select style="width: 27%" class="form-control" name="item"1>
			<option value="0">-- 아이템 --</option>
			<?php for($i=1; $i<50; $i++ ){ if(isset($ITEM[$i])){ ?>
				<option value="<?= $i ?>"><?= $ITEM[$i] ?></option>
			<?php }} ?>
		</select>
		<input class="form-control" style="width: 5%" type="number" name="num1" value="0">
		
		<select style="width: 27%" class="form-control" name="item2">
			<option value="0">-- 아이템 --</option>
			<?php for($i=1; $i<50; $i++ ){ if(isset($ITEM[$i])){ ?>
				<option value="<?= $i ?>"><?= $ITEM[$i] ?></option>
			<?php }} ?>
		</select>
		<input class="form-control" style="width: 5%" type="number" name="num2" value="0">
		
		<select style="width: 27%" class="form-control" name="item3">
			<option value="0">-- 아이템 --</option>
			<?php for($i=1; $i<50; $i++ ){ if(isset($ITEM[$i])){ ?>
				<option value="<?= $i ?>"><?= $ITEM[$i] ?></option>
			<?php }} ?>
		</select>
		<input class="form-control" style="width: 5%" type="number" name="num3" value="0">
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12"> 
		<input class="form-control" type="number" name="price" placeholder="花">
		<button class="btn btn-danger btn-lg btn-block">지급</button>
	</div>
	
</div>	
<style>
	select,input { margin-bottom: 10px; margin-right: 10px;}
	label { width: 180px;}
	button {margin-top: 30px;}
</style>
<script>
	$("input[type=radio]").on("click",function(){
		var chk = $(this).val();
		var arrChk = chk.split("_"); 
		$('input:checkbox[name="player"]').each(function() {
			this.checked = false;
			if($(this).data(arrChk[0]) == arrChk[1]){ this.checked = true; }
		});
	})
</script>