<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-dashboard"></i> 스텟 관리 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<form method="post" action="/au_admin/index.php/ok/player/addState">
			<table class="table table-bordered t_system">
				<tr>
					<th>이름</th>
					<td>
						<select class="form-control" name="name" id="name">
							<?php foreach(query("select * from MEMBER where m_au is not NULL") as $row){ ?>
							<option value="<?= $row->m_au ?>"><?= $row->m_name ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<th>HP</th>
					<td><input type="number" class="form-control" name="hp" required></td>
				</tr>
				<tr>
					<th>STR</th>
					<td><input type="number" class="form-control" name="str" required></td>
				</tr>
				<tr>
					<th>CON</th>
					<td><input type="number" class="form-control" name="con" required></td>
				</tr>
				<tr>
					<th>ESP</th>
					<td><input type="number" class="form-control" name="esp" required></td>
				</tr>
			</table>
			<button type="submit" name="submit_insert_player" value="등록" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px; font-size: 16px;">등록</button>
		</form>
	</div>
</div>