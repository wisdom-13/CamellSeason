<div class="world_top" style="margin-top: 40px;">
	<img src="/common/img/world/world_top.png" >
</div>
<div class="world_bottom" style="margin-top: 10px;">
	<a href="/index.php/world/rumor" style="background: url('/common/img/world/rumor.png')"><img src="/common/img/world/rumor_hover.png"></a>
	<a href="/index.php/world/era" style="background: url('/common/img/world/era.png')"><img src="/common/img/world/era_hover.png"></a>
	<a href="/index.php/world/school" style="background: url('/common/img/world/school.png')"><img src="/common/img/world/school_hover.png"></a>
	<a href="/index.php/world/ability" style="background: url('/common/img/world/ability.png')"><img src="/common/img/world/ability_hover.png"></a>
	<a href="/index.php/world/soul" style="background: url('/common/img/world/soul.png')"><img src="/common/img/world/soul_hover.png"></a>
</div>

<style>
	.content { padding: 10px;}
	.world_bottom { width: 850px;}
	.world_bottom a { width: 154px; height: 310px; margin-left: 10px; display: block; float: left; }
	.world_bottom img { opacity: 0; }
</style>


<script>
	$(".world_bottom a").on("mouseover",function (){
		$(this).children("img").css("opacity","100");
	})
	$(".world_bottom a").on("mouseleave",function (){
		$(this).children("img").css("opacity","0");
	})
</script>