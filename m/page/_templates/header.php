<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>椿の季節</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- CSS Files -->
<link href="/m/common/css/bootstrap.min.css" rel="stylesheet" />
<link href="/m/common/css/now-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="/m/common/demo/demo.css" rel="stylesheet" />
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
      <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"-->
      <div class="logo">
        <a href="/m/index.php" class="simple-text logo-mini"></a>
        <a href="/m/index.php" class="simple-text logo-normal">椿の季節</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li <?= $page == "profile" ? "class='active'" : "" ?>>
            <a href="/m/index.php/profile/list/1">
              <i class="now-ui-icons users_single-02"></i>
              <p>학생기록부</p>
            </a>
          </li>
          <li <?= $page == "book" ? "class='active'" : "" ?>>
            <a href="/m/index.php/book">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>도서관</p>
            </a>
          </li>
           <li <?= $page == "inventory" ? "class='active'" : "" ?>>
            <a href="/m/index.php/inventory/list/0">
              <i class="now-ui-icons design_app"></i>
              <p>소지품</p>
            </a>
          </li>
          <li <?= $page == "shop" ? "class='active'" : "" ?>>
            <a href="/m/index.php/shop/list/0">
              <i class="now-ui-icons shopping_cart-simple"></i>
              <p>잡화점</p>
            </a>
          </li>
         
          <li <?= $page == "quest" ? "class='active'" : "" ?>>
            <a href="/m/index.php/quest">
              <i class="now-ui-icons files_paper"></i>
              <p>의뢰</p>
            </a>
          </li>
		
          <li <?= $page == "letter" ? "class='active'" : "" ?>>
            <a href="/m/index.php/letter">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>서신</p>
            </a>
          </li>
          <li <?= $page == "point" ? "class='active'" : "" ?>>
            <a href="/m/index.php/point">
              <i class="now-ui-icons business_money-coins"></i>
              <p>정산</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/index.php">
                  <i class="now-ui-icons tech_tv"></i>
                  <p>
                    <span class="d-lg-none d-md-block">PC HOME</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="/index.php/ok/auth/m_logout">
                  <i class="now-ui-icons media-1_button-power"></i>
                  <p>
                    <span class="d-lg-none d-md-block">LOGOUT</span>
                  </p>
                </a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
		<div class="panel-header panel-header-sm"></div>