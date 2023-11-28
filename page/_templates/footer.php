</section>
<!-- footer -->	
<div class="flower_under"><img data-name="show" title="show" src="/common/img/foot/flower_under.png"></div>
<?php if(isset($_SESSION["id"])) { $player = fetchAll("select * from PLAYER where p_no = '{$_SESSION["p3"]}'");  ?>

<div class="login_ok_box m_log">
	<div class="login_left">
		<h4><?= $player->p_name ?></h4>
		<?php $pro = fetchAll("select p_pro from PLAYER where p_no = '{$_SESSION["p3"]}'"); //성장하면 수정하기 ?>
		<span><?= $GRADE[$player->p_grade] ?> / <?= $pro->p_pro ?>단계</span>
		<?php if($_SESSION["use"]=="1"){ ?><a href="/admin" style="color: #800f0e; font-size: 12px; ">관리자</a><?php } ?>
		<p>성별 : <?= $SEX[$player->p_sex] ?> <br> 신체 : <?= $player->p_hight ?> <br> 생일 : <?= $player->p_brith ?></p>
		<img class="open_close" name="close" src="/common/img/foot/close.png">
		<a href="/index.php/ok/auth/logout"><img src="/common/img/foot/logout.png"></a>
		<img class="gr" src="/common/img/foot/f_<?= $player->p_grade ?>.png">
	</div>
	<div class="login_right">
		<img src="/admin/common/img/profile/<?= $player->p_age ?>/head/<?= $player->p_no ?>.png">
	</div>
</div>
<?php 
	$hp = fetchAll("select * from MEMBER where m_no = '{$_SESSION["no"]}'"); 
	$hp_num = ($hp->m_hp == "100") ? "10" : substr($hp->m_hp, 0, 1); 
?>
<div class="gauge">
	<span class="g_text" style="font-size: 9px"><?= $hp->m_hp ?></span>
	<img class="g_num" src="/common/img/foot/num.png">
	<img class="g_flower" src="/common/img/foot/gauge_flower.png">
	<img class="g_lock" src="/common/img/foot/hp/<?= $hp_num ?>.png">
	<img class="g_bar" src="/common/img/foot/gauge_bar.png">
	<img class="g_gauge" src="/common/img/foot/gauge_bar_10.png" width="<?= ($pro->p_pro)*90 ?>px">
	<img class="g_cut" src="/common/img/foot/cut.png">
</div>
<div class="gauge_icon">
	<a href="/index.php/mypage/list/3"><img src="/common/img/foot/mypage.png"  onmouseover="this.src='/common/img/foot/mypage_hover.png';" onmouseout="this.src='/common/img/foot/mypage.png';"></a>	
	<a href="/index.php/inventory/list/0"><img src="/common/img/foot/inventory.png"  onmouseover="this.src='/common/img/foot/inventory_hover.png';" onmouseout="this.src='/common/img/foot/inventory.png';"></a>
	<a href="/index.php/make/list/0"><img src="/common/img/foot/recipe.png"  onmouseover="this.src='/common/img/foot/recipe_hover.png';" onmouseout="this.src='/common/img/foot/recipe.png';"></a>
	<a href="/index.php/pro"><img src="/common/img/foot/pro.png"  onmouseover="this.src='/common/img/foot/pro_hover.png';" onmouseout="this.src='/common/img/foot/pro.png';"></a>
	<a href="/index.php/quest"><img src="/common/img/foot/quest.png"  onmouseover="this.src='/common/img/foot/quest_hover.png';" onmouseout="this.src='/common/img/foot/quest.png';"></a>
	<a href="/index.php/letter"><img src="/common/img/foot/letter.png"  onmouseover="this.src='/common/img/foot/letter_hover.png';" onmouseout="this.src='/common/img/foot/letter.png';"></a>
	
	<a href="/index.php/point"><img src="/common/img/foot/point.png"  onmouseover="this.src='/common/img/foot/point_hover.png';" onmouseout="this.src='/common/img/foot/point.png';"></a>
	
</div>
<div class="gauge_coin">
	<img src="/common/img/foot/coin.png"> 
	<span>소지금 : <span class="coin"><?= $POINT->m_point ?></span> 花</span>
</div>

<?php } else { //로그인 ?>
	
<div class="login_box m_log">
	
	<form class="login-form" action="/index.php/ok/auth/login" method="post" >
		<img class="join_go_btn" src="/common/img/foot/join.png" onmouseover="this.src='/common/img/foot/join_hover.png';" onmouseout="this.src='/common/img/foot/join.png';">
		<div class="login_input">
			<input type="text" id="id" name="id" placeholder="計定" required>
			<input type="password" id="pw" name="pw" placeholder="暗號" required>
			<input type="submit" style="display: none">
		</div>
		<img class="login_btn" src="/common/img/foot/login.png" onmouseover="this.src='/common/img/foot/login_hover.png';" onmouseout="this.src='/common/img/foot/login.png';">
	</form>
</div>
	
<div class="join_box">
	<h1>학생증 발급</h1>
	<form class="join-form" action="/index.php/ok/auth/join" method="post" >
	<form class="join-form">
		<span>계정</span> <input type="text" id="id" name="id" placeholder="計定" required><br>
		<span>암호</span> <input type="password" id="pw" name="pw" placeholder="暗號" required><br>
		<span>성명</span> <input type="text" id="name" name="name" placeholder="姓名" required><br>
		
		<button type="button" class="join_back_btn">돌아가기</button><button type="submit" class="join_btn">발급받기</button>
	</form>	
</div>
	
<?php } ?>
<div class="join_back"></div>	
<footer>
</footer>
<script type="text/javascript">
if  ((document.getElementById) && 
window.addEventListener || window.attachEvent){

(function(){

//Configure here...

var xCol = "#9c9c9c";
var yCol = "#9c9c9c";
var zCol = "#9c9c9c";
var n = 6;   //number of dots per trail.
var t = 40;  //setTimeout speed.
var s = 0.05; //effect speed.

//End.

var r,h,w;
var d = document;
var my = 10;
var mx = 10;
var stp = 0;
var evn = 360/3;
var vx = new Array();
var vy = new Array();
var vz = new Array();
var dy = new Array();
var dx = new Array();

var pix = "px";

var strictmod = ((document.compatMode) && 
document.compatMode.indexOf("CSS") != -1);


var domWw = (typeof window.innerWidth == "number");
var domSy = (typeof window.pageYOffset == "number");
var idx = d.getElementsByTagName('div').length;

for (i = 0; i < n; i++){
var dims = (i+1)/2;
d.write('<div id="x'+(idx+i)+'" style="position:absolute;'
+'top:0px;left:0px;width:'+dims+'px;height:'+dims+'px;'
+'background-color:'+xCol+';font-size:'+dims+'px"><\/div>'

+'<div id="y'+(idx+i)+'" style="position:absolute;top:0px;'
+'left:0px;width:'+dims+'px;height:'+dims+'px;'
+'background-color:'+yCol+';font-size:'+dims+'px"><\/div>'

+'<div id="z'+(idx+i)+'" style="position:absolute;top:0px;'
+'left:0px;width:'+dims+'px;height:'+dims+'px;'
+'background-color:'+zCol+';font-size:'+dims+'px"><\/div>');
}

if (domWw) r = window;
else{ 
  if (d.documentElement && 
  typeof d.documentElement.clientWidth == "number" && 
  d.documentElement.clientWidth != 0)
  r = d.documentElement;
 else{ 
  if (d.body && 
  typeof d.body.clientWidth == "number")
  r = d.body;
 }
}


function winsize(){
var oh,sy,ow,sx,rh,rw;
if (domWw){
  if (d.documentElement && d.defaultView && 
  typeof d.defaultView.scrollMaxY == "number"){
  oh = d.documentElement.offsetHeight;
  sy = d.defaultView.scrollMaxY;
  ow = d.documentElement.offsetWidth;
  sx = d.defaultView.scrollMaxX;
  rh = oh-sy;
  rw = ow-sx;
 }
 else{
  rh = r.innerHeight;
  rw = r.innerWidth;
 }
h = rh; 
w = rw;
}
else{
h = r.clientHeight; 
w = r.clientWidth;
}
}


function scrl(yx){
var y,x;
if (domSy){
 y = r.pageYOffset;
 x = r.pageXOffset;
 }
else{
 y = r.scrollTop;
 x = r.scrollLeft;
 }
return (yx == 0)?y:x;
}


function mouse(e){
var msy = (domSy)?window.pageYOffset:0;
if (!e) e = window.event;    
 if (typeof e.pageY == 'number'){
  my = e.pageY - msy + 16;
  mx = e.pageX + 6;
 }
 else{
  my = e.clientY - msy + 16;
  mx = e.clientX + 6;
 }
if (my > h-65) my = h-65;
if (mx > w-50) mx = w-50;
}



function assgn(){
for (j = 0; j < 3; j++){
 dy[j] = my + 50 * Math.cos(stp+j*evn*Math.PI/180) * Math.sin((stp+j*25)/2) + scrl(0) + pix;
 dx[j] = mx + 50 * Math.sin(stp+j*evn*Math.PI/180) * Math.sin((stp+j*25)/2) * Math.sin(stp/4) + pix;
}
stp+=s;

for (i = 0; i < n; i++){
 if (i < n-1){
  vx[i].top = vx[i+1].top; vx[i].left = vx[i+1].left; 
  vy[i].top = vy[i+1].top; vy[i].left = vy[i+1].left;
  vz[i].top = vz[i+1].top; vz[i].left = vz[i+1].left;
 } 
 else{
  vx[i].top = dy[0]; vx[i].left = dx[0];
  vy[i].top = dy[1]; vy[i].left = dx[1];
  vz[i].top = dy[2]; vz[i].left = dx[2];
  }
 }
setTimeout(assgn,t);
}


function init(){
for (i = 0; i < n; i++){
 vx[i] = document.getElementById("x"+(idx+i)).style;
 vy[i] = document.getElementById("y"+(idx+i)).style;
 vz[i] = document.getElementById("z"+(idx+i)).style;
 }
winsize();
assgn();
}


if (window.addEventListener){
 window.addEventListener("resize",winsize,false);
 window.addEventListener("load",init,false);
 document.addEventListener("mousemove",mouse,false);
}  
else if (window.attachEvent){
 window.attachEvent("onload",init);
 document.attachEvent("onmousemove",mouse);
 window.attachEvent("onresize",winsize);
} 

})();
}//End.
</script>
</body>
</html>
