<?php

//캐릭터 리스트
$PLAYER = array();
foreach(query("SELECT * FROM MEMBER") as $row){
	$PLAYER[$row->m_no] = $row->m_name;
}

//아이템 리스트
$ITEM = array();
$ITEM[1] = "진달래";

//성별
$SEX = array();
$SEX[1] = "남";
$SEX[2] = "여";

//나이
$AGE = array();
$AGE[1] = "13";
$AGE[2] = "16";
$AGE[3] = "19";

//등급
$GRADE = array();
$GRADE[0] = "꽃눈";
$GRADE[1] = "한송이";
$GRADE[2] = "두송이";
$GRADE[3] = "세송이";
$GRADE[4] = "성화";

//반
$CLASS = array();
$CLASS[1] = "잠재능력반";
$CLASS[2] = "기술반";
$CLASS[3] = "체질반";
$CLASS[4] = "특별능력반";

//타입
$TYPE = array();
$TYPE[1] = "가늘고 긴";
$TYPE[2] = "앨리스 수명";
$TYPE[3] = "사용자 수명";

//아이템 분류
$I_TYPE = array();
$I_TYPE[1] = "일반";
$I_TYPE[2] = "이벤트";
$I_TYPE[3] = "스토리";
$I_TYPE[4] = "비법서";
$I_TYPE[5] = "재료";

//아이템 기능
$I_SYS = array();
$I_SYS[0] = "없음";
$I_SYS[1] = "상황용";
$I_SYS[2] = "로또";
$I_SYS[3] = "랜덤박스";
$I_SYS[4] = "비약";
$I_SYS[5] = "결정석";


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
