<!-- content -->
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 시스템 페이지 링크</h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
		<table class="table table-bordered t_system">
			<tr>
				<th>수련일지</th>
				<td><a href="/admin/index.php/system/pro_list">/admin/index.php/system/pro_list</a></td>
			</tr>
			<tr>
				<th>화 정산</th>
				<td><a href="/admin/index.php/ok/point/point_chk">/admin/index.php/ok/point/point_chk</a></td>
			</tr>
			<tr>
				<th>수련장 초기화</th>
				<td><a href="http://zyezye.cafe24.com/member">/index.php/ok/pro/pro_chk</a></td>
			</tr>
		</table>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-6">
		<table class="table table-bordered t_system">
			<tr>
				<th>승인대기목록</th>
				<td><a href="http://zyezye.cafe24.com/member">http://camellseason.cafe24.com</a></td>
			</tr>
			<tr>
				<th>승인대기목록</th>
				<td><a href="http://zyezye.cafe24.com/member">http://camellseason.cafe24.com</a></td>
			</tr>
			<tr>
				<th>승인대기목록</th>
				<td><a href="http://zyezye.cafe24.com/member">http://camellseason.cafe24.com</a></td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-6">
		<h5 class="title"><i class="fa fa-fw fa-money"></i> 화폐 정산</h5>
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>금액</th>
				<th>날짜</th>
				<th>승인</th>
			</tr>
			<?php for($i=1; $i<10; $i++){ ?>
			<tr>
				<td><?= $i ?></td>
				<td>하츠미 세이시</td>
				<td>500 花</td>
				<td>12.18:11:04</td>
				<td><a>정산</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6">
		<h5 class="title"><i class="fa fa-fw fa-star"></i> 아이템 정산</h5>
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>아이템</th>
				<th>날짜</th>
				<th>승인</th>
			</tr>
			<?php for($i=1; $i<10; $i++){ ?>
			<tr>
				<td><?= $i ?></?></td>
				<td>하츠미 세이시</td>
				<td>소원팔지</td>
				<td>12.18:11:04</td>
				<td><a>정산</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>