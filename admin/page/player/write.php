<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-9">
		<h5 class="title"><i class="fa fa-fw fa-user"></i> 프로필 업로드 </h5>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3">
		<a href="/admin/index.php/player/profile" class="btn btn-success btn-xs side_btn">이전</a>
	</div>
	
	<div class="col-xs-12 col-sm-12 col-md-12 " style="margin-bottom: 10px;">
		<form action="/admin/index.php/ok/player/addPlayer" method="post" >
			<input type="text" class="form-control" id="word" name="word" placeholder="한마디" style="text-align: center; height: 60px" required>
	</div>	
		
	<div class="col-xs-1 col-sm-1 col-md-1" style="line-height: 55px;">이름</div>
	<div  class="col-xs-6 col-sm-6 col-md-6">
		<input type="text" class="form-control" id="name" name="name" placeholder="이름" required>
	</div>
	<div  class="col-xs-5 col-sm-5 col-md-5">
		<input type="text" class="form-control" id="name_j" name="name_j" placeholder="원문이름" required>
	</div>

	<div class="col-xs-1 col-sm-1 col-md-1" style="line-height: 55px;">신체</div>
	<div  class="col-xs-11 col-sm-11 col-md-11">
		<input type="text" class="form-control" id="hight" name="hight" placeholder="cm / kg" required>
	</div>

	<div class="col-xs-1 col-sm-1 col-md-1" style="line-height: 55px;">생일</div>
	<div  class="col-xs-11 col-sm-11 col-md-11">
		<input type="text" class="form-control" id="brith" name="brith" placeholder="nn월 nn일" required>
	</div>

	<div class="col-xs-1 col-sm-1 col-md-1" style="line-height: 55px;">츠보미</div>
	<div  class="col-xs-11 col-sm-11 col-md-11">
		<input type="text" class="form-control" id="avility_name" name="avility_name" placeholder="nn 츠보미" required>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px">
			
		<div class="form-group form_radio">
			성별
			<label for="sex1"><input type="radio" name="sex" id="sex1" value="1" checked> 남자 </label>
			<label for="sex2"><input type="radio" name="sex" id="sex2" value="2"> 여자</label>
		</div>
		
		<div class="form-group form_radio">
			나이
			<label for="age1"><input type="radio" name="age" id="age1" value="1" checked> 초등부</label>
			<label for="age2"><input type="radio" name="age" id="age2" value="2"> 중등부</label>
			<label for="age3"><input type="radio" name="age" id="age3" value="3"> 고등부</label>
		</div>

		<div class="form-group form_radio">
			능력
			<label for="cl1"><input type="radio" name="class" id="cl1" value="1" checked> 잠재능력반</label>
			<label for="cl2"><input type="radio" name="class" id="cl2" value="2"> 체질반</label>
			<label for="cl3"><input type="radio" name="class" id="cl3" value="3"> 기술반</label>
			<label for="cl4"><input type="radio" name="class" id="cl4" value="4"> 특별능력반</label>
		</div>

		<div class="form-group form_radio">
			등급
			<label for="gr1"><input type="radio" name="grade" id="gr1" value="1" checked> 한송이</label>
			<label for="gr2"><input type="radio" name="grade" id="gr2" value="2"> 두송이</label>
			<label for="gr3"><input type="radio" name="grade" id="gr3" value="3"> 세송이</label>
		</div>

		<br>

		<div class="form-group">
			<label for="look">외형</label>
			<textarea name="look" id="look" class="form-control" required></textarea>
		</div>

		<div class="form-group">
			<label for="avility">츠보미</label>
			<textarea name="avility" id="avility" class="form-control" required></textarea>
		</div>

		<div class="form-group">
			<label for="info">성격</label>
			<textarea name="info" id="info" class="form-control" required></textarea>
		</div>

		<div class="form-group">
			<label for="etc">기타사항</label>
			<textarea name="etc" id="etc" class="form-control" required></textarea>
		</div>

		<div class="form-group">
			<label for="hidden">비밀설정</label>
			<textarea name="hidden" id="hidden" class="form-control" required></textarea>
		</div>

		<div class="form-group form_radio">
			타입
			<label for="ty1"><input type="radio" name="type" id="ty1" value="1" checked> 가늘고 긴</label>
			<label for="ty2"><input type="radio" name="type" id="ty2" value="2"> 앨리스 수명</label>
			<label for="ty3"><input type="radio" name="type" id="ty3" value="3"> 사용자 수명</label>
		</div>

		<button type="submit" name="submit_insert_player" value="등록" class="btn btn-primary btn-lg btn-block" style="margin-top: 20px; font-size: 16px;">등록</button>
		</form>
	</div>	
</div>

<style>
	input { margin:10px 0; font-size: 14px; }
	input[type=radio] { margin-left:50px; margin-right:5px;}
	textarea { height:200px; font-size: 14px; }
	
	.form_radio { margin: 0; }
</style>