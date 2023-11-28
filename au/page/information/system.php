<div class="information">
	
	<div class="system_title">
		<img src="/au/common/img/system/system_title.png" style="margin-bottom: 40px;">
	</div>
	<div class="system_btn">
		<ul>
			<li><img data-title="point" src="/au/common/img/system/btn_point.png" onmouseover="this.src='/au/common/img/system/btn_point_hover.png';" onmouseout="this.src='/au/common/img/system/btn_point.png';"></li>
			<li><img data-title="grade" src="/au/common/img/system/btn_grade.png" onmouseover="this.src='/au/common/img/system/btn_grade_hover.png';" onmouseout="this.src='/au/common/img/system/btn_grade.png';"></li>
			<li><img data-title="state" src="/au/common/img/system/btn_state.png" onmouseover="this.src='/au/common/img/system/btn_state_hover.png';" onmouseout="this.src='/au/common/img/system/btn_state.png';"></li>
			<li><img data-title="mission" src="/au/common/img/system/btn_mission.png" onmouseover="this.src='/au/common/img/system/btn_mission_hover.png';" onmouseout="this.src='/au/common/img/system/btn_mission.png';"></li>
			<li><img data-title="expedition" src="/au/common/img/system/btn_expedition.png" onmouseover="this.src='/au/common/img/system/btn_expedition_hover.png';" onmouseout="this.src='/au/common/img/system/btn_expedition.png';"></li>
			<li><img data-title="battle" src="/au/common/img/system/btn_battle.png" onmouseover="this.src='/au/common/img/system/btn_battle_hover.png';" onmouseout="this.src='/au/common/img/system/btn_battle.png';"></li>
			<li><img data-title="etc" src="/au/common/img/system/btn_etc.png" onmouseover="this.src='/au/common/img/system/btn_etc_hover.png';" onmouseout="this.src='/au/common/img/system/btn_etc.png';"></li>
		</ul>
	</div>
	<div class="system">
		<img id="point" src="/au/common/img/system/point.png">
		<img id="grade" src="/au/common/img/system/grade.png">
		<img id="state" src="/au/common/img/system/state.png">
		<img id="mission" src="/au/common/img/system/mission.png">
		<img id="expedition" src="/au/common/img/system/expedition.png">
		<img id="battle" src="/au/common/img/system/lock.png">
		<img id="etc" src="/au/common/img/system/etc.png">
	</div>
</div>

<script>
   $(".system_btn ul li").on("click",function(){
	   title = $(this).children("img").data("title");
	   $("#"+title).css("display","block");
	   $(".system img").not("#"+title).css("display","none");
   }) 
    
</script>

<style>
	.system_btn { width: 1304px; height: 80px; }
	.system_btn ul li { float: left; width:186px }
	
	.system img { margin-bottom: 40px; display: none; }
	#point { display: block; }
	
</style>