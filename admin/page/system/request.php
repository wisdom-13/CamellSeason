<div class="row">
	<div class="col-xs-10 col-sm-10 col-md-10">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 의뢰 관리 </h5>
	</div>
	<div class="col-xs-2 col-sm-2 col-md-2">
		<button class="btn btn-danger btn-xs side_btn">의뢰 등록</button>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>제목</th>
				<th>내용</th>
				<th>보수</th>
				<th>날짜</th>
				<th>승인</th>
			</tr>
			<?php for($i=1; $i<3; $i++){ ?>
			<tr>
				<td><?=$i ?></td>
				<td>하츠미 세이시</td>
				<td>내 연필을 찾아줘</td>
				<td>연필을 잃어버렸어! 남색 연필이란다. [연필찾기] 내용이 들어간 성공실패 주사위를 굴려 성공을 받아줘!</td>
				<td>20</td>
				<td>12.21</td>
				<td>승인</td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
		<h5 class="title"><i class="fa fa-fw fa-gear"></i> 의뢰 관리 </h5>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<table class="table table-bordered t_system">
			<tr>
				<th>NO</th>
				<th>캐릭터</th>
				<th>제목</th>
				<th>내용</th>
				<th>보수</th>
				<th>수행인</th>
				<th>상태</th>
				<th>등록날짜</th>
				<th>수행날짜</th>
			</tr>
			<?php for($i=1; $i<10; $i++){ ?>
			<tr>
				<td><?=$i ?></td>
				<td>하츠미 세이시</td>
				<td>내 연필을 찾아줘</td>
				<td>연필을 잃어버렸어! 남색 연필이야. [연필찾기] 내용이 들어간 성공실패 주사위를 굴려 성공을 받아줘!</td>
				<td>20</td>
				<td>요하임 F 에페르</td>
				<td>진행중</td>
				<td>12.21</td>
				<td>-</td>
			</tr>
			<? } ?>
		</table>
	</div>
</div>	