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
    <a class="navbar-brand" href="/admin">Season of CAMELLIA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti0" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">메인 관리</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti0">
            <li>
              <a href="/admin/index.php/setting/board">게시판</a>
            </li>
			<li>
              <a href="/admin/index.php/setting/qna">질문</a>
            </li>
            <li>
              <a href="/admin/index.php/setting/slide">슬라이드/BGM</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/admin/index.php/member/member">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">회원 관리</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">캐릭터 관리</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="/admin/index.php/player/profile">프로필 리스트</a>
            </li>
            <li>
              <a href="/admin/index.php/player/growth">츠보미 성장 방향</a>
            </li>
            <li>
              <a href="/admin/index.php/player/rel">관계 목록</a>
            </li>
			<li>
              <a href="/admin/index.php/player/title">칭호</a>
            </li>
			<li>
              <a href="/admin/index.php/player/hp">체력</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">아이템 관리</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti2">
            <li>
              <a href="/admin/index.php/item/items/0">아이템</a>
            </li>
            <li>
              <a href="/admin/index.php/item/recipe">레시피</a>
            </li>
            <li>
              <a href="/admin/index.php/item/get">보유현황</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">화폐 관리</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti4">
            <li>
              <a href="/admin/index.php/point/twt">트윗수정산</a>
            </li>
            <li>
              <a href="/admin/index.php/point/event">조사정산</a>
            </li>
			<li>
              <a href="/admin/index.php/point/use_list">이용내역 (지급)</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-mail-forward"></i>
            <span class="nav-link-text">의뢰 관리</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti3">
            <li>
              <a href="/admin/index.php/quest/wait">대기중인 의뢰</a>
            </li>
            <li>
              <a href="/admin/index.php/quest/ing">진행중인 의뢰</a>
            </li>
            <li>
              <a href="/admin/index.php/quest/finish">지난 의뢰</a>
            </li>
            <li>
              <a href="/admin/index.php/quest/admin">관리자 의뢰</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">시스템 관리</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti5">
            <li>
              <a href="/admin/index.php/system/pro">수련장</a>
            </li>
            <li>
              <a href="/admin/index.php/system/letter">서신함</a>
            </li>
			<li>
              <a href="/admin/index.php/system/story">도서관</a>
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
          <a class="nav-link" href="/index.php">
            <i class="fa fa-fw fa-home"></i>HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php/ok/auth/logout">
            <i class="fa fa-fw fa-sign-out"></i>LOGOUT</a>
        </li>
      </ul>
    </div>
  </nav>
 <div class="content-wrapper">
    <div class="container-fluid "> 