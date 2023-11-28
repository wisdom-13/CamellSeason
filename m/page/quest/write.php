<div class="content">
	<div class="row">
		
		<div class="col-md-12">
			<div class="card">
				<div class="card-header"><b>의뢰 등록</b></div>
				<div class="card-body"> 
					<form class="quest_write" method="post" action="/index.php/ok/quest/quest_write">
						<input style="width: 100%" class="form-control" type="text" name="title" id="title" placeholder="제목을 입력하세요." required>
						<textarea style="width: 100%;" name="content" id="content" placeholder="내용을 입력하세요." required></textarea>
						<button class="form-control btn-danger" style="padding: 10px; ">등록</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style>
	th { font-size: 14px !important; }
	td { font-size: 12px !important; }
	input { height: 40px; }
	textarea { height: 200px; border: none; margin: 10px; padding: 10px; }
</style>
<script>
	function confirmDelete(url) {
		if( confirm("이 의뢰를 수락할까요? (진행중인 의뢰를 완료하기 전까지 새로운 의뢰를 받을 수 없습니다.)") ) {
			location.href = url;
		}
	}
</script>