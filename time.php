<?php 
// php 코드 
############### 남은기간을 구하는 부분임다. ################# 
// $adate2[0] : 데이타 베이스의 timestamp형식으로 되어있는 값을 가지고 옵니다. 
$date1=mktime(15, 30, 0, 1, 17, 2019); //종료시간 ; 시, 분, 초, 월, 일 년
$date2=mktime(); 

$total_secs=abs($date1 - $date2); 
$diff_in_days = floor($total_secs / 86400); 
$rest_hours = $total_secs % 86400; 
$diff_in_hours = floor($rest_hours / 3600); 
$rest_mins = $rest_hours % 3600; 
$diff_in_mins = floor($rest_mins / 60); 
$diff_in_secs = floor($rest_mins % 60); 
$time_diff = $diff_in_days ."일". $diff_in_hours ."시간". $diff_in_mins ."분". $diff_in_secs ."초"; 
echo date('Y-m-d h:i:s ', $date2);
echo date('Y-m-d h:i:s', $date1);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>무제 문서</title>




</head>

<body onload='Timer(<?= $diff_in_secs ?>, <?= $diff_in_mins ?>, <?= $diff_in_hours ?>, <?= $diff_in_days ?>)' >


<form name=timer>
<input name=counter>
</form>

<script language="javascript"> 
function Timer(diff_in_secs, diff_in_mins, diff_in_hours, diff_in_days) 
{ 
//남은시간 실시간으로 보여지는 부분 
day=diff_in_days;	//일단 남은 날짜와 시간을 받아온다음에 timer1을 호출한다 
hour=diff_in_hours; 
min=diff_in_mins; 
sec=diff_in_secs; 
Timer1(); 
} 
function Timer1() 
{ 
sec=sec-1; //1초식 감소 하다가 -1이되면 1분을 뺀다은 초를 59초로 초기화 
if(sec == -1) 
{ 
sec = 59; 
min = min-1; 
} 
if(min == -1)	//1분씩 감소 하다가 -1이되면 1시간을 뺀다음 분을 59분으로 초기화 
{ 
min=59; 
hour = hour - 1; 
} 
if(hour == -1)	//1시간씩 감소 하다가 -1이되면 1일을 뺀다음 날짜 초기화 
{ 
hour = 23; 
day = day - 1; 
} 
if(sec == 0 && min == 0 && hour == 0 && day == 0) 
{ 
//일:0 시간:0 분:0 초:0 이라면 종료메세지 출력 
document.timer.counter.value = '경매가 종료되었습니다.'; 
return; 
} 
document.timer.counter.value = day + '일 ' + hour + '시간 ' + min + '분 ' + sec + '초 '; 
//1초당 한번씩 timer1()을 호출하여 실행 
window.setTimeout('Timer1()',1000); 
} 
</script> 



</body>

</html>
