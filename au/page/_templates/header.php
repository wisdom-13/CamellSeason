<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1">
<title>Season of Camelia</title>
<link rel="shortcut icon" href="/common/img/icon.ico">
<link href="/au/common/css/css.css" rel="stylesheet">
<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/au/common/js/js.js"></script>
<style> body {cursor:url(/common/img/light.ani), pointer; }</style>
</head>
<body style="margin: 0 auto">
<!-- SCM Music Player http://scmplayer.co -->
<script type="text/javascript" src="http://scmplayer.co/script.js" 
data-config="{'skin':'http://camellseason.cafe24.com/common/css/skin.css','volume':30,'autoplay':true,'shuffle':true,'repeat':1,'placement':'bottom','showplaylist':false,'playlist':[{'title':'Investigation ','url':'https://youtu.be/g1MwpgsksJc'}]}" ></script>
<!-- SCM Music Player script end -->

<header>
	<div class="main_menu">
		<ul>
			<li><a href="/au/index.php" style="background: url('/au/common/img/menu/home.png')"><img src="/au/common/img/menu/home_hover.png"></a></li>
			<li><a href="/au/index.php/information/notice" style="background: url('/au/common/img/menu/notice.png')"><img src="/au/common/img/menu/notice_hover.png"></a></li>
			<li><a href="/au/index.php/information/world" style="background: url('/au/common/img/menu/world.png')"><img src="/au/common/img/menu/world_hover.png"></a></li>
			<li><a href="/au/index.php/information/system" style="background: url('/au/common/img/menu/system.png')"><img src="/au/common/img/menu/system_hover.png"></a></li>
			<li><a href="/au/index.php/profile" style="background: url('/au/common/img/menu/profile.png')"><img src="/au/common/img/menu/profile_hover.png"></a></li>
			<?php if(isset($_SESSION["no"])){ ?>
			<li><a href="/au/index.php/ok/auth/logout" style="background: url('/au/common/img/menu/logout.png')"><img src="/au/common/img/menu/logout_hover.png"></a></li>
			<?php } else { ?>
			<li><a href="https://twitter.com/camell_of" style="background: url('/au/common/img/menu/qna.png')"><img src="/au/common/img/menu/qna_hover.png"></a></li>
			<? } ?>
		</ul>
	</div>
</header>
<section>
