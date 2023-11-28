<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-dashboard"></i> 회원 정보 수정 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<a class="btn btn-danger btn-xs side_btn" href="/admin/index.php/member/member">목록</a>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>아이디</th>
				<th>소지금</th>
				<th>春</th>
				<th>秋</th>
				<th>冬</th>
				<th>권한</th>
				<th>가입일</th>
			</tr>
			<?php foreach(query("SELECT * FROM MEMBER") as $row){?>
			<tr>
				<td><?= $row->m_no;?></td>
				<td><?= $row->m_name;?></td>
				<td><?= $row->m_id;?></td>
				<td><?= $row->m_point;?> 花</td>
				
				<td><select name="player" data-no="<?= $row->m_no; ?>">
					<option value="0">-</option>
					<?php foreach(query("SELECT * FROM PLAYER where p_age = '1'") as $rs){ ?>
							<option value="<?= $rs->p_no; ?>" <?= ($row->m_player==$rs->p_no) ? "selected" : "" ; ?>><?= $rs->p_name; ?></option>
					<?php } ?>
				</select></td>
				<td><select name="player2" data-no="<?= $row->m_no; ?>">
					<option value="0">-</option>
					<?php foreach(query("SELECT * FROM PLAYER where p_age = '2'") as $rs){ ?>
							<option value="<?= $rs->p_no; ?>" <?= ($row->m_player2==$rs->p_no) ? "selected" : "" ; ?>><?= $rs->p_name; ?></option>
					<?php } ?>	
				</select></td>
				<td><select name="player3" data-no="<?= $row->m_no; ?>">
					<option value="0">-</option>
					<?php foreach(query("SELECT * FROM PLAYER where p_age = '3'") as $rs){ ?>
							<option value="<?= $rs->p_no; ?>" <?= ($row->m_player3==$rs->p_no) ? "selected" : "" ; ?>><?= $rs->p_name; ?></option>
					<?php } ?>	
				</select></td>
				<td><select name="use" data-no="<?= $row->m_no; ?>">
						<option value="1" <?= ($row->m_use=="1") ? "selected" : "" ; ?>>관리자</option>
						<option value="2" <?= ($row->m_use=="2") ? "selected" : "" ; ?>>승인</option>
						<option value="3" <?= ($row->m_use=="3") ? "selected" : "" ; ?>>미승인</option>
					</select></td>
				<td><?= $row->m_date;?></td>
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
</script>