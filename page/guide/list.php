<div class="world_top" style="margin-top: 40px;">
	<img src="/common/img/guide/guide_title.png" >
</div>
<div class="world_bottom" style="margin-top: 30px;">
	<a href="/index.php/guide/member" style="background: url('/common/img/guide/member.png')"><img src="/common/img/guide/member_hover.png"></a>
	<a href="/index.php/guide/make" style="background: url('/common/img/guide/make.png')"><img src="/common/img/guide/make_hover.png"></a>
	<a href="/index.php/guide/pro" style="background: url('/common/img/guide/pro.png')"><img src="/common/img/guide/pro_hover.png"></a>
	<a href="/index.php/guide/shop" style="background: url('/common/img/guide/shop.png')"><img src="/common/img/guide/shop_hover.png"></a>
	<a href="/index.php/guide/inventory" style="background: url('/common/img/guide/inventory.png')"><img src="/common/img/guide/inventory_hover.png"></a>
	
	<a href="/index.php/guide/letter" style="background: url('/common/img/guide/letter.png')"><img src="/common/img/guide/letter_hover.png"></a>
	<a href="/index.php/guide/quest" style="background: url('/common/img/guide/quest.png')"><img src="/common/img/guide/quest_hover.png"></a>
	<a href="/index.php/guide/point" style="background: url('/common/img/guide/point.png')"><img src="/common/img/guide/point_hover.png"></a>
	
</div>

<style>
	.content { padding: 10px; text-align: center; overflow: hidden; }
	.world_bottom { width: 759px; height: 603px; background: url('/common/img/guide/guide_back.png') }
	.world_bottom a { width: 87px; height: 315px; margin: 3px; display: block; float: left; }
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