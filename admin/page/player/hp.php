<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-dashboard"></i> 체력 관리 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>현재체력</th>
				<th>증가체력</th>
				<th>감소체력</th>
				<th>총체력</th>
				<th>저장</th>
			</tr>
			<?php foreach(query("SELECT * FROM MEMBER") as $row){?>
			<tr>
				<td><?= $row->m_no;?></td>
				<td><?= $row->m_name;?></td>
				<td class="num"><?= $row->m_hp;?></td>
				<td class="in"><input style="text-align: center" type="number" value="0" name="in"></td>
				<td class="de"><input style="text-align: center" type="number" value="0" name="de"></td>
				<td class="total"></td>
				<td class="hp_btn"><button data-no=<?= $row->m_no ?>>저장</button></td>
			</tr>
			<?php } //end foreach?>
		</table>
	</div>
</div>
<script>
	$('select').on("change",function(){
		no = $(this).data('no');
		name = $(this).attr('name');
		val = $(this).val();
		
		$.ajax({
			type:"POST",
			url:"/admin/index.php/ok/member",
			data:{no:no,name:name,val:val},
			success: function($e){
				document.write($e);
				//alert($e);
				location.href='/admin/index.php/member/edit';
			}
		});
		
	});
	
	$(".in input").on("change",function(){
		num_in = $(this).val();
		num_de = $(this).parents("td").siblings(".de").children("input").val();
		num = $(this).parents("td").siblings(".num").text();
		total = parseInt(num)+parseInt(num_in)-parseInt(num_de);
		if(total >= 100){ total = 100 } 
		if(total <= 0){ total = 0 } 
		$(this).parents("td").siblings(".total").text(total);
	});
	$(".de input").on("change",function(){
		num_de = $(this).val();
		num_in = $(this).parents("td").siblings(".in").children("input").val();
		num = $(this).parents("td").siblings(".num").text();
		total = parseInt(num)+parseInt(num_in)-parseInt(num_de);
		if(total >= 100){ total = 100 } 
		if(total <= 0){ total = 0 } 
		$(this).parents("td").siblings(".total").text(total);
	});
	$(".hp_btn button").on("click",function(){
		total = $(this).parents("td").siblings(".total").text();
		no = $(this).data("no");
		$.ajax({
			type:"POST",
			url:"/admin/index.php/ok/player/hp",
			data:{no:no,total:total}
		});
		$(this).parents(".hp_btn").siblings(".num").text(total);
		$(this).parents("td").siblings(".total").text("");
		num_in = $(this).parents("td").siblings(".in").children("input").val("0");
		num_de = $(this).parents("td").siblings(".de").children("input").val("0");
	});
</script>