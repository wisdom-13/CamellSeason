 <div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 프로필 </h5>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>이름</th>
				<th>원어</th>
				<th>나이</th>
				<th>반</th>
				<th>등급</th>
				<th>단계</th>
			</tr>
			<?php foreach(query("SELECT * FROM PLAYER, MEMBER where p_age = $val1 and m_player$val1 = p_no order by m_player") as $row){?>
			<tr>
				<td><?= $row->p_no;?></td>
				<td><a href="/admin/index.php/player/view/<?= $row->p_no;?>"><?php echo $row->p_name;?></a></td>
				<td><?= $row->p_name_j;?></td>
				<td><?= $AGE[$row->p_age];?></td>
				<td><?= $CLASS[$row->p_class] ?></td>
				<td>
					<select class="grade" name="grade" data-no="<?= $row->p_no ?>" data-type="grade">
						<option  value="1" <?= ($row->p_grade == "1") ? "selected" : "" ?>><?= $GRADE[1]; ?></option>
						<option value="2" <?= ($row->p_grade == "2") ? "selected" : "" ?>><?= $GRADE[2]; ?></option>
						<option value="3" <?= ($row->p_grade == "3") ? "selected" : "" ?>><?= $GRADE[3]; ?></option>
						<option value="4" <?= ($row->p_grade == "4") ? "selected" : "" ?>><?= $GRADE[4]; ?></option>
					</select>
				</td>
				<td>
					<select class="pro" name="pro" data-no="<?= $row->p_no ?>" data-type="pro">
						<?php for($i=1;$i<11;$i++){ ?>
						<option value="<?= $i ?>" <?= ($row->p_pro == $i) ? "selected" : "" ?>><?= $i ?>단계</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<?php } //end foreach?>
			
		</table>
	</div>
</div>

<script>

	$("select").on("change",function(){
		no = $(this).data("no");
		type = $(this).data("type");
		val = $(this).val();
		
		
		$.ajax({
			type:"POST",
			url:"/admin/index.php/ok/player/profile_edit",
			data:{no:no,type:type,val:val},
			success: function($e){
				location.href='/admin/index.php/player/profile_edit/<?= $val1 ?>';
			}
		});
		
		
	})

</script>