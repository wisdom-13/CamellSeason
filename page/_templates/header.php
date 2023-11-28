<!doctype html>
<html>
	<!--
<script src="https://tistory4.daumcdn.net/tistory/2919198/skin/images/snowstorm-min.js"></script>
<script type="text/javascript" src="https://tistory4.daumcdn.net/tistory/2919198/skin/images/jquery.snow.js"></script>
-->
<script> 

//jQuery(document).ready( function(){ $.fn.snow();});
//jQuery(document).ready( function(){ $.fn.snow({ minSize: 5, maxSize: 40, newOn: 800, flakeColor: '#0099FF' });});

</script>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1">

<title>椿の季節</title>
<link rel="shortcut icon" href="/common/img/icon.ico">

<link href="/common/css/css.css" rel="stylesheet">
<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/common/js/js.js"></script>

</head>
<body style="margin: 20px auto">
	
<!-- bgm -->	
<script type="text/javascript" src="http://scmplayer.co/script.js" 
data-config="{'skin':'http://camellseason.cafe24.com/common/css/skin.css','volume':10,'autoplay':true,'shuffle':true,'repeat':1,'placement':'botton','showplaylist':false,'playlist':[
<?php foreach(query("select * from BANNER where b_type = '2'") as $rs){ ?>
 {'title':'<?= $rs->b_img ?>','url':'<?= $rs->b_url ?>'},
<?php } ?>
]}" >
</script>
	<style> body {cursor:url(/common/img/light.ani), pointer; }</style>
<!-- header -->	
<div class="flower"><img data-name="show" title="show" src="/common/img/foot/flower.png"></div>
<div class="map"><img src="/common/img/main/map.png"></div>
<header>
	<div class="header">
	<div class="logo"><a href="/index.php" style="background: url('/common/img/menu/logo.png')"><img src="/common/img/menu/logo_hover.png"></a></div>
	<div class="main_menu">
		<ul>
			<li><a href="/index.php/notice" style="background: url('/common/img/menu/notice.png')"><img src="/common/img/menu/notice_hover.png"></a></li>
			<li><a href="/index.php/world" style="background: url('/common/img/menu/world.png')"><img src="/common/img/menu/world_hover.png"></a></li>
			<li><a href="/index.php/system" style="background: url('/common/img/menu/system.png')"><img src="/common/img/menu/system_hover.png"></a></li>
			<li><a href="/index.php/profile" style="background: url('/common/img/menu/profile.png')"><img src="/common/img/menu/profile_hover.png"></a></li>
			<li><a href="/index.php/book" style="background: url('/common/img/menu/book.png')"><img src="/common/img/menu/book_hover.png"></a></li>
			<li><a href="/index.php/shop/list/0" style="background: url('/common/img/menu/shop.png')"><img src="/common/img/menu/shop_hover.png"></a></li>
		</ul>
	</div>
	<div class="sub_menu">
		<a href="/index.php/uniform"><img src="/common/img/menu/uniform.png" onmouseover="this.src='/common/img/menu/uniform_hover.png';" onmouseout="this.src='/common/img/menu/uniform.png';"></a>
		<a onclick="window.open('/common/img/main/map.png','지도','width=800,height=800,location=no,status=no,scrollbars=yes');"><img src="/common/img/menu/map.png" onmouseover="this.src='/common/img/menu/map_hover.png';" onmouseout="this.src='/common/img/menu/map.png';"></a>
		<a href="/index.php/guide"><img src="/common/img/menu/ghost.png" onmouseover="this.src='/common/img/menu/ghost_hover.png';" onmouseout="this.src='/common/img/menu/ghost.png';"></a>
	</div>
	</div>
</header>
<section>
