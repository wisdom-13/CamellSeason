<div class="system_top" style="margin-top: 40px; text-align: center">
	<img src="/common/img/system/system_title.png" >
</div><br>
<div class="system_bottom" style="margin-top: 10px;">
	<a href="/index.php/system/point" style="background: url('/common/img/system/point.png')"><img src="/common/img/system/point_hover.png"></a>
	<a href="/index.php/system/ability" style="background: url('/common/img/system/ability.png')"><img src="/common/img/system/ability_hover.png"></a>
	<div style="clear: both"></div>
	<a href="/index.php/system/school" style="background: url('/common/img/system/school.png')"><img src="/common/img/system/school_hover.png"></a>
	<a href="/index.php/system/survey" style="background: url('/common/img/system/survey.png')"><img src="/common/img/system/survey_hover.png"></a>
	<a href="/index.php/system/hp" style="background: url('/common/img/system/hp.png')"><img src="/common/img/system/hp_hover.png"></a>
</div>

<style>
	.content { padding: 10px; background-image: url('/common/img/system/system_back.png'); background-color: rgba(0,0,0,0.05); }
	
	.system_bottom { width: 850px;}
	.system_bottom a { margin: 5px; width: 142px; height: 270px; display: block; float: left; }
	.system_bottom img { opacity: 0; }
	
</style>


<script>
	$(".system_bottom a").on("mouseover",function (){
		$(this).children("img").css("opacity","100");
	})
	$(".system_bottom a").on("mouseleave",function (){
		$(this).children("img").css("opacity","0");
	})
</script>