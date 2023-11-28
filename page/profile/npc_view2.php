<?php $row = fetchAll("select * from PLAYER where p_no = '{$val1}'") ?>
<div class="profile_top" style="margin-top: 40px; text-align: center;">
	<img src="/common/img/profile/list/class0_title.png" >
</div>
<div class="profile_menu" style="text-align: center; margin-top: 40px;" >
	<a href="/index.php/profile/npc"><img src="/common/img/profile/list/class0_menu.png" onmouseover="this.src='/common/img/profile/list/class0_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class0_menu.png'"></a>
 	<a href="/index.php/profile/class3/1"><img src="/common/img/profile/list/class1_menu.png" onmouseover="this.src='/common/img/profile/list/class1_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class1_menu.png'"></a>
 	<a href="/index.php/profile/class3/2"><img src="/common/img/profile/list/class2_menu.png" onmouseover="this.src='/common/img/profile/list/class2_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class2_menu.png'"></a>
 <a href="/index.php/profile/class3/3"><img src="/common/img/profile/list/class3_menu.png" onmouseover="this.src='/common/img/profile/list/class3_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class3_menu.png'"></a>
 	<a href="/index.php/profile/class3/4"><img src="/common/img/profile/list/class4_menu.png" onmouseover="this.src='/common/img/profile/list/class4_menu_hover.png'"
 onmouseout="this.src='/common/img/profile/list/class4_menu.png'"></a>
</div>

<div class="profile_word">" <span><?= $row->p_word ?></span> "</div><br>
<div class="profile_body"><img width="700px" src="/admin/common/img/profile/0/body/<?= $row->p_no ?>.png"></div>

<div class="profile_card">
	<div class="profile_name_card">
		<h3><?= $row->p_name ?></h3>
		<p>
			성별 : <?= $SEX[$row->p_sex] ?><br>
			생일 : <?= $row->p_brith ?><br>
			신체 : <?= $row->p_hight ?><br>
			<?= is_numeric($row->p_class) ? "담당반 : ".$CLASS[$row->p_class] : ""; ?><br>
			<?= ($row->p_grade!="") ? "담당과목 : ".$row->p_grade : ""; ?>
		</p>
	</div>
	<div class="profile_ability_card">
		<h3 style="text-align: left;">설정</h3>
		<p><?= $row->p_avility_name ?><br><br><?= nl2br($row->p_info) ?></p>
	</div>
</div>

<div style="clear: both"></div>
<br>
<style>
	.content { padding: 0px;}
	.profile_menu img { margin: 0 35px; }
	.profile_word { background: url("/common/img/profile/view_npc/profile_word.png"); width: 707px; height: 72px; padding: 32px 0; text-align: center; font-size: 14px; font-weight: 900; margin-top: 30px; color: #666;}
	.profile_body { text-align: center; }
	
	.profile_card { width: 750px; }
	.profile_name_card { float: left; width: 230px; height: 150px; background: url("/common/img/profile/view_npc/profile_name_card.png"); padding: 15px 20px; color: #fff; }
	.profile_card h3 { opacity: 0.8; text-align: center; font-size: 18px; }
	.profile_card p { opacity: 0.8; font-size: 13px; line-height: 140%; height: 90px; font-weight: bold; overflow: scroll;}
	.profile_ability_card { float: right; width: 511px; height: 150px; background: url("/common/img/profile/view_npc/profile_ability_card.png"); padding: 15px 20px; color: #fff; }
	
	.profile_box { width: 750px; padding: 20px; background: rgba(0,0,0,0.1); font-size: 14px; line-height: 180%; font-weight: normal; text-align: left; }
	.profile_text { text-align: center; }
</style>
<script>
	function randomTalk(a) {
		return a[Math.floor(Math.random() * a.length)];
	}
	
	var talk3 = new Array('오늘도 힘내자꾸나!', '심심한 거니? 일이 끝나면 같이 놀자꾸나!', '곧 만나겠구나. 어서오렴!', '뭔가 꺼낼 일이 있으면 선생님을 불러줘?', '푸하하! 간지러워!', '하하, 숙제는 다 끝내고 놀러 나온 거니?', '봄이 오면 바깥으로 나가 수업을 할 거니까 단단히 마음 먹으렴!', '오늘의 의뢰를 확인해보렴.', '선생님만큼 크려면 아직 멀었단다!'); //잠재
	var talk4 = new Array('히..히힉! 친..,구들과 사이좋게.. 힉!힉!!', '히..히..힉! 다..! 다아-!!! 꿈, 꿈을 ! 가지고 ..! 살아야한다..!! 히..힉!', '히...히힉..!!히히히힉!!!!', '...히? 제..저한테..! 할말이 있으신가요..?', '히...히히히힉히힉!!! 선생님이 힉..! 도와줄게요옷!', '선..선생님이 무섭나요옷 ..오..오늘은! 귀여운 병아리 옷도 입었는데..히..', '히...힉! 힉!우리 학생들을 위해! 힉! 선생님은 늘 기다리고 있어요옷!!!', '힉!.. 해바라기씨.. 좋아하나요..!', '선..선생님은! 히히힉! 여러분이..! 좋답니다..!'); //체질
	var talk5 = new Array('그것도 못하면 쓰나.', '할 수 있는건 해봐라. 하지 못하고 후회하는것보단 낫겠지.', '.. ... 사탕 좋아하나?', '…잠시, 오늘은 바쁘니 다음에 얘기하도록', '오다 주웠다. 가져가라.', '내가... 무섭게 생겼나?', '어서와라, 이제 곧 만나겠군. 아마 너라면 금방 적응할 수 있을거다.', '책은 꾸준히 읽는게 좋지. 뭐든지 모르는 것 보다는 아는것이 좋으니', '… … 뭐라고 했나? 못들었는데.'); //기술
	var talk6 = new Array('실패는 끝이 아니라는거, 알지?','괜찮아, 다시 하면 돼~!','.......배고픈걸. 고기가 먹고 싶네, 오늘 수업은 고기전골 만들기를 할까~?', '능력의 측정은 중요한게 아니야. 네 마음은 언제나 10단계! 최고인걸.', '바느질, 요리, 청소 전부 완벽한 나!', '고기랑 술은...언제나 최고지. 너희도 어른이 되면 알거야.', '수련을 게을리하지 않는 건 좋지만 너의 지갑이 가벼워지는 소리가 들려~.', '얼른 방학이 됐으면 좋겠다. 그치?','으음. 살이 쪘나봐. 옷이 조금 낑기는걸. 하지만~이럴 때를 위해 바느질을 배웠지!'); //특능
	var talk7 = new Array('한순간일 것입니다, 저를 믿고 손을 잡으세요.', '학교는 다닐 만 하십니까…? 좋은 시간을 쌓았으면 좋겠군요.', '그때보단 많이 크셨군요.', '..저승사자 같다는 이야기는 자주 듣습니다…. 그런 표정 마십시오.', '...외부 이야기는 이야기해주기 힘듭니다.', '저보단 다른 선생님들을 찾는 게 더 빠를 겁니다.', '나갔다 와야 합니다. 다음에 이야기합시다.', '이곳이 답답하게 느껴질수도 있습니다. 저를 탓하셔도 괜찮습니다.', '다음에 또 봅시다.'); //텔포
	
	$(".profile_body img").on("click",function(){
		$(".profile_word span").text(randomTalk(talk<?= $val1 ?>));
	})
</script>

