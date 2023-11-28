<?php 
include "../admin/include/lib.php"; 
include "../admin/include/list.php"; 

if(isset($_SESSION["no"])){ 

include "page/_templates/header.php";
if($page){ 
	include "page/_templates/sub.php";
} else { 
		include "page/_templates/main.php"; 
} 
include "page/_templates/footer.php";

} else { echo $_SESSION["no"] ?>

<div class="login-page">
	<div class="form">
		<p style="text-align: left; font-weight: 900">동백의 계절</p>
		<!--회원가입-->
		<form class="register-form" action="/index.php/ok/auth/join" method="post" >
			<input type="text" id="id" name="id" placeholder="계정" required><br>
			<input type="password" id="pw" name="pw" placeholder="암호" required><br>
			<input type="text" id="name" name="name" placeholder="성명" required><br>
			<button name="join" value="m_join">학생증 발급</button>
			<p class="message">이미 학생증을 발급받으셨나요? <a href="#">학생인증하기</a></p>
		</form>
		<!--로그인-->
		<form class="login-form" action="/index.php/ok/auth/login" method="post">
			<input type="text" id="id" name="id" placeholder="계정" required>
			<input type="password" id="pw" name="pw" placeholder="암호" required>
			<button name="login" value="m_login">학생인증</button>
			<p class="message">학생증을 발급받지 않으셨나요? <a href="#">학생증 발급받기</a></p>
		</form>
	</div>
</div>

<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #851210;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;1
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #660F0E;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #851210;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #ebecf1; /* fallback for old browsers */
}

</style>
<script src="/m/common/js/core/jquery.min.js"></script>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>

<?php } ?>

