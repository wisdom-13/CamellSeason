<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Admin | Season of CAMELLIA</title>
<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/common/css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" /> 
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script> 
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/au_admin">Season of CAMELLIA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">PLAYER</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="/au_admin/index.php/player/member">회원 관리</a>
            </li>
            <li>
              <a href="/au_admin/index.php/player/profile">캐릭터 관리</a>
            </li>
            <li>
              <a href="/au_admin/index.php/player/point">포인트/숙련도 관리</a>
            </li>
			
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">ITEM</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti2">
            <li>
              <a href="/au_admin/index.php/item/items/0">아이템 관리</a>
            </li>
            <li>
              <a href="/au_admin/index.php/item/inventory">인벤토리 관리</a>
            </li>
     
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-mail-forward"></i>
            <span class="nav-link-text">MISSION</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti3">
            <li>
              <a href="/au_admin/index.php/mission/list">임무 관리</a>
            </li>
            <li>
              <a href="/au_admin/index.php/mission/log">임무 수행 현황</a>
            </li>
           
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-fighter-jet"></i>
            <span class="nav-link-text">EXPEDITION</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti4">
            <li>
              <a href="/au_admin/index.php/expedition/twt">원정 관리</a>
            </li>
            <li>
              <a href="/au_admin/index.php/expedition/event">원정 진행 현황</a>
            </li>
		
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-bank"></i>
            <span class="nav-link-text">BATTLE</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti4">
            <li>
              <a href="/au_admin/index.php/battle/twt">전투 관리</a>
            </li>
            <li>
              <a href="/au_admin/index.php/battle/event">체력 관리</a>
            </li>
		
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">SYSTEM</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti5">
            <li>
              <a href="/au_admin/index.php/system/cal">정산</a>
            </li>
            <li>
              <a href="/au_admin/index.php/system/letter">문자 기록</a>
            </li>
            
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
 		<li class="nav-item">
          <a class="nav-link" href="/au/index.php">
            <i class="fa fa-fw fa-home"></i>HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/au/index.php/ok/auth/logout">
            <i class="fa fa-fw fa-sign-out"></i>LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>
 <div class="content-wrapper">
    <div class="container-fluid "> 