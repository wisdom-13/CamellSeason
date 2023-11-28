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
			<?= ($row->p_grade != "") ? "담당과목 : ".$row->p_grade : ""; ?>
		</p>
	</div>
	<div class="profile_ability_card">
		<h3 style="text-align: left;"><?= $row->p_avility_name ?></h3>
		<p><?= nl2br($row->p_avility) ?></p>
	</div>
</div>

<div style="clear: both"></div>

<div class="profile_text">
	<img src="/common/img/profile/view_npc/look_top.png" style="margin-top: 20px;">
	<div class="profile_box" style="margin-top: -5px;">
		<?= nl2br($row->p_look) ?>
	</div>
	<img src="/common/img/profile/view_npc/look_bottom.png" style="margin-top: -30px;">
	<img src="/common/img/profile/view_npc/info_top.png">
	<div class="profile_box" style="margin-top: -22px;">
		<?= nl2br($row->p_info) ?>
	</div>
	<img src="/common/img/profile/view_npc/info_bottom.png" style="margin-top: -42px;">
	<img src="/common/img/profile/view_npc/info_top.png">
	<div class="profile_box" style="margin-top: -22px;">
		<?= nl2br($row->p_etc) ?>
	</div>
	<img src="/common/img/profile/view_npc/flower_bottom.png" style="margin-top: -160px;">
</div>

<style>
	.content { padding: 0px;}
	.profile_menu img { margin: 0 35px; }
	.profile_word { background: url("/common/img/profile/view_npc/profile_word.png"); width: 707px; height: 72px; padding: 32px 0; text-align: center; font-size: 14px; font-weight: 900; margin-top: 30px; color: #666;}
	.profile_body { text-align: center; }
	
	.profile_card { width: 750px; }
	.profile_name_card { float: left; width: 230px; height: 150px; background: url("/common/img/profile/view_npc/profile_name_card.png"); padding: 15px 20px; color: #fff; }
	.profile_card h3 { opacity: 0.8; text-align: center; font-size: 18px; font-weight: 900; }
	.profile_card p { opacity: 0.8; font-size: 13px; line-height: 140%; height: 90px; font-weight: bold; overflow: scroll;}
	.profile_ability_card { float: right; width: 511px; height: 150px; background: url("/common/img/profile/view_npc/profile_ability_card.png"); padding: 15px 20px; color: #fff; }
	
	.profile_box { width: 750px; padding: 20px; background: rgba(0,0,0,0.1); font-size: 14px; line-height: 180%; font-weight: normal; text-align: left; }
	.profile_text { text-align: center; }
</style>
<script>
	function randomTalk(a) {
		return a[Math.floor(Math.random() * a.length)];
	}
	
	var talk1 = new Array('학생의 본분을 잊지 말도록.','네게도 교육관이 마음에 들었으면 좋겠구나.','아이들이 행복할 수 있는 곳이 되었으면 합니다.', '이런, 또 대길을 뽑아버렸나?','능력에 기대어 요행을 바라는 건 어리석은 일이지.','피어나는 꽃봉오리, 츠보미. 이제 막 개화하기 시작한 너희들과 정말 잘 어울리는 단어라고 생각한단다.','벚꽃이 피는 나무 아래서 차 한 잔의 여유 정도는 즐기고 싶은걸.','학교는 언제나 시끌벅적하지. 네게 외롭지 않은 곳이 되었으면 좋겠어.','학교생활은 좀 어떠니? 지낼만한가. 불편하다면 언제든 선생님을 찾아와줘도 괜찮단다.'); //교장쌤
	var talk2 = new Array('선생님은 계속 너희 편으로 남아있을게.','이런 나라도 계속 네 편이 되어주는 건 자신있단다.', '선생님은 선생님이니까 너희가 너무 소중한 걸!', '자기 전에 따뜻한 홍차를 줄게. 기분이 좋아질거야.', '오늘은 어떤 친구를 만났니?', '이렇게 많은 이야기를 들려주다니, 선생님 감동했어….', '너와 오늘 있었던 일은 꼭 일기에 적어둘게.', '오늘의 추천 문학은 <꽃봉오리>란다.', '오늘이 가고나면 너무 아쉬워서 어떡하지….', '내일은 무슨 수업이 듣고 싶니? 네가 바라는 수업을 하자.'); //호쌤
	
	$(".profile_body img").on("click",function(){
		$(".profile_word span").text(randomTalk(talk<?= $val1 ?>));
	})
</script>

