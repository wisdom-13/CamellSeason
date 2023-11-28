<?php
//캐릭터 리스트
$PLAYER = array();
foreach(query("SELECT * FROM AU_PLAYER order by p_no") as $row){
	$PLAYER[$row->p_no] = $row->p_name;
}


//아이템 리스트
$ITEM = array();
foreach(query("SELECT * FROM AU_ITEM") as $row){
	$ITEM[$row->i_no] = $row->i_name;
}

//상품 리스트
$ITEM1 = array();
foreach(query("SELECT * FROM ITEM where i_type = 1") as $row){
	$ITEM1[$row->i_no] = $row->i_name;
}

//비법서 리스트
$ITEM2 = array();
foreach(query("SELECT * FROM ITEM where i_type = 2") as $row){
	$ITEM2[$row->i_no] = $row->i_name;
}

//재료 리스트
$ITEM3 = array();
foreach(query("SELECT * FROM ITEM where i_type = 3") as $row){
	$ITEM3[$row->i_no] = $row->i_name;
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

//등급
$GRADE = array();
$GRADE[1] = "한송이";
$GRADE[2] = "두송이";
$GRADE[3] = "세송이";
$GRADE[4] = "성화";

//반
$CLASS = array();
$CLASS[1] = "잠재능력반";
$CLASS[2] = "체질반";
$CLASS[3] = "기술반";
$CLASS[4] = "특별능력반";

//타입
$TYPE = array();
$TYPE[1] = "가늘고 긴";
$TYPE[2] = "앨리스 수명";
$TYPE[3] = "사용자 수명";

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

//아이템 등급
$I_GRADE = array();
$I_GRADE[0] = "X";
$I_GRADE[1] = "저급";
$I_GRADE[2] = "일반";
$I_GRADE[3] = "고급";

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

//팀
$TEAM = array("","골드", "블랙");

//포지션
$POSITION = array("","공격", "서포터");
