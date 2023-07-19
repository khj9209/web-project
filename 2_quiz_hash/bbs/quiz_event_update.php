<?php
$_group_path = '..';
include_once ($_group_path.'/_common.php');

// 스토리텔링 값 저장 쿼리
// $_group_path = '..';
// include_once ($_group_path.'/_common.php');
// $qry = $DB->dbQuery("select * from Member where mb_id !=''  order by mb_no asc");
// $row = $DB->sql_fetch($sql);
// $res=$DB->sql_fetch_array($qry);


$qe_name = $_POST['qe_name'];       // 성명
$qe_phone = $_POST['qe_phone'];     // 연락처
$qe_quiz = $_POST['_idx'];     // 퀴즈1
$qe_ox_val = $_POST['ox_val'];      // o , x 값

$qe_user_info = " where qe_name = '{$qe_name}' and qe_phone = '{$qe_phone}' ";

switch($qe_quiz) {
    case '0':
        $qe_quiz_num = "qe_quiz1";
        $qe_quiz_num_a = "X";
        $answer_title = "정답은 ‘X’ 입니다.";
        $answer_txt = "수영성 남문 양쪽 사각형 돌기둥 위에는 ‘박견’이라 <br>불리는 개 한 쌍이 조각되어 있습니다.";
        break;
    case '1':
        $qe_quiz_num = "qe_quiz2";
        $qe_quiz_num_a = "X";
        $answer_title = "정답은 ‘X’ 입니다.";
        $answer_txt = "무민사 뒤편에 있는 바위의 이름은 ‘선서바위’입니다.";
        break;
    case '2':
        $qe_quiz_num = "qe_quiz3";
        $qe_quiz_num_a = "O";
        $answer_title = "정답은 ‘O’ 입니다.";
        $answer_txt = "푸조나무는 천연기념물 제311호, 곰솔나무는<br> 천연기념물 제270호입니다.";
        break;
    
    default:
    break;
}

if($qe_ox_val == $qe_quiz_num_a) {     // 들고온 ox 값과 switch 문의 정답과 같다면 해당 함수 sql 문에서 출력
    $answer_c = " , qe_quiz_count = qe_quiz_count+1 ";  // 정답이면 +1, 정답이 아니면 출력이 안되므로 성립되지 않음
}

$sel_sql = " select count(*) as cnt from quiz_event {$qe_user_info} ";
$sel_row = $DB->sql_fetch($sel_sql);
if($sel_row['cnt'] > 0) {
    $chk_sql = " select count(*) as ccnt from quiz_event {$qe_user_info} and qe_quiz1 !='' and qe_quiz2 !='' and qe_quiz3 !='' ";
    $chk_row = $DB->sql_fetch($chk_sql);
    if($chk_row['ccnt'] > 0) {
        $list['all_value'] = 'all_value'; // 정답 넣기 전 부터 일치하는 개인정보 (이름), (연락처)의 모든 값이 들어가 있음
    } else {
        $val_chk_sql = " select count(*) as vcnt from quiz_event {$qe_user_info} and {$qe_quiz_num} != '' ";
        $val_chk_row = $DB->sql_fetch($val_chk_sql);
        if($val_chk_row['vcnt'] > 0) {
            $list['state'] = 'sc_value';    // 일치하는 개인정보 및 해당 문제를 풀었을 경우
        } else {
            $up_sql = " update quiz_event set {$qe_quiz_num} = '{$qe_ox_val}' {$answer_c} {$qe_user_info} ";
            if($DB->dbQuery($up_sql)) {
                $list['an_title'] = $answer_title;
                $list['an_txt'] = $answer_txt;
                $list['state'] = 'success'; // 일치하는 개인정보 (이름), (연락처)가 없음
                if($qe_quiz_num == "qe_quiz3") {
                    $list['all_value'] = 'all_value'; // 정답을 넣고 나서 일치하는 개인정보 (이름), (연락처)의 모든 값이 들어가 있음
                    $up_end_date_sql = " update quiz_event set qe_end_date = '".date('Y-m-d H:i:s')."' {$qe_user_info} ";   // end_date(문제3개 다 푼 시간 입력)
                    $DB->sql_fetch($up_end_date_sql); // qe_quiz3 를 처음 풀 때만 작동
                }
            } else {
                $list['name'] = $qe_name; 
                $list['phone'] = $qe_phone; 
                $list['state'] = 'fail'; // 일치하는 개인정보 (이름), (연락처)가 없음
            }
        }
    }
} else {
    $list['name'] = $qe_name; 
    $list['phone'] = $qe_phone; 
    $list['state'] = 'fail'; // 일치하는 개인정보 (이름), (연락처)가 없음
}


echo json_encode($list);

?>
