<div class="profile_right">
	<img class="profile_title" src="/common/img/profile/profile_title.png">
	<div class="profile_object">
		
		<a href="/index.php/profile/npc" style="background: url('/common/img/profile/class0.png')"><img src="/common/img/profile/class0_hover.png"></a>
		<a href="/index.php/profile/class3/1" style="background: url('/common/img/profile/class1.png')"><img src="/common/img/profile/class1_hover.png"></a>
		<a href="/index.php/profile/class3/2" style="background: url('/common/img/profile/class2.png')"><img src="/common/img/profile/class2_hover.png"></a>
		<a href="/index.php/profile/class3/3" style="background: url('/common/img/profile/class3.png')"><img src="/common/img/profile/class3_hover.png"></a>
		<a href="/index.php/profile/class3/4" style="background: url('/common/img/profile/class4.png')"><img src="/common/img/profile/class4_hover.png"></a>
		
	</div>
</div>
<a href="/index.php/profile/view_mob"><img style="position: absolute; bottom: 50px; left: 50px" src="/common/img/profile/mob.png"></a>
<style>
	.content_bottom { margin-top: -53px;}
	.content { position: relative; padding: 0px; background: url('/common/img/profile/profile_back.png'); }
	.profile_right { width: 750px; float: left; width: 317px; text-align: center; margin-left: 480px; margin-top: 35px; }
	
	.profile_object { height: 494px; background: url('/common/img/profile/profile_object.png'); }
	.profile_object a { width: 317px; height: 94px; display: inline-block; background-repeat:  no-repeat !important; margin-bottom: 6px; }
	.profile_object img { opacity: 0; }
</style>

<script>
	$(".profile_right a").on("mouseover",function(){
		$(this).children("img").css("opacity","100")
	})
	$(".profile_right a").on("mouseleave",function(){
		$(this).children("img").css("opacity","0")
	})
</script>