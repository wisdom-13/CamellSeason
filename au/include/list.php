<?php

//캐릭터 리스트
$PLAYER = array();
$PLAYER[0] = "훈련용 로봇";
foreach(query("SELECT * FROM MEMBER order by m_player") as $row){
	$PLAYER[$row->m_au] = $row->m_name;
}


//아이템 리스트
$ITEM = array();
foreach(query("SELECT * FROM AU_ITEM") as $row){
	$ITEM[$row->i_no] = $row->i_name;
}


//성별
$SEX = array();
$SEX[1] = "남";
$SEX[2] = "여";

//나이
$AGE = array();
$AGE[1] = "13";
$AGE[2] = "15";
$AGE[3] = "20";


//아이템 분류
$I_TYPE = array();
$I_TYPE[1] = "일반";
$I_TYPE[2] = "비법서";
$I_TYPE[3] = "재료";
$I_TYPE[4] = "기타";

//아이템 기능
$I_SYS = array();
$I_SYS[0] = "없음";
$I_SYS[1] = "상황용";
$I_SYS[2] = "랜덤박스";
$I_SYS[3] = "비약";
$I_SYS[4] = "결정석";
$I_SYS[5] = "괴담";
$I_SYS[6] = "회복";

//사용미사용
$USE = array();
$USE[1] = "사용";
$USE[2] = "비허용";

//OX
$YN = array();
$YN[1] = "O";
$YN[2] = "X";

//사용미사용
$USER = array();
$USER[1] = "관리자";
$USER[2] = "승인";
$USER[3] = "미승인";

//퀘스트
$QUEST = array();
$QUEST[1] = "승인전";
$QUEST[2] = "수락대기";
$QUEST[3] = "진행중";
$QUEST[4] = "완료";
//$QUEST[5] = "완료";

//원정보상
$EXPEDITION = array();
$EXPEDITION[2]["point"] = "100";
$EXPEDITION[2]["exp"] = "1000";
$EXPEDITION[4]["point"] = "180";
$EXPEDITION[4]["exp"] = "2000";
$EXPEDITION[8]["point"] = "350";
$EXPEDITION[8]["exp"] = "4000";
$EXPEDITION[12]["point"] = "500";
$EXPEDITION[12]["exp"] = "6000";

//등급별 기본 공격치
$DICE = array();
$DICE["SS"] = 1000;
$DICE["S"] = 800;
$DICE["A"] = 800;
$DICE["B"] = 700;
$DICE["C"] = 700;
$DICE["D"] = 500;
$DICE["E"] = 500;

$POSITION = array();
$POSITION["1"] = "Attack Team";
$POSITION["2"] = "Support Team";
